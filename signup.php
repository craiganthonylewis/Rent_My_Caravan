<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192-->
<!-- Modified from login to signup by Ezme Clark ST20261632, Yurii Filin ST20302767, Davide Lo Castro ST -->
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
                    <div id = "input_title">
                        <p>Enter your Email Address:</p><br>
                    </div>
                    <div id = "input_bar">
                        <label><input type="email" placeholder="Email Address"></label>
                    </div>
                    <div id = "input_title">
                        <p>Enter your Username:</p><br>
                    </div>
                    <div id = "input_bar">
                        <label><input type="username" placeholder="Username"></label>
                    </div>
                    <div id = "input_title">
                        <p>Enter your Password:</p><br>
                    </div>
                    <div id = "input_bar">
                        <label><input type="password" placeholder="Password"></label>
                    </div>
                    <div id = "input_title">
                        <p>Re-Enter your Password:</p><br>
                    </div>
                    <div id = "input_bar">
                        <label><input type="password" placeholder="Password"></label>
                    </div>
                    <div class = "column_3" id = "red_button">
                        <button type = "submit" id = "red_button">Log in</button>
                    </div>
                    <div class = "column_12" id = "misc_1">
                        <p>Not a member?</p>
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

<!-- update-->
