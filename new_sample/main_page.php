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

                        $insert_post_query = mysqli_query($connect, "INSERT INTO posts VALUES(NULL, '$user_id', '$posted_by', '$post_body', '$date')");

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

        <div class="title">If you got somthing to say, say it...</div>
        <button class="close-button" onclick="closeModal()">&times;</button>
    </div>

    <div class="modal-body">
        <form action="main_page.php" method="POST">
            <textarea name="post-body" id=""class="post-modal" placeholder="Speak your truth..."></textarea>
            <span class="err-msg"></span>
        <input type="submit" name="post-modal-btn" class="post-modal-btn" value="Post">
        </form>
    </div>

    </div>

            <!-- ATTACH MODAL -->
        <div class="modal modal-two" id="modal">

    <div class="modal-header">

            <script type="text/javascript">
        
            function closeModal() {

                const modal = document.querySelector('.modal');
                const overlay = document.getElementById('overlay');

                if (modal == null) return;
                modal.classList.remove('active');
                overlay.classList.remove('active');
            }

             function closeModalTwo() {

                const modal = document.querySelector('.modal-two');
                const overlay = document.getElementById('overlay');

                if (modal == null) return;
                modal.classList.remove('active');
                overlay.classList.remove('active');
            }
        </script>

        <div class="title">Sometimes words aren't enough</div>
        <button class="close-button" onclick="closeModalTwo()">&times;</button>
    </div>

    <div class="modal-body">

            <!-- php file upload test -->
            <?php
                if(isset($_FILES['user-file'])){
                    move_uploaded_file($_FILES['user-file']['tmp_name'], './images/uploads/'.$_FILES['user-file']['name']);
                    echo "Success";
                }else{
                    echo "Fail";
                }
            
            ?>

        <!-- if this dont work make action empty -->
        <form action="main_page.php" method="POST" enctype="multipart/form-data">

         <input type="file" name="user-file" class="user-file">
         <input type="submit" value="Upload" name="attach-file-btn" class="attach-file-btn">   
          
        </form>
    </div>

    </div>       


    <div class="" id="overlay"></div>


        <div class="toggle-btn" onclick="show()">
            <span></span>
            <span></span>
            <span></span>
        </div>

<div class="sub-body">

<div class="top-nav">

    <nav>          
   

        <div class="logo-search-container">           
            <p>Expressive</p>
            <input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn">
        </div>

        <ul>
            <li><a href="#"><ion-icon name="home-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="people-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="mail-open-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="notifications-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="#"><img src="<?=$user_res['profile_pic'];?>" alt="profile-pic" width="20px"></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff;"></ion-icon></a></li>
        </ul>

    </nav>

   

</div>


<div class="main-container">

 <!-- user logged in info      -->
    <section class="left-section">
        <img src="<?=$profile_pic;?>" alt="pro-pic">

       <div class="top-personals">
            <p class="full-name"><a href="profile.php"><?=$first_name . ' ' . $last_name;?></a></p>
            <p class="school"><?=$prof_line;?></p>
            <p class="tag-line"><?=$tag_line;?></p>
       </div>

       <div class="middle-personals">
           <p class="spirit-animal"><?=$first_name;?>'s spirit animal is the <?=$spirit_animal_res;?></p>
           <p class="favorite-movie"><span>Favourite Movie:</span><?=$fav_movie;?></p>
           <p class="favorite-book"><span>Favourite Book: </span><?=$fav_book;?></p>
           <p class="favorite-artist"><span>Favourite Artist:</span><?=$fav_artist;?></p>
           <p class="favorite-song"><span>Favourite Song: </span><?=$fav_song;?></p>
           <p class="favorite-food"><span>Favourite Food:</span><?=$fav_food;?></p>
       </div>
       
       <div class="bottom-personals">
           <p class="total-posts-posted"><span>Total Posts Posted:</span> 50</p>
           <p class="total-posts-liked"><span>Total Posts Liked:</span> 50</p>
           <p class="total-posts-disliked"><span>Total Posts Disliked:</span> 50</p>
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

            function openModalTwo() {

                const modal = document.querySelector('.modal-two');
                const overlay = document.getElementById('overlay');            
                if (modal == null) return;
                modal.classList.add('active');            
                overlay.classList.add('active');
            }

    </script>

        <ul>
            <li><a class="open-post-modal" href="#"><img onclick="openModal()" src="./images/icons_logos/post_something2.png" alt="post_something"></a></li>
            <li><a href="#"><img onclick="openModalTwo()" src="./images/icons_logos/add_file2.png" alt="attach_file"></a></li>            
        </ul>
    </div>

            <?php
            
            $load_post_query = mysqli_query($connect, "SELECT * FROM posts ORDER BY post_id DESC");
            
            while($row = mysqli_fetch_array($load_post_query)){

                $post_author = $row['posted_by'];
                $post_content = $row['post_body'];
                $post_date = $row['date_created'];

                ?>

            <div class="news-feed">

                <div class="post-author-info">

                    <div class="post-author-pro-pic">
                        <img src="./images/lion.png" alt="pro-pic" width="40px">
                    </div>

                            
                    <div class="post-author-details">
                        <p>@<?=$post_author;?></p>
                    </div>

                    <div class="post-time-stamp">
                        <small><?=$post_date;?></small>
                    </div>

                </div>

                <div class="post-body"><?=$post_content;?></div>

                    <div class="post-reactions">

                        <div class="post-likes">
                            <img src="./images/icons_logos/like.png" alt="like" width="17px">
                        </div>

                        <div class="post-dislikes">
                            <img src="./images/icons_logos/dislike.png" alt="dislike" width="17px">
                        </div>

                        <div class="post-comments">
                            <a href="#">30 comments</a>
                        </div>

                    </div>

            </div>

                <?php

            }
            
            ?>
    
    </section>




     <!-- ppl to invite and adverts -->
    <section class="right-section">
    <h4>People you may know</h4>   
    <div class="possible-friends">
        <div class="name-pic">
            <img src="./images/koala.png" alt="koala">
        <a href="#">Mark Smith</a>
        </div>
        <img src="./images/icons_logos/add_friend.png" alt="add-friend">
    </div>

     <div class="possible-friends">
        <div class="name-pic">
            <img src="./images/koala.png" alt="koala">
        <a href="#">Jane Doe</a>
        </div>
        <img src="./images/icons_logos/add_friend.png" alt="add-friend">
    </div>

     <div class="possible-friends">
        <div class="name-pic">
            <img src="./images/koala.png" alt="koala">
        <a href="#">Samuel Quentin</a>
        </div>
        <img src="./images/icons_logos/add_friend.png" alt="add-friend">
    </div>

     <div class="possible-friends">
        <div class="name-pic">
            <img src="./images/koala.png" alt="koala">
        <a href="#">Leo Summers</a>
        </div>
        <img src="./images/icons_logos/add_friend.png" alt="add-friend">
    </div>

    </section>

</div>

</div>

     <div class="sidebar">

     <div class="sidebar-search"><input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn"></div>

        <ul>            
            <li><a href="#"><ion-icon name="home-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Home</span></a></li>
            <li><a href="#"><ion-icon name="people-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">My Network</span></a></li>
            <li><a href="#"><ion-icon name="mail-open-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Messages</span></a></li>
            <li><a href="#"><ion-icon name="notifications-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Notifications</span></a></li>
            <li><a href="#"><img src="./images/lion.png" alt="profile-pic" width="30px" size="large"><span class="tooltiptext">My profile</span></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Logout</span></a></li>
        </ul>

    </div>
    
  

<script src="./js/script.js"></script>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>    
</body>
</html>