
<?php
include './class/dbFunctions.php';
	include('Config.php');
	$username=$_SESSION['user'];
	if($username==''){
		header('Location: login.php');
	}
	error_reporting(E_ERROR | E_PARSE);
	// Create connection
	 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$sql = "SELECT * FROM invitations_response_table WHERE invitation_members = '$username' ";
	//echo $sql;
	$result = $db->query($sql);
	$db->close();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Invitation Portal | User</title>
	
	<link rel="icon" href="images/favicon.ico">
	
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	 <script src="js/jquery.popupoverlay.js" type="text/javascript"></script> 	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	</head>
		<body>
			<article class="all-main-container">
                <div class="col-xs-12 content-wrapper">              
                  <!-- Main Page Error Messages Start -->
                  <span class="success-msg help-block align-center" id="sucessDiv"></span>
                  <span class="has-error help-block align-center" id="errorDiv"></span>
                  <!-- Main Page Error Messages End -->
				  
				 <div>			
				  	<header class="col-sm-12 all-page-header">
						<!--Header Logo Start -->
						<div class="col-sm-7 " align="right">
							<p><img src="images/logo.png" alt="Logo"  align="left"></p>
							<p class="invitation-title"><b>Invitation Portal</b></p>
						</div>
						<!--Header Logo End -->
						<!--Header Welcome Text and Logout button Start -->
						<div class="col-sm-5">
							<div class="pull-right user-settings">
								<table>
									<tbody><tr>
										<!--td class="profile-text">Welcome Admin <a href="login.php"><span class="profile-text"></span>| Logout</a></td-->
										<td class="profile-text">Welcome <?php echo "$username"; ?> <a href="logout.php"><span class="profile-text"></span>| Logout</a></td>
										<td align="profile-text"></td>
									</tr>									
									</tbody>
								</table>
							</div>
						</div>
						<!--Header Welcome Text and Logout button End -->
					</header>				  
                  <!-- Content Block Start -->
                  <div class="searchConteiner_header clearfix">
						<div class="col-sm-9">
						<!--  <h4>
							<span class="glyphicon  search-table-icon-text"></span> Provide the information to add new POS units
						 </h4> -->
						</div>
						<div class="col-sm-3 pull-right">
						<!--  <h4>
							<span class="glyphicon  search-table-icon-text"></span> Info:Delete POS units 
						 </h4> -->
						</div>						
                  </div>
					<a href="user-inv-list.php">
						<div class="tab-header-container  marginL40">
						Invitation Request
						</div>
					</a>
					<a href="user_history.php">
						<div class="tab-header-container active">
						History
						</div>
					</a>
                  <div class="searchConteiner">
                     <div class="row rowfluidalignment">
                        <div class="col-sm-12"> <div id='response'></div>
                           <!-- Page Form Start -->
                     <?php
					 echo "<table class=\"user_history_table\">
							<tr>
								<th>Invitation</th>
								<th> From</th>
								<th> Date</th>
								<th>Status</th>
							</tr>";
					while($row = mysqli_fetch_array($result))
					  {
						  $eventname= $row['name'];
								echo "<tr>";
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['from_name'] . "</td>";
								echo "<td>" . $row['date_time'] . "</td>";
								$acpt = $row['status'];
								$pend = "Pending";
								$rej = "Rejected";
							  if( $acpt == 'Accepted' ) {
								echo "<td style=\"padding:0 10px\"><p style='color:green;font-size:15px; margin:10px 0px;'>".$acpt."</p></td>";
								}else if ( $acpt == '' ){
								echo "<td style=\"padding:0 10px\"><p style='color:red;font-size:15px;margin:10px 0px;'>".$pend."</p></td>";
								} 
								else {
								echo "<td style=\"padding:0 10px\"><p style='color:red;font-size:15px;margin:10px 0px;'>".$rej."</p></td>";
								} 
						  echo "</tr>";
					  }
					  
						echo "</table>";
					 ?>
                           <!-- Page Form End -->
                        </div>
                     </div>
                  </div>
                 
				</div>
            </article>
		</body>
	
</html>

