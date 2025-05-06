<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192-->
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
</head>

<body>

<?php 
session_start();

//testing
$temp = (strlen(isset($_SESSION["user_id"]))) ;
echo $temp;
echo "username:  " . isset($_SESSION["username"]) . "<br>";

//required. shoes different header if logged in
if (strlen(isset($_SESSION["user_id"])) >= 1 ){
include('header_logged_in.php');
}else{
    include('header.php');
}
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

                <?php 
                    if (strlen(isset($_SESSION["user_id"])) == 0 ){
                        echo ("<div class='column_6' id='signup_button_container'>
                <button onclick='location.href='signup.php''>Sign up <br> for free</button>
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
                    <button id = "search_button"></button>
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

