<?php


require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/user_functions.php';

if(isset($_GET['id'])){

        $date = date('Y-m-d'); //gets current date
        $post_id = $_GET['id'];
        $comment_query = mysqli_query($connect, "SELECT * FROM comments WHERE post_id='$post_id'");
        $comment_res = mysqli_fetch_array($comment_query);
        $comment_count = mysqli_num_rows($comment_query);

        
        $user_id = get_user_id($connect, $_SESSION['username']);
        $username = get_username($connect, $user_id);
        $profile_pic = get_profile_pic($connect, $user_id);

        if(isset($_POST['comment-post-btn'])){

           $comment_body = $_POST['comment-text'];

            if(!empty($comment_body)){

                $comment_insert_query = mysqli_query($connect, "INSERT INTO comments VALUES(NULL, '$user_id', '$post_id', '$comment_body','0', '0', '$date')");
                header("Location: comments.php?id=".$post_id);

            }          

        }

        $comment_get_query = mysqli_query($connect, "SELECT * FROM comments WHERE post_id='$post_id'");       
        

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="comments-wrapper">    
    
    
    <?php

        if($comment_count < 1){

            ?>

            <form class="comment-form" action="comments.php?id=<?=$post_id;?>" method="POST">

                <textarea name="comment-text" class="comment-text" placeholder="Let's hear it..."></textarea>
                
                

                <button class="comment-post-btn" name="comment-post-btn">Post</button>

            </form>


                <div class="no-comments-heading">
                
                <img src="images/icons_logos/sorry.png" alt="sorry">
                <p>Sorry...nothing to see here</p>
                <p>Be the first to comment on this post</p>
                
                </div>

            <?php

        }
        else{

            ?>


            <form class="comment-form" action="comments.php?id=<?=$post_id;?>" method="POST">

                <textarea name="comment-text" class="comment-text" placeholder="Let's hear it..."></textarea>
                
                

                <button class="comment-post-btn" name="comment-post-btn">Post</button>

            </form>

            <?php
            
                while($comment_get_res = mysqli_fetch_array($comment_get_query)){

                    $comment_id = $comment_get_res['comment_id'];

                  ?>  


            <div class="comments-main tile">
            
                <div class="comment-user">

                    <div class="comment-user-pro-pic">
                        <img src="<?=$profile_pic;?>" alt="pro_pic">
                    </div>

                    <div class="comment-user-name">
                        <?=$username;?>
                    </div>

                    <div class="comment-date-time">
                        <?=$comment_get_res['date_created'];?>
                    </div>

                </div>

                <div class="comment-body">
                    <?=$comment_get_res['comment_content'];?>   
                </div>

                <div class="comment-reactions">
                
                <button class="comment-btn-like" name="comment-btn-like"><img id="comment-btn-like<?=$comment_id;?>" src="images/icons_logos/thumbUp.png" alt="like"><div id="cnt-comment" class="comment-like-count<?=$comment_id;?>"><?=$comment_get_res['comment_likes'];?></div></button>
                <button class="comment-btn-dislike" name="comment-btn-dislike"><img id="comment-btn-dislike<?=$comment_id;?>" src="images/icons_logos/thumbDown.png" alt="dislike"><div id="cnt-comment" class="comment-dislike-count<?=$comment_id;?>"><?=$comment_get_res['comment_dislikes'];?></div></button>

                </div>
            
            </div>    

                 <?php   

                }          
           
        }  
        
    ?> 
    
        <script>

          let like_com_btns = document.querySelectorAll('.comment-btn-like');
          let comment_id = '';  

          like_com_btns.forEach( btn => {

            btn.addEventListener('click', function(e){

                comment_id = e.target.id.substr(16);

                $.post('helpers/comment_likes_helper.php?action=incrementCommentLikes&id=' + comment_id, function(response){

                        $('.comment-like-count' + comment_id).html(response);
                       

                })
                
            })

          })  


         let dislike_com_btns = document.querySelectorAll('.comment-btn-dislike');
         

          dislike_com_btns.forEach( btn => {

            btn.addEventListener('click', function(e){

                comment_id = e.target.id.substr(19);

                
                $.post('helpers/comment_likes_helper.php?action=incrementCommentDislikes&id=' + comment_id, function(response){

                        $('.comment-dislike-count' + comment_id).html(response);
                       

                })
                
            })

          })  


          

        </script>


    
    </div>

</body>
</html>