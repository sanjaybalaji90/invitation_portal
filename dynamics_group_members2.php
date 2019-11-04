<?php
   include './class/dbFunctions.php';
   include('Config.php');
   error_reporting(E_ERROR | E_PARSE);
   $username1 = $_SESSION['user'];
   if ($_SESSION['user'] == '') {
   header('Location: login.php');
   }
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 
if (isset($_POST['Invitees_bulk'])) {
   $Invitees_bulk=$_POST['Invitees_bulk'];
   if($Invitees_bulk==='0')  {
	   $i = 0;
		foreach($_POST['name'] as $val){
			$name = $_POST['name'][$i];
			$des = $_POST['des'][$i];
			$sql = "INSERT INTO groups_table(name,discription) VALUES ('$name', '$des')";
			$result =$db->query($sql);
			 $i++;
		}
   }else if($Invitees_bulk==='1')  {
	   if(isset($_FILES['bulkupload']) && $_FILES['bulkupload']['error']==0) {
		require_once "PHPExcel.php";
		$tmpfname = $_FILES['bulkupload']['tmp_name'];
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		for ($row = 2; $row <= $lastRow; $row++) {
			$bulk_group_Id = $worksheet->getCell('A'.$row)->getValue();
			$bulk_group_name = $worksheet->getCell('B'.$row)->getValue();
				$groupid = $bulk_group_Id;
				$groupname = $bulk_group_name;
			$sql = "INSERT INTO groups_table(name,discription) Values('$groupid','$groupname')";
			$result = $db->query($sql);
		}	 
	}
   }
   $res=$result;
    if($res== true){
		$ress=$res;
   }else{
	   $fail=0;
	   }
   $db->close();
   }
   ?> 