<?php session_start();
include('../includes/mysql.php');
$getpn = mysql_real_escape_string(trim($_GET['pn']));
$getdes = mysql_real_escape_string(trim($_GET['des']));
$getstat = mysql_real_escape_string(trim($_GET['stat']));
$getoid = intval($_GET['oid']);
if(empty($getpn)){
	echo 'Please input a valid catering services name';
}
else if(empty($getpn)){
	echo 'Please input a valid description';
}else {
		$query = mysql_query("UPDATE tbl_ocasioncat SET ocassion_name = '$getpn',
		description = '$getdes',
		status = '$getstat' WHERE oid = '$getoid'")or die (mysql_error());
		if($query == true){
			echo $getpn.' updated';
		}else {
			echo mysql_error();
		}			
}?>