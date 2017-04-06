<?php

require('db_connect.php');
$username = $_POST['username'];
$temporarypassword = $_POST['password'];
$password = sha1("$temporarypassword");
$query = "SELECT * FROM account WHERE username='$username' and password='$password'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
if ($count == 1) {
    session_start();
    $rows = mysqli_fetch_assoc($result);
    $_SESSION['logged_in'] = TRUE;
    $_SESSION['admin_status'] = $rows['admin_status'];
    echo "1";
    return true;
}
    
