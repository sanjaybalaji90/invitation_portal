<?php
	include('Config.php');
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$l = strval($_GET['k']);
	$username1 = $_SESSION['user'];
	$_SESSION['varname'] = $l;
	$var_value = $_SESSION['varname'];
	$sqlQuery = " SELECT  name,invitation_members,date,time,alone,spouse,childs,others,total,Event_Id,status FROM invitations_response_table Group By Event_ID ORDER BY Event_Id DESC";
	$results = mysqli_query($db, $sqlQuery);
	$results11 = mysqli_query($db, $sqlQuery);
	$row11 = $results11->fetch_assoc();
	$sqlQuery1="SELECT name,invitation_members,alone,spouse,childs,others,total,status FROM invitations_response_table where Event_Id=".$row11['Event_Id'];
	$results1 = mysqli_query($db, $sqlQuery1);
	$results_failed ="SELECT invitation_members FROM invitations_request_table where status =0 and Event_Id=".$var_value;
	$results_failed_all = mysqli_query($db, $results_failed);
	$results_failed_count = mysqli_num_rows($results_failed_all);
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
		<script src="jspdf.plugin.autotable.min.js"></script>
		<script src='https://cdn.rawgit.com/simonbengtsson/jsPDF/requirejs-fix-dist/dist/jspdf.debug.js'> </script>
		<script src='https://unpkg.com/jspdf-autotable@2.3.2'></script> 
		<script>
			function showUser(str)
			{
				var s=str;
				window.location.href= 'pagination.php?k='+s;
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
										<td class='profile-text'>Welcome <?php echo "$username1"; ?> <a href='logout.php'><span class='profile-text'></span>| Logout</a></td>
										<td align='profile-text'></td>
									</tr></tbody>
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
                           		<form id='eventDetails' action='' method='post'>
                              		<div class='col-sm-12 widgetDescriptionForm'>
                                 		<div class='row'>
											<h4 class='inv_list_resend'><a class="header_title" href="Resend_invitation.php?id=<?php echo strval($_GET['k'])?>">Click Resend Invitation</a></h4>
											<fieldset class='col-sm-3 form-group'>
												<h4 class='header_title'>Invitation List</h4>
												<form>
													<?php
													echo "<select id='sel2'  onchange='showUser(this.value)'>";
														echo "<option value=''>Select Event</option>";
															while ($row = $results->fetch_assoc()) 
															{
																$invitation_name = $row['name'];
																$event_date = $row['date'];
																$Event_Id = $row['Event_Id'];
																$time = date('h:i A', strtotime($row['time']));
																?>
																<option value="<?php echo $Event_Id?>" <?=$Event_Id == $var_value ? 'selected="selected"' : '';?>><?php echo $invitation_name.'_'.$event_date.'_'.$time?></option>';
																<?php
															}
													echo "</select>";
													?>
												</form>
												<div class='discriptionErrorMsg'>
													<span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
												</div>
                                       		</fieldset>
										</div>
										<div id="results"></div>
                                 		<!-- table End -->
                              		</div>							 
                           		</form>
								<!-- Page Form End -->
                        	</div>
					 	</div>
					 	<button onclick="exportTableToExcel('testingall', 'Invitation_list')">Excel</button>
						 <button id="pdfbutton" onclick="generate()" >PDF</button>
						 <?php 
						if(!empty($results_failed_count)){
							?>
						<button id="pdfbutton" onclick="failedlist()" >Failed list PDF</button>
						<?php
						}
						?>
						 
                  	</div>
                  <!-- Content Block End -->    
				</div>
			</div>
		</article>
	</body>
</html>

<script type="text/javascript">
	function showRecords(perPageCount, pageNumber,str) {
		var data = {
				'pageNumber': pageNumber,
				'perPageCount': perPageCount
				
			}
		$.ajax({
			type: "GET",
			url: "getPaginationData.php?k="+str,
			data: data,
			//data: "pageNumber=" + pageNumber,
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
	function showpagination(perPageCount) {
    $.ajax({
        type: "GET",
        url: "getsearchresult.php",
        data: "pageNumber=" + perPageCount,
        cache: false,
        beforeSend: function() {
            $('#loader').html(
                '<img src="images/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">'
                );
        },
        success: function(html) {
			console.log(html);
            $("#results").html('');
            $("#results").html(html);
            $('#loader').html('');
        }
    });
}
	function exportTableToExcel(tableID, filename = '') {
		var downloadLink;
		var dataType = 'application/vnd.ms-excel';
		var tableSelect = document.getElementById(tableID);
		var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

		// Specify file name
		filename = filename?filename+'.xls':'excel_data.xls';

		// Create download link element
		downloadLink = document.createElement("a");

		document.body.appendChild(downloadLink);

		if(navigator.msSaveOrOpenBlob){
			var blob = new Blob(['\ufeff', tableHTML], {
				type: dataType
			});
			navigator.msSaveOrOpenBlob( blob, filename);
		}else{
			// Create a link to the file
			downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

			// Setting the file name
			downloadLink.download = filename;
			
			//triggering the function
			downloadLink.click();
		}
	}
	//export data in pdf
	function generate() {
		var doc = new jsPDF('p', 'pt');
		var res = doc.autoTableHtmlToJson(document.getElementById("testingall"));
		doc.autoTable(res.columns, res.data, {margin: {top: 80}});
		var header = function(data) {
		doc.setFontSize(18);
		doc.setTextColor(40);
		doc.setFontStyle('normal');
		//doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 50, 50);
		doc.text("Invitees Detail", data.settings.margin.left, 50);
		};
		var options = {
		beforePageContent: header,
		margin: {
			top: 80
		},
		startY: doc.autoTableEndPosY() + 20
		};
		doc.save("table.pdf");
	}
	//export data to excel end
	function failedlist() {
			var doc = new jsPDF('p', 'pt');
			var res = doc.autoTableHtmlToJson(document.getElementById("failedlist"));
			doc.autoTable(res.columns, res.data, {margin: {top: 80}});
			var header = function(data) {
			doc.setFontSize(18);
			doc.setTextColor(40);
			doc.setFontStyle('normal');
			//doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 50, 50);
			doc.text("Invitees Detail", data.settings.margin.left, 50);
			};
			var options = {
			beforePageContent: header,
			margin: {
				top: 80
			},
			startY: doc.autoTableEndPosY() + 20
			};
			doc.save("failedlist.pdf");
		}

		$(document).ready(function() {
				showRecords(5, 1);
		});
</script>
