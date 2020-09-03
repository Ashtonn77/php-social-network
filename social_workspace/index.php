<?php
include("./includes/header.php");
include("./includes/classes/User.php");
include("./includes/classes/Post.php");
include("./includes/functions.php");


if(isset($_POST['post-btn'])){

  $post_obj = new Post($connect, $userLoggedIn);
  $post_obj->submit_post($_POST['post-text'], 'none');

}

?>
    
  <div class="details-container">
    
      <div class="user-details"> 

        <div class="profile-pic">
           
            <a href="<?=$userLoggedIn;?>"><img src="<?=load_profile_pic($user['profile_pic']);?>" alt="user_profile"></a>

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

    <textarea name="post-text" id="post-text" cols="30" rows="5" placeholder="Express yourself..."></textarea>
    <input type="submit" name="post-btn" id="post-btn" value="Post">
   
    </form>

      <div class="posts-area"></div>
      <img src="./resources/images/icons/loading.gif" alt="loading" id="loading">

    </div>   
  
  </div>   

    <script>

    let userLoggedIn = '<?= $userLoggedIn; ?>';

    $(document).ready(function() {
      $('#loading').show();

      //ajax call
      $.ajax({
        url:"./includes/ajax_load_posts.php",
        type:"POST",
        data:"page=1&userLoggedIn=" + userLoggedIn,
        cache:false,

        success: function(data){
          $('#loading').hide();
          $('.posts-area').html(data);
        }
      });

      $(window).scroll(function() {
      
        let height = $('.posts-area').height();
        let scroll_top = $(this).scrollTop();

        let page = $('.posts-area').find('.next-page').val();
        let no_more_posts = $('.posts-area').find('.no-more-posts').val();        
        

        if((document.body.scrollHeight == ($(this).scrollTop() + window.innerHeight)) && no_more_posts == 'false'){
          $('#loading').show();
          

          let ajaxReq = $.ajax({
            url:"./includes/ajax_load_posts.php",
            type:"POST",
            data:"page=" + page + "&userLoggedIn=" + userLoggedIn,
            cache:false,

            success: function(response){
              $('.posts-area').find('.next-page').remove(); //removes current next page
              $('.posts-area').find('.no-more-posts').remove(); //removes current no more posts page


              $('#loading').hide();
              $('.posts-area').append(response);
            }

          });

        }//end if
        return false;

      }); //end window scroll function



    });
    </script>
    
    
    </div>
</body>
</html>