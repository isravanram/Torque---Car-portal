<?php 
	include("../../../../includes/config.php");

	if (isset($_POST['productID'])) {
		$productID = $_POST['productID'];

		$approveQuery = mysqli_query($con, "UPDATE products SET currentStatus=1 WHERE productID='$productID'");
	} else {
		echo "ProductID is not passed into approveProduct.php";
	}

 ?>