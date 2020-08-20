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
</head>

<body>


    <!-- login -->
  <form action="" method="POST">

        <input type="email" name="log_email" id="log_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email'])){ echo $_SESSION['reg_email'];}?>" 
        required> <br>
        <input type="password" name="log_password" id="log_password" placeholder="Password"> <br>


        <input type="submit" name="log_submit_btn" id="log_submit_btn" value="Login"> <br>

        <?php if(in_array("Email or password is incorrect<br>", $error_array)){echo "Email or password is incorrect<br>";}?>

    </form> <br>



    <!-- register -->
    <form action="register.php" method="post">

        <input type="text" name="reg_first_name" id="reg_first_name" placeholder="First Name" 
        value="<?php if(isset($_SESSION['reg_first_name'])){ echo $_SESSION['reg_first_name'];}?>" 
        required>
        <br>

        <?php if(in_array("Invalid entry...your first name must be between 2 and 25 characters long <br>", $error_array)){ echo "Invalid entry...your first name must be between 2 and 25 characters long <br>"; } ?>


        <input type="text" name="reg_last_name" id="reg_last_name" placeholder="Last Name" 
        value="<?php if(isset($_SESSION['reg_last_name'])){ echo $_SESSION['reg_last_name'];}?>" 
        required>
        <br>

        <?php if(in_array("Invalid entry...your last name must be between 2 and 25 characters long <br>", $error_array)){ echo "Invalid entry...your last name must be between 2 and 25 characters long <br>"; } ?>

        <input type="email" name="reg_email" id="reg_email" placeholder="Email" 
        value="<?php if(isset($_SESSION['reg_email'])){ echo $_SESSION['reg_email'];}?>" 
        required>
        <br>

        <?php if(in_array("Sorry, that email is already in use :( <br>", $error_array)){ echo "Sorry, that email is already in use :( <br>"; }
        else if(in_array("Invalid email format <br>", $error_array)){ echo "Invalid email format <br>"; } ?>
        

        <input type="password" name="reg_password" id="reg_password" placeholder="Password" required>
        <br>

        <input type="password" name="reg_password2" id="reg_password2" placeholder="Confirm password" required>
        <br>

        <?php if(in_array("Passwords do not match :( <br>", $error_array)){ echo "Passwords do not match :( <br>"; }
        else if(in_array("Your password can only contain english letters and numbers <br>", $error_array)){ echo "Your password can only contain english letters and numbers <br>"; }
        else if(in_array("Invalid entry...your password must be between 2 and 25 characters long <br>", $error_array)){ echo "Invalid entry...your password must be between 2 and 25 characters long <br>"; } ?>

        <input type="submit" name="reg_submit_btn" id="reg_submit_btn" value="Register">
        <br>

        <?php if(in_array("<span style='color:green;'>Success...time to log in :)</span><br>", $error_array)){ echo "<span style='color:green;'>Success...time to log in :)</span><br>"; } ?>


    </form>


</body>

</html>