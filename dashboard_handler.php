<?php
require_once "database_connection.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") { // THIS IS NOT WORKING ON UNIX-Like Systems for some reason /-_-/

    // Get values from form
    // basename() might help for alternate os, idk im desperate
    $images = basename($_FILES["image"]["name"]) ?? "default_pfp.jpg";
    $temp_name = $_FILES["image"]["tmp_name"] ?? "default_pfp.jpg";
    $user_id = $_SESSION["user_id"];
    $new_img_name = $user_id . "pfp." . (pathinfo($images, PATHINFO_EXTENSION));
    $folder = "uploaded_images". DIRECTORY_SEPARATOR . $new_img_name;

    $pfp_url_query = $conn->prepare("SELECT pfp_url FROM users WHERE user_ID = ?");
    $pfp_url_query->bind_param("i", $user_id);
    $pfp_url_query->execute();
    $pfp_url_query->bind_result($old_pfp_url);
    $pfp_url_query->fetch();
    $pfp_url_query->close();
    $old_pfp = 'uploaded_images'. DIRECTORY_SEPARATOR .$old_pfp_url;

    
    if ($user_id == null) {
        header ('Location: login.php?error=not_logged_in');
        exit();
    } else { // this is the CORE problem on Unix systems for some reason /-_-/
        if (move_uploaded_file($temp_name, $folder)){
            $add_query = $conn->prepare("UPDATE users SET pfp_url = ? WHERE user_ID = ?;");
            $add_query -> bind_param("si", $new_img_name, $user_id);
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

