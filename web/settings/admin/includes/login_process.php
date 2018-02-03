<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['type'])=='admin'){
	
	
include('connection.php');
$username = mysql_real_escape_string(trim($_POST['username']));
$pword = mysql_real_escape_string(trim($_POST['password']));

$query = "SELECT * FROM tbl_wtnadmin WHERE account_username = '$username' AND account_password = '$pword'";
$result = mysql_query($query) or die (mysql_error());
if(mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
		$_SESSION['adminID'] = $row['account_id'];
		$_SESSION['name'] = $row['account_name'];
		$_SESSION['email'] = $row['account_email'];
		$_SESSION['contact'] = $row['contact'];
		$_SESSION['bdate'] = $row['b_day'];
		$_SESSION['bmonth'] = $row['b_month'];
		$_SESSION['byear'] = $row['b_year'];
		$_SESSION['username'] = $row['account_username'];
		$_SESSION['password'] = $row['account_password'];
		$_SESSION['type'] = $row['account_type'];
		
		}
		echo '<script>window.location.href="login_Auth"</script>';
	}else {
		echo '<strong style="color:red"><i class="glyphicon glyphicon-remove"></i> Invalid username or password</strong>';
		}
		
	
	mysql_close($con);
}else {
	header("location:index.php");
	}
?>