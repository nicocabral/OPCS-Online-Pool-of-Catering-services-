<?php
	session_start();
	include('includes/mysql.php');
	$getId = intval($_GET['resid']);
	$query = mysql_query("SELECT * FROM tbl_resfoodordered WHERE custom_resid = '$getId'") or die (mysql_error());
	while($row = mysql_fetch_array($query)){
		echo '<li>'.$row['foodordered'].'<i class="fa fa-check" style="color:#228B22;"></i></li>';
		
	}
?>