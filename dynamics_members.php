<?Php
 include 'dynamic_members2.php';
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
		
<script language="javascript" type="text/javascript">
var i=1;
function addRow()
{
      var tbl = document.getElementById('dynamic_field');
      var lastRow = tbl.rows.length;
      //var iteration = lastRow - 1;
      var row = tbl.insertRow(lastRow);
	  var lastRows =lastRow+1;
	  
	  //alert(lastRow);
	  var lf=document.createElement('div');
	  lf.className  = 'divs';
	  row.appendChild(lf);
	  var label = document.createElement('label');
	  var tn = document.createTextNode("Member");
	  label.className  = 'font3';
	  label.appendChild(tn); 
	  row.appendChild(label);
	  
	  var label = document.createElement('label');
	  var re = document.createTextNode(lastRows);
	  label.className  = 'font4';
		label.appendChild(re); 
	  row.appendChild(label);
	  
	  var firstCell = row.insertCell(0);
	  var selectList = tbl.rows[0].querySelector('select');
	  var element2 = document.createElement("select");
	  firstCell.className  = 'mem_table_td_sal';
	  var element2 = selectList.cloneNode(true);
	  element2.id = 'selected-item'+lastRow;
	  firstCell.appendChild(element2);

      var secondCell = row.insertCell(1);
      var el2 = document.createElement('input');
      el2.type = 'text';
	  secondCell.className  = 'mem_table_td_name ';
      el2.name = 'name_' + i;
      el2.className = 'error_msg';
      el2.placeholder ="Name";
      el2.id = 'name_' + i;
      el2.size = 100;
      el2.maxlength = 200;
      secondCell.appendChild(el2);
	  var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.appendChild(tn); 
		secondCell.appendChild(label);
		var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.className  = 'error_messg';
		label.appendChild(tn); 
		secondCell.appendChild(label);

      var thirdCell = row.insertCell(2);
      var el3 = document.createElement('input');
      el3.type = 'text';
	  thirdCell.className  = 'mem_table_td_ph error_msg';
      el3.name = 'email_' + i;
	  el3.className = 'error_msg';
      el3.placeholder = "Email ID";
      el3.id = 'email_' + i;
      el3.size = 100;
      el3.maxlength = 200;
      thirdCell.appendChild(el3);
	  	  var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.appendChild(tn); 
		thirdCell.appendChild(label);
		var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.className  = 'error_messg';
		label.appendChild(tn); 
		thirdCell.appendChild(label);
	  
	  var fourthCell = row.insertCell(3);
      var el4 = document.createElement('input');
      el4.type = 'text';
	  fourthCell.className  = 'mem_table_td_ph error_msg';
      el4.name = 'phone_' + i;
	  el4.className = 'error_msg';
      el4.placeholder = "Phone No.";
      el4.id = 'phone_' + i;
      el4.size = 100;
      el4.maxlength = 200;
      fourthCell.appendChild(el4);
	   var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.appendChild(tn); 
		fourthCell.appendChild(label);
		var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.className  = 'error_messg';
		label.appendChild(tn); 
		fourthCell.appendChild(label);
	 
	  var fifthCell = row.insertCell(4);
	  var selectLists = tbl.rows[0].querySelectorAll('select')[1];
	  var el5 = document.createElement("select");
	  fifthCell.className  = 'mem_table_td_group';
	  var el5 = selectLists.cloneNode(true);
	  el5.id = 'selected-item'+lastRow;
	  fifthCell.appendChild(el5);
	  
	  var sixthCell = row.insertCell(5);
      var el6 = document.createElement('input');
      el6.type = 'text';
	  sixthCell.className  = 'mem_table_td_ph mem_table_td_fat_ph error_msg';
      el6.name = 'fatherName_' + i;
	  el6.className = 'error_msg';
      el6.placeholder = "Father Name";
      el6.id = 'fatherName_' + i;
      el6.size = 100;
      el6.maxlength = 200;
      sixthCell.appendChild(el6);
	  var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.appendChild(tn); 
		sixthCell.appendChild(label);
		var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.className  = 'error_messg';
		label.appendChild(tn); 
		sixthCell.appendChild(label);
	  
	  var seventhCell = row.insertCell(6);
      var el7 = document.createElement('input');
      el7.type = 'text';
	  seventhCell.className  = 'mem_table_td_ph mem_table_td_fat_ph error_msg';
      el7.name = 'fatherNumber_' + i;
	  el7.className = 'error_msg';
      el7.placeholder = "Father No";
      el7.id = 'fatherNumber_' + i;
      el7.size = 100;
      el7.maxlength = 200;
      seventhCell.appendChild(el7);
	  var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.appendChild(tn); 
		seventhCell.appendChild(label);
		var label = document.createElement('div');
		var tn = document.createTextNode("");
		label.className  = 'error_messg';
		label.appendChild(tn); 
		seventhCell.appendChild(label);
	  
	  var eigthCell = row.insertCell(7);
      var el8 = document.createElement('input');
      el8.type = 'checkbox';
      el8.className  = 'checkmark1';
      el8.value  = "alone";
      el8.name = 'techno_' + i;
      el8.id = 'techno_' + i;
      el8.size = 20;
      el8.maxlength = 20;
      eigthCell.appendChild(el8);
	  var label = document.createElement('label');
	  var tn = document.createTextNode("Alone");
	  eigthCell.className  = 'mem_table_td_ch1';
	  label.htmlFor="techno_1";
	  label.className  = 'font2';
	  label.appendChild(tn); 
	  eigthCell.appendChild(label);
	  
		var ninthCell = row.insertCell(8);
		var el9 = document.createElement('input');
		el9.type = 'checkbox';
		el9.className  = 'checkmark1';
		el9.value  = "wife";
		el9.name = 'technos_' + i;
		el9.id = 'technos_' + i;
		el9.size = 20;
		el9.maxlength = 20;
		ninthCell.appendChild(el9);
		var label = document.createElement('label');
		var tn = document.createTextNode("Wife");
		ninthCell.className  = 'mem_table_td_ch';
		label.htmlFor="technos_1";
		label.className  = 'font2';
		label.appendChild(tn); 
		ninthCell.appendChild(label);

		var tenthCell = row.insertCell(9);
		var el10 = document.createElement('input');
		//seventhCell.className  = 'mem_table_td2';
		el10.type = 'checkbox';
		el10.className  = 'checkmark1';
		el10.value  = "childs";
		el10.name = 'technos1_' + i;
		el10.id = 'technos1_' + i;
		el10.size = 20;
		el10.maxlength = 20;
		tenthCell.appendChild(el10);
		var label = document.createElement('label');
		var tn = document.createTextNode("Childs");
		tenthCell.className  = 'mem_table_td_ch';
		label.htmlFor="technos1_1";
		label.className  = 'font2';
		label.appendChild(tn); 
		tenthCell.appendChild(label);

		var eleventhCell = row.insertCell(10);
		var el11 = document.createElement('input');
		//eleventhCell.className  = 'mem_table_td2';
		el11.type = 'checkbox';
		el11.className  = 'checkmark1';
		el11.value  = "others";
		el11.name = 'technos2_' + i;
		el11.id = 'technos2_' + i;
		el11.size = 20;
		el11.maxlength = 20;
		eleventhCell.appendChild(el11);
		var label = document.createElement('label');
		var tn = document.createTextNode("Others");
		eleventhCell.className  = 'mem_table_td_ch';
		label.htmlFor="technos2_1";
		label.className  = 'font2';
		label.appendChild(tn); 
		eleventhCell.appendChild(label);

		var twelethCell = row.insertCell(11);
		var el12 = document.createElement('input');
		el12.type = 'button';
		el12.className  = 'remove_but2';
		el12.setAttribute('type', 'button');
		el12.setAttribute('value', 'X');
		//ADD THE BUTTON's 'onclick' EVENT.
		el12.setAttribute('onclick', 'removeRow(this)');
		twelethCell.appendChild(el12);
		 //alert(i);
		  frm.h.value=i;
		   i++;
		 //alert(i);
}

