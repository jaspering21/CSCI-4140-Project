<?php
   include_once("create_session.php");
   
   session_destroy();
   $_SESSION = array();
      
   header("Location: login.php");
?>