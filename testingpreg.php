<?php 

	if (isset($_POST['validate'])) {
		
		if (isset($_POST['email']) &&  isset($_POST['number']) &&  isset($_POST['fullname'])) {
			
			$email =  $_POST['email'];
			$number = $_POST['number'];
			$fullname = $_POST['fullname'];

			//
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script> alert('Please Enter a valid email address') </script>";
			}


			//
			if (is_numeric($number)) {
				
				if (!preg_match("/^[0-9]{10}$/", $number)) {
					
					echo "It must be 10 Digits";
				}

			} else {
				echo "It must be Numeric Value";
			}

			

			//User_name
			if (!preg_match("/^[a-zA-Z0-9_]*$/", $fullname)) {
				
				echo "invalid format for username";
			}



		}

	}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Preg Match</title>
</head>
<body>


	<form method="POST">
		
		<label>username : </label>
		<input type="text" name="fullname"> <br> <br>


		<label>Email  : </label>
		<input type="text" name="email"> <br> <br>


		<label>Number : </label>
		<input type="text" name="number">


		<input type="submit" name="validate">


	</form>




</body>
</html>