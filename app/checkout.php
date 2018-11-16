<?php 
include("header_template.php");
?>
<div id= "checkout-content">
	<div id= "main-content" class="container">
 		<h1>Your order has been placed.</h1>
 		<a id="order-button" class="btn btn-success" href="index.php">Place another Order</a>

 		<?php 
 		if(array_key_exists("feedbackTextArea", $_REQUEST)){
 		echo '
 		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Thank You.</strong> Your feedback has been submitted.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		';
	}
		?>
		<form action="checkout.php" method="post">
		<div class="form-group">
		  <div class="form-group">
		    <label for="feedbackTextArea">Give Feedback</label>
		    <textarea class="form-control" id="feedbackTextArea" name="feedbackTextArea" rows="3"></textarea>
		  </div>
		  <input type="submit" role="button" value="Submit" class="btn btn-primary"></input>
		</div>
		</form>
		</div>
	</div>
  </body>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</html>




