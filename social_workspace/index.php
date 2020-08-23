<?php
include("./includes/header.php");

?>
    
  <div class="details-container">
    
      <div class="user-details"> 

        <div class="profile-pic">
            <!-- get path of profile pic then cut out the name -->
            <?php
            $str = $user['profile_pic'];
            $str = substr(strrchr($str, "/"), 1);           
            ?>

            <a href="<?=$userLoggedIn;?>"><img src="./resources/images/profile_pics/defaults/<?=$str;?>" alt="user_profile"></a>
        </div>
        
        <div class="personals">
            <a href="<?=$userLoggedIn;?>"><?= $user['first_name'] . " " . $user['last_name']; ?></a>
            <p>Posts:&nbsp;<?= $user['num_posts']; ?></p>
            <p>Likes:&nbsp;<?= $user['num_likes']; ?></p>
        </div>
              
    </div>

    <!-- main feed -->
    <div class="feed-details">

    <form class="post-form" action="index.php" method="POST">

    <textarea name="post-text" id="post-text" cols="30" rows="5" placeholder="Speak your truth..."></textarea>
    <input type="submit" name="post-btn" id="post-btn" value="Post">
    
    </form>

    </div>   
  
  </div>
    
    
    </div>
</body>
</html>