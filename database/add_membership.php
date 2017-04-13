<?php

require('db_connect.php');

if (isset($_POST['add_membership_submit'])) {
    $membership_type = $_POST['membership_type'];
    $membership_offer_name = $_POST['membership_offer_name'];
    $branches = implode(',', $_POST['branches_select_multiple']);
    $membership_payment_amount = $_POST['membership_payment_amount'];


    $sql = "INSERT INTO membership (membership_type, offer, amount, branches)
    VALUES ('$membership_type', '$membership_offer_name', '$membership_payment_amount', '$branches')";

    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to membership table' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}