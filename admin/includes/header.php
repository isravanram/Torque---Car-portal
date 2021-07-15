<?php 
	include('../includes/config.php');
?>

<!DOCTYPE html>
<html>
<head>

	<title>	Admin Panel </title>
	<link rel="stylesheet" type="text/css" href="../admin/assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../resource/js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="../vendors/css/grid.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="../vendors/css/ionicons.min.css">
	<link href="https://unpkg.com/ionicons@4.4.4/dist/css/ionicons.min.css" rel="stylesheet">

</head>
<body>

	<header class="adminHeader">
		<a href="admin.php" class="navbar-brand">Torque</a>
		<div class="nav-name">Naishar Shah</div>
		<button class="logoutButton" name="logoutButton" onclick="logout()">Log Out</button>
	</header>

	<div id="navBarContainer">
		<nav class="navBar">

			<div class="group">
				<div class="navItem" onclick="openPage('addCar.php')">
					<i class="ion-md-checkmark icon"></i>
					<span role="link" tabindex="0" class="navItemLink">Add New Car</span>
				</div>

				<div class="navItem" onclick="openPage('category.php')">
					<i class="ion-md-filing icon"></i>
					<span role="link" tabindex="0" class="navItemLink">Category</span>
				</div>

				<div class="navItem" onclick="openPage('brand.php')">
					<i class="ion-md-globe icon"></i>
					<span role="link" tabindex="0" class="navItemLink">Brand</span>
				</div>

				<div class="navItem" onclick="openPage('totalUser.php')">
					<i class="ion-md-person icon" ></i>
					<span role="link" tabindex="0"class="navItemLink">Users</span>
				</div>
			</div>

		</nav>
	</div>

	<div id="mainViewContainer">
	
		<div id="mainContent">



			