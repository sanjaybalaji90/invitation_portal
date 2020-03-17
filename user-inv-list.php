<?php  
// Updated  by Pappu Kumar singh
include './class/dbFunctions.php';
session_start();
$username=$_SESSION['user'];
if($_SESSION['user'] == '') {
		header('Location: login.php');
}
include('Config.php');
error_reporting(E_ERROR | E_PARSE);
// Create connection
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
	$sql = "SELECT * FROM invitations_response_table WHERE invitation_members = '$username' &&  date>=CURRENT_DATE order by date,time ASC";
	$result = $db->query($sql);
	$db->close();
?>

<!DOCTYPE HTML>
<html>
	<head>

		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />  	
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Invitation Portal | Home</title>
		<link rel='icon' href='images/favicon.ico'>
		<!-- Bootstrap  -->
		<link rel='stylesheet' href='css/bootstrap.css'>
		<link rel='stylesheet' href='css/main.css'>
		<link rel='stylesheet' href='css/font-awesome.css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.popupoverlay.js" type="text/javascript"></script> 	

	</head>

	<body>							
		<article class='all-main-container'>
            <div class='col-xs-12 content-wrapper'>                
                <!-- Main Page Error Messages Start -->
                <span class='success-msg help-block align-center' id='sucessDiv'></span>
                <span class='has-error help-block align-center' id='errorDiv'></span>
                <!-- Main Page Error Messages End -->
				<div>
				    <header class='col-sm-12 all-page-header'>
					   <!--Header Logo Start -->
						<div class='col-sm-7 ' align='right'>
							<p><img src='images/logo.png' alt='Logo'  align='left'></p>	
							<p class='invitation-title'><b>Invitation Portal</b></p>
						</div>
						<!--Header Logo End -->
						<!--Header Welcome Text and Logout button Start -->
						<div class='col-sm-5'>			
						    <div class='pull-right user-settings'>
								<table>
									<tbody>
									  <tr>
										<td class='profile-text'>Welcome <?php echo "$username"; ?> <a href='logout.php'><span class='profile-text'></span>| Logout</a></td>
										<td align='profile-text'></td>
									  </tr>									
									</tbody>
								</table>
							</div>
						</div>
						<!--Header Welcome Text and Logout button End -->
					</header>

					<a href="user-inv-list.php">
						<div class="tab-header-container active marginL40">
					   		Invitation List
					    </div>
				    </a>
				    <div class='searchConteiner'>     
					    <div class='row rowfluidalignment'>
                          	<div class='col-sm-12'>
						   		<!-- Page Form Start -->
						   		<form id='eventDetails' action='' method='post'> 
						        	<div class='col-sm-12 widgetDescriptionForm'>
							        	<div class='row'>
								            <?php
								                echo "<table class=\"user_history_table\">
												<tr>
												  <th>Invitation</th>
												   <th> From</th>
												   <th> Date</th>
												   <th> Time</th>
												   <th>Status</th>
												</tr>";
												while($row = mysqli_fetch_array($result)) {
													echo "<tr>";
													if($row['status']=='Accepted' || $row['status']== 'Rejected') {
														echo "<td>" . $row['name'] . "</td>";
													}
													else{
														$ciphering = "AES-128-CTR"; 
  
															// Use OpenSSl Encryption method 
															$iv_length = openssl_cipher_iv_length($ciphering); 
															$options = 0; 
															
															// Non-NULL Initialization Vector for encryption 
															$encryption_iv = '1234567891011121'; 
															
															// Store the encryption key 
															$encryption_key = "encryptiontest"; 
															
															// Use openssl_encrypt() function to encrypt the data 
															$encryption = openssl_encrypt($username, $ciphering, 
																		$encryption_key, $options, $encryption_iv); 

														//echo "<td> <a href='user_invitation.html?email=". $username ."&id=".$row['Event_Id'] ."'>".$row['name']."</a></td>";
														echo "<td> <a href='user_invitation_list.php?param=". $encryption ."&id=".$row['Event_Id'] ."'>".$row['name']."</a></td>";
													}
													echo "<td>" . $row['from_name'] . "</td>";
													echo "<td>" . $row['date'] . "</td>";
													echo "<td>" . date('h:i A', strtotime($row['time'])). "</td>";																					
													$acpt = $row['status'];
													$pend = "Pending";
													$rej = "Rejected";
													if( $acpt == 'Accepted' ) {
														echo "<td style=\"padding:0 10px\"><p style='color:green;font-size:15px; margin:10px 0px;'>".$acpt."</p></td>";
													}
													else if ( $acpt == '' ){
														echo "<td style=\"padding:0 10px\"><p style='color:orange;font-size:15px;margin:10px 0px;'>".$pend."</p></td>";
													} 
													else {
														echo "<td style=\"padding:0 10px\"><p style='color:red;font-size:15px;margin:10px 0px;'>".$rej."</p></td>";  
													} 
													echo "</tr>";
												}	  
												echo "</table>";   
											?>
									    </div>
									</div>
                               		<!-- table End -->
							    </form>
						    </div>							 
                            <!-- Page Form End -->
                        </div>
                    </div>
                    <!-- Content Block End -->
				</div> 
		    </div>
	    </article>
	</body>
</html>