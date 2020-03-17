<?php
	include('Config.php');
	session_start();
    error_reporting(E_ERROR | E_PARSE);
    $eventId = $_GET['id'];
    $sqlQuery = " SELECT  * FROM invitations_request_table where Event_Id=".$eventId."";
    $results =  $db->query($sqlQuery);
    $row = $results->fetch_array();
include './class/admin_invitation.php';
//$sql = 'SELECT * FROM `groups_table` ';
$sql='select mt.name as member_name,mt.`emailId`,mt.`groupId`,gt.name from members_table mt,groups_table gt where gt.id = mt.`groupId` order by `groupId`';
//$sql='select mt.name as member_name,mt.`emailId`,mt.`groupname`,gt.name from members_table mt,groups_table gt where gt.name = mt.`groupname` order by mt.`groupId`';
$result = $db->query($sql);
?>
<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta http-equiv='content-type' content='text/html; charset=UTF-8'>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />  	
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<title>Invitation Portal | Home</title>
		<!-- Bootstrap  -->
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' />
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/2.0.1/css/bootstrap-datetimepicker.min.css' />
		 <link rel="stylesheet" href="css/jquery.tree-multiselect.min.css">
		<link rel='stylesheet' href='css/main.css'>
		<link rel='stylesheet' href='css/font-awesome.css'>
		<link rel='icon' href='images/favicon.ico'>
		<link href='css/glyphicons-regular.css' rel='stylesheet'>
		<script src='js/jquery.js' type='text/javascript'></script>	
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/jquery.tree-multiselect.min.js"></script>		
		<script src='js/bootstrap.js' type='text/javascript'></script>		
		 <script src="js/jquery.popupoverlay.js" type="text/javascript"></script> 	
		<script src='js/bootstrap-datetimepicker.min.js' type='text/javascript'></script>
		<!-- Multi-select-jQuery-Dropdown Start -->	
		<link href='https://www.jqueryscript.net/css/jquerysctipttop.css' rel='stylesheet' type='text/css'>
		<script src='js/mock.js' type='text/javascript'></script>	
		<!--link rel='stylesheet' href='css/jquery.dropdown.css'-->
		<script src='js/jquery.dropdown.js' type='text/javascript'></script>	
		
		<!-- Multi-select-jQuery-Dropdown End -->
		<!-- List JS CDN Link -->
		<script src='js/list.min.js'></script>
		<script type='text/javascript'>		 
			$(document).ready(function() {	
					$('#datetimepicker1').datetimepicker({
						startDate : new Date(), 
						calendarWeeks: true,
						format: "yyyy-MM-dd hh:mm"
						
					});
					var options = {
					  valueNames: ['name', 'born']
					};
					var userList = new List('users', options);
			
			});		
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
					<!-- Content Block Start -->					
					  <a href='Invitaion_portal_admin.php'>
				  <div class='tab-header-container active marginL40'>
						Create Invitation
				</div></a>
					<a href='Invitation_list.php'>
					<div class='tab-header-container'>
						View Invitation Response
					</div></a>
				   <a href='dynamics_group_members.php'>
				  <div class='tab-header-container'>
						Create Groups
					</div></a>
					<a href='dynamics_members.php'>
					<div class='tab-header-container '>
						Create Members
					</div></a>
					<?php 
					if($_SESSION['role']=='0'){
						?>
						<a href='manage_admin.php'>
						<div class='tab-header-container '>
							Manage admin
						</div></a>
						<?php
					}
					?>
                  <div class='searchConteiner'>
                     <div class='row rowfluidalignment'>
                        <div class='col-sm-12'>
                           <!-- Page Form Start -->
                           <form id='eventDetails'  method='post' enctype="multipart/form-data" action="">
							<!-- <h4>Invitaion Portal <h4> -->
                             <div class='col-sm-12 widgetDescriptionForm'>
                                <div class='row'>
									<h4 class='header_title'>Resend Invitation Detail</h4>
									<div class='widgetDescriptionRow clearfix'>								
									   <fieldset class='col-sm-4 form-group'>
                                          <label><span class='requiredFiled'>*</span>Invitation Name</label>
                                          <input id='invitaionName' name='invitaionName' class='form-control' onblur='this.value=this.value.trim();' type='text' value='<?php echo $row['name'];?>' readonly maxlength='30' required >
                                          <div class='discriptionErrorMsg'>
                                             <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                          </div>
                                       </fieldset>
									   <fieldset class='col-sm-4 form-group'>
                                          <label><span class='requiredFiled'>*</span>Invitaion Host</label>
                                          <input id='invitaionFrom' name='invitaionForm' class='form-control' onblur='this.value=this.value.trim();' type='text' value='<?php echo $row['from_name'];?>' readonly maxlength='30' required >
                                          <div class='discriptionErrorMsg'>
                                             <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                          </div>
                                       </fieldset>
									   <fieldset class='col-sm-4 form-group'>
											<label><span class='requiredFiled'>*</span>Event Date & Time</label>
											 <div id='datetimepicker1' class='input-append date'>
												<input id='eventDate' name='eventDate' data-format='dd/MM/yyyy hh:mm:ss' type='text' value='<?php echo $row['date'].' '.$row['time'];?>' required readonly ></input>
												
											  </div>
											<div class='discriptionErrorMsg'>
												<span id='startDateError' class='red-color-error'>&nbsp;</span> 
											</div>
										</fieldset>
										<fieldset class='col-sm-4 form-group'>
                                          <label><span class='requiredFiled'>*</span>Venue</label>
                                          <input id='eventPlace' name='eventPlace' class='form-control' onblur='this.value=this.value.trim();' type='text' value='<?php echo $row['place'];?>' maxlength='30' readonly required >
                                          <div class='discriptionErrorMsg'>
                                             <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                          </div>
                                       </fieldset>
									    <!--fieldset class='col-sm-3 form-group'>
                                          <label><span class='requiredFiled'>*</span>Emailer Subject</label>
                                          <input id='emailerSubject' name='emailerSubject' class='form-control' onblur='this.value=this.value.trim();' type='text' value='' maxlength='30'required >
                                          <div class='discriptionErrorMsg'>
                                             <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                          </div>
                                       </fieldset-->
									   <fieldset class='col-sm-4 form-group'>
                                          <label><span class='requiredFiled'>*</span>Full address</label>
                                          <textarea readonly name='address' id='address	' class='form-control' required  ><?php echo $row['address'];?></textarea>
                                          <div class='discriptionErrorMsg'>
                                             <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                          </div>
                                       </fieldset>
									    <fieldset class='col-sm-4 form-group'>
											<label><span class='requiredFiled'>*</span>Message</label>
											<textarea readonly name='Message' id='Message' class='form-control' required  ><?php echo $row['message'];?></textarea>
											<div class='discriptionErrorMsg'>
												<span id='addr2Error_div' class='red-color-error'>&nbsp;</span>
											</div>
										</fieldset>
										<fieldset class='col-sm-4 form-group'>
										<label><span class='requiredFiled'><input type="checkbox" name="private_email" id="private_email" value="private_email" onchange="myFunction()"></span>Private email</label>
											<input type="email" name="privateemailid" id="privateemailid" class='form-control'>
											<div class='discriptionErrorMsg privateemailiderror'>
											</div>
										</fieldset>
										<fieldset class='col-sm-4 form-group'>
										<label><span class='requiredFiled'><input type="checkbox" name="dynamic_template" id="dynamic_template" value="dynamic_template"  onchange="gettemplate()"></span>Dynamic Template</label>
											<input type="file" name="dynamic_templateid" id="dynamic_templateid" class='form-control'>
											<div class='discriptionErrorMsg dynamictemplateerror'>
											</div>
										</fieldset>	
                                        <input type='hidden' name='EventId' value='<?php echo $row['Event_Id'];?>' id='EventId'>	
										<!--fieldset class='col-sm-12 form-group '>	
										  <button type='button' class='btn btn-info cust-bttn floatR' data-toggle='modal' data-target='#myModal' style='display:block;' id='privew_button'>Preview</button>
                                        </fieldset-->
									   
									</div>   
									<h4 class='header_title'>Invitees List</h4>
									<div class='widgetDescriptionRow clearfix'>
									<div class="col-sm-12">
									   <fieldset class='col-sm-12 form-group clear-both'>
											<label><span class='requiredFiled'>*</span>Select Invitees List</label>
											 	<!--?php 
											echo "<select id='framework' name='selectInvitee[]' multiple class='form-control selectbox'  >";
											//echo "<option value=''>Select Event</option>";
												while ($row = $result->fetch_assoc()) 
												{
													//unset($inv_from);
													$groupname = $row['name'];
													$groupId = $row['groupId'];
													 //$username1 = split ("@", $username); 
													 //$username1= $username1[0];
													
													echo '<option value="'.$groupId.'">'.$groupname.' </option>';
												}
												echo "</select>";
												
												?--> 
												
												<?php 
											echo "<select id='test-select' name='selectInvitee[]' multiple='multiple'>";
												while ($row = $result->fetch_assoc()) 
												{
													//unset($inv_from);
													$groupname = $row['name'];
													$groupId = $row['groupId'];
													$member_name = $row['member_name'];
													$emailId = $row['emailId'];
													 //$username1 = split ("@", $username); 
													 //$username1= $username1[0];
													
													
													//echo '<option value="'.$groupId.'">'.$groupname.' </option>';
													echo '<option value="'.$emailId.'" data-section="'.$groupname.'">'.$member_name.'</option>';
													
												}
												echo "</select>";
												

							
												?> 
												
											<div class='discriptionErrorMsg'>
												<span id='addr2Error_div' class='red-color-error'>&nbsp;</span>
											</div>
										</fieldset>	
										 <fieldset class='col-sm-12 form-group clear-both bulk_invitees'>
											<label><span class='requiredFiled'>*</span>Upload Bulk Invitees</label>
												<input type="file"  class="form-control-file" name="bulkupload"  aria-describedby="fileHelp"  >
											<div class='discriptionErrorMsg'>
												<span id='addr2Error_div' class='red-color-error'>&nbsp;</span>
											</div>
										</fieldset>	
										</div>
										</div>
                                 </div>
                                 <!-- Form Button Start -->
                               
                                    <fieldset class='form-group pull-right'>
                                       <div class='widgetSearchButton search-criteria'>
                                          <!-- <label>Search criteria : you can use wild characters (*,%) for search</label> -->
                                       </div>
                                       <div class='widgetSearchButton no-search-criteria'>	
                                          <input type='submit' value='Send Invitaion' name='submit' class='btn btn-info cust-bttn submit'>
                                       </div>
                                    </fieldset>
                                 
                                 <!-- Form Button End -->
                              </div>
                           </form>
                           <!-- Page Form End -->
						
						   
                        </div>
                     </div>
                  </div>
                  <!-- Content Block End -->
               </div>
			   
            </article>
		</div>	

		<div id='myModal' class='modal fade' role='dialog'>
			<div class='modal-dialog'>

			<!-- Modal content-->
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
						<h4 class='modal-title'>Invitaion Email Preview</h4>
					</div>
					<div class='modal-body'>
					<table class='table'>
						<thead>
						  <tr>
							<th>Email Subject </th>
							<th>Image Type </th>
							<th>Message</th>
						  </tr>
						</thead>
						<tbody>
						  <tr class='info popup_table'>
							<td id='email_subject'></td>
							<td id='Image_type'></td>
							<td id='message_preview'></td>
						  </tr>
						</tbody>
					</table>
						<h5 class='template_view'>Template View</h5>
						<img id='blah'/>
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
					</div>
				</div>

			</div>
		</div>
				<script>
			$("#test-select").treeMultiselect({ enableSelectAll: true, sortable: false ,  startCollapsed: true,searchable: true,});
		
			$('#privew_button').on('click',function(e){
				e.preventDefault();
				var emailerSubject=document.getElementById('emailerSubject').value;  
				var ImageType=document.getElementById('ImageType').value;  
				var Message=document.getElementById('Message').value;  
				var email_subject = document.getElementById('email_subject');
				var Image_type = document.getElementById('Image_type');
				var message_preview = document.getElementById('message_preview');
				email_subject.innerHTML += emailerSubject ;
				Image_type.innerHTML += ImageType ;
				message_preview.innerHTML += Message ;
			})
			 
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah')
							.attr('src', e.target.result)
							.width('100%');
					};

					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>
		<script>
		$(document).ready(function(){
			$('.popup').popup('show');
			$('#privateemailid').css('display','none');
			$('#dynamic_templateid').css('display','none');
				$('.close1').click(function(){
					$('.popup').popup('hide');
		})
		
		})
		function myFunction() {
				if($('#private_email').prop('checked')) {
					$('#privateemailid').css('display','block');
				} else {
					$('#privateemailid').css('display','none');
				}
			}
			function gettemplate() {
				if($('#dynamic_template').prop('checked')) {
					$('#dynamic_templateid').css('display','block');
				} else {
					$('#dynamic_templateid').css('display','none');
				}
			}
		
		
		
		</script>
		
	</body>
</html>
