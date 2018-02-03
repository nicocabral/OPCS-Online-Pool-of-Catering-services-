<?php include('../includes/connection.php');

$getFrom = mysql_real_escape_string(trim($_POST['from']));
$getMsg = mysql_real_escape_string(trim($_POST['message-text']));
if(empty($getFrom)){
	echo 'Please check your fields';
	}
	else if(empty($getMsg)){
		echo 'Please input message';
		}
		else {
			$query = mysql_query("INSERT INTO tbl_message VALUES(NULL,'$getFrom','','','$getMsg',NULL,'New')") or die (mysql_error());
			if($query == true ){
				echo 'Message sent! We will contact you within an hour. Thank you!';
				}
				else {
					echo mysql_error();}
			}
?>