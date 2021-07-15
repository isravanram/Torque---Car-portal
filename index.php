<!--/* -------- Use Iframe //try  ---------- */-->

<?php
    
    include 'includes/config.php';

    //session_start();

    // /**************** COOKIES ********************/
    // if (isset($_COOKIE['visited'])) {
        
    //     $value = $_COOKIE['visited'];
    //     $value += 1;
    //     setcookie('visited', $value, time() + (86400 * 30));

    //     echo "<script> alert('WELCOME BACK YOU VISITED $value Times') </script>";
        
    // } else {
    //     setcookie('visited', 1, time() + (86400 * 30));
    // }


    /**************** SESSIONS ********************/

?>


<!-- TODO : 

1. ADD TABLE STATUS...
2. FEATURE OF REMINDING SERIVCE..
3. FILTER SEARCH..
4. INTEGRATE SEARCH AND RATING..

 -->
<!DOCTYPE html>
<html>
<head>
	<title>Torque | Car Portal</title>
    <link type="text/css" rel="stylesheet" href="style5.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="script.js"></script>
    
</head>
    
<body bgcolor="#f4f4f4" onunload="showGif()" onload="checkCookie()">

    <header class="header" style="margin-bottom: 70px;">
        
        <nav>
            <div>
                <a href="index.php"><img src="logo-1561819118194.png" class="mainIcon"></a>

                <ul class="navigation">

                   <?php 
                        if (isset($_SESSION['userLoggedIn']) == true) {
                            echo "<a href='sd.php'>Search</a>";
                            echo "<a href='myAccount.php'>My Account</a>";
                        } else {
                            echo "<a href='sd.php'>Search</a>";
                            echo "<a href='register.php'>Log In / Sign up</a>";
                        }
                    ?>
                </ul>
            </div>
        </nav>
        
        <div class="headText">
            <h5 >Welcome to Car World. <br>Become a true Car Enthusiast.</h5>
            <a href="sd.php"> <input type="button" value="Explore" class="btn" style=".btn hover{ background:white; color:black;}"> </a>
        </div>
        
    </header>
    
    <section class="section-features">
        
        <div class="features">
            
            <h2>Things You can Find in our Portal</h2>
            
            <div class="feature">
                
                <div class="feature-title">
                    <img class="feature-icon" src="icons/team.svg">
                    <h4>Place for a car enthusiast</h4>
                </div>
            
                <p>You will be amazed by the amount of enthu people have for cars amd you will also fall in love with cars.</p>
            </div>
            
            <div class="feature">
                
                <div class="feature-title">
                    <img class="feature-icon" src="icons/award.svg">
                    <h4>Know a Car Price</h4>
                </div>
                
                <p>Know the price of any car with just a click it's as simple as that :)</p>
            </div>
            
            <div class="feature">
                
                
                <div class="feature-title">
                    <img class="feature-icon" src="icons/rating.svg">
                    <h4>Get Trusted Reviews</h4>
                </div>
                
                <p>If you are planning to get a new car you can Trust our reviews given by our Genuine Users.</p>
            </div>
            
        </div>
        
    </section>
    
    <section class="audioVisual">
        
        <h2>New Lamborghini Huracan Evo</h2>
        
        <video  src="The%20new%20Lamborghini%20Hurac%C3%A1n%20(official%20trailer)%20-%20YouTube%20(720p).mp4" poster="3_RP---Huracan-Evo-88.jpg" height="500px" width="1200px" style="display: block; margin: 0 auto;" alt="Trailer Video" controls>
        </video>
        
        <br>
        
    </section>
    
    
    <div class="upc">
        <section class="section-upcoming-cars">
        
            <h2></h2>
            <h2>Upcoming Cars</h2>
            <a href="productDetail.php?id=8">
                    <div class="upcoming-car" onmouseover="enlarge(this)" onmouseout="small(this)">

                        <img class="car-small-image" src="BMW8series.jpg">

                        <span class="car-name common-attributes">BMW 8 series gran coupe </span>

                        <span class="car-price common-attributes"> &#8377  1.2 Crores onwards</span>
                        <span class="est common-attributes">Estimated Price</span>

                        <span class="est-date common-attributes"> 25th July 2021 </span>
                        <span class="est common-attributes">Estimated Launch</span>

                    </div>
            </a>    
            <a href="productDetail.php?id=1">
                <div class="upcoming-car" onmouseover="enlarge(this)" onmouseout="small(this)">
                    
                    <img class="car-small-image" src="bmw7series.jpg">
                    
                    <span class="car-name common-attributes">BMW 7 Series Facelift</span>
                    
                    <span class="car-price common-attributes"> &#8377 1.22 - 1.4 Crores</span>
                    <span class="est common-attributes">Estimated Price</span>
                    
                    <span class="est-date common-attributes"> 25th July 2021 </span>
                    <span class="est common-attributes">Estimated Launch</span>
                    
                </div>
            </a>

        <a href="productDetail.php?id=3">    
            <div class="upcoming-car" onmouseover="enlarge(this)" onmouseout="small(this)">
                
                
                <img class="car-small-image" src="bmw6series.jpg">
                
                <span class="car-name common-attributes">BMW New 6 Series</span>
                
                <span class="car-price common-attributes"> &#8377 50 - 60 Lakhs</span>
                <span class="est common-attributes">Estimated Price</span>
                
                <span class="est-date common-attributes"> 21st January 2021 </span>
                <span class="est common-attributes">Estimated Launch</span>
                
            </div>
        </a>
            <div class="upcoming-car" onmouseover="enlarge(this)" onmouseout="small(this)">
                
                <img class="car-small-image" src="BMW8series.jpg">
                
                <span class="car-name common-attributes">BMW 8 series</span>
                
                <span class="car-price common-attributes"> &#8377 1.22 - 1.4 Crores</span>
                <span class="est common-attributes">Estimated Price</span>
                
                <span class="est-date common-attributes"> 25th January 2021 </span>
                <span class="est common-attributes">Estimated Launch</span>
                
            </div>
        
            <div class="upcoming-car" onmouseover="enlarge(this)" onmouseout="small(this)">
                
                <img class="car-small-image" src="BMW-7-Series-Facelift-Exterior-146898.jpg">
                
                <span class="car-name common-attributes">BMW 7 Series Facelift</span>
                
                <span class="car-price common-attributes"> &#8377 1.22 - 1.4 Crores</span>
                <span class="est common-attributes">Estimated Price</span>
                
                <span class="est-date common-attributes"> 25th July 2019 </span>
                <span class="est common-attributes">Estimated Launch</span>
                
            </div>
        
        </section> 
    </div>
    <br> <br> 
    
    <img src="http://www.animatedimages.org/data/media/67/animated-car-image-0124.gif" class="animated-gif" border="0" alt="animated-car-image-0124" />
    
    
    <script>
        //alert("Visited : " + amt() + " Times");
    </script>
    
    <style type="text/css">
        
        #demo th {
            padding: 15px;
        }

        #demo td {
            padding: 15px;
        }
    </style>
    
    
<!--    <div><canvas width="500" height="100" id="demoCanvas" style="display: block; float: right; border: 1px solid black; z-index: 9999;" ></canvas></div>
    
    <script>
        
        var text, parser, xmlDoc;

        text = "<car_price_list><car>" +
        "<car_name>HECTOR</car_name>" +
        "<car_price> 1400000 </car_price>" +
        "<car_brand>MG</car_brand>" +
        "</car></car_price_list>";

        parser = new DOMParser();
        xmlDoc = parser.parseFromString(text,"text/xml");

        document.getElementById("domexample").innerHTML =
        xmlDoc.getElementsByTagName("car_name")[0].childNodes[0].nodeValue;
    </script> -->
    
</body>
</html>
