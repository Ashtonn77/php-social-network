<?php

    require 'user_functions.php';
    require 'check_session.php';
    require 'spirit_animal.php';

    $date = date('Y-m-d'); //gets current date

    if(isset($_GET['id'])){

       //queries
        $id = $_GET['id'];
        $id_query = mysqli_query($connect, "SELECT * FROM users WHERE user_id='$id'");
        $id_res = mysqli_fetch_array($id_query);

        $user_id = get_user_id($connect, $id_res['username']);
        $user_query = mysqli_query($connect, "SELECT * FROM users WHERE user_id='$user_id'");
        $preferences_query = mysqli_query($connect, "SELECT * FROM preferences WHERE user_id='$user_id'");
        $aspirations_query = mysqli_query($connect, "SELECT * FROM aspirations WHERE user_id='$user_id'");
        $hobbies_query = mysqli_query($connect, "SELECT * FROM hobbies WHERE user_id='$user_id'");

        $users_to_invite_query = mysqli_query($connect, "SELECT * FROM users WHERE NOT username='$currentUserLoggedIn'"); 

        $current_user_id = get_user_id($connect, $currentUserLoggedIn);
        $current_user_query = mysqli_query($connect, "SELECT * FROM users WHERE user_id='$current_user_id'");
        $current_user_res = mysqli_fetch_array($current_user_query);

        
        //resulting arrays
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
        
        $bucket_list_array = array($aspirations_res['bucket_list_1'], $aspirations_res['bucket_list_2'], $aspirations_res['bucket_list_3'], $aspirations_res['bucket_list_4']);
        $goals_list_array = array($aspirations_res['goals_1'], $aspirations_res['goals_2'], $aspirations_res['goals_3'], $aspirations_res['goals_4']);
        $hobbies_list_array = array($hobbies_res['hobbie_1'], $hobbies_res['hobbie_2'], $hobbies_res['hobbie_3'], $hobbies_res['hobbie_4']);
                
      }else{

       

        header("Location: error.php");



      }

?>