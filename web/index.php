<?php error_reporting(E_ALL);?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App Favicon icon -->
        <link rel="shortcut icon" href="assets/images/si1.png">
        <!-- App Title -->
        <title>WTN : Online Pool of Catering Services</title>
<!-- Sweet Alert -->
        <link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
		<!-- Custom box css -->
        <link href="assets/plugins/custombox/css/custombox.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<!-- Carousel css -->
        <link href="assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		
		
        <script src="assets/js/modernizr.min.js"></script>
		<script src="assets/js/jquery.js"></script>
		
<script type="text/javascript"src="indexFunction.js">
	
</script>
<style>
.loader 
{
 position: fixed;
 left: 0px;
 top: 0px;
 width: 100%;
 height: 100%;
 z-index: 9999;
 opacity:1;
 background: url('assets/images/ajax-loader.gif') 50% 50% no-repeat #FFF;
}
div#specialBox {
	display: none;
	position: relative;
	z-index: 3;
	margin: 150px auto 0px auto;
	width: 500px; 
	height: 300px;
	background: #FFF;
	color: #000;
}
</style>


    </head>

<div class="loader"></div>

    <body style="background-color:#FFF;">

<?php include('signinModal.php');
      include('signupModal.php');
	  include('termsAndCondition.php');
	  include('messageModal.php');
	  
	  
	  ?>
        <!-- Navigation Bar-->
	
        <header id="topnav">
		
            <div class="topbar-main" style="background-color:#821a1a;">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo"style="font-variant:small-caps;">
					<center>
                         <a href="index.php" class="logo" ><span style="color:#FFF;font-variant:small-caps;">WTN</span></a>
								
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown navbar-c-items">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                   <i class="fa  fa-slideshare"></i> Join Us!
                                </a>
                           <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)" onclick="signIn();"><i class="ti-user text-custom m-r-10"></i> Sign in</a></li>
                                    <li><a href="javascript:void(0)" onclick="signUp();"><i class="ti-settings text-custom m-r-10"></i> Sign Up</a></li>
                                   
                                </ul>

                           
                        </ul>
                         <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>
			<div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
						<div class="row" style="margin-bottom:20px; margin-top:20px;" >
						<div class="col-md-2">
						
						</div>	
					
						<div class="has-success col-md-8">
					<center><h5 style="font-variant:small-caps;">
					WTN<br><span class="fa fa-cutlery"></span> Online Caterers</h5></center>
						
	<select class="input-lg selectpicker m-b-0 show-tick has-submenu" data-style="btn-white" 
	 data-icon="fa fa-search" data-live-search="true" name="search-field" onchange="searchLocation(this.value)" style="box-shadow: 1px 1px 1px 1px #888888;font-variant:small-caps; background-color:#821a1a">
	 
				<option data-icon="fa fa-search" class="submenu" value=""> Select your location</option>
				<!---------- sql query -------->
				<?php include('includes/connection.php');
				$query = mysql_query("SELECT tbl_townloc.*, tbl_city.cityid as tcid,tbl_city.cityname FROM tbl_townloc LEFT JOIN tbl_city ON tbl_townloc.cityid = tbl_city.cityid") or die (mysql_error());
				if(mysql_num_rows($query)>0){
					while($row = mysql_fetch_assoc($query)){?>
				<!-------- option ------------->
				<option value="<?php echo $row['townid']?>" data-icon="fa fa-street-view"><?php echo $row['town'];?></option>
					<?php }
				}?>
							</select>
							
							</div>
						<div class="col-md-2">
						<div class="col-sm-6">
						<img src="assets/images/chef image.png" class="img-responsive" style="height:100px;"></div>
							<div class="col-sm-6"></div>
						</div></div>
					</div>
			</div>
		</div>
	</div>

        </header>
        <!-- End Navigation Bar-->

<br><p></p>

    
        <div class="wrapper">
		
            <div class="container" >
             
               
                <div class="row" style="margin-top:5px;">
				<div id="backImg">
				<center>
				<img src="assets/images/logo.jpg" class="img-responsive" width="30%;">
				</center>
			
				
				   
				  </div><div class="col-lg-12" >
					
                                <!-- Full width modal -->
             <div class="card-box" id="cardBox" style="
						-moz-box-shadow:inset 0 1px	1px rgba(0,0,0,0.1), 0 0 0 6px #f0f0f0;
						-webkit-box-shadow:inset 0 1px	1px rgba(0,0,0,0.1), 0 0 0 6px #f0f0f0;
						 box-shadow:inset 0 1px	1px rgba(0,0,0,0.1), 0 0 0 6px #f0f0f0;box-shadow: 1px 1px 1px 1px #888888;background:url(assets/images/promis.jpg) no-repeat 50% 50%; margin-top:15px;border-radius:0;">
			<div id="search-Res" class="nicescroll p-20" style="height:300px;">
			
			</div>
			</div>
					
					</div>
					</div>
                </div>
				<br><p></p>
                <!-- Footer -->
                <footer class="footer text-right" style="background-color:#821a1a;font-variant:small-caps; font-size:14px;">
                    <div class="container">
                        <div class="row">
						<center>
                            <div class="col-xs-12" style="color:#FFF;">
                                © WTN 2016 - <?php echo date('Y')?>. All rights reserved.
                            </div>
						</center>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
		<!-- Sweet-Alert  -->
       <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
		
        <script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

       
        <script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="assets/plugins/autocomplete/countries.js"></script>
        <!-- Modal-Effect -->
        <script src="assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="assets/plugins/custombox/js/legacy.min.js"></script>
		<!-- plugins js -->
        
		<!-- owl carousel js -->
        <script src="assets/plugins/owl.carousel/dist/owl.carousel.min.js"></script>
		<script src="assets/plugins/moment/moment.js"></script>
     	<script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- App core js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
		<!-- page js -->
        <script src="assets/pages/jquery.form-pickers.init.js"></script>
<script src="functionProcess.js"></script>
    </body>
</html>