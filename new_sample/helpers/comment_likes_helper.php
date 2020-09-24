<?php

require 'config_template.php';

switch($_REQUEST['action']){

    case 'incrementCommentLikes':

        $comment_id = $_REQUEST['id'];
        $comment_likes_query = mysqli_query($connect, "SELECT comment_likes FROM comments WHERE comment_id='$comment_id'");
        $comment_likes_res = mysqli_fetch_array($comment_likes_query);

        $comment_likes = $comment_likes_res['comment_likes'];

        $comment_likes++;

        $comment_likes_update_query = mysqli_query($connect, "UPDATE comments SET comment_likes='$comment_likes' WHERE comment_id='$comment_id'");

        if($comment_likes_update_query){

            echo $comment_likes;

        }

    break;

    case 'incrementCommentDislikes':


        $comment_id = $_REQUEST['id'];
        $comment_dislikes_query = mysqli_query($connect, "SELECT comment_dislikes FROM comments WHERE comment_id='$comment_id'");
        $comment_dislikes_res = mysqli_fetch_array($comment_dislikes_query);

        $comment_dislikes = $comment_dislikes_res['comment_dislikes'];

        $comment_dislikes++;

        $comment_dislikes_update_query = mysqli_query($connect, "UPDATE comments SET comment_dislikes='$comment_dislikes' WHERE comment_id='$comment_id'");

        if($comment_dislikes_update_query){

            echo $comment_dislikes;
            
        }


    break;

    default:

    break;



}


?>