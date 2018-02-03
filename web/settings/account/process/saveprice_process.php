<?php session_start();
include('../includes/mysql.php');
$getprice = intval($_GET['price']);
$getpc = intval($_GET['pc']);
$getnod = intval($_GET['nod']);
if(empty($getprice)){
	echo 'Please input price';
}else if(empty($getpc)) {
	echo 'Please input people covered';
}else if(empty($getnod)) {
	echo 'Please input no of dish';
}else {
	$query = mysql_query("INSERT INTO tbl_price VALUES(NULL,'$getprice','".$_SESSION['id']."','$getnod','$getpc')") or die (mysql_error());
	if($query==true){
		
	}else {
		echo  mysql_error();
	}
	
}
?>