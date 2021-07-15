<?php 
	
	include('includes/config.php');


	if (isset($_SESSION['userLoggedIn'])) {
		$username = $_SESSION['userLoggedIn'];

		$userQuery = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
		$user = mysqli_fetch_array($userQuery);




	} else {
		header("Location: index.php");
	}


?>
 

<!DOCTYPE html>
<html>
<head>
	<title>My Profile | Torque</title>
	<link type="text/css" rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    
</head>
<body>
	<section>
		<h2>Edit Profile</h2>

		<center>
			
			<table>
				<tr>
					<td>
						<form method="post" class="profileTable updateTable" action="profile.php" enctype="multipart/form-data">
							<img src="resource/customer_image/<?php echo $user['profile_pic'] ?>" class="profile_pic">
							<td><input type="file" name="new_profile_pic" required></td>
							<tr>
								<td colspan="2" align="center">
									<input type="submit" class="btn" name="updateProfilePic" value="Upload Image">
								</td>
							</tr>
						</form>
					</td>
				</tr>

				<form method="post">
					<tr>
						<td>
							<label>Email: </label>
							<td><input type="email" name="new_email" required></td>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" class="btn" name="updateEmail" value="Update">
						</td>
					</tr>
				</form>
			</table>	
			
		</center>
	</section>
</body>
</html>


<?php 

	function validate_and_upload_image($image) {
		//ATTRIBUTES OF IMAGE1
		 $image_name = $image['name'];
		 $image_temp_loc = $image['tmp_name'];
		 $image_loc = "resource/customer_image/" . $image_name;
		 $image_type = explode("/", $image['type']);

		 if ( $image['error'] == 1 ) {
		 	echo "<script>
		 			alert('Error in image " . $image_name ."');		 			
		 		  </script>
		 	";

		 	header("Location: profile.php");
		 }


		 if ( $image_type[1] != "jpeg" and $image_type[1] != "jpg" ) {
		 	echo "<script>
		 			alert('Enter image with jpg or jpeg format');	 			
		 		  </script>
		 	";
		 	header("Location: profile.php");
		 } 


		 if ( move_uploaded_file($image_temp_loc, $image_loc) == false ) {
		 	echo "<script>
		 			alert('Failed to Upload " . $image_name . "');
		 		  </script>
		 	";		 	
		 	header("Location: profile.php");
		 }

		return true;
	}

	function validateEmails($con, $em, $username) {
			

		if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			echo "<script>
		 			alert('Enter valid format');
		 		 </script>
			 	";
			return;
		}

		$checkEmailQuery = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
		if(mysqli_num_rows($checkEmailQuery) != 0) {
			echo "<script>
		 			alert('Email ID Taken');
		 		 </script>
			 	";
			return;	
		}

		$updateEmailQuery = mysqli_query($con, "UPDATE users SET email='$em' WHERE username='$username'");
		if ($updateEmailQuery) {
			# code...
			echo "<script>
	 			alert('Email Updated');
	 		 </script>
		 	";		 	
		}

	}


	if (isset($_POST['updateProfilePic'])) {
		# code...
			
		$profile_pic = $_FILES['new_profile_pic'];
		$res = validate_and_upload_image($profile_pic);

		if ($res) {
			# code...
			$updateProfilePicQuery = mysqli_query($con, "UPDATE users SET profile_pic='". $profile_pic['name'] ."' WHERE username='". $username ."'");

			if ($updateProfilePicQuery) {
				# code...
				echo "<script>
		 			alert('Image Updated');
		 		 </script>
			 	";		 	

			 	//TODO Delete old profile pic....
			 	header("Location: profile.php");		
			}
		}	
	}

	if (isset($_POST['updateEmail'])) {
		$new_email = $_POST['new_email'];
		validateEmails($con, $new_email, $username);
	}
	

	


?>