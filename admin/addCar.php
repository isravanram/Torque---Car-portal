
<?php 
	
	include('../includes/config.php');

	if (isset($_SESSION['admin'])) {
		$admin = $_SESSION['admin'];
	} else {
		header("Location: ../index.php");
	}


	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}	
?>

<h2>ADD CAR</h2>
<div class="tracklistContainer">
    <ul class="tracklist">
    	<form method="post" action="" enctype="multipart/form-data">
	    	<table>
	    		<tr>
	    			<td>Model Name : </td>
	    			<td>
	    				<input type="text" name="model_name" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Images 1 : </td>
	    			<td>
	    				<input type="file" name="image_1" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Images 2: </td>
	    			<td>
	    				<input type="file" name="image_2" required>
	    			</td>
	    		</tr>
	
				<tr>
	    			<td>Images 3: </td>
	    			<td>
	    				<input type="file" name="image_3" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Images 4: </td>
	    			<td>
	    				<input type="file" name="image_4" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Images 5: </td>
	    			<td>
	    				<input type="file" name="image_5" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Images 6: </td>
	    			<td>
	    				<input type="file" name="image_6" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Images 7: </td>
	    			<td>
	    				<input type="file" name="image_7" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Images 8: </td>
	    			<td>
	    				<input type="file" name="image_8" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Brand: </td>
	    			<td>

	    				<select name="brand_id" required>
	    					
	    					<?php 

		    					$brandQuery = "SELECT * FROM car_brand ORDER BY brand_name";
		    					$brandResult = $con->query($brandQuery);
	    						
	    						while ($row = mysqli_fetch_array($brandResult)) {
	    							echo "<option value= " . $row['brand_id'] ." required > " . $row['brand_name'] ."  </option>";
	    						}


	    					?>


	    				</select>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Category: </td>
	    			<td>

	    				<select name="category_id" required>
	    					
	    					<?php 

		    					$categoryQuery = "SELECT * FROM category ORDER BY category_name";
		    					$categoryResult = $con->query($categoryQuery);
	    						
	    						while ($row = mysqli_fetch_array($categoryResult)) {
	    							echo "<option value= " . $row['category_id'] ." required > " . $row['category_name'] ."  </option>";
	    						}


	    					?>


	    				</select>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Colors : </td>
	    			<td>
	    				<input type="text" name="color" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Seating Capacity :</td>
	    			<td>
	    				<select name="seats" required>
	    					<option value="2">2</option>
	    					<option value="4">4</option>
	    					<option value="5">5</option>
	    					<option value="6">6</option>
	    					<option value="7">7</option>

	    				</select>

	    			</td>

	    		</tr>


	    		<tr>
	    			<td>Status</td>
	    			<td>
	    				<select name="status" required>
	    					<option value="Launched">Launched</option>
	    					<option value="Upcoming">Upcoming</option>
	    					<option value="Romoured">Romoured</option>

	    				</select>

	    			</td>

	    		</tr>



	    		<tr>
	    			<td>Fuel Economy: </td>
	    			<td>
	    				<input type="number" name="fuel_economy" required>
	    			</td>
	    		</tr>	  


	    		<tr>
	    			<td>Power : </td>
	    			<td>
	    				<input type="number" name="bhp" required>
	    			</td>
	    		</tr>	  

	    		<tr>
	    			<td>Price : </td>
	    			<td>
	    				<input type="text" name="price" required>
	    			</td>
	    		</tr>	    		

	    		<tr>
	    			<td>Launch Date : </td>
	    			<td>
	    				<input type="date" name="launch_date" required>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Description : </td>
	    			<td>
	    				<textarea name="description" required>
	    				</textarea>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>Fuel Type: </td>
	    			<td>

	    				<select name="fuel_type" required>
	    					
	    					<?php 

		    					$fuelQuery = "SELECT * FROM fuel_type ORDER BY fuel_type";
		    					$fuelResult = $con->query($fuelQuery);
	    						
	    						while ($row = mysqli_fetch_array($fuelResult)) {
	    							echo "<option value= " . $row['fuel_type_id'] ." required > " . $row['fuel_type'] ."  </option>";
	    						}


	    					?>


	    				</select>
	    			</td>
	    		</tr>

	    		<tr>
	    			<td>
	    				<input type="submit" name="upload" value="ADD DETAILS">
	    			</td>

	    		</tr>
	    	</table>
	    </form>
	</ul>
