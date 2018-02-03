<?php  session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}
	else {
		include('../includes/connection.php');
		$getID = intval($_GET['id']);
		$sqlquery=mysql_query("DELETE FROM tbl_catererinfo WHERE cid = '$getID'") or die (mysql_error());
		if($sqlquery==true){
			echo 'Deleted Successfully!';
			}
			else {
				echo mysql_error();}
		
		}
	
	
	
	?>