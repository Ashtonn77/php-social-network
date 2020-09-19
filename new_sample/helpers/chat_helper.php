<?php

require 'config_template.php';


switch ($_REQUEST['action']) {
    case 'sendMessage':
        
        $user_from_id = $_REQUEST['id'];
        $message = $_REQUEST['message'];
        $chat_query = mysqli_query($connect, "INSERT INTO messages VALUES(NULL, '$user_from_id', '', '', NULL)");

        if($chat_query){
            echo 1;
            exit();
        }

        break;
    
    default:
        # code...
        break;
}


?>