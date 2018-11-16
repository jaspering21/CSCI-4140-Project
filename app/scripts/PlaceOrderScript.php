<?php
session_start();

/* Insert values into database order table */
/*$_SESSION["tableID"]); TableID of order*/
/*var_dump($_REQUEST); The Order*/

/*Redirect user to checkout page*/
header("location: ../checkout.php");

