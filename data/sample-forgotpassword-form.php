<?php

/*
  Sample Processing of Forgot password form via ajax
  Page: extra-register.html
 */

# Response Data Array
$resp = array();

// Fields Submitted
$email = $_POST["email"];

// This array of data is returned for demo purpose, see assets/js/neon-forgotpassword.js

include('../database/db_connect.php');

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 25; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}

$sql_email = "SELECT email FROM account WHERE email= '$email'";
$retval = mysqli_query($conn, $sql_email);
$email2 = mysqli_fetch_row($retval);

if ($email2[0] === $email) {
    $sql = "Update account set random_string='$randomString' where email='$email'";
    if (mysqli_query($conn, $sql)) {
        
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    require '../assets/PHPMailer-master/PHPMailerAutoload.php';
    $message = '
               <html>
               <head>
               <title>Forgot Password?</title>
               </head>
               <body>
                <p>Click on the link below to change the password </p>
                <a href=\'http://localhost/2017/efitness_theme/renew_password.php?code=' . $randomString . '\'>http://localhost/2017/efitness_theme/renew_password.php?code=' . $randomString . '</a>
            </body>
              </html>
                ';


    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'smpks17@gmail.com';                 // SMTP username
    $mail->Password = 'smponline';                           // SMTP password
    $mail->setFrom('smpks17@gmail.com', 'E-Fitness');
    $mail->addAddress($email, '');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('smpks17@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Forgot Password?';
    $mail->Body = preg_replace('/\[\]/', '', $message);
    $mail->AltBody = '';

    if (!$mail->send()) {
        echo $email;
        echo 'Message could not be sent.' . $email . '';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        // echo 'Message has been sent';
    }

    $resp['submitted_data'] = $_POST;

    echo json_encode($resp);
} else {
    
}







