<?php

require 'helpers/config_template.php';

if(isset($_GET['post_likes'], $_GET['post_id'])){

   $post_id = $_GET['post_id'];
   $post_likes = $_GET['post_likes'];
   $post_likes = $post_likes + 1;

   $query = mysqli_query($connect, "UPDATE posts SET post_likes='$post_likes' WHERE post_id='$post_id'"); 
   
   echo $post_likes;

}else{

echo "";

}




?>

