

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
	$getId = intval($_GET['oid']);
	$query = mysql_query("SELECT tbl_orders.*,tbl_catererinfo.* FROM tbl_orders LEFT JOIN tbl_catererinfo ON tbl_orders.catererid = tbl_catererinfo.cid WHERE tbl_orders.orderid = '$getId'") or die (mysql_error());
	$total = '';
	$orderpayment='';
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){
			$total = $row['order_price']*$row['order_qty'];
			if($row['order_payment'] == 'cod'){
				$orderpayment = 'Cash on delivery';
			}else {
				$orderpayment = 'Pickup';
			}
			?>
		<div class="col-md-12">
			<h3 style="color:#821a1a;"><strong><?php echo '<i class="fa fa-cutlery"></i> '.$row['c_name'];?></strong></h3>
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
			
				<i class="fa fa-calendar"></i> Order date:<strong><?php echo $row['order_timestamp'].' '.$row['time']; ?></strong><br>
				<i class="glyphicon glyphicon-list-alt"></i> Order #:<?php 
					$date = new Datetime($row['order_timestamp']);
					echo $date->format('Y').'-'.$row['orderid'];if($row['order_status']=='Rejected'){
					$label = 'danger';
				}else {
					$label='success';
				}?><br>
				<i class="glyphicon glyphicon-list-alt"></i> Order Status:<span class="label label-<?php echo $label;?>"><?php echo $row['order_status']; ?></span>
				
			</h5>
</div>
		</div>
		</div>	
		<div class="row">
			<div class="col-md-12" >
				<div class="table-responsive" >
					<table class="table table-striped table-condensed" >
						<thead>
							
						</thead>
						<tbody>
						<tr><th colspan="2"><em>Customer details</em></th></tr>
						<tr><td>Customer name</td><th><?php echo $row['customer_name'];?></th></tr>
							<tr><td>Contact</td><th><?php echo $row['customer_contact'];?></th></tr>
							<tr><td>Address</td><th><?php echo $row['customer_address'];?></th></tr>
							<tr><td>Message</td><th><?php echo $row['customer_message'];?></th></tr>
							<tr><td><?php echo $orderpayment.'<i class="fa fa-check" style="color:#228B22;"></i>';?></td><th><?php echo $row['order_date'].' '.$row['time'];?></th></tr>
							<tr><th colspan="2"><em>Order details</em></th></tr>
							<tr><td>Order name</td><th><?php echo $row['order_name']?></th></tr>
							
							<tr><td>Price</td><th><?php echo number_format($row['order_price'],2,'.',',');?></th></tr><tr><td>Quantity</td><th><?php echo $row['order_qty'];?></th></tr><tr><td>Total</td><th><?php echo number_format($total,2,'.',',');?></th></tr>
							
							
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