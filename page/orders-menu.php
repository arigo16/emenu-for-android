<?php
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];

    $category = $_GET['category'];
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
    <!-- Default Media -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        List menus
                        <small>Please select menu from list menus.</small>
                    </h2>
                </div>
                <div class="body">
                <?php
                $r = $con->query("SELECT * FROM menus WHERE category='$category' ORDER BY menu ASC");
                while ($rr = $r->fetch_array()) {

                ?>
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="<?php if ($rr["photo"]==''){echo 'image/default.jpg';}else{echo 'image/'.$rr["photo"];} ?>" width="64" height="64">
                        </div>
                        <div class="media-body">
                        <a href="index.php?page=orders-detail&id_menu=<?php echo $rr['id_menu'];?>" type="button" class="btn <?php if($rr['status_menu'] == '1') { echo 'bg-blue'; } else { echo 'bg-red'; } ?> btn-circle waves-effect waves-circle waves-light waves-float pull-right" <?php if($rr['status_menu'] == '0') { echo 'disabled onclick="return false;"'; } ?>>
                            <i class="material-icons"><?php if($rr['status_menu'] == '1') { echo 'create'; } else { echo 'block'; } ?></i>
                        </a>
                            <h4 class="media-heading"><?php echo $rr['menu'];?></h4> Rp. <?php echo $rr['price'];?> <br> <?php if($rr['status_menu'] == '1') { echo '<span class="badge bg-blue">Available</span>'; } else { echo '<span class="badge bg-red">Out of stock</span>'; } ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Default Media -->
</section>