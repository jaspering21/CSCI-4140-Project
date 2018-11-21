 <?php
 session_start();
  include_once("config.php");
  include_once("scripts/ChangeBranch.php");


  if(!isset($_SESSION["tableID"]) ){
    $_SESSION["tableID"] = rand(1, 5);
  }


 if(!isset($GLOBALS['db']) ){
 	if(isset($_SESSION["branchID"]))
 		changeBranch($_SESSION["branchID"]);
 	else{
      changeBranch(rand(1, 4));
 	}
  }