</div>

<?php 

	
	/* ON UPLOAD BUTTON CLICK */
	function validate_and_upload_image($image) {
		//ATTRIBUTES OF IMAGE1
		 $image_name = $image['name'];
		 $image_temp_loc = $image['tmp_name'];
		 $image_loc = "../resource/carImages/" . $image_name;
		 $image_type = explode("/", $image['type']);

		 if ( $image['error'] == 1 ) {
		 	echo "<script>
		 			alert('Error in image " . $image_name ."');
					openPage('addCar.php');		 			
		 		  </script>
		 	";
		 }


		 if ( $image_type[1] != "jpeg" and $image_type[1] != "jpg" ) {
		 	echo "<script>
		 			alert('Enter image with jpg or jpeg format');
					openPage('addCar.php');		 			
		 		  </script>
		 	";
		 } 


		 if ( move_uploaded_file($image_temp_loc, $image_loc) == false ) {
		 	echo "<script>
		 			alert('Failed to Upload " . $image_name . "');
		 			openPage('addCar.php');
		 		  </script>
		 	";		 	
		 }

		//return true;
	}

	function insertImagesToDatabase($con, $modelID, $imgArray) {
		foreach ($imgArray as $value) {
			$imageQuery = "INSERT INTO car_images VALUES('', $modelID, '$value')";
		 	$res = mysqli_query($con, $imageQuery);	

		 	if ( !$res ) {
				echo "<script>
			 			alert('Failed to insert image in DATABASE');
			 			openPage('addCar.php');
			 		  </script>
			 	";		
			}
		}
	}


	if (isset($_POST['upload'])) {
		 
		
		$images_array = array();

		$model_name = $_POST['model_name'];
		$brand_id = $_POST['brand_id'];
		$category_id = $_POST['category_id'];
		$colors = $_POST['color'];
		$seats = $_POST['seats'];
		$status = $_POST['status'];
		$fuel_economy = $_POST['fuel_economy'];
		$bhp = $_POST['bhp'];
		$price = $_POST['price'];
		$launch_date = $_POST['launch_date'];
		$description = $_POST['description'];
		$fuel_type = $_POST['fuel_type'];

		$carDetailsQuery = "INSERT INTO model VALUES('', '$model_name', $brand_id, $category_id, '$colors', '$status', $seats, '$launch_date', '$description', $fuel_type, $price, 0, $fuel_economy, $bhp )";

		$res = mysqli_query($con, $carDetailsQuery);

		if ( !$res ) {
			echo "<script>
		 			alert('Failed to insert in DATABASE');
		 			openPage('addCar.php');
		 		  </script>
		 	";		
		}
		

		$image1 = $_FILES['image_1'];
		$image2 = $_FILES['image_2'];
		$image3 = $_FILES['image_3'];
		$image4 = $_FILES['image_4'];
		$image5 = $_FILES['image_5'];
		$image6 = $_FILES['image_6'];
		$image7 = $_FILES['image_7'];
		$image8 = $_FILES['image_8'];


		array_push($images_array, $_FILES['image_1']['name']);
		array_push($images_array, $_FILES['image_2']['name']);
		array_push($images_array, $_FILES['image_3']['name']);
		array_push($images_array, $_FILES['image_4']['name']);
		array_push($images_array, $_FILES['image_5']['name']);
		array_push($images_array, $_FILES['image_6']['name']);
		array_push($images_array, $_FILES['image_7']['name']);
		array_push($images_array, $_FILES['image_8']['name']);

		validate_and_upload_image( $image1 );
		validate_and_upload_image( $image2 );
		validate_and_upload_image( $image3 );
		validate_and_upload_image( $image4 );
		validate_and_upload_image( $image5 );
		validate_and_upload_image( $image6 );
		validate_and_upload_image( $image7 );
		validate_and_upload_image( $image8 );


		//TODO fetch model ID from database
		
		$modelIDQuery = "SELECT model_id FROM model WHERE model_name='$model_name' and launch_date='$launch_date'";
		$modelRes = mysqli_query($con, $modelIDQuery);


		$modelID = mysqli_fetch_array($modelRes);

		$mdID = $modelID['model_id'];

		insertImagesToDatabase($con, $mdID, $images_array);

		echo "<script>
		 			alert('Data Added Successfully in Database');
		 			openPage('addCar.php');
		 		  </script>
		 	";

	}


?>


<?php include('includes/footer.php'); ?>

