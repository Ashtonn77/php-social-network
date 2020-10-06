<?php

require 'helpers/config_template.php';
require 'helpers/spirit_animal.php';
require 'helpers/user_functions.php';    

//variables form form
$first_name = "";
$last_name = "";
$email = "";
$password = "";
$password_two = "";
$date = "";
$error_array = array();
$username = "";
$birthday = "";

if (isset($_POST['reg_submit_btn'])) {

    //declaring and cleaning registration variables

    $first_name = strip_tags($_POST['reg_first_name']); //removes all html tags
    $first_name = str_replace(' ', '', $first_name); //removes all spaces
    $first_name = ucfirst(strtolower($first_name)); //ensures first letter is capitalized
    $_SESSION['reg_first_name'] = $first_name; //stores value in session variable

    $last_name = strip_tags($_POST['reg_last_name']);
    $last_name = str_replace(' ', '', $last_name);
    $last_name = ucfirst(strtolower($last_name));
    $_SESSION['reg_last_name'] = $last_name; //stores value in session variable

    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '', $email);
    $email = strtolower($email);
    $_SESSION['reg_email'] = $email; //stores value in session variable

    $password = strip_tags($_POST['reg_password']);
    $password_two = strip_tags($_POST['reg_password2']);

    $date = date('Y-m-d'); //gets current date

    //validate email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $sql_email = "SELECT email FROM users WHERE email='$email'";
        $email_check = mysqli_query($connect, $sql_email);

        $num_rows = mysqli_num_rows($email_check);
        if($num_rows > 0){

            array_push($error_array, "Sorry, that email is already in use :(");
        }

    }
    else{

        array_push($error_array, "Invalid email format");

    }


    if(strlen($first_name) > 25 || strlen($first_name) < 2){

        array_push($error_array, "Invalid entry...your first name must at least 2 characters long");

    }

    if(strlen($last_name) > 25 || strlen($last_name) < 2){

        array_push($error_array, "Invalid entry...your last name must be at least 2 characters long");
        
    }


    //validate username
    $username = $_POST['username'];
    $username_query = mysqli_query($connect, "SELECT username FROM users WHERE username='$username'");
    $row_count = mysqli_num_rows($username_query);

    if($row_count != 0){
        array_push($error_array, "Sorry, that username has already been taken. Try another");
    }
    else if(strlen($username) < 5){
        array_push($error_array, "Invalid entry...your username must be at least 5 characters long");
    }


    $birthday = $_POST['birthday'];


    //check if passwords match
    if($password != $password_two){
       
      array_push($error_array, "Passwords do not match :(");
      
    }//change this so the password can contain any symbol
    else if(preg_match('/[^a-zA-Z0-9]/', $password)){
        array_push($error_array, "Your password can only contain english letters and numbers");
    }
    else if(strlen($password) < 5 || strlen($password) > 30){
        array_push($error_array, "Invalid entry...your password must be between 2 and 25 characters long");
    }

    

    if(empty($error_array)){

        $password = md5($password);//encryps password before inserting into db       
        
        $birth_month = get_birth_month($birthday);

        $profile_pic = get_spirit_animal($birth_month, $spirit_animal) . '.png';

        $profile_pic = 'images/'.$profile_pic;     
        
           
        //inserting into db
        $sql_query = "INSERT INTO users VALUES(NULL, '$first_name', '$last_name', '$email', '$username', '$birthday', '$password', '$profile_pic', 'no', '$date')";
        $query_insert = mysqli_query($connect, $sql_query);

        array_push($error_array, "You're good to go. Let's do this thing :)");

        //clear session variables
        $_SESSION['reg_first_name'] = "";
        $_SESSION['reg_last_name'] = "";
        $_SESSION['reg_email'] = "";

        $_SESSION['username'] = $username; 

        header("Location: new_reg.php?id=".$res['user_id']);

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/initial_styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="./css/initial_styles/queries.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="./css/initial_styles/reg-style.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="reg-container">

        <nav class="top-nav">

            <a href="javascript:history.back()">
                <ion-icon name="arrow-back-outline" size="large" class="back-arrow"></ion-icon>
            </a>

        </nav>

        <div class="reg-form-container">

            <form action="register_2.php" method="POST" class="reg-form">

                <label for="reg_first_name">First Name:</label>
                <input type="text" name="reg_first_name" id="reg_first_name" value="<?php if(isset($_SESSION['reg_first_name'])){ echo $_SESSION['reg_first_name'];}?>" 
        required>
                <span class="err-msg"><?php if(in_array("Invalid entry...your first name must at least 2 characters long", $error_array)){echo "Invalid entry...your first name must at least 2 characters long";}?></span>



                <label for="reg_last_name">Last Name:</label>
                <input type="text" name="reg_last_name" id="reg_last_name" value="<?php if(isset($_SESSION['reg_last_name'])){ echo $_SESSION['reg_last_name'];}?>" 
        required>
                <span class="err-msg"><?php if(in_array("Invalid entry...your last name must be at least 2 characters long", $error_array)){echo "Invalid entry...your last name must be at least 2 characters long";}?></span>



                <label for="reg_email">Email:</label>
                <input type="text" name="reg_email" id="reg_email" value="<?php if(isset($_SESSION['reg_email'])){ echo $_SESSION['reg_email'];}?>" 
        required>
                <span class="err-msg"><?php if(in_array("Sorry, that email is already in use :(", $error_array)){
                    echo "Sorry, that email is already in use :(";
                }else if(in_array("Invalid email format", $error_array)){
                    echo "Invalid email format";
                }?></span>


                <label for="username">Username:</label>
                <input type="text" name="username" id="reg-username">
                <span class="err-msg"><?php if(in_array("Sorry, that username has already been taken. Try another", $error_array)){
                    echo "Sorry, that username has already been taken. Try another";
                    }
                    else if(in_array("Invalid entry...your username must be at least 5 characters long", $error_array)){
                    echo "Invalid entry...your username must be at least 5 characters long";
                    }?></span>


                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday">       


                
                <label for="reg_password">Password:</label>
                <input type="password" name="reg_password" id="reg_password">


                <label for="reg_password2">Confirm Password:</label>
                <input type="password" name="reg_password2" id="reg_password2">
                <span class="err-msg"><?php if(in_array("Your password can only contain english letters and numbers", $error_array)){
                    echo "Your password can only contain english letters and numbers";
                    }
                    else if(in_array("Invalid entry...your password must be between 2 and 25 characters long", $error_array)){
                        echo "Invalid entry...your password must be between 2 and 25 characters long";
                    }?></span>

                


               
                    <div class="sub-con-reg">
                        <input type="submit" name="reg_submit_btn" value="Register">
                    <a href="login_2.php" class="already-registered"><span>Already with us?</span> <span class="sub-reg-log">Login here</span></a>  
                    </div>              
                <span class="success-msg"><?php if(in_array("You're good to go. Let's do this thing :)", $error_array)){echo "You're good to go. Let's do this thing :)";}?></span>


            </form>

        </div>

        <footer>
    
            <p>designed by Ashton Naidoo <sup>&copy;</sup> All rights reserved.</p>
        </footer>

    </div>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

</body>

</html>