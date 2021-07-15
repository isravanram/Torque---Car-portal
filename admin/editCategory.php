<?php 
    include('../includes/config.php');

    if (isset($_SESSION['admin']) && isset($_GET['id'])) {
        $admin = $_SESSION['admin'];
        $categoryID = $_GET['id'];
    } else {
        header("Location: ../index.php");
    }

	if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}

    $nameQuery = mysqli_query($con, "SELECT category_name FROM category WHERE category_id='$categoryID'");
    $names = mysqli_fetch_array($nameQuery);
    $name = $names['category_name'];

	if (isset($_POST['categorySubmit'])) {
		
		$categoryName = $_POST['categoryName'];
		$res = mysqli_query($con, "UPDATE category SET category_name='$categoryName' WHERE category_id='$categoryID'");

		if ($res) {
			echo "<script>openPage('category.php')</script>
                <p class='message'>Category Updated..</p> ";
		}

	}

?>

<h2>Update Category</h2>
<div class="row">
	<form method="post">

        <div class="row">
            <div class="col span-1-of-3">
                <label for="categoryName" class="label"> New Name :</label>
            </div>
            <div class="col span-2-of-3">
                <input type="text" name="categoryName" value="<?php echo $name; ?>" class="categoryName"  required> 
            </div>
        </div>
       
        <div class="row">
            <div class="col span-1-of-3">
                <label>&nbsp;</label>
            </div>
            <div class="col span-2-of-3">
                <button class="btn btn-full categorySubmit" id="categorySubmit" name="categorySubmit"> Update Category </button>
            </div>
         </div>
    </form>
</div>

