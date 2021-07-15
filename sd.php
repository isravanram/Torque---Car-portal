<?php

    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Search Demo</title>
        <link href="https://fonts.googleapis.com/css2?family=Kufam&family=Work+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kufam&family=Kumbh+Sans&family=Work+Sans&display=swap" rel="stylesheet">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="ds.css" rel="stylesheet">
    </head>
    
    <body>    
        
        <div class="header">
        <header>
            <img src="logo-1561819118194.png" class="mainIcon">
        </header>
        
<!--
         <nav class="header">
            <div>
                <a href="index.html"><img src="logo-1561819118194.png" class="mainIcon"></a>

                <ul class="navigation">

                    <a href="index.php">Home</a>
                    <a href="sd.html">Search</a>
                    <a href="login.html" >Login / Singup</a>
                </ul>
            </div>
        </nav>  
-->
           <ul class="topnav">
                                
               <button type='button' class="back" value='Go back!' onclick='history.back()'><i style="font-size:24px" class="fa">&#xf0a8;</i></button>
                                 
               
                   <?php 
                        if (isset($_SESSION['userLoggedIn']) == true) {
                            echo "<a href='myAccount.php'>My Account</a>";
                            
                        } else {
                            
                            echo "<a href='register.php'>Log In / Sign up</a>";
                           
                        }
                    ?>
                </ul>
        
        
        
            <div class=parent>   
            
                <div class="sidebar">
                     <h1 id="filter"> Filter search</h1>
                    
                    
                    <form name="filter" method="POST" action="sr.php">
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
                            
                
                        <div class="content">
                                <form method="post" action="sr.php">
                                    <h1>Discover the models </h1>
                                    <div class="form-box">
                                        <input type ="text" name="searchbar" class="brand" placeholder="Brand/Model"/>
                                        <input type="submit" name="Submit" class="btn" value="Search"/>
                                    </div>
                                </form>
                            
                            </div>
                            </div>
            
            
        </div>
    </body>

</html>