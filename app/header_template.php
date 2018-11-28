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
      echo "<ul class ='nav'>";
      echo '<a id="menu" class="nav-link" href="index.php">Menu</a>';
      
      if (!isset($_SESSION['userLevel'])){
        echo ' <li class="nav-item"><a id="login" class="btn btn-secondary" href="login.php">Admin</a></li>';
      }
      else {
        if ($_SESSION['userLevel'] > 0){
          echo ' <li class="nav-item"><a id="server-queue" class="nav-link" href="server_queue.php">Server Queue</a></li>';
        }
        if ($_SESSION['userLevel'] > 4){
          echo ' <li class="nav-item"><a id="settings" class="nav-link" href="settings.php">Settings</a></li>';
        }
        if ($_SESSION['userLevel'] > 3){
          echo ' <li class="nav-item"><a id="admin-menu" class="nav-link" href="admin_menu.php">Recipes</a></li>';
        }
        if ($_SESSION['userLevel'] > 4){
          echo ' <li class="nav-item"><a id="analytics" class="nav-link" href="analytics.php">Analytics</a></li>';
        }
        echo '<a id="login" class="btn btn-secondary" href="logout.php">Logout</a></li>';
        echo "</ul>";
      }
      ?>
    </div>