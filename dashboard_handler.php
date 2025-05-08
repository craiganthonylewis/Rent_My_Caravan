<?php
require_once "database_connection.php";
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values from form
    $images = $_POST["image"] ?? "temp.png";
    
    if ($user_id == null) {
        // create error message later
        header ('Location: login.php');
        die();
    } else {
        $add_query = $conn->prepare("INSERT INTO users (pfp_url) VALUES (?);");
        $add_query -> bind_param("s", $images);
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

        //        
        
        $query->close();
        $insertQuery->close();
    }

    
}


?>

