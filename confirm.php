<?php
session_start();
include('../connect.php');

$menu_id = $_GET['menu_id'];
$act = $_GET['act'];

if ($act == 'add' && !empty($menu_id)) {
    if (isset($_SESSION['cart'][$menu_id])) {
        $_SESSION['cart'][$menu_id]++;
    } else {
        $_SESSION['cart'][$menu_id] = 1;
    }
}

if ($act == 'remove' && !empty($menu_id)) {
    unset($_SESSION['cart'][$menu_id]);
}

if ($act == 'update') {
    $amount_array = $_POST['amount'];
    foreach ($amount_array as $menu_id => $amount) {
        $_SESSION['cart'][$menu_id] = $amount;
    }
}

// Check if the user is logged in
if (isset($_SESSION['mem_id'])) {
    $mem_id = $_SESSION['mem_id'];
    $res_id = $_SESSION['res_id'];
    $order_group = uniqid(); // Generate a unique order group identifier

    // Insert order details into the 'orders' table
    foreach ($_SESSION['cart'] as $menu_id => $qty) {
        $sql = "SELECT * FROM menu WHERE menu_id = $menu_id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);

        $menu_name = $row['menu_name'];
        $order_qty = $qty;
        $order_price = $row['menu_price'];
        $order_status = 'Pending'; // Set the initial order status
        $order_date = date('Y-m-d H:i:s'); // Current date and time
        $order_success = 'No'; // Set the initial order success status
        $mem_status = 'Active'; // Set the initial member status

        // Insert data into the 'orders' table
        $insert_sql = "INSERT INTO orders (res_id, mem_id, menu_id, menu_name, order_qty, order_price, order_status, order_date, order_success, mem_status, order_group)
                       VALUES ('$res_id', '$mem_id', '$menu_id', '$menu_name', '$order_qty', '$order_price', '$order_status', '$order_date', '$order_success', NULL, '$order_group')";

        mysqli_query($conn, $insert_sql);
    }

    // Clear the shopping cart after placing the order
    unset($_SESSION['cart']);

    // Redirect to the confirmation page
    header("location: order.php");
} else {
    // Redirect to the login page if the user is not logged in
    header("location: login.php");
}
?>
