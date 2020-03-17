<?php
	include './class/dbFunctions.php';
	include('Config.php');
	error_reporting(E_ERROR | E_PARSE);
	$username1 = $_SESSION['user'];
	if ($_SESSION['user'] == '') {
		header('Location: login.php');
	}
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$sqlQuery = "SELECT id,name FROM groups_table";
	$result_group = mysqli_query($db, $sqlQuery);
    if (isset($_POST['Invitees_bulk'])) {
		$Invitees_bulk=$_POST['Invitees_bulk'];
		$num =  $_POST['h'];
		if($Invitees_bulk==='0')  {
			$check1 = true;
			$temp1=[];
			for($i=0;$i<=$num;$i++)
			{
				$name_duplicate[]= $_POST["name_$i"]; 				
			}
			foreach(array_count_values($name_duplicate) as $val => $c)
				if($c > 1) 
				$temp1[] = $val;
			if(empty($temp1)){
				for($i=0;$i<=$num;$i++)
				{
					$name= $_POST["name_$i"]; 				
					$des = $_POST["des_$i"];
					// echo "des".$des;
					if($name!=''){
						$sql = "INSERT INTO groups_table(name,discription) VALUES ('$name', '$des')";
						$result =$db->query($sql);	
					}
				}
				echo "Groups created successfully";
			}else{
				echo "duplicate group name  =>" ;
				$length = count($temp1);
				// echo "hi" .$length;
				$val = $temp1[0];
				for($i=1;$i<$length;$i++){
					$val = $val .','. $temp1[$i];
				}
				echo $val;		
			}
		}else if($Invitees_bulk==='1')  {
			if(isset($_FILES['bulkupload']) && $_FILES['bulkupload']['error']==0) {
				require_once "PHPExcel.php";
				$tmpfname = $_FILES['bulkupload']['tmp_name'];
				$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
				$excelObj = $excelReader->load($tmpfname);
				$worksheet = $excelObj->getSheet(0);
				$lastRow = $worksheet->getHighestRow();
				//sushma
				$check = true;
				$temp=[];
				for ($row = 2; $row <= $lastRow; $row++) {
					$bulk_group_name =$worksheet->getCell('A'.$row)->getValue();
					$bulk_group_duplicate[] =$worksheet->getCell('A'.$row)->getValue();
					$sql="SELECT * FROM groups_table WHERE name='$bulk_group_name' ";
					$result = $db->query($sql);
					$array_results = $result->fetch_array();
					if($array_results) {
						$temp[] = $bulk_group_name;
					}
				}
				foreach(array_count_values($bulk_group_duplicate) as $val => $c)
					if($c > 1) 
					$temp[] = $val;
					
				if(empty($temp)){
					for ($row = 2; $row <= $lastRow; $row++) {
						$bulk_group_Id = $worksheet->getCell('A'.$row)->getValue();
						$bulk_group_name = $worksheet->getCell('B'.$row)->getValue();
							$groupid = $bulk_group_Id;
							$groupname = $bulk_group_name;
							if($bulk_group_Id!=''){
								$sql = "INSERT INTO groups_table(name,discription) Values('$groupid','$groupname')";
								$result = $db->query($sql);
							}
					}
					echo "Groups created successfully";
				}else{
					echo "duplicate group name  =>" ;
					$length = count($temp);
					// echo "hi" .$length;
					$val = $temp[0];
					for($i=1;$i<$length;$i++){
						$val = $val .','. $temp[$i];
					}
					echo $val;		
				}
			}
		}
   		$db->close();
	}
   ?>