<?php

$current_date = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">

</head>
<body>

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
            <li><a href="#"><img src="./images/lion.png" alt="profile-pic" width="20px"></a></li>
            <li><a href="#"><ion-icon name="log-out-outline" style="color:#fff;"></ion-icon></a></li>
        </ul>

    </nav>

   

</div>


<div class="main-container">



 <!-- user logged in info      -->
    <section class="left-section">
        <img src="./images/lion.png" alt="pro-pic">

       <div class="top-personals">
            <p class="full-name">Ashton Naidoo</p>
            <p class="school">Student at Richfield</p>
            <p class="tag-line">I love Coding</p>
       </div>

       <div class="middle-personals">
           <p class="spirit-animal">Ashton's spirit animal is the lion</p>
           <p class="favorite-movie"><span>Favourite Movie:</span> The Great Gatsby</p>
           <p class="favorite-book"><span>Favourite Book: </span> Looking for Alaska</p>
           <p class="favorite-artist"><span>Favourite Artist:</span> Tupac</p>
           <p class="favorite-song"><span>Favourite Song: </span> As soon as I get home</p>
           <p class="favorite-food"><span>Favourite Food:</span> Flapjacks</p>
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
        <ul>
            <li><a href="#"><img src="./images/icons_logos/post_something2.png" alt="post_something"></a></li>
            <li><a href="#"><img src="./images/icons_logos/add_file2.png" alt="attach_file"></a></li>            
        </ul>
    </div>

    <div class="news-feed">

        <div class="post-author-info">

            <div class="post-author-pro-pic">
            <img src="./images/lion.png" alt="pro-pic" width="40px">
            </div>

            <div class="post-author-details">
            <p>Ashton Naidoo</p>
            </div>

            <div class="post-time-stamp">
            <small>12 January 2020</small>
            </div>

        </div>

        <div class="post-body">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, quisquam perferendis, non, ipsa ipsum officia vel molestias ratione consequatur consectetur minima delectus et enim. Commodi facilis eum aut quis cupiditate rem, repellat natus soluta alias fugit ab neque ipsum nesciunt!
        </div>

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

     <!-- <div class="sidebar">
        <div class="toggle-btn" onclick="show()">
            <span></span>
            <span></span>
            <span></span>
        </div>


        <ul>
            <li>Home</li>
            <li>Work</li>
            <li>About</li>
            <li>Contact</li>
        </ul>

    </div> -->

<script src="./js/script.js"></script>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>    
</body>
</html>