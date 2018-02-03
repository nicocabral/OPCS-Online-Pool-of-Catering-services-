<?php session_start();
$getlogout = intval($_GET['logout']);
if(!empty($getlogout)){
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	header("location:../../../index");
}
else {
	echo 'Unable to logout';
}
?>