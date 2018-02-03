	
                                    
       <i class="icon-bell"></i>                 

<?php include('includes/connection.php');
$sql = mysql_query("SELECT*  FROM tbl_catererinfo WHERE c_status  = 'New'") or die (mysql_error());
$count = mysql_num_rows($sql);
	if($count>0){
		echo ' <span class="badge badge-xs badge-danger" > '.$count.'</span>';
	}
	else {echo '';}

$sql = mysql_query("SELECT *  FROM tbl_message WHERE m_status  = 'New'") or die (mysql_error());
$count = mysql_num_rows($sql);
	if($count>0){
		echo ' <span class="badge badge-xs badge-danger" > '.$count.'</span>';
	}
	else {echo '';}

	
		
?>    
