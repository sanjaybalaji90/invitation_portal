 <?php
	include './class/dbFunctions.php';
	$dbFunctions_obj = new dbFunctions();
	include('Config.php');
	$return_arr = array();
	$email = $_GET['email'];
	$alone = $_GET['alone'];
	$spouse = $_GET['spouse'];
	$Childern = $_GET['Childern'];
	$others = $_GET['others'];
	$id =  $_GET['id'];
	$fname = $_GET['fname'];
	if($fname=='onload'){
		$dbFunctions_obj->getMemberInfoFromEmail($email,$salutation, $membername, $alone, $spose, $Child, $others, $phone);
		$sql = "SELECT * FROM invitations_response_table WHERE invitation_members = '$email' and Event_Id='$id' LIMIT 1";
		$result = $dbFunctions_obj->getTemplateId($id, $email, $template_id,$status);
		$result = $db->query($sql);
		
		while($row = $result->fetch_assoc()) 
		{ 
			$from = $row['from_name'];
			$inv_name = $row['name'];
			$to = $row['invitation_members'];
			$date = $row['date'];
			$time = date('h:i A', strtotime($row['time']));	
			$place = $row['place'];
			$address = $row['address'];
			$msg = $row['message'];
			$status = $row['status'];
			$template = $row['template_id'];
			$templatepath = $row['template_path'];
			$fontsize = $row['fontsize'];
			$fontcolor = $row['fontcolor'];
			$return_arr[] = array("from_name" => $from,
							"name" => $inv_name,
							"invitation_members" => $to,
							"date" => $date,
							"time" => $time,
							"place" => $place,
							"address" => $address,
							"message" => $msg,
							"template_id" => $template,
							"templatepath" => $templatepath,
							"fontsize" => $fontsize,
							"fontcolor" => $fontcolor,
						);
		}
		$return_arr[0]['membername']=$membername;
		$return_arr[0]['salutation']=$salutation;
		// Encoding array in JSON format
		echo json_encode($return_arr);
	}
?>