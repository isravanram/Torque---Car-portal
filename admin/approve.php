<?php 
	
	include('../includes/config.php');

	if (isset($_SESSION['admin'])) {
		$admin = $_SESSION['admin'];
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
<div class="tracklistContainer">
    <ul class="tracklist">

	<?php

		$productQuery = mysqli_query($con, "SELECT * FROM products WHERE currentStatus=2 ORDER BY productID LIMIT 10");

		while($row = mysqli_fetch_array($productQuery)) {
			$id = $row['productID'];
			$imageQuery = mysqli_query($con, "SELECT * FROM productImages WHERE productID='$id' LIMIT 1");
			$path = mysqli_fetch_array($imageQuery);
			/*echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"approveDetail.php?id=" . $row['productID'] . "\")'>
						<img src='../" . $path['imagePath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>

						<div class='gridViewInfo price'>INR &nbsp;&nbsp;&nbsp;"
							. $row['price'] .
						"</div>
					</span>

				</div>"; */

				echo "<li class='tracklistRow longHeightRow' onclick='openPage(\"approveDetail.php?id=" . $row['productID'] . "\")'>
                    <div class='trackCount'>
                        <span class='trackNumber' style='text-align: center;'>". $row['productID']."</span> <br> <br>
                        <img class='smallProductImage' src='../" . $path['imagePath'] . "'>
                    </div>


                    <div class='trackInfo'>
                        <span class='trackName'>" . ucfirst($row['title']) ."</span>
                    </div>

                    <div class='trackDuration'>

                        <input type='Submit' class='btn btn-ghost' name='deleteCategory' onclick='approveProduct(" . $row['productID'] . ")' value='Approve Product' style='margin-left:-35px; margin-top: 7px;'>

                        <input type='button' class='btn btn-ghost' name='deleteCategory' onclick='rejectProduct(" . $row['productID'] . ")' value='Reject Product' style='margin-left:-35px; margin-top: 7px; background-color: red;'>

                    </div>

                </li>";


		}
	?>
	</ul>
</div>
<?php include('includes/footer.php'); ?>