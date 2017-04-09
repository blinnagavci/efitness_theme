<?php

require('db_connect.php');
if (isset($_POST['add_subscriptions_submit'])) {
    $id = $_POST['test-id'];
    $membershiptype = $_POST['member_subscription'];
    $membershipamount = $_POST['membership_amount'];
    $membershipstart = $_POST['membership_start'];
    $membershipend = $_POST['membership_end'];
    $membershipid = mysqli_query($conn, "SELECT id from membership WHERE membership_type = '$membershiptype'");
    $membershiprow = mysqli_fetch_row($membershipid);

    $sql = "INSERT INTO membership_payment (amount_of_payment, start_date, end_date, id_member, id_membership)
    VALUES ('$membershipamount', '$membershipstart', '$membershipend', '$id', '$membershiprow[0]')";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not edit data.' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../search_members.php");
}
