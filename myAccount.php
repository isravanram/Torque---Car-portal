<?php 
	
	include('includes/config.php');

	if (isset($_SESSION['userLoggedIn'])) {
		$username = $_SESSION['userLoggedIn'];

		$userQuery = mysqli_query($con, "SELECT user_id FROM users WHERE username='$username'");
		$user = mysqli_fetch_array($userQuery);

		$userID = $user['user_id'];

	} else {
		header("Location : index.php");
	}

	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
		include('includes/config.php');
	} else {
		include('includes/header.php');
	}

?>

<h2>Your Account</h2>

<div class="accountLinks">
	<a href="profile.php">Your Profile</a>
	<a href="logout.php">Log Out</a>
</div>
