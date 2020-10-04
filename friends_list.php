<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

$error_array = array();


$friends_list_query = mysqli_query($connect, "SELECT friend_id, friend_name FROM friends WHERE user_id='$current_user_id'");
$friends_count = mysqli_num_rows($friends_list_query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My friends</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<script>

    function show(){

        document.querySelector('.sidebar').classList.toggle('active');   
        
    }

</script>

<body>
 

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

        <div class="more_people">
           <div class="sub_more">
                <a href="people.php?id=<?=$current_user_id;?>">Find more people to befriend</a>&nbsp; <ion-icon name="people-circle-outline" class="more_people_icon"></ion-icon>
           </div>
        </div>


        <div class="main-container">

            <?php
            
            if($friends_count < 1){

                ?>

                <div class="no-friends-heading tile">

                <h1>You need to invite some folks</h1>
                 <h2>Make friends</h2>
                  <h3>Talk about stuff no one understands</h3>
                  <h3>Express yourself, Be ridiculous</h3>
                  <h2>Be odd, Be weird, Be an absolute nut</h2>
                  <h1>Be You</h1>
                 
                </div>

            <?php


            }else{

                ?>

                       <div class="friend-wrapper tile">
               

                    <?php
                    
                    while($friends_list_res = mysqli_fetch_array($friends_list_query)){

                        $friend_id = $friends_list_res['friend_id'];
                        $friend_name = $friends_list_res['friend_name'];

                        $user_list_query = mysqli_query($connect, "SELECT first_name, profile_pic FROM users WHERE user_id='$friend_id'");
                        $user_list_res = mysqli_fetch_array($user_list_query); 

                        $friend_first_name = $user_list_res['first_name'];
                        $friend_profile_pic = $user_list_res['profile_pic'];

                        $name = get_username($connect, $current_user_id);
                        $message =  "sent you a hug";

                        ?>

                         <div class="friend">

                            <div class="friend-pro-pic"><img src="<?=$friend_profile_pic;?>" alt=""></div>
                            <div class="friend-name"><a href="profile_alt.php?id=<?=$friend_id;?>"><?=$friend_name;?></a></div>
                            <div class="friend-action">
                            <a href="helpers/test_helper.php?id=<?=$current_user_id;?>&friend_id=<?=$friend_id;?>">
                            Send <?=$friend_first_name;?> a hug
                           </a>    
                            <a href="chat.php?id=<?=$current_user_id;?>&friend_id=<?=$friend_id;?>">Send <?=$friend_first_name;?> a message</a>
                            </div>

                        </div>                        
                       

                    <?php

                    }
                    
                    
                    ?>               
                    

            </div>


                <?php

            }
            
            
            ?>


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