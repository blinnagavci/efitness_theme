<?php

require('db_connect.php');

$id = $_POST['id'];
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


$sql_item = "UPDATE item SET name = '$itemname', company_name='$item_company_name', barcode='$item_barcode', selling_price='$item_selling_price', "
        . "category_id='$categoryID[0]', unit_id='$unitID[0]' WHERE id='$id' ";

$retval1 = mysqli_query($conn, $sql_item);

if (!$retval1) {
    die('Could not edit data to item table' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);

