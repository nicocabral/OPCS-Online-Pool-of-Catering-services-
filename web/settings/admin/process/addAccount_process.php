<?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}
	else {
		include('../includes/connection.php');
			$name = mysql_real_escape_string(trim($_POST['aname']));
			$email = mysql_real_escape_string(trim($_POST['aemail']));
			$contact = mysql_real_escape_string(trim($_POST['acon']));
			$bdate =  intval(trim($_POST['b-date']));
			$bmonth = mysql_real_escape_string(trim($_POST['b-month']));
			$type = mysql_real_escape_string(trim($_POST['atype']));
			$year =  intval(trim($_POST['year']));
			$countval = strlen($year);
			if(empty($name)){
				echo 'Name must not be empty';
				}
			else if (empty($email)) {
				echo 'Email must not be empty';
				}
			else if (empty($contact)) {
				echo 'Contact must not be empty';
				}
			else if (empty($type)) {
				echo 'Account type must not be empty';
				}
			else if ($type=="Select") {
				echo 'Account type must not be empty';
				}
			else if (empty($year)) {
				echo 'Birth year must have a value';
				}
			else if ($countval>4) {
				echo 'Invalid Birth year';
				}
				else {
					
					$query = mysql_query("INSERT INTO tbl_wtnadmin (account_name,account_email,contact,b_day,b_month,b_year,account_type) 
										  VALUES('$name','$email','$contact','$bdate','$bmonth','$year','$type')") or die (mysql_error());
					if($query == true){
						echo 'Save successfully! Input your temporary username and password';}
					else {
						echo mysql_error();
						}
					
					}
			
				
		
		}?>