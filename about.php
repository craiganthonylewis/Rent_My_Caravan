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
  <title>About | RMC</title>
  <link rel="icon" type="image/png" href="images/rmc_logo.png">
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
                    <div class="column_12" id="container_title"><h1>About</h1></div>
                    
                    <div class = "column_10" id = "text_container">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>

                    <div class="column_12" id="container_title"><h1>Creators</h1></div>

                    <div class="column_2" id="text_container">
                        <p>Person 1</p>
                    </div>

                    <div class="column_2" id="text_container">
                        <p>Person 2</p>
                    </div>

                    <div class="column_2" id="text_container">
                        <p>Person 3</p>
                    </div>

                    <div class="column_2" id="text_container">
                        <p >Person 4</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php');?>
</body>
</html>