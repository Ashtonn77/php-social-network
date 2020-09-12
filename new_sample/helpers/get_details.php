<?php

    require 'user_functions.php';
    require 'check_session.php';
    require 'spirit_animal.php';

    if($currentUserLoggedIn){

        $user_id = get_user_id($connect, $currentUserLoggedIn);
        $user_query = mysqli_query($connect, "SELECT * FROM users WHERE user_id='$user_id'");
        $preferences_query = mysqli_query($connect, "SELECT * FROM preferences WHERE user_id='$user_id'");
        $aspirations_query = mysqli_query($connect, "SELECT * FROM aspirations WHERE user_id='$user_id'");
        $hobbies_query = mysqli_query($connect, "SELECT * FROM hobbies WHERE user_id='$user_id'");
       

        $user_res = mysqli_fetch_array($user_query);
        $preferences_res = mysqli_fetch_array($preferences_query);
        $aspirations_res = mysqli_fetch_array($aspirations_query);
        $hobbies_res = mysqli_fetch_array($hobbies_query);
        

        $first_name = $user_res['first_name'];
        $last_name = $user_res['last_name'];
        $birthday = $user_res['birthday'];
        $profile_pic = $user_res['profile_pic'];

         $birth_month = get_birth_month($birthday);
         $spirit_animal_res = get_spirit_animal($birth_month, $spirit_animal);
         $spirit_animal_bio_res = get_spirit_animal_bio($spirit_animal_res, $spirit_animal);


        $prof_line = $preferences_res['prof_line'];
        $tag_line = $preferences_res['tag_line'];

        $fav_movie= $preferences_res['fav_movie'];
        $fav_book = $preferences_res['fav_book'];
        $fav_artist = $preferences_res['fav_artist'];
        $fav_song = $preferences_res['fav_song'];
        $fav_food = $preferences_res['fav_food'];

        $bio = $preferences_res['bio'];

        
                
      }

?>