<?php

require('db_connect.php');
$id = $_POST['id'];
$membershiptype = $_POST['membershiptype'];
$membershipamount = $_POST['membershipamount'];
$membershipstart = $_POST['membershipstart'];
$membershipend = $_POST['membershipend'];
$membershipid = mysqli_query($conn, "SELECT id from membership WHERE membership_type = '$membershiptype'");
$membershiprow = mysqli_fetch_row($membershipid);

$sql = "INSERT INTO membership_payment (amount_of_payment, start_date, end_date, id_member, id_membership)
    VALUES ('$membershipamount', '$membershipstart', '$membershipend', '$id', '$membershiprow[0]')";

$retval1 = mysqli_query($conn, $sql);
if (!$retval1) {
    die('Could not edit data.' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);

