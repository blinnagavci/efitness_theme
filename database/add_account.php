<?php

require('db_connect.php');

$username = $_POST['username'];
$temporary_password = ($_POST['temporarypassword']);
$email = ($_POST['email']);
$accounttype = $_POST['account_type'];
$branches = $_POST['branches_array'];
//$branches = implode(',', $_POST['branches_select_multiple']);
$test = ($_POST['test']);
$password = sha1($temporary_password);
$getID = mysqli_query($conn, "SELECT id FROM account ORDER BY id DESC");
$idRow = mysqli_fetch_row($getID);

$getEmails = "SELECT * FROM account";

$result = $conn->query($getEmails);

while($row = $result->fetch_assoc()){
    if($row['email'] === $email){
        echo 'emailexists';
        exit();
    }
}

if ($test === 'pic') {
    //we can use temp but we are converting every pic to PNG for less space
    $newfilename = $idRow[0] + 1 . "_" . $username . "." . "png";
    move_uploaded_file($_FILES['file']['tmp_name'], '../repository/account_photos/' . $newfilename);
    $sql_account = "INSERT INTO account (username, password, email, admin_status, branches, status, photo)
VALUES ('$username', '$password', '$email', '$accounttype', '$branches', '0', '$newfilename')";
} else {
    $sql_account = "INSERT INTO account (username, password, email, admin_status, branches, status)
VALUES ('$username', '$password', '$email', '$accounttype', '$branches', '0')";
}
$retval1 = mysqli_query($conn, $sql_account);

if (!$retval1) {
    die('Could not enter data to account table' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);

