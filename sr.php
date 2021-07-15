
<?php
        include("includes/config.php");
        
//        session_start();
        //We are referring to value of submit
    
//    if (!isset($_POST['searchbar']))
//        {
//            
//            echo "ERROR FOUND";
//           header("Location : sd.html");
//        }

        
     



        

    //For navigation


    if(isset($_POST['filter']))
    {
//        echo "HELLO";
        $Petrol="Nil";
        $Diesel="Nil";
        $Gasoline="Nil";
        $Sedan="Nil";
        $SUV="Nil";
        $Hatchback="Nil";
        $Sports="Nil";
        $AstonM="Nil";
        $Audi="Nil";
        $BMW="Nil";
        $Mercedes="Nil";
        $Lamborghini="Nil";
        
        $flag=0;
        
        if(isset($_POST['Petrol']))
        {
            $flag=1;
            $Petrol="Petrol";
//            echo $Petrol;
        }
        
        if(isset($_POST['Diesel']))
        {
            $flag=1;
            $Diesel="Diesel";
//            echo $Diesel;
        }
        
        
        if(isset($_POST['Gasoline']))
        {
            $flag=1;
            $Gasoline="Gasoline";
        }
        
        
        if($flag!=1)
        {
            $Gasoline="Gasoline";
            $Diesel="Diesel";
            $Petrol="Petrol";
            
        }
        
        
        
//       +++++++++ CATEGORY +++++++++
        
        $flag=0;
        
        if(isset($_POST['Sedan']))
        {
            $flag=1;
            $Sedan="Sedan";
//            echo $Sedan;
        }
        
        if(isset($_POST['SUV']))
        {
            $flag=1;
            $SUV="SUV";
        }
        
        if(isset($_POST['Hatchback']))
        {
            $flag=1;
            $Hatchback="Hatchback";
        }
        
        if(isset($_POST['Sports']))
        {
            $flag=1;
            $Sports="Sports";
        }
        
        if($flag!=1)
        {
            $Sedan="Sedan";
            $Hatchback="Hatchback";
            $SUV="SUV";
            $Sports="Sports";
            
        }
        
        
//        ++++++++++++BRAND+++++++
        
        $flag=0;
        
        if(isset($_POST['AstonM']))
        {
            $flag=1;
            $AstonM="Aston Martin";
//            echo $Sedan;
        }
        
        if(isset($_POST['Audi']))
        {
            $flag=1;
            $Audi="Audi";
        }
        
        if(isset($_POST['BMW']))
        {
            $flag=1;
            $BMW="BMW";
        }
        
        if(isset($_POST['Mercedes']))
        {
            $flag=1;
            $Mercedes="Mercedes";
        }
        
        if(isset($_POST['Lamborghini']))
        {
            $flag=1;
            $Lamborghini="Lamborghini";
        }
        if($flag!=1)
        {
           $AstonM="Aston Martin"; 
           $Audi="Audi";
           $BMW="BMW";
           $Mercedes="Mercedes";
           $Lamborghini="Lamborghini";
            
        }
        
//        MILEAGE
        $min1=0;
        $max1=0;
        $min2=0;
        $max2=0;
        $min3=0;
        $max3=0;
        $min4=0;
        $max4=0;
        
        
        $flag=0;
         if(isset($_POST['5-10']))
        {
            $flag=1;
            $min1=5;
             $max1=10;
        }
        
        if(isset($_POST['10-20']))
        {
            $flag=1;
            $min2=10;
            $max2=20;
        }
        
        if(isset($_POST['20-30']))
        {
            $flag=1;
            $min3=20;
            $max3=30;
        }
        
        if(isset($_POST['30-40']))
        {
            $flag=1;
            $min4=30;
            $max4=40;
        }
        if($flag!=1)
        {
            $min1=0;
            $max1=100;
            $min2=0;
            $max2=100;
            $min3=0;
            $max3=100;
            $min4=0;
            $max4=100;            
        }
        
//        $query= "SELECT * FROM `model` WHERE (Fuel_type LIKE '%".$Petrol."%' OR Fuel_type LIKE '%".$Gasoline."%' OR Fuel_type LIKE '%".$Diesel."%') AND ( Category LIKE '%".$Sedan."%' OR Category LIKE '%".$SUV."%' OR Category LIKE '%".$Sports."%' OR Category LIKE '%".$Hatchback."%') AND ( Brand LIKE '%".$AstonM."%' OR Brand LIKE '%".$Audi."%' OR Brand LIKE '%".$BMW."%' OR Brand LIKE '%".$Lamborghini."%' OR Brand LIKE '%".$Mercedes."%') AND ( (Mileage > '$min1' AND Mileage < '$max1')OR (Mileage > '$min2' AND Mileage < '$max2') OR (Mileage > '$min3' AND Mileage < '$max3') AND (Mileage > '$min4' AND Mileage < '$max4') ) ORDER BY Maintenance";

        
        //QUERY PRICE SORT
        
//        if (isset($_POST['sortprice']))
//        {
//            echo "<script>alert('hello')<script>";
//        if(isset($_POST['sortprice']))
            $query= "SELECT * FROM `model` WHERE (Fuel_type LIKE '%".$Petrol."%' OR Fuel_type LIKE '%".$Gasoline."%' OR Fuel_type LIKE '%".$Diesel."%') AND ( Category LIKE '%".$Sedan."%' OR Category LIKE '%".$SUV."%' OR Category LIKE '%".$Sports."%' OR Category LIKE '%".$Hatchback."%') AND ( Brand LIKE '%".$AstonM."%' OR Brand LIKE '%".$Audi."%' OR Brand LIKE '%".$BMW."%' OR Brand LIKE '%".$Lamborghini."%' OR Brand LIKE '%".$Mercedes."%') AND ( (Mileage > '$min1' AND Mileage < '$max1')OR (Mileage > '$min2' AND Mileage < '$max2') OR (Mileage > '$min3' AND Mileage < '$max3') AND (Mileage > '$min4' AND Mileage < '$max4') ) ORDER BY Cost";
            
        
        //QUERY MILEAGE SORT
//        else if(isset($_POST['sorteconomy']))
//        {
//            echo "SORT ECONOMY";
//            $query= "SELECT * FROM `model` WHERE (Fuel_type LIKE '%".$Petrol."%' OR Fuel_type LIKE '%".$Gasoline."%' OR Fuel_type LIKE '%".$Diesel."%') AND ( Category LIKE '%".$Sedan."%' OR Category LIKE '%".$SUV."%' OR Category LIKE '%".$Sports."%' OR Category LIKE '%".$Hatchback."%') AND ( Brand LIKE '%".$AstonM."%' OR Brand LIKE '%".$Audi."%' OR Brand LIKE '%".$BMW."%' OR Brand LIKE '%".$Lamborghini."%' OR Brand LIKE '%".$Mercedes."%') AND ( (Mileage > '$min1' AND Mileage < '$max1')OR (Mileage > '$min2' AND Mileage < '$max2') OR (Mileage > '$min3' AND Mileage < '$max3') AND (Mileage > '$min4' AND Mileage < '$max4') ) ORDER BY Mileage DESC";
//        }
        
        
        
            
            $query= "SELECT * FROM `model` WHERE (Fuel_type LIKE '%".$Petrol."%' OR Fuel_type LIKE '%".$Gasoline."%' OR Fuel_type LIKE '%".$Diesel."%') AND ( Category LIKE '%".$Sedan."%' OR Category LIKE '%".$SUV."%' OR Category LIKE '%".$Sports."%' OR Category LIKE '%".$Hatchback."%') AND ( Brand LIKE '%".$AstonM."%' OR Brand LIKE '%".$Audi."%' OR Brand LIKE '%".$BMW."%' OR Brand LIKE '%".$Lamborghini."%' OR Brand LIKE '%".$Mercedes."%') AND ( (Mileage > '$min1' AND Mileage < '$max1')OR (Mileage > '$min2' AND Mileage < '$max2') OR (Mileage > '$min3' AND Mileage < '$max3') AND (Mileage > '$min4' AND Mileage < '$max4') ) ";

        
        
        $search_query=mysqli_query($con,$query);
        
            if(mysqli_num_rows($search_query) !=0 )
            {
                $result=mysqli_fetch_assoc($search_query); 
            }
        
    }

    else if (isset($_POST['searchbar']) )
        { 
            
            $query="SELECT * FROM model  WHERE Name LIKE '%".$_POST['searchbar']."%'";
            $search_query=mysqli_query($con,$query);
        
            if(mysqli_num_rows($search_query) !=0 )
            {
                $result=mysqli_fetch_assoc($search_query); 
                
            }
            else
            {
                $flag=1;
           
                
            }
        }
    else if (isset($_POST['search2']) )
        { 
            
            $query="SELECT * FROM model  WHERE Name LIKE '%".$_POST['searchbar2']."%'";
            $search_query=mysqli_query($con,$query);
        
            if(mysqli_num_rows($search_query) !=0 )
            {
                $result=mysqli_fetch_assoc($search_query); 
                
            }
            else
            {
                $flag=1;
          
            }
        }
    else
    {
            
            if(isset($_POST['sortprice']))
            {
                 $query= "SELECT * FROM `model` ORDER BY Cost";

            }
            else if(isset($_POST['sorteconomy']))
            {
                $query= "SELECT * FROM `model` ORDER BY Mileage DESC";
            }
            
            else if(isset($_POST['sortm']))
            {
                $query= "SELECT * FROM `model` ORDER BY Maintenance ";
            }
            
            else
            {
                $query=  "SELECT * FROM `model` ";
    
            }
            $search_query=mysqli_query($con,$query);
            if(mysqli_num_rows($search_query) !=0 )
            {
                $result=mysqli_fetch_assoc($search_query); 
            }
        
    }


 
