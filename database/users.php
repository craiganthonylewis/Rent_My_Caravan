<?php

 $db_server = "localhost"; 
 $db_user = "root"; 
 $db_pass = "";
 $db_name = "rent_my_caravan"; 

 try{
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
 }

 catch(mysqli_sql_exception){
    echo "No connection";
 }
 if($conn){
     echo "You are connected: "
 }
 else{
    echo "No connection";
}

?>