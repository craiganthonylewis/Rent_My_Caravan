<?php
session_start();
// if the user is already logged in then redirect user to welcome page
if (isset($_SESSION["user_id"]) === true) {
    header("location: index.php");
    exit;
}
?>