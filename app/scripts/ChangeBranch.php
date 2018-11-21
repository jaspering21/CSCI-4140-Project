<?php
/*Path will resolve to the file that called this object. Calling it in /models will result in an incorrect path. Top ten stupid PHP features.*/
	
function changeDatabase($databaseIndex){
	$database = $GLOBALS['databaseList'][$databaseIndex];
	$db = mysqli_connect($database->host, $database->user, $database->password, $database->name);
		if (!$db) {
			echo mysqli_connect_error();  // Get a descriptive message for the connection failure
			exit();
		} 

		$GLOBALS['db'] = $db;
		
}

function changeBranch($branchID){
	$database  = "1";
	switch($branchID) {
		case 1:
			$databaseName = "0";
			break;
		case 2:
			$databaseName = "1";
			break;
		case 3:
			$databaseName = "2";
			break;
		case 4:
			$databaseName ="3";
			break;
		default:
			$databaseName = "0";
	}
	changeDatabase($databaseName);
	$_SESSION["branchID"] = $branchID;
}
