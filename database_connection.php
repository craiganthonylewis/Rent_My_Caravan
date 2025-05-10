<!-- Coded by Craig Lewis ST20317192-->
<!-- Database connection to rentmycaravan_db-->

<?php

 $db_server = "localhost"; #Holds names of the server
 $db_user = "root"; #MySQL database user //root = default and a security risk
 $db_pass = ""; #Password
 $db_name = "rentmycaravan_db"; #Database name

 $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name); #Declares connection variables

 // remove echos for final version
// #Verifies connection
// if ($conn) {
//     echo("You are connected to the database!" . mysqli_connect_error());
// } else {
//     echo "Could not connect to database!";
// }

?>


