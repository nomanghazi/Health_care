<?php
include '../config/config.php';



?>




<!doctype html>
<html lang="en">

<head>
    <title>Mooli | Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Mooli Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/animate-css/vivify.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/mooli.min.css">

</head>

<body>

    <div id="body" class="theme-green">


        <div class="auth-main">
            <div class="auth_div vivify fadeIn">
                <div class="auth_brand">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/icon.svg" width="50" class="d-inline-block align-top mr-2" alt="">Health Care</a>
                </div>
                <div class="card">
                    <div class="header">
                        <p class="lead">Login to your account</p>
                    </div>
                    <div class="body">
                        <form class="form-auth-small" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group c_form_group">
                                <label>User Name</label>
                                <input type="text" name="user" class="form-control" placeholder="User Name">
                            </div>
                            <div class="form-group c_form_group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control" placeholder="password">
                            </div>
    <?php 
   
if (isset($_POST['submit'])) {

    $username = $_POST['user'];
    $password = $_POST['pass'];

    $login = "SELECT username,ad_password FROM administrator
         WHERE   username='{$username}' AND ad_password='{$password}' ";
    $result = mysqli_query($connection, $login);
    if (mysqli_num_rows($result )> 0) {
        while($row = mysqli_fetch_assoc($result)){
        session_start();
        $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['ad_password'];

        header("location: $host/medical_services/dashboard.php");
    }
}
    else{
        echo '<div class="alert alert-danger ">Userrname or Password is Inncrect</div>';
    }
}

     ?>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input type="checkbox">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">LOGIN</button>
                            <div class="bottom">
                                <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                                <span>Don't have an account? <a href="page-register.html">Register</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="animate_lines">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>

    </div>

    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script>

    <!-- Vedor js file and create bundle with grunt  -->
</body>

</html>