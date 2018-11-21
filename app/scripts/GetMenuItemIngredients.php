<?php
include_once("scripts/Ingredient.php");
function getMenuItemIngredients($itemID){

	$menuItemID = $itemID;

	$ingredients = new SplDoublyLinkedList();

	$query = "SELECT raw_name, quantity, unit
	FROM recipe as r, raw_price as i
	WHERE m_id = $menuItemID and i.raw_id = r.raw_id";

	$result = mysqli_query($GLOBALS['db'],$query);

	error_log(mysqli_error($GLOBALS['db']));
	error_log($query);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	$ingredients->push(Ingredient::create()->setName($row['raw_name'])->setQuantity($row['quantity'])->setUnit($row['unit']));
	    }
	}

	return $ingredients;
}

