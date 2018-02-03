<?php session_start();
include('../includes/connection.php');
$getDate = mysql_real_escape_string(trim($_GET['date']));
$getPword = mysql_real_escape_string(trim($_GET['pword']));
$getemail = mysql_real_escape_string(trim($_GET['email']));
$getID = intval($_GET['id']);
$query = mysql_query("INSERT INTO tbl_catererregistration VALUES(NULL,'$getID','$getDate','Available')") or die (mysql_error());
$queryid = mysql_insert_id($con);
$query1 = mysql_query("UPDATE tbl_catererinfo SET c_status = 'Register',c_registration = '$queryid' WHERE cid = '$getID'") or die (mysql_error());
$query2 = mysql_query("SELECT * FROM tbl_usernameandpassword WHERE catID = '$getID'") or die (mysql_error());
if(mysql_num_rows($query2)>0){
?>
<p style="color:red">Error occured inserting password</p>
<?php }
else {
		$insertquery = mysql_query("INSERT INTO tbl_usernameandpassword VALUES (NULL,'$getID','$getemail','$getPword')") or die (mysql_error());
		if ($query == true && $query1 ==true && $insertquery == true){
			?>
           Account now can login using email:<?php echo $getemail?> and password: <?php echo $getPword?>
			<?php
			}
	}?>