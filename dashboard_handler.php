<?php
require_once "database_connection.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from form
    $images = $_FILES["image"]["name"] ?? "default_pfp.jpg";
    $temp_name = $_FILES["image"]["tmp_name"] ?? "default_pfp.jpg";
    $folder = "uploaded_images/".$images;
    $user_id = $_SESSION["user_id"];

    $pfp_url_query = $conn->prepare("SELECT pfp_url FROM users WHERE user_ID = ?");
    $pfp_url_query->bind_param("i", $user_id);
    $pfp_url_query->execute();
    $pfp_url_query->bind_result($old_pfp_url);
    $pfp_url_query->fetch();
    $pfp_url_query->close();
    $old_pfp = 'uploaded_images/'.$old_pfp_url;

    
    if ($user_id == null) {
        // create error message later
        header ('Location: login.php');
        die();
    } else {
        $add_query = $conn->prepare("UPDATE users SET pfp_url = ? WHERE user_ID = ?;");
        $add_query -> bind_param("si", $images, $user_id);
        $result = $add_query->execute();

        if ($result) {
            echo '  everything went well  ';
            unlink($old_pfp);
            move_uploaded_file($temp_name, $folder);            
            header('Location: dashboard.php');
            exit();
        } else {
            echo '  error occurred  ';
            header('Location: dashboard.php');
            exit();
        }

        //        
        
        $query->close();
        $insertQuery->close();
    }

    
}


?>

