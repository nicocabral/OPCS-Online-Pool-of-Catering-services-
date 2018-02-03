<?php 
session_start();
include('../includes/mysql.php');
$username = mysql_real_escape_string($_GET['uname']);
$getPass = mysql_real_escape_string(trim($_GET['pword']));
$countpass = strlen($getPass);
if (empty($getPass)){
	echo 'New password must not be empty';
	}
else if($countpass<6){
	echo 'Password must atleast more than 6 character';
	}
else {
	$query = mysql_query("SELECT * FROM tbl_usernameandpassword WHERE username  = '$username' AND catid <>'".$_SESSION['id']."'") or die (mysql_error());
	if(mysql_num_rows($query)>0){
		echo 'Username already taken please try another';
		}
		else {
			$sqlquery = mysql_query("UPDATE tbl_usernameandpassword SET username = '$username',
																	    password = '$getPass' WHERE catID = '".$_SESSION['id']."'") or die (mysql_error());
			if($sqlquery ==true){
				echo 'Username and Password changed';
				}
				else {
					echo mysql_error();}}
	}
?>
