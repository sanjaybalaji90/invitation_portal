<?php
session_start();
include('Config.php');
$id = $_GET['id'];
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$sql    = "DELETE FROM  user_table  WHERE EmpId =$id";
$result = $db->query($sql);
if($result){
    header('Location: manage_admin.php');
}

?>