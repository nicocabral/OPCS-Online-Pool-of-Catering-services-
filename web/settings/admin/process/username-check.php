<?php 
 session_start();
 include('../includes/connection.php');

	 $uname = mysql_real_escape_string(trim($_GET['data']));
	 $query = mysql_query("SELECT account_username FROM tbl_wtnadmin WHERE account_username = '$uname'") or die (mysql_error());
	 if(mysql_num_rows($query)>0){
		  echo "<span style='color:red;'>Sorry username already taken! ".$uname."</span>";
	 exit(); }
	  else
	  {
		  echo "<span style='color:green;'>Available username : ".$uname."</span>";
		  exit();
	  }

?>