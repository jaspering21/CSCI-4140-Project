<?php
include("../models/Order.php");
include("../create_session.php");
/*$orderQueue = new SplQueue();

$orderQueue->push(Order::create()->setTableID("1")->setOrder("Polish Sandwich")->setStatus("Waiting"));
$orderQueue->push(Order::create()->setTableID("2")->setOrder("Frog Sandwich")->setStatus("Waiting"));
$orderQueue->push(Order::create()->setTableID("1")->setOrder("Cheese Sandwich")->setStatus("Completed"));

*/
$orderQueue = new SplQueue();

$query = "SELECT t.tid, r.t_number, m.m_name, t.table_id, t.order_status
FROM tableorder as t, tablerecord as r, menu as m
WHERE t.m_id = m.m_id and t.table_id = r.table_id
ORDER BY t.tid DESC
LIMIT 25
";

$result = mysqli_query($GLOBALS['db'], $query);


if (mysqli_num_rows($result) > 0) {
    // output data of each row. Need to fix order IDs on buttons so that thye change the right one
    while($row = mysqli_fetch_assoc($result)) {
        $orderQueue->push(Order::create()->setTableID($row['t_number'])->setOrder($row['m_name'])->setStatus($row['order_status'])->setOrderID($row['tid']));
    }
}
if(!$result){
    error_log(mysqli_error($GLOBALS['db']));
}

/*Ensure Queue stays manageable in size*/
while($orderQueue->count() > 25){
	$orderQueue->pop();
}


foreach ($orderQueue as $order){
    echo "<tr>";
    echo "<td>" . $order->tableID . "</td>";
    echo "<td>" . $order->order . "</td>";
    echo "<td>" . $order->status . "</td>";
    $buttonActionMessage = $order->getTableActionMessage($order->status);
    echo "<td> <button type=\"button\" id=orderID{$order->orderID} onclick=\"updateOrderStatus(this)\" class=";
    $buttonClass = $order->getButtonClass($order->status);
    echo "\"$buttonClass\"> $buttonActionMessage  </button>"; 
    echo "</tr>";
  } 