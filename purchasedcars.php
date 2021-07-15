<?php 
  
  include("includes/config.php");

  //Inserting ratings into database
  if(isset($_POST['submit'])) {
      $brand = $_POST['brandname'];
      $model = $_POST['modelname'];
      $purchasedate = $_POST['purchasedate'];
      $lastservice = $_POST['lastservice'];

      $val=2;
      $stmt = $con->prepare("INSERT INTO purchased_cars VALUES(?,?,?,?,?,?)");
      $stmt->bind_param("iiiiss",,$val,$val,$val,$purchasedate,$lastservice);
      
      $stmt->execute();
      echo "inserted successfully";
      $stmt->close();
      $con->close();
      
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Purchased Car Details</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #eee;
      }
      body {
      background: url("addcarimage.jpeg") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: rgba(0, 0, 0, 0.5); 
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: rgba(0, 0, 0, 0.7); 
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #eee;
      }
      option:focus {
      border: none;
      }
      option {
      background: black; 
      border: none;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px; 
      border: none;
      background: #26a9e0; 
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      .mainIcon {
    
      background-color: transparent;
      width: auto;
      height: 190px;
      position: absolute;
      left: -10px;
      top: -10px;
      
  }

  .mainIcon:hover {
      cursor: pointer;
  }

      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <a href="index.php"><img src="logo-1561819118194.png" class="mainIcon"></a>
        <h1>Fulfill Your Dreams</h1>
        <p>Add the cars you own to receive timely mails when your cars require servicing</p>
         <div class="btn-group">
          <a class="btn-item" href="servicelist.php">Service List</a>
        </div>
      </div>
      <form action="#" method="POST">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Car Details</h2>
        </div>
        <div class="info">
          <input class="fname" type="text" name="brandname" placeholder="Brand Name" required>
          <input class="fname" type="text" name="modelname" placeholder="Model Name" required>
          <input class="fname" type="text" id="purchasedate" name="purchasedate" placeholder="Purchase date" required>
          <input class="fname" type="text" id="lastservice" name="lastservice" placeholder="Last Service Date">
        </div>
        <input type="submit" name="submit" id="submit" value="Submit Car Details">
      </form>
    </div>
  </body>
</html>