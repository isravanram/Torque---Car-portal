<?php 
    
    include('../includes/config.php');

    if (isset($_SESSION['admin']) && isset($_GET['id'])) {
        $admin = $_SESSION['admin'];
        $cityID = $_GET['id'];
    } else {
        header("Location: sorry.php");
    }
    
	if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}
	
	if (isset($_POST['citySubmit'])) {
		

		if (isset($_POST['stateName']) && isset($_POST['cityName'])) {
			$stateID = $_POST['stateName'];
            $cityName = $_POST['cityName'];
 		}

		$res = mysqli_query($con, "UPDATE cities SET cityName='$cityName', stateID='$stateID' WHERE cityID='$cityID'");


		if ($res) {
			echo "<script> openPage('cities.php'); </script>
            <p class='message'>CityName Updated</p>";
		} 

	}

?>

<h2>Cities</h2>
<div class="row">
	<form method="post">

		<div class="row">
            <div class="col span-1-of-3">
                <label for="stateName" class="label">State Name :</label>
            </div>
            <div class="col span-2-of-3">
                <select name="stateName">
                	<?php 

                		$stateQuery = mysqli_query($con, "SELECT * FROM state");

                		while ($row = mysqli_fetch_array($stateQuery)) {
                			
                			echo "<option value=' " . $row['stateID'] . "'> " . $row['stateName'] . " </option>";

                		}

                	?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col span-1-of-3">
                <label for="cityName" class="label">New CityName :</label>
            </div>
            <div class="col span-2-of-3">
                <?php 
                    $nameQuery = mysqli_query($con, "SELECT cityName FROM cities WHERE cityID='$cityID'");
                    $names = mysqli_fetch_array($nameQuery);
                    $name = $names['cityName'];
                ?>
                <input type="text" name="cityName" class="cityName" value="<?php echo $name; ?>"  required > 
            </div>
        </div>
       
        <div class="row">
            <div class="col span-1-of-3">
                <label>&nbsp;</label>
            </div>
            <div class="col span-2-of-3">
                <button class="btn btn-full citySubmit" id="citySubmit" name="citySubmit"> Update </button>
            </div>
         </div>
    </form>
</div>


<?php include('includes/footer.php'); ?>