<?php 
// By Ezme Clark ST20261632

//testing
$temp = (strlen(isset($_SESSION["user_id"]))) ;
echo $temp;
$username = isset($_SESSION['username'])?$_SESSION['username'] : 'NULL';
echo "username:  " . $username . "<br>";

//required. shows different header if logged in
if (strlen(isset($_SESSION["user_id"])) >= 1 ){
include('header_logged_in.php');
}else{
    include('header.php');
}

?>