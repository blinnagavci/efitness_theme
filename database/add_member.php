<?php

require('db_connect.php');


$firstname = $_POST['firstname'];
$surname = ($_POST['surname']);
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$city = ($_POST['city']);
$email = ($_POST['email']);
$telephoneno = ($_POST['phoneno']);
$alternativeno = ($_POST['alternativeno']);
$birthdate = ($_POST['birthdate']);
$membershiptype = $_POST['membershiptype'];
$membershipamount = $_POST['membershipamount'];
$membershipstart = $_POST['startdate'];
$membershipend = $_POST['enddate'];
$test = ($_POST['test']);

$getID = mysqli_query($conn, "SELECT id FROM member ORDER BY id DESC");
$idRow = mysqli_fetch_row($getID);

if ($test === 'pic') {
    $newfilename = $idRow[0] + 1 . "_" . $firstname . "_" . $surname . ".png";
    $upload_directory = "../repository/member_photos/";
    move_uploaded_file($_FILES['file']['tmp_name'], $upload_directory . $newfilename);
    $sql_member = "INSERT INTO member (first_name, last_name, gender, residential_address, city, telephone_no,
alternative_no, email, birth_date, photo)
VALUES ('$firstname', '$surname', '$gender', '$address', '$city', '$telephoneno', '$alternativeno' , '$email', '$birthdate', '$newfilename')";
} else {
    $sql_member = "INSERT INTO member (first_name, last_name, gender, residential_address, city, telephone_no,
    alternative_no, email, birth_date)
    VALUES ('$firstname', '$surname', '$gender', '$address', '$city', '$telephoneno', '$alternativeno' , '$email', '$birthdate')";
}

$retval1 = mysqli_query($conn, $sql_member);
if (!$retval1) {
    die('Could not enter data to member table' . mysqli_connect_error());
}


$memberid = mysqli_query($conn, "SELECT id from member ORDER BY id DESC");
$membershipid = mysqli_query($conn, "SELECT id from membership WHERE membership_type = '$membershiptype'");
$memberrow = mysqli_fetch_row($memberid);
$membershiprow = mysqli_fetch_row($membershipid);

$sql_membershippayment = "INSERT INTO membership_payment(amount_of_payment, start_date, end_date, id_member, id_membership)
VALUES ('$membershipamount','$membershipstart','$membershipend', '$memberrow[0]', '$membershiprow[0]')";

$retval2 = mysqli_query($conn, $sql_membershippayment);
if (!$retval2) {
    die('Could not enter data to membership payment table' . mysqli_connect_error());
} else {
    echo 'success';
}

mysqli_close($conn);
?>