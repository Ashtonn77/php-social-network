<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/media_queries.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="toggle-btn" onclick="show()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="sub-body">

        <div class="top-nav">

            <nav>


                <div class="logo-search-container">
                    <p>Expressive</p>
                    <input type="search" name="search-bar" id="search-bar" class="search-bar"
                        placeholder="Looking for someone?">
                    <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn">
                </div>

                <ul>
                    <li><a href="#">
                            <ion-icon name="home-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="people-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="mail-open-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="#">
                            <ion-icon name="notifications-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                    <li><a href="#"><img src="./images/lion.png" alt="profile-pic" width="20px"></a></li>
                    <li><a href="#">
                            <ion-icon name="log-out-outline" style="color:#fff;"></ion-icon>
                        </a></li>
                </ul>

            </nav>



        </div>


        <div class="wrapper">

            <!-- personal info -->
            <div class="personal-info tile profile-first">
                <div class="profile-pic">
                    <img src="./images/lion.png" alt="profile-pic">
                </div>

                <div class="personal-details">
                    <p><span>What they call me:</span><br> Ashton Naidoo</p>
                    <p><span>Date landed on planet Earth:</span><br>05-10-88</p>
                    <p><span>Ruling lands:</span><br> Seatides, Durban</p>
                    <p><span>Place of study/work:</span><br> Richfield</p>
                </div>

            </div>

             <!-- bio section and spirit animal -->
            <div class="bio-and-spirit-animal tile profile-first">

                <p class="bio">
                    <span class="bio-heading">Bio:</span>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias tempora exercitationem aliquid nulla iure illo itaque dolorem eveniet voluptatibus! Dicta ducimus quaerat exercitationem quae distinctio hic, cupiditate assumenda praesentium eum aut officia qui beatae cum porro rem quam eius! Exercitationem dignissimos asperiores aut ipsum ullam repudiandae neque! Illo exercitationem fuga numquam dignissimos. Sit aperiam inventore esse magni possimus similique voluptas fugit non reiciendis dolorum modi minima cumque provident, dolores ducimus quibusdam sunt accusantium unde quisquam labore! Aperiam nobis vitae recusandae numquam sint perferendis aspernatur, quidem veniam eligendi et quo qui dolores autem. Veritatis corporis labore accusantium voluptatum omnis, ad maxime.
                </p>

                <p class="spirit-animal">
                    <span class="bio-heading">Spirit animal:</span>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, debitis quam dignissimos iusto, cupiditate voluptas vero laboriosam eos qui dolores a voluptatum enim, quaerat ipsam odio non quod harum. Quis recusandae, autem soluta error magnam omnis excepturi accusantium suscipit quos dolor, atque neque a! Quas aspernatur velit unde illo praesentium minus consequatur dolore doloribus quaerat magnam, voluptatibus fugiat rerum placeat quam possimus. Velit amet pariatur qui optio hic iste labore. Unde minima excepturi blanditiis. Nisi omnis repellat dolores qui est?
                </p>

            </div>


            <!-- hobbies and interests -->
            <div class="hobbies-and-interests tile profile-first">
                    <h3>Hobbies:</h3>
                <div class="hobbies">

                    <div class="hobbie-tile tile"> 
                            <img src="./images/hobbies/coding.png" alt="hobbie-1" class="hobbie-1">
                    </div>

                    <div class="hobbie-tile tile">
                        <img src="./images/hobbies/gym.png" alt="hobbie-2" class="hobbie-2">
                    </div>
                    
                    <div class="hobbie-tile tile">
                        <img src="./images/hobbies/movies.png" alt="hobbie-3" class="hobbie-2">
                    </div>

                    <div class="hobbie-tile tile">
                        <img src="./images/hobbies/music.png" alt="hobbie-4" class="hobbie-2">
                    </div>     
                

                </div>

            </div>


            <!-- bucket list -->
            <div class="bucket-list-and-goals tile profile-first">

                <h4>Bucket List:</h4>
                
                    <div class="bucket-list">

                        <ul>
                            <li><span>1. </span>Visit Iceland in winter.</li>
                            <li><span>2. </span>Build something that helps people.</li>
                            <li><span>3. </span>Become fluent in a foreign language.</li>
                            <li><span>4. </span>Have lunch with Elon Musk.</li>
                        </ul>

                    </div>

                 <h4>Goals:</h4>   

                    <div class="goals-and-aspirations">

                        <ul>
                            <li><span>1. </span>Visit Iceland in winter.</li>
                            <li><span>2. </span>Build something that helps people.</li>
                            <li><span>3. </span>Become fluent in a foreign language.</li>
                            <li><span>4. </span>Have lunch with Elon Musk.</li>
                        </ul>

                    </div>
                

            </div>


            <div class="friends tile profile-first">

                <h3>Friends:</h3>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/penguin.png" alt="profile-pic">
                    <p>Zoey Deutch</p>
                </a>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/bear.png" alt="profile-pic">
                    <p>John Green</p>
                </a>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/fox.png" alt="profile-pic">
                    <p>Christian Bale</p>
                </a>

                <a href="#" class="friend-mini-profile tile">
                    <img src="./images/tiger.png" alt="profile-pic">
                    <p>Christopher Nolan</p>
                </a>

                <a href="#">See more...</a>
            </div>


            <!-- end wrapper -->
        </div>       


    <!-- end sub body -->
    </div>

    <div class="sidebar">

        <div class="sidebar-search"><input type="search" name="search-bar" id="search-bar" class="search-bar"
                placeholder="Looking for someone?">
            <input type="submit" value="&raquo;" name="search-btn" class="search-btn" id="search-btn"></div>

        <ul>
            <li><a href="#">
                    <ion-icon name="home-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon>
                    <span class="tooltiptext">Home</span>
                </a></li>
            <li><a href="#">
                    <ion-icon name="people-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon><span class="tooltiptext">My Network</span>
                </a></li>
            <li><a href="#">
                    <ion-icon name="mail-open-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon><span class="tooltiptext">Messages</span>
                </a></li>
            <li><a href="#">
                    <ion-icon name="notifications-outline" style="color:#fff; --ionicon-stroke-width: 22px;"
                        size="large">
                    </ion-icon><span class="tooltiptext">Notifications</span>
                </a></li>
            <li><a href="#"><img src="./images/lion.png" alt="profile-pic" width="30px" size="large"><span
                        class="tooltiptext">My profile</span></a></li>
            <li><a href="#">
                    <ion-icon name="log-out-outline" style="color:#fff; --ionicon-stroke-width: 22px;" size="large">
                    </ion-icon><span class="tooltiptext">Logout</span>
                </a></li>
        </ul>

    </div>
    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>