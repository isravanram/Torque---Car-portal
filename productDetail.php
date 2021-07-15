<?php 
    session_start();

    
	if (isset($_GET['id'])) {
		$modelID = $_GET['id'];
	} 

    else if(isset($_POST['explore']))
    {
        
        $_SESSION['id']=$_POST['id'];
        $modelID=$_SESSION['id'];
        
    }
    else
    {
        $modelID=$_SESSION['id'];
    }
    include 'includes/config.php';

    /* Fetching Details */
    $modelQuery = $con->query("SELECT * FROM model WHERE model_id='$modelID'");
    $model = mysqli_fetch_array($modelQuery);

    
    $imagesQuery = mysqli_query($con, "SELECT * FROM car_images WHERE Model_ID='$modelID'");

    


    
?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $model['Name']; ?> | Torque</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script>

    <style>
        html
        {
            zoom:145%;
            
            
        }
    
    </style>
    
    <script type="text/javascript">
        $(document).ready(function(){
            // Check Radio-box
            $(".rating input:radio").attr("checked", false);

            $('.rating input').click(function () {
                $(".rating span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('input:radio').change(
              function(){
                var userRating = this.value;
                //alert(userRating);
                document.cookie = "ratings = " + userRating;
            }); 
        });
    </script>

</head>
<body>

	<section style="background-color: #f4f4f4; margin: 0; padding: 0;" >
	<header style="height: 20px;">
		<nav>
            <div>
                <a href="index.php"><img src="logo-1599455332554.png" class="mainIcon"></a>	
                <ul class="nav">


                   <?php 
                        /* If account is logged in display MyAccount else Log In / Sign Up. */
                        if (isset($_SESSION['userLoggedIn']) == true) {
                            echo "<a href='sd.php'>Search</a>";
                            echo "<a href='myAccount.php'>My Account</a>"; 
                            echo "<a href='sr.php' > Back </a>";
                        } else {
                            echo "<a href='sd.php'>Search</a>";
                            echo "<a href='register.php'>Log In / Sign up</a>";
                            echo "<a href='sr.php' > Back <i style='font-size:24px' class='fa'>&#xf0a8;</i></a>";
                           
                        }
                    ?>
                </ul>
            </div>
        </nav>
	</header>

	<section class="section-carsImages">
            <ul class="cars-showcase clearfix">
                <!-- <li>
                    <figure class="car-photo">
                        <img src="">
                    </figure>
                </li> -->

                <?php 
                    for($i=1; $i <= 4; $i++ ) {

                        $row = mysqli_fetch_array($imagesQuery);

                        echo "<li>
                                <figure class='car-photo'>
                                    <img src='resource/carImages/" . $row['image_path'] . "' height='500px' width='600px'>
                                </figure>
                            </li>";                        
                    }
                ?>
            </ul>
            <ul class="cars-showcase clearfix">
                <?php 
                    for($i=1; $i <= 4; $i++ ) {

                        $row = mysqli_fetch_array($imagesQuery);
                        
                        echo "<li>
                                <figure class='car-photo'>
                                    <img src='resource/carImages/" . $row['image_path'] . "' height='500px' width='300px' >
                                </figure>
                            </li>";                        
                    }
                ?>
            
            </ul>
        </section>
    </section>

    <section class="section-car_spec" style="height: 30vh;" >
        
        <div class="cars_features">
            
            <h2>Key Specs</h2>
            <p class="car_title"> <?php echo $model['Name']; ?> </p>    
            <div class="car_feature">
                <div class="car_feature-title">
                    <img class="car_feature-icon" src="icons/bhp.svg">
                    <h4> <?php echo $model['Engine'] ?> </h4>
                </div>
            </div>
            
            <div class="car_feature">
                <div class="feature-title">
                    <img class="car_feature-icon" src="icons/sedan.svg">
                    <h4>
                        <?php 

                            $categoryNamequery = mysqli_query($con, "SELECT category_name FROM category WHERE category_id=" . $model['Category_ID'] . "");
                            $categoryName = mysqli_fetch_array($categoryNamequery);
                            echo $categoryName['category_name'];

                        ?>

                    </h4>
                </div>
            </div>
            
            <div class="car_feature">
                <div class="car_feature-title">
                    <img class="car_feature-icon" src="icons/rupee.svg">
                    <h4><?php echo $model['Price']; ?></h4>
                </div>
            </div>    


        </div>
    </section>
    
    <br> <br> <br> <br>
    <section class="car_details">

        <p class="car_description">
            <b> Description : </b>
            <?php 

                echo $model['Description'];
            ?>
        </p>

        <br> <br>

        <table class="specs_table">
            <b> Specifications & Details </b>
            <tr>
                <td class="car_detail_category">Brand</td>
                <td class="car_detail car_description"><?php echo $model['Brand'] ?></td>
            </tr>

            <tr>
                <td class="car_detail_category">Colors</td>
                <td class="car_detail"><?php echo $model['Colors']; ?></td>
            </tr>

            <tr>
                <td class="car_detail_category">Seating Capacity</td>
                <td class="car_detail"><?php echo $model['Seats']; ?></td>
            </tr>

            <tr>
                <td class="car_detail_category">Fuel Type</td>
                <td class="car_detail">
                    <?php 

                            echo $model['Fuel_type'];
//                            $fuelTypequery = mysqli_query($con, "SELECT fuel_type FROM fuel_type WHERE fuel_type_id=" . $model['fuel_type'] . "");
//                            $fuelType = mysqli_fetch_array($fuelTypequery);
//                            echo $fuelType['fuel_type'];

                        ?>
                </td>
            </tr>

            <tr>
                <td class="car_detail_category">Fuel Economy</td>
                <td class="car_detail"><?php echo $model['Mileage']; ?> / KMPL</td>
            </tr>

            <tr>
                <td class="car_detail_category">Average Maintenance </td>
                <td class="car_detail"> <?php echo $model['Avg_maintenance']; ?> Rupees / Years </td>
            </tr>
        </table>
    </section>

    <section class="section-testimonials">

            <div class="row">
                <h2>OUR MEMBERS VALUABLE FEEDBACK</h2>
                <?php 
                    if (isset($_SESSION['userLoggedIn']) == true) {
                        echo "
                            <form method='post'>
                                <table class='commentTable'>
                                    <tr>
                                        <td class='label'> Ratings </td>
                                        <td>
                                            <div class='rating' style='margin-left:-140px; margin-top:40px;'>
                                                <span><input type='radio' name='rating' id='str5' value='5'><label for='str5'></label></span>
                                                <span><input type='radio' name='rating' id='str4' value='4'><label for='str4'></label></span>
                                                <span><input type='radio' name='rating' id='str3' value='3'><label for='str3'></label></span>
                                                <span><input type='radio' name='rating' id='str2' value='2'><label for='str2'></label></span>
                                                <span><input type='radio' name='rating' id='str1' value='1'><label for='str1'></label></span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class='label'>Average Maintenance</td>
                                        <td>
                                            <input type='number' name='avg_maintenance' value=0> / Years
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan='100'></td>
                                    </tr>
                                    <br>
                                    <br>
                                    <tr>
                                    </tr>
                                   
                                    <div clas='pros&cons'>
                                    <tr class='pros'>
                                        <td class='label'>Pros</td>
                                        <td class='label'>Cons</td>
                                    </tr>     
                                    </div>
                                    <tr>
                                        <td><textarea name='pros' rows='7' cols='35' required></textarea></td>
                                        <td><textarea name='cons' rows='7' cols='35' style='margin-left:5px;' required></textarea></td>
                                    </tr>

                                    <tr class='pros'>
                                        <td colspan='2' align='center'>
                                            <input type='submit' class='btn' name='comment' value='Comment'>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        ";
                    } else {
                        echo "<a href='login.php'> To Comment Please Login </a><br>";
                    }
                ?>    
                
            </div>
        <br><br><br><br><br>
            <div class="row">
                <div class="comment-parent">
                    
                     <?php 
                        $commentsQuery = mysqli_query($con, "SELECT * FROM comments INNER JOIN users ON comments.user_id=users.user_id WHERE model_id='$modelID' ORDER BY date_of_comment DESC");
                        while( $comment =mysqli_fetch_array($commentsQuery))
                        {
                        ?>
<!--                    col span-1-of-3-->
                        <div class="comment-box">
                    <blockquote class="myb">

                                     

                                                    <b>Pros:</b><br>
                                                    <i><?php echo $comment['pros']; ?></i> <br><br>

                                                    <b>Cons:</b><br>
                                                    <i><?php echo $comment['cons']; ?></i><br> <br>

                                                        <cite><img src="<?php echo $comment['profile_pic']; ?>"><?php echo $comment['username']; ?></cite>
                                                    <h4>___________________________________________________________________________________________________________________________________________________________</h4>
                                                    <br>
                                                    <br>
                    </blockquote>
                    </div>
                    
                    <?php } ?>   
                
                </div>

                <div class="col span-1-of-3 box">
<!--
                    <blockquote>
                        One of the most perplexing issues with the 2019 BMW 7-Series is that Apple CarPlay is only available as an expensive annual subscription. Add to that the fact that Android Auto is not even available and you have one major smartphone app integration dilemma! For those who want to use the apps they have on their smartphones while driving, this will likely be quite the annoyance. Also, most of BMW's competitors (and now even the less expensive vehicles on the market) feature full smartphone app integration as standard across their line-ups. If BMW wants to compete, it might want to reconsider its smartphone app integration availability status.<cite><img src="resource/customer-image/customer-3.jpg">Miltan Chapman</cite>
                    </blockquote>
-->
                </div>
            </div>
        </section>
    
    
    
     <?php 
        
            //Adding Comment in Database...

            if (isset($_POST['comment'])) {
        if (isset($_COOKIE['ratings'])) {
            $ratings = $_COOKIE['ratings'];            
        }

        $pros = $_POST['pros'];
        $cons = $_POST['cons'];
        $avg_maintenance = $_POST['avg_maintenance'];


        $username = $_SESSION['userLoggedIn'];
        $date = date("Y-m-d H:i:s");
          


        $userIdQuery = mysqli_query($con, "SELECT user_id FROM users WHERE username='$username'");
        $user = mysqli_fetch_array($userIdQuery);
        $userID = $user['user_id'];
        
        
//        $updateQuery=mysqli_query($con,"UPDATE model SET Maintenance=$avg_maintenance WHERE Model_ID=$modelID");
        
                
        $quer="SELECT Maintenance FROM model WHERE Model_ID=$modelID";        
        $search_query=mysqli_query($con,$quer);
        
            if(mysqli_num_rows($search_query) !=0 )
            {
                $result=mysqli_fetch_assoc($search_query); 
            }
        $avg=$result['Maintenance'];
        $new_avg= ($avg+$avg_maintenance)/2;
                
            
        $updateQuery="UPDATE model SET Maintenance=$new_avg WHERE Model_ID=$modelID";
        if($con->query($updateQuery))
        {
            
        }
        else
        {
            echo "Error updating record: " . $conn->error;
        }
        
                
                
        $insertCommentQuery = mysqli_query($con, "INSERT INTO comments VALUES('', $userID, $modelID, '$date', 0, '$pros', '$cons', $ratings, $avg_maintenance)");
        if ($insertCommentQuery) {
            echo "<script>

                alert('Thank You for you Review!');

            </script>";
        }

        
    }
          

    ?>
</body>
</html>


