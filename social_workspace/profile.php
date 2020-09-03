<?php
include("./includes/header.php");
include("./includes/classes/User.php");
include("./includes/classes/Post.php");
include("./includes/functions.php");

if(isset($_GET['profile_username'])){

  $username = $_GET['profile_username'];
  $user_details_query = mysqli_query($connect, "SELECT * FROM users WHERE username='$username'");
  $user_array = mysqli_fetch_array($user_details_query);

  $num_friends = (substr_count($user_array['friends_array'], ",")) -1;

}

if(isset($_POST['remove-friend-btn'])){
  $user_obj = new User($connect, $userLoggedIn);
  $user_obj->remove_friend($username);
}

if(isset($_POST['add-friend-btn'])){
  $user_obj = new User($connect, $userLoggedIn);
  $user_obj->send_friend_request($username);
}

if(isset($_POST['recieved-request-btn'])){
  header("Location: requests.php");
}

?>  


  <div class="details-container">
    
     <div class="left-profile">

      <h3>@<?=$username;?></h3>

      <img src="<?=load_profile_pic($user_array['profile_pic']);?>" alt="profile_pic" width="100px">

      <div class="user-info">
        <p>Posts: <?=$user_array['num_posts'];?></p>
        <p>Likes: <?=$user_array['num_likes'];?></p>
        <p>Friends: <?=$num_friends;?></p>
      </div>

      <form action="<?=$username;?>" method="POST">
      
        <?php

          $user_profile_obj = new User($connect, $username);
          if($user_profile_obj->is_closed()){
            header("Location: account_closed.php");
          }

          $user_logged_in_obj = new User($connect, $userLoggedIn);
          if($userLoggedIn != $username){

            if($user_logged_in_obj->is_friend($username)){

              echo '<input type="submit" name="remove-friend-btn" class="remove-friend-btn" value="Drop friend">';

            }
            else if($user_logged_in_obj->did_recieve_request($username)){

              echo '<input type="submit" name="recieved-request-btn" class="recieved-request-btn" value="Someone wants to be friends. Respond?">';

            }
            else if($user_logged_in_obj->did_send_request($username)){

              echo '<input type="submit" name="request-sent-btn" class="request-sent-btn" value="Friend request submitted">';

            }
            else{

              echo '<input type="submit" name="add-friend-btn" class="add-friend-btn" value="Add friend">';

            } 

          }
        
        ?>

      </form>

      <input type="submit" class="post-msg-btn" name="post-msg-btn" value="Got something to say?">

     </div>
     <!-- end left -->

     <div class="right-profile">
     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex adipisci dicta porro sed dolor libero facere! Aliquam suscipit quo exercitationem, corrupti asperiores porro molestiae, autem dolorem fugit aperiam architecto non voluptas voluptatem magnam rerum sapiente perspiciatis. Quam enim modi, fugit odio aliquam eveniet, tempora excepturi libero voluptatibus blanditiis impedit nisi explicabo nulla corrupti quisquam. Quas dicta porro officiis quae blanditiis dolor facilis perferendis? Nostrum dolorem perferendis repudiandae laboriosam nulla enim accusamus ducimus asperiores illum quidem quas magnam minima mollitia, rerum dolorum deserunt et nemo ratione. Id harum eos delectus quod adipisci vitae blanditiis vel minima fugit. Impedit, consequuntur quo. Dolorem maxime magni sint porro quisquam temporibus illo veniam exercitationem nihil, molestiae, quod maiores dicta consequuntur assumenda corrupti inventore alias omnis suscipit dolore iusto deleniti eum? Magnam repudiandae tempore aliquid id atque unde suscipit consectetur, molestias ullam voluptates amet explicabo impedit sequi, dicta dolorum laboriosam fugiat sit beatae natus reprehenderit. Dolores perspiciatis labore debitis minima, dolore ex repellat. Laborum, omnis vel, odit necessitatibus eaque praesentium, natus ad obcaecati nemo consequatur error sapiente rerum libero reiciendis magni beatae adipisci. Suscipit a, illo quasi quos officiis debitis harum nesciunt earum voluptates asperiores corporis deleniti corrupti eveniet totam amet excepturi culpa deserunt fugiat. Optio voluptatem odit voluptatibus facere recusandae animi amet suscipit! Ipsam veritatis in a, tempora ipsum nam eligendi ab itaque commodi impedit officiis nulla est sequi recusandae temporibus deserunt cupiditate modi voluptate quidem aperiam esse sit enim. Vitae beatae, assumenda earum quos ad enim, illo, reprehenderit nam minima exercitationem officia? Dicta delectus obcaecati, veniam ab recusandae facere esse laborum natus facilis soluta quidem eos, dolore quibusdam. Expedita explicabo, cum, nobis omnis sequi error minima dignissimos odio perspiciatis doloremque praesentium nemo. Molestiae, distinctio cumque nulla ipsum reiciendis nostrum? Tempora sit natus dolorem eum inventore? Aliquam consequatur ratione porro adipisci sed quibusdam, neque voluptatem.
     </div>
     <!-- end right -->
  
  </div>
  <!-- end outter container -->
    
    
    </div>
</body>
</html>
