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
  <link rel="icon" type="image/png" href="images/rmc_logo.png">

</head>


<body>
<?php 
session_start();
include('database_connection.php'); // database connection
include('header_handler.php'); // variable header
include('navigation.php');// always show same nav
?>

<script> // updates page when order is changed
    function refreshSort (order){
        window.location.replace("caravan_list_view.php?order=" + order);
    }
</script>

<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id="container_background">
                <!-- fix centering-->
                <div class="column_5" id="container_title">
                    <select id="green_button" name="order" onChange ="refreshSort(this.value)">
                        <option value = "price ASC" >Price: Low to High</option>
                        <option value = "price DESC">Price: High to Low</option>
                        <option value = "title">Alphabetical: A-Z</option>
                        <option value = "title DESC">Alphabetical: Z-A</option>
                        <option value = "" hidden = "hidden" selected = "selected">Order by...</option>
                    </select>
                </div>
                <!-- create dropdown with default set as price ascending -->
                
                <div class="column_2" id="container_title"><h1>Caravans</h1></div>
                <div class="column_5" id="container_title"></div>

                <div class="column_12"></div>
                
                <?php
                    // retrieve caravan details from db
                    $order = $_GET['order'] ?? 'price ASC'; // Default to price ascending if not set
                    if (isset($_GET['user_id'])){
                        $user_id = $_GET['user_id'];
                        $caravans = $conn->prepare ("SELECT * FROM caravans WHERE user_ID = $user_id ORDER BY $order");

                    } else {
                        $caravans = $conn->prepare ("SELECT * FROM caravans ORDER BY $order");
                    }
                    $caravans->execute();
                    $items = $caravans -> get_result()->fetch_all(MYSQLI_ASSOC);
                    $caravans->close();

                    // for each item retrieved, set variables and create an item card
                    // with the filled in details.
                    // if no items are found, show error message
                    if ($items != NULL){
                        foreach ($items as $item) {
                            $title = $item['title'];
                            $description = $item['description'];
                            $price = $item['price'];
                            $location = $item['location'];
                            $caravan_id = $item['caravan_ID'];
                            $image = $item['image_url'];

                            // echo html for each item card, with 
                            // details filled from the db
                            if ($image == "") {
                                $img_html = "<img style = 'border-radius: 10%; width: 100%; height: auto; max-width: 300px; mad-height: 300px' src = 'caravan_images/default_caravan.png' alt = 'No Caravan Image'>";
                                } else {
                                    $img_html = "<img style = 'border-radius: 10%; width: 100%; height: auto; max-width: 300px; max-height: 300px' src = 'caravan_images/$image' alt = 'Caravan Image'>";
                                }
                            echo ("
                                <div class='column_12' id='container_title' style = 'display:flex;flex-wrap: wrap;'>
                                <div class = 'column_12' id = 'container_background'>

                                <div class = 'column_4' id = 'text_container'> 
                                    ". $img_html."
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
                                        <div class = 'column_4' id = 'text_container'>
                                            <p>£ $price per night</p>
                                        </div>
                                    </div> 
                                </div> 
                                    
                                <a class = 'column_12' href='caravan_detail_view.php?caravan_id=$caravan_id' id='green_button'>
                                    <button type='button' id='green_button'>View</button>
                                </a>
                                
                                </div>
                                </div>
                            ");
                        }
                    } else {
                        echo "<p> No caravans found </p>";
                    }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

