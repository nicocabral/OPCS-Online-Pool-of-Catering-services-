<?php session_start();
if(isset($_POST['save'])){
	include('../includes/mysql.php');
	$oid = intval($_POST['ocasionname']);
	$price = intval($_POST['pprice']);
	
	$packno = 1;
	if(empty($oid)){
		$_SESSION['success_msg'] = 'Please select a catering services';
		$_SESSION['class']='warning';
		header("location:../services");
	}else if (empty($price)){
		$_SESSION['success_msg'] = 'Please enter package price';
		$_SESSION['class']='warning';
		header("location:../services");

	}
	else if (empty($_POST['scov']) || empty($_POST['fcov'])){
		$_SESSION['success_msg'] = 'Please enter services covered and/or foodcovered';
		$_SESSION['class']='warning';
		header("location:../services");
	}else{
	$sql = mysql_query("SELECT * FROM tbl_servicescovered WHERE s_oid = '$oid' AND catererid = '".$_SESSION['id']."' GROUP  by packageno") or die (mysql_error());
while($row = mysql_fetch_array($sql)){
	$packno = $packno + $row['packageno'];}
	for($i=0;$i<count($_POST['scov']);$i++){
		$query = mysql_query("INSERT INTO tbl_servicescovered VALUES(NULL,'$oid','".$_SESSION['id']."','".mysql_real_escape_string($_POST['scov'][$i])."','$packno','$price')") or die (mysql_error());
		
	}
	
	
	for($f=0;$f<count($_POST['fcov']);$f++){
		$fquery = mysql_query("INSERT INTO tbl_foodcovered VALUES(NULL,'$oid','".$_SESSION['id']."','".mysql_real_escape_string($_POST['fcov'][$f])."',NULL,'$packno','$price')") or die (mysql_error());
	}
	$_SESSION['success_msg'] = 'Service package price save successfully';
	$_SESSION['class']='success';
	if($query == true && $fquery == true){
		header("location:../services");
	}
	
	}
}?>