<?php 

	include "includes/config.php";

	$usersCountQuery = mysqli_query($con, "SELECT count(id) AS total FROM users");

	$totalUsers = mysqli_fetch_array($usersCountQuery);

?>


<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
	<style type="text/css">
		

		.userTable {

			border-radius: 15px;
		}

		.userTable td, th {

			border-radius: 15px;	
		}

		.notFound {
			color: red;
			font-weight: bold;
			text-transform: uppercase;
		}


	</style>
</head>
<body>

	<center>

		<h1><tt>Our Users</tt></h1>
		<h3><tt><?php echo "Total Number of Users " . $totalUsers['total']; ?></tt></h3>

		<form method="POST">
			
			<label>Find User : </label>
			<input type="Number" name="findUser" placeholder="User ID">

			<br><br>

			<input type="submit" name="find" value="Find">

		</form>

		<table border="2" cellpadding="10" cellspacing="10" class="userTable">
			

			<tr>

				<th> User ID </th>
				<th> Full Name </th>
				<th> User Since</th>

			</tr>

			<?php 

				$userID = 0;

				if (isset($_POST['find'])) {
					if (empty($_POST['findUser'])) {
						echo "<script> alert('Enter User ID Please'); </script>";
					} else {

						$userID = $_POST['findUser'];	
					}

				}

				$userQuery = $con->query("SELECT id, username, firstName, lastName, dateOfJoin FROM users WHERE id='$userID'");

				if (mysqli_num_rows($userQuery) > 0) {	
				
						while ($row = mysqli_fetch_array($userQuery)) {
					
							echo "<tr> <td>" . $row['id'] . "</td>" .
							"<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>" .
							"<td>" . $row['dateOfJoin'] . "</td>" .
							"</tr>";

						}

				} else {
					echo "<h3 class='notFound'> Record Not Found </h3>";
				}
				

			?>


		</table>
	</center>

</body>
</html>