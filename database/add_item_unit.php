<?php

require('db_connect.php');

if (isset($_POST['add_item_unit_submit'])) {
    $itemunit = $_POST['item_unit_settings'];

    $sql = "INSERT INTO item_unit (unit)
    VALUES ('$itemunit')";

    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to item units table' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}