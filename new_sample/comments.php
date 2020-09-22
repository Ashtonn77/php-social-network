<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="comments-wrapper">    
    
    
    <form class="comment-form" action="" method="POST">

    <textarea name="comment-text" class="comment-text" placeholder="Let's hear it..."></textarea>
    
    

    <button class="comment-post-btn" name="comment-post-btn">Post</button>

    </form>

    <div class="comments-main tile">
    
    <div class="comment-user">

        <div class="comment-user-pro-pic">
            <img src="images/bear.png" alt="">
        </div>

        <div class="comment-user-name">
            Ashton Naidoo
        </div>

        <div class="comment-date-time">
            12-12-12 05:30
        </div>

    </div>

    <div class="comment-body">
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, dolorum.
    </div>

    <form class="comment-reactions">
    
    <button class="comment-btn-like" name="comment-btn-like"><img src="images/icons_logos/thumbUp.png" alt="like"><div class="comment-like-count">0</div></button>
    <button class="comment-btn-dislike" name="comment-btn-dislike"><img src="images/icons_logos/thumbDown.png" alt="dislike"><div class="comment-dislike-count">0</div></button>

    </form>
    
    </div>

    
    
    
    
    </div>

</body>
</html>