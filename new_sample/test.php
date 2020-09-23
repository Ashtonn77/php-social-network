<?php

if(isset($_GET['id'])){

    $post_id = $_GET['id'];

    header("Location: comments.php?id=".$post_id);

}

?>