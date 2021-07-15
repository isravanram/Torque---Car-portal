<?php
 
	include('../includes/config.php');

	if (isset($_SESSION['admin'])) {
		$admin = $_SESSION['admin'];
	} else {
		header("Location: ../index.php");
	}

	if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}

	$countBrandQuery = mysqli_query($con, "SELECT count(brand_id) as total FROM car_brand");
	$count = mysqli_fetch_array($countBrandQuery);

	$brandQuery = mysqli_query($con, "SELECT * FROM car_brand LIMIT 10");

?>

<h2>Users</h2>

<h3>Total Brands : <?php echo $count['total']; ?></h3>
<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php

		while($row = mysqli_fetch_array($brandQuery)) {

			echo "<li class='tracklistRow' onclick='openPage(\"brandCars.php?id=" . $row['brand_id'] . "\")'>
					<div class='trackCount'>
						<span class='trackNumber'>". $row['brand_id']."</span>
					</div>

					<div class='trackInfo'>
						<span class='trackName'>" . ucfirst($row['brand_name']) . "</span>
					</div>

				</li>";

		}

		?>

	</ul>
</div>

<?php include('includes/footer.php'); ?>