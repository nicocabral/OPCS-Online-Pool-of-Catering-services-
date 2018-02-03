<?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {
			include('../includes/connection.php');
			$id = intval($_SESSION['adminID']);
			$name = mysql_real_escape_string(trim($_POST['aname']));
			$email = mysql_real_escape_string(trim($_POST['aemail']));
			$contact = mysql_real_escape_string(trim($_POST['acon']));
			$bdate =  intval(trim($_POST['b-date']));
			$bmonth = mysql_real_escape_string(trim($_POST['b-month']));
			$year =  intval(trim($_POST['year']));
			$query = mysql_query("UPDATE tbl_wtnadmin SET account_name = '$name',
														  account_email = '$email',
														  contact = '$contact',
														  b_day = '$bdate',
														  b_month = '$bmonth',
														  b_year = '$year' WHERE account_id = '$id'") or die (mysql_error());
			if($query ==true){
				echo 'Updated Successfully!';
				}else {
					echo mysql_error();}
		}
?>