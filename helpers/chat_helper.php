<?php

require 'config_template.php';
require 'check_session.php';
require 'get_details.php';


switch ($_REQUEST['action']) {
    case 'sendMessage':
        
        $user_from_id = $_REQUEST['id'];
        $user_to_id = $_REQUEST['friend_id'];
        $message = $_REQUEST['message'];
        
        if(strlen($message) > 0){

          $chat_query = mysqli_query($connect, "INSERT INTO messages VALUES(NULL, '$user_from_id', '$user_to_id', '$message', NULL)");

        if($chat_query){
            echo 1;
            exit();
        }

        }

        break;

    case 'getMessages':
        $user_from_id = $_REQUEST['id'];
        $user_to_id = $_REQUEST['friend_id'];
        $messages_query = mysqli_query($connect, "SELECT * FROM messages WHERE user_id_from='$user_from_id' AND user_id_to='$user_to_id' OR user_id_from='$user_to_id' AND user_id_to='$user_from_id'"); 
        $res = mysqli_fetch_all($messages_query, MYSQLI_ASSOC);
        
        $chat = '';

        foreach($res as $message){

                if($message['user_id_from']  == $current_user_id){

                  $chat .= '<div class="owner">
                  
                    <div class="main-chat-user chat-msg">
                    <strong>' . get_username($connect, $message['user_id_from']) . ': </strong>
                    ' . $message['message_content'] . '
                    <span> sent @ ' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="visitor">

                  <div class="secondary-chat-user chat-msg">
                    <strong>' . get_username($connect, $message['user_id_from']) . ': </strong>
                    ' . $message['message_content'] . '
                    <span> sent @ ' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>
                  
                  </div>';   

                }

        }
                 
        echo $chat;

    break;    
    default:
        # code...
        break;
}


?>