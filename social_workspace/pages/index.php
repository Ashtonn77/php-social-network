<?php 
$connect = mysqli_connect("localhost", "root", "", "social_network");

if(mysqli_connect_errno()){
    echo "Failed to connect - " . mysql_connect_errno();
}

$query = mysqli_query($connect, "INSERT INTO test VALUES(NULL, 'Ash')");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>untitled</title>
</head>
<body>
    the beginning
</body>
</html>