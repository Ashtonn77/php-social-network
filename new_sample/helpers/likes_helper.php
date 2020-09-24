<?php

require 'config_template.php';


    switch($_REQUEST['action']){

        case 'incrementLikes':
            
        $post_id = $_REQUEST['id'];
        $post_likes_query = mysqli_query($connect, "SELECT post_likes FROM posts WHERE post_id='$post_id'");
        $post_likes_res = mysqli_fetch_array($post_likes_query);

        $post_likes = $post_likes_res['post_likes'];

        $post_likes++;

        $post_update_like_query = mysqli_query($connect, "UPDATE posts SET post_likes='$post_likes' WHERE post_id='$post_id'");
        
        if($post_update_like_query){
            echo $post_likes;
        }


        break;

         case 'incrementDisikes':
            
        $post_id = $_REQUEST['id'];
        $post_dislikes_query = mysqli_query($connect, "SELECT post_dislikes FROM posts WHERE post_id='$post_id'");
        $post_dislikes_res = mysqli_fetch_array($post_dislikes_query);

        $post_dislikes = $post_dislikes_res['post_dislikes'];

        $post_dislikes++;

        $post_update_dislike_query = mysqli_query($connect, "UPDATE posts SET post_dislikes='$post_dislikes' WHERE post_id='$post_id'");
        
        if($post_update_dislike_query){
            echo $post_dislikes;
        }


        break;
        
        default:
        break;

    }

   





?>