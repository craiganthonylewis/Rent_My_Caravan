
<?php 
// prevent user from accessing this page if already
// logged in. Also starts session - Ezme
require_once "user_session.php";
?>

<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192, fixes by Ezme Clark ST20261632-->
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
    <title>Log In | RMC</title>
    <link rel="icon" type="image/png" href="images/rmc_logo.png">

</head>

<body>
<?php include('header.php');?>
<?php include('navigation.php');?>

<?php
    $error = $_GET['error'] ?? null; // Get error message from URL if it exists
    if ($error == "not_logged_in") {
        echo "<script>alert('You must be logged in to access this page/ feature.');</script>";
    } elseif ($error == "login_failed") {
        $password = $_GET['password'] ?? null; // Get password from URL if it exists
        echo "<script>alert('Login failed. Please check your email and password or create an account.');</script>";
    }
?>

<main>
    <section>
        <div class = "container_960">
            <!--login form -->
            <div class="column_6" id="container_background">

                <div class="column_12" id="container_title"><h1>Welcome</h1></div>

                <div class = "column_12" id = "input_title_container"> <!-- Fixed by Ezme -->

                    <form method = "POST" action = "login_handler.php">

                        <div class="column_12" id="input_title_container">
                            <div id="input_title"><p>Enter your Email Address:</p><br></div>
                            <div id="input_bar">
                                <label><input type="text" name="email" placeholder="Email Address" required></label>
                            </div>
                        </div>

                        <div class="column_12" id="input_title_container">
                            <div id="input_title"><p>Enter your Password:</p><br></div>
                            <div id="input_bar">
                                <label><input type="password" name="password" placeholder="Password" required></label>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="column_3" id="red_button">
                            <button type="submit" id="red_button">Log in</button>
                        </div>

                    </form>
                <!--login form end -->
                </div>
                <div class = "column_12" id = "misc_1"><p>Not a member?</p><br></div>
                <div class = "column_12" id = "misc_2"><a href="signup.php">Sign up</a><br><br></div> <!-- href adjusted by Ezme Clark -->
            </div>
        </div>
    </section>
</main>
<?php include('footer.php');?>
</body>
</html>

