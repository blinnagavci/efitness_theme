<?php

require('db_connect.php');

if (isset($_POST['submit'])) {
    $itemname = $_POST['item_name'];
    $itemcategory = ($_POST['item_category']);
    $item_barcode = $_POST['item_barcode'];
    $register_date = $_POST['item_register_date'];
    $item_cost = ($_POST['item_cost']);
    $item_price = ($_POST['item_price']);
    $item_quantity = ($_POST['item_quantity']);

    $sql_item = "INSERT INTO item (name, category, barcode, register_date, cost_price, selling_price,
quantity)
VALUES ('$itemname', '$itemcategory', '$item_barcode', '$register_date', '$item_cost', '$item_price', '$item_quantity')";
    $retval1 = mysqli_query($conn, $sql_item);

    if (!$retval1) {
        die('Could not enter data to item table' . mysqli_connect_error());
    } else {
        echo "<script type='text/javascript'>window.alert('Item successfully added')</script>";
    }

    mysqli_close($conn);
    header("refresh: 0; url = ../add_item.php");
}