<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

$error_array = array();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<script>

function show(){

    document.querySelector('.sidebar').classList.toggle('active');   
    
}

</script>

<body>


      <!-- MODAL FOR POST AND ATTACH BTNS -->
    <!-- POST MODAL -->

     <?php            

            $posted_by = '';
            $post_body = '';
            $date = '';
            $post_success = false;
            $post_image = "";

              if(isset($_FILES['file'])){
                    move_uploaded_file($_FILES['file']['tmp_name'], 'images/uploads/'.$_FILES['file']['name']);
                    $post_image = 'images/uploads/'.$_FILES['file']['name'];             
                }
              
            
            if(isset($_POST['post-modal-btn'])){               
          

                $date = date('Y-m-d');
                $user_id_query = mysqli_query($connect, "SELECT user_id FROM users WHERE username='$currentUserLoggedIn'");
                $row = mysqli_fetch_array($user_id_query);
                $user_id = $row['user_id'];

                $post_body = $_POST['post-body'];
                $posted_by = $currentUserLoggedIn;       
                
                   $post_body = strip_tags($post_body); //removes all html tags
                   $post_body = mysqli_real_escape_string($connect, $post_body);                    

                   $check_empty = preg_replace('/\s+/', '', $post_body); 

                    if($check_empty != ''){

                        if($post_image == 'images/uploads/'){
                            $post_image = '';
                        }

                        $insert_post_query = mysqli_query($connect, "INSERT INTO posts VALUES(NULL, '$user_id', '$posted_by', '$post_body', '$post_image', '0', '0', '$date')");

                    }                   
                
                }
     
     ?>       



    <div class="modal" id="modal">

    <div class="modal-header">

            <script type="text/javascript">
        
            function closeModal() {

                const modal = document.querySelector('.modal');
                const overlay = document.getElementById('overlay');

                if (modal == null) return;
                modal.classList.remove('active');
                overlay.classList.remove('active');
            }
        </script>

        <div class="title">Express yourself...</div>
        <button class="close-button" onclick="closeModal()">&times;</button>
    </div>

    <div class="modal-body">
        <form action="main_page.php?id=<?=$current_user_id;?>" method="POST" enctype="multipart/form-data">
            <textarea name="post-body" id=""class="post-modal" placeholder="Speak your truth..."></textarea>
            <span class="err-msg"></span>

        <div class="post-modal-btns-wrapper">
            <input type="submit" name="post-modal-btn" class="post-modal-btn" value="Post">

         <input type="file" name="file" id="file">

                        <label for="file">
                            <span class="material-icons">
                            collections
                            </span>
                           
                        </label>
        </div>

        </form>
    </div>

    </div>


    <div class="" id="overlay"></div>


    

<div class="sub-body">

<div class="top-nav">

    <div class="toggle-btn" id="toggle-btn"" onclick="show()">
            <span></span>
            <span></span>
            <span></span>
        </div>

    <nav>          
   

        <div class="logo-search-container">           
            <p>Expressive</p>
            <input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn">
        </div>

        <ul>
            <li><a href="main_page.php?id=<?=$current_user_id;?>"><ion-icon name="home-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="friends_list.php?id=<?=$current_user_id;?>"><ion-icon name="people-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="messages_list.php?id=<?=$current_user_id;?>"><ion-icon name="mail-open-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="notifications.php?id=<?=$current_user_id;?>"><ion-icon name="notifications-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="20px"></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff;"></ion-icon></a></li>
        </ul>

    </nav>

   

</div>


    <?php

        $posts_query = mysqli_query($connect, "SELECT * FROM posts WHERE user_id='$current_user_id'");
        $posts_count = mysqli_num_rows($posts_query);

        $likes_query = mysqli_query($connect, "SELECT * FROM likes WHERE user_id='$current_user_id'");
        $likes_count = mysqli_num_rows($likes_query);

        $dislikes_query = mysqli_query($connect, "SELECT * FROM dislikes WHERE user_id='$current_user_id'");
        $dislikes_count = mysqli_num_rows($dislikes_query);
       

    ?>


