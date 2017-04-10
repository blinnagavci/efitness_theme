<?php

require('db_connect.php');
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = ($_POST['surname']);
$address = ($_POST['address']);
$gender = ($_POST['gender']);
$city = ($_POST['city']);
$email = ($_POST['email']);
$telephoneno = ($_POST['phoneno']);
$alternativeno = ($_POST['alternativeno']);
$birthdate = ($_POST['birthdate']);
$test = $_POST['test'];

if ($test === 'pic') {
    //we can use temp but we are converting every pic to PNG for less space
    $newfilename = $id . "_" . $firstname . "_" . $lastname . ".png";
    move_uploaded_file($_FILES['file']['tmp_name'], '../repository/employee_photos/' . $newfilename);
    $sql = "UPDATE employee SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
            . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate', photo='$newfilename' WHERE id = $id";
} else {
    $sql = "UPDATE employee SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
            . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate' WHERE id = $id";
}

$retval1 = mysqli_query($conn, $sql);
if (!$retval1) {
    die('Could not edit data.' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);
