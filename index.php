<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192 and Ezme Clark ST20261632-->
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font.css">

    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="js/title_animation.js"></script>

    <meta charset="UTF-8">
    <title>Home | RMC</title>
    <link rel="icon" type="image/png" href="images/rmc_logo.png">
</head>

<body>

<?php 
// by Ezme Clark ST20261632
session_start();
//required. shows different header if logged in
include('header_handler.php');
// always show same nav
include('home_navigation.php');
?>

<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id = "background_search">
                <div class="column_6" id="title_container">
                    <ul>
                        <li id ="title_1">Rent my Caravan</li>
                        <li id ="title_2">Holiday for less</li>
                    </ul>
                </div>

                <?php // by Ezme Clark ST20261632
                // Check if session cookie 'user_id' is assigned therefore user logged in
                // if not, show sign up button.
                    if (isset($_SESSION["user_id"]) == false ){
                        echo ("<div class='column_6' id='signup_button_container'>
                <a style = 'text-decoration : none;' href='signup.php'><button><p>Sign up <br> for free</p></button></a>
                </div>");
                        }
                ?>

                <div class="column_12" id="search_bar_container">
                        <div id = "search_bar">
                            <div id = "search_bar_icon"></div>
                            <label>
                                <input type="search" placeholder="Search here...">
                            </label>
                        </div>
                        <a href = "caravan_list_view.php"><button id = "search_button"></button></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php 
// always show same footer
include('footer.php');?>

</body>
</html>

