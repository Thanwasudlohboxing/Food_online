<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('../asset/head/head-rest.php'); ?>
</head>
<body>
    <div class="content">
        <div class="container body shadow mb-5 p-5 bg-body rounded">
            <h1 align="center">Manage Category</h1>
            <table class="table">
                <thead>
                    <th>Cate_id</th>
                    <th>Cate_name</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    <form action="config_cate.php" method="post">
                        <input type="hidden" name="cate_menu_id">
                        <td><input type="text" name="cate_menu_id" class="form-control" disabled></td>
                        <td><input type="text" name="cate_menu_name" class="form-control"></td>
                        <td colspan="2"><button type="submit" name="insert" class="btn btn-lg btn-success form-control">Insert</button></td>
                    </form>
                </tbody>
                <?php 
                include("../connect.php");
                $sql = "SELECT * FROM cate_menu";
                $query = mysqli_query($conn,$sql);
                ?>
                <?php
                while($result=mysqli_fetch_array($query)){
                ?>
                <tbody>
                    <form action="config_cate.php" method="post">
                        <input type="hidden" name="cate_menu_id"
                            value="<?php echo$result['cate_menu_id']?>">
                        <td><input type="text" name="cate_menu_id" class="form-control" disabled
                            value="<?php echo$result['cate_menu_id']?>"></td>
                        <td><input type="text" name="cate_menu_name" class="form-control"
                            value="<?php echo$result['cate_menu_name']?>"></td>
                        <td><button type="submit" name="update" class="btn btn-lg btn-primary form-control">Update</button></td>
                        <td><button type="submit" name="delete" class="btn btn-lg btn-danger form-control">Delete</button></td>
                    </form>
                </tbody>
                <?php }?>
            </table>
        </div>
    </div>
</body>
</html>