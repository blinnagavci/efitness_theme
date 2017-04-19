<?php

/*
  Sample Processing of Forgot password form via ajax
  Page: extra-register.html
 */
require('../database/db_connect.php');

# Response Data Array
$resp = array();


// Fields Submitted
$code = $_POST["test_code"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];


// This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js
$resp['submitted_data'] = $_POST;


// Login success or invalid login data [success|invalid]
// Your code will decide if username and password are correct
$login_status = 'invalid';


if ($password === $confirm_password) {
    $pass = sha1($password);

    $getAccountID = mysqli_query($conn, "SELECT id FROM account WHERE random_string='$code'");
    $accountID = mysqli_fetch_row($getAccountID);

    $sql = "UPDATE account set password='$pass', random_string='expired' WHERE id='$accountID[0]'";

    if (mysqli_query($conn, $sql)) {
        $login_status = 'success';
    }

}

$resp['login_status'] = $login_status;


// Login Success URL
if ($login_status == 'success') {
    // If you validate the user you may set the user cookies/sessions here
    #setcookie("logged_in", "user_id");
    #$_SESSION["logged_user"] = "user_id";
    // Set the redirect url after successful login$rows = mysqli_fetch_assoc($query);
    $resp['redirect_url'] = 'extra-login.php';
}


echo json_encode($resp);
