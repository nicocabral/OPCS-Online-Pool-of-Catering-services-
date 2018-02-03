<?php 
session_start();
include('../includes/connection.php');
$comName = mysql_real_escape_string(trim($_POST['comName']));
$oname = mysql_real_escape_string(trim($_POST['oName']));
$email = mysql_real_escape_string(trim($_POST['email']));
$contact = mysql_real_escape_string(trim($_POST['contact']));
$address = mysql_real_escape_string(trim($_POST['address']));

// validation
if(empty($comName)){
	echo 'Company name must not be empty';
	}
else if (empty($oname)){
	echo 'Owner name must not be empty';
	}
else if (empty($email)){
	echo 'Email must not be empty';
	}
else if(empty($contact)){
	echo 'Contact must not be empty';
	}
else if(empty($address)){
	echo 'Address must not be empty';
	}
else {
		$query = mysql_query("INSERT INTO tbl_catererinfo (c_name,c_contact,c_email,c_owner,c_address,c_status) VALUES('$comName','$contact','$email','$oname','$address','New')") or die (mysql_error());
		if($query == true){
			echo 'Save successfully!';
			}
			else {
				echo mysql_error();}
	}


?>