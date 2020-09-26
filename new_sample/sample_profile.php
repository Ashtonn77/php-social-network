<?php

// require 'helpers/config_template.php';
// require 'helpers/check_session.php';
// require 'helpers/get_details.php';

$error_array = array();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="css/profile-styles/style.css?v=<?php echo time(); ?>">
     <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300;400;700&display=swap" rel="stylesheet"> 
    
</head>

<body>    

    <nav><ion-icon class="back" name="arrow-back-outline"></ion-icon></nav>

    <section>        

        <!-- start container -->
            <div class="container">

                <div class="profile-picture">
                    <img src="images/bear.png" alt="pro-pic">
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

                          <span>Name:</span> Ashton Naidoo                          
                          
                        </p>

                        <p>

                        <span>Landed on Planet Earth:</span> 05-10-88

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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor rem, amet explicabo, recusandae vel fugiat blanditiis minima excepturi in ex, nemo deleniti. Obcaecati excepturi eaque sint voluptatem reprehenderit aliquid atque.
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor rem, amet explicabo, recusandae vel fugiat blanditiis minima excepturi in ex, nemo deleniti. Obcaecati excepturi eaque sint voluptatem reprehenderit aliquid atque.
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

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor rem, amet explicabo, recusandae vel fugiat blanditiis minima excepturi in ex, nemo deleniti. Obcaecati excepturi eaque sint voluptatem reprehenderit aliquid atque.
                        </p>

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

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor rem, amet explicabo, recusandae vel fugiat blanditiis minima excepturi in ex, nemo deleniti. Obcaecati excepturi eaque sint voluptatem reprehenderit aliquid atque.
                        </p>

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

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor rem, amet explicabo, recusandae vel fugiat blanditiis minima excepturi in ex, nemo deleniti. Obcaecati excepturi eaque sint voluptatem reprehenderit aliquid atque.
                        </p>

                        </div>

                    </div>
                      <!-- end accordion item -->



                </div>
                <!--end accordion -->


            </div>
        <!-- end container -->



    </section>
       

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>