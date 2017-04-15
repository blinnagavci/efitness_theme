<?php

require ('db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $removesql = "UPDATE item SET status = '1' WHERE id = '$id'";
    
    if (!(mysqli_query($conn, $removesql))) {
        die("Could not remove item: " . mysqli_error($conn));
    }
    mysqli_close($conn);
    header("location: ../search_inventory.php");
}