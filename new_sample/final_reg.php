<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finer Details</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
</head>

<body>
        
    <h1 class="almost">You're almost there</h1>
    <form action="final-reg.php" method="POST" class="final-reg-form">
    
    <div class="left-top">

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday">

        <label for="tag-line">Profession line:</label>
        <input type="text" name="tag-line class="tag-line" placeholder="eg: Student at Richfield" autocomplete="off">

        <label for="tag-line">Tag line:</label>
        <input type="text" name="tag-line class="tag-line" placeholder="eg: I love coding" autocomplete="off">

        <label for="fav-movie">Favorite movie:</label>
        <input type="text" name="fav-movie" class="fav-movie" placeholder="Enter movie__" autocomplete="off">

        <label for="fav-book">Favorite book:</label>
        <input type="text" name="fav-book" class="fav-book" placeholder="Enter book__" autocomplete="off">

        <label for="fav-artist">Favorite artist:</label>
        <input type="text" name="fav-artist" class="fav-artist" placeholder="Enter artist__" autocomplete="off">

        <label for="fav-song">Favorite song:</label>
        <input type="text" name="fav-song" class="fav-song" placeholder="Enter song__" autocomplete="off">

        <label for="fav-food">Favorite food:</label>
        <input type="text" name="fav-food" class="fav-food" placeholder="Enter food__" autocomplete="off">        

    </div>

    <div class="right-bottom">

        <label for="reg-user-bio">Bio:</label>
        <textarea name="reg-user-bio" id="reg-user-bio" placeholder="Tell us about yourself__"></textarea>

        <div class="reg-hobbies">
            <label for="reg-hobbies">Hobbies:</label>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="music">&nbsp; Music<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="coding">&nbsp; Coding<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="cooking">&nbsp; Fishing<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="cooking">&nbsp; Cooking<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="gaming">&nbsp; Gaming<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="exercising">&nbsp; Workout<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="movies">&nbsp; Movies<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="painting">&nbsp; Painting<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="reading">&nbsp; Reading<br>
            <input class="reg-hobbies" type="checkbox" id="reg-hobbies" name="reg-hobbies" value="travelling">&nbsp; Travelling<br>
        </div>

        <div class="reg-bucket-list">

            <label for="reg-bucket-list">Bucket list:</label>
            <input type="text" name="reg-bucket-list" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter first item" autocomplete="off">
            <input type="text" name="reg-bucket-list" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter second item" autocomplete="off">
            <input type="text" name="reg-bucket-list" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter third item" autocomplete="off">
            <input type="text" name="reg-bucket-list" id="reg-bucket-list" class="reg-bucket-list" placeholder="Enter fourth item" autocomplete="off">

        </div>

        <div class="reg-goals">
            
            <label for="reg-bucket-list">Future goals:</label>
            <input type="text" name="reg-goals" id="reg-goals" class="reg-goals" placeholder="Enter first goal" autocomplete="off">
            <input type="text" name="reg-goals" id="reg-goals" class="reg-goals" placeholder="Enter second goal" autocomplete="off">
            <input type="text" name="reg-goals" id="reg-goals" class="reg-goals" placeholder="Enter third goal" autocomplete="off">
            <input type="text" name="reg-goals" id="reg-goals" class="reg-goals" placeholder="Enter fourth goal" autocomplete="off">

        </div>


        <input type="submit" name="final-reg-submit-btn" class="final-reg-submit-btn" value="Submit">
    
    </div>


    </form>

    
    
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>