<?php
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];

    if (isset($_POST['btn_change'])){
        $username = $_SESSION['username'];
        $password_old = md5($_POST['password-old']);
        $password_new = md5($_POST['password-new']);
        $password_re = md5($_POST['password-re']);

        $r = $con->query("SELECT * FROM users WHERE username = '$username'");
        foreach ($r as $rr) {
            $password = $rr['password'];
        }

        if ($password_old == $password){
            
            if ($password_new == $password_re){
                $con->query("UPDATE users SET `password`='$password_new' WHERE username='$username' ");

                if ($con->affected_rows > 0){
                    $_SESSION['message'] = '<div class="alert bg-blue alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    New password saved
                    </div>';
                }else{
                    $_SESSION['message'] = '<div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Change password failed
                    </div>';
                }
            } else {
                $_SESSION['message'] = '<div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                New password does not match with retype password
                </div>';
            }

        } else {
            $_SESSION['message'] = '<div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Old password wrong
            </div>';
        }
    }

?>

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a> -->
            <a class="navbar-toggle" href="index.php?page=checkout">
                <!-- <i class="material-icons">shopping_cart</i> -->
                <span class="label-count"><?php if ($total_menu != "0"){echo $total_menu;}?></span>
            </a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand">E-Menu<?php if (isset($_SESSION['editdata'])){echo ' (Edit Table '.$_SESSION['no_table'].')';}?></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right text-right">
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="index.php?page=checkout">
                        <i class="material-icons">shopping_cart</i>
                        <span class="label-count"><?php echo $total_menu;?></span>
                    </a>
                </li>
                <!-- #END# Notifications -->
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<section class="content">

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?php  isset($_SESSION['message']) ? $e=$_SESSION['message'] : $e=""; echo $e; unset($_SESSION['message']);?>
        <div class="card">
            <div class="header">
                <h2>
                    Change Password
                </h2>
            </div>
            <div class="body">
                <form action="" method="POST">
                    <div class="input-group">
                        <div class="form-line">
                            <input type="password" id="password-old" name="password-old" class="form-control" placeholder="Enter your old password">
                        </div>
                        <span class="input-group-addon" onclick="showPasswordOld()">
                            <i class="material-icons">remove_red_eye</i>
                        </span>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="password" id="password-new" name="password-new" class="form-control" placeholder="Enter your new password">
                        </div>
                        <span class="input-group-addon" onclick="showPasswordNew()">
                            <i class="material-icons">remove_red_eye</i>
                        </span>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="password" id="password-re" name="password-re" class="form-control" placeholder="Retype your new password">
                        </div>
                        <span class="input-group-addon" onclick="showPasswordRe()">
                            <i class="material-icons">remove_red_eye</i>
                        </span>
                    </div>
                    <button type="submit" value="1" name="btn_change" class="btn btn-primary m-t-15 waves-effect">Change</button>
                </form>
            </div>
        </div>
    </div>

</section>