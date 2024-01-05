<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../asset/head/head-admin.php") ?>
</head>

<body>
    <div class="content">
        <div class="card body shadow mb-5 p-5 bg-body rounded">
            <h1 align="center">Manage Member</h1>
            <table class="table">
                <thead align="center">
                    <th>Mem_id</th>
                    <th>Mem_user</th>
                    <th>Mem_pass</th>
                    <th>Mem_name</th>
                    <th>Mem_last</th>
                    <th>Mem_mail</th>
                    <th>Mem_phone</th>
                    <th>Mem_address</th>
                    <th>Mem_status</th>
                    <th>Mem_check</th>
                    <th colspan="2">Manage</th>
                </thead>
                <tbody>
                    <form action="config.php" method="post">
                        <input type="hidden" name="mem_id" class="form-control">
                        <td><input type="text" name="mem_id" class="form-control" disabled></td>
                        <td><input type="text" name="mem_user" class="form-control"></td>
                        <td><input type="password" name="mem_pass" class="form-control"></td>
                        <td><input type="text" name="mem_name" class="form-control"></td>
                        <td><input type="text" name="mem_last" class="form-control"></td>
                        <td><input type="email" name="mem_mail" class="form-control"></td>
                        <td><input type="tel" name="mem_phone" class="form-control"></td>
                        <td><input type="text" name="mem_address" class="form-control"></td>
                        <td>
                            <select name="mem_status" class="form-select">
                                <option value="user">User</option>
                                <option value="rest">Rest</option>
                                <option value="rider">Rider</option>
                            </select>
                        </td>
                        <td>
                            <select name="mem_check" class="form-select">
                                <option value="enable">enable</option>
                                <option value="disable">disable</option>
                            </select>
                        </td>
                        <td colspan="2"><button type="submit" class="btn btn-success form-control" name="insert">Insert</button></td>
                    </form>
                </tbody>
                <?php
                include("../connect.php");
                $sql = "SELECT * FROM member WHERE mem_check = 'enable'";
                $query = mysqli_query($conn, $sql);
                ?>
                <?php
                while ($result = mysqli_fetch_array($query)) {
                ?>
                    <tbody>
                        <form action="config.php" method="post">
                            <input type="hidden" name="mem_id" class="form-control" value="<?php echo $result['mem_id'] ?>">
                            <td><input type="text" name="mem_id" class="form-control" disabled value="<?php echo $result['mem_id'] ?>"></td>
                            <td><input type="text" name="mem_user" class="form-control" value="<?php echo $result['mem_user'] ?>"></td>
                            <td><input type="password" name="mem_pass" class="form-control" value="<?php echo $result['mem_pass'] ?>"></td>
                            <td><input type="text" name="mem_name" class="form-control" value="<?php echo $result['mem_name'] ?>"></td>
                            <td><input type="text" name="mem_last" class="form-control" value="<?php echo $result['mem_last'] ?>"></td>
                            <td><input type="email" name="mem_mail" class="form-control" value="<?php echo $result['mem_mail'] ?>"></td>
                            <td><input type="tel" name="mem_phone" class="form-control" value="<?php echo $result['mem_phone'] ?>"></td>
                            <td><input type="text" name="mem_address" class="form-control" value="<?php echo $result['mem_address'] ?>"></td>
                            <td>
                                <select name="mem_status" class="form-select">
                                    <option value="<?php echo $result['mem_status'] ?>"><?php echo $result['mem_status'] ?></option>
                                    <option value="user">User</option>
                                    <option value="rest">Rest</option>
                                    <option value="rider">Rider</option>
                                </select>
                            </td>
                            <td>
                                <select name="mem_check" class="form-select">
                                    <option value="<?php echo $result['mem_check'] ?>"><?php echo $result['mem_check'] ?></option>
                                    <option value="enable">enable</option>
                                    <option value="disable">disable</option>
                                </select>
                            </td>
                            <td><button type="submit" name="update" class="btn btn-primary form-control">Update</button></td>
                            <td><button type="submit" name="delete" class="btn btn-danger  form-control">Delete</button></td>
                        </form>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</body>

</html>