<?php

    require 'user_functions.php';
    require 'check_session.php';
    require 'spirit_animal.php';

    if($currentUserLoggedIn){

        $user_id = get_user_id($connect, $currentUserLoggedIn);
        $user_query = mysqli_query($connect, "SELECT * FROM users WHERE user_id='$user_id'");
        $preferences_query = mysqli_query($connect, "SELECT * FROM preferences WHERE user_id='$user_id'");

        $user_res = mysqli_fetch_array($user_query);
        $preferences_res = mysqli_fetch_array($preferences_query);
        

        $name = $user_res['first_name'] . " " . $user_res['last_name'];
        $birthday = $user_res['birthday'];

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