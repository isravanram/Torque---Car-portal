<?php 
	
	include('../includes/config.php');

	if (isset($_SESSION['admin']) && isset($_GET['id'])) {
		$admin = $_SESSION['admin'];
		$productID = $_GET['id'];
	} else {
		header("Location: sorry.php");
	}

	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}

?>

<h2>Approve</h2>
<?php 
	$imageQuery = mysqli_query($con, "SELECT * FROM productImages WHERE productID='$productID' LIMIT 1");
	$path = mysqli_fetch_array($imageQuery);

	$productQuery = mysqli_query($con, "SELECT * FROM products WHERE productID='$productID'");
	$product = mysqli_fetch_array($productQuery);
	$sellerQuery = mysqli_query($con, "SELECT concat(firstName, ' ', lastName) as name FROM seller WHERE sellerID=". $product['sellerID'] ."");
	$sellerName = mysqli_fetch_array($sellerQuery);

	$catID = $product['categoryID'];
	$categoryQuery = mysqli_query($con, "SELECT * FROM category WHERE categoryID='$catID' LIMIT 1");
	$category = mysqli_fetch_array($categoryQuery);

	echo "<div class='itemDetailsContainer row'>
			<div class='col span-2-of-3'>
					<img src='../". $path['imagePath'] . "' class='productDetailsImage'>
			</div>
			<div class='col span-1-of-3 productTitle'>
				" . $product['title'] ." <br> <br>
				<span class='price' style='font-weight: 600; font-size: 85%; display:block; margin-top: 10px;'>Price : " . $product['price'] ."   INR </span>
				 <span class='category' style='font-weight: 600; font-size: 85%; display:block;'>Category : " . ucfirst($category['categoryName']) ."</span> <br> <br>
				<span class='sellerNameSmall'> By " . $sellerName['name'] ."</span> <br> <br> <br>

				<span class='descriptionTitle'> Description </span>  <br>
				<span class='description'> " . $product['description'] . " <span> <br> <br> <br>

				<span class='descriptionTitle'> Shipping Details </span>  <br>
				<span class='description'> " . $product['shippingDetails'] . " <span> <br>
				<span class='description'> ShippingCost : INR " . $product['shippingCost'] . " <span> <br> <br> <br> 

				<div class='row'> 
					<input type='submit' class='btn btn-full' onclick='approveProduct(" . $productID . ")' value='Approve Product' style='margin-left: -120px;'>
					<input type='button' class='btn btn-ghost' name='rejectProducts' onclick='rejectProduct(" . $productID . ")' value='Reject Product' style='margin-left: -10px; background-color: red;'>

				</div>
			</div>
		</div>
			
		";	
?>

<?php include('includes/footer.php'); ?>