<?php 
   include './class/admin_invitation.php';
   include('Config.php');
   //$sql = 'SELECT * FROM `groups_table` ';
  //$sql='select mt.name as member_name,mt.`emailId`,mt.`groupname`,gt.name from members_table mt,groups_table gt where gt.name = mt.`groupname` order by mt.`groupId`';
  $sql='select mt.name as member_name,mt.`emailId`,mt.`groupId`,gt.name from members_table mt,groups_table gt where gt.groupId = mt.`groupId` order by `groupId`';
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
	  
	  
	<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
    <!--color picker-->
	<script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
	  
	  
	  
	  <script>
		$(document).ready(function(){		
		
		$(".theme").keyup(function()
		{
		
		var background = $("#background").val();
		
		
		$("#full").css("background-color", background);
		});
		
		$("#colPick").ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('.changeMe fieldset p,.changeMe fieldset h4,.changeMe fieldset h2').css('color', '#' + hex);
			    $('.searchConteiner input[type="text"]').css('border', '1px solid #' + hex);
			    $('.calander_addon').css('border', '1px solid #' + hex);
			    $('.fa-calendar').css('border', '1px solid #' + hex);
			    $('.fa-calendar').css('color', '#' + hex);
			    $('#eventDate').css('color', '#' + hex);
             var color ='#' + hex;
            $('colPick').append($('input#colPick').val(color));

			}
		
		});
		
	});
	</script>	  
	  <script>
		 $(document).ready(function(){
			  $("#size").change(function() {
				  $('.changeMe').css("font-size", $(this).val() + "px");
			  });
			});
	  </script>
      <script type='text/javascript'>		 
         $(document).ready(function() {	
		
         		$('#datetimepicker1').datetimepicker({
         			startDate : new Date(), 
         			calendarWeeks: true,
         			format: "yyyy-MM-dd HH:mm",
                  pickSeconds: false
         			
         		});	
         });		
		 function changetemplet(temp)
	{
		if(temp==1){
			$('.invitation_image').css('background-image','url(images/invitation.jpg)');
			$('.eventDate,.calander_addon').css('background-color','#224266');
			
		}
		if(temp==2){
			$('.invitation_image').css('background-image','url(images/inv14.PNG)');
			$('.eventDate,.calander_addon').css('background-color','#710014');
		}
		}
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
                     <p><img src='images/logo.png' alt='Logo' onload='loadImage()' align='left'></p>
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
               <!-- Content Block Start -->					
               <a href='Invitaion_portal_admin.php'>
                  <div class='tab-header-container active marginL40'>
                     Create Invitation
                  </div>
               </a>
               <a href='Invitation_list.php'>
                  <div class='tab-header-container'>
                     View Invitation Response
                  </div>
               </a>
               <a href='dynamics_group_members.php'>
                  <div class='tab-header-container'>
                     Create Groups
                  </div>
               </a>
               <a href='dynamics_members.php'>
                  <div class='tab-header-container '>
                     Create Members
                  </div>
               </a>
			   <div class="form-group col-sm-12">
			  
					</div>
               <form id='eventDetails'  method='post' enctype="multipart/form-data" action="">
                  <div class='searchConteiner'>
					 <div class="form-group col-sm-3">
						<label for="sel1">Select Template</label>
						<select class="form-control" id="sel1" onchange='changetemplet(this.value)' name="taskOption">
							<option value="1">Default Template</option>
							<option value="1">Template1</option>
							<option value="2">Template2</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label for="sel1">Select Font Size</label>
						<select class="form-control" id="size" onchange='changetemplet(this.value)' name="fontSize">
							<option>Select</option>
							<option value="10">10 Px</option>
							<option value="12">12 Px</option>
							<option value="14">14 Px</option>
							<option value="16">16 Px</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label for="sel1">Select Font Color</label>						    
                  <!-- <div id="colPick" style="height:33px;width:232px;border:3px solid #c0c0c0;padding:2px">Color Pettle</div> -->
						<input name="fontColor" type="text" val="" id="colPick" readonly/>
												
					</div>
                     <div class='row rowfluidalignment invitation_image col-sm-6 changeMe'>
                        <div>
                           <fieldset class='col-sm-12 form-group temp_field invitation_headings'>
                              <h2 id="InvitationName" contenteditable="true">Diwali Celebrations</h2>
                           </fieldset>
                           <fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
                              <p  id="InvitationMessage" contenteditable="true" class="invitation_color">Edit your message here.........</p>
                           </fieldset>
                           <fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
                              <h4  class="invitation_color">From</h4>   
                              <p  id="InvitationFrom" contenteditable="true" class="invitation_color">Sanjeev Patil</p>
                           </fieldset>
                           <fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
                              <h4  class="invitation_color">On</h4>
                              <div id='datetimepicker1' class='input-append date'>
                                 <input id='eventDate' class="eventDate" name='eventDate' data-format='dd/MM/yyyy hh:mm:ss' type='text' required readonly ></input>
                                 <span class='add-on calander_addon'>
                                 <i class="fa fa-calendar" aria-hidden="true"></i>
                                 </span>
                              </div>
                           </fieldset>
						    <fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
                              <h4  class="invitation_color">Venue</h4>
                              <p  id="eventPlace" contenteditable="true" class="invitation_color">Girmiti Software</p>
                           </fieldset>
                           <fieldset class='col-sm-12 form-group paddingLR75 invitation_headings'>
                              <h4  class="invitation_color">Address</h4>
                              <p id="InvitationAddress" contenteditable="true" class="invitation_color">Edit your Address here.........</p>
                           </fieldset>
                        </div>
                     </div>
                     <h4 class='header_title'>Invitees List</h4>
                     <div class='widgetDescriptionRow clearfix'>
                        <div class="col-sm-12">
                           <fieldset class='col-sm-12 form-group clear-both'>
                              <label><span class='requiredFiled'>*</span>Select Invitees List</label>
                              <?php 
                                 echo "<select id='test-select' name='selectInvitee[]' multiple='multiple' required>";
                                 	while ($row = $result->fetch_assoc()) 
                                 	{
                                 		$groupname = $row['name'];
                                 		$groupId = $row['groupId'];
                                 		$member_name = $row['member_name'];
                                 		$emailId = $row['emailId'];
                                 		echo '<option value="'.$emailId.'" data-section="'.$groupname.'">'.$member_name.'</option>';
                                 		
                                 	}
                                 	echo "</select>";
                                 
                                 	?> 
                              <div class='discriptionErrorMsg'>
                                 <span id='addr2Error_div' class='red-color-error'>&nbsp;</span>
                              </div>
                           </fieldset>
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
                  </div>
               </form>
               <!-- Content Block End -->
            </div>
         </div>
      </article>
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
         $(document).ready(function(){
            $('.popup').popup('show');
            $('.close1').click(function(){
               $('.popup').popup('hide');
            })
         $(".submit").on('click',function(){
               var InvitationName = $("#InvitationName").html();
               var InvitationMessage = $("#InvitationMessage").html();
               var InvitationFrom = $("#InvitationFrom").html();
               var InvitationAddress = $("#InvitationAddress").html();
               var eventPlace = $("#eventPlace").html();
               var $nameinput = $("<input>", {
                  'type': 'hidden',
                  'name': 'invitaionName',
                  'value': InvitationName
               });
               var $messageinput = $("<input>", {
                  'type': 'hidden',
                  'name': 'Message',
                  'value': InvitationMessage
               });
               var $hostinput = $("<input>", {
                  'type': 'hidden',
                  'name': 'invitaionForm',
                  'value': InvitationFrom
               });
               var $addressinput = $("<input>", {
                  'type': 'hidden',
                  'name': 'address',
                  'value': InvitationAddress
               });
               var $venueinput = $("<input>", {
                  'type': 'hidden',
                  'name': 'eventPlace',
                  'value': eventPlace
               });
               $('#eventDetails').append($nameinput);
               $('#eventDetails').append($messageinput);
               $('#eventDetails').append($hostinput);
               $('#eventDetails').append($addressinput);
               $('#eventDetails').append($venueinput);
            })
         });
      </script>
   </body>
</html>

