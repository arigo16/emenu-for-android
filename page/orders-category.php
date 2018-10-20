<?php
    $usernameID = $_SESSION['username'];
    
    // Hitung qty checkout
    $result = $con->query("SELECT COUNT(id_menu) FROM orderdetails_temp WHERE username='$usernameID'");
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
            <a style="float: left; padding-top: 14px; margin-right: -30px; padding-left: 10px; color: white;" href="index.php?page=home"><i class="material-icons">arrow_back</i></a>
            <!-- <a href="javascript:void(0);" class="bars"></a> -->
            <a class="navbar-brand">E-Menu<?php if (isset($_SESSION['editdata'])){echo ' (Edit Table '.$_SESSION['no_table'].')';}?></a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<section class="content">
<?php  isset($_SESSION['message']) ? $e=$_SESSION['message'] : $e=""; echo $e; unset($_SESSION['message']);?>
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