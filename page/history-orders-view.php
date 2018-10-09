<?php
    $id_order = $_GET['id_order'];
    
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];

    // Hitung total qty
    $result = $con->query("SELECT SUM(qty) FROM ordersdetails WHERE id_order='$id_order'");
    $row = $result->fetch_row();
    $total_qty = $row[0];

    // Hitung total price
    $result = $con->query("SELECT SUM(price_order * qty) FROM ordersdetails WHERE id_order='$id_order'");
    $row = $result->fetch_row();
    $total_price = $row[0];
    $ppn = (10 * $total_price) / 100;
    $grandtotal = $total_price + $ppn;

    $s = $con->query("SELECT * FROM orders WHERE id_order = '$id_order'");
	foreach ($s as $ss) {
        $date_order = $ss['date_order'];
        $no_table = $ss['no_table'];
        $customer = $ss['customer'];
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
            <a style="float: left; padding-top: 14px; margin-right: -30px; padding-left: 10px; color: white;" href="index.php?page=history-orders"><i class="material-icons">arrow_back</i></a>
            <!-- <a href="javascript:void(0);" class="bars"></a> -->
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
        <h2>Detail history order</h2>
    </div>

    <div class="list-group">
        <li class="list-group-item">
            <h6 class="list-group-item-heading"><?php echo $id_order;?></h6>
            <span class="badge bg-black">Table <?php echo $no_table;?></span>
            <p class="list-group-item-text">
                <?php if ($customer == "") { echo "Anonymous"; } else { echo $customer; }?>
            </p>
        </li>
    </div>

    <div class="list-group">
    <?php
        $r = $con->query("SELECT orders.id_order, menus.menu, ordersdetails.qty, ordersdetails.price_order, (ordersdetails.qty * ordersdetails.price_order) AS total FROM orders INNER JOIN (menus INNER JOIN ordersdetails ON menus.id_menu = ordersdetails.id_menu) ON orders.id_order = ordersdetails.id_order WHERE orders.id_order='$id_order' ORDER BY menus.menu ASC");
        while ($rr = $r->fetch_array()) {
    ?>
        <li class="list-group-item">
            <h4 class="list-group-item-heading"><?php echo $rr['menu'];?></h4>
            <span class="badge bg-orange">Rp. <?php echo $rr['total'];?></span>
            <p class="list-group-item-text">
                <span class="badge bg-blue">Rp. <?php echo $rr['price_order'];?></span> x <span class="badge bg-pink"><?php echo $rr['qty'];?></span>
            </p>
        </li>
    <?php 
        }
    ?>
    </div>
    <ul class="list-group">
        <li class="list-group-item">Total Qty<span class="badge bg-grey"><?php if ($total_qty == "") {echo "0";}else{echo $total_qty;}?></span></li>
        <li class="list-group-item">Total Price<span class="badge bg-brown">Rp. <?php if ($total_price == "") {echo "0";}else{echo $total_price;}?></span></li>
        <li class="list-group-item">PPN<span class="badge bg-orange">Rp. <?php echo $ppn;?></span></li>
        <li class="list-group-item">Grandtotal<span class="badge bg-red">Rp. <?php echo $grandtotal;?></span></li>
    </ul>
</section>