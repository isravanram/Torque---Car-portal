<?php 
    include("../../../../includes/config.php");

    if (isset($_POST['stateID'])) {
        $stateID = $_POST['stateID'];

        $deleteStateQuery = mysqli_query($con, "DELETE FROM state WHERE stateID='$stateID'");
    } else {
        echo "stateID is not passed into deleteState.php";
    }

 ?>