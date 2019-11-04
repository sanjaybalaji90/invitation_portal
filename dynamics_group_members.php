<?php
   include 'dynamics_group_members2.php';
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
                     <p><img src='images/logo.png' alt='Logo' align='left'></p>
                     <p class='invitation-title'><b>Invitation Portal</b></p>
                  </div>
                  <!--Header Logo End -->
                  <!--Header Welcome Text and Logout button Start -->
                  <div class='col-sm-5'>
                     <div class='pull-right user-settings'>
                        <table>
                           <tbody>
                              <tr>
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
                  <div class='tab-header-container marginL40'>
                     Create Invitation
                  </div>
               </a>
               <a href='Invitation_list.php'>
                  <div class='tab-header-container'>
                     View Invitation Response
                  </div>
               </a>
               <a href='dynamics_group_members.php'>
                  <div class='tab-header-container active'>
                     Create Groups
                  </div>
               </a>
               <a href='dynamics_members.php'>
                  <div class='tab-header-container '>
                     Create Members
                  </div>
               </a>
               <div class='searchConteiner'>
                  <div class='row rowfluidalignment'>
                     <div class='col-sm-12'>
                        <!-- Page Form Start -->
                        <!--form id='eventDetails' action='' method='post'-->
                        <div class='col-sm-12 widgetDescriptionForm'>
                           <div class=''>
                             
                                 <h4 class='header_title'>Creating Groups </h4>
                                 <div class='widgetDescriptionRow clearfix'>
                                    <div class="clear_both check-box col-sm-6">
                                       <fieldset class='col-sm-12 form-group padding0'>
                                          <label class='container_check paddingL35'>Select To Create Manual Groups 
                                          <input type='radio' name='Invitees_bulk' id='select_id' value="0" required>
                                          <span class='checkmark dot_check'></span>
                                          </label>
                                       </fieldset>
                                       <fieldset class='col-sm-12 form-group padding0'>
                                          <label class='container_check paddingL35'>Select To Create Bulk groups
                                          <input type='radio' name='Invitees_bulk' id='bulk_id' value="1" required>
                                          <span class='checkmark dot_check'></span>
                                          </label>
                                       </fieldset>
                                    </div>
                                 </div>
								  <form method="post" action="" enctype="multipart/form-data"  name="frmer" id="frmer">
                                 <div class="manually_members">
                                    <h4 class='header_title'>Create Manual Groups</h4>
									 <input type='hidden' name='Invitees_bulk' id='select_id' value="0" required>
                                    <div class='widgetDescriptionRow2 clearfix'>
                                          <div class="table-responsive">  
											<table class="table table-bordered" id="dynamic_field">  
												<tr>  
													<td><input type="text" name="name[]" placeholder="Group Name" class="form-control name_list" required="" />
													<div class="discriptionErrorMsg error-span-hide red-error news"></div>
													</td>  
													<td><input type="text" name="des[]" placeholder="Group Description" class="form-control name_list" required="" />
													<div class="discriptionErrorMsg error-span-hide red-error news"></div>
													</td>  
													  
												</tr>
												
											</table>  
											<div><button type="button" name="add" id="add" class="dynamic_field add_fields2 btn add-bttn">Add</button></div>
										</div>
                                    </div>
									<fieldset class='col-sm-12 form-group pull-right'>
                                    <div class='widgetSearchButton no-search-criteria pull-right'>	
                                      
									   <input name="submit" type="submit" value="Submit" id="submit" class='btn btn-info cust-bttn submit'/>
                                    </div>
                                 </fieldset>
                                 </div>
								  
								 </form>
								 <form method="post" action="" enctype="multipart/form-data"  name="frmers" id="frmers">
                                <div class="bulk_members">
										<h4 class='header_title'>Create Bulk Group</h4>
										 <input type='hidden' name='Invitees_bulk' id='select_id' value="1" required>
										<div class='widgetDescriptionRow clearfix'>
										
											<fieldset class='col-sm-6 form-group clear-both '>
											 <a href="uploads/groups.xls" download><div class="sampleXL">
												 <img src="images/Groups.PNG"/>
												<p>Sample XLS sheet</p>
											</div></a>
												<label><span class='requiredFiled'>*</span>Upload Bulk Groups</label>
												<input type="file"  class="form-control-file" name="bulkupload"  aria-describedby="fileHelp" required>
												<div class='discriptionErrorMsg'>
												 <span id='addr2Error_div' class='note_message'>Upload sample XLS sheet format Only..........</span>
												</div>
											</fieldset>	

										</div>
										<fieldset class='col-sm-12 form-group pull-right'>
                                    <div class='widgetSearchButton no-search-criteria pull-right'>	
                                       <input name="submit1" type="submit" value="Submit" id="submit1" class='btn btn-info cust-bttn submit'/>
                                    </div>
                                 </fieldset>
								 
								</div>			
									</form>
                                 
								 <div class='widgetDescriptionRow clearfix newbody'>
								   <div class='popup searchpopups' id="myModal">
									  <div class='popupremove'>
										 <span class='fa fa-remove close1' onclick='closePopup()'></span>
									  </div>
									  <div class=' popup-search-container'>
										 <div class='row rowfluidalignment'>
											<div class='col-sm-12'>
											   <div class='col-sm-12 widgetDescriptionForm'>
												  <div class='row'>
													 <div class='widgetDescriptionRow'>
														<h1 class='popup_text'> Members Created Sucessfully</h1>
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
								</div>
								   <div class='widgetDescriptionRow clearfix newbody'>
									   <div class='popup searchpopups new' id="myModal2">
										  <div class='popupremove'>
											 <span class='fa fa-remove close1' onclick='closePopup()'></span>
										  </div>
										  <div class=' popup-search-container'>
											 <div class='row rowfluidalignment'>
												<div class='col-sm-12'>
												   <div class='col-sm-12 widgetDescriptionForm'>
													  <div class='row'>
														 <div class='widgetDescriptionRow'>
															<h1 class='popup_text'> Members Creation Failed</h1>
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
									</div>
                                 <label id="hff">
                                 
                                 </label>
                              </form>
								
                           </div>
                        </div>
                        <!-- table End -->
                     </div>
                     <!--/form-->
                     <!-- Page Form End -->
                  </div>
               </div>
            </div>
            <!-- Content Block End --> 
         </div>
      </article>
	  <script>
		//Add Input Fields
		$(document).ready(function() {
			$("#select_id").on("click",function(){
				$(".manually_members").show();
				$(".bulk_members").hide();
				$(".bulk_submit").hide();
				$(".manual_submit").show();
			})
			$("#bulk_id").on("click",function(){
				$(".bulk_members").show();
				$(".bulk_submit").show();
				$(".manually_members").hide();
				$(".manual_submit").hide();
			})
		});
	</script>
	
	
	<script type="text/javascript">
    $(document).ready(function(){      
      //var postURL = "dynamics_group_members2.php";
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Group Name" class="form-control name_list" required /><div class="discriptionErrorMsg error-span-hide red-error news"></div></td><td><input type="text" name="des[]" placeholder="Group Description" class="form-control name_list" required /><div class="discriptionErrorMsg error-span-hide red-error news"></div></td><td><button type="button" name="remove" id="'+i+'" class="btn  btn_remove">X</button></td></tr>');  
      });
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
	   });	
	 </script>
	<script>
		$(document).ready(function(){    
		//alert("fmr 1");		
		$('#frmer').on('submit', function(event){
			//alert("fmr 1");
			event.preventDefault();
			
			var values = new Array();
			  $('.error_msg').each(function () {
					  if (this.value ==''){
						   values.push(1);
						   nameError = "Please Enter Details* ";
						$( this ).siblings()[0].innerHTML=  nameError;
					  }
				});	
				
				  if (values.length == 0){
					  $.ajax({ 
						url:"dynamics_group_members2.php",  
						method:"POST",  
						data:$('#frmer').serialize(),
						type:'json',
						
						success:function(data)  
							{ //alert("ffff");
								i=1;
								$('.dynamic-added').remove();
								$('#frmer')[0].reset();
										//alert('Record Inserted Successfully.');
								$('.popup').popup('show');
								$('.close1').click(function(){
								$('.popup').popup('hide');
								window.location.href = "dynamics_group_members.php";
								})
							}  
						});
				  }
				//return false;
			});
		});
	</script>
	<script>  
	 $(document).ready(function(){  
		  $('#bulkupload').change(function(){  
			   $('#frmers').submit();  
			   //alert("form 2");
		  });  
	  $('#frmers').on('submit', function(event){  
	   //alert("form 2");
		   event.preventDefault();  
		   $.ajax({  
				url:"dynamics_group_members2.php",  
				method:"POST",  
				data:new FormData(this),  
				contentType:false,  
				processData:false,  
				success:function(data){  
					 $('#result').html(data);  
					 //$('#excel_file').val('');  
					 $('.popup').popup('show');
							$('.close1').click(function(){
							$('.popup').popup('hide');
							window.location.href = "dynamics_group_members.php";
							})
				}  
		   });  
	  });  
	});  
	</script>  
   </body>
</html>
