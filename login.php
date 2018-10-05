<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="login-page">
    <div class="login-box">
        <div class="text-center">
            <img src="assets/images/logo/Logo.png" class="demo-avatar" style="width:120px; height:120px; border-radius: 24px; margin-left: auto; margin-right: auto;">
        </div>
        <div class="logo">
            <a><b>E-Menu</b></a>
            <small>Rumah Makan Ciganea Jln. Kisamaun, Kota Tangerang.</small>
        </div>
        <div class="card">
            <div class="body">
                <?php  isset($_SESSION['error']) ? $e=$_SESSION['error'] : $e=""; echo $e;?>
                <?php
                    session_destroy();
                ?>
                <form action="controller/login.php" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="username" id="username" placeholder="Username" onclick="showUsername()" value="" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="showpassword" id="showpassword" onclick="showPassword()" class="filled-in chk-col-pink">
                            <label for="showpassword">Show Password</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/node-waves/waves.js"></script>
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/examples/sign-in.js"></script>

    <!-- Fungsi Show Password -->
    <script>
        function showUsername() {
            var x = document.getElementById("username");
            if (x.type === "password") {
                x.type = "text";
            }
        }
    
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>