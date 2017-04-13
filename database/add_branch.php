<?php

require('db_connect.php');

if (isset($_POST['add_branch_submit'])) {
    $branch_city = $_POST['branch_city'];
    $branch_name = $_POST['branch_name'];

    $sql = "INSERT INTO branches (city, branch)
    VALUES ('$branch_city', '$branch_name')";

    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to branches table' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}