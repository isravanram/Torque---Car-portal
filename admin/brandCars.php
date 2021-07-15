<?php 
    include('../includes/config.php');

    if (isset($_SESSION['admin']) && isset($_GET['id'])) {
        $admin = $_SESSION['admin'];
        $brandID = $_GET['id'];
    } else {
        header("Location: ../index.php");
    }

    if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}

?>


<h2>All Cars</h2>

<div class="tracklistContainer">
    <ul class="tracklist">
        
        <?php


        	$brandCarsQuery = mysqli_query($con, "SELECT * FROM model WHERE brand_id='$brandID'");
	        while($row = mysqli_fetch_array($brandCarsQuery)) {

	            echo "<li class='tracklistRow'>
	                    <div class='trackCount'>
	                        <span class='trackNumber'>". $row['model_id']."</span>
	                    </div>


	                    <div class='trackInfo smallTrackInfo'>
	                        <span class='trackName'>" . ucfirst($row['model_name']) ."</span>
	                    </div>

	                    <div class='trackDuration longTrackDuration'>


	                        <input type='submit' class='btn btn-full' name='editCategory' onclick='openPage(\"editCarDetail.php?id=" . $row['model_id'] . "\")' value='Edit' style='margin-left:0px; display: inline; margin-top: 7px;'>
	                    
	                    </div>

	                </li>";

	        }
		?>

    </ul>
</div>

<?php include('includes/footer.php'); ?>