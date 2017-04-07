<?php

require ('db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $removesql = "DELETE FROM item WHERE id = '$id'";
    
    if (!(mysqli_query($conn, $removesql))) {
        die("Could not remove member: " . mysqli_error($conn));
    }
    mysqli_close($conn);
    header("location: ../search_inventory.php");
}