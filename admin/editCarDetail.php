<?php 
    include('../includes/config.php');

    if (isset($_SESSION['admin']) && isset($_GET['id'])) {
        $admin = $_SESSION['admin'];
        $modelID = $_GET['id'];
    } else {
        header("Location: ../index.php");
    }

    if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ) {
		include('../includes/config.php');
	} else {
		include('includes/header.php');
	}

    $modelQuery = mysqli_query($con, "SELECT * FROM model WHERE model_id='$modelID'");
    $model = mysqli_fetch_array($modelQuery);



    if(isset($_POST['update_details'])) {
        $model_name = $_POST['model_name'];
        $brand_id = $_POST['brand_id'];
        $category_id = $_POST['category_id'];
        $colors = $_POST['color'];
        $seats = $_POST['seats'];
        $status = $_POST['status'];
        $fuel_economy = $_POST['fuel_economy'];
        $bhp = $_POST['bhp'];
        $price = $_POST['price'];
        $launch_date = $_POST['launch_date'];
        $description = $_POST['description'];
        $fuel_type = $_POST['fuel_type'];


        // echo $model_name;
        // echo $modelID;

        $carUpdateQuery = "UPDATE model SET model_name='$model_name', brand_id=$brand_id, category_id=$category_id, colors='$colors', status='$status', seat=$seats, launch_date='$launch_date', description='$description', fuel_type=$fuel_type, price='$price', avg_maintenance=0, fuel_economy=$fuel_economy, power=$bhp WHERE model_id=$modelID";

        $res = mysqli_query($con, $carUpdateQuery);

        if ( $res ) {
            echo "<script>
                    alert('Car Detail(s) Updated');
                    openPage('brand.php');
                  </script>
            ";      
        }

    }


?>


<h2>Edit Car Details</h2>
<div class="tracklistContainer">
    <ul class="tracklist">
        <form method="post" action="" enctype="multipart/form-data">
            <table>

                <tr>
                    <td>Model Name : </td>
                    <td>
                        <input type="text" name="model_name" value="<?php echo $model['model_name']; ?>" required>
                    </td>
                </tr>

                
                <tr>
                    <td>Brand: </td>
                    <td>

                        <select name="brand_id"  required>
                            
                            <?php 

                                $brandQuery = "SELECT * FROM car_brand ORDER BY brand_name";
                                $brandResult = $con->query($brandQuery);
                                
                                while ($row = mysqli_fetch_array($brandResult)) {
                                    
                                    if ( $model['brand_id'] == $row['brand_id'] ){
                                        echo "<option value= " . $row['brand_id'] ." selected required > " . $row['brand_name'] ."  </option>";
                                    } else {
                                        echo "<option value= " . $row['brand_id'] ." required > " . $row['brand_name'] ."  </option>";
                                    }
                                    
                                }


                            ?>


                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>

                        <select name="category_id" required>
                            
                            <?php 

                                $categoryQuery = "SELECT * FROM category ORDER BY category_name";
                                $categoryResult = $con->query($categoryQuery);
                                
                                while ($row = mysqli_fetch_array($categoryResult)) {

                                    if ( $model['category_id'] == $row['category_id'] ){
                                        echo "<option value= " . $row['category_id'] ." selected required > " . $row['category_name'] ."  </option>";
                                    } else {
                                        echo "<option value= " . $row['category_id'] ." required > " . $row['category_name'] ."  </option>";
                                    }
                                }


                            ?>


                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Colors : </td>
                    <td>
                        <input type="text" name="color" value="<?php echo $model['colors']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Seating Capacity :</td>
                    <td>
                        <select name="seats" required>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>

                        </select>

                    </td>

                </tr>


                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" required>
                            <option value="Launched">Launched</option>
                            <option value="Upcoming">Upcoming</option>
                            <option value="Romoured">Romoured</option>

                        </select>

                    </td>

                </tr>



                <tr>
                    <td>Fuel Economy: </td>
                    <td>
                        <input type="number" name="fuel_economy" value="<?php echo $model['fuel_economy']; ?>" required>
                    </td>
                </tr>     


                <tr>
                    <td>Power : </td>
                    <td>
                        <input type="number" name="bhp" value="<?php echo $model['power']; ?>" required>
                    </td>
                </tr>     

                <tr>
                    <td>Price : </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $model['price']; ?>" required>
                    </td>
                </tr>               

                <tr>
                    <td>Launch Date : </td>
                    <td>
                        <input type="date" name="launch_date" value="<?php echo $model['launch_date']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Description : </td>
                    <td>
                        <textarea name="description" required>
                            <?php echo $model['description']; ?>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <td>Fuel Type: </td>
                    <td>

                        <select name="fuel_type" required>
                            
                            <?php 

                                $fuelQuery = "SELECT * FROM fuel_type ORDER BY fuel_type";
                                $fuelResult = $con->query($fuelQuery);
                                
                                while ($row = mysqli_fetch_array($fuelResult)) {
                                    echo "<option value= " . $row['fuel_type_id'] ." required > " . $row['fuel_type'] ."  </option>";
                                }


                            ?>


                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="update_details" value="Update Details">
                    </td>

                </tr>
            </table>
        </form>
    </ul>
</div>