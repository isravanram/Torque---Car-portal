<?php 

	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['registrationUsername']) && isset($_POST['contact'])) {

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['registrationUsername'];
		$contact_no = $_POST['contact'];

	} else {

		header("Location: index.html");
	}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Your Personal Details</title>
	<style type="text/css">
		
		.homelink {

			text-decoration: none;
			text-transform: uppercase;
			font-weight: bold;
			font-size: 150%;

		}

	</style>
</head>

<body>

	<a class="homelink" href="index.php">TORQUE</a>

	<center>	
		
		<h2>Your Details</h2>
		<hr><hr>

		<div class="detailsContainer">

			<p class="detailRow">
				<span class="detaillabel">Your Fullname : </span>
				<label class="detail"><?php echo $firstname . " " . $lastname ?></label>
			</p>

			<p class="detailRow">
				<span class="detaillabel">Username :</span>
				<label class="detail"><?php echo $username ?></label> <br>
			</p>

			<p class="detailRow">
				<span class="detaillabel">Contact Number : </span>
				<label class="detail"><?php echo $contact_no ?></label> <br>

			</p>
		</div>
	</center>


	<style type="text/css">
		

		body {
			background-color: #f5f5f5;

		}

		.detailsContainer {
			width: 40%;
			background-color: #fff;
			padding: 80px 60px;
			border-radius: 15px;
		}

		.detail {

			padding: 10px 15px;
			background-color: #f8f8f8;
			font-weight: bold;
		}

		.detailRow {

			margin-top: 35px;
		}

	</style>


</body>
</html>