<div class="main-container">

 <!-- user logged in info      -->
    <section class="left-section">
        <img src="<?=$profile_pic;?>" alt="pro-pic">

       <div class="top-personals">
            <p class="full-name">Hi, <a href="profile.php?id=<?=$user_id;?>"><?=$first_name . ' ' . $last_name;?></a>!</p>           
             <p class="spirit-animal">Never forget, you have the spirit of the <?=$spirit_animal_res;?> in you!</p>

       </div>
       
       <div class="bottom-personals">
           <p class="total-posts-posted"><span>Total Posts Posted:</span> <?=$posts_count;?></p>
           <p class="total-posts-liked"><span>Total Posts Liked:</span> <?=$likes_count;?> </p>
           <p class="total-posts-disliked"><span>Total Posts Disliked:</span> <?=$dislikes_count;?></p>
       </div>
       
    </section>


    <!-- news feed and post something -->
    <section class="middle-section">

    <div class="post-something">


        <!-- modal function -->
         <script type='text/javascript'>
            function openModal() {

                const modal = document.querySelector('.modal');
                const overlay = document.getElementById('overlay');            
                if (modal == null) return;
                modal.classList.add('active');            
                overlay.classList.add('active');
            }

    </script>

        <ul>
            <li><a class="open-post-modal" href="#"><img onclick="openModal()" src="./images/icons_logos/post_something2.png" alt="post_something"></a></li>            
        </ul>
    </div>


            <?php
            
            $load_post_query = mysqli_query($connect, "SELECT * FROM posts ORDER BY post_id DESC");          
           
         
            while($res = mysqli_fetch_array($load_post_query)){

                $post_id = $res['post_id'];
                $post_user_id = $res['user_id'];
                $post_author = $res['posted_by'];
                $post_content = $res['post_body'];
                $post_image_2 = $res['post_image'];
                $post_date = $res['date_created'];

                $post_likes = $res['post_likes'];
                $post_dislikes = $res['post_dislikes'];

                $profile_pic_query = mysqli_query($connect, "SELECT profile_pic FROM users WHERE username='$post_author'");
                $profile_pic_res = mysqli_fetch_array($profile_pic_query);
                $profile_pic = $profile_pic_res['profile_pic'];

                $comment_count_query = mysqli_query($connect, "SELECT * FROM comments WHERE post_id='$post_id'");
                $comment_count = mysqli_num_rows($comment_count_query);

                $comments = $comment_count == 1 ? "comment" : "comments";

                ?>

            <div class="news-feed">               
                

                <div class="post-author-info">

                    <div class="post-author-pro-pic">
                        <img src="<?=$profile_pic;?>" alt="pro-pic" width="40px">
                    </div>

                            
                    <div class="post-author-details">
                        
                    <?php
                        if($res['user_id'] != $current_user_id){

                            echo '<a href="profile_alt.php?id=' . $post_user_id . '"><p>@' . $post_author . '</p></a>';

                        }

                        else{
                            
                            echo '<a href="profile.php?id=' . $post_user_id . '"><p>@' . $post_author . '</p></a>';

                        }
                    
                    
                    ?>


                    </div>

                    <div class="post-time-stamp">
                        <small><?=$post_date;?></small>
                    </div>

                </div>

                <div class="post-body">
                    <div class="user-post-text"><?=$post_content;?></div>
                    <div class="user-post-image"><img src="<?=$post_image_2;?>" alt=""></div>                              
                </div>

                    <!-- fix likes and dislikes -->
                    <div class="post-reactions">

                        <div class="post-likes">


                            <button class="post-like-btn" name="post-like-btn"><img id="post-like-btn<?=$post_id;?>" src="./images/icons_logos/like.png" alt="like" width="17px"><div id='cnt' class="like-count<?=$post_id;?>"><?=$post_likes;?></div> </button>         


                        </div>

                        <div class="post-dislikes">


                            <button class="post-dislike-btn" name="post-dislike-btn"><img id="post-dislike-btn<?=$post_id;?>" src="./images/icons_logos/dislike.png" alt="dislike" width="17px"><div id='cnt' class="dislike-count<?=$post_id;?>"><?=$post_dislikes;?></div></button>

                            
                        </div>

                        <div class="post-comments">
                            <a id="post-comments-btn<?=$post_id;?>" class="post-comments-btn" href="#"><?=$comment_count . ' ' . $comments;?></a>                            
                        </div>

                    </div>
                     <!-- fix likes and dislikes -->

                     <div class="comment-frame" id="comment-frame<?=$post_id;?>">
                        <iframe src="comments.php?id=<?=$post_id;?>" frameborder="0" style="overflow-y:hidden;"></iframe>
                     </div>

            </div>

                <?php

                
            }            
            
            ?>



             <script>

                 //comments
                 let btns = document.querySelectorAll('.post-comments-btn');
                 let post_id = '';

                 btns.forEach(btn => {

                    btn.addEventListener('click', function(e){

                        post_id = e.target.id.substr(17);

                        $('#comment-frame' + post_id).slideToggle( "slow" );
                        
                        $.post('comments.php?id=' + post_id, function(response){

                            // console.log(response);

                        });
                    })
                 })   


                 //likes and dislikes
                 let like_btns = document.querySelectorAll('.post-like-btn');                    

                 like_btns.forEach(btn => {

                     btn.addEventListener('click', function(e){

                        post_id = e.target.id.substr(13);

                        $.post('helpers/likes_helper.php?action=incrementLikes&id=' + post_id, function(response){

                             $('.like-count' + post_id).html(response);

                        });
                         

                     })
                 })


                let dislike_btns = document.querySelectorAll('.post-dislike-btn');                    

                 dislike_btns.forEach(btn => {

                     btn.addEventListener('click', function(e){

                        post_id = e.target.id.substr(16);

                        $.post('helpers/likes_helper.php?action=incrementDisikes&id=' + post_id, function(response){

                             $('.dislike-count' + post_id).html(response);

                        });
 

                     })
                 })


                </script>

    
    </section>


     <!-- ppl to invite and adverts -->
    <section class="right-section">
    <h4>People you may know</h4>
    
    
    
    <?php            

    
    while($res = mysqli_fetch_assoc($users_to_invite_query) ){       

            $id = $res['user_id'];
            $test = mysqli_query($connect, "SELECT * FROM friends WHERE friend_id='$id' AND user_id='$current_user_id'");

            $count = mysqli_num_rows($test);
            if($count > 0){
                continue;
            }

        ?>     

         
                <form class="possible-friends" action="friend_request.php?id=<?=$res['user_id'];?>" method="POST">

                <div class="name-pic">

                <img src="<?=$res['profile_pic'];?>" alt="pro-pic">
                
                <a href="profile_alt.php?id=<?=$res['user_id'];?>"><?=$res['first_name'] . ' ' . $res['last_name'];?></a>

            </div>        
        
            <button name="add-friend-btn" class="add-friend-btn"><img src="images/icons_logos/add_friend.png" alt="add-friend"></button>

                </form>
                
    <?php

    }
    
    
    ?>  
    
    
    </section>

</div>

</div>

     <div class="sidebar">

     <div class="sidebar-search"><input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn"></div>

        <ul>            
            <li><a href="main_page.php?id=<?=$current_user_id;?>"><ion-icon name="home-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Home</span></a></li>
            <li><a href="friends_list.php?id=<?=$current_user_id;?>"><ion-icon name="people-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">My Network</span></a></li>
            <li><a href="messages_list.php?id=<?=$current_user_id;?>"><ion-icon name="mail-open-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Messages</span></a></li>
            <li><a href="notifications.php?id=<?=$current_user_id;?>"><ion-icon name="notifications-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Notifications</span></a></li>
            <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="30px"><span class="tooltiptext">My Profile</span></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Logout</span></a></li>
        </ul>

    </div> 
   
   
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>    
</body>
</html>