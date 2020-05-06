var app = angular.module("delivery", ["LocalStorageModule"]);
// app.config(function (localStorageServiceProvider) {
// 	localStorageServiceProvider.setStorageType("sessionStorage");
// });
app.service("ApiService", function ($http) {
	this.base_url = function () {
		return "http://localhost/ci/api/";
	};
	this.addcart = function () {};
	this.get = function (uri) {
		return $http.get(this.base_url() + uri);
	};
	this.post = function (uri, data) {
		return $http.post(this.base_url() + uri, data);
	};
});

app.factory("Cart", function (localStorageService, ApiService) {
	var Cart = {
		get_name: "ดรีม",
		base_url: function () {
			var name = Cart.get_name;
			return ApiService.base_url();
		},
		addCart: function (products_id, products_name, products_price) {
			var url = Cart.base_url();

			var cart = localStorageService.get("cart");
			if (cart) {
				var not_have = true;
				cart.forEach(function (val, key) {
					if (val.products_id == products_id) {
						cart[key].count++;
						not_have = false;
					}
				});
				if (not_have) {
					cart.push({
						products_id: products_id,
						products_name: products_name,
						products_price: products_price,
						count: 1,
					});
				}
				localStorageService.set("cart", cart);
			} else {
				localStorageService.set("cart", [
					{
						products_id: products_id,
						products_name: products_name,
						products_price: products_price,
						count: 1,
					},
				]);
			}
		},
		removeCart: function () {
			return "084555";
		},
	};
	return Cart;
});
app
	.controller("main", function (
		$scope,
		$http,
		localStorageService,
		ApiService,
		Cart
	) {
		$scope.cart = localStorageService.get("cart");
		$scope.logout = function () {
			// alert("logout");
			ApiService.get("logout").then(function (res) {
				console.log(res);
				window.location.reload();
			});
		};
		$scope.remove = function (index) {
			swal({
				title: "คุณต้องการลบเมนูนี้ใช่หรือไม่?",
				// text:
				// 	"Once deleted, you will not be able to recover this imaginary file!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then(function (willDelete) {
				if (willDelete) {
					$scope.cart.splice(index, 1);
					$scope.$apply();
					localStorageService.set("cart", $scope.cart);
					swal("ลบเมนูเรียบร้อย!", {
						icon: "success",
					});
				} else {
					// swal("Your imaginary file is safe!");
				}
			});
		};
		$scope.total = function () {
			var sum = 0;
			$scope.cart.forEach(function (val) {
				sum += val.products_price * val.count;
			});
			return sum;
		};
		$scope.remove_count = function (index) {
			if ($scope.cart[index].count <= 1) {
				swal({
					title: "คุณต้องการลบเมนูนี้ใช่หรือไม่?",
					// text:
					// 	"Once deleted, you will not be able to recover this imaginary file!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				}).then(function (willDelete) {
					if (willDelete) {
						$scope.cart.splice(index, 1);
						$scope.$apply();
						swal("ลบเมนูเรียบร้อย!", {
							icon: "success",
						});
					} else {
						// swal("Your imaginary file is safe!");
					}
				});
			} else {
				$scope.cart[index].count--;
			}
			localStorageService.set("cart", $scope.cart);
		};
		$scope.add_count = function (index) {
			$scope.cart[index].count++;
			localStorageService.set("cart", $scope.cart);
		};
		$scope.add_cart = function (products_id, products_name, products_price) {
			// console.log(products_id, products_name, products_price);

			// localStorageService.set("cart", products_id);
			Cart.addCart(products_id, products_name, products_price);
			$scope.cart = localStorageService.get("cart");
		};
	})

	.controller("login", function ($scope, $http, ApiService) {
		// alert("login");
		$scope.user = {
			username: "",
			password: "",
		};
		$scope.login_fail = false;
		$scope.login_success = false;
		$scope.text = "test";
		$scope.login = function () {
			console.log($scope.user);
			ApiService.post("login", $scope.user).then(function (res) {
				console.log(res);
				if (res.data.login == "success") {
					// alert('success');
					$scope.login_fail = false;
					$scope.login_success = true;
					setTimeout(function () {
						window.location.reload();
					}, 500);
				} else {
					$scope.login_fail = true;
					$scope.login_success = false;
					// alert('fail');
				}
			});
		};
	})
	.controller("register", function ($scope, $http) {
		// alert("login");
		$scope.user = {
			username: "",
			email: "",
			password_regis1: "",
			password_regis2: "",
		};
		$scope.register_fail = false;
		$scope.register = function () {
			console.log($scope.user);
			$http.post("api/register", $scope.user).then(function (res) {
				console.log(res);
				if (res.data.register == "success") {
					// alert('success');
					setTimeout(function () {
						window.location.reload();
					}, 500);
				} else {
					$scope.register_fail = true;
					// alert('fail');
				}
			});
		};
	});
