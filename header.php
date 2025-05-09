<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192, tag/ alignment fix by Ezme Clark ST20261632-->
<html lang="en">
<head>
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/media_queries.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/font.css">

  <meta charset="UTF-8">

</head>

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

            <div class = "login_links_button" id="logged_out">
              <ul>
                <li><a href="signup.php">Sign up</a></li>
                    <li>|</li>
                <li><a href="login.php">Log in</a></li>
              </ul>

              <a href="dashboard.php">
                <div id="account_image"></div>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

</body>
</html>