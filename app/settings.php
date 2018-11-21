<?php
include_once("create_session.php");
include_once("header_template.php");
include_once("scripts/changeBranch.php");

if(isset($_POST['branchSelect'])){
	changeBranch($_POST['branchSelect']);
}

if(isset($_POST['tableSelect'])){
	$_SESSION['tableID'] = $_POST['tableSelect'];
}

echo '
<div id= "main_content" class="container"> 
	<h1>Change Device Settings</h1>
  	<h3>Branch ';echo $_SESSION['branchID']; echo'  - Table '; echo $_SESSION["tableID"]; echo "</h1>";
  	
?>
<form action="settings.php" method="POST">
	<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <label class="input-group-text"  for="branchSelect">Branch</label>
		  </div>
		  <select class="custom-select" name="branchSelect" id="branchSelect">
		  <?php 
		    for($index = 1; $index < 5; $index++){
		    	if($index == $_SESSION["branchID"] ){
		    		echo '<option selected>';echo $_SESSION["branchID"];echo'</option>';
		    	}
		    	else{
		    		echo "<option value=\"$index\">$index</option>";
		    	}
		    }

		    echo '
		  </select>
		</div>
	<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <label class="input-group-text" for="tableSelect">Table</label>
		  </div>
		  <select class="custom-select" name="tableSelect" id="tableSelect">';
		    
		    for($index = 1; $index < 6; $index++){
		    	if($index == $_SESSION["tableID"] ){
		    		echo '<option selected>';echo $_SESSION["tableID"];echo'</option>';
		    	}
		    	else{
		    		echo "<option value=\"$index\">$index</option>";
		    	}
		    }
		    ?>
		  </select>
		</div>
	<input type="submit" role="button" value="Save Changes" class="btn btn-primary"></input>
</form>
</div>
</html>