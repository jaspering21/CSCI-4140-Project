<?php
include_once("../create_session.php");

/*Add feedback to database*/
$feedback = $_POST['feedbackTextArea'];

$query = "INSERT INTO feedback (table_id, feedback) VALUES (?, ?)";


$stmt= mysqli_prepare($GLOBALS['db'], $query);
   if ( !$stmt ) {
      error_log('db error: '.mysqli_error($GLOBALS['db']));
   }
   
   mysqli_stmt_bind_param($stmt, "is", $_SESSION['tableID'], $feedback);
   
   if ( !mysqli_execute($stmt) ) {
  error_log('stmt error: '.mysqli_stmt_error($stmt));
}

$_SESSION['feedbackTextArea'] = $feedback;

header("location: ../checkout.php");


