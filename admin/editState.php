<?php 
    include('../includes/config.php');

    if (isset($_SESSION['admin']) && isset($_GET['id'])) {
        $admin = $_SESSION['admin'];
        $stateID = $_GET['id'];
    } else {
        header("Location: sorry.php");
    }

	if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}

    $nameQuery = mysqli_query($con, "SELECT stateName FROM state WHERE stateID='$stateID'");
    $name = mysqli_fetch_array($nameQuery);

	if (isset($_POST['stateSubmit'])) {
		
		$stateName = $_POST['stateName'];
		$res = mysqli_query($con, "UPDATE state SET stateName='$stateName' WHERE stateID='$stateID'");

		if ($res) {
			echo "<script>openPage('states.php')</script>
                <p class='message'>StateName Updated..</p> ";
		}

	}

?>

<h2>Update State</h2>
<div class="row">
	<form method="post">

        <div class="row">
            <div class="col span-1-of-3">
                <label for="stateName" class="label"> New Name :</label>
            </div>
            <div class="col span-2-of-3">
                <input type="text" id="stateName" name="stateName" value="<?php echo $name['stateName']; ?>" class="stateName"  required> 
            </div>
        </div>
       
        <div class="row">
            <div class="col span-1-of-3">
                <label>&nbsp;</label>
            </div>
            <div class="col span-2-of-3">
                <button class="btn btn-full stateSubmit" id="stateSubmit" name="stateSubmit"> Update StateName </button>
            </div>
         </div>
    </form>
</div>

