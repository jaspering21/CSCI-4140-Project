<?php
include_once("../create_session.php");
include_once("MenuItem.php");
include_once("../models/Order.php");

/*Get total submitted price*/
if(isset($_POST['totalPrice'])){
	if (!isset($_SESSION['cartTotal'])){
		$_SESSION['cartTotal'] = 0;
	}
	$_SESSION['cartTotal'] += $_POST['totalPrice'];
}

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


			if(!isset($_SESSION['tableRecordID'])){
				$query = "INSERT into tablerecord(t_date, t_number) VALUES (CURDATE(), {$_SESSION['tableID']});";
				mysqli_query($GLOBALS['db'], $query);
			

				$query = "SELECT LAST_INSERT_ID() as \"tableRecordID\"";
				$result = mysqli_query($GLOBALS['db'], $query);
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
				    while($row = mysqli_fetch_assoc($result)){
				    	$_SESSION['tableRecordID'] = $row['tableRecordID'];
				    }
				}
			}

			$query = "INSERT into tableorder(m_id, table_id) VALUES ($order_id, {$_SESSION['tableRecordID']})";
			mysqli_query($GLOBALS['db'], $query);
			error_log(mysqli_error($GLOBALS['db']));
			$query ="COMMIT;";
			$result = mysqli_query($GLOBALS['db'], $query);
			
			}
	    }
	}
/*Redirect user to checkout page*/
header("location: ../checkout.php");

