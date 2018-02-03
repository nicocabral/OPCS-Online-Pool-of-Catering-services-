<?php session_start();
	include('../includes/connection.php');
	$cname = mysql_real_escape_string(trim($_POST['txt-Cname']));
	$oname = mysql_real_escape_string(trim($_POST['txt-Oname']));
	$email = mysql_real_escape_string(trim($_POST['txt-email']));
	$contact = mysql_real_escape_string(trim($_POST['txt-con']));
	$address = mysql_real_escape_string(trim($_POST['txt-address']));
	$countchar = strlen($address);
	if(empty($cname)){
		echo 'Company name must not be empty';
		}
	else if(empty($oname)){
		echo 'Owner name must not be empty';
		}
	else if(empty($email)){
		echo 'Email must not be empty';
		}
	else if(empty($contact)){
		echo 'Contact must not be empty';
		}
	else if(empty($address)){
		echo 'Address must not be empty';
		}
	else if($countchar<5){
		echo 'Invalid Address';
		}
		else {
				$sqlquery = "INSERT INTO tbl_catererinfo (c_name,c_contact,c_email,c_owner,c_address,c_status) VALUES('$cname','$contact','$email','$oname','$address',			                             'New')";
				$sqlres = mysql_query($sqlquery) or die (mysql_error());
				if($sqlres == true){
					echo 'Account submitted successfully! We will contact you for registration transaction';
					}
					else {
						echo mysql_error();}
			}
?>