<?php 
	include_once('../includes/config.php');
	if (isset($_POST['loginAdminButton']) && $con) {
		$username = stripTags($con, $_POST['adminUsername']);
		$username = removeSpace($username);
		$password = stripTags($con, $_POST['adminPassword']);
		$password = md5($password);

		$loginQuery = mysqli_query($con, "SELECT adminID FROM admin WHERE username='$username' AND password='$password'");

		if (mysqli_num_rows($loginQuery) == 1) {
			$_SESSION['admin'] = $username;
			header("Location: addCar.php");
		} else {
			echo "<p class='message'> You are not AUTHORIZED.... </p>";
		}
	}


	function stripTags($con, $name) {
		$name = mysqli_real_escape_string($con, $name);
		return $name;
	}

	function removeSpace($username) {
		$username = str_replace(" ", "", $username);
		return $username;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOG IN | TORQUE</title>
	<link rel="stylesheet" type="text/css" href="assets/css/adminLogin.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
</head>
<body>
	<h2>Admin Log In</h2>
	<div class="row">
		<div class="adminLoginForm">
			<form method="post">
				<div class=""></div>
				<div class="row">
					<div class="col span-1-of-3">
						<label for="adminUsername"> Username :</label>
						<input type="text" name="adminUsername" id="adminUsername" required>
					</div>
				</div>
				

				<div class="row">
					<div class="col span-1-of-3">
						<label for="adminPassword"> Password :</label>
						<input type="password" name="adminPassword" id="adminPassword" required>
					</div>
				</div>

				<div class="row button-section">
					<div class="col span-1-of-2"><input type="submit" name="loginAdminButton" class="btn-full btn" value="Log In"></div>
					<div class="col span-1-of-2"><input type="reset" name="resetButtonButton" class="btn-ghost btn" value="Cancel"></div>
				</div>
			</form>
		</div>	
	</div>
</body>
</html>