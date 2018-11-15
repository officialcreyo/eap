<?php
    session_start();
    include ('assets/configs/mysql.php');
    include ('assets/configs/page.php');
    include ('assets/functions/autologin.php');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $sitename; echo " - "; echo "Login"; ?></title>
    <meta name="description" content="EAP by Creyo">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body style="background-image: url(../../images/bg.jpg);" style="height: 100%;">
    <div class="sufee-login d-flex align-content-center flex-wrap" style="margin-bottom: 5%;">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="/images/logo.png" alt="" height="30px;">
                    </a>
                </div>
                <div class="login-form">
                    <form action="<?php echo "assets/functions/do-login.php"; ?>" method="post">
                        <h4 style="color: white !important;"><?php echo "Member Access";?></h4>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username" name="username" class="login-form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="login-form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label style="color: white !important;">
                                <input type="checkbox" id="remember" name="remember"> Remember Me
                            </label>
                        </div>
                        <?php if($_GET['error'] == 1) { echo "<i class='float-right' style='color: red;'>Your email address and/or password is wrong.</i><br>"; } else { } ?>
                        <br>
                        <button type="submit" class="btn btn-success2 btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
