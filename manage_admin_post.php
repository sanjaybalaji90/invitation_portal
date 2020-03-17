<?php
	include './class/dbFunctions.php';
	include('Config.php');
	error_reporting(E_ERROR | E_PARSE);
	$username1 = $_SESSION['user'];
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        $role = 1;
        // $sql    = "DELETE FROM  user_table  WHERE EmpId =$id";
        // $result1 = $db->query($sql);
        $sql = "UPDATE user_table SET roleId= '$role' WHERE EmpId = '$id'";
        $result1 = $db->query($sql);
        //$result1 = mysqli_query($db, $updatesql);
        if($result1){
            header('Location: manage_admin.php');
        }
    }
	
if (isset($_POST['tot_field'])) {
    $num =  $_POST['tot_field'];
	$role = 2;
	$status = 0;
	$password='girmiti01';
    for($i=0;$i<=$num;$i++)
    {
        $email    = $_POST["email_$i"];
        $sql1="SELECT EmpId,emailId FROM user_table WHERE emailId ='$email' ";
        $result1 = mysqli_query($db, $sql1);
        $rowCount = mysqli_num_rows($result1);
        if($email==''){
            //echo 'name is empty';
        } else {
            if($rowCount!='0') {
                while($row = $result1->fetch_assoc()) {
                    $updatesql = "UPDATE user_table SET roleId= '$role' WHERE EmpId = '$row[EmpId]'";
                    $result = mysqli_query($db, $updatesql);
                }
            } else {
                $sqlQuery = " INSERT INTO user_table(emailId, password, roleId, status) Values('$email','$password','$role','$status')";
                $result = mysqli_query($db, $sqlQuery);
            }
            
        }
    }
}
