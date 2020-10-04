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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

            <?php
           
                if(isset($_POST['search-btn'])){

                    $names = explode(" ", $_POST['search-bar']);
                    $query_search = mysqli_query($connect, "SELECT user_id FROM users WHERE first_name='$names[0]' AND last_name='$names[1]'");
                    $res_q = mysqli_fetch_array($query_search);
                    $user_q = $res_q['user_id'];

                    header("Location: profile_alt.php?id=" . $user_q);
                   
                }
            
            
            ?>

            <form action="" method="POST">
            
               <div class="logo-search-container">           
                    <p>Expressive</p>
                    <input type="search" name="search-bar" id="search-bar" class="search-bar" placeholder="Looking for someone?" autocomplete="off">
                    <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn">
                    
                </div>                          

            </form>
          

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

                   <div id="result"></div>

                       <script>

        $(document).ready(function(){

              $('#search-bar').keyup(function(){                 
                  var query = $(this).val();
                  if(query != ''){
                      $.ajax({
                          url:"search.php",
                          method:"POST",
                          data:{query:query},
                          success:function(data){
                              $('#result').fadeIn();
                              $('#result').html(data);
                          }
                      })
                  }

              });

        });

        $(document).on('click', 'li', function(){
            $('#search-bar').val($(this).text());
            $('#result').fadeOut();
        })

    </script>

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

                     $friend_user_to_query = mysqli_query($connect, "SELECT * FROM users WHERE user_id='$user_to_id'");
                     $friend_user_to_res = mysqli_fetch_array($friend_user_to_query);

                     $name_user_to = $friend_user_to_res['first_name'] . ' ' . $friend_user_to_res['last_name'];
                     
                     $notification_id_query = mysqli_query($connect, "SELECT notification_id FROM notifications WHERE notification_to='$user_to_id' AND notification_from='$user_from_id'");
                     $notification_id_res = mysqli_fetch_array($notification_id_query);
                     $notification_id = $notification_id_res['notification_id'];
                     
                        if(isset($_POST['accept-friend'])){

                            //this has to come first
                           $add_to_friend_list_query = mysqli_query($connect, "INSERT INTO friends VALUES(NULL, '$user_from_id', '$user_to_id', '$name_user_to', '$date')"); 
                           $add_to_friend_list_query = mysqli_query($connect, "INSERT INTO friends VALUES(NULL, '$user_to_id', '$user_from_id', '$name_user_from', '$date')"); 

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


            <?php
           
                if(isset($_POST['search-btn'])){

                    $names = explode(" ", $_POST['search-bar']);
                    $query_search = mysqli_query($connect, "SELECT user_id FROM users WHERE first_name='$names[0]' AND last_name='$names[1]'");
                    $res_q = mysqli_fetch_array($query_search);
                    $user_q = $res_q['user_id'];

                    header("Location: profile_alt.php?id=" . $user_q);
                   
                }
            
            
            ?>

     <div class="sidebar">
        <div id="result2"></div>
     <form action="" method="POST" class="sidebar-search"><input type="search" name="search-bar" id="search-bar2" class="search-bar" placeholder="Looking for someone?" autocomplete="off">
        <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn"></form>

        <ul>            
            <li><a href="main_page.php?id=<?=$current_user_id;?>"><ion-icon name="home-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Home</span></a></li>
            <li><a href="friends_list.php?id=<?=$current_user_id;?>"><ion-icon name="people-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">My Network</span></a></li>
            <li><a href="messages_list.php?id=<?=$current_user_id;?>"><ion-icon name="mail-open-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Messages</span></a></li>
            <li><a href="notifications.php?id=<?=$current_user_id;?>"><ion-icon name="notifications-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Notifications</span></a></li>
            <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="30px"><span class="tooltiptext">My Profile</span></a></li>
            <li><a href="logout.php"><ion-icon name="log-out-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large"></ion-icon><span class="tooltiptext">Logout</span></a></li>
        </ul>

    </div> 

        <script>

        $(document).ready(function(){

              $('#search-bar2').keyup(function(){                 
                  var query = $(this).val();
                  if(query != ''){
                      $.ajax({
                          url:"search.php",
                          method:"POST",
                          data:{query:query},
                          success:function(data){
                              $('#result2').fadeIn();
                              $('#result2').html(data);
                          }
                      })
                  }

              });

        });

        $(document).on('click', 'li', function(){
            $('#search-bar2').val($(this).text());
            $('#result2').fadeOut();
        })

    </script>
   
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>