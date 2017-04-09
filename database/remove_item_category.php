<?php

require('db_connect.php');

if (isset($_POST['remove_item_category_submit'])) {
    $itemcategory = filter_input(INPUT_POST, 'remove_item_category_select');

    $sql = "UPDATE item_category SET status='1' WHERE category = '$itemcategory'";

    $retval1 = mysqli_query($conn, $sql);
    if (!$retval1) {
        die('Could not remove data from item category table' . mysqli_connect_error());
    } else {
//        echo "<script type='text/javascript'>window.alert('Employee type successfully removed')</script>";
    }

    mysqli_close($conn);
    header("location: ../other_settings.php");
}