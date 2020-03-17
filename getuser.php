<?php
	include('Config.php');
	error_reporting(E_ERROR | E_PARSE);
	// Create connection
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	$q = strval($_GET['q']);
	//$conn = new mysqli($servername, $username, $password, $dbname);
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	} 
	
	$targetpage = "Invitation_list.php";   //your file name  (the name of this file)
    $limit = 50;                                //how many items to show per page
    $page = $_GET['page'];
    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0; 
	
	$sql = "SELECT * FROM invitations_response_table WHERE Event_Id = '".$q."' LIMIT $start, $limit";
	
	$result = $db->query($sql);
	$get_total_rows = mysqli_fetch_array($sql); //total records
	$count = $db->query($get_total_rows);

	
//echo "<script>javascript: alert('test msgbox')></script>";
	//$conn->close();
			/* $row = mysqli_fetch_array($result);  
			$eventname = $row[name];  
				echo "<h3 style=\"color: #f90;padding: 10px 0;font-size: 20px;\">" .$eventname ."</h3>"; */
	echo"<div class=\" test\">"	;	
	echo "<table class='table table-bordered'  >
	<tr>
	<th style=\"background:#2196f3;height:34px;color:white;font-size:17px;\">Attendess</th>
	<th style=\"background:#2196f3;height:34px;color:white;font-size:17px;\">Status</th>
	<th style=\"background:#2196f3;height:34px;color:white;font-size:17px;\">Invites</th>

	</tr>";


while($row = mysqli_fetch_array($result))
  {
	  $eventname= $row['name'];
	  	
	  echo "<tr >";
	   echo "<td> <p style='font-size:15px;'>" . $row['invitation_members'] ."</p></td>";
	   //echo "<td>" . $row['person_status'] . "</td>";
			$acpt = $row['status'];
			$invitees = $row['members'];
			$adults_list = $row['adults_list'];
			$childs_list = $row['childs_list'];
			
			$pend = "Pending";
			$rej = "Rejected";
		  if( $acpt == 'Accepted' ) {
			echo "<td><p style='color:green;font-size:15px;'>".$acpt."</p></td>";
			echo "<td><p style='font-size:15px;'>".$adults_list."".$childs_list."</p></td>";
			}else if ( $acpt == '' ){
			echo "<td ><p style='color:red;font-size:15px;'>".$pend."</p></td>";
			echo "<td ><p style='font-size:15px;'>".$invitees."</p></td>";
			} 
			else {
			echo "<td ><p style='color:red;font-size:15px;'>".$rej."</p></td>";
			echo "<td ><p style='font-size:15px;'>".$adults_list."".$childs_list."</p></td>";
			} 
	  echo "</tr>";
  }
  
	echo "</table>";
	 echo "</div>";
	 
	$sqll = "SELECT * FROM invitations_response_table WHERE Event_Id = '".$q."'";
	$result = $db->query($sqll);
	$qty= 0;
	while ($num = mysqli_fetch_assoc ($result)) {
		$adults += $num['adults_no'];
		$childs += $num['childs_no'];
		$qty += $num['total'];
	}
	echo "<br><div style=margin-left:20px>";
	echo "<b>Adults - $adults </b><br>";
	echo "<b>Childs - $childs <b><br>";
	echo "Total - $qty <b>";
	 echo "</div>";
	mysqli_close($db);
	?>