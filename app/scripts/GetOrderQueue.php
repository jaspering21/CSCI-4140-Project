<?php
include("../models/Order.php");
$orderQueue = new SplQueue();

$orderQueue->push(Order::create()->setTableID("1")->setOrder("Polish Sandwich")->setStatus("Waiting"));
$orderQueue->push(Order::create()->setTableID("2")->setOrder("Frog Sandwich")->setStatus("Waiting"));
$orderQueue->push(Order::create()->setTableID("1")->setOrder("Cheese Sandwich")->setStatus("Completed"));

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
    echo "<td> <button type=\"button\" class=";
    $buttonClass = $order->getButtonClass($order->status);
    echo "\"$buttonClass\"> $buttonActionMessage  </button>"; 
    echo "</tr>";
  } 