<?php

require 'helpers/config_template.php';

$error_array = array();

if(isset($_POST['recover-btn'])){

    $email_new = $_POST['email-new'];
    $password_new = strip_tags($_POST['password-new']);
    $confirm_password = strip_tags($_POST['password-new2']);

    $email_query = mysqli_query($connect, "SELECT email FROM users WHERE email='$email_new'");
    $count = mysqli_num_rows($email_query);

    if($count < 1){
        array_push($error_array, "Email not found...sorry :(");
    }
    else if($password_new != $confirm_password){
        array_push($error_array, "Passwords do not match...sorry :(");
    }

    if(empty($error_array)){

        $password_new = md5($password_new);
        $update_password = mysqli_query($connect, "UPDATE users SET password='$password_new'");

        header("Location: login_2.php");

    }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    
<section class="reset-wrapper">


      <form class="reset-form tile" action="password_reset.php" method="post">    
    
        <label for="email_new">Email:</label>
        <input type="email" name="email-new" placeholder="Enter email__">

        <label for="password_new">New password:</label>
        <input type="password" name="password-new" placeholder="Enter new password__">

        <label for="password_new2">Confirm new password:</label>
        <input type="password" name="password-new2" placeholder="Confirm new password__">
        <span>
        <?php

        if(in_array("Email not found...sorry :(", $error_array)){ echo "Email not found...sorry :("; }
        else if(in_array("Passwords do not match...sorry :(", $error_array)){ echo "Passwords do not match...sorry :("; }
        
        ?>
        </span>

        <button name="recover-btn">Confirm</button>
    
    </form>


</section>

  


</body>
</html>