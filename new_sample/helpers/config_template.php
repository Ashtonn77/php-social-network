<?php
ob_start();//turns on output buffering
session_start(); //starts a session...keeps values from being removed from text fields every time an action is performed

$timezone = date_default_timezone_set("Africa/Johannesburg");

$connect = mysqli_connect("localhost", "root", "", "expressive_db");


if (mysqli_connect_errno()) {
    echo "Failed to connect - " . mysqli_connect_errno();
}

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <script>

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        
    </script>
    
</body>
</html> -->