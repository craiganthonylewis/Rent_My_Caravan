<!-- Coded by Craig Lewis -->
<?php

 $db_host = "localhost"; #Holds names of the server
 $db_user = "root";
 $db_pass = ""; #Password
 $db_name = "rent_my_caravan"; #Name of database

 $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); #Declares connection variables

#Verifies connection
if (!$conn->connect_error) {
    echo "<p>Connection successful</p>";
 }