// DELETE TABLE ROW.
    function removeRow(oButton) {
        var empTab = document.getElementById('dynamic_field');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex);       // BUTTON -> TD -> TR.
    }

    // EXTRACT AND SUBMIT TABLE DATA.
    function sumbit() {
        var myTab = document.getElementById('dynamic_field');
        var values = new Array();

        // LOOP THROUGH EACH ROW OF THE TABLE.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            for (c = 0; c < myTab.rows[row].cells.length; c++) {   // EACH CELL IN A ROW.

                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'text') {
                    values.push("'" + element.childNodes[0].value + "'");
                }
            }
        }
        console.log(values);
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
							<p><img src='images/logo.png' alt='Logo'  align='left'></p>
							<p class='invitation-title'><b>Invitation Portal</b></p>
						</div>
						<!--Header Logo End -->
						<!--Header Welcome Text and Logout button Start -->
						<div class='col-sm-5'>
							<div class='pull-right user-settings'>
								<table>
									<tbody><tr>
										<td class='profile-text'>Welcome  <?php echo "$username1"; ?><a href='logout.php'><span class='profile-text'></span>| Logout</a></td>
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
					<div class='tab-header-container active'>
						Create Members
					</div></a>
                  <div class='searchConteiner'>
                     <div class='row rowfluidalignment'>
                        <div class='col-sm-12'>
                           <!-- Page Form Start -->
                           <!--form id='eventDetails' action='' method='post'-->
                              <div class='col-sm-12 widgetDescriptionForm'>
                                 <div class=''>
									
									
										<h4 class='header_title'>Create Groups Members</h4>
									<div class='widgetDescriptionRow clearfix'>
									<div class="clear_both check-box col-sm-6">
										<fieldset class='col-sm-12 form-group padding0'>
											<label class='container_check paddingL35'>Select To Create Manual Group Members
												<input type='radio' name='Invitees_bulk' id='select_id' value="0" required>
												<span class='checkmark dot_check'></span>
											</label>
										</fieldset>	
										<fieldset class='col-sm-12 form-group padding0'>
											<label class='container_check paddingL35'>Select To Create Bulk Group Members
												<input type='radio' name='Invitees_bulk' id='bulk_id' value="1" required>
												<span class='checkmark dot_check'></span>
											</label>
										</fieldset>	
									    </div>
										</div>
										<form method="post" enctype="multipart/form-data" id="frm" name="frm">	
								             <div class="manually_members">
                                    <h4 class='header_title'>Create Manual Members</h4>
									<input type='hidden' name='Invitees_bulk' id='select_id' value="0" required>
                                    <div class='widgetDescriptionRow2 clearfix'>
                                          <div class="table-responsive">  
											<table id="dynamic_field" class="mem_table table table-bordered">  
												<tr>  
													<td><label class="mem_label"> 1 Member</label>
													<select name="selected_item[]" class="form-control select mar_T" style="width: 189px;">
													<option value="">Mr/Mrs/Miss</option> 
													<option value="Mr">Mr</option> 
													<option value="Mrs">Mrs</option> 
													<option value="Miss">Miss</option> 
											   </select>
													</td>  
													<td class="mar_T">
													<input class="error_msg" name="name_0" type="text" id="name_0"  maxlength="200" placeholder="Name" />
											<div class="discriptionErrorMsg error-span-hide red-error news"></div>
													</td>  
													<td class="mar_T">
											<input class="error_msg" name="email_0" type="email" id="email_0"  maxlength="200" placeholder="Email ID" />
											<div class="discriptionErrorMsg error-span-hide red-error news"></div></td>
													<td class="mar_T">
											<input class="error_msg" name="phone_0" type="number" id="phone_0"  maxlength="200" placeholder="Phone No." />
											<div class="discriptionErrorMsg error-span-hide red-error news"></div></td>
													<td class="mar_T"><?php
												echo "<select id='sel2' name='selected_group[]' style='width: 189px;'>";
													echo "<option value=''>Select Group</option>";
														while ($row = $result->fetch_assoc()) 
														{
														//unset($inv_from);
														$group_name = $row['name'];
														$group_id = $row['groupId'];

														echo '<option value="'.$group_id.'">'.$group_name.'</option>';
														}
													echo "</select>";
											?></td>
													<td>
											<input class="error_msg" name="fatherName_0" type="text" id="fatherName_0" maxlength="200" placeholder="Father Name" style="width: 189px;"/>
											<div class="discriptionErrorMsg error-span-hide red-error news"></div></td>
													<td>
											<input class="error_msg" name="fatherNumber_0" type="number" id="fatherNumber_0" maxlength="200" placeholder="Father Phone Number" />
											<div class="discriptionErrorMsg error-span-hide red-error news"></div></td>
													<td class="mem_table_td_ch" >
												<input class="checkmark1" value="alone" name="techno_0" id="techno_0" type="checkbox">
												<label for="techno_0" class="font">Alone</label>
											</td>
											<td class="mem_table_td_ch" >
												<input class="checkmark1" value="Wife" name="technos_0" id="technos_0" type="checkbox">
												<label for="technos_0" class="font">Wife</label>
											</td>
											<td class="mem_table_td_ch" >
												<input class="checkmark1" value="childs" name="technos1_0" id="technos1_0" type="checkbox">
												<label for="technos1_0" class="font">Childs</label>
											</td>
											<td class="mem_table_td_ch" >
												<input class="checkmark1" value="others" name="technos2_0" id="technos2_0" type="checkbox">
												<label for="technos2_0" class="font">Others</label>
											</td>  
												</tr>
											</table>  
											<div><input type="button" value="Add" class="dynamic_field add_fields2 btn add-bttn " onclick="addRow('dynamic_field');" />
											</div>
											<fieldset class='col-sm-12 form-group pull-right'>   
                                       <div class='widgetSearchButton no-search-criteria pull-right'>	
                                          <input name="submit" type="submit" value="Submit" id="submit" class='btn btn-info cust-bttn submit'/>
                                       </div>
									   </fieldset>
										</div>
                                    </div>
                                 </div>
								 <label>
										<input name="h" type="hidden" id="h" value="0" />
										</label>
								 </form>
								 <form method="post" enctype="multipart/form-data" id="frms" name="frms">	
									<div class="bulk_members">
									<input type='hidden' name='Invitees_bulk' id='select_id' value="1" required>
										<h4 class='header_title'>Create Bulk group Members</h4>
										<div class='widgetDescriptionRow clearfix'>
										
											<fieldset class='col-sm-6 form-group clear-both '>
											<a href="uploads/members_sample.xlsx" download> <div class="sampleXL">
												 <img src="images/members.PNG"/>
												<p>Sample XLS sheet</p>
											</div></a>
												<label><span class='requiredFiled'>*</span>Upload Bulk Members</label>
												<input type="file"  class="form-control-file" id="bulk_files" name="bulkupload"  aria-describedby="fileHelp" required  >
												<div class='discriptionErrorMsg'>
												 <span id='addr2Error_div' class='note_message'>Upload sample XlS sheet format Only..........</span>
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
										<div class='popup searchpopups' id="myModal">
									  <div class='popupremove'>
										 <span class='fa fa-remove close1' onclick=' ()'></span>
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
									  <script>
											//Add Input Fields
											$(document).ready(function() {
												$("#select_id").on("click",function(){
													$(".manually_members").show();
													$(".bulk_members").hide();
												})
												$("#bulk_id").on("click",function(){
													$(".bulk_members").show();
													$(".manually_members").hide();
												})
											})
									</script>
                                    </div>
                                 </div>
                                 <div id="sum"></div> <!--div id="result"-->  
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
			$(document).ready(function(){      
			$('#frm').on('submit', function(event){
			event.preventDefault();
			//alert("fmr 1");
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
						url:"dynamic_members2.php",  
						method:"POST",  
						data:$('#frm').serialize(),
						type:'json',
						success:function(data)  
							{ //alert("ffff");
								i=1;
								$('.dynamic-added').remove();
								$('#frm')[0].reset();
										
								$('.popup').popup('show');
								$('.close1').click(function(){
								$('.popup').popup('hide');
								window.location.href = "dynamics_members.php";
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
			   $('#frms').submit(); 
			   
		  });  
		  $('#frms').on('submit', function(event){  
			   event.preventDefault();  
			   $.ajax({  
					url:"dynamic_members2.php",  
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
								window.location.href = "dynamics_members.php";
								})
					}  
			   });  
		  });  
	 });  
	 </script>  
	</body>	
</html>

