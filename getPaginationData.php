<?php
	session_start();
	include('Config.php');

	if (! (isset($_GET['pageNumber']))) {
		$pageNumber = 1;
	} else {
		$pageNumber = $_GET['pageNumber'];
	}
	$var_value = $_SESSION['varname'];
	$perPageCount = 5;

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
?>
	<table class="table table-hover table-responsive resp_table" id="testing">
		<tr>
			<th align="center" class="inv_list_th_width">Invitation Name</th>
			<th align="center">Invitees</th>
			<th align="center">Satus<br></th>
		</tr>
		<?php foreach ($results as $data) { ?>
		<tr>
			<td align="left" style="display:flex;"><?php echo $data['name'] ?></td>
			<td align="left"><?php echo $data['invitation_members'] ?></td>
			<td align="left"><?php echo $data['status'] ?></td>
		</tr>
		<?php
		}
		?>
	</table>

	<table width="50%" align="center">
		<tr>
			<td align="right" valign="top" style="text-align: left;" class="page_num">
				 Page <?php echo $pageNumber; ?> of <?php echo $pagesCount; ?>
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