<?php
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];
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
<div class="block-header">
    <h2>Choose Category</h2>
</div>
<div class="body">
    <ul class="list-group">
        <?php
            $r = $con->query("SELECT category, COUNT(menu) AS total FROM menus GROUP BY category");
            while ($rr = $r->fetch_array()) {
        ?>
        <a href="index.php?page=orders-menu&category=<?php echo $rr['category'];?>" type="button" class="list-group-item"><?php echo $rr['category'];?> <span class="badge bg-blue"><?php echo $rr['total'];?> menu</span></a>
        <?php
            }
        ?>
    </ul>
</div>
</section>