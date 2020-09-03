<?php

include("../config/config.php");
include("./classes/User.php");
include("./classes/Post.php");


$limit = 10; //posts per ajax call

$posts = new Post($connect, $_REQUEST['userLoggedIn']);
$posts->load_posts_by_friends($_REQUEST, $limit);


?>