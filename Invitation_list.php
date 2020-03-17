<?php 
	session_start();
	include('Config.php');
	error_reporting(E_ERROR | E_PARSE);
	include 'dynamics_group_members2.php';
	$sqlQuery = " SELECT DISTINCT name,date,time,Event_Id FROM invitations_response_table Group By Event_ID ORDER BY Event_Id DESC ";
	$results = mysqli_query($db, $sqlQuery);
	$results11 = mysqli_query($db, $sqlQuery);
	$row11 = $results11->fetch_assoc();
	$rejected_count=0;
	if (! (isset($_GET['pageNumber']))) {
		$pageNumber = 1;
	} else {
		$pageNumber = $_GET['pageNumber'];
	}
	$var_value = $row11['Event_Id'];
	$_SESSION['varname']=$var_value;
	$perPageCount = 5;
	$sql = "SELECT * FROM invitations_response_table  WHERE Event_Id='$var_value'";
	if ($result = mysqli_query($db, $sql)) {
		$rowCount = mysqli_num_rows($result);
		mysqli_free_result($result);
	}
	$pagesCount = ceil($rowCount / $perPageCount);
	$sqlQuery1="SELECT name,invitation_members,alone,spouse,childs,others,total,status FROM invitations_response_table where Event_Id=".$row11['Event_Id']." limit ".$perPageCount;
	$sqlQuery_all="SELECT name,invitation_members,alone,spouse,childs,others,total,status FROM invitations_response_table where Event_Id=".$row11['Event_Id'];
	$results_failed ="SELECT invitation_members FROM invitations_request_table where status =0 and Event_Id=".$row11['Event_Id'];
	$results1 = mysqli_query($db, $sqlQuery1);
	$results_all = mysqli_query($db, $sqlQuery_all);
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
		<script type="text/javascript" src="libs/jsPDF/jspdf.min.js"></script>
		<script type="text/javascript" src="libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
		<script type="text/javascript" src="libs/FileSaver/FileSaver.min.js"></script>
		<script type="text/javascript" src="tableExport.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
		<script src="jspdf.plugin.autotable.min.js"></script>
		<script src='https://cdn.rawgit.com/simonbengtsson/jsPDF/requirejs-fix-dist/dist/jspdf.debug.js'> </script>
		<script src='https://unpkg.com/jspdf-autotable@2.3.2'></script>
		<script>
			function showUser(str) {
				var s = str;
				//alert(str);
				window.location.href = 'pagination.php?k=' + s;
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
                                        <td class='profile-text'>Welcome <?php echo "$username1"; ?> <a
                                                href='logout.php'><span class='profile-text'></span>| Logout</a></td>
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
                    </div>
                </a>
                <a href='Invitation_list.php'>
                    <div class='tab-header-container active'>
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
                <?php 
					if($_SESSION['role']=='0'){
						?>
                <a href='manage_admin.php'>
                    <div class='tab-header-container '>
                        Manage admin
                    </div>
                </a>
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
                                        <?php 
											if(isset($row11['Event_Id'])){
														?>
												<h4 class='inv_list_resend'><a class="header_title"
														href="Resend_invitation.php?id=<?php echo $row11['Event_Id']?>">Click
														Resend Invitation</a></h4>
												<?php
											}
										?>
										<fieldset class='col-sm-3 form-group'>
                                            <h4 class='header_title'>Invitation List</h4>
                                            <form>
                                                <?php
													echo "<select id='sel2'  onchange='showUser(this.value)'>";
														// echo "<option value=''>Select Event</option>";
														while ($row = $results->fetch_assoc()) 
														{
														$invitation_name = $row['name'];
														$event_date = $row['date'];
														$Event_Id = $row['Event_Id'];
														$time = date('h:i A', strtotime($row['time']));
														echo '<option value="'.$Event_Id.'">'.$invitation_name.'_'.$event_date.'_'.$time.'</option>';
													}
													echo "</select>";
													?>
                                            </form>
                                            <div class='discriptionErrorMsg'>
                                                <span id='eventNameDiv' class='red-color-error'>&nbsp;</span>
                                            </div>
                                        </fieldset>
                                        <div class='col-sm-12'>
                                            <div id='txtHint'></div>
                                        </div>
                                    </div>
                                    <div id="full">
                                        <table class="table table-hover table-responsive resp_table" id="testingall" style="display:none">
                                            <tr>
                                                <!-- <th align="center">Invitation Name</th> -->
                                                <th align="center" class="inv_list_th_width">Invitees</th></br>
                                                <th align="center">Alone<br></th>
                                                <th align="center">With Spouse<br></th>
                                                <th align="center">Children<br></th>
                                                <!-- <th align="center">Others<br></th> -->
                                                <th align="center">Total<br></th>
                                                <th align="center">Status<br></th>
                                            </tr>
                                            <?php 
												$tot_count=0;
												$rejected_count =0;
												$accepted_count =0;
												$pending_count =0;
												foreach ($results_all as $data) { 
													if($data['alone']=='alone') {
														$data['alone']=1;
														$data['spouse']=0;
													} elseif($data['alone']=='with spouse'){
														$data['alone']=0;
														$data['spouse']=2;
													}
													if($data['status']=='Rejected'){
														$rejected_count +=1;
													} elseif($data['status']=='Accepted') {
														$accepted_count +=1;
													} else {
														$data['status']='Pending';
														$pending_count+=1;
													}
													$tot_count+=$data['total'];
													?>
													<tr>
														<!-- <td align="left"><?php echo $data['name'] ?></td> -->
														<td align="left" style="display:flex;">
															<?php echo $data['invitation_members'] ?></td>
														<td id='alone' align="left"><?php echo $data['alone'] ?></td>
														<td align="left"><?php echo $data['spouse'] ?></td>
														<td align="left"><?php echo $data['childs'] ?></td>
														<!-- <td align="left">< ?php echo $data['others'] ?></td> -->
														<td align="left"><?php echo $data['total'] ?></td>
														<td align="left"><?php echo $data['status'] ?></td>
													</tr>
													<?php
												}
												?>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Grand total Members:<?php echo $tot_count; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Pending:<?php echo $pending_count; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Accepted:<?php echo $accepted_count; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Rejected:<?php echo $rejected_count; ?></td>
                                            </tr>

                                        </table>
                                        <table class="table table-hover table-responsive resp_table" id="failedlist" style="display:none">
                                            <tr>
                                                <th align="center">Email<br></th>
                                            </tr>
                                            <?php 
											foreach ($results_failed_all as $data) { 
													?>
												<tr>
													<td align="left"><?php echo $data['invitation_members'] ?></td>
												</tr>
												<?php
											}
												?>
                                        </table>
                                        <table class="table table-hover table-responsive resp_table" id="testing">
                                            <tr>
                                                <!-- <th align="center">Invitation Name</th> -->
                                                <th align="center" class="inv_list_th_width">Invitees</th></br>
                                                <th align="center">Alone<br></th>
                                                <th align="center">With Spouse<br></th>
                                                <th align="center">Children<br></th>
                                                <!-- <th align="center">Others<br></th> -->
                                                <th align="center">Total<br></th>
                                                <th align="center">Status<br></th>
                                            </tr>
                                            <?php 
												//$tot_count=0;
												// $rejected_count =0;
												// $accepted_count =0;
												// $pending_count =0;
												foreach ($results1 as $data) { 
													if($data['alone']=='alone') {
														$data['alone']=1;
														$data['spouse']=0;
													} elseif($data['alone']=='with spouse'){
														$data['alone']=0;
														$data['spouse']=2;
													}
													if($data['status']=='Rejected'){
														//$rejected_count +=1;
														$data['status']='<p style="color:red;">Rejected</p>';
													} elseif($data['status']=='Accepted') {
														//$accepted_count +=1;
														$data['status']='<p style="color:green;">Accepted</p>';
													} else {
														$data['status']='<p style="color:orange;">Pending</p>';		
														//$pending_count+=1;
													}
													//$tot_count+=$data['total'];
													?>
													<tr>
														<!-- <td align="left"><?php echo $data['name'] ?></td> -->
														<td align="left" style="display:flex;">
															<?php echo $data['invitation_members'] ?></td>
														<td id='alone' align="left"><?php echo $data['alone'] ?></td>
														<td align="left"><?php echo $data['spouse'] ?></td>
														<td align="left"><?php echo $data['childs'] ?></td>
														<!-- <td align="left">< ?php echo $data['others'] ?></td> -->
														<td align="left"><?php echo $data['total'] ?></td>
														<td align="left"><?php echo $data['status'] ?></td>
													</tr>
													<?php
												}
													echo "Grand total Members:".$tot_count;
													echo "<br>";
													echo "Pending    :".$pending_count;
													echo "<br>";
													echo "Accepted   :".$accepted_count;
													echo "<br>";
													echo "Rejected   :".$rejected_count;
													?>
                                        </table>
                                        <table width="50%" align="center">
                                            <tr>
                                                <td align="right" valign="top" style="text-align: left;"
                                                    class="page_num">
                                                    Page <?php echo $pageNumber; ?> of <?php echo $pagesCount; ?>
                                                </td>
                                                <td>
                                                    <select id='perpage' style="width: 75%;"
                                                        onchange='showpagination(this.value)'>
                                                        <option value=''>Select per page</option>
                                                        <option value='5'>5</option>
                                                        <option value='10'>10</option>
                                                        <option value='15'>15</option>
                                                    </select>
                                                </td>
                                                <td valign="top" align="center" style="float: right;">
                                                    <?php
														for ($i = 1; $i <= $pagesCount; $i++) {
															if ($i == $pageNumber) {
																?>
                                                    <a href="javascript:void(0);" class="current"><?php echo $i ?></a>
                                                    <?php
															} else {
																?>
                                                    <a href="javascript:void(0);" class="pages"
                                                        onclick="showRecords('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
                                                    <?php
															} // endIf
														} // endFor
														?>
                                                </td>
											</tr>
                                        </table>
									</div>
                                    <button onclick="exportTableToExcel('testingall', 'Invitation_list')">Excel</button>
                                    <button id="pdfbutton" onclick="generate()">PDF</button>
                                    <?php 
										if(!empty($results_failed_count)){
											?>
                                    		<button id="pdfbutton" onclick="failedlist()">Failed list PDF</button>
                                    		<?php
										}
									?>
									<!-- table End -->
                                </div>
                            </form>
                            <!-- Page Form End -->
                        </div>
                    </div>
                </div>
                <!-- Content Block End -->
            </div>
        </div>
    </article>
</body>
	<script type="text/javascript">
	function showRecords(perPageCount, pageNumber, str) {
		var data = {
			'pageNumber': pageNumber,
			'perPageCount': perPageCount

		}
		$.ajax({
			type: "GET",
			url: "getPaginationData.php?k=" + str,
			data: data,
			//data: "pageNumber=" + pageNumber,"perPageCount=" + perPageCount,
			cache: false,
			beforeSend: function() {
				$('#loader').html(
					'<img src="images/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">'
				);
			},
			success: function(html) {
				$("#full").html('');
				$("#full").html(html);
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
				$("#full").html('');
				$("#full").html(html);
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
		filename = filename ? filename + '.xls' : 'excel_data.xls';

		// Create download link element
		downloadLink = document.createElement("a");

		document.body.appendChild(downloadLink);

		if (navigator.msSaveOrOpenBlob) {
			var blob = new Blob(['\ufeff', tableHTML], {
				type: dataType
			});
			navigator.msSaveOrOpenBlob(blob, filename);
		} else {
			// Create a link to the file
			downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

			// Setting the file name
			downloadLink.download = filename;

			//triggering the function
			downloadLink.click();
		}
	}
	//export data to excel end
	function generate() {
		var doc = new jsPDF('p', 'pt');
		var res = doc.autoTableHtmlToJson(document.getElementById("testingall"));
		doc.autoTable(res.columns, res.data, {
			margin: {
				top: 80
			}
		});
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
		doc.autoTable(res.columns, res.data, {
			margin: {
				top: 80
			}
		});
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
	</script>

</html>