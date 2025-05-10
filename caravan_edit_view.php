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
  <link rel="icon" type="image/png" href="images/rmc_logo.png">

</head>


<body>
<?php 
session_start();
include('header_handler.php'); // variable header
include('navigation.php');// always show same nav
include('database_connection.php'); // database connection
$caravan_id = $_GET['caravan_id'] ?? 1; // Default to 1 if not set
$detail_query = $conn->prepare("SELECT title, description, price, location FROM caravans WHERE caravan_ID = ?");
$detail_query->bind_param("i", $caravan_id);
$detail_query->execute();
$detail_query->bind_result($title, $description, $price, $location);
$detail_query->fetch();
$detail_query->close();
?>


<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id="container_background">
            <div class = "column_12" id = "container_title"><h1>Edit Caravan</h1></div>

            <form class= "column_12" id = "input_title_container" action = "caravan_edit_handler.php?caravan_id=<?php echo $caravan_id ?>" method = "post" enctype="multipart/form-data">
                <div class = "column_12">
                    <label id = "input_bar"><input type = "text" name = "title" value = "<?php echo $title ?>" required></label>

                    <div class = "column_4" id = "text_container"> 
                        <p>Image placeholder</p>
                        <label><input type = "file" name = "image"></label>
                    </div>

                    <div class = "column_8" id = "text_container">
                        <label id = "input_bar"><textarea name = "description" rows = "4" cols = "100" required><?php echo $description ?></textarea></label>
                        <label id = "input_bar"><input type = "text" name = "location" value = "<?php echo $location ?>" required></label>
                    </div>

                    <div class = "column_8">
                        <div class = "column_3" id = "text_container">
                                <label><input name = "price" type = "number" value = "<?php echo $price ?>"></label>
                        </div>
                    </div>
                </div>

                <div class = "column_3" id = "green_button">
                        <button type = "submit" id = "green_button">Save Caravan</button>
                </div><br>
                <div class = "column_3" id = "red_button">
                    <a href = "<?php echo 'caravan_delete_handler.php?caravan_id='.$caravan_id ?>"><button type = "button" id = "red_button">Delete Caravan</button></a>
                </div><br><br>
            </form>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

