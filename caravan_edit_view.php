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
  <title>Edit | RMCn</title>
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
            <div class = "column_12" id="container_background">
                edit
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

