<!DOCTYPE html>
<!-- Coded by Ezme Clark ST20261632-->
<html lang="en">

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
  <title>Add | RMC</title>
  <link rel="icon" type="image/png" href="images/rmc_logo.png">

</head>


<body>
<?php 
session_start();
include('header_handler.php'); // variable header
include('navigation.php');// always show same nav
require_once "database_connection.php"; //database connection

// if user not logged in, redirect to login page
if (isset($_SESSION["user_id"]) === false) {
    header("location: login.php?error=not_logged_in");
    exit();
}
?>


<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id="container_background">
                <div class = "column_12" id = "container_title"><h1>Add Caravan</h1></div>

                <form class= "column_12" id = "input_title_container" action = "caravan_add_handler.php" method = "post" enctype="multipart/form-data">
                    <div class = "column_12">
                        <label id = "input_bar"><input  type = "text" name = "title" placeholder = "Caravan Title" required></label>

                        <div class = "column_4" id = "text_container"> 
                            <p style = "width:100%">Image Upload</p>
                            <label style = "width:100%"><input type = "file" name = "image"></label>
                        </div>

                        <div class = "column_8" id = "text_container">
                            <label id = "input_bar"><textarea style ="width:90%; resize:vertical;" name = "description" rows = "4" cols = "100" placeholder="Caravan Description" required></textarea></label>
                            <div class = "column_12"></div>
                            <label style="width:100%" id = "input_bar"><input type = "text" name = "location" placeholder = "Location" required></label>
                        </div>

                        <div class = "column_8" >
                            <div class = "column_3" id = "text_container">
                                    <label style="width:100%"><p>Price per night</p></label>
                                    <label style="width:100%" id = "input_bar"><input name = "price" type = "number" placeholder = "0"></label>
                            </div>
                        </div>
                    </div>

                    <div class = "column_3" id = "red_button">
                            <button type = "submit" id = "red_button">Add Caravan</button>
                    </div><br><br>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

