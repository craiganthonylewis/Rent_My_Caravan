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
  <title>Caravans | RMC</title>
</head>


<body>
<?php 
session_start();
include('database_connection.php'); // database connection
include('header_handler.php'); // variable header
include('navigation.php');// always show same nav
?>

<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id="container_background">
                <!-- fix centering-->
                <div class="column_2" id="container_title">
                    <select id="green_button" name="filters"></select>
                </div>
                <div class="column_2" id="container_title">
                    <select id="green_button" name="order"></select>
                </div>
                <div class="column_2" id="container_title"><h1>Caravans</h1></div>
                <div class="column_4" id="container_title"></div>

                <div class="column_12"></div>
                <!-- Create internally scrollable div that fills with items from database
                 made it a text_container type so its visible for now.-->
                
                 <div class="column_10" id="text_container">
                    <?php
                        $caravans = $conn->prepare ("SELECT * FROM caravans");
                        $caravans->execute();
                        $items = $caravans -> get_result()->fetch_all(MYSQLI_ASSOC);
                        $caravans->close();

                        if ($items != NULL){
                            foreach ($items as $item) {
                                $title = $item['title'];
                                $description = $item['description'];
                                $price = $item['price'];
                                $location = $item['location'];
                                $caravan_id = $item['caravan_ID'];
                                $image = $item['image_url'];

                                echo "
                                <div class = 'column_10' id = 'content_container'>
                                    <div class = 'column_4' id = 'text_container'> 
                                        <p>Image placeholder</p>
                                    </div>
                                    
                                    <div class = 'column_8' style='margin-right:auto;'>
                                        <div class = 'column_8'>
                                            <div id = 'container_title'><h1>
                                                $title
                                            </h1></div>
                                        </div> 
                                        <div class = 'column_8' >
                                            <div class = 'column_8' id = 'text_container'>
                                                <p>$description</p>
                                            </div>
                                        </div> 
                                    </div> 
                                    
                                    <a href='caravan_detail_view.php?caravan_id=$caravan_id' id='green_button'>
                                        <button type='button' id='green_button'>View</button>
                                    </a>
                                </div>
                                <br>
                                ";
                            }
                        } else {
                            echo "<p> No caravans found </p>";
                        }



                    ?>



                </div>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

