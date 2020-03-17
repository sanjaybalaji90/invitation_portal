<?php
	session_start();
	include('Config.php');
	if (! (isset($_GET['pageNumber']))) {
		$pageNumber = 1;
	} else {
		$pageNumber = $_GET['pageNumber'];
	}
	$perPageCount = $_GET['perPageCount'];
	$sqlQuery_member = " SELECT * FROM members_table order by Id desc";
    if ($result1= mysqli_query($db, $sqlQuery_member)) {
	   $rowCount = mysqli_num_rows($result1);
	   mysqli_free_result($result1);
   }
   $pagesCount = ceil($rowCount / $perPageCount);
   $lowerLimit = ($pageNumber - 1) * $perPageCount;
   $sqlQuery = " SELECT * FROM members_table ORDER BY id DESC limit " . ($lowerLimit) . " ,  " . ($perPageCount) . "   ";
   $result_member = mysqli_query($db, $sqlQuery);
?>
<div class="row rowfluidalignment">
    <div class="col-sm-12">
   		<!-- Page Form Start -->
        <?php
			echo "<table class=\"user_history_table\">
				<tr>
					<th>Name</th>
					<th>Email Id</th>
					<th>Groupname</th>
					<th>Action</th>
				</tr>";
				while($row = mysqli_fetch_array($result_member))
				{
					echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['emailId'] . "</td>";
						echo "<td>" . $row['groupname'] . "</td>";
						echo "<td> <a href=dynamics_edit_members.php?id=".$row['Id'].">Edit</td>";
					echo "</tr>";
				}
			echo "</table>";
			?>
        <!-- Page Form End -->
    </div>
</div>
<table width="50%" align="center">
    <tr>
        <td align="right" valign="top" style="text-align: left;" class="page_num">
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
					<a href="javascript:void(0);" class="pages" onclick="showRecords('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
					<?php
				} // endIf
			} // endFor
			?>
        </td>
    </tr>
</table>
</script>