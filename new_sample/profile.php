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
    <title>Profile</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>


<script>

function show(){

    document.querySelector('.sidebar').classList.toggle('active');   
    
}

</script>



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
                    <li><a href="notifications.php?id=<?=$current_user_id;?>">
                            <ion-icon name="notifications-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="profile.php?id=<?=$current_user_id;?>"><img src="<?=$current_user_res['profile_pic'];?>" alt="profile-pic" width="20px"></a></li>
                    <li><a href="logout.php">
                            <ion-icon name="log-out-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                </ul>

            </nav>



        </div>


        <div class="wrapper">

            <!-- personal info -->
            <div class="personal-info tile profile-first">

                 <?php

                if(isset($_FILES['file'])){
                    move_uploaded_file($_FILES['file']['tmp_name'], 'images/uploads/'.$_FILES['file']['name']);
                    $updated_pro_pic_path = 'images/uploads/'.$_FILES['file']['name'];
                    $update_pro_pic_query = mysqli_query($connect, "UPDATE users SET profile_pic='$updated_pro_pic_path' WHERE username='$currentUserLoggedIn'");  
                    header('Location: '.$_SERVER['PHP_SELF']);                            
                }
            
                ?>                
                
                <div class="profile-pic">
                    <img src="<?=$profile_pic;?>" alt="profile-pic">
                    <div class="change-pro-pic">                        

                         <form action="profile.php" method="POST" enctype="multipart/form-data">

                         <input type="file" name="file" id="file" onchange="form.submit()">
                        <label for="file">
                            <span class="material-icons">
                            add_photo_alternate
                            </span>&nbsp;
                            Change profile pic
                        </label>
                                 
                    </form>

                    </div>
                </div>

                <div class="personal-details">
                    <p><span>What they call me:</span><br><?=$first_name . ' ' . $last_name;?></p>
                    <p><span>Date landed on planet Earth:</span><br><?=$birthday;?></p>
                    <p><span>Ruling lands:</span><br> Seatides, Durban</p>
                    <p><span>Place of study/work:</span><br> Richfield</p>
                </div>

                

            </div>

            

             <!-- bio section and spirit animal -->
            <div class="bio-and-spirit-animal tile profile-first">

                <p class="bio">
                    <span class="bio-heading">Bio:</span>
                    <?=$bio;?>
                </p>

                <p class="spirit-animal">
                    <span class="bio-heading">Spirit animal:</span>
                    <?=$spirit_animal_bio_res;?>
                </p>

            </div>


            <!-- hobbies and interests -->
            <div class="hobbies-and-interests tile profile-first">
                    <h3>Hobbies:</h3>
                

                    <div class="hobbie-tile tile"> 
                            <img src="./images/hobbies/<?=$hobbies_res['hobbie_1'];?>.png" alt="hobbie-1" class="hobbie-1">
                    </div>

                    <div class="hobbie-tile tile">
                        <img src="./images/hobbies/<?=$hobbies_res['hobbie_2'];?>.png" alt="hobbie-2" class="hobbie-2">
                    </div>
                    
                    <div class="hobbie-tile tile">
                        <img src="./images/hobbies/<?=$hobbies_res['hobbie_3'];?>.png" alt="hobbie-3" class="hobbie-2">
                    </div>

                    <div class="hobbie-tile tile">
                        <img src="./images/hobbies/<?=$hobbies_res['hobbie_4'];?>.png" alt="hobbie-4" class="hobbie-2">
                    </div>     
                

                

            </div>


            <!-- bucket list -->
            <div class="bucket-list-and-goals tile profile-first">

                <h4>Bucket List:</h4>
                
                    <div class="bucket-list">

                        <ul>
                            <li><span>1. </span><?=$aspirations_res['bucket_list_1'];?></li>
                            <li><span>2. </span><?=$aspirations_res['bucket_list_2'];?></li>
                            <li><span>3. </span><?=$aspirations_res['bucket_list_3'];?></li>
                            <li><span>4. </span><?=$aspirations_res['bucket_list_4'];?></li>
                        </ul>

                    </div>

                 <h4>Goals:</h4>   

                    <div class="goals-and-aspirations">

                        <ul>
                            <li><span>1. </span><?=$aspirations_res['goals_1'];?></li>
                            <li><span>2. </span><?=$aspirations_res['goals_2'];?></li>
                            <li><span>3. </span><?=$aspirations_res['goals_3'];?></li>
                            <li><span>4. </span><?=$aspirations_res['goals_4'];?></li>
                        </ul>

                    </div>
                

            </div>


            <div class="friends tile profile-first">

                <h3>Friends:</h3>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/penguin.png" alt="profile-pic">
                    <p>Zoey Deutch</p>
                </a>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/bear.png" alt="profile-pic">
                    <p>John Green</p>
                </a>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/fox.png" alt="profile-pic">
                    <p>Christian Bale</p>
                </a>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/tiger.png" alt="profile-pic">
                    <p>Christopher Nolan</p>
                </a>

                <a class="see-more" href="#">See more...</a>
            </div>


            <!-- end wrapper -->
        </div>       


    <!-- end sub body -->
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