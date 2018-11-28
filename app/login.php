
<?php
   include("config.php");
   include("header_template.php");
   session_start();

   $error = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {


      /* create a prepared statement */
if(isset($_POST['username'])) {
   
 
   $username = $_POST['username'];
   $password = $_POST['password'];
   
   
   $query = "SELECT user.USER_ID, PASSWORDS, levels FROM user, employee WHERE user.id = ? AND
   user.USER_ID = employee.USER_ID";
   
   $stmt= mysqli_prepare($db, $query);
   if ( !$stmt ) {
      die('mysqli error: '.mysqli_error($db));
   }
   
   mysqli_stmt_bind_param($stmt, "i", $username);

   
   if ( !mysqli_execute($stmt) ) {
  die( 'stmt error: '.mysqli_stmt_error($stmt) );
}
   
   mysqli_stmt_execute($stmt);
   mysqli_stmt_bind_result($stmt, $db_user_id, $db_pwd, $level);
   mysqli_stmt_fetch($stmt);
   
   if ($db_pwd == $password) {
      $_SESSION['userID'] = $db_user_id;
      $_SESSION['userLevel'] = $level;
      mysqli_stmt_close($stmt);
      mysqli_close($db);

      header("Location: server_queue.php");
   }
   else{
      $error = "Your Login Name or Password is invalid";
   }
}}

   
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>