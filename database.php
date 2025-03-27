<!-- Database connection -->
<!-- Coded by Craig Lewis -->

<?php

 $db_server = "localhost"; #Holds names of the server
 $db_user = "root"; #MySQL database user //root = default and a security risk
 $db_pass = ""; #Password
 $db_name = "rentmycar"; #Name of database

 $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name); #Declares connection variables

#Verifies connection
if ($conn) {
    echo("You are connected to the database!" . mysqli_connect_error());
} else {
    echo "Could not connect to database!";
}

?>


