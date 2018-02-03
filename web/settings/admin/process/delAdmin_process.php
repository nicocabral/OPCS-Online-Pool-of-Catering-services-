<?php 
 session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {
		include('../includes/connection.php');
		$getId = intval($_GET['id']);
		$query = mysql_query("DELETE FROM tbl_wtnadmin WHERE account_id = '$getId'") or die (mysql_error());
		$sqlquery = mysql_query("DELETE FROM tbl_wtnadminavatar WHERE account_id = '$getId'") or die (mysql_error());
		if($query == true && $sqlquery == true){
			echo 'Deleted Successfully!';
			}
			else {
				echo mysql_error();}
		
		}
?>