<?php
    session_start(); 
    if(!$_SESSION["mem_id"]){
        header("location: ../index.php");
    }else{?>
<?php include("../connect.php");?>
<header>
<style>
        body{
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <script src="../asset/js/bootstrap.bundle.js"></script>
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 mb-5 bg-body rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Online Food Delivery </a>
        </div>
        <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="manage_rest.php">Restaurant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="manage_cate.php">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="manage_menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="manage_coupon.php">Coupon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="order.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Bill</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active "><?php echo strtoupper(($_SESSION["mem_name"])); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"><?php echo strtoupper(($_SESSION["mem_last"])); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="logout.php">Logout&nbsp;&nbsp;</a>
                </li>

            </ul>
        </div>
    </nav>
</header>
<?php } ?>