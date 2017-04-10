<?php

require('db_connect.php');

if (isset($_POST['add_contracts_submit'])) {
    $id = $_POST['test-id'];
    $employeetype = $_POST['employee_subscription'];
    $salaryamount = $_POST['salary_amount'];
    $employeestart = $_POST['employee_start'];
    $employeeend = $_POST['employee_end'];
    $employeeid = mysqli_query($conn, "SELECT id from employee_type WHERE employee_type = '$employeetype'");
    $employeerow = mysqli_fetch_row($employeeid);

    $sql = "INSERT INTO employee_contract (amount_of_salary, start_date, end_date, employee_id, employee_type_id)
    VALUES ('$salaryamount', '$employeestart', '$employeeend', '$id', '$employeerow[0]')";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not enter data to employee contract table' . mysqli_connect_error());
    }
    
    mysqli_close($conn);
    header("location: ../search_employees.php");
}
