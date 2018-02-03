
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
	$query = mysql_query("SELECT tbl_reservation.*,tbl_catererinfo.* FROM tbl_reservation LEFT JOIN tbl_catererinfo ON tbl_reservation.catererid = tbl_catererinfo.cid WHERE tbl_reservation.reservationid = '$getId'") or die (mysql_error());
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){
			
			if($row['month']==1){
				$m = 'Jan';
			}
			else if($row['month']==2){
				$m = 'Feb';
			}
			else if($row['month']==3){
				$m = 'March';
			}
			else if($row['month']==4){
				$m = 'April';
			}
			else if($row['month']==5){
				$m = 'May';
			}
			else if($row['month']==6){
				$m = 'June';
			}
			else if($row['month']==7){
				$m = 'July';
			}
			else if($row['month']==8){
				$m = 'Aug';
			}
			else if($row['month']==9){
				$m = 'Sept';
			}
			else if($row['month']==10){
				$m = 'Oct';
			}
			
			else if($row['month']==11){
				$m = 'Nov';
			}
			else {
				$m = 'Dec';
			}
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
			
				<i class="fa fa-calendar"></i> Reservation date:<strong><?php echo $m.' '.$row['date'].', '.$row['year']; ?></strong><br>
				<i class="glyphicon glyphicon-list-alt"></i> Reservation #:<?php echo $row['year'].'-'.$row['reservationid']; if($row['res_status']=='Rejected'){
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
							<tr><td>From</td><th><?php echo $row['clientname']?></th></tr><tr><td>Contact #</td><th><?php echo $row['contact']?></th></tr><tr><td>Email</td><th><?php echo $row['email'];?></th></tr><tr><td>Address</td><th><?php echo $row['address']?></th></tr><tr><td>Reservation details</td><td>Service:&nbsp; <strong><?php include('includes/mysql.php');
							$sqlocasioncat = mysql_query('SELECT tbl_ocasioncat.*,tbl_servicescovered.* FROM tbl_ocasioncat LEFT JOIN tbl_servicescovered ON tbl_ocasioncat.oid = tbl_servicescovered.s_oid WHERE tbl_servicescovered.packageno = '.$row['servicepackno'].' AND tbl_servicescovered.catererid = '.$row['catererid'].'') or die (mysql_error());
							while($roid = mysql_fetch_array($sqlocasioncat)){
							echo $roid['ocassion_name'];}?>
							</strong><br>Package price: &#8369;<strong><?php echo number_format($row['price'],2,',','.');?></strong><br>Event date: <strong><?php echo $m.' '.$row['date'].', '.$row['year']; ?></strong></td></tr><tr><td><strong>Service covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><?php include('includes/mysql.php');
						
							$sql = mysql_query('SELECT * FROM tbl_servicescovered WHERE packageno = '.$row['servicepackno'].' AND  catererid = '.$row['cid'].'') or die (mysql_error());
							while($rows = mysql_fetch_array($sql)){?>
							<li><?php echo $rows['covered'].'<i class="fa fa-check" style="color:#228B22;"></i>';?></li>
							<?php }?></ul></td><td><strong>Food covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><?php include('includes/mysql.php');
							//$id = intval($_GET['resid']);
							$sqlf = mysql_query('SELECT * FROM tbl_foodcovered WHERE fpackageno = '.$row['servicepackno'].' AND f_catid = '.$row['cid'].'') or die (mysql_error());
							while($r = mysql_fetch_array($sqlf)){?>
							<li><?php echo $r['foodcovered'].'<i class="fa fa-check" style="color:#228B22;"></i>';?></li>
							<?php }?></ul></td></tr><tr><td>Message</td><th><?php echo $row['message']?></th></tr><tr><td>Status</td><th><?php echo $row['res_status']?></th></tr>
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