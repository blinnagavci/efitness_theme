<?php

require ('db_connect.php');
$id = $_POST['id'];
$taskname = $_POST['taskname'];

$sql = "INSERT INTO tasks (name, account_id) VALUES ('$taskname', '$id')";
$executesql = mysqli_query($conn, $sql);

if (!$executesql) {
    die('Could not enter data to tasks table' . mysqli_connect_error());
}

mysqli_close($conn);

