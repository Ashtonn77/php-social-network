<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

$friend_id = '';

if(isset($_GET['friend_id'])){

    $friend_id = $_GET['friend_id'];

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private chat</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="toggle-btn" onclick="show()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="sub-body">

        <div class="top-nav">

          
    <nav>          
   

        <div class="logo-search-container">           
            <p>Expressive</p>
            <input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn">
        </div>

        <ul>
            <li><a href="main_page.php?id=<?=$current_user_id;?>"><ion-icon name="home-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="people-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="chat.php?id=<?=$current_user_id;?>"><ion-icon name="mail-open-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="notifications.php?id=<?=$current_user_id;?>"><ion-icon name="notifications-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="20px"></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff;"></ion-icon></a></li>
        </ul>

    </nav>



        </div>


        <div class="main-container">



                <div class="main-chat-wrapper tile">


                    


                        <div class="chat-main" id="chat-main"></div>


                        <form class="chat-form" method="POST">

                        <div class="chat-sub">

                        <textarea name="message" class="message" placeholder="Write something..."></textarea>
                        <button name="message-btn" class="message-btn">Send</button>

                        </div>

                        </form>     




                </div>

        </div>

    <script>


    loadChat();

    setInterval(() => {
        loadChat();
    }, 800);

    function loadChat(){       

        $.post('helpers/chat_helper.php?id=<?=$current_user_id;?>&friend_id=<?=$friend_id;?>&action=getMessages', function(response){
            
            var scrollpos = $('#chat-main').scrollTop();
            var scrollpos = parseInt(scrollpos) + 520;//220 = height of chat div + 10 padding on top and bottom
            var scrollHeight = $('#chat-main').prop('scrollHeight');

            $('#chat-main').html(response);

            if(scrollpos < scrollHeight){

            }
            else{
            
            $('#chat-main').scrollTop($('#chat-main').prop('scrollHeight'));

            }

        })

    }



        $('.message').keyup(function(e){
        
        if(e.which == 13){
            $('form').submit();
           
        }

    });

    $('form').submit(function(){
        
        var message = $('.message').val();
        $.post('helpers/chat_helper.php?id=<?=$current_user_id;?>&friend_id=<?=$friend_id;?>&action=sendMessage&message=' + message, function(response){
            
            if(response == 1){
                loadChat();
                document.querySelector('.chat-form').reset();

            }

          
        })

        return false;
    })



            </script>



    </div>

       <div class="sidebar">

     <div class="sidebar-search"><input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn"></div>

        <ul>            
            <li><a href="main_page.php?id=<?=$current_user_id;?>"><ion-icon name="home-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Home</span></a></li>
            <li><a href="#"><ion-icon name="people-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">My Network</span></a></li>
            <li><a href="?id=<?=$current_user_id;?>"><ion-icon name="mail-open-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Messages</span></a></li>
            <li><a href="notifications.php?id=<?=$current_user_id;?>"><ion-icon name="notifications-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Notifications</span></a></li>
            <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="20px"></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Logout</span></a></li>
        </ul>

    </div>
    
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>