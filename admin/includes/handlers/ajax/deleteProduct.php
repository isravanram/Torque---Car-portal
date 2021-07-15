<?php 
	include("../../../../includes/config.php");

	if (isset($_POST['productID'])) {
		$productID = $_POST['productID'];

		$deleteQuery = mysqli_query($con, "UPDATE products SET currentStatus=4 WHERE productID='$productID'");
	} else {
		echo "ProductID is not passed into deleteProduct.php";
	}

 ?>