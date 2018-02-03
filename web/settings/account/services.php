<?php session_start();
error_reporting(0);
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	session_destroy();
	header('location:../../index');
}else if($_SESSION['type']!='Caterer') {
	session_destroy();
	header('location:../../index');
}else{
	include('../../includes/connection.php');
	$sqlquery = mysql_query("SELECT * FROM tbl_catererinfo WHERE cid = '".$_SESSION['id']."' AND c_status = 'Register'") or die (mysql_error());
	if(mysql_num_rows($sqlquery)>0){
		while($sqlrow = mysql_fetch_array($sqlquery)){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | <?php echo $sqlrow['c_name'];?></title>
	<link href="assets/img/si1.png" rel="shortcut icon">
    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">	
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<link href="css/components.css" rel="stylesheet">
	<link href="../../cateringSystem/css/animate.min.css" rel="stylesheet">
	<link href="../../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link href="../../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
	<link href="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<!-- Sweet Alert -->
    <link href="../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
	<style>
		.error_msg{
			color:red;
			font-size:13px;
		}

#img:hover{
	-moz-transform: scale(2.0);
  -webkit-transform: scale(2.0);
  transform: scale(2.0);
}

	</style>
</head>
<body onload="notification();loadPackage();selectcs();loadorderlist();">
<!-- header -->
        <?php include('header.php');?>
<div class="wrapper">
	<div class="container">
	<?php include('editcsModal.php');
include('vspModal.php');
include('rateperheadModal.php');
include('ordersettingsModal.php');
include('editorderModal.php');	?>

	<br>

		<h4 class="wow fadeInDown" style="color:#821a1a">Howdy, <i class="fa fa-cutlery"></i> <?php echo $sqlrow['c_name'];?>!</h4>
<span class="pull-right wow slideRight">
		<label  class="badge wow slideRight" id="notificon"></label>
	</span>
		<hr>
		<div class="row">
			<div class="col-lg-4">
				<label class="wow fadeInDown"><span class="text-muted">Home <i class="fa fa-arrow-right"></i> </span><i class="fa fa-gears"></i> Services listing
				</label>
			</div>
			<div class="col-lg-8">
				<span class="wow fadeInDown pull-right">
				<button class="btn btn-danger wow fadeInDown" data-toggle="modal" data-target="#orderModal"><i class="fa fa-cart-arrow-down"></i> Available for orders/other services offered</button>
				<button class="btn btn-danger wow fadeInDown" data-toggle="tooltip" title="Click here to set up rate per head services" onclick="showrphModal();"><i class="fa fa-user"></i> Rate per head services</button></span>
			</div>
			</div>
	
		
		<!-- end of row -->
		<div class="row" style="margin-top:5px;">
			<div class="wow fadeInDown col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
			<div>
			<div class="col-lg-12">
			<div class="col-md-5">
			<div class="col-sm-2"><img src="assets/img/s4.png" class="wow fadeInDown img-responsive" width="100%;"></div>
			<div class="col-sm-10">
				<label style="font-size:17px;margin-top:20px;" class="wow fadeInDown">Rate per package services</label>
				</div>
				
			<div class="row" >
			<div class="col-sm-12"><hr>
			<form name="savepackform" id="savepackform" >
				<label class="wow fadeInDown">Catering service name</label>
				<input type="text" class="wow fadeInDown form-control"  name="packname" id="packname" placeholder="Ex. Birthday services" required>
				<span id="errormsg_csn" class="error_msg"></span>
				<label style="margin-top:10px;" class="wow fadeInDown">catering service description</label>
				<textarea class="wow fadeInDown form-control"  placeholder="Ex. Celebrate your debut with our birthday packages" name="description" id="description" required></textarea>
				<span id="errormsg_csd" class="error_msg"></span>
				<label style="margin-top:10px;" class="wow fadeInDown">Catering services Status</label>
				<select class="wow fadeInDown form-control" name="status"required>
					<option value="Available">Available</option>
					<option value="Un-available">Un-Available</option>
				</select>
				<br>
				<span class="pull-right" style="margin-bottom:10px;">
				<button class="btn btn-danger wow fadeInDown" type="submit"><strong><i class="fa fa-check"></i> Save catering service</strong></button>
				</span>
				<br>
				</form>
			</div>
			</div>
			
			</div>
			<div class="col-md-7">
			<form method="post" id="submitform" action="process/savepprice_process">
			
			<br>
			<?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
			<div class="col-sm-6">
			<label class="wow fadeInDown">Services package pricing</label>
				<div id="selectcs" class="wow fadeInDown"></div>
			</div>
			<div class="col-sm-6">
				<label class="wow fadeInDown">Package price</label>
				<input type="number" name="pprice" class="form-control wow fadeInDown" placeholder="0.00" required>
				</div>
			<div class="col-sm-6">
				<label style="margin-top:5px;" class="wow fadeInDown">Service covered</label>
				 <div class="wow fadeInDown input-group">
      <input type="text" class="wow fadeInDown form-control" name="txtsc" id="txtsc">
      <span class="input-group-btn">
        <button class="wow fadeInDown btn btn-danger" type="button" data-toggle="tooltip" title="Add" onclick="addscovered();">
		<i class="fa fa-plus-square"></i></button>
      </span>
    </div><!-- /input-group -->
			</div>
			<div class="col-sm-6">
				<label style="margin-top:5px;" class="wow fadeInDown">Food covered</label>
				 <div class="wow fadeInDown input-group">
      <input type="text" class="form-control" id="txtfc" name="txtfc">
      <span class="wow fadeInDown input-group-btn">
        <button class="wow fadeInDown btn btn-danger" type="button" data-toggle="tooltip" title="Add" onclick="addfcovered();">
		<i class="fa fa-plus-square"></i></button>
      </span>
    </div><!-- /input-group -->
			</div>
			<div class="col-sm-6">
				<div class="wow fadeInDown table-responsive" style="margin-top:10px;height:200px;">
					<table class="wow fadeInDown table table-bordered table-striped table-condensed table-hover" width="100%;">
					<thead>
						<tr>
							<th>Service covered list</th>
							<th><center><i class="fa fa-gear"></i></center></th>
						</tr>
					</thead>
					<tbody id="scl" class="wow fadeInDown"></tbody>
					</table>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="wow fadeInDown table-responsive" style="margin-top:10px;height:200px;">
					<table class="wow fadeInDown table table-bordered table-striped table-condensed table-hover" width="100%;">
					<thead>
						<tr>
							<th>Food covered list</th>
							<th><center><i class="fa fa-gear"></i></center></th>
						</tr>
					</thead>
					<tbody id="fcl" class="wow fadeInDown"></tbody>
					</table>
				</div>
			</div>
			
			<div class="col-sm-6">
			
			<button class="wow fadeInDown btn btn-danger btn-block" type="submit" name="save"><strong><i class="fa fa-check"></i> Save package</strong></button></div>
			<div class="col-sm-6">
			<button class="wow fadeInDown btn btn-danger btn-block"data-toggle="modal" data-target="#vspModal"><strong><i class="fa fa-search"></i> View services package</strong></button></div>
			</form>
			</div>
			
		<br>
				<div class="col-sm-12" style="margin-top:15px;">
				<hr>
					<div class="table-responsive" id="saveresult">
					
					</div>

			</div>
			</div>
		</div>
		</div><!-- end of row reservation per packages -->
			
	
	</div>
 </div>
 <!-- footer -->
   <?php include('footer.php');?> 
  <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
	 <script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="../../assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../../assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        
        <script src="../../assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../../assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../../assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../../assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../../assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.colVis.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

         <script src="../../assets/pages/datatables.init.js"></script>
		<script src="../../assets/plugins/moment/moment.js"></script>


    <script src="../../assets/plugins/timepicker/bootstrap-timepicker.js"></script>
	<script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		       
	<!-- Sweet-Alert  -->
    <script src="../../assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
	   <script src="js/jquery.form-pickers.init.js"></script>
	   <script>
	   $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="servicesscript.js"></script>
</body>

</html>
<?php }}}?>
