<?php
include 'dbFunctions.php';
include 'excel_reader.php'; 

require 'class.phpmailer.php';
require 'class.smtp.php';
include('Config.php');
$username = $_SESSION['user'];
if ($_SESSION['user'] == '') {
                header('Location: login.php');
}
$dbFunctions_obj = new dbFunctions();
error_reporting(E_ERROR | E_PARSE);

$target_dir    = "uploads/";
$target_file   = $target_dir . basename($_FILES["uploadFile"]["name"]);
$uploadOk      = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $fromName       = 'Girmiti Admin';
    $from           = 'praveen.tharigonda@girmiti.com';
    $invitaionname  = addslashes($_POST['invitaionName']);
    $invitaionform  = addslashes($_POST['invitaionForm']);
    $eventplace     = addslashes($_POST['eventPlace']);
    $eventdate1      = $_POST['eventDate'];
    $eventdatetime   = explode(' ',$eventdate1);
    $eventdate       = $eventdatetime[0];
    $eventtime       = $eventdatetime[1];
    $address         = addslashes($_POST['address']);
    $fontColor         = $_POST['fontColor'];
    $fontSize          =  $_POST['fontSize'];
    //echo $eventdate;
    $emailersubject = $_POST['emailerSubject'];
    $imageType      = $_POST['Image'];
    $message        = addslashes($_POST['Message']);
    $dynamaic_template = $_POST['dynamic_template'];
    
    
    $selectOption = $_POST['taskOption'];
    $templatepath='';
    $retval=true;

    if($dynamaic_template!=''){
        $file_name = $_FILES['dynamic_templateid']['name'];
        $file_tmp  = $_FILES['dynamic_templateid']['tmp_name'];
        $file_ext  = strtolower(end(explode('.',$_FILES['dynamic_templateid']['name'])));
        $extensions = array("jpeg","jpg","png");
        $target_dir = "images/";
        $t=time();
        $target_file = $target_dir . $t.'.'.$file_ext;
        
        if(in_array($file_ext,$extensions)=== false){
            echo "<script>alert('File type must be jpg or png or jpeg')</script>";
            $retval=false;
        }
        if (move_uploaded_file($file_tmp, $target_file)) {
            $selectOption = 'default';
            $templatepath = $t.'.'.$file_ext;
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
            $retval=false;
        }
    }
   
    
        
    
    //$Invitees_select=$_POST['Invitees_select'];
    $Invitees_bulk=$_POST['Invitees_bulk'];
    //Invitation DateTIME
    $sql="SELECT * FROM invitations_request_table WHERE name='$invitaionname' and date='$eventdate' and time='$eventtime' ";
    $results =$db->query($sql);
    $array_results = $results->fetch_array();
    $eventId = isset($_POST['EventId'])?$_POST['EventId']:'';

    
    if(!$eventId){
        if($array_results)  {
            echo "<script>alert('Invitation time is already exists. Please enter a different time')</script>";
            $retval=false;
            
        }
    }
    
    $message12=$_POST['title'];	
    $checkmember    = '';
   
    
    
    if(!$Invitees_bulk)  {
        $selectInvitee  = $_POST['selectInvitee'];
    }
    else{
        echo "<script>alert('please select the Invitee list')</script>";
        $selectInvitee  = $excel_data;
    }
    $inputArray = array();
    
    foreach ($_POST['check'] as $selected) {
                    $checkmember .= $selected . ',';
    }
    $checkmember = rtrim($checkmember,",");
    if (is_array($selectInvitee) && $retval) {
        //var_dump($selectInvitee);
        //for($i=0;$i< sizeof($selectInvitee); $i++){
        while (list($key, $val) = each($selectInvitee)) {
        if($eventId==''){
            $dbFunctions_obj->getEventId($eventId);
        }
        
        $dbFunctions_obj->getMemberInfoFromEmail($val,$salutation, $membername, $alone, $spose, $Child, $others, $phone);
		$val12      = explode('@', $val);
        $emailname  = $val12[0];
        $sucessMail = "Sucessfully Sent a Credentials";
        $errorMail  = "Failed to sent a Credentials";
        $subject    = "Invitation";
        $to         = $val;

        $ciphering = "AES-128-CTR"; 
  
        // Use OpenSSl Encryption method 
        $iv_length = openssl_cipher_iv_length($ciphering); 
        $options = 0; 
        
        // Non-NULL Initialization Vector for encryption 
        $encryption_iv = '1234567891011121'; 
        
        // Store the encryption key 
        $encryption_key = "encryptiontest"; 
        
        // Use openssl_encrypt() function to encrypt the data 
        $encryption = openssl_encrypt($val, $ciphering, 
                    $encryption_key, $options, $encryption_iv); 

        $txt        = " 
<html><head>
<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
<meta charset='utf-8'>
<title>Girmiti</title>
 <style type='text/css'>
  @import url(https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet);

  /* Take care of image borders and formatting */

  img {
   
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
  }

  a {
    text-decoration: none;
    border: 0;
    outline: none;
    color: #bbbbbb;
  }

  a img {
    border: none;
  }

  /* General styling */

  td, h1, h2, h3  {
    font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
    font-weight: 400;
  }
  body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%;
    height: 100%;
    color: #37302d;
    background: #ffffff;
    font-size: 16px;
    font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
  }

   table {
    border-collapse: collapse !important;
  }

  .headline {
    color: #ffffff;
    font-size: 30px;
  }




  </style>

  <style type='text/css' media='screen'>
      @media screen {
         /*Thanks Outlook 2013! http://goo.gl/XLxpyl*/
        td, h1, h2, h3 {
          font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
        }
      }
  </style>

  <style type='text/css' media='only screen and (max-width: 480px)'>
    /* Mobile styles */
    @media only screen and (max-width: 480px) {

      table[class='w320'] {
        width: 320px !important;
      }


    }
  </style>
</head>
<body class='body' style='padding:0; margin:0; display:block; '>
    <table width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#fff'>
        <tbody>
        <tr>
            <td>
                <!-- begin main block -->
                <table cellspacing='0' cellpadding='0' border='0' align='center' style='box-shadow: 0 0 8px rgb(173, 208, 218);'>
				<tr>
					<td style='padding: 20px;'>
						Hi<br><br>Please Click on the link below to confirm your participation for the event.
					</td>
				</tr>
				<tr>
                    <td colspan='3'valign='top' style=' text-align:center; font-size: 18px;padding: 90px 20px;padding-bottom: 65px;' class='headline' colspan='4'>
                    <a href='http://192.168.3.214/Invitation_Portal/user_invitation_list.php?param=". $encryption ."&id=".$eventId."'><div style='display: inline-block;box-shadow: 0 0 14px rgb(126, 138, 143); padding:10px;'><span style='color: black;font-size: 20px;'>View Invitation<span></div></a>
					</td>
				</tr>

                                       


    </table>
                <!-- end main block -->
            </td>
        </tr>
    </tbody>
</table>


</body></html>";
                
        $headers1   = "MIME-Version: 1.0" . "\\r\
";
        $headers1 .= "Content-type:text/html;charset=iso-8859-1" . "\\r\
";
        $headers1      .= "From: $fromName" . " <" . $from . ">";
        //$retval = mail($to,$subject,$message1,$body);
    
        
        //$retval = @mail($to, $subject, $txt, $headers1);        
        $from = 'ravi.pidatala@girmiti.com';
        if(isset($_POST['privateemailid']) && $_POST['privateemailid']!='') {
            $from = $_POST['privateemailid'];
        }

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'mail.girmiti.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ravi.pidatala@girmiti.com';
        $mail->Password = 'Ravi@123';
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Port       = 587; 
        $mail->From = $from;
        $mail->FromName = 'Girmiti Admin';
        $mail->addAddress($to, $membername);
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = 'Invitation';
        $mail->Body    = $txt;
        $retval = $mail->send();
        $status = 1;
        if(!$retval){
            $status = 0;
            $retvalFalse[] = $to;

        }
        $curArray = array(
            $invitaionname,
            $invitaionform,
            $eventplace,
            $emailersubject,
            $eventdate,
            $eventtime,
            $address,
            $val,
            $message,
            $checkmember,$selectOption,$templatepath,$fontColor,$fontSize,$status
        );
        array_push($inputArray, $curArray);
        //$retval = true;
        
        // $curl_start = curl_init();
        // $user_detail="balajijobs90@gmail.com:Balaji@90";
        // $receiver_no= '8867595833'; 
        // $sender_id="TEST SMS"; 
        // $msg_txt= "Invitation:".$invitaionname." host:".$invitaionform." Place:".$eventplace." when:".$eventdate.$eventtime." address:".$address." message:".$message.""; 
        // curl_setopt($curl_start,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
        // curl_setopt($curl_start, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl_start, CURLOPT_POST, 1);
        // curl_setopt($curl_start, CURLOPT_POSTFIELDS, "user=$user_detail&senderID=$sender_id&receipientno=$phone&msgtxt=$msg_txt&state=0");
        // $buffer = curl_exec($curl_start);
        // if(empty ($buffer))
        // { echo " buffer is empty "; }
        // else
        // { echo $buffer; }
        // curl_close($curl_start);

    }
        $dbFunction_login = $dbFunctions_obj->admin_table($inputArray,$eventId);
    }
    
    /* $selectInvitee = '';
    foreach($_POST['selectInvitee'] as $row)
    {
    $selectInvitee .= $row . ', ';
    }
    $selectInvitee = substr($selectInvitee, 0, -2);
    echo  $selectInvitee; */
    //$retval=true;
    $val = 'Nil';
    if($retvalFalse){
        $length = count($retvalFalse);
        // echo "hi" .$length;
        $val = $retvalFalse[0];
        for($i=1;$i<$length;$i++){
            $val = $val .','. $retvalFalse[$i];
        }
					
    }
    if ($retval == true) {
        echo "<div class='widgetDescriptionRow clearfix newbody'><div class='popup searchpopups'>
            <div class='popupremove'>
                <span class='fa fa-remove close1' onclick='closePopup()'></span>
            </div>
               <div class=' popup-search-container'>
                    <div class='row rowfluidalignment'>
                        <div class='col-sm-12'>
                                <div class='col-sm-12 widgetDescriptionForm'>
                                    <div class='row'>
                                        <div class='widgetDescriptionRow'>
                                        <h1 class='popup_text'> Sucessfully Sent The Invitation</h1>
                                            <p class='popup_text' style='width:150px'>Failed Mail list: ".$val."</p>
                                        </div>
                                    </div>
                                    <!-- Popup Form Button Start -->
                                    <div class='role-makerchecker-btn'>
                                        <fieldset class='form-group'>
                                            <div class='widgetSearchButton col-sm-12 no-padding'>
                                                <input type='button' name='decline' value='OK' class='btn btn-info new-btn-chang-pass pull-right cust-bttn close1' > 
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>";
    } else {
        echo "<div class='widgetDescriptionRow clearfix newbody'>
        
        <div class='popup searchpopups'>
        
            <div class='popupremove'>
                <span class='fa fa-remove close1' onclick='closePopup()'></span>
            </div>
               <div class=' popup-search-container'>
                    <div class='row rowfluidalignment'>
                        <div class='col-sm-12'> 
                                <div class='col-sm-12 widgetDescriptionForm'>
                                    <div class='row'>
                                        <div class='widgetDescriptionRow'>
                                        <h1 class='popup_text'> Failed to send the Invitation</h1>
                                            <p class='popup_text' style='width:150px'>Failed Mail list: ".$val."</p>
                                        </div>
                                    </div>
                                    <!-- Popup Form Button Start -->
                                    <div class='role-makerchecker-btn'>
                                        <fieldset class='form-group'>
                                            <div class='widgetSearchButton col-sm-12 no-padding'>
                                                <input type='button' name='decline' value='OK' class='btn btn-info new-btn-chang-pass pull-right cust-bttn close1' > 
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>";
    }
    if ($_SESSION['message']) {
                    //echo "<script>alert('Data saved successfully');</script>";
                    $_SESSION['message'] = '';
    }             
}
?>

