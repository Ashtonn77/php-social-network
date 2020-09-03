<?php

//variables form form
$first_name = "";
$last_name = "";
$email = "";
$password = "";
$password_two = "";
$date = "";
$error_array = array();

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

            array_push($error_array, "Sorry, that email is already in use :( <br>");
        }

    }
    else{

        array_push($error_array, "Invalid email format <br>");

    }


    if(strlen($first_name) > 25 || strlen($first_name) < 2){

        array_push($error_array, "Invalid entry...your first name must be between 2 and 25 characters long <br>");

    }

    if(strlen($last_name) > 25 || strlen($last_name) < 2){

        array_push($error_array, "Invalid entry...your last name must be between 2 and 25 characters long <br>");
        
    }

    //check if passwords match
    if($password != $password_two){
       
      array_push($error_array, "Passwords do not match :( <br>");
      
    }//change this so the password can contain any symbol
    else if(preg_match('/[^a-zA-Z0-9]/', $password)){
        array_push($error_array, "Your password can only contain english letters and numbers <br>");
    }
    else if(strlen($password) < 5 || strlen($password) > 30){
        array_push($error_array, "Invalid entry...your password must be between 2 and 25 characters long <br>");
    }


    if(empty($error_array)){

        $password = md5($password);//encryps password before inserting into db


        //generate username
        $username = strtolower($first_name . "_" . $last_name); 

        $sql_username = "SELECT username FROM users WHERE username='$username'";
        $check_username = mysqli_query($connect, $sql_username);

        $i = 0;

        while(mysqli_num_rows($check_username) != 0){

            $i++;
            $username = $username . "_" . $i;
            $check_username = mysqli_query($connect, $sql_username);

        }


           //profile picture assignment
    $rand = rand(1, 2);
    if($rand == 1){
     
        $profile_pic =  "../../includes/form_handlers/profile_pics/defaults/default_pro_pic.png";

    }                   
    else{

        $profile_pic = "../../includes/form_handlers/profile_pics/defaults/default_pro_pic_2.png";

    }

    //inserting into db
    $sql_query = "INSERT INTO users VALUES(NULL, '$first_name', '$last_name', '$username', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')";
    $query_insert = mysqli_query($connect, $sql_query);

    array_push($error_array, "<span style='color:green;'>Success...time to log in :)</span><br>");

    //clear session variables
    $_SESSION['reg_first_name'] = "";
    $_SESSION['reg_last_name'] = "";
    $_SESSION['reg_email'] = "";



    }

}


?>