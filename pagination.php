<?php
	include('Config.php');
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	 $l = strval($_GET['k']);
	 $username1 = $_SESSION['user'];
	 $_SESSION['varname'] = $l;
	$var_value = $_SESSION['varname'];
	
	$sqlQuery = " SELECT  * FROM invitations_response_table ";
	$results = mysqli_query($db, $sqlQuery);
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
										<td class='profile-text'>Welcome <?php echo "$username1"; ?> <a href='logout.php'><span class='profile-text'></span>| Logout</a></td>
										<td align='profile-text'></td>
									</tr>									
									</tbody>
								</table>
							</div>
						</div>
						<!--Header Welcome Text and Logout button End -->
					</header>				
				   <a href='Invitaion_portal_admin.php'>
				  <div class='tab-header-container  marginL40'>
						Create Invitation
				</div></a>
					<a href='Invitation_list.php'>
					<div class='tab-header-container active'>
						View Invitation Response
					</div></a>
				   <a href='dynamics_group_members.php'>
				  <div class='tab-header-container'>
						Create Groups
					</div></a>
					<a href='dynamics_members.php'>
					<div class='tab-header-container '>
						create Members
					</div></a>
                  <div class='searchConteiner'>
                     <div class='row rowfluidalignment'>
                        <div class='col-sm-12'>
                           <!-- Page Form Start -->
                           <form id='eventDetails' action='' method='post'>
                              <div class='col-sm-12 widgetDescriptionForm'>
                                 <div class='row'>
								  <div class="col-sm-6">
										<h4 class='header_title'>Invitation List</h4>
								  </div>
								  <div class="col-sm-6">
										<h4 class='inv_list_back'><a class="header_title" href="Invitation_list.php">Back</a></h4>
								  </div>
                                    <div class='widgetDescriptionRow widgetDescriptionRow2 clearfix'>
									
									  <fieldset class='col-sm-12 form-group'>
									 
                                         <div id="container padding0">
											<div id="">
												<div id="results"></div>
												<div id="loader"></div>

											</div>
										</div>
                                          <div class='discriptionErrorMsg'>
                                             <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                          </div>
                                       </fieldset>
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
	<script type="text/javascript">
		function showRecords(perPageCount, pageNumber,str) {
			$.ajax({
				type: "GET",
				url: "getPaginationData.php?k="+str,
				data: "pageNumber=" + pageNumber,
				cache: false,
				beforeSend: function() {
					$('#loader').html('<img src="images/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');
				},
				success: function(html) {
					$("#results").html(html);
					$('#loader').html(''); 
				}
			});
		}
		$(document).ready(function() {
			showRecords(3, 1);
		});
	</script>
</body>
</html>