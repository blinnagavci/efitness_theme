<?php

require ('db_connect.php');
$sellable = $_POST['model'];

$mysql = "SELECT sellable FROM item_category where category='$sellable'";
$retval = mysqli_query($conn, $mysql);
$result = mysqli_fetch_assoc($retval);

if ($result['sellable'] === '1') {
    echo 'nonsellable';
}
mysqli_close($conn);
