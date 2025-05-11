<!DOCTYPE html>
<!-- Coded by Craig Lewis ST20317192-->
<html lang="en">
<head>
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/navigation.css">
    <link rel="stylesheet" href="css/font.css">

    <meta charset="UTF-8">
</head>
<body>

    <nav>
        <div class="container_960">
            <div class="column_12" id="navigation_container">
                <div class="column_4" id="search_bar_nav">
                    <div id="search_bar_nav_icon"></div>
                    <label>
                        <input type="search" placeholder="Search here...">
                    </label>
                </div>

                <a href = "caravan_list_view.php"><button id="search_button_nav"></button></a>

                <div class = "column_6" id = "nav_links">
                    <ul>
                        <li class = "nav_link" id = "home_link"><a href="index.php"><button>Home</button></a></li>
                        <li class = "nav_link" id = "caravan_link"><a href="caravan_list_view.php"><button>Caravans</button></a></li>
                        <li class = "nav_link" id = "about_link"><a href="about.php"><button>About</button></a></li>
                        <li class = "nav_link" id = "contact_link"><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><button>Contact us</button></a></li>
                    </ul>
                </div>

            </div>
        </div>

    </nav>

</body>
</html>
<!--end of navigation_container-->