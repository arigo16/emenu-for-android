<?php
    $id_order = $_GET['id_order'];

    // Cancel Orders
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

<div class="modal-header">
    <h4 class="modal-title" id="smallModalLabel">Confirmation</h4>
</div>
<div class="modal-body">
    What your action next ?
</div>
<div class="modal-footer">
    <form action="" method="POST">
        <a href="index.php?page=reserved-view&id_order=<?php echo $id_order; ?>" type="button" class="btn btn-link waves-effect">View</a>
        <a href="index.php?page=checkout&id_order=<?php echo $id_order; ?>" type="button" class="btn btn-link waves-effect">Edit</a>
        <button type="submit" value="<?php echo $id_order; ?>" name="btn_cancel" class="btn btn-link waves-effect">Cancel Order</button>
    </form>
</div>