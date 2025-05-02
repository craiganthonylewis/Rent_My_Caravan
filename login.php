<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192, fixes by Ezme Clark ST20261632-->
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <!-- CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/signup.css"> <!-- Will rename to general.css later-->
    <link rel="stylesheet" href="css/font.css">


    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="js/title_animation.js"></script>

    <meta charset="UTF-8">
    <title>Rent My Caravan</title>
</head>

<body>
<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email_Entry = $_POST["email"];
    $password_Entry = $_POST["password"];

    #debugs if successfully found username and password
    echo $email_Entry . " " . $password_Entry;

    $conn = new mysqli("localhost", "root", "", "rentmycaravan_db");
    $statement = $conn->prepare("SELECT `user_id`, `username`, `password` FROM users WHERE username=?");
    $statement->bind_param("s", $email_Entry);
    $statement->execute();
    $statement->store_result();
    if ($statement->num_rows == 1) {
        echo "one user found";
        $statement->bind_result($id, $username, $password);
        $statement->fetch();

        #cookies
        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $username;

        #redirect to logged in page
        header("location: index_logged_in.php");
        exit();
    }

}

?>

<?php include('header.php');?>
<?php include('navigation.php');?>
<main>
    <section>
        <div class = "container_960">


            <!--login form -->
            <div class="column_6" id="container_background">

                <div class="column_12" id="container_title"><h1>Welcome</h1></div>

                <div class = "column_12" id = "input_title_container"> <!-- Fixed by Ezme -->

                    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">

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
                <div class = "column_12" id = "misc_1"><p>Not a member?</p></div>
                <div class = "column_12" id = "misc_2"><a href="signup.php">Sign up</a></div> <!-- href adjusted by Ezme Clark -->
            </div>
        </div>

    </section>
</main>
<?php include('footer.php');?>
</body>
</html>

