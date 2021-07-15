<?php 
	include("../../../../includes/config.php");

	if (isset($_POST['productID'])) {
		$productID = $_POST['productID'];

		$rejectQuery = mysqli_query($con, "UPDATE products SET currentStatus=3 WHERE productID='$productID'");
	} else {
		echo "ProductID is not passed into rejectProduct.php";
	}

 ?>