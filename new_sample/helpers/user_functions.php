<?php

function get_user_id($connect, $currentUser){

    $query = mysqli_query($connect, "SELECT user_id FROM users WHERE username='$currentUser'");
    $res = mysqli_fetch_array($query);

    return $res['user_id'] ? $res['user_id'] : "";

}



?>