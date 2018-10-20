<?php
    $usernameID = $_SESSION['username'];

    // Autonumber
    $today = date("ymd");
    $carikode = $con->query("SELECT max(id_order) as maxID FROM orders WHERE id_order LIKE 'ORD$today%'");
    $datakode = mysqli_fetch_array($carikode);
    $idMax = $datakode['maxID'];
    $NoUrut = (int) substr($idMax, 9, 3);
    $NoUrut++;
    $NewID = "ORD".$today .sprintf('%03s', $NoUrut);

    // Get Edit
    if (isset($_GET['id_order'])){
        $id_order = $_GET['id_order'];

        $con->query("DELETE FROM orderdetails_temp WHERE username='$usernameID'");
        unset($_SESSION['editdata']);

        $result = $con->query("SELECT * FROM orders WHERE id_order = '$id_order'");
        if ($result -> num_rows > 0){
            while ($res = $result->fetch_array()){
                $_SESSION['customer'] = $res['customer'];
                $_SESSION['no_table'] = $res['no_table'];
            }
        }

        $details = $con->query("SELECT ordersdetails.id_menu, menus.menu, ordersdetails.qty, ordersdetails.price_order, ordersdetails.status FROM menus INNER JOIN ordersdetails ON menus.id_menu = ordersdetails.id_menu WHERE ordersdetails.id_order='$id_order'");
        while ($det = $details->fetch_array()) {
            $id_menu = $det['id_menu'];
            $menu = $det['menu'];
            $qty = $det['qty'];
            $price_order = $det['price_order'];
            $status = $det['status'];
            $con->query("INSERT INTO orderdetails_temp VALUES ('$id_menu', '$menu', '$qty', '$price_order', '$status', '$usernameID')");
        }
        $_SESSION['editdata'] = $_GET['id_order'];
    }

    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp WHERE username='$usernameID'");
    $row = $result->fetch_row();
    $total_menu = $row[0];

    // Hitung total qty
    $result = $con->query("SELECT SUM(qty) FROM orderdetails_temp WHERE username='$usernameID'");
    $row = $result->fetch_row();
    $total_qty = $row[0];

    // Hitung total price
    $result = $con->query("SELECT SUM(price_order * qty) FROM orderdetails_temp WHERE username='$usernameID'");
    $row = $result->fetch_row();
    $total_price = $row[0];
    $ppn = (10 * $total_price) / 100;
    $grandtotal = $total_price + $ppn;

    // Hapus daftar menu peritem
    if (isset($_POST['btn_del'])){
        $id_menu = $_POST['btn_del'];

        $con->query("DELETE FROM orderdetails_temp WHERE id_menu='$id_menu' AND username='$usernameID'");

        // Hitung qty checkout
        $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp WHERE username='$usernameID'");
        $row = $result->fetch_row();
        $total_menu = $row[0];

        // Hitung total qty
        $result = $con->query("SELECT SUM(qty) FROM orderdetails_temp WHERE username='$usernameID'");
        $row = $result->fetch_row();
        $total_qty = $row[0];

        // Hitung total qty
        $result = $con->query("SELECT SUM(price_order * qty) FROM orderdetails_temp WHERE username='$usernameID'");
        $row = $result->fetch_row();
        $total_price = $row[0];
        $ppn = (10 * $total_price) / 100;
        $grandtotal = $total_price + $ppn;

        echo "<script>window.location='index.php?page=checkout'</script>";
    }

    // Clear daftar menu
    if (isset($_POST['btn_clear'])){
        $con->query("DELETE FROM orderdetails_temp WHERE username='$usernameID'");
        
        // Hitung qty checkout
        $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp WHERE username='$usernameID'");
        $row = $result->fetch_row();
        $total_menu = $row[0];

        // Hitung total qty
        $result = $con->query("SELECT SUM(qty) FROM orderdetails_temp WHERE username='$usernameID'");
        $row = $result->fetch_row();
        $total_qty = $row[0];

        // Hitung total qty
        $result = $con->query("SELECT SUM(price_order * qty) FROM orderdetails_temp WHERE username='$usernameID'");
        $row = $result->fetch_row();
        $total_price = $row[0];
        $ppn = (10 * $total_price) / 100;
        $grandtotal = $total_price + $ppn;

        unset($_SESSION['editdata']);

        $_SESSION['message'] = '<div class="alert bg-red alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Orders cleared
            </div>';
    }

    // Saved orders
    if (isset($_POST['btn_orders'])){
        if ($grandtotal == "0"){
            $_SESSION['message'] = '<div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Menu is empty
                </div>';
        } else {
            if (isset($_SESSION['editdata'])){
                $no_table = $_POST['no_table'];
                $customer = $_POST['customer'];
                $username = $_SESSION['username'];
                $id_order_edit = $_SESSION['editdata'];

                $con->query("DELETE FROM ordersdetails WHERE id_order='$id_order_edit'");
                $con->query("DELETE FROM orders WHERE id_order='$id_order_edit'");

                $con->query("INSERT INTO orders VALUES ('$id_order_edit', CURRENT_TIMESTAMP, '$no_table', '$customer', '$total_qty', '$total_price', '$ppn', '$grandtotal', '1', '$username')");
                
                $details = $con->query("SELECT * FROM orderdetails_temp WHERE username='$usernameID'");
                while ($det = $details->fetch_array()) {
                    $id_menu = $det['id_menu'];
                    $qty = $det['qty'];
                    $price_order = $det['price_order'];
                    $status = $det['status'];
                    $con->query("INSERT INTO ordersdetails VALUES (NULL, '$id_order_edit', '$id_menu', '$qty', '$price_order', '$status')");
                }
                
                $con->query("DELETE FROM orderdetails_temp WHERE username='$usernameID'");

                // Hitung qty checkout
                $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp WHERE username='$usernameID'");
                $row = $result->fetch_row();
                $total_menu = $row[0];

                // Hitung total qty
                $result = $con->query("SELECT SUM(qty) FROM orderdetails_temp WHERE username='$usernameID'");
                $row = $result->fetch_row();
                $total_qty = $row[0];

                // Hitung total qty
                $result = $con->query("SELECT SUM(price_order * qty) FROM orderdetails_temp WHERE username='$usernameID'");
                $row = $result->fetch_row();
                $total_price = $row[0];
                $ppn = (10 * $total_price) / 100;
                $grandtotal = $total_price + $ppn;

                unset($_SESSION['editdata']);

                $_SESSION['message'] = '<div class="alert bg-blue alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Orders saved
                    </div>';
            }else{
                $no_table = $_POST['no_table'];
                $customer = $_POST['customer'];
                $username = $_SESSION['username'];

                $con->query("INSERT INTO orders VALUES ('$NewID', CURRENT_TIMESTAMP, '$no_table', '$customer', '$total_qty', '$total_price', '$ppn', '$grandtotal', '1', '$username')");
                
                $details = $con->query("SELECT * FROM orderdetails_temp WHERE username='$usernameID'");
                while ($det = $details->fetch_array()) {
                    $id_menu = $det['id_menu'];
                    $qty = $det['qty'];
                    $price_order = $det['price_order'];
                    $status = $det['status'];
                    $con->query("INSERT INTO ordersdetails VALUES (NULL, '$NewID', '$id_menu', '$qty', '$price_order', '$status')");
                }
                // $con->query("INSERT INTO ordersdetails SET id_order = '$NewID', id_menu = (SELECT id_menu FROM orderdetails_temp), qty = (SELECT qty FROM orderdetails_temp), price_order = (SELECT price_order FROM orderdetails_temp)");

                $con->query("DELETE FROM orderdetails_temp WHERE username='$usernameID'");

                // Hitung qty checkout
                $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp WHERE username='$usernameID'");
                $row = $result->fetch_row();
                $total_menu = $row[0];

                // Hitung total qty
                $result = $con->query("SELECT SUM(qty) FROM orderdetails_temp WHERE username='$usernameID'");
                $row = $result->fetch_row();
                $total_qty = $row[0];

                // Hitung total qty
                $result = $con->query("SELECT SUM(price_order * qty) FROM orderdetails_temp WHERE username='$usernameID'");
                $row = $result->fetch_row();
                $total_price = $row[0];
                $ppn = (10 * $total_price) / 100;
                $grandtotal = $total_price + $ppn;

                $_SESSION['message'] = '<div class="alert bg-blue alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Orders saved
                    </div>';
            }
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
            <a style="float: left; padding-top: 14px; margin-right: -30px; padding-left: 10px; color: white;" href="index.php?page=home"><i class="material-icons">arrow_back</i></a>
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
    <?php  isset($_SESSION['message']) ? $e=$_SESSION['message'] : $e=""; echo $e; unset($_SESSION['message']);?>
    <div class="block-header">
        <h2>Checkout</h2>
    </div>
    <div class="list-group">
    <?php
        $r = $con->query("SELECT id_menu, menu, qty, price_order, (qty * price_order) AS total FROM orderdetails_temp WHERE username='$usernameID' ORDER BY menu ASC");
        while ($rr = $r->fetch_array()) {
    ?>
        <li class="list-group-item">
            <form action="" method="POST">
                <button type="submit" name="btn_del" value="<?php echo $rr['id_menu'];?>" class="btn bg-red btn-circle waves-effect waves-circle waves-light waves-float pull-right">
                    <i class="material-icons">delete</i>
                </button>
                <h4 class="list-group-item-heading"><?php echo $rr['menu'];?></h4> 
                <p class="list-group-item-text">
                    <span class="badge bg-blue">Rp. <?php echo $rr['price_order'];?></span> x <span class="badge bg-pink"><?php echo $rr['qty'];?></span> = <span class="badge bg-orange">Rp. <?php echo $rr['total'];?></span>
                </p>
            </form>
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
    <div class="card">
        <div class="body">
            <form action="" method="POST">
                <div class="form-group">
                    <select class="form-control show-tick" name="no_table" required>
                        <?php
                            if (isset($_SESSION['editdata'])){
                                echo '<option value="'.$_SESSION['no_table'].'">Table No '.$_SESSION['no_table'].'</option>';
                            }else{
                                echo '<option value="">-- Select table --</option>';
                                $table = $con->query("SELECT * FROM tables WHERE status='0'");
                                foreach ($table as $tab) {
                                    echo '<option value="'.$tab['no_table'].'">Table No '.$tab['no_table'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control" placeholder="Customer (Optional)" value="<?php if (isset($_SESSION['editdata'])){echo $_SESSION['customer'];} ?>" name="customer" <?php if (isset($_SESSION['editdata'])){echo 'readonly';} ?>/>
                    </div>
                </div>
                <div>
                    <button type="submit" name="btn_orders" value="1" class="btn btn-primary waves-effect">Orders Now</button>
                    <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#clearModal">Clear Checkout</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="clearModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this list menu ?
                </div>
                <div class="modal-footer">
                    <form action="" method="POST">
                        <button type="submit" value="1" name="btn_clear" class="btn btn-link waves-effect">Yes</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>