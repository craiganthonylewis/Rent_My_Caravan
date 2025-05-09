<?php
require_once "database_connection.php";
session_start();
setlocale(LC_ALL, 'en_GB.UTF-8'); //needed for basename()


if ($_SERVER["REQUEST_METHOD"] == "POST") { // THIS IS NOT WORKING ON UNIX-Like Systems for some reason /-_-/

    // Get values from form
    // basename() might help for alternate os, idk im desperate
    $images = basename($_FILES["image"]["name"]) ?? "default_pfp.jpg";
    $temp_name = $_FILES["image"]["tmp_name"] ?? "default_pfp.jpg";
    $folder = "uploadedimages". DIRECTORY_SEPARATOR .$images;
    $user_id = $_SESSION["user_id"];

    $pfp_url_query = $conn->prepare("SELECT pfp_url FROM users WHERE user_ID = ?");
    $pfp_url_query->bind_param("i", $user_id);
    $pfp_url_query->execute();
    $pfp_url_query->bind_result($old_pfp_url);
    $pfp_url_query->fetch();
    $pfp_url_query->close();
    $old_pfp = 'uploadedimages'. DIRECTORY_SEPARATOR .$old_pfp_url;

    
    if ($user_id == null) {
        header ('Location: login.php?error=not_logged_in');
        exit();
    } else {
        if (move_uploaded_file($temp_name, $folder)){
            unlink($old_pfp); // deletes old profile picture from folder

            $add_query = $conn->prepare("UPDATE users SET pfp_url = ? WHERE user_ID = ?;");
            $add_query -> bind_param("si", $images, $user_id);
            $result = $add_query->execute();

            header('Location: dashboard.php');
            exit();
        }   else {
            header('Location: dashboard.php');
            exit();
        }

        //        
        
        $query->close();
        $insertQuery->close();
    }
}


?>

