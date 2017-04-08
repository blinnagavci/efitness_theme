<?php

require ('db_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $removesql = "UPDATE employee SET status='1' WHERE id = '$id'";
    if (!(mysqli_query($conn, $removesql))) {
        die("Could not remove emoloyee: " . mysqli_error($conn));
    }
    header("location: ../search_employees.php");
}