<?php
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp");
    $row = $result->fetch_row();
    $total_menu = $row[0];
    $start = '';
    $end = '';
    
    if (isset($_POST['btn_go'])){
        $start_date = $_POST['start_date'];
        $start_stamp = strtotime($start_date);
        $start = date('Y-m-d 00:00:01', $start_stamp);

        $end_date = $_POST['end_date'];
        $end_stamp = strtotime($end_date);
        $end = date('Y-m-d 23:59:00', $end_stamp);
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
            <!-- <a href="javascript:void(0);" class="bars"></a> -->
            <a style="float: left; padding-top: 14px; margin-right: -30px; padding-left: 10px; color: white;" href="index.php?page=home"><i class="material-icons">arrow_back</i></a>
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
        <h2>History Orders</h2>
    </div>
    <form action="" method="POST">
        <div class="card">
            <div class="body">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="start_date" class="datepicker form-control" placeholder="Choose a start date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="end_date" class="datepicker form-control" placeholder="Choose a end date">
                    </div>
                </div>
                <button type="submit" name="btn_go" value="1" class="btn btn-primary waves-effect">Go</button>
            </div>
        </div>
        <ul class="list-group">
            <?php
                $r = $con->query("SELECT * FROM orders WHERE (date_order BETWEEN '$start' AND '$end') AND status_order = '0' ORDER BY date_order ASC");
                if ($r -> num_rows > 0){
                    while ($rr = $r->fetch_array()) {
                        echo '<a href="index.php?page=history-orders-view&id_order='.$rr['id_order'].'" type="button" class="list-group-item">
                        <h6 class="media-heading">'.$rr['id_order'].'</h6>
                        '.$rr['date_order'].'<span class="badge bg-blue">Rp. '.$rr['grandtotal'].'</span>
                        </a>';
                    }
                } else {
                    echo '<div class="alert alert-warning">
                    <strong>Data empty!</strong> Please select date
                    </div>';
                }
                
            ?>
        </ul>
    <form>  
    <!-- #END# Badges -->
</section>