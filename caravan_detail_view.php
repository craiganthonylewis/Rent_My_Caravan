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
  <title>Details | RMC</title>
  <link rel="icon" type="image/png" href="images/rmc_logo.png">

</head>


<body>
<?php 
session_start();
require_once ('database_connection.php');
include('header_handler.php'); // variable header
include('navigation.php');// always show same nav

//Retrieve caravan details from db
$caravan_id = $_GET['caravan_id'] ?? 1; // Default to 1 if not set
$detail_query = $conn->prepare ("SELECT title, user_ID, description, price, location, image_url FROM caravans WHERE caravan_ID = ?");
$detail_query -> bind_param ("i", $caravan_id);
$detail_query -> execute();
$detail_query -> bind_result ($title, $uploader_user_id, $description, $price, $location, $image_url);
$detail_query -> fetch();
$detail_query -> close();

//Retrieve seller contact details from db
$contact_query = $conn -> prepare("SELECT email FROM users WHERE user_ID = ?");
$contact_query -> bind_param ("i", $uploader_user_id);
$contact_query -> execute();
$contact_query -> bind_result ($uploader_email);
$contact_query -> fetch();
$contact_query -> close();

$user_id = $_SESSION['user_id']?? 'none';
?>

<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id = "container_background">
                <div class = "column_12" id = "container_title"><h1>Detail View</h1></div>
                
                <!-- Caravan image/ carousel -->
                <div class = "column_4" style="margin-left:auto;">
                    <div class = "column_4" id = "text_container"> 
                        <?php
                        if ($image_url == "") {
                        echo "<img style = 'border-radius: 10%; width: 100%; height: auto; max-width: 300px;' src = 'caravan_images/default_caravan.png' alt = 'No Caravan Image'>";
                        } else {
                            echo "<img style = 'border-radius: 10%; width: 100%; height: auto; max-width: 300px;' src = 'caravan_images/$image_url' alt = 'Caravan Image'>";
                        }
                        ?>
                    </div>
                    <div class = "column_4" id = "text_container">
                        <p>Contact Owner:
                            <?php echo $uploader_email?>
                        </p>
                    </div>
                </div>

                <div class = "column_8" style="margin-right:auto;">
                    <!-- Caravan details -->
                    <!-- Listing title -->
                    <div class = "column_8">
                        <div id = "container_title" style=" margin:0;"><h1>
                            <?php echo $title ?>
                        </h1></div>
                    </div> 
                    <!-- Listing description + location -->
                    <div class = "column_8" >
                        <div class = "column_8" id = "text_container">
                            <p><?php echo $description ?></p>
                        </div>
                        <div class = "column_8" id = "text_container">
                            <p><?php echo $location ?></p>
                        </div>
                    </div>
                    <!-- Listing price -->
                    <div class = "column_8">
                        <div class = "column_3" id = "text_container" style="text-align: center;">
                            <p><?php echo '£ ' . $price ?></p>
                        </div>
                    </div>

                    <?php // creates an edit button if the current user owns the caravan
                    if ($user_id == $uploader_user_id) {
                        echo '<div class = "column_3" id = "red_button">
                        <a href = "caravan_edit_view.php?caravan_id='.$caravan_id.'"><button  id = "red_button">Edit</button></a>
                        </div>';
                    } 
                    ?>
                <br>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

