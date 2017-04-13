<?php

require('db_connect.php');

if (isset($_POST['remove_employee_type_submit'])) {
    $employeeId = filter_input(INPUT_POST, 'remove_employee_type_select');

    $sql = "UPDATE employee_type SET status='1' WHERE id = '$employeeId'";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not remove data from employee type table' . mysqli_connect_error());
    } else {
//        echo "<script type='text/javascript'>window.alert('Employee type successfully removed')</script>";
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}