<?php

function get_user_id($connect, $currentUser){

    $query = mysqli_query($connect, "SELECT user_id FROM users WHERE username='$currentUser'");
    $res = mysqli_fetch_array($query);

    return $res['user_id'] ? $res['user_id'] : "";

}


function get_birth_month($birthday){

     $birth_month = explode("-", $birthday);
        
    //getting the month of birth for default pro pic
    if( $birth_month[1][0] == '0'){
        $birth_month = $birth_month[1][1];
    }else{
        $birth_month = $birth_month[1];
     }
        
    //getting profile pic depending on month
    $birth_month = +$birth_month - 1;

    return $birth_month;

}

function get_spirit_animal($birth_month, $spirit_animal){

    $spirit_animal_keys = array_keys($spirit_animal);
    $spirit_animal_key = $spirit_animal_keys[$birth_month];

    return $spirit_animal_key;

}

function get_spirit_animal_bio($spirit_animal_key, $spirit_animal){

    return $spirit_animal[$spirit_animal_key];

}



?>