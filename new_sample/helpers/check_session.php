<?php

if(isset($_SESSION['username'])){
    $currentUserLoggedIn = $_SESSION['username'];
}
else{
    header("Location: login_2.php");
}


?>