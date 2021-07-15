<?php  
    
    include("includes/config.php");

    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con);

    include("includes/handlers/register-handler.php");

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
?>
    

<!DOCTYPE html>
<html>
<head>
	<title> Torque | Register</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type="text/javascript">
        
        function display(value) {
            
            var choice = document.getElementById("passowrd_selected").checked;
            
            if (choice) {
                document.getElementById("passwordDisp").innerHTML = value;    
            } else {
                document.getElementById("passwordDisp").innerHTML = "";
            }
            
        }


    </script>
</head>
<body>
    
            <div class="registrationFormContainer" ng-app="">
                
                <a href="index.php"><img src="logo-1561819118194.png" class="mainIcon"></a>
                
                <form class="registrationForm" action="register.php"  method="POST">

                    <h3> Create a free Account</h3> <br> <br>
            
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <label for="firstname">First Name : <sup>*</sup></label>
                    <input type="text" id="firstname"   name="firstname" value="<?php getInputValue('firstname') ?>"  required><br>
                    <span class="firstnameError" id="error"></span>
                    
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <label for="lastname">Last Name : <sup>*</sup></label>
                    <input type="text" id="lastname" name="lastname" value="<?php getInputValue('lastname') ?>" required>
                    <span class="lastnameError" id="error"></span>
                    
                    <?php echo $account->getError(Constants::$ContactNumberDigits); ?>
                    <label for="contact">Contact Number : <sup>*</sup></label>
                    <input type="text" id="contact" name="contact" value="<?php getInputValue('contact') ?>" required>
                    <span class="contactError" id="error"></span>
                    
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>        
                    <label for="username">Username :<sup>*</sup></label>
                    <input type="text"  id="registrationUsername" name="registrationUsername" value="<?php getInputValue('registrationUsername') ?>" required>
                    <span class="usernameError" id="error"></span>


                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email') ?>" required>
                    

                    

                    <br> <br>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                    <?php echo $account->getError(Constants::$passwordCharacters); ?>
                    <?php echo $account->getError(Constants::$PasswordsDontMatch); ?>
                    <label for="password"> Password :<sup>*</sup></label>
                    <input type="password" id="view_password" id="registrationPassword" onkeyup="display(this.value)"  name="registrationPassword" required> <br>

                    <label for="cnfpassword">Confirm Password :<sup>*</sup></label>
                    <input type="password" id="view_password" id="cnfPassword" onkeyup="display(this.value)"  name="cnfPassword" required> <br>

                    <span id="passwordDisp"> </span> <br> <br>
                    
                    <input type="checkbox"   name="view_password" id="passowrd_selected" onclick="display(registrationPassword.value)" value="selected"> View Password
                    

                    <span class="passwordError" id="error"></span>


                    <br>
                    <input type="submit" class="btn" value="Create Account" name="registerButton">
                    

                    <center> &nbsp; Already a Member? <a href="login.php">Log in</a></center>
                </form>
            </div>  

</body>
</html>