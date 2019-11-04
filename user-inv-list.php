<?php  
include './class/dbFunctions.php';
session_start();

$username=$_SESSION['user'];
if($_SESSION['user'] == '')
	{
		header('Location: login.php');
	}
	include('Config.php');
	error_reporting(E_ERROR | E_PARSE);
	// Create connection
	 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	// Check connection
	$sql = "SELECT * FROM invitations_response_table WHERE invitation_members = '$username' order by date_time ASC";
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
	  <script>
	//https://stackoverflow.com/questions/22280670/retrieve-data-from-mysql-based-on-select-option
			function showUser(str)
			{
				var s=str;
				//alert(str);
				window.location.href= 'user_invitation.php?k='+s;
			};
	</script>

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
									<tbody><tr>
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
						Invitation Request
						</div>
					</a>
					<a href="user_history.php">
						<div class="tab-header-container">
						History
						</div>
					</a>
                  <div class='searchConteiner'>
                     <div class='row rowfluidalignment'>
                        <div class='col-sm-12'>
                           <!-- Page Form Start -->
                           <form id='eventDetails' action='' method='post'>
                              <div class='col-sm-12 widgetDescriptionForm'>
                                 <div class='row'>
								 <h4 class='header_title'>Invitation List</h4>
                                    <div class='widgetDescriptionRow clearfix'>
									
									  <fieldset class='col-sm-12 form-group'>
									  <label style="font-weight:700"><span class='requiredFiled'></span >Select Event</label>
                                         <form action="user-inv-list.php" method="post" enctype="multipart/form-data">
											<?php 
											
											echo "<select class='user-inv-list' id='sel2' onchange='showUser(this.value)' multiple >";
											echo "<option value='' style='display:none'>Select Event</option>";
												while ($row = $result->fetch_assoc()) 
												{
													//unset($inv_from);
													$invitation_name = $row['name'];
													$event_date = $row['date_time'];
													 $event_date = explode (" ", $event_date); 
													 $date= $event_date[0];
													//$Event_Id = $row['Event_Id'];
													//$result = array_unique($inv_name);
													
													echo '<option value="'.$invitation_name.' '.$date.'">'.$invitation_name.' - '.$date.' </option>';
												}
												echo "</select>";
												?>
										</form>
                                          <div class='discriptionErrorMsg'>
                                             <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                          </div>
                                       </fieldset>
									   	<h1> <?php echo "$eventname"; ?> </h1>
									  <div class='col-sm-12  '><div id='txtHint'></div></div>
                                    </div>
									
                                 </div>
                                 
                                 <!-- table End -->
                              </div>							 
                           </form>
                           <!-- Page Form End -->
                        </div>
                     </div>
                  </div>
                  <!-- Content Block End -->    
               </div>
            </article>
	</body>
</html>

