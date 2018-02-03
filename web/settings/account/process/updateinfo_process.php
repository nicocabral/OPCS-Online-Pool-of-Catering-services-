<?php session_start();
include('../includes/mysql.php');
$getCname = mysql_real_escape_string(trim($_GET['cn']));
$getOname = mysql_real_escape_string(trim($_GET['on']));
$getEmail = mysql_real_escape_string(trim($_GET['ce']));
$getCon = mysql_real_escape_string(trim($_GET['cno']));
$getAdd = mysql_real_escape_string(trim($_GET['cad']));
//$getSid = intval($_GET['id']);
if(empty($getCname)){
	echo 'Catering name must not be empty';
	}
else if (empty($getOname)){
	echo 'Owner name must not be empty';
	}
else if (empty($getCon)){
	echo 'Contact must not be empty';
	}
else if (empty($getEmail)){
	echo 'Email must not be empty';
	}
else if (empty($getAdd)){
	echo 'Address must not be empty';
	}
else {
		$query = mysql_query("UPDATE tbl_catererinfo SET c_name = '$getCname',
														 c_owner = '$getOname',
														 c_email = '$getEmail',
														 c_contact = '$getCon',
														 c_address = '$getAdd' WHERE cid = '".$_SESSION['id']."'") or die (mysql_error());
		if($query==true){
			echo 'Profile update!';
			}else {
				echo mysql_error();
				}
	}
?>