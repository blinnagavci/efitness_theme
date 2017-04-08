<?php

require('db_connect.php');
if (isset($_POST['edit_member_submit'])) {

    $id = $_POST['test-id'];
    $firstname = $_POST['member_firstname'];
    $lastname = ($_POST['member_surname']);
    $address = ($_POST['member_address']);
    $gender = ($_POST['member_gender']);
    $city = ($_POST['member_city']);
    $email = ($_POST['member_email']);
    $telephoneno = ($_POST['member_telephone']);
    $alternativeno = ($_POST['member_alternative']);
    $birthdate = ($_POST['member_date']);

    if ($_FILES['member_upload']['name'] != '') {
        $uploadedFileName = $_FILES['member_upload']['name'];
        $temp_name = $_FILES['member_upload']['tmp_name'];
        $temp = explode(".", $_FILES["member_upload"]["name"]);
        $getID = mysqli_query($conn, "SELECT id FROM member ORDER BY id DESC");
        $idRow = mysqli_fetch_row($getID);
        $newfilename = $idRow[0] . "_" . $firstname . "_" . $lastname . '.' . end($temp);
        if ($uploadedFileName != '') {
            $upload_directory = "../repository/member_photos/";
            move_uploaded_file($temp_name, $upload_directory . $newfilename);
        }
        $sql = "UPDATE member SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
                . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate', photo='$newfilename' WHERE id = $id";
    } else {
        $sql = "UPDATE member SET first_name='$firstname', last_name='$lastname', gender='$gender', residential_address='$address', "
                . "city='$city', telephone_no='$telephoneno', alternative_no='$alternativeno', email='$email', birth_date='$birthdate' WHERE id = $id";
    }
    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not edit data.' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../search_members.php");
}
