<?php

require('db_connect.php');

$id = ($_POST['id']);
$unit_price = ($_POST['sellingprice']);
$item_quantity = ($_POST['quantity']);
$item_total = ($unit_price * $item_quantity);

$item_amount = $item_total;

$getProductID = mysqli_query($conn, "SELECT id from item WHERE id = '$id'");
$productID = mysqli_fetch_row($getProductID);
$getProductQuantity = mysqli_query($conn, "SELECT quantity from item WHERE id = '$id'");
$productQuantity = mysqli_fetch_row($getProductQuantity);

$updatedQuantity = $productQuantity[0] - $item_quantity;

if ($updatedQuantity < 0) {
    echo "outofstock";
    mysqli_close($conn);
} else {
    $sql_payment_out = "INSERT INTO item_payment_out (unit_price, quantity, payment_amount, product_id)
        VALUES ('$unit_price', '$item_quantity', '$item_amount', '$productID[0]]')";

    $retval1 = mysqli_query($conn, $sql_payment_out);

    if (!$retval1) {
        die('Could not enter data to item_payment_out table' . mysqli_connect_error());
    }

    $sql_item = "UPDATE item SET quantity = '$updatedQuantity' WHERE id = '$id'";

    $retval2 = mysqli_query($conn, $sql_item);

    if (!$retval2) {
        die('Could not update quantity to item table' . mysqli_connect_error());
    } else {
        echo "success";
    }
    mysqli_close($conn);
}
