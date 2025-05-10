<?php // by Ezme Clark ST20261632
require_once "database_connection.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from form
    $title = trim($_POST['title']) ?? "No title provided";
    $description = trim($_POST['description']) ?? "No description provided";
    $price = trim($_POST['price']) ?? 0;
    $images = "default_caravan.png";
    $user_id = $_SESSION["user_id"];
    $location = $_POST["location"] ?? "No location provided";
    $caravan_id = $_GET["caravan_id"] ?? 0; 
    $uploaded_image = $_FILES["image"]["name"];
    echo $uploaded_image;

    if ($user_id == null) {
        header ('Location: login.php?error=not_logged_in');
        exit();
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
            if ($uploaded_image){
                $image = $caravan_id . "photo." . (pathinfo($uploaded_image, PATHINFO_EXTENSION) ?? "jpg");
                $full_path = "caravan_images" . DIRECTORY_SEPARATOR . $image;

                // move image into caravan image folder
                // if it works, update db image entry
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)){
                    // Update the image URL in the database
                    $update_query = $conn->prepare("UPDATE caravans SET image_url = ? WHERE caravan_ID = ?;");
                    $update_query->bind_param("si", $image, $caravan_id);
                    $update_query->execute();
                    $update_query->close();

                } else {
                    echo '  error occurred  ';
                    header('Location: caravan_add_view.php');
                    exit();
                }
            }
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