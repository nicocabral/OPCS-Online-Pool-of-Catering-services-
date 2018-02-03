<?php session_start();
include('connection.php');
$logoutID = intval($_GET['logout']);
if(isset($logoutID)) {
		unset ($_SESSION['userid']);
		unset($_SESSION['id'] );
		unset($_SESSION['email']);
		unset($_SESSION['username']);	
		unset($_SESSION['password'] );
		unset($_SESSION['type']);
	
		session_destroy();
	header("location:../../../");
	} else {
		echo mysql_error();
	}
?>