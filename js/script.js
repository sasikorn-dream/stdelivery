var app = angular.module("delivery", [ngStorage]);
app.config(function (localStorageServiceProvider) {
	localStorageServiceProvider.setStorageType("sessionStorage");
});
	app.controller("main", function ($scope, $http, $localStorageService) {
		$scope.logout = function () {
			// alert("logout");
			$http.get("api/logout").then(function (res) {
				console.log(res);
				window.location.reload();
			});
		};
		$scope.add_cart = function (products_id, products_name, products_price) {
			console.log(products_id, products_name, products_price);
			$localStorageService.set("cart", products_id);
		};
	})

	.controller("login", function ($scope, $http) {
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
			$http.post("api/login", $scope.user).then(function (res) {
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
