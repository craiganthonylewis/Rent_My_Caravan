<?php 
require_once "database_connection.php";
require_once "user_session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['passwd']);
    $confirm_password = trim($_POST["conf_passwd"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    if($query = $conn->prepare("SELECT * FROM users WHERE email = ?")) {
        $error = '';
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$query->bind_param('s', $email);
	$query->execute();
	// Store the result so we can check if the account exists in the database.
	$query->store_result();
        if ($query->num_rows > 0) {
            echo'email found';
            //$error .= '<script>alert("AAAA")</script>';   
            if (empty($error) ) {
                $insertQuery = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
                $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                $result = $insertQuery->execute();
                if ($result) {
                    echo'everything went well';
                    //$error .= '<script>alert("AAAA")</script>';  
                } else {
                    //$error .= '<script>alert("AAAA")</script>';
                }
            }
        }
    }
    $query->close();
    $insertQuery->close();
    // Close DB connection
    mysqli_close($db);


}
?>





<!DOCTYPE html>
<!-- Created by Ezme Clark ST20261632, Yurii Filin ST20302767, Davide Lo Castro ST 20304605-->
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
                    <form action="signup_handler.php" method="post">
                        <div id = "input_title">
                            <p>Enter your Email Address:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="email" name="email" placeholder="Email Address" required></label>
                        </div>
                        <div id = "input_title">
                            <p>Enter your Username:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="text" name="username" placeholder="Username" required></label>
                        </div>
                        <div id = "input_title">
                            <p>Enter your Password:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="password" name="password" placeholder="Enter Password" required></label>
                        </div>
                        <div id = "input_title">
                            <p>Re-Enter your Password:</p><br>
                        </div>
                        <div id = "input_bar">
                            <label><input type="password" name="conf_passwd" placeholder="Re-Enter Password" required></label>
                        </div>
                        <div class = "column_3" id = "red_button">
                            <button type = "submit" id = "red_button">Sign up</button>
                        </div>
                    </form>
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