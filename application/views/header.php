<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>ST Delivery</title>

    <link rel="stylesheet" href="http://localhost/stdelivery/css/bootstrap.css">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <!-- <script src="http://localhost/stdelivery/js/angular.min.js"></script> -->
    <script src="<?php echo base_url(); ?>js/angular-local-storage.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&family=K2D:ital@1&family=Mitr:wght@300;400&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="=http://localhost/stdelivery/js/ui-bootstrap-tpls-3.0.6.js"></script> -->
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>

    <script src="<?php echo base_url(); ?>js/script.js"></script>




</head>

<body ng-app="delivery">

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" ng-controller="login">

                <div class="modal-body">
                    <form class="form-signin">
                        <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
                        <label for="inputEmail" class="sr-only">Username</label>
                        <input type="text" ng-model="user.username" id="inputUsername" class="form-control"
                            placeholder="Username" required="" autofocus="">

                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" ng-model="user.password" id="inputPassword" class="form-control"
                            placeholder="Password" required="">
                        <div class="alert bg-danger text-light " ng-show="login_fail">username or password is incorrect
                        </div>
                        <!-- <div class="alert bg-success text-light " ng-show="login_success">username or password is incorrect</div> -->
                        <button class="btn btn-lg btn-primary btn-block" type="button"
                            ng-disabled="user.username.length<=4" ng-click="login()">Login</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">FACEBOOK Login</button>
                        <br><button class="btn btn-primary btn-block" data-toggle="modal" type="button"
                            data-target="#registerModal" data-dismiss="modal">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" ng-controller="register">

                <div class="modal-body">
                    <form class="form-register">
                        <h1 class="h3 mb-3 font-weight-normal">Register</h1>
                        <label for="inputEmail" class="sr-only">Username</label>
                        <div class="alert bg-danger text-light " ng-show="register_fail">Password did not match: Please
                            try again...</div>

                        <input type="text" ng-model="user.username_regis" id="inputusername_regis" class="form-control"
                            placeholder="Username" required="" autofocus="">
                        <input type="Email" ng-model="user.email_regis" id="inputEmail_regis" class="form-control"
                            placeholder="E-mail" required="" autofocus="">
                        <input type="password" ng-model="user.password_regis1" id="inputpassword_regis1"
                            class="form-control" placeholder="Password" required="">
                        <input type="password" ng-model="user.password_regis2" id="inputpassword_regis2"
                            class="form-control" placeholder="Confirm Password" required="">
                        <button class="btn btn-lg btn-primary btn-block" data-toggle="modal"
                            ng-click="register()">Submit</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <div ng-controller="main">
        <div class="border-bottom shadow-sm ">
            <!-- <div class="container"> -->
                <div
                    class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow bgnav">
                    <a href="<?php echo base_url(); ?>" class="my-0 mr-md-auto font-weight-normal company">ST
                        Delivery</a>

                    <?php
					if ($this->session->userdata("login")) {
                        
						$user = $this->session->userdata("user"); ?> 
                    <a href="<?php echo base_url(); ?>index.php/main/cart">ตะกร้าสินค้า</a>
                    <p><?php echo  $user->username; ?>&nbsp;</p>
                   
                    &nbsp;<button class="btn btn-outline-light" ng-click="logout()">ออกจากระบบ</button>
                    <?php
					} else {
					?>
                    <button class="btn btn-outline-light" data-toggle="modal"
                        data-target="#loginModal">เข้าสู่ระบบ</button>
                    <?php
					}
					?>

                <!-- </div> -->
            </div>
        </div>