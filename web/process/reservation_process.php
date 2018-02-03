<?php include('../includes/connection.php');
	$getCid = intval($_POST['cid']);
	$getOid = intval($_POST['oid']);
	$getPid = intval($_POST['pid']);
	$getPrice = intval($_POST['price']);
	$getName = mysql_real_escape_string(trim($_POST['resname']));
	$getAddress = mysql_real_escape_string(trim($_POST['address']));
	$getContact = mysql_real_escape_string(trim($_POST['contact']));
	$getEmail = mysql_real_escape_string(trim($_POST['email']));
	$getMonth = intval(trim($_POST['month']));
	$getDate = intval(trim($_POST['date']));
	$getYear = intval(trim($_POST['year']));
	$getHour = intval(trim($_POST['hour']));
	$getMins = intval(trim($_POST['mins']));
	$getTtpye = mysql_real_escape_string(trim($_POST['timetype']));
	$time = $getHour.':'.$getMins.' '.$getTtpye;
	$getMsg = mysql_real_escape_string(trim($_POST['msg']));
	if(empty($getName)){
		echo 'Please input your name';
		}
	else if(empty($getAddress)){
		echo 'Please input your address';
		}
	else if(empty($getContact)){
		echo 'Please input your valid contact no.';
		}
	else if(empty($getEmail)){
		echo 'Please input your valid email';
		}
	else if(empty($getMonth)){
		echo 'Please select a valid Month';
		}
	else if(empty($getDate)){
		echo 'Please select a valid Date';
		}
	else if(empty($getYear)){
		echo 'Please select a valid Year';
		}
	else if(empty($getHour)){
		echo 'Please select a valid time';
		}
		else if(empty($getMsg)){
		echo 'Please give us a short message for your reservation details. Thank you!';
		}
	else if(empty($getCid)){
			header("location:../index");
		}
	
	else {
			$checkquery = mysql_query("SELECT * FROM tbl_reservation WHERE catererid = '$getCid' AND clientname = '$getName' AND email = '$getEmail' AND ocasion_id = '$getOid' AND servicepackno = '$getPid' AND food_packno = '$getPid' AND month = '$getMonth' AND date = '$getDate' AND year = '$getYear'") or die(mysql_error());
		if(mysql_num_rows($checkquery)>0){
			echo 'You already reserve this package. Pick another date and time';
			}
			else {
					$query = mysql_query("INSERT INTO  tbl_reservation VALUES(NULL,'$getCid','$getName','$getMonth','$getDate','$getYear','$time','$getAddress','$getEmail','$getContact','New','$getMsg','$getPid','$getPid','$getPrice','$getOid')") or die (mysql_error());
					if($query == true){
						echo 'Thank you! Your reservation has been sent we will contact you after a minute for confirmation.';
						$ratings = mysql_query("SELECT * FROM tbl_ratings WHERE rating_catererid = '$getCid'") or die(mysql_error());
						if(mysql_num_rows ($ratings)==0){
							$count = 1;
							$insertratings = mysql_query("INSERT INTO tbl_ratings VALUES (NULL,'$getCid','$count','$count')") or die (mysql_error());
						}else {
							$count =1;
							$append = 0;
							if($row = mysql_fetch_array($ratings)){
								$append = $row['ratings']+$count;
							}
							$updateratings = mysql_query("UPDATE tbl_ratings SET ratings = '$append',
																				 total = '$append' WHERE rating_catererid = '$getCid'") or die (mysql_error());
						}
						}
						else {
							echo mysql_error();}
				}
		}
	
?>