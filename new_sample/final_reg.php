<?php

    require 'helpers/config_template.php';

    if(isset($_SESSION['username'])){
    $currentUserLoggedIn = $_SESSION['username'];
}
else{
    header("Location: register_2.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finer Details</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
</head>

<body>

    <?php
    
        if(isset($_POST['final-reg-submit-btn'])){

         /*$post_body = strip_tags($post_body); //removes all html tags
         $post_body = mysqli_real_escape_string($connect, $post_body);*/

    //      $last_name = strip_tags($_POST['reg_last_name']);
    // $last_name = str_replace(' ', '', $last_name);
    // $last_name = ucfirst(strtolower($last_name));

         $user_id_query = mysqli_query($connect, "SELECT user_id FROM users WHERE username='$currentUserLoggedIn'");
         $row = mysqli_fetch_array($user_id_query);
         $user_id = $row['user_id'];   

         $birthday = $_POST['birthday'];
         $prof_line = $_POST['prof-line'];
         $tag_line = $_POST['tag-line'];
         $fav_movie = $_POST['fav-movie'];
         $fav_book = $_POST['fav-book'];
         $fav_artist = $_POST['fav-artist'];
         $fav_song = $_POST['fav-song'];
         $fav_food = $_POST['fav-food'];

         $bio = $_POST['reg-user-bio'];
         $hobbies = $_POST['hobbies'];

         $bckt_list1 = $_POST['reg-bucket-list-1'];
         $bckt_list2 = $_POST['reg-bucket-list-2'];
         $bckt_list3 = $_POST['reg-bucket-list-3'];
         $bckt_list4 = $_POST['reg-bucket-list-4'];

         $goal1 = $_POST['reg-goals-1'];
         $goal2 = $_POST['reg-goals-2'];
         $goal3 = $_POST['reg-goals-3'];
         $goal4 = $_POST['reg-goals-4'];


         $preferences_query = mysqli_query($connect, "INSERT INTO preferences VALUES(NULL, '$user_id', '$birthday', '$prof_line', '$tag_line', '$fav_movie', '$fav_book', '$fav_artist', '$fav_song','$fav_food', '$bio')");

         $hobbies_query = mysqli_query($connect, "INSERT INTO hobbies VALUES(NULL, '$user_id', '$hobbies[0]', '$hobbies[1]', '$hobbies[2]', '$hobbies[3]')");

         $aspirations_query = mysqli_query($connect, "INSERT INTO aspirations VALUES(NULL, '$user_id', '$bckt_list1', '$bckt_list2', '$bckt_list3', '$bckt_list4', '$goal1', '$goal2', '$goal3', '$goal4')");
         

     }
     //end if isset
    
    ?>

   
    <form action="final_reg.php" method="POST" class="final-reg-form">
    
    <div class="left-top">

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday">

        <label for="tag-line">Profession line:</label>
        <input type="text" name="prof-line" class="prof-line" placeholder="eg: Student at Richfield" autocomplete="off">

        <label for="tag-line">Tag line:</label>
        <input type="text" name="tag-line" class="tag-line" placeholder="eg: I love coding" autocomplete="off">

        <label for="fav-movie">Favorite movie:</label>
        <input type="text" name="fav-movie" class="fav-movie" placeholder="Enter movie__" autocomplete="off">

        <label for="fav-book">Favorite book:</label>
        <input type="text" name="fav-book" class="fav-book" placeholder="Enter book__" autocomplete="off">

        <label for="fav-artist">Favorite artist:</label>
        <input type="text" name="fav-artist" class="fav-artist" placeholder="Enter artist__" autocomplete="off">

        <label for="fav-song">Favorite song:</label>
        <input type="text" name="fav-song" class="fav-song" placeholder="Enter song__" autocomplete="off">

        <label for="fav-food">Favorite food:</label>
        <input type="text" name="fav-food" class="fav-food" placeholder="Enter food__" autocomplete="off">        

    </div>

    <div class="right-bottom">

        <label for="reg-user-bio">Bio:</label>
        <textarea class="reg-user-bio"" name="reg-user-bio" id="reg-user-bio" placeholder="Tell us a lil' about yourself__"></textarea>

        <div class="reg-hobbies">
            <label for="reg-hobbies">Hobbies:</label>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="music">&nbsp; <span>Music</span> <br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="coding">&nbsp; <span>Coding</span><br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="fishing">&nbsp; <span>Fishing</span> <br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="cooking">&nbsp; <span>Cooking</span><br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="gaming">&nbsp; <span>Gaming</span><br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="exercising">&nbsp; <span>Workout</span><br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="movies">&nbsp; <span>Movies</span> <br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="painting">&nbsp; <span>Painting</span><br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="reading">&nbsp; <span>Reading</span><br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="hobbies[]" onclick="return limitSelection()" value="travelling">&nbsp; <span>Travelling</span><br>
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
            <input type="text" name="reg-bucket-list-1" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter first item" autocomplete="off">
            <input type="text" name="reg-bucket-list-2" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter second item" autocomplete="off">
            <input type="text" name="reg-bucket-list-3" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter third item" autocomplete="off">
            <input type="text" name="reg-bucket-list-4" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter fourth item" autocomplete="off">

        </div>

        <div class="reg-goals">
            
            <label for="reg-bucket-list">Future goals:</label>
            <input type="text" name="reg-goals-1" id="reg-goals" class="reg-goals" placeholder="Enter first goal" autocomplete="off">
            <input type="text" name="reg-goals-2" id="reg-goals" class="reg-goals" placeholder="Enter second goal" autocomplete="off">
            <input type="text" name="reg-goals-3" id="reg-goals" class="reg-goals" placeholder="Enter third goal" autocomplete="off">
            <input type="text" name="reg-goals-4" id="reg-goals" class="reg-goals" placeholder="Enter fourth goal" autocomplete="off">

        </div>


        <input type="submit" name="final-reg-submit-btn" class="final-reg-submit-btn" value="Submit">
    
    </div>


    </form>

    
    
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>