<?php
include_once("create_session.php");
include_once("ChangeBranch.php");
function getCustomersByDate() {
	$tableData = new SplDoublyLinkedList();

	$query = "SELECT t_date as \"Order Date\", count(table_id) as \"Count\"
FROM tablerecord WHERE t_status like \"Completed\"
GROUP BY t_date;";
	$result = mysqli_query($GLOBALS['db'], $query);

		if (mysqli_num_rows($result) > 0) {
			// output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	$rowData = array('Date' => $row['Order Date'], 'Customer Count' => $row['Count']);
		    	$tableData->push($rowData);
		    }
	}
	return $tableData;
}

function mergeCustomerLists($masterList, $listToMerge, $branchID){
	foreach ($listToMerge as $value){
		$value['Branch ID'] = $branchID;
		$masterList->push($value);
	}
	return $masterList;
}

function getAllBranchCustomersByDate() {
	$tableData = new SplDoublyLinkedList();
	$currentBranch = $GLOBALS["branchID"];

	for($index = 1; $index < 5; $index++){
		changeBranch($index);
		$tableData = mergeCustomerLists($tableData, getCustomersByDate(), $index);
	}
	changeBranch($currentBranch);
	return $tableData;
}