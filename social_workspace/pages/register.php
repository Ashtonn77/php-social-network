<?php

require "config/config.php";
require "includes/form_handlers/register_handler.php";
require "includes/form_handlers/login_handler.php";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to untitled</title>
    <link rel="stylesheet" href="../resources/css/queries.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../resources/css/register_style.css?v=<?php echo time(); ?>">
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <!-- to ensure we remain on the correct page if an error occurs -->
    <?php
    
    if(isset($_POST['reg_submit_btn'])){

        echo '        
        <script>
        
        $(document).ready(function(){

            $(".login-form-container").hide();
            $(".register-form-container").show();

        });
        
        </script>
        
        ';

    }
    
    
    ?>


   <div class="wrapper">

        <div class="login-box">
        
        <div class="login-header">
        
        <h1>The Network Expressive</h1>
        <p>Login or sign up below</p>

        </div>

             <!-- login -->
        <div class="login-form-container">

        <form action="register.php" method="POST">

        <label for="log_email">Email:</label>
        <input type="email" name="log_email" id="log_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])){ echo $_SESSION['reg_email'];}?>" 
        required> 
        <label for="log_password">Password:</label>
        <input type="password" name="log_password" id="log_password" placeholder="Password"> 


        <input type="submit" name="log_submit_btn" id="log_submit_btn" value="Login"> 
       

        <span class="link-msg">You're either with us or against us?&nbsp;<a href="#" id="sign-up" class="sign-up">Sign up here</a></span>

        <span class="err-msg"><?php if(in_array("Email or password is incorrect<br>", $error_array)){echo "Email or password is incorrect<br>";}?></span>

    </form> <br>

        </div>



    <!-- register -->
        <div class="register-form-container">
            <form action="register.php" method="post">

        <label for="reg_first_name">First Name:</label>
        <input type="text" name="reg_first_name" id="reg_first_name" placeholder="First Name" 
        value="<?php if(isset($_SESSION['reg_first_name'])){ echo $_SESSION['reg_first_name'];}?>" 
        required>
        

        <span class="err-msg"><?php if(in_array("Invalid entry...your first name must be between 2 and 25 characters long <br>", $error_array)){ echo "Invalid entry...your first name must be between 2 and 25 characters long <br>"; } ?></span>

        <label for="reg_last_name">Last Name:</label>
        <input type="text" name="reg_last_name" id="reg_last_name" placeholder="Last Name" 
        value="<?php if(isset($_SESSION['reg_last_name'])){ echo $_SESSION['reg_last_name'];}?>" 
        required>
        

        <span class="err-msg"><?php if(in_array("Invalid entry...your last name must be between 2 and 25 characters long <br>", $error_array)){ echo "Invalid entry...your last name must be between 2 and 25 characters long <br>"; } ?></span>

        <label for="reg_email">Email:</label>
        <input type="email" name="reg_email" id="reg_email" placeholder="Email" 
        value="<?php if(isset($_SESSION['reg_email'])){ echo $_SESSION['reg_email'];}?>" 
        required>
        

        <span class="err-msg"><?php if(in_array("Sorry, that email is already in use :( <br>", $error_array)){ echo "Sorry, that email is already in use :( <br>"; }
        else if(in_array("Invalid email format <br>", $error_array)){ echo "Invalid email format <br>"; } ?></span>
        
        <label for="reg_password">Password:</label>
        <input type="password" name="reg_password" id="reg_password" placeholder="Password" required>
        

        <label for="reg_password2">Confirm Password:</label>
        <input type="password" name="reg_password2" id="reg_password2" placeholder="Confirm password" required>
        

        <span class="err-msg"><?php if(in_array("Passwords do not match :( <br>", $error_array)){ echo "Passwords do not match :( <br>"; }
        else if(in_array("Your password can only contain english letters and numbers <br>", $error_array)){ echo "Your password can only contain english letters and numbers <br>"; }
        else if(in_array("Invalid entry...your password must be between 2 and 25 characters long <br>", $error_array)){ echo "Invalid entry...your password must be between 2 and 25 characters long <br>"; } ?></span>

        <input type="submit" name="reg_submit_btn" id="reg_submit_btn" value="Register">
            

         <span class="link-msg">Already part of the crew?&nbsp;<a href="#" id="sign-in" class="sign-in">Sign in here</a></span>


          <span class="err-msg"><?php if(in_array("<span style='color:green;'>Success...time to log in :)</span><br>", $error_array)){ echo "<span style='color:green;'>Success...time to log in :)</span><br>"; } ?></span>

    </form>
        </div>
   
        
        </div>

   </div>

<script src="../resources/js/register.js"></script>

</body>

</html>