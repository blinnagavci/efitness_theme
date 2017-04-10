<?php

require('db_connect.php');
if (isset($_POST['edit_employee_submit'])) {
    $id = $_POST['test-id'];
    $firstname = $_POST['employee_firstname'];
    $lastname = ($_POST['employee_surname']);
    $address = ($_POST['employee_address']);
    $gender = ($_POST['employee_gender']);
    $city = ($_POST['employee_city']);
    $email = ($_POST['employee_email']);
    $telephoneno = ($_POST['employee_telephone']);
    $alternativeno = ($_POST['employee_alternative']);
    $birthdate = ($_POST['employee_date']);

    if ($_FILES['employee_upload']['name'] != '') {
        $uploadedFileName = $_FILES['employee_upload']['name'];
        $temp_name = $_FILES['employee_upload']['tmp_name'];
        $temp = explode(".", $_FILES["employee_upload"]["name"]);
        $getID = mysqli_query($conn, "SELECT id FROM employee ORDER BY id DESC");
        $idRow = mysqli_fetch_row($getID);
        $newfilename = $idRow[0] . "_" . $firstname . "_" . $lastname . '.' . end($temp);
        if ($uploadedFileName != '') {
            $upload_directory = "../repository/employee_photos/";
            move_uploaded_file($temp_name, $upload_directory . $newfilename);
        }
        $sql = "UPDATE employee SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
                . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate', photo='$newfilename' WHERE id = $id";
    } else {
        $sql = "UPDATE employee SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
                . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate' WHERE id = $id";
    }
    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not edit data.' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../search_employees.php");
}