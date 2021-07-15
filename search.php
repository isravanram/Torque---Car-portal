<?php 
	
	include('includes/config.php');


	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		include('includes/config.php');
	} else {
		include('includes/header.php');
	}

	//include("includes/config.php");
	//include("includes/header.php");


	if (isset($_GET['term'])) {
		
		$term = urldecode($_GET['term']);
	} else {

		$term = "";
	}
?>
 <div class="searchContainer">
 	
 	<input type="text" class="searchInput" placeholder="Search for any title" value="<?php echo $term ?>" placeholder="Start Typing....." onfocus="this.value=this.value">

 </div>

 <script>

 	$(".searchInput").focus();

 	$(function() {

 		 $(".searchInput").keyup(function() {
 		 	clearTimeout(timer);

 		 	timer = setTimeout(function() {
 		 		var val = $(".searchInput").val();
 		 		openPage("search.php?term=" +val);
 		 	}, 2000);
 		 });
 	});

 </script>

<?php if($term == "") { exit(); } ?>

<div class="gridViewContainer" style="position: absolute; left: 25px; margin-top: 30px;" >

	<?php
		
		$modelQuery = mysqli_query($con, "SELECT * FROM model WHERE model_name LIKE '%$term%' LIMIT 6");

		if (mysqli_num_rows($modelQuery) == 0) {
			echo "<span class='noResults'>No car found matching " . $term . "</span>";
		} else {
			echo "<center><h2 style='margin-top: 0px;'> Models </h2></center>";	
		}

		while($row = mysqli_fetch_array($modelQuery)) {

			$IDQuery = mysqli_query($con, "SELECT *  FROM car_images WHERE model_id=". $row['model_id'] ."");

			$photoQuery = mysqli_fetch_array($IDQuery);
			//onclick='openPage(\"productDetail.php?id=" . $row['model_id'] . "\")'
			echo "
			<a href='productDetail.php?id=" . $row['model_id'] . "'>
				<div class='gridViewItem'>
					<span role='link' tabindex='0'>
						<img src='resource/carImages/" . $photoQuery['image_path'] . "'>
						<div class='gridViewInfo'>"
							. $row['model_name'] .
						"</div>
					</span>
				</div>
			</a>";

		}
	?>

</div>
</div>
</div>
</div>
		
</div>
</body>

</html>