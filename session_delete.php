<!--
Clears session cookies when logging out
Made by Ezme Clark ST20261632
-->


<?php
session_start();
session_unset(); // Clears session variables
session_destroy(); // Destroys the session
header("Location: index.php"); // Redirects to index.php
exit();?>