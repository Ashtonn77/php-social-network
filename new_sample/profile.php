<?php

require 'helpers/config_template.php';
require 'helpers/check_session.php';
require 'helpers/get_details.php';
 

if(isset($_FILES['file'])){

   move_uploaded_file($_FILES['file']['tmp_name'], 'images/uploads/'.$_FILES['file']['name']);
   $updated_pro_pic_path = 'images/uploads/'.$_FILES['file']['name'];
   $update_pro_pic_query = mysqli_query($connect, "UPDATE users SET profile_pic='$updated_pro_pic_path' WHERE username='$currentUserLoggedIn'");  
   header('Location: '.$_SERVER['PHP_SELF'] . '?id=' . $current_user_id);         

 }
            
               

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

    <a href="javascript:history.go(-1)" class="back-link"><ion-icon class="back" name="arrow-back-outline"></ion-icon></a>

    <section>        

        <!-- start container -->
            <div class="container">

                <div class="pic-wrapper">

                    <div class="profile-picture">
                    <img src="<?=$profile_pic;?>" alt="pro-pic">               

                    </div>

                     <div class="change-pro-pic">                        

                         <form action="profile.php?id=<?=$current_user_id;?>" method="POST" enctype="multipart/form-data">

                         <input type="file" name="file" id="file" onchange="form.submit()">
                        <label for="file">
                            <span class="material-icons">
                            add_photo_alternate
                            </span>&nbsp;                            
                        </label>
                                 
                        </form>

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

                        <p>

                            <span>Place of Business:</span> Richfield

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