?>


<html>
    <head>
        <title>Search results</title>
<!--        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">-->
        <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="ds2.css">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Kufam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Hind+Siliguri:wght@500&family=Kufam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Hind+Siliguri:wght@500&family=Kufam&family=Prompt:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Hind+Siliguri:wght@500&family=Kufam&family=Prompt:wght@300&display=swap" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
        <script src="script.js"></script>
        
        
        <link href="https://fonts.googleapis.com/css2?family=Kufam&family=Montserrat&display=swap" rel="stylesheet">
    
<!--        For price range jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
        <script>
          
        </script>
    
    </head>
<body>
        
<header>
          <img src="logo-1561819118194.png" class="mainIcon">
</header>
       
                <div class="login">
                            <?php 
                                    if (isset($_SESSION['userLoggedIn']) == true) {
                                        echo "<a href='myAccount.php'>My Account</a>";

                                    } else {

                                        echo "<a href='register.php'>Log In / Sign up</a>";

                                    }
                                ?>
                          <button type='button' class="back" value='Go back!' onclick='history.back()'><i style="font-size:24px" class="fa">&#xf0a8;</i></button>

                    
                </div>
<!--        <div class="large-container">-->
            
            
        
            


            
            

     <div  class="large-container" style="display :flex ;">
                <div class="nav">
