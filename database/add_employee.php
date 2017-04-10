<?php

require('db_connect.php');

$firstname = $_POST['firstname'];
$lastname = ($_POST['surname']);
$gender = addslashes($_POST['gender']);
$birthdate = ($_POST['birthdate']);
$address = addslashes($_POST['address']);
$city = ($_POST['city']);
$email = ($_POST['email']);
$telephoneno = ($_POST['phoneno']);
$alternativeno = ($_POST['alternativeno']);
$employeetype = $_POST['employeetype'];
$salaryamount = $_POST['salaryamount'];
$contractstart = $_POST['startdate'];
$contractend = $_POST['enddate'];
$test = $_POST['test'];
$getID = mysqli_query($conn, "SELECT id FROM employee ORDER BY id DESC");
$idRow = mysqli_fetch_row($getID);

if ($test === 'pic') {
    $newfilename = $idRow[0] + 1 . "_" . $firstname . "_" . $lastname . '.png';
    $upload_directory = "../repository/employee_photos/";
    move_uploaded_file($_FILES['file']['tmp_name'], $upload_directory . $newfilename);
    $sql_employee = "INSERT INTO employee (first_name, last_name, gender, residential_address, city, telephone_no,
    alternative_no, email, birth_date, photo)
    VALUES ('$firstname', '$lastname', '$gender', '$address', '$city', '$telephoneno', '$alternativeno' , '$email', '$birthdate', '$newfilename')";
} else {
    $sql_employee = "INSERT INTO employee (first_name, last_name, gender, residential_address, city, telephone_no,
    alternative_no, email, birth_date)
    VALUES ('$firstname', '$lastname', '$gender', '$address', '$city', '$telephoneno', '$alternativeno' , '$email', '$birthdate')";
}

$retval1 = mysqli_query($conn, $sql_employee);
if (!$retval1) {
    die('Could not enter data to employee table' . mysqli_connect_error());
}

$employeeid = mysqli_query($conn, "SELECT id from employee ORDER BY id DESC");
$employee_typeid = mysqli_query($conn, "SELECT id from employee_type WHERE employee_type = '$employeetype'");
$employeerow = mysqli_fetch_row($employeeid);
$employee_typeidrow = mysqli_fetch_row($employee_typeid);

$sql_salary = "INSERT INTO employee_contract (amount_of_salary, start_date, end_date, employee_id, employee_type_id)
    VALUES ('$salaryamount','$contractstart','$contractend', '$employeerow[0]', '$employee_typeidrow[0]')";

$retval3 = mysqli_query($conn, $sql_salary);
if (!$retval3) {
    die('Could not enter data to employee contract table' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);

