<?php

require('db_connect.php');

$id = ($_POST['id']);
$item_price = ($_POST['costprice']);
$item_quantity = ($_POST['quantity']);


$item_total = ($item_price * $item_quantity);

$item_amount = $item_total;

$getProductID = mysqli_query($conn, "SELECT id from item WHERE id = '$id'");
$productID = mysqli_fetch_row($getProductID);
$getProductQuantity = mysqli_query($conn, "SELECT quantity from item WHERE id = '$id'");
$productQuantity = mysqli_fetch_row($getProductQuantity);


$sql_payment_in = "INSERT INTO item_payment_in (cost_price, quantity, payment_amount, product_id)
    VALUES ('$item_price', '$item_quantity', '$item_amount', '$productID[0]]')";

$retval1 = mysqli_query($conn, $sql_payment_in);

if (!$retval1) {
    die('Could not enter data to item_payment_in table' . mysqli_connect_error());
}


$updatedQuantity = $productQuantity[0] + $item_quantity;
$sql_item = "UPDATE item SET quantity = '$updatedQuantity' WHERE id = '$id'";

$retval2 = mysqli_query($conn, $sql_item);

if (!$retval2) {
    die('Could not update quantity to item table' . mysqli_connect_error());
} else {
    echo "success";
}

mysqli_close($conn);


