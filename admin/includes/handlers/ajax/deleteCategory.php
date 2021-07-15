<?php 
	include("../../../../includes/config.php");

	if (isset($_POST['categoryID'])) {
		$categoryID = $_POST['categoryID'];

		$deleteCategoryQuery = mysqli_query($con, "DELETE FROM category WHERE categoryID='$categoryID'");
	} else {
		echo "categoryID is not passed into unblockSeller.php";
	}

 ?>