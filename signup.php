<?php 
// connect to database
require_once "database_connection.php";
// start session, prevent user access if logged in already
require_once "user_session.php";
?>

<!DOCTYPE html>
<!-- Created by Ezme Clark ST20261632, Yurii Filin ST20302767, Davide Lo Castro ST 20304605-->
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
    <title>Sign Up | RMC</title>
    <link rel="icon" type="image/png" href="images/rmc_logo.png">

</head>

<body>
<?php include('header.php');?>
<?php include('navigation.php');?>
<main>
    <section>
        <div class = "container_960">
            <div class = "column_6" id = "container_background">
                <div class = "column_12" id = "container_title">
                    <h1>Welcome</h1>
                </div>
                <div class = "column_12" id = "input_title_container">
                    <form action="signup_handler.php" method="post">
                        <!-- Input email -->
                        <div id = "input_title">
                            <p>Enter your Email Address:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="email" name="email" placeholder="Email Address" required></label>
                        </div>
                        <!-- Input username -->
                        <div id = "input_title">
                            <p>Enter your Username:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="text" name="username" placeholder="Username" required></label>
                        </div>
                        <!-- Input password -->
                        <div id = "input_title">
                            <p>Enter your Password:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="password" name="password" placeholder="Enter Password" required></label>
                        </div>
                        <!-- Re-enter password -->
                        <div id = "input_title">
                            <p>Re-Enter your Password:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="password" name="conf_passwd" placeholder="Re-Enter Password" required></label>
                        </div>
                        <!-- Submit button -->
                        <div class = "column_3" id = "red_button">
                            <button type = "submit" id = "red_button">Sign up</button>
                        </div>
                    </form>
                    <!-- Link to login page -->
                    <div class = "column_12" id = "misc_1">
                        <br><p>Already a member?</p>
                    </div>
                    <div class = "column_12" id = "misc_2">
                        <a href="login.php">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php');?>
</body>
</html>