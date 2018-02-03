<?php
 session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else{ 
	include('../includes/connection.php');
	$txta = mysql_real_escape_string(trim($_GET['town']));
	$txtb = intval($_GET['city']);
	$tid = intval($_GET['townid']);
	if(empty($txta)){
   echo 'Please check your fields';
	
		}
		else {
			$sql = mysql_query("SELECT * FROM tbl_townloc WHERE town = '$txta' AND cityid = '$txtb'") or die (mysql_error());
			if(mysql_num_rows($sql)>0){
				echo 'Sory this record might have duplication';}else{
			$query=mysql_query("UPDATE tbl_townloc SET  town = '$txta',
														cityid= '$txtb' WHERE townid = '$tid'") or die (mysql_error());
			if($query==true){
				
                echo 'Save successfully!';
                
				}else { echo mysql_error();}
               
                
			}
		}
	}?>