<?php
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];

    // Hitung menu available
    $result = $con->query("SELECT COUNT(*) FROM menus WHERE status_menu='1'");
    $row = $result->fetch_row();
    $menu = $row[0];

    // Hitung reserved
    $result = $con->query("SELECT COUNT(*) FROM orders WHERE status_order='1'");
    $row = $result->fetch_row();
    $reserved = $row[0];

    // Hitung table available
    $result = $con->query("SELECT COUNT(*) FROM tables WHERE status='0'");
    $row = $result->fetch_row();
    $table = $row[0];

    $today = date("Y-m-d 00:00:01");
    $today2 = date("Y-m-d 23:59:00");
    $result = $con->query("SELECT COUNT(*) FROM orders WHERE date_order BETWEEN '$today' AND '$today2'");
    $row = $result->fetch_row();
    $ordertoday = $row[0];
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
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">fastfood</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Menus Available</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $menu;?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">accessible</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Tables Available</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $table;?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">restaurant</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Reserved</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $reserved;?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">list</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Orders Today</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $ordertoday;?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
    </div>
</section>