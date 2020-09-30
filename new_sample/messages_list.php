<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

$error_array = array();


$friends_list_query = mysqli_query($connect, "SELECT DISTINCT friend_id, friend_name FROM friends WHERE user_id='$current_user_id'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My messages</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
</head>

<body>

        <script>

        function show(){

            document.querySelector('.sidebar').classList.toggle('active');   
            
        }

        </script>

   
    <div class="sub-body">

       <div class="top-nav">

    <div class="toggle-btn" id="toggle-btn"" onclick="show()">
            <span></span>
            <span></span>
            <span></span>
        </div>

    <nav>          
   

        <div class="logo-search-container">           
            <p>Expressive</p>
            <input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn">
        </div>

        <ul>
            <li><a href="main_page.php?id=<?=$current_user_id;?>"><ion-icon name="home-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="friends_list.php?id=<?=$current_user_id;?>"><ion-icon name="people-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="messages_list.php?id=<?=$current_user_id;?>"><ion-icon name="mail-open-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="notifications.php?id=<?=$current_user_id;?>"><ion-icon name="notifications-outline" style="color:#fff;"></ion-icon></a></li>
            <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="20px"></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff;"></ion-icon></a></li>
        </ul>

    </nav>

   

</div>


        <div class="main-container">


            <div class="msg-container">

                <?php
                        
                $msg_list_query = mysqli_query($connect, "SELECT DISTINCT user_id_to FROM messages WHERE user_id_from='$current_user_id'");
                $msg_list_count = mysqli_num_rows($msg_list_query);

                $msg_list_count = $msg_list_count ? $msg_list_count : 0;

                    if($msg_list_count == 1){

                        ?>

                        <div class="msg-list-heading"><h1>You have <?=$msg_list_count;?> active chat</h1></div>   

                        <?php
                    }
                    else{

                        ?>
                        
                        <div class="msg-list-heading"><h1>You have <?=$msg_list_count;?> active chats</h1></div>   

                        <?php
                    }


                ?>                            

                    <div class="msg-list-main tile">


                        <?php

                            while($res = mysqli_fetch_array($msg_list_query)){

                                $msg_user_id = $res['user_id_to'];
                                $msg_user_profile_pic = get_profile_pic($connect, $msg_user_id);
                                $msg_username= get_username($connect, $msg_user_id);

                                ?>

                            <div class="msg-cards tile">

                                <div class="msg-user-pro-pic"><img src="<?=$msg_user_profile_pic;?>" alt=""></div>
                                    <div class="msg-user-name"><a href="profile_alt.php?id=<?=$msg_user_id;?>">@<?=$msg_username;?></a></div>
                                    <div class="msg-user-action">
                                    <a href="chat.php?id=<?=$current_user_id;?>&friend_id=<?=$msg_user_id;?>">Go to chat</a>                               
                                </div>

                    
                            </div>   



                                <?php
                            }
                        
                        ?> 

                   </div>          


            </div>


        </div>

    </div>

   <div class="sidebar">

     <div class="sidebar-search"><input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn"></div>

        <ul>            
            <li><a href="main_page.php?id=<?=$current_user_id;?>"><ion-icon name="home-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Home</span></a></li>
            <li><a href="friends_list.php?id=<?=$current_user_id;?>"><ion-icon name="people-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">My Network</span></a></li>
            <li><a href="messages_list.php?id=<?=$current_user_id;?>"><ion-icon name="mail-open-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Messages</span></a></li>
            <li><a href="notifications.php?id=<?=$current_user_id;?>"><ion-icon name="notifications-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Notifications</span></a></li>
            <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="30px"><span class="tooltiptext">My Profile</span></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Logout</span></a></li>
        </ul>

    </div> 
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>