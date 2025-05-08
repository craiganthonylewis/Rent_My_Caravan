<!-- Coded by Craig Lewis ST20317192 and Ezme Clark ST20261632-->
<!-- Database login connection-->

<?php
// prevent user from accessing this page if already
// logged in. Also starts session
require_once "user_session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email_Entry = trim($_POST["email"]);
    $password_Entry = trim($_POST["password"]);
    $password_hash = md5($password_Entry);

    #debugs if successfully found username and password
    echo $email_Entry . " " . $password_Entry;

    $conn = new mysqli("localhost", "root", "", "rentmycaravan_db");
    $statement = $conn->prepare("SELECT user_ID, username, password FROM users WHERE email= ?");
    echo 'found account';
    $statement->bind_param("s", $email_Entry);
    $statement->execute();
    $statement->store_result();
    print_r($statement);

    if ($statement->num_rows == 1) {
        echo "one user found";
        $statement->bind_result($user_ID, $username, $password);
        $statement->fetch();

        if ($password == $password_hash){
            #cookies
            $_SESSION["user_id"] = $user_ID;
            $_SESSION["username"] = $username;

            echo isset($_SESSION["user_id"]);
            echo isset($_SESSION["username"]);  

            #redirect to index
            header("location: index.php");
            exit();
        }else{
        header("location: login.php?error=login_failed");
        exit();}
    }

}

?>


