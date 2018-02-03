<?php session_start();
include('../includes/connection.php');
$getStr = mysql_real_escape_string(trim($_GET['q']));
if(!empty($getStr)){
$query = mysql_query("SELECT * FROM tbl_usernameandpassword WHERE password = '$getStr'") or die (mysql_error());
if(mysql_num_rows($query)>0){
?>
<p style="color:red;">Password already taken: <strong><?php echo $getStr;?></strong></p>
<?php } else {?>
<p style="color:green;">Password Available : <strong><?php echo $getStr?></strong></p>
<?php } } else {}?>