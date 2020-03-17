<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
class dbFunctions
{
    private $conn;
    function __construct()
    {
        $servername = 'localhost';
        $dbname     = 'invitation_portal';
        $username   = 'root';
        $password   = '';
        // Create connection
        $conn       = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        } else {
            $this->conn = $conn;
        }
    }
    
    public function admin_user_login($usename, $password, &$roleId, &$status)
    {
        
        $sql    = "SELECT * FROM `user_table` WHERE `emailId`='$usename' and `password`='$password'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $roleId = $row['roleId'];
            $status = $row['status'];
        }
        //echo $roleId;
        return $result;
    }
	   public function getTemplateId($id, $mails, &$template_id,&$status)
    {
        
     	$sql = "SELECT * FROM invitations_response_table WHERE invitation_members = '$mails' and Event_Id='$id'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $template_id = $row['template_id'];
            $status = $row['status'];
			
        }
		//$result->num_rows);
        //echo $roleId;
        return $result;
		
    }
    
    public function getMemberInfoFromEmail($emailId, &$salutation, &$membername, &$alone, &$spose, &$Child, &$others, &$phone)
    {
        $sql    = "Select * from members_table where emailId='$emailId'";
        $result = $this->conn->query($sql);
        while ($row = mysqli_fetch_array($result)) {
            $membername = $row['name'];
            $salutation = $row['salutation'];
            $alone      = $row['alone'];
            $spose      = $row['spose'];
            $Child      = $row['Child'];
            $others     = $row['others'];
            $phone     = $row['phone_num'];
        }
        //echo $roleId;
        return $result;
    }
    public function admin_table($inputArray, $eventId)
    {
        for ($i = 0; $i < count($inputArray); $i++) {
            $sql = "INSERT INTO invitations_request_table (name,from_name,place,subject,date,time,address,invitation_members,message,members,Event_Id,template_id,template_path,status) VALUES ('" . $inputArray[$i][0] . "','" . $inputArray[$i][1] . "','" . $inputArray[$i][2] . "','" . $inputArray[$i][3] . "','" . $inputArray[$i][4] . "','" . $inputArray[$i][5] . "','" . $inputArray[$i][6] . "','" . $inputArray[$i][7] . "','" . $inputArray[$i][8] . "','" . $inputArray[$i][9] . "','$eventId','" . $inputArray[$i][10] . "','" . $inputArray[$i][11] . "','" . $inputArray[$i][14] . "')";
            $result  = $this->conn->query($sql);
            $sql2    = "INSERT INTO invitations_response_table (name,from_name,place,subject,date,time,address,invitation_members,message,members,Event_Id,template_id,template_path,fontcolor,fontsize) VALUES ('" . $inputArray[$i][0] . "','" . $inputArray[$i][1] . "','" . $inputArray[$i][2] . "','" . $inputArray[$i][3] . "','" . $inputArray[$i][4] . "','" . $inputArray[$i][5] . "','" . $inputArray[$i][6] . "','" . $inputArray[$i][7] . "','" . $inputArray[$i][8] . "','" . $inputArray[$i][9] . "','$eventId','" . $inputArray[$i][10] . "','" . $inputArray[$i][11] . "','" . $inputArray[$i][12] . "','" . $inputArray[$i][13] . "')";
            $result2 = $this->conn->query($sql2);
            if ($result) {
                $_SESSION['message'] = 'Successfully Created Info';
            }
            
        }
        
    }
    
    
    public function getEventId(&$eventId)
    {
       // $eventId    = 1;
        $getEventId = "SELECT MAX(Event_Id) AS 'MaximumValue' FROM `invitations_request_table`";
        $result1    = $this->conn->query($getEventId);
        // while ($row = mysqli_fetch_row($result1)) {
        //     echo $row[0]["MaximumValue"];die;
        //     $eventId = $row[0]["MaximumValue"] + 1;
        // }
        while ($row = mysqli_fetch_assoc($result1)) {
            $eventId = $row["MaximumValue"] + 1;
        }
        
    }
    
    public function student_list()
    {
        $sql    = 'SELECT * FROM students ORDER BY student_id asc ';
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function create_student_info($post_data = array())
    {
        if (isset($post_data['create_student'])) {
            $student_name  = mysqli_real_escape_string($this->conn, trim($post_data['student_name']));
            $email_address = mysqli_real_escape_string($this->conn, trim($post_data['email_address']));
            $gender        = mysqli_real_escape_string($this->conn, trim($post_data['gender']));
            $contact       = mysqli_real_escape_string($this->conn, trim($post_data['contact']));
            $country       = mysqli_real_escape_string($this->conn, trim($post_data['country']));
            
            $sql = "INSERT INTO students (student_name, email_address, contact,country,gender) VALUES ('$student_name', '$email_address', '$contact','$country','$gender')";
            
            $result = $this->conn->query($sql);
            
            if ($result) {
                
                $_SESSION['message'] = 'Successfully Created Student Info';
                
                header('Location: index.php');
            }
            
            unset($post_data['create_student']);
        }  
    }
    
    public function view_student_by_student_id($id)
    {
        if (isset($id)) {
            $student_id = mysqli_real_escape_string($this->conn, trim($id));
            
            $sql = "Select * from students where student_id='$student_id'";
            
            $result = $this->conn->query($sql);
            
            return $result->fetch_assoc();
            
        }
    }
    
    
    public function update_student_info($post_data = array())
    {
        if (isset($post_data['update_student']) && isset($post_data['id'])) {
            
            $student_name  = mysqli_real_escape_string($this->conn, trim($post_data['student_name']));
            $email_address = mysqli_real_escape_string($this->conn, trim($post_data['email_address']));
            $gender        = mysqli_real_escape_string($this->conn, trim($post_data['gender']));
            $contact       = mysqli_real_escape_string($this->conn, trim($post_data['contact']));
            $country       = mysqli_real_escape_string($this->conn, trim($post_data['country']));
            $student_id    = mysqli_real_escape_string($this->conn, trim($post_data['id']));
            
            $sql = "UPDATE students SET student_name='$student_name',email_address='$email_address',contact='$contact',country='$country',gender='$gender' WHERE student_id =$student_id";
            
            $result = $this->conn->query($sql);
            
            if ($result) {
                $_SESSION['message'] = 'Successfully Updated Student Info';
            }
            unset($post_data['update_student']);
        }
    }
    
    public function delete_student_info_by_id($id)
    {
        
        if (isset($id)) {
            $student_id = mysqli_real_escape_string($this->conn, trim($id));
            
            $sql    = "DELETE FROM  students  WHERE student_id =$student_id";
            $result = $this->conn->query($sql);
            
            if ($result) {
                $_SESSION['message'] = 'Successfully Deleted Student Info';
                
            }
        }
        header('Location: index.php');
    }
    function __destruct()
    {
        mysqli_close($this->conn);
    }
    
    public function getMembersUsingGroupId($id)
    {
        $sql    = "Select emailId from members_table where groupId='$id'";
        //echo $sql;
        $result = $this->conn->query($sql);
        $i      = -1;
        while ($row = mysqli_fetch_array($result)) {
            $i++;
            $inviteeMember[$i]['emailId'] = $row['emailId'];
            //$inviteeMember[$i]['SubLongName']=$row['SubLongName'];
            
        }
        //var_dump( $inviteeMember);
        return $inviteeMember;
    }
	
 }

?>