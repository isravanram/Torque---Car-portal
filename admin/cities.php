<?php 
    
    include('../includes/config.php');

    if (isset($_SESSION['admin'])) {
        $admin = $_SESSION['admin'];
    } else {
        header("Location: sorry.php");
    }
    
	if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}
	
	if (isset($_POST['citySubmit'])) {
		
		$cityName = $_POST['cityName'];

		if (isset($_POST['stateName'])) {
			$stateID = $_POST['stateName'];
 		}

        $check = mysqli_query($con, "SELECT cityID FROM cities WHERE cityName='$cityName'");

        $number = mysqli_num_rows($check);
        if ($number > 0 ) {
            echo "<script>openPage('cities.php')</script>
                <p class='message'>City Name Already Exist..</p> ";
        } else {
            $res = mysqli_query($con, "INSERT INTO cities VALUES('', '$cityName', '$stateID')");    
            
            if ($res) {
                echo "<script>openPage('cities.php')</script>
                <p class='message'>City Name Added</p>";
            }
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
                <label for="cityName" class="label">City Name :</label>
            </div>
            <div class="col span-2-of-3">
                <input type="text" name="cityName" class="cityName" placeholder="e.g Kolkata" required > 
            </div>
        </div>
       
        <div class="row">
            <div class="col span-1-of-3">
                <label>&nbsp;</label>
            </div>
            <div class="col span-2-of-3">
                <button class="btn btn-full citySubmit" id="citySubmit" name="citySubmit"> Submit </button>
            </div>
         </div>
    </form>
</div>

<h2>All Cities</h2>
<div class="tracklistContainer">
    <ul class="tracklist">
        
        <?php
        $citiesQuery = mysqli_query($con, "SELECT * FROM cities");
        while($row = mysqli_fetch_array($citiesQuery)) {

            echo "<li class='tracklistRow'>
                    <div class='trackCount'>
                        <span class='trackNumber'>". $row['cityID']."</span>
                    </div>


                    <div class='trackInfo smallTrackInfo'>
                        <span class='trackName'>" . ucfirst($row['cityName']) ."</span>
                    </div>

                    <div class='trackDuration longTrackDuration'>

                    
                        <input type='button' class='btn btn-ghost' name='deleteCategory' onclick='deleteCity(" . $row['cityID'] . ")' value='Delete' style='margin-left:-35px; margin-top: 7px; background-color: red;'>

                        <input type='submit' class='btn btn-full' name='editCity' onclick='openPage(\"editCity.php?id=" . $row['cityID'] . "\")' value='Edit' style='margin-left:0px; display: inline; margin-top: 7px;'>
                    
                    </div>

                </li>";

        }

        ?>

    </ul>
</div>

<?php include('includes/footer.php'); ?>