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

        </div>

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