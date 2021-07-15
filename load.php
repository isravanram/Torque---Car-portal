


<?php
        include("includes/config.php");
        
        //We are referring to value of submit
    
//        if (!isset($_POST['submit_coordinates']))
//        {
//            
//           header("Location : searchpage.html");
//        }
        $Model_ID=$_POST['modelid'];
            $query="SELECT * FROM locations WHERE Model_ID='.$Model_ID.'";
//        $query="SELECT * FROM locations WHERE ID='1'";
//        $query="SELECT * FROM model INNER JOIN car_images ON model.Model_ID=car_images.Model_ID WHERE Name LIKE '%".$_POST['searchbar']."%'";
    
        $search_query=mysqli_query($con,$query);
        
        if(mysqli_num_rows($search_query) !=0 )
        {
            $result=mysqli_fetch_assoc($search_query); 
        

//        echo $_POST['latitude'];
//        echo $_POST['longitude'];
        
?>




<?php




    
 function twopoints_on_earth($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo) 
  { 
                     $long1 = deg2rad($longitudeFrom); 
                     $long2 = deg2rad($longitudeTo); 
                     $lat1 = deg2rad($latitudeFrom); 
                     $lat2 = deg2rad($latitudeTo); 

                     //Haversine Formula 
                     $dlong = $long2 - $long1; 
                     $dlati = $lat2 - $lat1; 

                     $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2); 

                     $res = 2 * asin(sqrt($val)); 

                     $radius = 3958.756; 

                     return ($res*$radius); 
    } 
    
    if(isset($_POST['latitude']))
    {
        if(mysqli_num_rows($search_query)!=0)
        {
            $lat_min=0;
            $loc_ID=NULL;
            $long_min=0;
            $user_lat=$_POST['latitude'];
            $user_long=$_POST['longitude'];
            $min_dis=10000000000000000;
            do
            {
                              $min=$min_dis;
                                       
                              // latitude and longitude of Two Points 
                              $latitudeFrom = $user_lat ; 
                              $longitudeFrom = $user_long ; 
                              $latitudeTo = $result['Latitude']; 
                              $longitudeTo = $result['Longitude'];
                              $dis=twopoints_on_earth( $latitudeFrom, $longitudeFrom, $latitudeTo,  $longitudeTo);
                              
                              if($dis < $min)
                              {
                                  $lat_min=$result['Latitude'];
                                  $long_min=$result['Longitude'];
                                  $min_dis=$dis;
                                  $loc_ID=$result['ID'];
                              }
                
                
            }while($result=mysqli_fetch_assoc($search_query));
        
            
            
            $latitude = $lat_min;
            $longitude = $long_min;
            
//            $query="SELECT * FROM locations WHERE Latitude ='.$latitude.' AND Longitude ='.$longitude.' AND Model_ID ='.$Model_ID.'";
            $query="SELECT Place,ID FROM locations WHERE ID='.$loc_ID.' ";
            
            $search_query=mysqli_query($con,$query);
            $place="Nearest showroom";    
            
            if(mysqli_num_rows($search_query) !=0 )
            {
                $result=mysqli_fetch_assoc($search_query); 
            }
            
            if(mysqli_num_rows($search_query) != 0)
            {
                echo "HELLO";
                $result=mysqli_fetch_assoc($search_query);
                $place=$result['Place'];
            }
            
            
        
                ?>
<html>
    <head> <title> Nearest Showroom</title>
    
    <link type="text/css" rel="stylesheet" href="ds2.css">
    </head>
    <body>
        
        <header>
          <img src="logo-1561819118194.png" class="mainIcon">
        </header>
    <style>
        body
        {
/*            background-image: url(demo1.jpg);*/
        }
        
        .map9
        {
            
            margin-top:300px;    
/*            padding-left: 200px;*/
        }
        
        h3{
            padding-bottom: 5px;
            padding-bottom: 5px;
            padding-left:700px;
            
        }
    </style>
        
        <div class="map9">

        <iframe width="100%" height="70%" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>
    </div>

    <?php
        
        }
    }
  }
?>
       <h1>Showroom is not available </h1>
        <style>
            body
            {
                background-image: url(demo2.jpg);
                background-size: cover;
            }
            h1
            {
                margin-top: 70px;
                color:white;
                font-family:monospace;
            }
        </style>
    </body>
</html>