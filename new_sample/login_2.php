<?php
$connect = mysqli_connect("localhost", "root", "", "expressive_db");

if (mysqli_connect_errno()) {
    echo "Failed to connect - " . mysqli_connect_errno();
}

    $error_array = array();

    if(isset($_POST['log_submit'])){

        

        $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
        $password = md5($_POST['log_password']);

       $login_query = mysqli_query($connect, "SELECT * FROM users WHERE email='$email' AND password='$password'");
        $check_query = mysqli_num_rows($login_query);

    if($check_query == 1){

        $row = mysqli_fetch_array($login_query);
        $username = $row['username'];

        $_SESSION['username'] = $username;
        header('Location: main_page.php');
        exit();

        }
        else{
           
            array_push($error_array, "Login failed...Email or password incorrect");

        }
       
    }


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/initial_styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../resources/css/queries.css?v=<?php echo time(); ?>">
</head>

<body>


    <div class="container">
        <nav class="top-nav">
            <a href="#">
                <ion-icon name="arrow-back-outline" size="large" class="back-arrow"></ion-icon>
            </a>
        </nav>

        <div class="login-container">
            <form action="login_2.php" method="POST" class="login-form">

                <label for="log_email">Email:</label>
                <input type="email" name="log_email" id="log_email" placeholder="Email, please__" required>

                <label for="password">Password:</label>
                <input type="password" name="log_password" id="log_password" placeholder="Now, your password__" required>

                <span class=""><?php if(in_array("Login failed...Email or password incorrect", $error_array)){echo "Login failed...Email or password incorrect";}?></span>

                <ul class="form-btns-main">
                    <li><input type="submit" name="log_submit" value="login"></li>
                    <li><input type="submit" name="log_clear" value="clear"></li>                    
                </ul>
                                       
                <ul class="form-btns-bottom">
                    <li><a href="#" class="forgot_password">Forgot password?</a></li>
                    <li><span>Don't have an account?</span>&nbsp; <a href="register_2.php" class="present_member">Register</a></li>
                </ul>


            </form>
        </div>


        <footer>
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <p>designed by Ashton Naidoo <sup>&copy;</sup> All rights reserved.</p>
        </footer>
    </div>



    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

</body>

</html>