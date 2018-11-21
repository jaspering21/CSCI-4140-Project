<?php
class Permissions{

	function getPermission($level) {
		switch ($level) {
		    case 0:
		        header("admin_menu.php"); 
		        break;
		    case 1:
		        echo "i equals 1";
		        break;
		    case 2:
		        echo "i equals 2";
		        break;
		}

	}

	}

}