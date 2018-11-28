<?php
include_once('../models/Order.php');
include_once('../create_session.php');

function after ($text, $inthat){
    if (!is_bool(strpos($inthat, $text)))
    return substr($inthat, strpos($inthat,$text)+strlen($text));
};

$orderID = after('orderID', $_POST['orderID']);
$statusMessage = $_POST['statusMessage'];

$query = "SELECT order_status
FROM tableorder
WHERE tid = $orderID
";
$result = mysqli_query($GLOBALS['db'], $query);


$row = mysqli_fetch_assoc($result);

$statusMessage = $row['order_status'];

$order = new Order();
$order->setStatus($statusMessage);
$status = $order->status;
error_log("First status" . $status);
$order->toggleStatus();
$status = $order->status;
$buttonActionMessage = $order->getTableActionMessage($status);

error_log("Second status" . $status);
$query = "
UPDATE tableorder
SET order_status = \"$status\"
WHERE tid = '$orderID';
";
error_log('query =' . $query);

mysqli_query($GLOBALS['db'], $query);
error_log(mysqli_error($GLOBALS['db']));
/** QUERY NOT WORKING DUE TO tableRecordID not being accessible
$query = "
UPDATE tablerecord
SET  e_id = {$_SESSION['userID']}
WHERE table_id = {$_SESSION['tableRecordID']}
 ";

mysqli_query($GLOBALS['db'], $query);
error_log(mysqli_error($GLOBALS['db']));
*/


