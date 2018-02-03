<?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	} else {
		include('../includes/connection.php');
		$cityname = mysql_real_escape_string(trim($_POST['cityname']));
		if(empty($cityname)){
			?>
 				<script>
						$("#logMsg").empty();
						$("#logMsg").removeClass();
						$("#logMsg").addClass("alert alert-warning");
						$("#logMsg").html("<center style='color:#000;'>Please check your fields</center>");
					</script>
                <?php } else {
					$query = mysql_query("INSERT INTO tbl_city VALUES(NULL,'$cityname')") or die (mysql_error());
					if($query == true){ ?>
                    <script>
						$("#logMsg").empty();
						$("#logMsg").removeClass();
						$("#logMsg").addClass("alert alert-success");
						$("#logMsg").html("<center style='color:#000;'>Save successfully!</center>");
					</script>
						<?php 
                        }else {
							echo mysql_error();}
					
					}
				}?>