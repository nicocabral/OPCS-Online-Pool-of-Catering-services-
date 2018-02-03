<?php 
	session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {
		include('../includes/connection.php');
		$txta = mysql_real_escape_string(trim($_POST['locName']));
		$txtId = intval(trim($_POST['selectCity']));
		if(empty($txta)){?>
        <script>
						$("#logMsgTown").empty();
						$("#logMsgTown").removeClass();
						$("#logMsgTown").addClass("alert alert-warning");
						$("#logMsgTown").html("<center style='color:#000;'>Please check your fields</center>");
					</script>
               <?php
			}else {
				$sqlquey = mysql_query("SELECT tbl_townloc.*,tbl_city.* FROM tbl_townloc LEFT JOIN tbl_city ON tbl_townloc.cityid = tbl_city.cityid
										 WHERE town = '$txta' AND tbl_city.cityid = '$txtId'") or die (mysql_error());
				if(mysql_num_rows($sqlquey)>0){?>
					<script>
						$("#logMsgTown").empty();
						$("#logMsgTown").removeClass();
						$("#logMsgTown").addClass("alert alert-danger");
						$("#logMsgTown").html("<center style='color:#000;'>Already in the database!</center>");
						</script>
					
					<?php }else{
				$query = mysql_query("INSERT INTO tbl_townloc VALUES(NULL,'$txtId','$txta')") or die (mysql_error());
				if($query == true){
					?>
                     <script>
						$("#logMsgTown").empty();
						$("#logMsgTown").removeClass();
						$("#logMsgTown").addClass("alert alert-success");
						$("#logMsgTown").html("<center style='color:#000;'>Save successfully!</center>");
						</script>
                    <?php 
					}else {
						echo mysql_error();}
				
				}
		}
	}
?>