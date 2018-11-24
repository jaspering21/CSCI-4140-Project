<?php
include_once ("create_session.php");
 
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
      <?php
      echo '<a id="menu" class="btn btn-primary" href="index.php">Menu</a>';
      
      if (!isset($_SESSION['userLevel'])){
        echo '<a id="login" class="btn btn-secondary" href="login.php">Admin</a>';
      }
      else {
        if ($_SESSION['userLevel'] > 0){
          echo '<a id="server-queue" class="btn btn-primary" href="server_queue.php">Server Queue</a>';
        }
        if ($_SESSION['userLevel'] > 4){
          echo '<a id="settings" class="btn btn-primary" href="settings.php">Settings</a>';
        }
        if ($_SESSION['userLevel'] > 3){
          echo '<a id="admin-menu" class="btn btn-primary" href="admin_menu.php">Recipes</a>';
        }
        if ($_SESSION['userLevel'] > 4){
          echo '<a id="analytics" class="btn btn-primary" href="analytics.php">Analytics</a>';
        }
        echo '<a id="login" class="btn btn-secondary" href="logout.php">Logout</a>';
      }
      ?>
    </div>