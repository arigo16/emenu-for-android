<?php
    session_start(); 

    if (empty($_SESSION['username'])) {
        header("location:login.php");
    }else{
        if (isset($_SESSION['username'])) {
            $user = trim($_SESSION['username']);
        }
        if (isset($_SESSION['authorization'])) {
            $authorization = trim($_SESSION['authorization']);
        }
        require_once('include/config.php');
        $base_url = ('http://'.$_SERVER['HTTP_HOST'].'/emenu-ma/index.php');

        isset ($_GET['page']) ? $page = $_GET['page'] : $page = 'home';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Main Menu</title>

    <!-- CSS -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> -->
    <link href="assets/css/cyrillic.css" rel="stylesheet" type="text/css">
    <link href="assets/css/material-icon.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/waitme/waitMe.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet">
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet">
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/themes/all-themes.css" rel="stylesheet">
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">

            <!-- Menu -->
            <?php
                include ('include/menu.php')
            ?>
            
            <!-- Footer -->
            <?php
                include ('include/footer.php')
            ?>
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <?php
        if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}

        if(file_exists('page/'.$page.'.php')){
            include ('page/'.$page.'.php');
        }
    ?>

    <!-- Script -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/plugins/node-waves/waves.js"></script>
    <script src="assets/plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morrisjs/morris.js"></script>
    <script src="assets/plugins/chartjs/Chart.bundle.js"></script>
    <script src="assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="assets/plugins/flot-charts/jquery.flot.time.js"></script>
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="assets/plugins/jquery-spinner/js/jquery.spinner.js"></script>
    <script src="assets/plugins/autosize/autosize.js"></script>
    <script src="assets/plugins/momentjs/moment.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/forms/basic-form-elements.js"></script>
    <script src="assets/js/pages/index.js"></script>
    <script src="assets/js/demo.js"></script>

    <script>
        // Inputan hanya angka
        function OnlyNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
        
        // Show password old
        function showPasswordOld() {
            var x = document.getElementById("password-old");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        // Show password new
        function showPasswordNew() {
            var x = document.getElementById("password-new");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        // Show password type
        function showPasswordRe() {
            var x = document.getElementById("password-re");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        
        // Modal Reserved
        $('.openModal').click(function(){
            var id_order = $(this).attr('data-id');
            $.ajax({url:"page/modal-reserved.php?id_order="+id_order,cache:false,success:function(result){
                $(".modal-content").html(result);
            }});
        });
    </script>
</body>

</html>

<?php
    }
?>