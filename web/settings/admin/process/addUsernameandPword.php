<?php 
session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {
		include('../includes/connection.php');
		$uname = mysql_real_escape_string(trim($_POST['username']));
		$pword = mysql_real_escape_string(trim($_POST['pword']));
		$confirmpword = mysql_real_escape_string(trim($_POST['confirmpword']));
		$count = strlen($confirmpword);
		if(empty($uname)){
			echo 'Username must not be empty';
			}
		else if(empty($pword)){
			echo 'Password must not be empty';
			}
		else if(empty($confirmpword)){
			echo 'Confirm Password must not be empty';
			}
		else if($count<6){
			echo 'Password must be more than 6 character';
			}
		else if ($pword!=$confirmpword){
			echo 'Password did not match';
			}
			else {
				$sql = mysql_query("SELECT MAX(account_id) as maxId FROM tbl_wtnadmin ORDER by account_id") or die (mysql_error());
					if(mysql_num_rows($sql)>0){
						while($row = mysql_fetch_assoc($sql)){
						$maxId = intval($row['maxId']);
						$query = mysql_query("UPDATE tbl_wtnadmin SET account_username = '$uname',
																	  account_password = '$confirmpword' WHERE account_id = '$maxId'") or die (mysql_error());
						if($query == true){
							echo 'Save successfully! You can now log-in as admin';
							}
						else {
							echo mysql_error();
							}
				
				}
			}
		}
	
		
		}

?>