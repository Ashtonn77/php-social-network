<?php

function load_profile_pic($pro_pic){
    
 $str = $pro_pic;
 $str = substr(strrchr($str, "/"), 1);  
 $str = "./resources/images/profile_pics/defaults/" . $str;

 return $str;


}

?>