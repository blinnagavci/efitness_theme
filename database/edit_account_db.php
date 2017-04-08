<?php

require('db_connect.php');
if (isset($_POST['account_edit_submit'])) {


    $id = $_POST['test-id'];
    $username = $_POST['account_username'];
    $temporary_password = ($_POST['account_password']);
    $email = ($_POST['account_email']);
    $accounttypeselect = $_POST['account_type'];

    $getAccountPassword = mysqli_query($conn, "SELECT password FROM account WHERE id = '$id'");
    $accountPassword = mysqli_fetch_row($getAccountPassword);

    if (!($accountPassword[0] == $temporary_password)) {
        $password = sha1($temporary_password);
    } else {
        $password = $temporary_password;
    }


    $getAccount = mysqli_query($conn, "SELECT admin_status FROM account WHERE id = '$id'");
    $accountType = mysqli_fetch_row($getAccount);

    if ($accountType[0] == 0) {
        if ($accounttypeselect == 1) {
            $getAll = "SELECT username FROM account WHERE admin_status='0' AND status='0'";
            $result = $conn->query($getAll);

            if ($result->num_rows <= 1) {
                echo "<script type=text/javascript>window.alert('You must have at least one Admin account')</script>";
                header("refresh: 0; url = ../accounts.php");
                exit();
            }
        }
    }
    if ($_FILES['account_upload']['name'] != '') {
        $uploadedFileName = $_FILES['account_upload']['name'];
        $temp_name = $_FILES['account_upload']['tmp_name'];
        $getID = mysqli_query($conn, "SELECT id FROM member ORDER BY id DESC");
        $idRow = mysqli_fetch_row($getID);
        $newfilename = $idRow[0] . "_" . $username . ".png";
        if ($uploadedFileName != '') {
            $upload_directory = "../repository/account_photos/";
            move_uploaded_file($temp_name, $upload_directory . $newfilename);
        }
        $sql = "UPDATE account SET username='$username', password='$password', email='$email', admin_status='$accounttypeselect', photo='$newfilename' WHERE id = $id";
    } else {
        $sql = "UPDATE account SET username='$username', password='$password', email='$email', admin_status='$accounttypeselect' WHERE id = $id";
    }
    $retval1 = mysqli_query($conn, $sql);


    if (!$retval1) {
        die(mysqli_error($conn));
    }

    mysqli_close($conn);
    header("location: ../accounts.php");
}
?>