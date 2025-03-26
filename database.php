<!-- Database connection -->
<!-- Coded by Craig Lewis -->

<?php

 $db_host = "localhost"; #Holds names of the server
 $db_user = "root"; #MySQL database user //root = default and a security risk
 $db_pass = ""; #Password
 $db_name = "rent_my_caravan"; #Name of database

 $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); #Declares connection variables

#Verifies connection
if($conn){ #Check if connection failed
    echo("Connection failed: " . mysqli_connect_error()); #Display the error message
} else {
    echo "Connection successful";
}

?>


