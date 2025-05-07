<?php // by Ezme Clark ST20261632
require_once "database_connection.php";
session_start();
$caravan_id = $_GET['caravan_id']; 

$delete_query = $conn->prepare("DELETE FROM caravans WHERE caravan_ID = $caravan_id;");
$delete_query->execute();
$delete_query->close();

header('Location: caravan_list_view.php');
exit();
?>