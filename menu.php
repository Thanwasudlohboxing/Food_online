<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../asset/head/head-user.php")?>
</head>
<body>
    <div class="container shadow p-5 mb-5 bg-body rounded">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content">
            <?php 
            include("../connect.php");
            if(isset($_POST['menu'])){
                $res_id = $_POST['res_id'];
                $sql = "SELECT * FROM menu WHERE res_id = '$res_id'";
                $query = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query) > 0){
                    while($result=mysqli_fetch_array($query)){

            ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <img src="../asset//uploads/<?php echo$result['m_img'];?>" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="card-body p-4">
                        <div class="text-center">
                        <form action="cart.php" method="GET">
                            <input type="hidden" name="menu_id" value="<?php echo$result['menu_id']?>">
                            <input type="hidden" name="res_id" value="<?php echo$result['res_id']?>">
                            <input type="hidden" name="cate_menu_id" value="<?php echo$result['cate_menu_id']?>">
                            <input type="hidden" name="menu_name" value="<?php echo$result['menu_name']?>">
                            <input type="hidden" name="menu_price" value="<?php echo$result['menu_price']?>">
                            <h4><?php echo$result['menu_name']?></h4>
                            <h5>Price : <?php echo$result['menu_price'];?> ฿ </h5>
                        </form>
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                    <div><a href="cart.php?menu_id=<?php echo$result['menu_id']?>&act=add" class="btn btn-outline-primary">Add to cart</a></div>
                </div>
            </div>
        </div>
            <?php
            }
        }
    }
            ?>
        </div>
    </div>
</body>
</html>