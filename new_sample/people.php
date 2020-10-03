<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

$error_array = array();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People</title>

    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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


    <?php

        $posts_query = mysqli_query($connect, "SELECT * FROM posts WHERE user_id='$current_user_id'");
        $posts_count = mysqli_num_rows($posts_query);

        $likes_query = mysqli_query($connect, "SELECT * FROM likes WHERE user_id='$current_user_id'");
        $likes_count = mysqli_num_rows($likes_query);

        $dislikes_query = mysqli_query($connect, "SELECT * FROM dislikes WHERE user_id='$current_user_id'");
        $dislikes_count = mysqli_num_rows($dislikes_query);
       

    ?>


<div class="main-container">


             <!-- ppl to invite and adverts -->
    <section class="people tile">
    <h4>Fellow expressionists:</h4>    
    
    
    <?php            

    
    while($res = mysqli_fetch_assoc($users_to_invite_query) ){       

            $id = $res['user_id'];
            $test = mysqli_query($connect, "SELECT * FROM friends WHERE friend_id='$id' AND user_id='$current_user_id'");

            $count = mysqli_num_rows($test);
            if($count > 0){
                continue;
            }

        ?>     
         
                <form class="possible-friends" action="friend_request.php?id=<?=$res['user_id'];?>" method="POST">

                <div class="name-pic">

                <img src="<?=$res['profile_pic'];?>" alt="pro-pic">
                
                <a href="profile_alt.php?id=<?=$res['user_id'];?>"><?=$res['first_name'] . ' ' . $res['last_name'];?></a>

            </div>        
        
            <button name="add-friend-btn" class="add-friend-btn"><img src="images/icons_logos/add_friend.png" alt="add-friend"></button>

                </form>
                
    <?php

    }
    
    
    ?>  
    
    
    </section>


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