<?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {
		include('../includes/connection.php');
			$uname = mysql_real_escape_string(trim($_POST['uname']));
			$pword = mysql_real_escape_string(trim($_POST['pword']));
			$confirmpword = mysql_real_escape_string(trim($_POST['confirmpword']));
			$id = intval($_SESSION['adminID']);
			$count = strlen($confirmpword);
			if($count<6){
					echo 'Password must be more than 6 character';
				}
			else if ($pword != $confirmpword){
				echo 'Password did not match';}
			else {
				
				$query = mysql_query("UPDATE tbl_wtnadmin SET account_username = '$uname',
															  account_password = '$confirmpword' WHERE account_id = '$id'") or die (mysql_error());
				if($query==true){
					echo 'Updated Successfully!';
					}
					else {
						echo mysql_error();}
				}
		}?>