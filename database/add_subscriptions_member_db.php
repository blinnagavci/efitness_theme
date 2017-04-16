<?php

require('db_connect.php');
$memberId = $_POST['id'];
$membershipId = $_POST['membershipId'];
$membershipstart = $_POST['membershipstart'];
$membershipend = $_POST['membershipend'];

$sql = "SELECT amount FROM membership WHERE id= '$membershipId'";
$retval = mysqli_query($conn, $sql);
$amount = mysqli_fetch_row($retval);

$sql1 = "INSERT INTO membership_payment (start_date, end_date, amount, id_member, id_membership)
    VALUES ('$membershipstart', '$membershipend', '$amount[0]', '$memberId', '$membershipId')";

$retval1 = mysqli_query($conn, $sql1);
if (!$retval1) {
    die('Could not edit data.' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);

