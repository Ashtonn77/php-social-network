<?php
require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

if(isset($_GET['id'])){

    $user_to_id = $_GET['id'];
    $user_from_id = $current_user_id;

    $insert_into_notifications_query = mysqli_query($connect, "INSERT INTO notifications VALUES(NULL, '$user_to_id', '$user_from_id', 'yes')");


}



?>