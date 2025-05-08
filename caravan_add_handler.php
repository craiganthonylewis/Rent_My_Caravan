<?php // by Ezme Clark ST20261632
require_once "database_connection.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from form
    $title = trim($_POST['title']) ?? "No title provided";
    $description = trim($_POST['description']) ?? "No description provided";
    $price = trim($_POST['price']) ?? 0;
    $images = $_POST["image"] ?? "temp.png";
    $user_id = $_SESSION["user_id"];
    $location = $_POST["location"] ?? "No location provided";

    if ($user_id == null) {
        // create error message later
        header ('Location: login.php');
        die();
    } else {
        $add_query = $conn->prepare("INSERT INTO caravans (title, description, price, image_url, user_ID, location) VALUES (?, ?, ?, ?, ?, ?);");
        $add_query -> bind_param("ssisis", $title, $description, $price, $images, $user_id, $location);
        $result = $add_query->execute();

        if ($result) {
            echo '  everything went well  ';
            // Redirect to the caravan view page
            // Get caravan ID of the last inserted record
            $last_id = $conn->insert_id;
            
            header('Location: caravan_detail_view.php?caravan_id='.$last_id);
            exit();
        } else {
            echo '  error occurred  ';
            header('Location: caravan_add_view.php');
            exit();
        }

        $add_query->close();
    }

    
}


?>