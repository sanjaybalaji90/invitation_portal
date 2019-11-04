<?php  
class dbFunctions
{
    private $conn;
    function __construct() {
    $servername = 'localhost';
    $dbname = 'invitation_portal';
    $username = 'root';
    $password = '';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    }

	public function admin_user_login($usename, $password,&$roleId){
        
       $sql = "SELECT * FROM `user_table` WHERE `emailId`='$usename' and `password`='$password'";	   
       $result=  $this->conn->query($sql);
	   while($row = $result->fetch_assoc()) {
				$roleId= $row['roleId'];
				}
		//echo $roleId;
       return $result;  
    }
	

	  public function admin_table($inputArray){
		  $eventId = 1;
		  $getEventId = "SELECT MAX(Event_Id) AS 'MaximumValue' FROM `invitations_request_table`";
						$result1 =  $this->conn->query($getEventId);
						while ($row=mysqli_fetch_row($result1))
						{
						$eventId = $row[0]["MaximumValue"] + 1;
						}
		   $sql1='SELECT count(*) FROM `invitations_request_table`';
		    //echo $sql1;
		    $result =  $this->conn->query($sql1);
			
			while ($row=mysqli_fetch_row($result))
			{
				$count = $row[0];
				
				if($count == 0){
					for($i = 0; $i < count($inputArray); $i++){
						$sql="INSERT INTO invitations_request_table (name,from_name,place,subject,date_time,invitation_members,message,members,Event_Id) VALUES ('".$inputArray[$i][0]."','".$inputArray[$i][1]."','".$inputArray[$i][2]."','".$inputArray[$i][3]."','".$inputArray[$i][4]."','".$inputArray[$i][5]."','".$inputArray[$i][6]."','".$inputArray[$i][7]."','$eventId')";
						$result1 =  $this->conn->query($sql);
						
						$sql2="INSERT INTO invitations_response_table (name,from_name,place,subject,date_time,invitation_members,message,members,Event_Id) VALUES ('".$inputArray[$i][0]."','".$inputArray[$i][1]."','".$inputArray[$i][2]."','".$inputArray[$i][3]."','".$inputArray[$i][4]."','".$inputArray[$i][5]."','".$inputArray[$i][6]."','".$inputArray[$i][7]."','$eventId')";
						$result2 =  $this->conn->query($sql2);
						if($result1){
							$_SESSION['message']='Successfully Created Info';
						}
					}
				}else{
					for($i = 0; $i < count($inputArray); $i++){
						 $sql="INSERT INTO invitations_request_table (name,from_name,place,subject,date_time,invitation_members,message,members,Event_Id) VALUES ('".$inputArray[$i][0]."','".$inputArray[$i][1]."','".$inputArray[$i][2]."','".$inputArray[$i][3]."','".$inputArray[$i][4]."','".$inputArray[$i][5]."','".$inputArray[$i][6]."','".$inputArray[$i][7]."','$eventId')";
							$result =  $this->conn->query($sql);
						
						$sql2="INSERT INTO invitations_response_table (name,from_name,place,subject,date_time,invitation_members,message,members,Event_Id) VALUES ('".$inputArray[$i][0]."','".$inputArray[$i][1]."','".$inputArray[$i][2]."','".$inputArray[$i][3]."','".$inputArray[$i][4]."','".$inputArray[$i][5]."','".$inputArray[$i][6]."','".$inputArray[$i][7]."','$eventId')";
							$result2 =  $this->conn->query($sql2);
						if($result){
							$_SESSION['message']='Successfully Created Info';
						} 
							  
					}
				}
			}

    }
	
    public function student_list(){
        
       $sql = 'SELECT * FROM students ORDER BY student_id asc ';
       $result=  $this->conn->query($sql);
       return $result;  
    }
    
    public function create_student_info($post_data=array()){
         
       if(isset($post_data['create_student'])){
       $student_name= mysqli_real_escape_string($this->conn,trim($post_data['student_name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));
       $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
       $contact= mysqli_real_escape_string($this->conn,trim($post_data['contact']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));

       $sql="INSERT INTO students (student_name, email_address, contact,country,gender) VALUES ('$student_name', '$email_address', '$contact','$country','$gender')";
        
        $result=  $this->conn->query($sql);
        
           if($result){
           
               $_SESSION['message']='Successfully Created Student Info';
               
              header('Location: index.php');
           }
          
       unset($post_data['create_student']);
       }
       
        
    }
    
    public function view_student_by_student_id($id){
       if(isset($id)){
       $student_id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from students where student_id='$student_id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    
    public function update_student_info($post_data=array()){
       if(isset($post_data['update_student'])&& isset($post_data['id'])){
           
       $student_name= mysqli_real_escape_string($this->conn,trim($post_data['student_name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));
       $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
       $contact= mysqli_real_escape_string($this->conn,trim($post_data['contact']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));
       $student_id= mysqli_real_escape_string($this->conn,trim($post_data['id']));

       $sql="UPDATE students SET student_name='$student_name',email_address='$email_address',contact='$contact',country='$country',gender='$gender' WHERE student_id =$student_id";
     
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']='Successfully Updated Student Info';
           }
       unset($post_data['update_student']);
       }   
    }
    
    public function delete_student_info_by_id($id){
        
       if(isset($id)){
       $student_id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  students  WHERE student_id =$student_id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']='Successfully Deleted Student Info';
            
           }
       }
         header('Location: index.php'); 
    }
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>
