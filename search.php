<?php

require 'helpers/config_template.php';

if(isset($_POST['query'])){

    $output = '';
    $query = "SELECT * FROM users WHERE first_name LIKE '%" . $_POST['query'] . "%'";
    $result = mysqli_query($connect, $query);
    $output = '<ul class="list-unstyled">';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .= '<li>' . $row['first_name'] . ' ' . $row['last_name'] . '</li>';
        }

    }
    else{

        $output .= '<li>Person not found</li>';

    }

    $output .= '</ul>';
    echo $output;

}


?>