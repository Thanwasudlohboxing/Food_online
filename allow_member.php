<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../asset/head/head-admin.php")?>
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="container body shadow mb-5 p-5 bg-body rounded">
            <h1 align="center">Allow Member</h1>
            <table class="table">
                <thead align="center">
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Status</th>
                    <th colspan="2">Manage</th>
                </thead>
                <tbody>
                    <?php 
                    include("../connect.php");
                    $sql = "SELECT * FROM member WHERE mem_check = 'disable'";
                    $query = mysqli_query($conn,$sql);
                    ?>
                    <?php
                    while($result=mysqli_fetch_array($query)){
                    ?>
                    <form action="config.php" method="post">
                        <tr  align="center">
                        <input type="hidden" name="mem_id"  value="<?php echo$result['mem_id']?>">
                        <td><?php echo$result['mem_name']?></td>
                        <td><?php echo$result["mem_last"]; ?></td>
                        <td><?php echo$result["mem_status"]; ?></td>
                        <td><button type="submit" name="enable" class="btn btn-success">Enable</button></td>
                        <td><button type="submit" name="delete" class="btn btn-danger">Delete</button></td>
                        </tr>
                    </form> 
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>