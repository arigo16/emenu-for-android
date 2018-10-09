<!-- User Info -->
<div class="user-info">
    <div class="image">
        <img src="assets/images/logo/Logo.png" width="50" height="50" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION['fullname']);?></div>
        <div class="email">You're <?php echo ucfirst($_SESSION['authorization']);?></div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="index.php?page=change-password"><i class="material-icons">lock</i>Password</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- #User Info -->

<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="index.php">
                <i class="material-icons col-red">home</i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=orders-category">
                <i class="material-icons col-red">add_shopping_cart</i>
                <span>Orders</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=reserved">
                <i class="material-icons col-red">restaurant</i>
                <span>Reserved</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=history-orders">
                <i class="material-icons col-red">history</i>
                <span>History Orders</span>
            </a>
        </li>
        <li>
            <a href="about.php">
                <i class="material-icons col-red">portrait</i>
                <span>About Dev</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->