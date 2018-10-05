<?php
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];

    $id_menu = $_GET['id_menu'];

    // Simpan daftar menu
    if (isset($_POST['add_cart'])){
        $r = $con->query("SELECT * FROM menus WHERE id_menu = '$id_menu'");
	    foreach ($r as $rr) {
            $menu = $rr['menu'];
            $price_order = $rr['price'];
        }
        
        $qty = $_POST['qty'];

        if ($qty == "") {
            echo "<script>alert('Barang tidak terdaftar')</script>";
        } else {
            $con->query("INSERT INTO orderdetails_temp values ('$id_menu', '$menu', '$qty', '$price_order', '1')");

            if ($con->affected_rows > 0){
                $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
                $row = $result->fetch_row();
                $total_menu = $row[0];

                $_SESSION['message'] = '<div class="alert bg-blue alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Menu saved
                    </div>';
            }else{
                $_SESSION['message'] = '<div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Menu is already
                    </div>';
            }
        }
    }

    // Tampil detail menu
	$r = $con->query("SELECT * FROM menus WHERE id_menu = '$id_menu'");
	foreach ($r as $rr) {
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
    <!-- Custom Content -->
    <?php  isset($_SESSION['message']) ? $e=$_SESSION['message'] : $e=""; echo $e; unset($_SESSION['message']);?>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Detail menu
                        <small>Input qty order.</small>
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php if ($rr["photo"]==''){echo 'image/default.jpg';}else{echo 'image/'.$rr["photo"];} ?>">
                                <div class="caption">
                                    <h3><?php echo $rr['menu'];?></h3>
                                    <p><?php echo $rr['description'];?></p>
                                    <p><span class="badge bg-orange">Rp. <?php echo $rr['price'];?></span></p>
                                    <form action="" method="POST">
                                    <p>
                                        <div class="input-group spinner" data-trigger="spinner">
                                            <div class="form-line">
                                                <input type="number" class="form-control text-center" value="1" name="qty" onkeypress="return OnlyNumber(event)" data-rule="quantity">
                                            </div>
                                            <!-- <span class="input-group-addon">
                                                <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                                <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                            </span> -->
                                        </div>
                                    </p>
                                    <p>
                                        <button type="submit" name="add_cart" value="1" class="btn btn-primary waves-effect" role="button">Add Cart</button>
                                    </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Custom Content -->
</section>

<?php 
    }
?>