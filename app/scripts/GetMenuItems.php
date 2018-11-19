<?php
include_once("MenuItem.php");
include_once("config.php");
function getMenuItems(){
	$menu = new SplDoublyLinkedList();
	$query = "SELECT m_id, m_name, m_price FROM menu";
	$result = mysqli_query($GLOBALS['db'], $query);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$menu->push(MenuItem::create()->setPrimaryKey($row['m_id'])->setName($row['m_name'])->setImagePath("img/polish_sandwich.jpg")->setPrice($row['m_price']));
		}
	}
	return $menu;
}
