<?php 
    include('../includes/config.php');

    if (isset($_SESSION['admin'])) {
        $admin = $_SESSION['admin'];
    } else {
        header("Location: ../index.php");
    }

	if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}

	if (isset($_POST['categorySubmit'])) {
		
		$categoryName = $_POST['categoryName'];
		$res = mysqli_query($con, "INSERT INTO category VALUES('', '$categoryName')");

		if ($res) {
			echo "<p class='message'>Category Added</p>";
		}

	}

?>

<h2>Category</h2>
<div class="row">
	<form method="post">

        <div class="row">
            <div class="col span-1-of-3">
                <label for="categoryName" class="label"> Category Name :</label>
            </div>
            <div class="col span-2-of-3">
                <input type="text" name="categoryName" class="categoryName" placeholder="e.g  Bouquet" required > 
            </div>
        </div>
       
        <div class="row">
            <div class="col span-1-of-3">
                <label>&nbsp;</label>
            </div>
            <div class="col span-2-of-3">
                <button class="btn btn-full categorySubmit" id="categorySubmit" name="categorySubmit" onclick="categorySubmit()"> Submit </button>
            </div>
         </div>
    </form>
</div>

<h2>All Category</h2>

<div class="tracklistContainer">
    <ul class="tracklist">
        
        <?php
        $categoriesQuery = mysqli_query($con, "SELECT * FROM category");
        while($row = mysqli_fetch_array($categoriesQuery)) {

            echo "<li class='tracklistRow'>
                    <div class='trackCount'>
                        <span class='trackNumber'>". $row['category_id']."</span>
                    </div>


                    <div class='trackInfo smallTrackInfo'>
                        <span class='trackName'>" . ucfirst($row['category_name']) ."</span>
                    </div>

                    <div class='trackDuration longTrackDuration'>


                        <input type='submit' class='btn btn-full' name='editCategory' onclick='openPage(\"editCategory.php?id=" . $row['category_id'] . "\")' value='Edit' style='margin-left:0px; display: inline; margin-top: 7px;'>
                    
                    </div>

                </li>";

        }

        ?>

    </ul>
</div>

<?php include('includes/footer.php'); ?>