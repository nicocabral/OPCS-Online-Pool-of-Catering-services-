<?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {
		include('../includes/connection.php');
		$getId = intval($_GET['id']);
		$pword = mysql_real_escape_string(trim($_GET['newPassword']));
		$confirmPword = mysql_real_escape_string(trim($_GET['confirmPassword']));
		$count = strlen($confirmPword);
		if($pword == ""){
			echo 'Password field must not be empty';
			}
		else if($confirmPword == ""){
			echo 'Confirm Password Field must not be empty!';
			}
		else if($count<6){
			echo 'Password must be more than 6 character';
			}
			else {
				$sqlquery = mysql_query("UPDATE tbl_wtnadmin SET account_password = '$confirmPword' WHERE account_id = '$getId'") or die (mysql_error());
				if($sqlquery==true){
					echo 'Password Updated successfully!';}
					else {
						echo mysql_error();}
								}
	}
	?>