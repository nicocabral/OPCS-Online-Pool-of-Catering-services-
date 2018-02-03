<?php session_start();
error_reporting(E_ALL);
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
	
</head>
<body onload="notification();">
<!-- header -->
        <?php include('header.php');?>
<div class="wrapper">
	<div class="container">
	<?php 
		 include('vspModal.php');	?>
	<br>

		<h4 class="wow fadeInDown" style="color:#821a1a">Howdy, <i class="fa fa-cutlery"></i> <?php echo $sqlrow['c_name'];?>!</h4>
<span class="pull-right wow slideRight">
		<label  class="badge wow slideRight" id="notificon"></label>
	</span>
		<hr>
		<div class="row">
			<div class="col-lg-4">
				<label class="wow fadeInDown"><span class="text-muted">Home <i class="fa fa-arrow-right"></i> </span><i class="fa fa-street-view"></i> Locations listing
				</label>
			</div>
			<div class="col-md-8">
			<span class="pull-right">
			<p class="wow fadeInDown "><strong><em><i class=" fa fa-hand-pointer-o"></i> Double click on the location to add on your list</em></strong></p>
			</span>
			</div>
			
			</div>
	
		
		<!-- end of row -->
		<div class="row" style="margin-top:5px;">
			<div class="wow fadeInDown col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
			<div>
			<div class="col-lg-12">
		
			
			<div id="locationData">		
				
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
<script src="locationscript.js"></script>
</body>

</html>
<?php }}}?>
