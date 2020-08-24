<?php

class Post {

    private $user_obj;
    private $connect;

    public function __construct($connect, $user){

        $this->connect = $connect;        
        $this->user_obj = new User($connect, $user);

    }

    public function submit_post($body, $user_to){

        $body = strip_tags($body); //removes all html tags
        $body = mysqli_real_escape_string($this->connect, $body); //escapes single quotes and other special chars in string.
        $check_empty = preg_replace('/\s+/', '', $body);


        if($check_empty != ''){

            //current date and time
            $date_added = date("Y-m-d H:i:s");


            //get username
            $added_by = $this->user_obj->get_username();


            //if user is on own profile, then user_to is none
            if($user_to == $added_by){
                $user_to = 'none';
            }


            //insert post
            $post_query = mysqli_query($this->connect, "INSERT INTO posts VALUES(NULL, '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");

            $returned_id = mysqli_insert_id($this->connect);

            //insert notification



            //update post count for user
            $num_posts = $this->user_obj->get_num_posts();
            $num_posts++;
            $update_num_posts_query = mysqli_query($this->connect, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");

        }

    }


}


?>