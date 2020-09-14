<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notifications</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
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
                    <input type="search" name="search-bar" id="search-bar" class="search-bar"
                        placeholder="Looking for someone?">
                    <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn">
                </div>

                <ul>
                    <li><a href="#">
                            <ion-icon name="home-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="people-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="mail-open-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="notifications-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="profile.php?id=<?=$user_res['user_id'];?>"><img src="<?=$user_res['profile_pic'];?>" alt="profile-pic" width="20px"></a></li>
                    <li><a href="logout.php">
                            <ion-icon name="log-out-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                </ul>

            </nav>



        </div>

            <?php

             $notification_to_query = mysqli_query($connect, "SELECT * FROM notifications WHERE notification_to='$user_id'");                

             $count_rows = mysqli_num_rows($notification_to_query);
                         
            ?>


        <div class="notification-wrapper">

            <div class="notification tile">

                <ul class="notification-info">

                    <?php
                    
                    if($count_rows != 0){
                     
                     $notification_to_res = mysqli_fetch_array($notification_to_query); 
                     $user_to_id = $notification_to_res['notification_to'];  
                     $user_from_id = $notification_to_res['notification_from'];
                     $notification_from_query = mysqli_query($connect, "SELECT * FROM users WHERE user_id='$user_from_id'");
                     $notification_from_res = mysqli_fetch_array($notification_from_query);   
                     $name_user_from = $notification_from_res['first_name'] . ' ' . $notification_from_res['last_name'];
                     
                     $notification_id_query = mysqli_query($connect, "SELECT notification_id FROM notifications WHERE notification_to='$user_to_id' AND notification_from='$user_from_id'");
                     $notification_id_res = mysqli_fetch_array($notification_id_query);
                     $notification_id = $notification_id_res['notification_id'];
                     
                        if(isset($_POST['accept-friend'])){

                            //this has to come first
                           $add_to_friend_list_query = mysqli_query($connect, "INSERT INTO friends VALUES(NULL, '$user_to_id', '$user_from_id', '$date')"); 

                           $delete_notification_query = mysqli_query($connect, "DELETE FROM notifications WHERE notification_id='$notification_id'");    
                           
                            header('Location: '.$_SERVER['PHP_SELF'].'?id='.$current_user_id);  

                        }
                        else if(isset($_POST[''])){



                        }

                    ?>    

                    <li class="left-notification"><a href="profile.php?id=<?=$user_from_id;?>"><?=$name_user_from;?></a> has requested your friendship </li>

                    <li class="right-notification">
                        <form action="notifications.php?id=<?=$current_user_id;?>" method="POST">
                        
                            <button name="accept-friend" class="accept-friend"><img src="images/icons_logos/accept_request.png" alt="accept-btn" class="test"></button>
                            <button name="reject-friend" class="reject-friend"><img src="images/icons_logos/reject_request.png" alt="reject-btn"></button>

                        </form>
                    </li>

                    <?php    
                    }
                    else{
                        ?>

                    <li class="left-notification" style="width:100%; text-align:center;">Sorry, <?=$user_res['first_name'];?>,  you have zero pending notifications &#10071;</li>
                   
                    <?php
                    }
                    
                    ?>

                </ul>

            </div>



        </div>

    </div>

    <div class="sidebar">

        <div class="sidebar-search"><input type="search" name="search-bar" id="search-bar" class="search-bar"
                placeholder="Looking for someone?">
            <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn"></div>

        <ul>
            <li><a href="#">
                    <ion-icon name="home-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon>
                    <span class="tooltiptext">Home</span>
                </a></li>
            <li><a href="#">
                    <ion-icon name="people-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon><span class="tooltiptext">My Network</span>
                </a></li>
            <li><a href="#">
                    <ion-icon name="mail-open-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon><span class="tooltiptext">Messages</span>
                </a></li>
            <li><a href="#">
                    <ion-icon name="notifications-outline" style="color:#fff; --ionicon-stroke-width: 22px;"
                        size="large">
                    </ion-icon><span class="tooltiptext">Notifications</span>
                </a></li>
            <li><a href="#"><img src="./images/lion.png" alt="profile-pic" width="30px" size="large"><span
                        class="tooltiptext">My profile</span></a></li>
            <li><a href="#">
                    <ion-icon name="log-out-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon><span class="tooltiptext">Logout</span>
                </a></li>
        </ul>

    </div>
   
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>