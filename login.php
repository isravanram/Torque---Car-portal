<?php

    include 'includes/config.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $loginQuery = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result =  $con->query($loginQuery);

        if(mysqli_num_rows($result) == 1) {
            $_SESSION['userLoggedIn'] = $username;
            header("Location: index.php");
        }
        else {
            echo "<script> alert('Username or Password is Incorrect'); </script>";
        }

    }

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title> Torque | Login</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    
    
            <div class="loginFormContainer">
                
                <a href="index.php"><img src="logo-1561819118194.png" class="mainIcon"></a>
                
                <form class="loginForm" method="post" action="login.php" >

                    <h3>Login to your Account</h3> <br> <br>
                    

                    <span id="errorMessage"></span> <br> <br>
                    <label for="username">Username :<sup>*</sup></label>
                    <input type="text" id="loginUsername" name="username" value="<?php getInputValue('username') ?>" required>

                    <br> <br>
                    <label for="password">Password :<sup>*</sup></label>
                    <input type="password" id="loginPassword" name="password" required>

                    <br>
                    
                    <input type="submit" class="btn" value="Login" name="login">
                    
                </form>
            </div>
        

</body>
</html>