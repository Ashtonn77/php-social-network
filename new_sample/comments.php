
   <?php

        require 'helpers/config_template.php';
        require 'helpers/check_session.php';
        require 'helpers/get_details.php';

        if(isset($_GET['post_id'])){

            $post_id = $_GET['post_id'];
            $user_post_id_query = mysqli_query($connect, "SELECT * FROM posts WHERE post_id='$post_id'");
            $user_post_id_res = mysqli_fetch_array($user_post_id_query); 



        }



    //   if(isset($_POST['post-like-btn'])){

    //        $post_likes++;  
    //        $post_likes_query = mysqli_query($connect, "UPDATE posts SET post_likes='$post_likes' WHERE post_id='$post_id' AND user_id='$post_user_id'");                          

    //    }
    //   else if(isset($_POST['post-dislike-btn'])){

    //        $post_dislikes++;
    //        $post_dislikes_query = mysqli_query($connect, "UPDATE posts SET post_dislikes='$post_dislikes' WHERE post_id='$post_id'"); 

    //    }
                       
    ?>