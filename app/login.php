
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
   
   
   $query = "SELECT USER_ID, PASSWORD FROM user WHERE id = ?";
   
   $stmt= mysqli_prepare($db, $query);
   if ( !$stmt ) {
      die('mysqli error: '.mysqli_error($db));
   }
   
   mysqli_stmt_bind_param($stmt, "i", $username);
   
   if ( !mysqli_execute($stmt) ) {
  die( 'stmt error: '.mysqli_stmt_error($stmt) );
}
   
   mysqli_stmt_execute($stmt);
   mysqli_stmt_bind_result($stmt, $db_user_id, $db_pwd);
   mysqli_stmt_fetch($stmt);
   
   if ($db_pwd == $password) {
      $_SESSION['user_id'] = $db_user_id;
      mysqli_stmt_close($stmt);
      mysqli_close($db);
      header("Location: server_queue.php");
   }
   else{
      $error = "Your Login Name or Password is invalid";
   }
}}


      // username and password sent from form 
      
      /*$myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
      
      $query = "SELECT `user_id` FROM `user` WHERE `id` = '$myusername' and `password` = '$mypassword'";

      $query =  "SELECT `user_id` FROM `user` WHERE `id` = ? and `password` = ?";

      $stmt = $db->query($query);
      $stmt->execute([$myusername, $password]);
      $count = $stmt->fetch(PDO::FETCH_ASSOC);*/
/*
      
      $stmt = mysqli_prepare($db, $query);
      if ( !$stmt ) {
         die('mysqli error: '.mysqli_error($link));
      }
      mysqli_stmt_bind_param($stmt, "ss", $myusername, $password);

      if ( !mysqli_execute($stmt) ) {
  die( 'stmt error: '.mysqli_stmt_error($stmt) );

      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin_menu.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }*/
   
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