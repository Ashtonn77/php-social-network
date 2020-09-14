<?php
require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

if(isset($_GET['id'])){

    $user_to_id = $_GET['id'];
    $user_from_id = $current_user_id;

    $insert_into_notifications_query = mysqli_query($connect, "INSERT INTO notifications VALUES(NULL, '$user_to_id', '$user_from_id')");
    $user_to_query = mysqli_query($connect, "SELECT first_name, last_name FROM users WHERE user_id='$user_to_id'");
    $user_to_res = mysqli_fetch_array($user_to_query);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend_request</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
</head>
<body>
    
<div class="sub-body">

    <div class="friend-request-wrapper">

        <div class="friend-request-msg tile">
        <h1>You've sent <?=$user_to_res['first_name'] . ' ' . $user_to_res['last_name']; ?> a friend request. Now we wait</h1>
        <div class="click-to-redirect"><span>If you're not redirected in </span><div class="timer">6</div> seconds...&nbsp; <a href="main_page.php?id=<?=$current_user_id;?>">Click here</a></div>

        </div>


        <script>
            let count = 5;
            var x = setInterval(() => {
                
                document.querySelector('.timer').innerHTML = count--;

            }, 1000);

            if(count < 0){
                
                clearInterval(x);
            }

            function pageRedirect() {
                window.location.replace("http://localhost/php_social_network/new_sample/main_page.php?id=<?=$current_user_id;?>");
            }      
            setTimeout("pageRedirect()", 6000);

       </script>


    </div>

</div>

</body>
</html>