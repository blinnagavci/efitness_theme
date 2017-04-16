<?php

require('db_connect.php');

if (isset($_POST['add_item'])) {
    $itemname = $_POST['name'];
    $item_company_name = ($_POST['company']);
    $item_barcode = $_POST['barcode'];
    $item_selling_price = ($_POST['sellingprice']);
    $item_category = $_POST['category'];
    $item_unit = $_POST['unit'];


    $getCategory = mysqli_query($conn, "SELECT id from item_category WHERE category = '$item_category'");
    $categoryID = mysqli_fetch_row($getCategory);

    $getUnit = mysqli_query($conn, "SELECT id from item_unit WHERE unit = '$item_unit'");
    $unitID = mysqli_fetch_row($getUnit);

    $sql_item = "INSERT INTO item (name, company_name, barcode, selling_price, quantity, category_id, unit_id)
    VALUES ('$itemname', '$item_company_name', '$item_barcode', '$item_selling_price', '0', '$categoryID[0]', '$unitID[0]')";

    $retval1 = mysqli_query($conn, $sql_item);

    if (!$retval1) {
        die('Could not enter data to item table' . mysqli_connect_error());
    }else{
        echo "success";
    }

    mysqli_close($conn);
}

