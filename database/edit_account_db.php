<?php

require('db_connect.php');

$id = ($_POST['id']);
$username = ($_POST['username']);
$temporarypassword = ($_POST['temporarypassword']);
$email = ($_POST['email']);
$accounttypeselect = $_POST['account_type'];
$branches = $_POST['branches_array'];
$test = ($_POST['test']);
if ($test === 'pic') {
    //we can use temp but we are converting every pic to PNG for less space
    $newfilename = $id . "_" . $username . "." . "png";
    move_uploaded_file($_FILES['file']['tmp_name'], '../repository/account_photos/' . $newfilename);
}


$getAccount = mysqli_query($conn, "SELECT admin_status FROM account WHERE id = '$id'");
$accountType = mysqli_fetch_row($getAccount);
if ($accountType[0] == 0) {
    if ($accounttypeselect == 1) {
        $getAll = "SELECT username FROM account WHERE admin_status='0' AND status='0'";
        $result = $conn->query($getAll);
        if ($result->num_rows <= 1) {
            echo "2";
            exit();
        }
    }
}
$getAccountPassword = mysqli_query($conn, "SELECT password FROM account WHERE id = '$id'");
$accountPassword = mysqli_fetch_row($getAccountPassword);

if (!($accountPassword[0] == $temporarypassword)) {
    $password = sha1($temporarypassword);
} else {
    $password = $temporarypassword;
}
if ($test === 'pic') {
    $sql = "UPDATE account SET username='$username', password='$password', email='$email', admin_status='$accounttypeselect', branches='$branches', photo='$newfilename' WHERE id = '$id'";
} else {
    $sql = "UPDATE account SET username='$username', password='$password', email='$email', admin_status='$accounttypeselect', branches='$branches' WHERE id = '$id'";
}


$retval1 = mysqli_query($conn, $sql);
if (!$retval1) {
    die(mysqli_error($conn));
} else {
    echo "success";
}

mysqli_close($conn);
?>