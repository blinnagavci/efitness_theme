<?php

require ('db_connect.php');
$id = $_POST['id'];
$removesql = "UPDATE item SET status = '1' WHERE id = '$id'";

if (!(mysqli_query($conn, $removesql))) {
    die("Could not remove item: " . mysqli_error($conn));
} else {
    echo "success";
}

mysqli_close($conn);
