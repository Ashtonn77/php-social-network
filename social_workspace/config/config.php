<?php
ob_start();//turns on output buffering
session_start(); //starts a session...keeps values from being removed from text fields every time an action is performed

$timezone = date_default_timezone_set("Africa/Johannesburg");

$connect = mysqli_connect("localhost", "root", "", "social_network");

if (mysqli_connect_errno()) {
    echo "Failed to connect - " . mysqli_connect_errno();
}

?>