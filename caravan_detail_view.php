<!DOCTYPE html>
<!-- Coded by Ezme Clark ST20317192-->
<html lang="en">

<head>

    <!-- CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/media_queries.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/font.css">


    <!--JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Javascript -->
    <script src="js/title_animation.js"></script>

  <meta charset="UTF-8">
  <title>Rent My Caravan</title>
</head>


<body>
<?php 
session_start();

//testing
$temp = (strlen(isset($_SESSION["user_id"]))) ;
echo $temp;
echo "username:  " . isset($_SESSION["username"]) . "<br>";

//required. shoes different header if logged in
if (strlen(isset($_SESSION["user_id"])) >= 1 ){
include('header_logged_in.php');
}else{
    include('header.php');
}
// always show same nav
include('navigation.php');
?>


<main>
    <section>
        <div class = "container_960">
            <div class = "column_12" id="container_background">
                detail view
            </div>
        </div>
    </section>
</main>

<?php include('footer.php');?>

</body>
</html>

