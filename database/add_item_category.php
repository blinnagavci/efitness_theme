<?php

require('db_connect.php');

if (isset($_POST['add_item_category_submit'])) {
    $itemcategory = $_POST['item_category_settings'];
    $item_sellable = $_POST['item_category_sellable'];

    $sql = "INSERT INTO item_category (category, sellable, status)
    VALUES ('$itemcategory', $item_sellable, '0')";

    $retval1 = mysqli_query($conn, $sql);

    if (!$retval1) {
        die('Could not enter data to item category table' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}