<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../asset/head/head-rest.php'); ?>
</head>

<body>
    <div class="content">
        <div class="container shadow p-5 mb-5 bg-body rounded">
        <h1 align="center" class="p-1">Manage Menu</h1>
            <table class="table">
                <thead align="center">
                    <th>ID</th>
                    <th>Restaurant</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    <form action="config_menu.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="menu_id" class="form-control">
                        <td><input type="text" name="menu_id" class="form-control" placeholder="ID" disabled></td>
                        <td><input type="text" name="res_id" class="form-control" placeholder="Restaurant"></td>
                        <td><input type="text" name="cate_menu_id" class="form-control" placeholder="Category"></td>
                        <td><input type="text" name="menu_name" class="form-control" placeholder="Name"></td>
                        <td><input type="text" name="menu_price" class="form-control" placeholder="Price"></td>
                        <td><input type="file" name="file" class="form-control"></td>
                        <center>
                            <td colspan="2"><button type="submit" name="insert" 
                                    class="btn btn-primary form-control">Insert</button></td>
                        </center>
                    </form>
                </tbody>
                <?php 
                    include('../connect.php');
                    $sql ="SELECT * FROM menu ";
                    $query = mysqli_query($conn,$sql);
                    while($result = mysqli_fetch_array($query)){
            ?>
                <tbody>
                    <form action="config_menu.php" method="POST">
                        <input type="hidden" name="menu_id" class="form-control" value="<?php echo $result['menu_id']; ?>" >
                        <td><input type="text" name="menu_id" class="form-control" value="<?php echo $result['menu_id']; ?>" disabled></td>
                        <td><input type=" text" name="res_id" class="form-control" value="<?php echo $result['res_id']; ?>"></td>
                        <td><input type="text" name="cate_menu_id" class="form-control" value="<?php echo $result['cate_menu_id']; ?>"></td>
                        <td><input type="text" name="menu_name" class="form-control" value="<?php echo $result['menu_name']; ?>"></td>
                        <td><input type="text" name="menu_price" class="form-control" value="<?php echo $result['menu_price']; ?>"></td>
                        <input type="hidden" name="m_img" class="form-control" value="<?php echo $result['m_img']; ?>">
                        <td><input type="text" name="m_img" class="form-control" value="<?php echo $result['m_img']; ?>" disabled></td>
                        <td><button type="submit" name="update"
                                class="btn btn-success  form-control">UpDate</button>
                        </td>
                        <td><button type="submit" name="delete"
                                class="btn btn-danger form-control">Delete</button>
                        </td>
                </tbody>
                </form>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>