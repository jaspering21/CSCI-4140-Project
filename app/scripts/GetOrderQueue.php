<?php
include("../models/Order.php");
include("../create_session.php");
/*$orderQueue = new SplQueue();

$orderQueue->push(Order::create()->setTableID("1")->setOrder("Polish Sandwich")->setStatus("Waiting"));
$orderQueue->push(Order::create()->setTableID("2")->setOrder("Frog Sandwich")->setStatus("Waiting"));
$orderQueue->push(Order::create()->setTableID("1")->setOrder("Cheese Sandwich")->setStatus("Completed"));

*/
$orderQueue = new SplQueue();

$query = "SELECT t.to_id, m.m_name, t.table_id, t.o_status
FROM tableorder as t, menu as m
WHERE t.m_id = m.m_id and t.branch_id = {$_SESSION['branchID']}
ORDER BY to_id DESC";

$result = mysqli_query($GLOBALS['db'], $query);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $orderQueue->push(Order::create()->setTableID($row['table_id'])->setOrder($row['m_name'])->setStatus($row['o_status'])->setOrderID($row['to_id']));
    }
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