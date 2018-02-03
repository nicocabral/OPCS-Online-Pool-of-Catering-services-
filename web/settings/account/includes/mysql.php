<?php 
//connection variables
$localhost = 'localhost';
$username = 'root';
$password = '010694nico';
$dbname = 'opcs';
// connection
$con = mysql_connect($localhost,$username,$password);
if(!$con){
	echo 'Connection problem'.mysql_error();
	}
else {
	mysql_select_db($dbname,$con) or die (mysql_error());
	}

?>