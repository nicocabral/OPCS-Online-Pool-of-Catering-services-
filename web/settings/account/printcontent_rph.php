
<!DOCTYPE html>
<html>
<head>
<link href="assets/img/si1.png" rel="shortcut icon">
<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
	window.history.forward();
	function noback(){
			window.history.forward();
		}
</script>
</head> 
<body onload="printContent('div1');">
<div class="container" style="box-shadow:1px 1px 1px 1px #888888;">
<div class="col-md-12"> 
<span class="pull-right"><button onclick="printContent('div1')"><img src="../../assets/images/printer.ico"></button></span>
<br><br>
<div id="div1">
	<?php include('includes/mysql.php');
	$label="";
	$getId = intval($_GET['resid']);
	$query = mysql_query("SELECT tbl_customereservation.*,tbl_catererinfo.* FROM tbl_customereservation LEFT JOIN tbl_catererinfo ON tbl_customereservation.res_mycatid = tbl_catererinfo.cid WHERE tbl_customereservation.cusres_id = '$getId'") or die (mysql_error());
	if(mysql_num_rows($query)){
	while($row = mysql_fetch_array($query)){
			?>
		<div class="col-md-12">
			<h3><strong><?php echo '<i class="fa fa-cutlery"></i> '.$row['c_name'];?></strong></h3>
			<hr>
		</div>
		<div class="row">
		<div class="col-md-12">
		<div class="pull-left">
			<address><i class="fa fa-street-view"></i> <?php echo $row['c_address']?><br>
			<i class="fa fa-volume-control-phone"></i> <?php echo $row['c_contact'];?><br>
			<i class="fa fa-at"></i> <?php echo $row['c_email'];?>
			</address>
		</div>
		<div class="pull-right">
			<h5>
			
				<i class="fa fa-calendar"></i> Reservation date:<strong><?php echo $row['res_date'].' '.$row['res_time']; ?></strong><br>
				<i class="glyphicon glyphicon-list-alt"></i> Reservation #:<?php $newdate = new Datetime($row['res_date']);
				echo $newdate->format('Y').'-'.$row['cusres_id']; if($row['res_status']=='Rejected'){
					$label = 'danger';
				}else {
					$label='success';
				}?><br>
				<i class="glyphicon glyphicon-list-alt"></i> Reservation Status:<span class="label label-<?php echo $label;?>"><?php echo $row['res_status']; ?></span>
				
			</h5>
</div>
		</div>
		</div>	
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-condensed">
						<thead>
							
						</thead>
						<tbody>
							<tr><td>From</td><th><?php echo $row['res_name']?></th></tr><tr><td>Contact #</td><th><?php echo $row['re_contact']?></th></tr><tr><td>Email</td><th><?php echo $row['res_email'];?></th></tr><tr><td>Address</td><th><?php echo $row['res_address']?></th></tr><tr><td>Reservation details</td><td>Service:&nbsp; <strong><?php echo $row['eventname'];?>
							</strong><br>Package price: &#8369;<strong><?php echo number_format($row['res_price'],2,',','.');?></strong><br>Event date: <strong><?php echo $row['res_date'].' '.$row['res_time']; ?></strong></td></tr><tr>
							<td>Food covered</td>
							<th>
							<ul style="list-style-type:none;">
							<?php include('includes/mysql.php');
							$sqlocasioncat = mysql_query('SELECT * FROM tbl_resfoodordered WHERE custom_resid = "'.$row['cusres_id'].'"') or die (mysql_error());
							while($roid = mysql_fetch_array($sqlocasioncat)){
							echo '<li>'.$roid['foodordered'].'<span class="fa fa-check" style="color:#228B22"></span></li>';}?>
							</ul>
							</th>
							</tr><tr><td>Message</td><th><?php echo $row['res_message']?></th></tr><tr><td>Status</td><th><label class="label label-<?php echo $label;?>"><?php echo $row['res_status']?></label></th></tr>
						</tbody>
						</table>
				</div>
			</div>
		</div>
			
	<?php }}?>
</div>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body> 
</html>