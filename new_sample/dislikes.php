
   <?php

        require 'helpers/config_template.php';
        require 'helpers/check_session.php';
        require 'helpers/get_details.php';

        if(isset($_GET['post_id'])){

            $post_id = $_GET['post_id'];
            $user_post_id_query = mysqli_query($connect, "SELECT * FROM posts WHERE post_id='$post_id'");
            $user_post_res = mysqli_fetch_array($user_post_id_query); 

            $post_dislikes_temp = $user_post_res['post_dislikes'];
            $post_dislikes_temp++;

            $post_likes_query = mysqli_query($connect, "UPDATE posts SET post_likes='$post_dislikes_temp' WHERE post_id='$post_id'");   

           header("Location: main_page.php?id=".$current_user_id);
       
           exit();

        }

                       
    ?>