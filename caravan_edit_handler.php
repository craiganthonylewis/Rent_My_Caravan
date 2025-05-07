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
    $caravan_id = $_GET["caravan_id"] ?? 0; 

    if ($user_id == null) {
        // create error message later
        header ('Location: login.php');
        die();
    } else {
        $edit_query = $conn->prepare("UPDATE caravans SET
        title = ?,
        description = ?,
        price = ?,
        image_url = ?,
        location =?
        WHERE caravan_ID = ?;");
        $edit_query -> bind_param("ssissi", $title, $description, $price, $images, $location, $caravan_id);
        $result = $edit_query->execute();

        if ($result) {
            echo '  everything went well  ';
            // Redirect to the caravan view page            
            header('Location: caravan_detail_view.php?caravan_id='.$caravan_id);
            exit();
        } else {
            echo '  error occurred  ';
            header('Location: caravan_add_view.php');
            exit();
        }

        //        
        
        $edit_query->close();
    }

    
}


?>