<!--
                        <h4>Sort by popularity</h4>
                        
                        <h4>Sort by price </h4>
                        
-->
                        <h1 id="filter"> Filter search</h1>
                    
                    
                    <form name="filter3" method="POST" >
                        <h2 id="filter-type">Fuel</h2>
                            <label class="container2">Petrol
                              <input type="checkbox"  name="Petrol">
                              <span class="checkmark"></span>
                            </label>
                            <label class="container2">Diesel
                              <input type="checkbox" name="Diesel">
                              <span class="checkmark"></span>
                            </label>
                            <label class="container2">Gasoline
                              <input type="checkbox" name="Gasoline">
                              <span class="checkmark"></span>
                            </label>
    
                        <h2 id="filter-type">Category</h2>
                                <label class="container2">Sedan
                                  <input type="checkbox" name="Sedan">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">SUV
                                  <input type="checkbox" name="SUV">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">Hatchback
                                  <input type="checkbox" name="Hatchback">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">Sports
                                  <input type="checkbox" name="Sports">
                                  <span class="checkmark"></span>
                                </label>
                        
                        
                        <h2 id="filter-type">Company</h2>
                                <label class="container2">AstonM
                                  <input type="checkbox"  name="AstonM">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">Audi
                                  <input type="checkbox" name="Audi">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">BMW
                                  <input type="checkbox" name="BMW">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">Mercedes
                                  <input type="checkbox" name="Mercedes">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">Lamborghini
                                  <input type="checkbox" name="Lamborghini">
                                  <span class="checkmark"></span>
                                </label>
                        
                        
                        <h2 id="filter-type">Economy (K/L)</h2>
                                <label class="container2"> 5-10
                                  <input type="checkbox"  name="5-10">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">10-20
                                  <input type="checkbox" name="10-20">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">20-30
                                  <input type="checkbox" name="20-30">
                                  <span class="checkmark"></span>
                                </label>
                                <label class="container2">30-40
                                  <input type="checkbox" name="30-40">
                                  <span class="checkmark"></span>
                                </label>
                                <br>
                        
                        
                        <input type="submit" name="filter" class="btn" value="Apply filters">
                    </form>                                    
                    
                </div> 
                
         
