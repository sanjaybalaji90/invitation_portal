<?php
        include './class/dbFunctions.php';
        include('Config.php');
        require 'class.phpmailer.php';
        require 'class.smtp.php';
        $dbFunctions_obj = new dbFunctions();
        $return_arr = array();
        $email = $_GET['email'];
        $alone_spouse= $_GET['alone_or_spouse'];
        $Childern = $_GET['Childern'];
       //$other = $_GET['others'];
        $id =  $_GET['id'];
        $fname = $_GET['fname'];
        $decline = $_GET['decline'];
        //$comments = addslashes($_GET['comments']);
        $dbFunctions_obj->getMemberInfoFromEmail($email,$salutation, $membername, $alone, $spose, $Child, $others, $phone);
        $result = $dbFunctions_obj->getTemplateId($id, $email, $template_id,$status);
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
        $mail->addAddress($email, $membername);
        $mail->WordWrap = 50;
        $mail->isHTML(true);
        $mail->Subject = 'Invitation';
        $mail->Body    = '<html><body>
                            <div style="background-color:#fff;width:500px;height:200px;margin-left:0px">
                                <h1 style="color:#000;text-align:center;padding-top:50px">'.$salutation.' '.$membername.'</h1>
                                <p style="color:#000;font-size:18px;text-align:center">Thank You For Your Response</p>
                            </div>
                        </body></html> ';
      
       $married_status =2;
       $alone = 'with spouse';
       if($alone_spouse=='alone'){
           $alone = 'alone';
           $married_status= 1;
       }
        //$total = $Childern + $other + $married_status;
        $total = $Childern + $married_status;
        if($fname=='accept'){
                    if($status==NULL){
                        $mail->send();
                       date_default_timezone_set('Asia/Kolkata');
                       $cur_datetime = date('Y-m-d H:i:s');
                        //if(isset($_GET['accept']))  {
                        $acpt="Accepted";
                        //$sql = "UPDATE invitations_response_table SET alone= '$alone',childs= '$Childern',others= '$other',total='$total',comments='$comments', status= '$acpt', date_time='$cur_datetime' WHERE invitation_members = '$email' and Event_Id='$id'";
                        $sql = "UPDATE invitations_response_table SET alone= '$alone',childs= '$Childern',total='$total',status= '$acpt', date_time='$cur_datetime' WHERE invitation_members = '$email' and Event_Id='$id'";
                        $result = $db->query($sql);
                        //echo "sucess";
                        echo "Invitation Accept Successfully.....";
                        //}
                    }else{
                        //echo "error";
                        echo "Your earlier confirmation has been recorded.";
                    }    
        }
        if($fname=='Decline'){
            if($status==NULL){
                $mail->send();
            if(isset($_GET['decline']))  {
                $acpt="Rejected";
		date_default_timezone_set('Asia/Kolkata');  
                $cur_datetime = date('Y-m-d H:i:s');  
                $sql = "UPDATE invitations_response_table SET alone= ' ',childs= 0,total = 0,status= '$acpt', date_time='$cur_datetime' WHERE invitation_members = '$email' and Event_Id='$id'"; 
                $result = $db->query($sql);
                //echo "decline";
                echo "Your Invitation Decline Sucessfully...";
            }
        }else{
            //echo "error";
            echo "Your earlier confirmation has been recorded.";
        }
    }

        ?>