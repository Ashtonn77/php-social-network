<?php 

require "./config/config.php";
include("./includes/classes/User.php");
include("./includes/classes/Post.php");

if(isset($_SESSION['username'])){

    $userLoggedIn = $_SESSION['username'];
    $user_datails_query = mysqli_query($connect, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_datails_query);

}
else{

    header("location: register.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&display=swap');
    body{
        overflow:hidden;
        font-family: 'Montserrat', sans-serif;
    }

    form{
        display: flex;    
        justify-content:center;
        align-items:center;   
        position:absolute;
        bottom: 32%; 
    }

    form input{
        font-family: 'Montserrat', sans-serif;
        margin-right: 10px;
        cursor:pointer;
        border:0;
        background-color:transparent;
    }

    form div{
        font-size:80%;
        
    }
    
    </style>

</head>
<body>

<?php

    //get id of post
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
    }

    $get_likes = mysqli_query($connect, "SELECT likes, added_by FROM posts WHERE id='$post_id'");
    $row = mysqli_fetch_array($get_likes);
    $total_likes = $row['likes'];
    $user_liked = $row['added_by'];

    $user_details_query = mysqli_query($connect, "SELECT * FROM users WHERE username='$user_liked'");
    $row_2 = mysqli_fetch_array($user_datails_query);
    $total_user_likes  = isset($row_2) ? $row_2['num_likes'] : 0;

    //like btn
    if(isset($_POST['like-btn'])){
        
        $total_likes++;
        $query = mysqli_query($connect, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
        $total_user_likes++;
        $user_likes = mysqli_query($connect, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
        $insert_user = mysqli_query($connect, "INSERT INTO likes VALUES(NULL, '$userLoggedIn','$post_id')");

        //insert notification
    }

    //unlike btn

     if(isset($_POST['unlike-btn'])){
        $total_likes--;
        $query = mysqli_query($connect, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
        $total_user_likes--;
        $user_likes = mysqli_query($connect, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
        $insert_user = mysqli_query($connect, "DELETE FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");

        //insert notification
    }

    //check for previous likes
    $check_query = mysqli_query($connect, "SELECT * FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");
    $num_rows = mysqli_num_rows($check_query);

    if($num_rows > 0){
        $likes_word = $total_likes == 1 ? "like" : "likes";
        echo '<form action="likes.php?post_id='.$post_id.'" method="POST">
            <input type="submit" class="comment-like" name="unlike-btn" value="Unlike" style="color:#c0392b">
            <div class="like-value">
                '.$total_likes.' ' . $likes_word .'
            </div>        
        </form>';

    }
    else{
        $likes_word = $total_likes == 1 ? "like" : "likes";
        echo '<form action="likes.php?post_id='.$post_id.'" method="POST">
            <input type="submit" class="comment-like" name="like-btn" value="Like" style="color:#27ae60;">
            <div class="like-value">
                '.$total_likes.' ' . $likes_word . '
            </div>        
        </form>';

    }


?>
    
</body>
</html>