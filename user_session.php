<?php
session_start();
// if the user is already logged in then redirect user to welcome page
if (strlen(isset($_SESSION["user_id"])) >= 1) {
    header("location: index.php");
    exit;
}
?>