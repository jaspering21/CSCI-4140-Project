<?php
include_once("create_session.php");
include_once("header_template.php");
include_once("models/DataGenerator.php");
include_once("scripts/GenerateManagerData.php");


?>
<div id= "main-content" class="container">
	<div id = "branch-data-table">
		<?php
			echo "<h2>Customers per day for Branch {$_SESSION['branchID']} </h2>";
			echo (DataGenerator::generateData(getCustomersByDate(), "customer-by-date"));
			echo (DataGenerator::generateData(getAllBranchCustomersByDate(), "head-chef-customer-by-date"));
		?>
	</div>

	<!--<iframe src="https://tryca.ca.analytics.ibm.com/bi/?perspective=explore&amp;pathRef=.my_folders%2FNight+by+Equipment+Visualization" width="1080" height="720" frameborder="0" gesture="media" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
</div>



</body>
</html>
