<?php session_start();
include('connection.php');
$logoutID = intval($_GET['logout']);
if(isset($logoutID)) {
		unset ($_SESSION['adminID']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['contact']);	
		unset($_SESSION['bdate']);
		unset($_SESSION['bmonth']);
		unset($_SESSION['byear']);
		unset($_SESSION['type']);
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		session_destroy();
	header("location:../index");
	} else {
		echo mysql_error();
	}
?>