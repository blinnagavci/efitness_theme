<?php

require('db_connect.php');

if (isset($_POST['remove_branch_submit'])) {
    $branchId = filter_input(INPUT_POST, 'remove_branch_select');

    $sql = "UPDATE branches SET status='1' WHERE id = '$branchId'";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not remove data from branch table' . mysqli_connect_error());
    } else {
//        echo "<script type='text/javascript'>window.alert('Employee type successfully removed')</script>";
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}