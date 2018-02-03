<?php session_start();
include('includes/connection.php');
						$sessionID = intval($_SESSION['adminID']);
						$query = mysql_query("SELECT * FROM tbl_wtnadmin WHERE account_id = '$sessionID'") or die (mysql_error());
						if(mysql_num_rows($query)>0){
							while($row = mysql_fetch_assoc($query)){?>
						<dt>Account Name:</dt> <dd><?php echo $row['account_name'];?></dd>
						<dt>Birthdate:</dt> <dd><?php 
						
						echo $row['b_month'].'&nbsp;'.$row['b_day'].',&nbsp;'.$row['b_year'];?></dd>
						<dt>Contact:</dt> <dd><?php echo $row['contact'];?></dd>
						<dt>Type:</dt> <dd><?php echo $row['account_type'];}}?></dd>