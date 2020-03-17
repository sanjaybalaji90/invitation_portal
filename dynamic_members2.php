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
	$num =  $_POST['h'];
	$role = 1;
	$status = 0;
	$password='girmiti01';
		if($Invitees_bulk==='0')  {
			$check1 = true;
			$temp1=[];
			for($i=0;$i<=$num;$i++)
			{
				$email_duplicate[] = $_POST["email_$i"];
			}
			foreach(array_count_values($email_duplicate) as $val => $c)
				if($c > 1) 
				$temp1[] = $val;
			if(empty($temp1)){
				for($i=0;$i<=$num;$i++)
				{
					$name       = $_POST["name_$i"];
					$email    = $_POST["email_$i"];
					$phone_no = $_POST["phone_$i"];
					//$group_id = $_POST["groupid_$i"];
					//$father_name = $_POST["fatherName_$i"];
					//$father_num = $_POST["fatherNumber_$i"];
					
					$checkbox1 = $_POST["techno_$i"];  
					$checkbox2 = $_POST["technos_$i"];  
					$checkbox3 = $_POST["technos1_$i"];  
					$checkbox4 = $_POST["technos2_$i"];  
					$salutation = $_POST["selected_item"][$i];
					//$group_name = $_POST["selected_group"][$i];
					$group_id = $_POST["selected_group"][$i];
					$group_info = explode(":",$group_id);
					$group_id 	= $group_info[0];
					$groupname 	= $group_info[1];

					//$groupname = $_POST['groupname'];
					if($name=='' || $email=='' || $phone_no==''){
							//echo 'name is empty';
					}else{
							//echo $sqlQuery = " INSERT INTO members_table(salutation, name, emailId, phone_num,groupId,father_name,father_num,alone,spose,Child,others) Values('$salutation','$name', '$email','$phone_no','$group_id','$father_name','$father_num','$checkbox1','$checkbox2','$checkbox3','$checkbox4')";die;
							$sqlQuery = " INSERT INTO members_table(salutation, name, emailId, phone_num,groupId,alone,spose,Child,others,groupname) Values('$salutation','$name', '$email','$phone_no','$group_id','$checkbox1','$checkbox2','$checkbox3','$checkbox4','$groupname')";
							$sqlQuery1 = " INSERT INTO user_table(emailId, password, roleId, status) Values('$email','$password','$role','$status')";
							$result = mysqli_query($db, $sqlQuery);
							$result1 = mysqli_query($db, $sqlQuery1);
					}						
				}
				echo "members created successfully";
			} else {
				echo "duplicate mail id=>" ;
				$length = count($temp1);
				
				$val = $temp1[0];
				for($i=1;$i<$length;$i++){
					$val = $val .','. $temp1[$i];
				}
				echo $val;	
			}
		} else if($Invitees_bulk==='1')  {
			if(isset($_FILES['bulkupload']) && $_FILES['bulkupload']['error']==0) {
				require_once "PHPExcel.php";
				$tmpfname = $_FILES['bulkupload']['tmp_name'];
				$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
				$excelObj = $excelReader->load($tmpfname);
				$worksheet = $excelObj->getSheet(0);
				$lastRow = $worksheet->getHighestRow();
				$temp=[];
				for ($row = 2; $row <= $lastRow; $row++) {
					$bulk_group_name = $worksheet->getCell('B'.$row)->getValue();
					$bulk_group_groupid = $worksheet->getCell('C'.$row)->getValue();
					$bulk_group_groupname =$worksheet->getCell('D'.$row)->getValue();
					$bulk_group_email =$worksheet->getCell('F'.$row)->getValue();
					$bulk_group_email_duplicate[] =$worksheet->getCell('F'.$row)->getValue();
					$sql="SELECT * FROM members_table WHERE emailId='$bulk_group_email' ";
					$results =$db->query($sql);
					$array_results = $results->fetch_array();
					if($bulk_group_name=='' || $bulk_group_groupid==''|| $bulk_group_groupname==''|| $bulk_group_email==''){
						$rows = $row-1;
						$temp[] = $rows."th row some value missing";
					}
					if($array_results) {
						$temp[] = $bulk_group_email;
					}
				}
				foreach(array_count_values($bulk_group_email_duplicate) as $val => $c)
					if($c > 1) 
					$temp[] = $val;
				if(empty($temp)){
					for ($row = 2; $row <= $lastRow; $row++) {
						$bulk_group_salutation = $worksheet->getCell('A'.$row)->getValue();
						$bulk_group_name = $worksheet->getCell('B'.$row)->getValue();
						$bulk_group_groupid = $worksheet->getCell('C'.$row)->getValue();
						$bulk_group_groupname =$worksheet->getCell('D'.$row)->getValue();
						$bulk_group_phone =$worksheet->getCell('E'.$row)->getValue();
						$bulk_group_email =$worksheet->getCell('F'.$row)->getValue();
						$salutation = $bulk_group_salutation;
						$name = $bulk_group_name;
						$email = $bulk_group_email;
						$group_id = $bulk_group_groupid;
						$group_name = $bulk_group_groupname;
						$phone = $bulk_group_phone;
						$sql = "INSERT INTO members_table (salutation, name, groupname, emailId,phone_num,groupId) VALUES ('$salutation', '$name', '$group_name', '$email', '$phone', '$group_id')";
						$sql1 = " INSERT INTO user_table(emailId, password, roleId, status) Values('$email','$password','$role','$status')";
						$result = $db->query($sql);
						$result1 = $db->query($sql1);
					}
					echo "Members created successfully";
						
				} else {
					echo "duplicate mail id and null value row=>" ;
					$length = count($temp);
					
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
<?php
	include('Config.php');
	$sqlQuery2 = " SELECT * FROM groups_table";
	$result = $db->query($sqlQuery2);
?>