<?php
include_once("../create_session.php");
include_once("MenuItem.php");
include_once("../models/Order.php");

/* Insert values into database order table */


$item = new MenuItem();
$order = new Order();
$orderedItems = new SplDoublyLinkedList();

foreach ($_POST as $key => $value ){
	$order_id = $item->decodePostVariable($key);
	if ($order_id != false){
		$counter = 0;
		while ($counter < $value ){
			$counter++;
			$query = "BEGIN;";
			mysqli_query($GLOBALS['db'], $query);
			$query = "INSERT into tablerecord(t_date, t_number) VALUES (CURDATE(), {$_SESSION['tableID']});";
			
			mysqli_query($GLOBALS['db'], $query);
			$query = "INSERT into tableorder(m_id, table_id) VALUES ($order_id, {$_SESSION['tableID']});";
			mysqli_query($GLOBALS['db'], $query);
			$query ="COMMIT;";
			$result = mysqli_query($GLOBALS['db'], $query);
			
			
			}
	}
}

/*Redirect user to checkout page*/
header("location: ../checkout.php");

