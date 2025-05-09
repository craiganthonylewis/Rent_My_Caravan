<?php // by Ezme Clark ST20261632
require_once "database_connection.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from form
    $title = trim($_POST['title']) ?? "No title provided";
    $description = trim($_POST['description']) ?? "No description provided";
    $price = trim($_POST['price']) ?? 0;
    // default caravan image by apriliya via PNGtree
    // https://pngtree.com/freepng/caravan-icon-design--transportation-icon-vector-design_4167355.html
    $images = "default_caravan.png";
    $user_id = $_SESSION["user_id"];
    $location = $_POST["location"] ?? "No location provided";
    $uploaded_image = $_FILES["image"]["name"];
    echo $uploaded_image;
    




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
            
            
            if ($uploaded_image) {
                // Image upload handling using caravan id
                $image = $last_id . "photo." . (pathinfo($uploaded_image, PATHINFO_EXTENSION) ?? "jpg");
                $full_path = "caravan_images" . DIRECTORY_SEPARATOR . $image;

                // move image into caravan image folder
                // if it works, update db image entry
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)){
                    // Update the image URL in the database
                    $update_query = $conn->prepare("UPDATE caravans SET image_url = ? WHERE caravan_ID = ?;");
                    $update_query->bind_param("si", $image, $last_id);
                    $update_query->execute();
                    $update_query->close();

                } else {
                    echo '  error occurred  ';
                    header('Location: caravan_add_view.php');
                    exit();
                }
            }             
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