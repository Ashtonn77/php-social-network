<?php
include("./includes/header.php");
include("./includes/classes/User.php");
include("./includes/classes/Post.php");



if(isset($_POST['post-btn'])){

  $post_obj = new Post($connect, $userLoggedIn);
  $post_obj->submit_post($_POST['post-text'], 'none');

}

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

  <?php
  
  $user_obj = new User($connect, $userLoggedIn);
  echo $user_obj->get_first_and_last_name();
  
  
  ?>


    </div>   
  
  </div>
    
    
    </div>
</body>
</html>