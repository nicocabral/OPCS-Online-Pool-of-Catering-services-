<?php @session_start();
include('includes/mysql.php');
$totalcount = "";
$query = mysql_query("SELECT COUNT(*) as total FROM tbl_orders WHERE catererid = '".$_SESSION['id']."' AND order_status = 'New'") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($row = mysql_fetch_assoc($query)){
		if($row['total'] ==0){
			echo '';
		}else {
		echo 'You have '.$row['total'].' new order';
		}
	}
}


 
 ?>