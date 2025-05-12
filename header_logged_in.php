<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192 and Ezme Clark ST20261632-->
<html lang="en">
<head>
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/media_queries.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/font.css">

  <meta charset="UTF-8">
</head>

<?php
  require_once 'database_connection.php';
  // if session cookie 'username' is set, save to variable. else, set variable to 'User'
  $username = isset($_SESSION['username'])?$_SESSION['username'] : 'User'; // Catch blank username
  $user_id = $_SESSION['user_id'];                  
  $pfp_url_query = $conn->prepare("SELECT pfp_url FROM users WHERE user_ID = ?");
  $pfp_url_query->bind_param("i", $user_id);
  $pfp_url_query->execute();
  $pfp_url_query->bind_result($pfp_url);
  $pfp_url_query->fetch();
  $pfp_url_query->close();
?>

<body>
<header>
  <div id ="header_bg_container">
    <nav>
      <div class = "container_960">
        <div class = "column_2" id = "logo"><a href="index.php"><h1>RMC</h1></a></div>

        <div class = "column_7" id = "accessibility_links">
          <ul>
            <li><a href="index.php">Location: Cardiff, Wales</a></li>
          </ul>

          <label for="dropdown">Language:</label>
            <select id="dropdown">
            <option value="English">English</option>
            <option value="Welsh">Welsh</option>
            <option value="Ukrainian">Ukrainian</option>
            <option value="Italian">Italian</option>
            <option value="Japanese">Japanese</option>
          </select>
        </div>

        <div class = "column_3" id = "login_links_button">
          <div class = "login_links_button">
            <ul>
              
                <li><a href="dashboard.php" id="user">
                  <?php 
                    echo $username;                
                  ?>
                </a></li>
                <li>|</li>
            <li><a href="session_delete.php">Log out  </a></li>
            <li></li> <!-- prevents pfp from touching text -->
            </ul>

            <a href="index.php">
              <?php
                if ($pfp_url == null) {
                  // display default profile picture
                  echo '<img src="images/default_pfp.jpg" alt="Avatar"  style = "width: 40px; height: 40px;">';
                } else {
                  // display uploaded profile picture
                  echo '<img src="uploaded_images'.DIRECTORY_SEPARATOR.$pfp_url.'" alt="Avatar"  style = "border-radius : 50%; width: 40px; height: 40px;">';
                 }
               ?>

            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>

</body>
</html>

