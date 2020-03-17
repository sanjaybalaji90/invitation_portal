<?php
	session_start();
	include('Config.php');
	if (! (isset($_GET['pageNumber']))) {
		$pageNumber = 1;
	} else {
		$pageNumber = $_GET['pageNumber'];
	}
	$perPageCount = $_GET['perPageCount'];
	$var_value = $_SESSION['varname'];
	//$perPageCount = 5;
	$sql = "SELECT * FROM invitations_response_table  WHERE Event_Id='$var_value' and 1";
	if ($result = mysqli_query($db, $sql)) {
		$rowCount = mysqli_num_rows($result);
		mysqli_free_result($result);
	}
	$pagesCount = ceil($rowCount / $perPageCount);
	$lowerLimit = ($pageNumber - 1) * $perPageCount;
	$sqlQuery = " SELECT * FROM invitations_response_table WHERE Event_Id='$var_value' and 1 limit " . ($lowerLimit) . " ,  " . ($perPageCount) . "   ";
	//echo $sqlQuery;
	$results = mysqli_query($db, $sqlQuery);
	$sqlQuery_all = " SELECT * FROM invitations_response_table WHERE Event_Id='$var_value'";
	$results_all = mysqli_query($db, $sqlQuery_all);
	$results_failed ="SELECT invitation_members FROM invitations_request_table where status =0 and Event_Id=".$var_value;
	$results_failed_all = mysqli_query($db, $results_failed);
	$results_failed_count = mysqli_num_rows($results_failed_all);
?>
<table class="table table-hover table-responsive resp_table" id="testingall" style="display:none">
    <tr>
        <!-- sushma -->
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
				<td align="left" style="display:flex;"><?php echo $data['invitation_members'] ?></td>
				<td align="left"><?php echo $data['alone'] ?></td>
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
			<td align="left">Grand total:<?php echo $tot_count; ?></td>
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
        <!-- sushma -->
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
		// $tot_count=0;
		// $rejected_count =0;
		// $accepted_count =0;
		// $pending_count =0;
		foreach ($results as $data) {
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
				<td align="left" style="display:flex;"><?php echo $data['invitation_members'] ?></td>
				<td align="left"><?php echo $data['alone'] ?></td>
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
			echo "Pending:".$pending_count;
			echo "<br>";
			echo "Accepted:".$accepted_count;
			echo "<br>";
			echo "Rejected:".$rejected_count;
		?>
</table>
<table width="50%" align="center">
    <tr>
        <td align="right" valign="top" style="text-align: left;" class="page_num">
            Page <?php echo $pageNumber; ?> of <?php echo $pagesCount; ?>
        </td>
        <td>
            <select id='perpage' style="width: 75%;" onchange='showpagination(this.value)'>
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

<script>
/* 	  var r = $("#testing #row2").text();
		alert(r); */
</script>