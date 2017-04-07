<?php

require('db_connect.php');

if (isset($_POST['submit'])) {
    $username = $_POST['account_username'];
    $temporary_password = ($_POST['account_password']);
    $email = ($_POST['account_email']);
    $accounttype = $_POST['account_type'];

    $password = sha1($temporary_password);
    $uploadedFileName = $_FILES['account_upload']['name'];
    $temp_name = $_FILES['account_upload']['tmp_name'];
    $temp = explode(".", $_FILES["account_upload"]["name"]);
    $getID = mysqli_query($conn, "SELECT id FROM account ORDER BY id DESC");
    $idRow = mysqli_fetch_row($getID);
    $newfilename = $idRow[0] + 1 . "_" . $username . '.' . end($temp);
    if (!($_FILES['account_upload']['name'] == "")) {
        $sql_account = "INSERT INTO account (username, password, email, admin_status, status, photo)
VALUES ('$username', '$password', '$email', '$accounttype', '0', '$newfilename')";
    } else {
        $sql_account = "INSERT INTO account (username, password, email, admin_status, status)
VALUES ('$username', '$password', '$email', '$accounttype', '0')";
    }
    if ($uploadedFileName != '') {
        $upload_directory = "../repository/account_photos/";
        move_uploaded_file($temp_name, $upload_directory . $newfilename);
    }
    $retval1 = mysqli_query($conn, $sql_account);

    if (!$retval1) {
        die('Could not enter data to account table' . mysqli_connect_error());
    } else {
//        echo "<script type='text/javascript'>window.alert('Account successfully added')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../accounts.php");
}

