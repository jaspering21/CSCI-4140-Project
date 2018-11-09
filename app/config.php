<?php
#
# INCLUDED CODE
#
# These values will be available in the index.php script because this file (config.php)
# has been included using the require_once() function.
#
/* To deploy the code on the server, modify the following values accordingly*/
/*$db_host = 'localhost:3036'; //localhost
$db_user = 'root';			 //root
$db_pass = 'rootpassword';		
$db_name = 'database';   	
$db_port = 3306; // Tthe standard port is 3306 for MySQL. MAMP typically uses 8889. //3306
*/


/* To deploy the code on the server, modify the following values accordingly*/
$db_host = 'den1.mysql4.gear.host'; //localhost
$db_user = 'halifaxdine';			 //root
$db_pass = 'Ps7J6P_Mc-EK';	
$db_name = 'halifaxdine';	


$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (!$db) {
		echo mysqli_connect_error();  // Get a descriptive message for the connection failure
		exit(); // Terminate script if database can't connect.
	} 

?>