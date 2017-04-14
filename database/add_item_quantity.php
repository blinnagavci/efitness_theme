<?php

require('db_connect.php');

if (isset($_POST['add_item_quantity'])) {
    $id = ($_POST['test-id']);
    $item_price = ($_POST['item_price']);
    $item_quantity = ($_POST['item_quantity']);
    $item_tax = $_POST['item_tax'];
    
    $item_temporary_tax = $item_tax / 100;
    $tax = ($item_price * $item_quantity) * $item_temporary_tax;
    $item_total = ($item_price * $item_quantity) + $tax;
    
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
    }

    mysqli_close($conn);
    header("location: ../search_inventory.php");
}