<?php 
    if(isset($search_query))
    {
    if(mysqli_num_rows($search_query)!=0 )
    {
    ?>
            
            
            <div class="container" >

                    <?php
                    
                        do 
                        {  $image=$result['Image_path']; ?> 
                        <div class="boss">    
 
                            <div class="box"><br><br>
                                <div class="name"><?php echo $result['Name']; ?></div>
                                <img src="<?php echo $image;?>" height="500px" width="800px">
                                <div class="text">                    
                                    <div class="flex-inside">                                                   
                                            <div class="box1">
                                                    <h3>ENGINE <i class="fas fa-cogs"></i></h3><?php echo $result['Engine']; ?>
                                            </div>                                          
                                            
                                            <div class="box2">
                                                    <h3>CYLINDER <i class="fas fa-cogs"></i></h3><?php echo $result['Cylinders']; ?>
                                            </div>
                                                                                                
                                            <div class="box3">
                                                    <h3>ECONOMY <i class="fas fa-align-center"></i></h3><?php echo $result['Economy']; ?>
                                            </div>        
                                                          
                                    </div> <!-- Closing flex inside -->
                                    
                                    <div class="flex-inside">
                                            <div class="box5">
                                                    <h3>SEATS <i class="fab fa-accusoft"></i></h3><?php echo $result['Seats']; ?>
                                            </div>
                                                                            
                                            <div class="box6">
                                                    <h3 >VARIANTS <i class="fas fa-adjust"></i></h3><?php echo $result['Variants']; ?>
                                            </div>
                                                                            
                                            <div class="box4">
                                                    <h3>PRICE <i class="fab fa-500px"></i></h3> &#8377 <?php echo $result['Price']; ?>
                                            </div>
                                    </div> <!-- Closing flex inside-->
                                                    

                                    <br>
<!--                                    <h3>NEAREST SHOWROOM</h3>-->
                                    <br>

<!--
                                    <div class="map">    
                                        <iframe id="maps" width="70%" height="20%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in?output=embed"></iframe>
                                    </div>
-->                                 
                                    <form method="POST" action="productDetail.php" class="explore">
<!--                                        <input type="submit" class="btn2" name="explore" value="Explore the model">-->
                                            <input type="hidden" name="id" value="<?php echo $result['Model_ID']; ?>" >
                                            <input type="submit" class="btn3" src="explore.jpg" name="explore" value="Explore model">
<!--                                           <input type="image" value="submit" src="explore.jpg" name="explore" >-->
                                            
                                    </form>
                                    <div>
                                        <img src="explore.jpg" height="120px" width="80%" >
                                    </div>
                                    <br>
                                    
                                    <form method="POST" action="load.php" class="map">

                                        <input type="hidden" class="latitude" name="latitude">
                                        <input type="hidden" class="longitude" name="longitude">
                                        <input type="hidden" value="<?php echo $result['Model_ID']?>" name="modelid">
                                        <input type="submit" class="btn2" name="submit_coordinates" value="Find nearest showroom">
                                    </form>
                            
                            </div> 
                        
                         </div>  <!-- Closing box -->
                    
                    </div>   <!--Boss closed -->
            
                    <?php }while($result=mysqli_fetch_assoc($search_query));
                      
                    }
    }
                        
                    else
                    {
                    ?>
        
            
                    <!-- </div> Large container close --> 
        
        
        
        
        
        
    <div class="large-container">
            <p class="result2">Oops ! No results found </p>
            <style>
                body{
/*                            background-image:url(lambo.jpg);*/
                            background-color: white;
                            background-size: cover;
                            
                    }
               .container{
                            background-image: none;
                        }
                
                .models{
                            background-image: none;
                        }
                    
            </style>
                    
                    
            <div class="container">
                    
            </div>
    </div>
            
    <?php
        }
         
     
    ?>
    </div> <!--  Container close --> 
            
          
         
         <div class="nav2">
            <form method="POST">    
                <h1 id="filter" style="padding-left:90px;">Search</h1>
                <input type ="text" name="searchbar2" style="padding:5px; outline:none;" class="brand" placeholder="Brand/Model"/>
                <br>
                
                <input type="submit" style="margin-left:120px; margin-top:30px;" name="search2" class="btn7" value="Go"/>
             </form>    
             <br>
             <br>
             <h1 id="filter" style="padding-left:90px;">Sort</h1>
             <form method="POST" >
                    <input type="submit" name="sortprice" value="Sort by price" id="sort" style="padding-left:40px;"> 
             </form>
             
             <form method="POST" >
                    <input type="submit" name="sortm" value="Sort by maintenance" id="sort" style="padding-left:40px;"> 
             </form>
             
             <form method="POST">
                    <input type="submit" name="sorteconomy" value="Sort by economy" id="sort" style="padding-left:40px;"> 
             </form>
            
         </div>
           
    </div>
    
        
    <script>
//                                                                    
                                    function getLocation(element) {
                                                                                                  
                                                                      if (navigator.geolocation) {
                                                                                navigator.geolocation.getCurrentPosition(function(position){
                                                                                element.querySelector('.latitude').value=position.coords.latitude ;
                                                                                element.querySelector('.longitude').value=position.coords.longitude ;
                                                                                element.submit();
                                                                                });
                                                                                         
                                                                      }
                                                                        else {
                                                                                alert('Geolocation not supported');
                                                                              }
                                                                        }
                                                                                
                                                                                
                                                                        document.querySelectorAll('.map').forEach(function(element){
                                                                        element.addEventListener('submit',function(e){
                                                                        e.preventDefault();
                                                                        getLocation(element);
                                                                                        
                                    
                                                                                    })
                                                                        })
                                                                                
                                                                                
                                                                                
    </script> 
        
    
        
        
</body>

</html>