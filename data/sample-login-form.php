<?php

/*
  Sample Processing of Forgot password form via ajax
  Page: extra-register.html
 */
require('../database/db_connect.php');

# Response Data Array
$resp = array();


// Fields Submitted
$username = $_POST["username"];
$password = $_POST["password"];


// This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js
$resp['submitted_data'] = $_POST;


// Login success or invalid login data [success|invalid]
// Your code will decide if username and password are correct
$login_status = 'invalid';

//if($username == 'demo' && $password == 'demo')
//{
//	$login_status = 'success';
//}

$password = sha1($password);
$sql = "SELECT * FROM account WHERE username='$username' AND password = '$password' AND status='0'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

    //$rows = mysqli_fetch_assoc($query);
    $login_status = 'success';
    session_start();
}

$resp['login_status'] = $login_status;


// Login Success URL
if ($login_status == 'success') {
    $row = mysqli_fetch_assoc($result);

    // If you validate the user you may set the user cookies/sessions here
    #setcookie("logged_in", "user_id");
    #$_SESSION["logged_user"] = "user_id";
    // Set the redirect url after successful login$rows = mysqli_fetch_assoc($query);
    $_SESSION['username'] = $row['username'];
    $_SESSION['logged_in'] = TRUE;
    $_SESSION['admin_status'] = $row['admin_status'];
    $_SESSION['profile_photo'] = $row['photo'];
    $resp['redirect_url'] = 'index.php';
}


echo json_encode($resp);
