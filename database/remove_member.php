<?php

require ('db_connect.php');
$id = $_POST['id'];
$removesql = "UPDATE member SET status='1' WHERE id = '$id'";
if (!(mysqli_query($conn, $removesql))) {
    die("Could not remove member: " . mysqli_error($conn));
} else {
    echo 'success';
}
mysqli_close($conn);
