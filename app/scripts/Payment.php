<?php
include_once("../create_session.php");


$query = "UPDATE tablerecord SET t_status = \"Completed\"
WHERE table_id = {$_SESSION['tableRecordID']}
";

unset($_SESSION['cartTotal']);
unset($_SESSION['tableRecordID']);

mysqli_query($GLOBALS['db'], $query);
error_log(mysqli_error($GLOBALS['db']));

header("location: ../index.php");


