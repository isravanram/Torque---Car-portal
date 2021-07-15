<?php 
	include("../../../../includes/config.php");

	if (isset($_POST['userID'])) {
		$userID = $_POST['userID'];

		$blockQuery = mysqli_query($con, "UPDATE users SET block_status=1 WHERE user_id='$userID'");
	} else {
		echo "userID is not passed into unblockUser.php";
	}

 ?>