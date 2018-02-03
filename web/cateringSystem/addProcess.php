<?php 
if(isset($_POST['submit'])){
	$selPrice = mysql_real_escape_string($_POST['selPrice']);
	$eventName = mysql_real_escape_string($_POST['eventName']);
	$mycatId = mysql_real_escape_string($_POST['mycatId']);
	$txtInputnumber = mysql_real_escape_string($_POST['txtInputnumber']);
	$totalres = mysql_real_escape_string($_POST['totalres']);
	$txtName = mysql_real_escape_string($_POST['txtName']);
	$txtContact = mysql_real_escape_string($_POST['txtCon']);
	$txtEmail = mysql_real_escape_string($_POST['txtEmail']);
	$txtAddress = mysql_real_escape_string($_POST['txtAddress']);
	$order_date = mysql_real_escape_string($_POST['order_date']);
	$resTime = mysql_real_escape_string($_POST['resTime']);
	$txtMsg = mysql_real_escape_string($_POST['txtMsg']);
		
	if(empty($selPrice)){
		echo 'Please select price';
	}
	else if(empty($eventName)){
		echo 'Please select event';
	}
	else if(empty($txtInputnumber)){
		echo 'Please input people covered';
	}
	else if(empty($totalres)){
		echo 'Please input people covered';
	}
	else if(empty($txtName)){
		echo 'Name is required';
	}
	else if(empty($txtContact)){
		echo 'Contact is required';
	}
	else if(empty($txtEmail)){
		echo 'Email is required';
	}
	else if(empty($txtAddress)){
		echo 'Address is required';
	}
	else if(empty($order_date)){
		echo 'Date of event is required';
	}
	else if(empty($resTime)){
		echo 'Time of event is required';
	}
	else if(empty($txtMsg)){
		echo 'Message us your queries or instructions.';
	}
	else {
		
		include('../includes/connection.php');
		$query = mysql_query("INSERT INTO tbl_customereservation VALUES (NULL,'$selPrice','$eventName','$txtInputnumber','$totalres','$txtName','$txtContact','$txtEmail','$txtAddress','$order_date','$resTime','$txtMsg','$mycatId','New')") or die (mysql_error());
		$id = mysql_insert_id();
		for($i = 0;$i < count($_POST['food_ordered']);$i++){
			$sql = mysql_query("INSERT INTO tbl_resfoodordered SET custom_resid = '$id',
			foodordered = 
			'".mysql_real_escape_string($_POST['food_ordered'][$i])."'
			");
			
		}
		$ratings = mysql_query("SELECT * FROM tbl_ratings WHERE rating_catererid = '$mycatId'") or die(mysql_error());
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
																				 total = '$append' WHERE rating_catererid = '$mycatId'") or die (mysql_error());
						}
		
	}
	
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<center>
				<img src="images/loading.gif" class="img-responsive" width="30%;">
			</center>
			<div class="alert alert-success">
				<h4>Thank you <?php echo $_POST['txtName']?>! Your reservation has been sent we will contact you after an hour for your reservation confirmation
				<a href="../index" class="btn btn-success">Ok, Got it!</a></h4>
			</div>
			</div>
			</div>
		</div>
	</div>
</body>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
<?php }
?>
