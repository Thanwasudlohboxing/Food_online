<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include("../asset/head/head-user.php") ?>
</head>
<?php
include("../connect.php");
$menu_id = $_GET['menu_id'];
$act = $_GET['act'];
if ($act == 'add' && !empty($menu_id)) {
  if (isset($_SESSION['cart'][$menu_id])) {
    $_SESSION['cart']['menu_id']++;
  } else {
    $_SESSION['cart']['menu_id'] = 1;
  }
}

if ($act == 'remove' && !empty($menu_id)) {
  unset($_SESSION['cart']['menu_id']);
}

if ($act == 'update') {
  $amount_array = $_POST['amount'];
  foreach ($amount_array as $menu_id => $amount) {
    $_SESSION['cart']['menu_id'] = $amount;
  }
}

?>

<body>
  <div class="container shadow mb-5 p-5 bg-body rounded">
    <div class="row gx-4 gx-lg-5 row-cols-10 row-cols-md-10-justify-content">
      <div class="card h-100">
        <table class="table">
          <form id="frmcart" name="frmcart" method="post" action="?act=update">
            <tr>
              <td colspan="6">
                <b>
                  <h2>
                    <center>Cart</center>
                  </h2>
                </b>
              </td>
            </tr>
            <tr align="center">
              <td>List</td>
              <td>Product</td>
              <td>Price</td>
              <td>QTY</td>
              <td>Total(Bath)</td>
              <td>Delete</td>
            </tr>
            <?php
            $total = 0;
            $count = 1;
            if (!empty($_SESSION['cart'])) {
              include("../connect.php");
              foreach ($_SESSION['cart'] as $menu_id => $qty) {
                $sql = "SELECT * FROM menu WHERE menu_id = $menu_id";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $sum = $row['menu_price'] * $qty;
                $total += $sum;
                echo "<tr align='center'>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row['menu_name'] . "</td>";
                echo "<td class='f'>" . number_format($row['menu_price'], 2) . "</td>";
                echo "<td>";
                echo "<input type='text' name'amount['menu_id'] value='$qty' size='2'/></td>";
                echo "<td>" . number_format($sum, 2) . "</td>";
                echo "<td><a href='cart.php?menu_id=$menu_id&act=remove' class='btn btn-danger'>Delete</a></td>";
                echo "<tr>";
                $count++;
              }
              echo "<tr>";
              echo "<td colspan='4' align='center'><b>Total</b></td>";
              echo "<td align='right'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
              echo "<td align='left'></td>";
              echo "</tr>";
            }
            ?>
            <tr>
              <td><a href="restaurant.php">
                  <center>Back To Order</center>
                </a></td>
              <td colspan="6" align="right">
                <input type="button" name="Submit2" value="Order" class="btn btn-success " onclick="window.location='confirm.php';" />
              </td>
            </tr>
          </form>
        </table>
      </div>
    </div>
  </div>
</body>

</html>