<!DOCTYPE html>
<!-- Coded by Ezme Clark ST20261632-->
<html lang="en">

<?php 
// by Ezme Clark ST20261632
session_start();
//required. shoes different header if logged in
include('header_handler.php');
// always show same nav
include('home_navigation.php');
?>

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/font.css">

    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="js/title_animation.js"></script>

    <meta charset="UTF-8">
    <!-- Put username in tab title -->
    <title><?php 
    $username = isset($_SESSION['username'])?$_SESSION['username'] : 'User'; // Catch blank username
    echo $username;  
    ?> | RMC</title>
</head>

<body>
<main>
    <section>
        <div class = "container_960">
            <div class = "column_6" id = "container_background">
                <div class = "column_12" id = "container_title">
                    <h1>Hello, <?php echo $username ?></h1>
                </div>
                <div class = "column_12" id = "input_title_container"> 
                    <div class = column_6 id = "green_button">
                        <a href = "caravan_add_view.php"><button id= "green_button">Add a caravan</button></a>
                    </div>
                    <br>
                    <div class = "column_6" id = "red_button">
                        <a href = "session_delete.php"><button id= "red_button">Log out</button></a>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php') ?>
</body>

