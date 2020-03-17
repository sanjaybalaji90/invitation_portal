<?php
// Updated by Pappu Kr Singh  
include './class/dbFunctions.php';
include('Config.php');
error_reporting(E_ERROR | E_PARSE);
$username1 = $_SESSION['user'];

if ($_SESSION['user'] == '') 
{
    header('Location: login.php');
}
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (isset($_POST['Invitees_bulk'])) 
{
    $Invitees_bulk=$_POST['Invitees_bulk'];
    $num =  $_POST['h']; 
    if($Invitees_bulk==='0')  
    {
        for($i=0;$i<=$num;$i++)
        {
            $email= $_POST["email_$i"];               
            $sql="SELECT emailId FROM members_table WHERE emailId ='$email' ";
            $results =$db->query($sql);
            $array_results[] = $results->fetch_array();
        }   

    } 
}
header("Content-type:application/json");       
echo  json_encode($array_results); 
?>          




   
          						
        

         
    



   









    
 
	