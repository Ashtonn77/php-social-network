<?php

//     require 'helpers/config_template.php';

//     if(isset($_SESSION['username'])){
//     $currentUserLoggedIn = $_SESSION['username'];
// }
// else{
//     header("Location: register_2.php");
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finer Details</title>
    <link rel="stylesheet" href="./css/reg-styles/style.css?v=<?php echo time(); ?>">
     <link href="https://fonts.googleapis.com/css2?family=Red+Rose:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>

    <?php

        $error_array = array();
        $user_id = -1;

        if(isset($_POST['final-reg-submit-btn'])){

         $user_id_query = mysqli_query($connect, "SELECT user_id FROM users WHERE username='$currentUserLoggedIn'");
         $row = mysqli_fetch_array($user_id_query);
         $user_id = $row['user_id'];
              

         $fav_movie = ucwords($_POST['fav-movie']); 
         

         $fav_book = ucwords($_POST['fav-book']);   
         

         $fav_artist = ucwords($_POST['fav-artist']);  
        

         $fav_song = ucwords($_POST['fav-song']);  
         
         
         $fav_food = ucwords($_POST['fav-food']);    
      

         $bio = ucfirst($_POST['reg-user-bio']);   
         

         $hobbies = array("default", "default", "default", "default");
         
         if(!empty($_POST['hobbies'])){

            for($i = 0; $i < count($_POST['hobbies']); $i++){

             $temp = $_POST['hobbies'][$i];
         
             $hobbies[$i] = $temp;

            }

         }      

         $bckt_list1 = ucfirst($_POST['reg-bucket-list-1']); 
        

         $bckt_list2 = ucfirst($_POST['reg-bucket-list-2']);      
        

         $bckt_list3 = ucfirst($_POST['reg-bucket-list-3']);
         

         $bckt_list4 = ucfirst($_POST['reg-bucket-list-4']);   
         

         $goal1 = ucfirst($_POST['reg-goals-1']);    
         

         $goal2 = ucfirst($_POST['reg-goals-2']);    
        

         $goal3 = ucfirst($_POST['reg-goals-3']);   
        

         $goal4 = ucfirst($_POST['reg-goals-4']);          
        

         

            $preferences_query = mysqli_query($connect, "INSERT INTO preferences VALUES(NULL, '$user_id', '$fav_movie', '$fav_book', '$fav_artist', '$fav_song','$fav_food', '$bio')");

            $hobbies_query = mysqli_query($connect, "INSERT INTO hobbies VALUES(NULL, '$user_id', '$hobbies[0]', '$hobbies[1]', '$hobbies[2]', '$hobbies[3]')");

            $aspirations_query = mysqli_query($connect, "INSERT INTO aspirations VALUES(NULL, '$user_id', '$bckt_list1', '$bckt_list2', '$bckt_list3', '$bckt_list4', '$goal1', '$goal2', '$goal3', '$goal4')");
            
            header("Location: login_2.php");   

     }
     //end if isset
    
    ?>


     <div class="nav">
           <a href="javascript:history.back()">
                <ion-icon name="arrow-back-outline" size="large" class="back-arrow"></ion-icon>
    </a>
     </div>

  <section> 

      <!-- start container -->
<div class="accordion-container">

      <div class="heading">
     <p>Dont rush the process... good things take time!</p>
      </div>


