<?php session_start();
include('../includes/connection.php');
$getUname = mysql_real_escape_string(trim($_GET['uname']));
$getPword = mysql_real_escape_string(trim($_GET['pword']));

$query = mysql_query("SELECT * FROM tbl_usernameandpassword WHERE username = '$getUname' AND password = '$getPword'")or die (mysql_error());
if(mysql_num_rows($query)>0){
	
while($row = mysql_fetch_array($query)){
	$_SESSION['userid'] = $row['uandpid'];
	$_SESSION['id'] = $row['catID'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['password'] = $row['password'];
	$_SESSION['type'] = 'Caterer';
	checkReg();
	

?>
<?php }}
else {
echo 'Invalid username or password';	}?>
<?php function checkReg(){
	$check = mysql_query("SELECT DATEDIFF(c_regDate,curdate()) as regstat,c_reg,c_cid,c_regstat,c_regDate FROM tbl_catererregistration WHERE c_cid = '".$_SESSION['id']."'") or die (mysql_error());
	if($rows = mysql_fetch_assoc($check)){
		if($rows['regstat']>=31 || $rows['regstat']==-31 || $rows['regstat']==-32 || $rows['regstat']==-33 || $rows['regstat']==-34 || $rows['regstat']==-35){
			unset($_SESSION['userid']);
			unset($_SESSION['id']);
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			unset($_SESSION['type']);
			echo   'Your registration is out of date/expired please contact the administrator or message us for more information';
		
			}
		}
		}?>