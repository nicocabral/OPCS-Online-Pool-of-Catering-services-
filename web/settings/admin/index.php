<?php if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:login.php");
	}
	else if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		header("location:admin.php");}?>