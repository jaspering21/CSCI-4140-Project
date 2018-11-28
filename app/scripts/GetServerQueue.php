<?php
include_once("../create_session.php");

function getServerQueue{
	$orderQueue = new SplQueue();

	$query ="SELECT m.m_name, t.table_id, t.status
	FROM tableorder as t, menu as m
	WHERE t.m_id = m.m_id and t.branch_id = {$_SESSION['branchID']}"

	$result = mysqli_query($GLOBALS['db'], $query);
	error_log("help" . $GLOBALS['db']->host_info);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$menu->push(MenuItem::create()->setPrimaryKey($row['m_id'])->setName($row['m_name'])->setImagePath("img/polish_sandwich.jpg"));
		}
	}
}



"


>