<?php

require ('db_connect.php');
$id = $_POST['id'];

$getAccount = mysqli_query($conn, "SELECT admin_status FROM account WHERE id = '$id'");
$accountType = mysqli_fetch_row($getAccount);

if ($accountType[0] == 0) {
    $getAll = "SELECT username FROM account WHERE admin_status='0' AND status='0'";
    $result = $conn->query($getAll);

    if ($result->num_rows <= 1) {
        echo "oneadmin";
        exit();
    }
}

$removesql = "UPDATE account SET status='1' WHERE id = '$id'";

if (mysqli_query($conn, $removesql)) {
    echo 'success';
} else {
    die("Could not remove account: " . mysqli_error($conn));
}
mysqli_close($conn);