<!-- start accordion -->
    <form action="final_reg.php" method="POST" class="accordion">
    

      <!-- start item 1 -->
     <div class="accordion-item" id="item1">

     <a href="#item1" class="accordion-link">
         <span>Personals:</span>
         <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
        <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>     
     </a>

       <div class="accordion-details">
      
        
        <label for="fav-movie">blah</label>
        <input type="text" name="fav-movie" class="fav-movie" placeholder="Enter movie__" autocomplete="off" required>
       
        <label for="fav-book">blah:</label>
        <input type="text" name="fav-book" class="fav-book" placeholder="Enter book__" autocomplete="off" required>
       
        <label for="fav-artist">blah:</label>
        <input type="text" name="fav-artist" class="fav-artist" placeholder="Enter artist__" autocomplete="off" required>
       
        <label for="fav-song">blah:</label>
        <input type="text" name="fav-song" class="fav-song" placeholder="Enter song__" autocomplete="off" required>
       
        <label for="fav-food">blah:</label>
        <input type="text" name="fav-food" class="fav-food" placeholder="Enter food__" autocomplete="off" required>
        
    </div>

     </div>
      <!-- end item 1 -->


    <!-- start item 2 -->
     <div class="accordion-item" id="item2">

     <a href="#item2" class="accordion-link">
        <span>Favorites:</span>
        <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
        <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>    
    </a>

       <div class="accordion-details">
      
        
        <label for="fav-movie">Favorite movie:</label>
        <input type="text" name="fav-movie" class="fav-movie" placeholder="Enter movie__" autocomplete="off" required>
       
        <label for="fav-book">Favorite book:</label>
        <input type="text" name="fav-book" class="fav-book" placeholder="Enter book__" autocomplete="off" required>
       
        <label for="fav-artist">Favorite artist:</label>
        <input type="text" name="fav-artist" class="fav-artist" placeholder="Enter artist__" autocomplete="off" required>
       
        <label for="fav-song">Favorite song:</label>
        <input type="text" name="fav-song" class="fav-song" placeholder="Enter song__" autocomplete="off" required>
       
        <label for="fav-food">Favorite food:</label>
        <input type="text" name="fav-food" class="fav-food" placeholder="Enter food__" autocomplete="off" required>
        
    </div>

     </div>
      <!-- end item 2 -->
  


      <!-- start item 3 -->
    <div class="accordion-item" id="item3">

     <a href="#item3" class="accordion-link">
         <span>Last but not least:</span>
         <ion-icon class="down-icon icon-ion" name="add-outline"></ion-icon>
        <ion-icon class="up-icon icon-ion" name="remove-outline"></ion-icon>          
    </a>

     <div class="accordion-details">

        <label for="reg-user-bio">Bio:</label>
        <textarea class="reg-user-bio"" name="reg-user-bio" id="reg-user-bio" placeholder="Tell us a lil' about yourself__"></textarea>
         <span class="final-reg-err"><?php if(in_array("**Bio must be at least five characters long**", $error_array)){ echo "**Bio must be at least five characters long**"; } ?></span>

        <div class="reg-hobbies">
            <label for="reg-hobbies">Hobbies:</label>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="music">&nbsp; <span>Music</span> </div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="coding">&nbsp; <span>Coding</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="fishing">&nbsp; <span>Fishing</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="cooking">&nbsp; <span>Cooking</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="gaming">&nbsp; <span>Gaming</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="gym">&nbsp; <span>Workout</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="movies">&nbsp; <span>Movies</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="painting">&nbsp; <span>Painting</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="reading">&nbsp; <span>Reading</span></div>
            <div class="hobbie-container"> <input class="reg-hobbies last-check" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="traveling">&nbsp; <span>Travelling</span></div>
        </div>

        <div class="chkbox-err"></div>


            <!-- function to keep selection of checkboxes to four -->
            <script>

                    function limitSelection(){

                        let chks = document.querySelectorAll('.reg-hobbies');
                        let cnt = 0;

                        for(let i = 0; i < chks.length; i++){

                            if(chks[i].checked == true){
                                cnt++;
                            }
                        }

                        if(cnt > 4){
                            document.querySelector('.chkbox-err').innerHTML = "**Let's keep it at four hobbies, shall we?**";
                            return false;
                        }else{
                            document.querySelector('.chkbox-err').innerHTML = "";
                            return true;

                        }

                    }            
            
            
            </script>



        <div class="reg-bucket-list">

            <label for="reg-bucket-list">Bucket list:</label>
            <input type="text" name="reg-bucket-list-1" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter first item" autocomplete="off" required>
         

            <input type="text" name="reg-bucket-list-2" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter second item" autocomplete="off" required>
          

            <input type="text" name="reg-bucket-list-3" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter third item" autocomplete="off" required>
        

            <input type="text" name="reg-bucket-list-4" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter fourth item" autocomplete="off" required>
            

        </div>

        <div class="reg-goals">
            
            <label for="reg-bucket-list">Future goals:</label>
            <input type="text" name="reg-goals-1" id="reg-goals" class="reg-goals" placeholder="Enter first goal" autocomplete="off" required>
           
            <input type="text" name="reg-goals-2" id="reg-goals" class="reg-goals" placeholder="Enter second goal" autocomplete="off" required>
            
            <input type="text" name="reg-goals-3" id="reg-goals" class="reg-goals" placeholder="Enter third goal" autocomplete="off" required>
           
            <input type="text" name="reg-goals-4" id="reg-goals" class="reg-goals" placeholder="Enter fourth goal" autocomplete="off" required>
            
        </div>


        <input type="submit" name="final-reg-submit-btn" class="final-reg-submit-btn" value="Submit">
    
    </div>

     </div>
        <!-- end item 3-->
    


    </form>
    <!-- start accordion -->


      <!-- end container -->           
 

  </section>


      
    
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>