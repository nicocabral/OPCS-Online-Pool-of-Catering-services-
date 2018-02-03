<?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {
		include('../includes/connection.php');
		$id = intval($_GET['id']);
		$query = mysql_query("DELETE FROM tbl_townloc WHERE townid = '$id'") or die (mysql_error());
		if($query ==true){
			echo 'Deleted Successfully!';}
			else {
				echo mysql_error();}}
	
	?>