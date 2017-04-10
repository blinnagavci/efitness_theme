<?php

require('db_connect.php');

$id = $_POST['id'];
$employeetype = $_POST['employeesubscription'];
$salaryamount = $_POST['salaryamount'];
$employeestart = $_POST['employeestart'];
$employeeend = $_POST['employeeend'];
$employeeid = mysqli_query($conn, "SELECT id from employee_type WHERE employee_type = '$employeetype'");
$employeerow = mysqli_fetch_row($employeeid);

$sql = "INSERT INTO employee_contract (amount_of_salary, start_date, end_date, employee_id, employee_type_id)
    VALUES ('$salaryamount', '$employeestart', '$employeeend', '$id', '$employeerow[0]')";

$retval1 = mysqli_query($conn, $sql);
if (!$retval1) {
    die('Could not enter data to employee contract table' . mysqli_connect_error());
} else {
    echo 'success';
}

mysqli_close($conn);
