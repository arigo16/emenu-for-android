<?php
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];

    // Clear daftar menu
    if (isset($_POST['btn_cancel'])){
        $id_order = $_POST['btn_cancel'];

        $s = $con->query("SELECT * FROM orders WHERE id_order = '$id_order'");
        foreach ($s as $ss) {
            $no_table = $ss['no_table'];
        }

        $con->query("DELETE FROM ordersdetails WHERE id_order='$id_order'");
        $con->query("DELETE FROM orders WHERE id_order='$id_order'");

        $con->query("UPDATE tables SET `status`='0' WHERE no_table='$no_table'");

        $_SESSION['message'] = '<div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Orders table '.$no_table.' canceled
            </div>';
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
    <?php  isset($_SESSION['message']) ? $e=$_SESSION['message'] : $e=""; echo $e; unset($_SESSION['message']);?>
    <div class="block-header">
        <h2>Reserved</h2>
    </div>
    <ul class="list-group">
        <?php
            $today = date("Y-m-d 00:00:01");
            $today2 = date("Y-m-d 23:59:00");
            $r = $con->query("SELECT * FROM orders WHERE (date_order BETWEEN '$today' AND '$today2') AND status_order = '1' ORDER BY date_order ASC");
            while ($rr = $r->fetch_array()) {
        ?>
        <button type="button" data-toggle="modal" data-target="#actionModal" data-id="<?php echo $rr['id_order'];?>" class="list-group-item openModal">
            <h4 class="media-heading">Table <?php echo $rr['no_table'];?></h4>
            <?php echo $rr['id_order'];?> <span class="badge bg-blue">Rp. <?php echo $rr['grandtotal'];?></span>
        </button>
        <?php
            }
        ?>
    </ul>
</section>

<div class="modal fade" id="actionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                What your action next ?
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                    <a href="index.php?page=history-orders-view&id_order=<?php echo $rr['id_order']; ?>" type="button" class="btn btn-link waves-effect">View</a>
                    <a href="index.php?page=checkout&id_order=<?php echo $id_order; ?>" type="button" class="btn btn-link waves-effect">Edit</a>
                    <button type="submit" value="<?php echo $rr['id_order'];?>" name="btn_cancel" class="btn btn-link waves-effect">Cancel Order</button>
                </form>
            </div>
        </div>
    </div>
</div>