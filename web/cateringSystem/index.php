<?php 
include('../includes/connection.php');
$sqlquery = mysql_query("SELECT * FROM tbl_catererinfo WHERE cid = '".intval($_GET['id'])."' AND c_status = 'Register'") or die (mysql_error());
if(mysql_num_rows($sqlquery)){
while($sqlrow = mysql_fetch_array($sqlquery)){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | <?php echo mysql_real_escape_string($sqlrow['c_name']);?> </title>
	<link href="../assets/images/si1.png" rel="shortcut icon">
	<!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">	
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<link href="../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<!-- Sweet Alert -->
        <link href="../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
        <script src="js/jquery.js"></script>
		<style>
		#img:hover{
	-moz-transform: scale(2.0);
  -webkit-transform: scale(2.0);
  transform: scale(2.0);
}
		</style>
</head><!--/head-->

       
<!--*********************************************START OF NAVIGATION BAR****************************************-->
<div id="loadingLogs"></div>
<body>

<img src="<?php echo '../settings/account/'.$sqlrow['c_avatar'];?>" class="img-responsive wow fadeInDown"  width="100%;" style="height:200px;"/>


        <nav class="navbar navbar-inverse" role="banner" style="background-color:#821a1a">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index?id=<?php echo $sqlrow['cid']?>+&title=<?php echo $sqlrow['c_name'];?>"><img src="../assets/images/logo/logo1.png" alt="logo" class="wow slideInLeft"></a>
                </div>
    
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index?id=<?php echo $sqlrow['cid'];?>+&title=<?php echo $sqlrow['c_name'];?>" class="wow fadeInDown"><span class="fa fa-home"></span> Home</a></li>
                        <li><a href="contacts?id=<?php echo intval($sqlrow['cid'])?>+&title=<?php echo $sqlrow['c_name']?>+&header=<?php echo $sqlrow['c_avatar'];?>" class="wow fadeInDown"><span class="fa fa-mobile-phone"></span> Contact us</a></li>                 
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
<!--*********************************************START SLIDER************************************************-->

<div class="container-fluid">
<?php include('../phresModal.php');
	
	include('../viewServicesofferedModal.php');
	include('reservationPhModal.php');
?>
    <br>
    <h4 style="margin-left:15px;color:#821a1a;font-variant:small-caps;" class="wow slideInDown zoomInUp">Welcome to <span class="fa fa-cutlery"></span> <?php echo mysql_real_escape_string($sqlrow['c_name']);?></h4><hr>
    <?php include('../includes/connection.php');
			    $getId= intval($sqlrow['cid']);
										$sqlquery = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
										if($rows =  mysql_fetch_assoc($sqlquery)>0){?>
    
        <div class="col-md-9 wow fadeInDown">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background-color:#821a1a; padding:5px;">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                       
                   <?php include('../includes/connection.php');
			    $getId= intval($sqlrow['cid']);
				$count = 1;
										$query = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
										while($row =  mysql_fetch_assoc($query)){?>
                 <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count;?>"></li>
                                        
                                        <?php }mysql_close($con)?>
              
               
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
               <?php include('../includes/connection.php');
			    $getId= intval($sqlrow['cid']);
										$sqlquery = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId' LIMIT 1") or die (mysql_error);
										if($rows =  mysql_fetch_assoc($sqlquery)){?>
                  <div class="item active">
                  <img src="<?php echo '../settings/account/'.$rows['p_location'];?>" alt="" width="100%"  class="img-responsive wow fadeInDown" style="height:300px;">
                </div>
                                        
                                        <?php }mysql_close($con)?>
                   <?php include('../includes/connection.php');
			    $getId= intval($sqlrow['cid']);
										$query = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
										while($row =  mysql_fetch_assoc($query)){?>
                  <div class="item">
                  <img src="<?php echo '../settings/account/'.$row['p_location'];?>" alt="<?php echo '../settings/account/'.$row['p_location'];?>" width="100%" class="img-responsive wow fadeInDown" style="height:300px;">
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
           

<!--*********************************************CATERING PACKAGES************************************************-->
     
<div class="row">
	<div class="col-md-12">	  
            <?php include('../includes/connection.php');
			$getId =  intval($sqlrow['cid']);
			$sql = mysql_query("SELECT * FROM tbl_adon WHERE addOn_catID = '$getId' AND addOn_stat = 'Available' order by addOn_price") or die (mysql_error());
			if(mysql_num_rows($sql)>0){
				while($row = mysql_fetch_array($sql)){?> 
				
			<div class="col-sm-10 col-sm-5 col-sm-6">
			<hr>
			<div class="col-sm-7">
						<img src="../settings/account/<?php echo $row['a_images'];?>" class="img-responsive img-thumbnail wow fadeInDown"width="100%;"></div>
						<div class="col-sm-5">
						<div class="row">
						<div class="col-sm-12">
						<div class="panel panel-default" style="background-color:#FFF;">
						<h4 class="wow fadeInDown" style="font-variant:small-caps;">
						<?php echo $row['addOn_name']?></h4>
						<h5 class="wow fadeInDown" style="font-variant:small-caps;">&#8369; <?php echo number_format($row['addOn_price'],2,'.',',');?></h5>
						
						<div class="panel-footer">
						<a href="javascript:void(0);" data-toggle="modal" data-target="#"  class="btn btn-danger btn-block wow fadeInDown" style="background-color:#821a1a;" onclick="addToordersection(<?php echo $row['adonID']?>,'<?php echo $row['addOn_name']?>','<?php echo $row['a_images']?>',<?php echo $row['addOn_price']?>)"><i class="glyphicon glyphicon-shopping-cart"></i> Order</a>
						</div>
						</div>
						</div>
						</div>
					</div>
					
			</div>
			
			
		
				
			<?php }}else {
				echo '';
			}?>
			</div>
</div>
            </div>
             <?php }else {echo ' <div class="col-md-9"><div style="hieght:450xp;"><p class="wow slideInRight">Your banner here... </p>
			 <p class="wow zoomIn">this page is underconstruction</p></div></div>';}?>
   
        <div class="col-md-3" >
            <div class="panel panel-danger wow fadeInDown wow ">
              <!-- Default panel contents -->
              <div class="panel-heading wow fadeInDown" style="font-weight:bold; font-size:16px; color:#FFF;background-color:#821a1a;font-variant:small-caps;font-size:15px;"><span class="fa fa-cutlery"></span> Services Offered </div>
              <ul class="list-group">
              <?php
				include('../includes/connection.php');
		$squery = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '$getId'") or die (mysql_error());
				while($row = mysql_fetch_assoc($squery)){?>
                <li class="list-group-item" style="font-variant:small-caps;font-size:16px;color:#000;"> <span style="color:#000; font-weight:bold;" class="wow fadeInDown"><i class="fa fa-gift"></i> <?php echo $row['ocassion_name'];?></span> <span style="color:green;" class="glyphicon glyphicon-ok pull-right wow fadeInDown"></span></li>
              <?php  } ?>
              </ul>
			  		
		<a href="#viewservicesOfferedModal" data-toggle="modal" data-target="#viewservicesOfferedModal"  class="btn btn-danger btn-lg btn-block wow fadeInDown" style="background-color:#821a1a;" ><i class="fa fa-gift"></i> Rate per package reservation</a>
                 <a href="#viewservicesOfferedModal" data-toggle="modal" data-target="#resPhModal"  class="btn btn-danger btn-lg btn-block wow fadeInDown" style="background-color:#821a1a;"><i class="fa fa-user"></i> Rate per head reservation</a>
			

            </div>
			<!--- order section --->
			<div class="row">
			<form onsubmit="return submitOrder()" name="submitOrderform">
				<div id="orderSection">
				<div class="table-responsive wow fadeInDown">
					<table class="table table-striped table-hover table-bordered wow fadeInDown" width="100%;">
					<thead>
					<tr>
					<th><span class="wow fadeInDown"><i class="fa fa-cutlery"></i> Order</span></th>
					<th><span class="wow fadeInDown"><i class="glyphicon glyphicon-list-alt"></i> Order list</span></th>
					<th><span class="wow fadeInDown"><center><i class="fa fa-gear"></i></center></span></th></tr></thead>
					<tbody id="orderBodylist" class="wow fadeInDown"></tbody>
					</table>
					
					</div>
					<div class="row">
					<div class="col-sm-6"></div>
					<div class="col-sm-6">
					<span class="pull-right">
						<button class="btn btn-danger btn-sm wow fadeInDown" style="background-color:#821a1a;" onclick="viewOrderform();" type="button" id="btnOrder"><i class="glyphicon glyphicon-shopping-cart"></i> Order</button>
					</span>
					</div>
				<div id="orderForm" >
					<div class="col-md-12" style="margin-top:10px;">
					<div class="row">
						<div class="col-sm-4"><label class="pull-right wow fadeInDown">Qty<span style="color:red;">*</span></label></div>
						<div class="col-sm-8 wow fadeInDown"><input type="number" class="form-control wow fadeInDown" id="orderQty" name="orderQty" required placeholder="0" onkeyup="orderSum(this.value);"></div>
					</div>
					<div class="row"style="margin-top:10px;">
						<div class="col-sm-4"><label class="pull-right wow fadeInDown">Total <span>&#8369;</span></label></div>
						<div class="col-sm-8"><input type="text" class="form-control wow fadeInDown" id="orderTotal" placeholder="0" required readonly>
						<input type="hidden" id="orderTotal1" name="orderTotal" required>
						<input type="hidden" id="catId" name="catId" value="<?php echo $sqlrow['cid'];?>"></div>
					</div>
					<div class="row" style="margin-top:10px;">
					<p class="wow fadeInDown"><em>Information details</em>
					 <br><em class="wow fadeInDown">Fields with <span style="color:red;">*</span> are required</em></p>
						<div class="col-sm-4"><label class="pull-right wow fadeInDown">Name<span style="color:red">*</span>:</label></div>
						<div class="col-sm-8"><input type="text" name="customerName" class="form-control wow fadeInDown" required></div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-sm-4"><label class="wow fadeInDown pull-right">Contact<span style="color:red">*</span>:</label>
						</div>
						<div class="col-sm-8"><input type="text" name="customerNo" class="wow fadeInDown form-control" required></div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-sm-4"><label class="wow fadeInDown pull-right">Address<span style="color:red">*</span>:</label>
						</div>
						<div class="col-sm-8"><textarea class="wow fadeInDown form-control" name="customerAddress"></textarea></div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-sm-4"><label class="wow fadeInDown pull-right">Message<span style="color:red">*</span>:</label>
						</div>
						<div class="col-sm-8"><textarea class="wow fadeInDown form-control" name="customerMsg"></textarea></div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-sm-4"><label class="wow fadeInDown pull-right">Order date<span style="color:red">*</span>:</label>
						</div>
						<div class="col-sm-8"><input type="text" name="orderDate" id="datepicker-autoclose1" class="wow fadeInDown form-control" required placeholder="mm/dd/yyyy"></div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-sm-4"><label class="wow fadeInDown pull-right">Time<span style="color:red">*</span>:</label>
						</div>
						<div class="col-sm-8"><input type="text" name="orderTime" id="timepicker1" class="wow fadeInDown form-control" required placeholder="00:00"></div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-sm-4"><label class="wow fadeInDown pull-right">Order type<span style="color:red">*</span>:</label>
						</div>
						<div class="col-sm-8"><select class="wow fadeInDown form-control"name="orderType">
						<option value="cod">Cash on delivery</option>
						<option value="pickup">Pick up (@ our location)</option>
						</select></div>
					</div>
					<div class="row"style="margin-top:5px;">
						<div class="col-sm-12">
							<button class="wow fadeInDown btn btn-success btn-block btn-sm" type="submit" name="submit" id="submit"><i class="fa fa-check"></i> Submit</button>
						</div>
					</div>
					</div>
				</div>
					</div>
				</div>
				</form>
			</div>
   
                
                </div>  
        </div>

        
</div><!--/.container-->
<br><br>

<!--*************************************************** FOOTERS **********************************************-->
<footer id="footer" class="midnight-blue" style="background-color:#821a1a">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown">
                &copy; <?php echo date('Y')?> <a target="_blank" href="#" title="#" class="wow fadeInDown"><span class="fa fa-cutlery"></span> <?php echo mysql_real_escape_string($sqlrow['c_name']);?></a>. All Rights Reserved.
                </div>
               
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
	<script src="../assets/plugins/moment/moment.js"></script>
     	<script src="../assets/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		       
	<!-- Sweet-Alert  -->
       <script src="../assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
	   <script src="js/jquery.form-pickers.init.js"></script>
	   <script>
	   $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
    <script src="script.js"></script>
    <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
jQuery(document).ready(function() {

				jQuery('#timepicker').timepicker({
					defaultTIme : true
				});
				jQuery('#timepicker1').timepicker({
					defaultTIme : true
				});
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-autoclose').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
				 jQuery('#datepicker1').datepicker();
                jQuery('#datepicker-autoclose1').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
			});

</script>
</body>
</html>

<?php }}else {
	header("location:../index");
	
}?>