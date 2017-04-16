<?php

require('db_connect.php');
$id = $_POST['id'];
$membershipId = $_POST['membershipId'];
$membershipstart = $_POST['membershipstart'];
$membershipend = $_POST['membershipend'];

$sql = "INSERT INTO membership_payment (start_date, end_date, id_member, id_membership)
    VALUES ('$membershipstart', '$membershipend', '$id', '$membershipId')";

$retval1 = mysqli_query($conn, $sql);
if (!$retval1) {
    die('Could not edit data.' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);

