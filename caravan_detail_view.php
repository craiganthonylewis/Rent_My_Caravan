<!DOCTYPE html>
<!-- Coded by Ezme Clark ST20261632-->
<html lang="en">

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
  <title>Rent My Caravan</title>
</head>


<body>
<?php 
session_start();
include('header_handler.php'); // variable header
include('navigation.php');// always show same nav
?>


<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id = "container_background">
                <div class = "column_12" id = "container_title"><h1>Caravans</h1></div>

                <div class = "column_4" id = "text_container">
                    <p>Image placeholder</p>
                </div>

                <div class = "column_6">
                    <div class = "column_6" id = "container_title"><h1>Caravan Title</h1></div>
                    <div class = "column_6" id = "text_container">
                        <p>Caravan description placeholder</p>
                    </div>
                    <div class = "column_6">
                        <div class = "column_2" id = "text_container">
                            <p>Price</p>
                        </div>
                        <div class = "column_4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

