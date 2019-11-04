<?php
include 'dbFunctions.php';
include 'excel_reader.php'; 

require 'class.phpmailer.php';
require 'class.smtp.php';

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
    $invitaionname  = $_POST['invitaionName'];
    $invitaionform  = $_POST['invitaionForm'];
    $eventplace     = $_POST['eventPlace'];
    $eventdate1      = $_POST['eventDate'];
    $eventdatetime      = explode('',$eventdate1);
    $eventdate       = $eventdatetime[0];
    $eventtime       = $eventdatetime[1];
    $address         = $_POST['address'];
    $fontColor         = $_POST['fontColor'];
    $fontSize          =  $_POST['fontSize'];
    //echo $eventdate;
    $emailersubject = $_POST['emailerSubject'];
    $imageType      = $_POST['Image'];
    $message        = $_POST['Message'];
    //$Invitees_select=$_POST['Invitees_select'];
    $Invitees_bulk=$_POST['Invitees_bulk'];
    $message12=$_POST['title'];	
    $checkmember    = '';
	$selectOption = $_POST['taskOption'];
    
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
    if (is_array($selectInvitee)) {
        //var_dump($selectInvitee);
        //for($i=0;$i< sizeof($selectInvitee); $i++){
        while (list($key, $val) = each($selectInvitee)) {
	
        $dbFunctions_obj->getEventId($eventId);
        $dbFunctions_obj->getMemberInfoFromEmail($val,$salutation, $membername, $alone, $spose, $Child, $others);
		
        $val12      = explode('@', $val);
        $emailname  = $val12[0];
        $sucessMail = "Sucessfully Sent a Credentials";
        $errorMail  = "Failed to sent a Credentials";
        $subject    = "Invitation";
        $to         = $val;
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
    <table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#fff'>
        <tbody>
        <tr>
            <td>
                <!-- begin main block -->
                <table width='700' cellspacing='0' cellpadding='0' border='0' align='center' style='box-shadow: 0 0 8px rgb(173, 208, 218);'>
                    <tbody>
                        <tr>
                            <td>                  
                                <!-- begin wrapper -->
                                <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                                    <tbody>
                                        <tr>
                                            <td colspan='3'>
                                          
                                           <h3 style='text-align:center;color:#f90;font-size:25px;margin-bottom: 50px;'>". $invitaionname . "</h3></td>
											</tr>
                                            <tr>
                                                <th>To</th>                                            
                                                <th>Host</th>                                            
                                                <th>Venue</th>    
                                            </tr>                                                
                                                <tr>
                                                    <td  style=' text-align:center;color:#222;'>" . $salutation ." ". $membername . " </td>
                                                    <td  style=' text-align:center;color:#222;' >". $invitaionform ."</td>
                                                    <td  style=' text-align:center;color:#222;'>". $eventplace ."</td>                                                    

                                                </tr>
												<tr>
													<td colspan='3'valign='top' style=' text-align:center;color:#222; font-size: 18px;padding: 90px 20px;padding-bottom: 65px;' class='headline' colspan='4'>
													<a href='http://192.168.5.143:9012/Invitation_Portal/user_invitation.html?email=". $val ."&id=".$eventId."'><div style='display: inline-block;box-shadow: 0 0 14px rgb(126, 138, 143); padding:10px;'><span style='color: #d72fdb;font-size: 20px;'>View Invitation<span></div></a>
													</td>
												</tr>
											  <tr>
												<td colspan='3' height='50' valign='top' style='text-align:center; padding-top:10px' >
													<span style='font-size: 18px;color: #001be8;border-bottom: 2px solid;'>On</span><br>
													<p style='line-height:2;'>".$eventdate." at ".$eventtime."</p>
												<span style='font-size:18px;color: #001be8;border-bottom: 2px solid;'>Address</span><br>
													<p style='padding: 0 226px;line-height:2;'>".$address."</p>

												</td>
										</tr>
                                            </table>
                                                <!-- begin articles -->
                                    </tbody>
                            </td>
                        </tr>
                    </tbody>
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
                        $checkmember,$selectOption,$fontColor,$fontSize
        );
        array_push($inputArray, $curArray);
        //$retval = @mail($to, $subject, $txt, $headers1);        
        

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'mail.girmiti.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ravi.pidatala@girmiti.com';
        $mail->Password = 'Ravi@123';
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Port       = 587; 
        $mail->From = 'ravi.pidatala@girmiti.com';
        $mail->FromName = 'Girmiti Admin';
        $mail->addAddress($to, $membername);
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = 'Invitation';
        $mail->Body    = $txt;
        $retval = $mail->send();        

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
                                        <h1 class='popup_text'> Failed to send the Invitation</h1>
                                            
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