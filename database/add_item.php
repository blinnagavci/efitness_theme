<?php

require('db_connect.php');

if (isset($_POST['add_item'])) {
    $itemname = $_POST['item_name'];
    $item_company_name = ($_POST['company_name']);
    $item_barcode = $_POST['item_barcode'];
    $item_selling_price = ($_POST['item_selling_price']);
    $item_category = $_POST['item_category'];
    $item_unit = $_POST['item_unit'];


    $getCategory = mysqli_query($conn, "SELECT id from item_category WHERE category = '$item_category'");
    $categoryID = mysqli_fetch_row($getCategory);

    $getUnit = mysqli_query($conn, "SELECT id from item_unit WHERE unit = '$item_unit'");
    $unitID = mysqli_fetch_row($getUnit);

    $sql_item = "INSERT INTO item (name, company_name, barcode, selling_price, quantity, category_id, unit_id)
    VALUES ('$itemname', '$item_company_name', '$item_barcode', '$item_selling_price', '0', '$categoryID[0]', '$unitID[0]')";

    $retval1 = mysqli_query($conn, $sql_item);

    if (!$retval1) {
        die('Could not enter data to item table' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../add_item.php");
}

