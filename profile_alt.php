<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';

$check_friendship = mysqli_query($connect, "SELECT * FROM friends WHERE user_id='$current_user_id' AND friend_id='$user_id'");
$friendship_count = mysqli_num_rows($check_friendship);

$check_pending = mysqli_query($connect, "SELECT * FROM notifications WHERE notification_to='$user_id'");
$pending_count = mysqli_num_rows($check_pending);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/profile-styles/style.css?v=<?php echo time(); ?>">
     <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300;400;700&display=swap" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    
</head>

<body>      

    <a href="main_page.php?id=<?=$current_user_id;?>" class="back-link"><ion-icon class="back" name="arrow-back-outline"></ion-icon></a>

    <section>        

        <!-- start container -->
            <div class="container">

                <div class="pic-wrapper">

                    <div class="profile-picture">
                    <img src="<?=$profile_pic;?>" alt="pro-pic">               

                    </div>

                     <div class="invite">                        

                        <?php
                        
                            if($friendship_count < 1){

                                if($pending_count > 0){
                                    ?>

                                    <div class="invite-pending">Friendship pending...</div>


                                 <?php   
                                }

                                else{


                                ?>     

                                <form action="friend_request.php?id=<?=$user_id;?>" method="POST">
                                
                                <button class="invite-profile-alt">Invite <?=$id_res['first_name'];?></button>
                                    
                                </form>


                                      <?php
                                  }           
                             
                            }
                        
                        
                        ?>   


                    </div>

                </div>


                <!--start accordion -->
                <div class="accordion">
                    
                
                    <!-- start accordion item -->
                    <div class="accordion-item" id="item1">

                        <a href="#item1" class="accordion-link">
                            <span>Personal info:</span>
                            <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
                            <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>

                        </a>

                        <div class="accordion-details">

                        <p>

                          <span>Name:</span> &nbsp; <?=$first_name . ' ' . $last_name;?>                         
                          
                        </p>

                        <p>

                        <span>Landed on Planet Earth:</span> &nbsp; <?=$birthday;?>

                        </p>

                        </div>

                    </div>
                      <!-- end accordion item -->
                    
                          <!-- start accordion item -->
                    <div class="accordion-item" id="item2">

                        <a href="#item2" class="accordion-link">
                            <span>Bio:</span>
                            <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
                            <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>

                        </a>

                        <div class="accordion-details">

                        <p>
                            <?=$bio;?>
                        </p>

                        </div>

                    </div>
                      <!-- end accordion item -->
                      
                            <!-- start accordion item -->
                    <div class="accordion-item" id="item3">

                        <a href="#item3" class="accordion-link">
                            <span>Spirit animal:</span>
                            <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
                            <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>

                        </a>

                        <div class="accordion-details">

                        <p>

                            <?=$first_name . ' ' . $last_name;?>'s spirit animal is the <?=$spirit_animal_res;?>
                        
                        </p>

                        <p>
                            <?=$spirit_animal_bio_res;?>
                        </p>

                        </div>

                    </div>
                      <!-- end accordion item -->

                            <!-- start accordion item -->
                    <div class="accordion-item" id="item4">

                        <a href="#item4" class="accordion-link">
                            <span>Bucket list:</span>
                            <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
                            <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>

                        </a>

                        <div class="accordion-details">
                  

                                <p><?=$bucket_list_array[0];?></p>
                                <p><?=$bucket_list_array[1];?></p>
                                <p><?=$bucket_list_array[2];?></p>
                                <p><?=$bucket_list_array[3];?></p>
                            
                     
                        </div>

                    </div>
                      <!-- end accordion item -->

                            <!-- start accordion item -->
                    <div class="accordion-item" id="item5">

                        <a href="#item5" class="accordion-link">
                            <span>Aspirations:</span>
                            <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
                            <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>

                        </a>

                        <div class="accordion-details">

                        
                                <p><?=$goals_list_array[0];?></p>
                                <p><?=$goals_list_array[1];?></p>
                                <p><?=$goals_list_array[2];?></p>
                                <p><?=$goals_list_array[3];?></p>
                        

                        </div>

                    </div>
                      <!-- end accordion item -->

                            <!-- start accordion item -->
                    <div class="accordion-item" id="item6">

                        <a href="#item6" class="accordion-link">
                            <span>Hobbies:</span>
                            <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
                            <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>

                        </a>

                        <div class="accordion-details">

                                <p><?=ucfirst($hobbies_list_array[0]);?></p>
                                <p><?=ucfirst($hobbies_list_array[1]);?></p>
                                <p><?=ucfirst($hobbies_list_array[2]);?></p>
                                <p><?=ucfirst($hobbies_list_array[3]);?></p>

                        </div>

                    </div>
                      <!-- end accordion item -->

                       <!-- start accordion item -->
                    <div class="accordion-item" id="item7">

                        <a href="#item7" class="accordion-link">
                            <span>Favorites:</span>
                            <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
                            <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>

                        </a>

                        <div class="accordion-details">

                                <p>Movie: <?=ucfirst($fav_movie);?></p>
                                <p>Book: <?=ucfirst($fav_book);?></p>
                                <p>Artist: <?=ucfirst($fav_artist);?></p>
                                <p>Song: <?=ucfirst($fav_song);?></p>
                                <p>Food: <?=ucfirst($fav_food);?></p>

                        </div>

                    </div>
                      <!-- end accordion item -->



                </div>
                <!--end accordion -->


            </div>
        <!-- end container -->



    </section>


        <footer>
            <p>designed by Ashton Naidoo <sup>&copy</sup>2020</p>
        </footer>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>