<?php

require('db_connect.php');

if (isset($_POST['add_membership_submit'])) {
    $membership_type = $_POST['membershiptype_settings'];

    $sql = "INSERT INTO membership (membership_type, status)
    VALUES ('$membership_type', '0')";

    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to membership table' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}