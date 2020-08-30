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

    public function load_posts_by_friends($data, $limit){

        $page = $data['page'];
        $userLoggedIn = $this->user_obj->get_username();

        if($page == 1){
            $start = 0;
        }
        else{
            $start = ($page - 1) * $limit;
        }

        $str = "";
        $data_query = mysqli_query($this->connect, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

        if(mysqli_num_rows($data_query) > 0){

            $num_iterations = 0;//current number of results checked
            $count = 1;

        while($row = mysqli_fetch_array($data_query)){

            $id = $row['id'];
            $body = $row['body'];
            $added_by = $row['added_by'];
            $date_time = $row['date_added'];
            $time_message = "Just now";

            if($row['user_to'] == 'none'){

                $user_to = "";

            }
            else{

                $user_to_obj = new User($this->connect, $row['user_to']);
                $user_to_name = $user_to_obj->get_first_and_last_name();
                $user_to = " to <a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";

            }


            //check if user who posted has their accounts closed
            $added_by_obj = new User($this->connect, $added_by);

            if($added_by_obj->is_closed()){

                continue;

            }

            $user_logged_in_obj = new User($this->connect, $userLoggedIn);

            if($user_logged_in_obj->is_friend($added_by)){

                if($num_iterations++ < $start){
                    continue;
                }

                //once 10 posts are loaded, break from loop
                if($count > $limit){
                    break;
                }
                else{
                    $count++;
                }

                $user_details_query = mysqli_query($this->connect, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");
                $user_row = mysqli_fetch_array($user_details_query);

                $first_name = $user_row['first_name'];
                $last_name = $user_row['last_name'];
                $profile_pic = $user_row['profile_pic'];
                $profile_pic = substr(strrchr($profile_pic, "/"), 1);           
                
                ?>


                    <script>
                        
                        function toggle<?php echo $id; ?>(){

                            let element = document.getElementById('toggle-comment<?php echo $id; ?>');

                            if(element.style.display == 'block'){
                                element.style.display = 'none';
                            }
                            else{
                                element.style.display = 'block';
                            }

                        }

                        function test(){
                            console.log(<?=$id;?>);
                        }

                        </script>   



                <?php

                 $comments_check = mysqli_query($this->connect, "SELECT * FROM comments WHERE post_id='$id'");
                 $comments_count = mysqli_num_rows($comments_check);       

                //timeframe
                $date_time_now = date('Y-m-d H:i:s');

                //DateTime is a PHP built-in class
                $start_date = new DateTime($date_time); //time of post
                $end_date = new DateTime($date_time_now); //current time
                $interval = $start_date->diff($end_date); //difference between both dates

                if($interval->y >= 1){
                    if($interval->y == 1){
                        $time_message = $interval->y . " year ago"; //1 year ago
                    }
                    else{
                        $time_message = $interval->y . " years ago"; 
                    }
                }
                else if($interval->m >= 1){
                    if($interval->d == 0){
                        $days = " ago";
                    }
                    else if($interval->d == 1){
                        $days = $interval->d . " day ago";
                    }
                    else{
                        $days = $interval->d . " days ago";
                    }

                    if($interval->m == 1){
                        $time_message = $interval->m . " month " . $days; 
                    }
                    else{

                        $time_message = $interval->m . " months " . $days; 

                    }


                }
                else if($interval->d >= 1){

                    if($interval->d == 1){
                        $time_message = "Yesterday";
                    }
                    else{
                        $time_message = $interval->d . " days ago";
                    }

                }
                else if($interval->h >= 1){

                    if($interval->h == 1){
                        $time_message = $interval->h . " hour ago";
                    }
                    else{
                        $time_message = $interval->h . " hours ago";
                    }

                }
                else if($interval->i >= 1){

                    if($interval->i == 1){
                        $time_message = $interval->i . " minute ago";
                    }
                    else{
                        $time_message = $interval->i . " minutes ago";
                    }

                }
                else if($interval->s >= 1){

                    if($interval->s < 30){
                        $time_message = "Just now";
                    }
                    else{
                        $time_message = $interval->s . " seconds ago";
                    }

                }
            
                    $str .= "<div class='status_post' onclick='return toggle$id();'>

                                <div class='profile-pic'> 
                                <img src='./resources/images/profile_pics/defaults/$profile_pic' width='70'>
                                </div>
                                
                                <div class='name-and-body'>
                                
                                <div class='posted_by' style='color:#acacac;'>
                                    <a href='$added_by'>$first_name $last_name</a> $user_to &nbsp;&nbsp;&nbsp;&nbsp; <span class='time-msg'>$time_message</span>
                                </div>                            

                                <div class='post-body'>
                                    $body 
                                </div>  

                                <div class='news-feed-post-options'>
                                
                                <p>$comments_count comments</p>
                                
                                </div>

                                </div>     

                                </div>                                
                                
                                <div class='post-comment' id='toggle-comment$id' style='display:none;'>
                                   <iframe src='comments.php?post_id=$id' id='comment-iframe' class='comment-iframe' frameborder='0'></iframe> 
                                </div>
                                
                                ";
        }
        } 
        
            if($count > $limit){                
                $str .= "<input type='hidden' class='next-page' value='" . ($page + 1) . "'>
                <input type='hidden' class='no-more-posts' value='false'>";
            }
            else{
                $str .= "<input type='hidden' class='no-more-posts' value='true'><p style='text-align:center;'><br>You're all outta posts</p>";
            }



    }
        echo $str; 

    }


}


?>