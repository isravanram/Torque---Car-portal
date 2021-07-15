<?php include('../../../../includes/config.php'); ?>
<?php 

	if (isset($_POST['categoryName'])) {
		
		$categoryName = $_POST['categoryName'];
		$res = mysqli_query($con, "INSERT INTO category VALUES('', '$categoryName', 'images/tsdffs')")

		if ($res) {
			echo "RECORD INSERTED"
		}
	}

?>