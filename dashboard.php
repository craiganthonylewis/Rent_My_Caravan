<!DOCTYPE html>
<!-- Coded by Ezme Clark ST20261632 and Yurii Filin ST20302767-->
<html lang="en">

<?php 
    session_start();
    //required. It shows a different header if logged in
    require_once "database_connection.php";
    // connect a header handler
    include('header_handler.php');
    // always show same nav
    include('home_navigation.php');
?>


<?php 
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = file_get_contents($image);

        // Insert image data into database as BLOB
        $sql = "INSERT INTO images(image) VALUES(?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $imgContent);
        $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());

        if ($current_id) {
            echo "Image uploaded successfully.";
        } else {
            echo "Image upload failed, please try again.";
        }
    } else {
        echo "Please select an image file to upload.";
    }
?>

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/font.css">

    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="js/title_animation.js"></script>

    <meta charset="UTF-8">
    <!-- Put username in tab title -->
    <title><?php 
    $username = isset($_SESSION['username'])?$_SESSION['username'] : 'User'; // Catch blank username
    $user_id = $_SESSION['user_id']; // Catch blank user_id
    echo $username;  
    ?>'s Account | RMC</title>
</head>

<?php
    $pfp_url_query = $conn->prepare("SELECT pfp_url FROM users WHERE user_ID = ?");
    $pfp_url_query->bind_param("i", $user_id);
    $pfp_url_query->execute();
    $pfp_url_query->bind_result($pfp_url);
    $pfp_url_query->fetch();
    $pfp_url_query->close();
?>


<body>
<main>
    <section>
        <div class = "container_960">
            <div class = "column_6" id = "container_background">
                <div class = "column_12" id = "container_title">
                    <h1>Account</h1>
                </div>
                
                <div class = "column_12" id = "input_title_container"> 
                    <!-- Picture -->
                    <div class = "column_6" id = "input_title_container">
                        <?php
                        if ($pfp_url == null) {
                            echo '<img src="images/default_pfp.jpg" alt="Avatar"  style = "width: 200px; height: 200px;">';
                        } else {
                            $full_url = 'uploaded_images/'.$pfp_url;
                            echo $full_url;
                            echo '<img src="uploaded_images/'.$pfp_url.'" alt="Avatar"  style = "border-radius : 50%; width: 200px; height: 200px;">';
                        }
                        ?>
                        
                        
                    </div>


                    <form action="dashboard_handler.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="file" name="image" accept="image/*" value="">
                        <input type="submit" value="Upload">
                    </div>
                    </form>
                    <!-- <div class = "column_6">
                        <label for="avatar">Update a profile picture:</label>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                    </div> -->
                    <!-- Display the username -->
                    <div class = "column_6" id = "username">
                        <h3><?php echo $username ?></h3>
                    </div>
                    <div class = "column_6" id = "green_button">
                        <a href = "caravan_list_view.php?user_id=<?php echo $user_id ?>"><button id = "green_button">Show my caravans</button></a>
                    </div>
                    <br>
                    <div class = "column_6" id = "green_button">
                        <a href = "caravan_add_view.php"><button id = "green_button">Add a new caravan</button></a>
                    </div>
                    <br>
                    <div class = "column_6" id = "red_button">
                        <a href = "session_delete.php"><button id = "red_button">Log out</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php') ?>
</body>

