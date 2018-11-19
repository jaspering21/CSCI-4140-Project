 <?php
 session_start();
  include("config.php");

  if(!isset($_SESSION["tableID"]) ){
    $_SESSION["tableID"] = rand(1, 5);
  }

  if(!isset($_SESSION["branchID"]) ){
    $_SESSION["branchID"] = rand(1, 4);
  }