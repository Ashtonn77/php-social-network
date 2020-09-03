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
    <title>Expressive</title>
    <link rel="stylesheet" href="./resources/css/style.css?v=<?php echo time(); ?>">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</head>
<body>

    <div class="top-nav">
        <div class="logo">
            <a href="index.php">Expressive</a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Looking for something?">
            <input type="submit" value="GO">
        </div>

        <nav>
            <ul>
                <li><a href="<?=$userLoggedIn;?>"><?= $user['first_name']?></a></li>

                <li><a href="index.php" class="nav-icon"><ion-icon name="home-outline"></ion-icon></a></li>

                <li><a href="#"><ion-icon name="mail-outline"></ion-icon></a></li>

                <li><a href="#"><ion-icon name="notifications-outline"></ion-icon></a></li>

                <li><a href="requests.php"><ion-icon name="people-outline"></ion-icon></a></li>

                <li><a href="#"><ion-icon name="settings-outline"></ion-icon></a></li>

                <li><a href="./includes/logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
            </ul>
        </nav>
    </div>

    <div class="wrapper">