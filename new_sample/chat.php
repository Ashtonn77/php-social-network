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



        <div class="main-container">



                <div class="main-chat-wrapper tile">                    


                        <div class="chat-main" id="chat-main"></div>


                        <form class="chat-form" method="POST">

                        <div class="chat-sub">

                        <textarea name="message" class="message" id="message" placeholder="Write something..."></textarea>
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
            $('.chat-form').submit();
            $('#message').val('');
        }

    });

    $('.chat-form').submit(function(){
        
        var message = $('.message').val();
        $.post('helpers/chat_helper.php?id=<?=$current_user_id;?>&friend_id=<?=$friend_id;?>&action=sendMessage&message=' + message, function(response){
            
            if(response == 1){

                loadChat();
                document.querySelector('.chat-form').reset();
                $('#message').val('');

            }

          
        })
        $('#message').val('');
        return false;
    })



            </script>



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