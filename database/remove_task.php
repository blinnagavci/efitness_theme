<?php

require ('db_connect.php');
$id = $_POST['id'];

$sql = "UPDATE tasks SET status='1' WHERE id='$id'";

if (!(mysqli_query($conn, $sql))) {
    die("Could not remove the task: " . mysqli_error($conn));
}

mysqli_close($conn);
