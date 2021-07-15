<?php 
	include("../../../../includes/config.php");

	if (isset($_POST['sellerID'])) {
		$sellerID = $_POST['sellerID'];

		$blockQuery = mysqli_query($con, "UPDATE seller SET currentStatus=1 WHERE sellerID='$sellerID'");
	} else {
		echo "ProductID is not passed into unblockSeller.php";
	}

 ?>