<?php

require 'config_template.php';
require 'check_session.php';
require 'get_details.php';


switch ($_REQUEST['action']) {
    case 'sendMessage':
        
        $user_from_id = $_REQUEST['id'];
        $message = $_REQUEST['message'];
        $chat_query = mysqli_query($connect, "INSERT INTO messages VALUES(NULL, '$user_from_id', '13', '$message', NULL)");

        if($chat_query){
            echo 1;
            exit();
        }

        break;

    case 'getMessages':
        $user_from_id = $_REQUEST['id'];
        $messages_query = mysqli_query($connect, "SELECT * FROM messages"); 
        $res = mysqli_fetch_all($messages_query, MYSQLI_ASSOC);
        
        $chat = '';

        foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';   

                }

        }

          foreach($res as $message){

                if($user_from_id == $current_user_id){

                  $chat .= '<div class="main-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
                  </div>';  


                }
                else{

                  $chat .= '<div class="secondary-user">
                    <strong>' . $message['user_id_from'] . ': </strong>
                    ' . $message['message_content'] . '
                    <span>' . date('H:i', strtotime($message['date'])) . '</span>
                  
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