<?php
    $conn = mysqli_connect("localhost","root","","food_online") or die("Error: " . mysqli_error($conn));
    mysqli_query($conn, "SET NAMES 'utf8' "); 
?>