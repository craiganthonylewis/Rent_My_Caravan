<!DOCTYPE html>
<!-- Coded by Ezme Clark ST20261632 and Yurii Filin ST20302767-->
<html lang="en">

<?php 
    session_start();
    //required. It shows a different header if logged in
    require_once "database_connection.php";
    // connect a header handler
    include('header_handler.php');
    // always show same nav
    include('home_navigation.php');
?>

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/font.css">

    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="js/title_animation.js"></script>

    <meta charset="UTF-8">
    <!-- Put username in tab title -->
    <title><?php 
    $username = isset($_SESSION['username'])?$_SESSION['username'] : 'User'; // Catch blank username
    $user_id = $_SESSION['user_id']; // Catch blank user_id
    echo $username;  
    ?>'s Account | RMC</title>
</head>

<body>
<main>
    <section>
        <div class = "container_960">
            <div class = "column_6" id = "container_background">
                <div class = "column_12" id = "container_title">
                    <h1>Account</h1>
                </div>
                
                <div class = "column_12" id = "input_title_container"> 
                    <!-- Picture -->
                    <div class = "column_6" id = "pfp_url">
                        <?php
                        if (isset($_SESSION["user_id"]) == true ){
                            echo ("<div class='column_6' id='signup_button_container'>
                    <button onclick='location.href='signup.php''>Sign up <br> for free</button>
                    </div>");
                            } else {

                            }
                        ?>
                    </div>
                    <div class = "column_6">
                        <label for="avatar">Update a profile picture:</label>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                    </div>
                    <!-- Display the username -->
                    <div class = "column_6" id = "username">
                        <h3><?php echo $username ?></h3>
                    </div>
                    <div class = "column_6" id = "green_button">
                        <a href = "caravan_list_view.php?user_id=<?php echo $user_id ?>"><button id = "green_button">Show my caravans</button></a>
                    </div>
                    <br>
                    <div class = "column_6" id = "green_button">
                        <a href = "caravan_add_view.php"><button id = "green_button">Add a new caravan</button></a>
                    </div>
                    <br>
                    <div class = "column_6" id = "red_button">
                        <a href = "session_delete.php"><button id = "red_button">Log out</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php') ?>
</body>

