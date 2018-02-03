<?php session_start();
include('../includes/mysql.php');
$getpn = mysql_real_escape_string(addslashes($_GET['pn']));
$getdes = mysql_real_escape_string(addslashes($_GET['des']));
$getstat = mysql_real_escape_string(addslashes($_GET['stat']));

if(empty($getpn)){
	echo 'Please input a valid catering services name';
		exit();
}
else if(empty($getpn)){
	echo 'Please input a valid description';
		exit();
}else {

	$check = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '".$_SESSION['id']."' AND ocassion_name = '$getpn'") or die (mysql_error());
	if(mysql_num_rows($check)>0){
		echo 'You already save this package';
	}else {
	
		$query = mysql_query("INSERT INTO tbl_ocasioncat VALUES(NULL,'$getpn','$getdes','$getstat','".$_SESSION['id']."')")or die (mysql_error());
		if($query == true){
			echo $getpn.' save';
		}else {
			echo mysql_error();
		}		
	}
	
}?>