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
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
	<!-- Sweet Alert -->
    <link href="../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
	<link href="../../assets/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
	
</head>
<body onload="notification();loadphotos();">
<!-- header -->
        <?php include('header.php');?>
<div class="wrapper">
	<div class="container">
	<?php include('addphotomodal.php');
	include('viewinfo.php');
	include('changeuandpModal.php');
	?>
	<br>

		<h4 class="wow fadeInDown" style="color:#821a1a">Howdy, <i class="fa fa-cutlery"></i> <?php echo $sqlrow['c_name'];?>!</h4>
<span class="pull-right wow slideRight">
		<label  class="badge wow slideRight" id="notificon"></label>
	</span>
		<hr>
		<div class="row">
			<div class="col-lg-4">
				<label class="wow fadeInDown"><span class="text-muted">Home <i class="fa fa-arrow-right"></i> </span><i class="fa fa-gears"></i> My profile
				</label>
			</div>
			<div class="col-lg-8">
				<div class="pull-right">
				<button class="wow fadeInDown btn btn-danger" data-toggle="modal" data-target="#uandpModal">Change username and password</button>
					<button class="wow fadeInDown btn btn-danger" data-toggle="modal" data-target="#viewinfoModal">View info</button>
					<button class="wow fadeInDown btn btn-danger" data-toggle="modal" data-target="#addphotomodal">Add photos</button>
				</div>
			</div>
			</div>
				<div class="row" style="margin-top:5px;">
			<div class="wow fadeInDown col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
			<div class="col-lg-12">
				<?php if($sqlrow['c_avatar']==''){
					echo '<img src="" class="img-responsive img-thumbnail" width="100%" alt ="Banner here.." style="height:150px;">';
				}else {
					?>
					<img src="<?php echo $sqlrow['c_avatar']?>"class="img-responsive img-thumbnail" width="100%" style="height:180px;" alt ="Banner here..">
					<?php
				}?>
				</div>
			
				<div class="col-md-8">
				<br>
				<?php include('includes/mysql.php');
			    $getId= intval($sqlrow['cid']);
										$sqlquery = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
			if(mysql_num_rows($sqlquery)>0){?>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background-color:#821a1a; padding:5px;">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                       
                   <?php include('includes/mysql.php');
			    $getId= intval($sqlrow['cid']);
				$count = 1;
										$query = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
										while($row =  mysql_fetch_assoc($query)){?>
                 <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count;?>"></li>
                                        <?php }mysql_close($con)?>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
               <?php include('includes/mysql.php');
			    $getId= intval($sqlrow['cid']);
										$sqlquery = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId' LIMIT 1") or die (mysql_error);
										if($rows =  mysql_fetch_assoc($sqlquery)){?>
                  <div class="item active">
                  <img src="<?php echo $rows['p_location'];?>" alt="" width="100%"  class="img-responsive wow fadeInDown" style="height:300px;">
                </div>
                                        
                                        <?php }mysql_close($con)?>
                   <?php include('includes/mysql.php');
			    $getId= intval($sqlrow['cid']);
										$query = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
										while($row =  mysql_fetch_assoc($query)){?>
                  <div class="item">
                  <img src="<?php echo $row['p_location'];?>" alt="<?php echo $row['p_location'];?>" width="100%" class="img-responsive wow fadeInDown" style="height:300px;">
                </div>
                                        <?php }mysql_close($con)?>
              </div>
                              
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
			 
            </div>
			<?php }else {
				echo '<label>Photo slider here..</label>';
			}?>	
				</div>
				<div class="col-md-4">
				<form method="post" enctype="multipart/form-data"  action="updatebanner_process">
				<span class="wow fadeInDown pull-right">
				<label>Upload banner</label>
					<input type="file" name="file" class="form-control" required><br>
					<button class="pull-right btn-sm btn btn-danger" type="submit"><i class="fa  fa-upload"></i> Upload</button>
				</span>
				</form>
				
				<div class="col-sm-12" >
					<div class="table-responsive"style="height:300px;">
						<table class="table table-striped table-condensed" width="100%;">
						<thead>
							<tr style="color:#000;">
								<th><h3 style="color:#000;"><strong>My photos</strong></h3></th>
								<th><center><i class="fa fa-gear"></i></center></th>
							</tr>
						</thead>
						<tbody id="photolistbody"></tbody>
						</table>
					</div>
				</div>
				</div>
				
			
			</div>
			</div>
			
			</div>
	
	</div>
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
		       
	<!-- Sweet-Alert  -->
    <script src="../../assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
	<script src="../../assets/plugins/dropzone/dropzone.js"></script>
	
	   
	   <script>
	   $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="mwpscript.js"></script>
</body>

</html>
<?php }}}?>
