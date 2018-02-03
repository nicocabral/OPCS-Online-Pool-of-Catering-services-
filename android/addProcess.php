<?php 
if(isset($_POST['save'])){
	
	$selPrice = mysql_real_escape_string($_POST['pprice']);
	$eventName = mysql_real_escape_string($_POST['eventname']);
	$mycatId =intval($_POST['mycatId']);
	$txtInputnumber = mysql_real_escape_string($_POST['txtInputnumber']);
	$totalres = mysql_real_escape_string($_POST['totalpayment']);
	$txtName = mysql_real_escape_string($_POST['infoname']);
	$txtContact = mysql_real_escape_string($_POST['infocontact']);
	$txtEmail = mysql_real_escape_string($_POST['infoemail']);
	$txtAddress = mysql_real_escape_string($_POST['infoaddress']);
	$order_date = mysql_real_escape_string($_POST['infodoe']);
	$resTime = mysql_real_escape_string($_POST['infotoe']);
	$txtMsg = mysql_real_escape_string($_POST['infomsg']);
}

?>
