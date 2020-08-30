<?php 

require "./config/config.php";
include("./includes/classes/User.php");
include("./includes/classes/Post.php");

if(isset($_SESSION['username'])){

    $userLoggedIn = $_SESSION['username'];
    $user_datails_query = mysqli_query($connect, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_datails_query);

}
else{

    header("location: register.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="./resources/css/style.css">


    <!-- styles for comments -->
    <style>       
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&display=swap');

        :root {
            --btn-base-color: #29a889;
            --btn-hover-color: #02d8a2;
            --btn-error-msg: #ac1212;
            --btn-font-hover: #0f0f0f;
            --border-grey: #d8d8d8;
            --search-btn: #F2622E;
            --sub-base-one: #0984e3;
            --sub-base-two: #ecf0f1;
        }

        *{
            font-family: 'Montserrat', sans-serif;
        }

        textarea{
            display:block;            
            width:90%;
            max-width:90%;
            min-width:90%;
            margin: 10px auto 0 auto;                     
        }

        input[type='submit']{
          margin: 8px 0 20px 5%;
          padding: 5px 12px;
          font-size:60%;
          background-color: var(--btn-base-color);
          border:1px solid var(--btn-base-color);
          color:#fff; 
          border-radius:20px;          
          font-weight:600;
          transition:all 0.3s ease;
        }

        input[type='submit']:hover{
            cursor:pointer;
            background-color: var(--btn-hover-color);
            border:1px solid var(--btn-hover-color);
            color: var(--btn-font-hover); 
        }

        .comment-section{
            display:flex;                                   
        }

        .comment-section a{
            text-decoration:none;
            color: var(--sub-base-two);
        }

        .comment-section a img{
            width:40px;
            margin: 0 15px;
        }

        .comment-section :last-child{
            margin-bottom:15px;
           
        }

        .comment-section-inner{
            display:flex;
            flex-flow:column;
        }

        .name-time .time-msg{
            margin-left: 20px;
            color: var(--border-grey);
        }

        .name-time a{
            font-size: 75%;                              
        }

        .comment-body{
            font-size:70%;
            margin-top:5px;
           
        }       
        
    </style>

</head>
<body>

  <script>
  
  function toggle(){

    let element = document.getElementById('comment_section');

    if(element.style.display == 'block'){
        element.style.display = 'none';
    }
    else{
        element.style.display = 'block';
    }

  }

  </script>

  <?php
  
    //get id of post
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
    }

    $user_query = mysqli_query($connect, "SELECT added_by, user_to FROM posts WHERE id='$post_id'");
    $row = mysqli_fetch_array($user_query);

    $posted_to = $row['added_by'];

    if(isset($_POST['post-comment-' . $post_id])){
        $post_body = $_POST['post-body'];
        $post_body = mysqli_escape_string($connect, $post_body);
        $date_time_now = date("Y:m:d H:i:s");

        $insert_post = mysqli_query($connect, "INSERT INTO comments VALUES (NULL, '$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$post_id')");

        echo "<p class='comment-msg'>Comment posted!</p>";

    }
  
  ?>

  <form action="comments.php?post_id=<?=$post_id;?>" class="comment-form" id="comment-form" name="post-comment-<?=$post_id;?>" method="POST">
    <textarea name="post-body" cols="30" rows="5" class='comment-area'></textarea>
    <input type="submit" name="post-comment-<?=$post_id;?>" value="Speak your mind">
  
  </form>


  <!-- load comments -->

  <?php
  
  $get_comments = mysqli_query($connect, "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY id ASC");
  $count = mysqli_num_rows($get_comments);

  if($count != 0){
      while($comment = mysqli_fetch_array($get_comments)){

            $comment_body = $comment['post_body'];
            $posted_to = $comment['posted_to'];
            $posted_by = $comment['posted_by'];
            $date_added = $comment['date_added'];
            $removed = $comment['removed'];


                     //timeframe
                    $date_time_now = date('Y-m-d H:i:s');

                    //DateTime is a PHP built-in class
                    $start_date = new DateTime($date_added); //time of post
                    $end_date = new DateTime($date_time_now); //current time
                    $interval = $start_date->diff($end_date); //difference between both dates

                    if($interval->y >= 1){
                        if($interval->y == 1){
                            $time_message = $interval->y . " year ago"; //1 year ago
                        }
                        else{
                            $time_message = $interval->y . " years ago"; 
                        }
                    }
                    else if($interval->m >= 1){
                        if($interval->d == 0){
                            $days = " ago";
                        }
                        else if($interval->d == 1){
                            $days = $interval->d . " day ago";
                        }
                        else{
                            $days = $interval->d . " days ago";
                        }

                        if($interval->m == 1){
                            $time_message = $interval->m . " month " . $days; 
                        }
                        else{

                            $time_message = $interval->m . " months " . $days; 

                        }


                    }
                    else if($interval->d >= 1){

                        if($interval->d == 1){
                            $time_message = "Yesterday";
                        }
                        else{
                            $time_message = $interval->d . " days ago";
                        }

                    }
                    else if($interval->h >= 1){

                        if($interval->h == 1){
                            $time_message = $interval->h . " hour ago";
                        }
                        else{
                            $time_message = $interval->h . " hours ago";
                        }

                    }
                    else if($interval->i >= 1){

                        if($interval->i == 1){
                            $time_message = $interval->i . " minute ago";
                        }
                        else{
                            $time_message = $interval->i . " minutes ago";
                        }

                    }
                    else if($interval->s >= 1){

                        if($interval->s < 30){
                            $time_message = "Just now";
                        }
                        else{
                            $time_message = $interval->s . " seconds ago";
                        }

                    }
                    //end time frame

                    $user_obj = new User($connect, $posted_by);

                    ?>

                    <div class="comment-section">

                    <a href="<?=$posted_by;?>" target="_parent"><img src="<?=$user_obj->get_profile_pic();?>" alt="profile_pic" title='<?=$posted_by;?>'></a>

                    <div class="comment-section-inner">
                            
                            <div class="name-time">
                                <a href="<?=$posted_by;?>" target="_parent"><b><?=$user_obj->get_first_and_last_name();?></b></a>
                            <span class="time-msg"><?=$time_message;?></span>
                            </div>

                             <div class="comment-body">
                            <?=$comment_body;?>
                            </div>

                    </div>

                   

                    </div>

                    <?php

      }
  } 
  else{

    echo "<center><br><p style='margin-bottom:10px;font-size:65%;'>No comments to show</p></center>";

  } 
  
  ?>

  

</body>
</html>

