<?php 
require "config/config.php";

if(isset($_SESSION['username'])){

    $userLoggedIn = $_SESSION['username'];
    $user_datails_query = mysqli_query($connect, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_datails_query);

}
else{

    header("location: register.php");

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>untitled</title>
    <link rel="stylesheet" href="../resources/css/style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="top-nav">
        <div class="logo">
            <a href="index.php">untitled</a>
        </div>

        <nav>
            <ul>
                <li><a href="#"><?= $user['first_name']?></a></li>
                <li><a href="index.php">home</a></li>
                <li><a href="#"><messages/a></li>
                <li><a href="#">notifications</a></li>
                <li><a href="#">users</a></li>
                <li><a href="#">settings</a></li>
                <li><a href="#">logout</a></li>
            </ul>
        </nav>
    </div>