<!-- Coded by Craig Lewis ST20317192-->
<!-- Database connection to rentmycar-->




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email_Entry = $_POST["email"];
    $password_Entry = $_POST["password"];

    echo $email_Entry . " " . $password_Entry;

}

?>


