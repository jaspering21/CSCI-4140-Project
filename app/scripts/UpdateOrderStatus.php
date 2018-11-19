<?php
include_once('../models/Order.php');
include_once('../create_session.php');

function after ($text, $inthat){
    if (!is_bool(strpos($inthat, $text)))
    return substr($inthat, strpos($inthat,$text)+strlen($text));
};


$orderID = after('orderID', $_POST['orderID']);
$statusMessage = $_POST['statusMessage'];


$query = "SELECT o_status
FROM tableorder
WHERE to_id = $orderID
";
$result = mysqli_query($GLOBALS['db'], $query);

$row = mysqli_fetch_assoc($result);

$statusMessage = $row['o_status'];

$order = new Order();
$order->setStatus($statusMessage);
$status = $order->status;
$order->toggleStatus();
$status = $order->status;
$buttonActionMessage = $order->getTableActionMessage($status);

$query = "UPDATE tableorder
SET o_status = '$status'
WHERE to_id = '$orderID'
";

mysqli_query($GLOBALS['db'], $query);

/*
$buttonActionMessage = $order->getTableActionMessage($order->status);
echo "<button type=\"button\" onclick=\"updateOrderStatus(this)\" class=";
    $buttonClass = $order->getButtonClass($order->status);
    echo "\"$buttonClass\"> $buttonActionMessage  </button>";
    */
