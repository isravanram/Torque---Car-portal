<?php 
	include("../../../../includes/config.php");

	if (isset($_POST['cityID'])) {
		$cityID = $_POST['cityID'];

		$deleteCategoryQuery = mysqli_query($con, "DELETE FROM cities WHERE cityID='$cityID'");
	} else {
		echo "cityID is not passed into deleteCity.php";
	}

 ?>