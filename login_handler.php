<!-- Coded by Craig Lewis ST20317192 and Ezme Clark ST20261632-->
<!-- Database login connection-->

<?php

// prevent user from accessing this page if already
// logged in. Also starts session
require_once "user_session.php";

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


