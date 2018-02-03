<?php @session_start();
include('includes/mysql.php');
$totalcount = "";
$query = mysql_query("SELECT COUNT(*) as total FROM tbl_reservation WHERE catererid = '".$_SESSION['id']."' AND res_status = 'New'") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($row = mysql_fetch_assoc($query)){
		$totalcount = $totalcount+$row['total'];
		//second query
		$query1 = mysql_query("SELECT COUNT(*) as totalres FROM tbl_customereservation WHERE res_mycatid = '".$_SESSION['id']."' AND res_status = 'New'") or die (mysql_error());
if(mysql_num_rows($query1)>0){
	while($rows = mysql_fetch_assoc($query1)){
		$totalcount = $totalcount + $rows['totalres'];
		if($totalcount == 0){
			echo '';
		}else {
		echo 'You have '.$totalcount.' new reservation';}
	}
}
	}
}
 
 ?>