<?php

if(isset($_POST['log_submit_btn'])){

    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //clean email....put in correct format;
    $_SESSION['log_email'] = $email;//store email in session variable

    $password = md5($_POST['log_password']);// get password

    $sql_login = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_check = mysqli_query($connect, $sql_login);

    $check_login_query = mysqli_num_rows($login_check);

    if($check_login_query == 1){

        $row = mysqli_fetch_array($login_check);
        $username = $row['username'];

        $user_closed_query = mysqli_query($connect, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
        if(mysqli_num_rows($user_closed_query) == 1){
            $reopen_account = mysqli_query($connect, "UPDATE users SET user_closed='no' WHERE email='$email'");
        }


        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();


    }
    else{

        array_push($error_array, "Email or password is incorrect<br>");

    }

}

?>
