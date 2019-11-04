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
		if($Invitees_bulk==='0')  {
				for($i=0;$i<=$num;$i++)
				{
					$name       = $_POST["name_$i"];
					$email    = $_POST["email_$i"];
					$phone_no = $_POST["phone_$i"];
					//$group_id = $_POST["groupid_$i"];
					$father_name = $_POST["fatherName_$i"];
					$father_num = $_POST["fatherNumber_$i"];
					
					$checkbox1 = $_POST["techno_$i"];  
					$checkbox2 = $_POST["technos_$i"];  
					$checkbox3 = $_POST["technos1_$i"];  
					$checkbox4 = $_POST["technos2_$i"];  
					$salutation = $_POST["selected_item"][$i];
					//$group_name = $_POST["selected_group"][$i];
					$group_id = $_POST["selected_group"][$i];
					if($name=='' || $email=='' || $phone_no=='' || $father_name == '' || $father_num==''){
							//echo 'name is empty';
					}else{
							$sqlQuery = " INSERT INTO members_table(salutation,name, emailId, phone_num,groupId,father_name,father_num,alone,spose,Child,others) Values('$salutation','$name', '$email','$phone_no','$group_id','$father_name','$father_num','$checkbox1','$checkbox2','$checkbox3','$checkbox4')";
							$result = mysqli_query($db, $sqlQuery);
						}						
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
						$bulk_group_salutation = $worksheet->getCell('A'.$row)->getValue();
						$bulk_group_name = $worksheet->getCell('B'.$row)->getValue();
						$bulk_group_id =$worksheet->getCell('C'.$row)->getValue();
						$bulk_group_phone =$worksheet->getCell('D'.$row)->getValue();
						$bulk_group_father =$worksheet->getCell('E'.$row)->getValue();
						$bulk_group_father_phone =$worksheet->getCell('F'.$row)->getValue();
						$bulk_group_email =$worksheet->getCell('G'.$row)->getValue();
						$salutation = $bulk_group_salutation;
						$name = $bulk_group_name;
						$email = $bulk_group_email;
						$group_name = $bulk_group_id;
						$phone = $bulk_group_phone;
						$fatherName = $bulk_group_father;
						$fatherPhone = $bulk_group_father_phone;
						$sql = "INSERT INTO members_table (salutation, name, groupname, emailId,phone_num,father_name,father_num) VALUES ('$salutation', '$name', '$group_name', '$email', '$phone', '$fatherName', '$fatherPhone')";
						$result = $db->query($sql);

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