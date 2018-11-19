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
			$query = "INSERT into tableorder(branch_id, m_id, table_id) VALUES( {$_SESSION['branchID']},$order_id, {$_SESSION['tableID']})";
			$result = mysqli_query($GLOBALS['db'], $query);
			/* Testing Code
			if($result)
				{
				echo "Success";

				}
				else
				{
				echo "Error";
				echo mysqli_error($GLOBALS['db']);

				}
			}*/
			}
	}
}

/*Redirect user to checkout page*/
header("location: ../checkout.php");

