<?php
/*include("config.php");*/

   //$db = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  session_start();

  if(!isset($_SESSION["tableID"]) ){
    $_SESSION["tableID"] = rand(1, 20);
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/style.css"

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"
  </head>
  
  <body>
    <div id="header_rectangle"> 
      <a id="login" class="btn btn-primary" href="login.php">Admin</a>
    </div>