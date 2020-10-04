<?php

    require 'config_template.php';

    if(isset($_GET['id'])){

        $user_from_id = $_GET['id'];
        $user_to_id = $_GET['friend_id'];
        $message = "&#129303";

        $chat_query = mysqli_query($connect, "INSERT INTO messages VALUES(NULL, '$user_from_id', '$user_to_id', '$message', NULL)");

        header("Location: ../chat.php?id=". $user_from_id . "&friend_id=" . $user_to_id);

        
    }


 

?>