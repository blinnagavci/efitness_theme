<?php

require('db_connect.php');

if (isset($_POST['edit_item'])) {
    $id = $_POST['test-id'];
    $itemname = $_POST['item_name_edit'];
    $item_company_name = ($_POST['company_name_edit']);
    $item_barcode = $_POST['item_barcode_edit'];
    $item_selling_price = ($_POST['item_selling_price_edit']);
    $item_category = $_POST['item_category_edit'];
    $item_unit = $_POST['item_unit_edit'];


    $getCategory = mysqli_query($conn, "SELECT id from item_category WHERE category = '$item_category'");
    $categoryID = mysqli_fetch_row($getCategory);

    $getUnit = mysqli_query($conn, "SELECT id from item_unit WHERE unit = '$item_unit'");
    $unitID = mysqli_fetch_row($getUnit);


    $sql_item = "UPDATE item SET name = '$itemname', company_name='$item_company_name', barcode='$item_barcode', selling_price='$item_selling_price', "
            . "category_id='$categoryID[0]', unit_id='$unitID[0]' WHERE id='$id' ";

    $retval1 = mysqli_query($conn, $sql_item);

    if (!$retval1) {
        die('Could not edit data to item table' . mysqli_connect_error());
    }

    mysqli_close($conn);
    header("location: ../search_inventory.php");
}

