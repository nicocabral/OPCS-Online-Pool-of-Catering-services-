<?php session_start();
error_reporting(E_ALL);
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['type'])){
	header("location:index.php");
	
}else if ($_SESSION['type']!= 'admin'){
	header("location:includes/logout_process.php");
}else{?>
<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App Favicon icon -->
        <link rel="shortcut icon" href="../../assets/images/si1.png">
        <!-- App Title -->
        <title>WTN : Online Pool of Catering Service</title>

       
		<!-- Sweet Alert -->
        <link href="../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
		<link href="../../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link href="../../assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="../../assets/js/modernizr.min.js"></script>
		
		 <script type="text/javascript" src="../../assets/js/jquery.js"></script>
<script type="text/javascript" src="notificationFunctions.js">
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
 opacity:0.5;
 background: url('../../assets/images/ajax-loader.gif') 50% 50% no-repeat #000;
}
.processLoader 
{
 position: fixed;
 left: 0px;
 top: 0px;
 width: 100%;
 height: 100%;
 z-index: 9999;
 opacity:0.5;
 background: url('process.gif') 50% 50% no-repeat #fff;
}
</style>
    </head>


<div class="processLoader"></div>
    <body onload="notifRequest(); notifContents();showFilterRes('notification');" style="font-family:'Cosmic',cursive;">
<?php  include('addAccountModal.php');
	   ?>
	   
 <!---header --->
  <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main" style="background-color:#81c868;">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                         <a href="admin" class="logo"><span>WTN:<i
                                class="md md-album" style="color:#FFF;"></i>PCS</span></a>
                    </div>
                    <!-- End Logo container-->
                    <div class="menu-extras">

<ul class="nav navbar-nav navbar-right pull-right">
<li class="dropdown navbar-c-items">
	<a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true" id="notifRequest"></a>
	
    <ul class="dropdown-menu dropdown-menu-lg" >

	 </li>
            <li class="list-group slimscroll-noti notification-list" id="notifContents">  
							</li>									
                                    <li>
                                        <a href="notification" class="list-group-item text-right">
                                            <small class="font-600">See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown navbar-c-items">
                                <a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true">
		<?php include('includes/connection.php');

		$accountID = intval($_SESSION['adminID']);
		$query = mysql_query("SELECT * FROM tbl_wtnadminavatar WHERE account_id = '$accountID'") or die (mysql_error());
		if(mysql_num_rows($query)==0){?>
		<img src="../../assets/images/avatar.png" alt="user-img" class="img-circle"> 
		<?php }else {
			while($row = mysql_fetch_assoc($query)){
				$img = $row['account_avatar'];?>
			<img src="<?php echo $row['account_avatar']?>" class="img-circle" alt="user-img">
			<?php }
		}?>
		</a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile"><i class="ti-user text-custom m-r-10"></i> Profile</a></li>                    
                                    <li><a href="includes/logout_process?logout=<?php echo $_SESSION['adminID'];?>"><i class="ti-power-off text-danger m-r-10"></i> Logout</a></li>
                                </ul>
                            </li>
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
		<!--- nav --->
<div class="topbar-main navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu active">
                                <a href="admin"><i class="glyphicon glyphicon-home"></i>Home</a>
                                
                            </li>
							 <li class="has-submenu">
                                <a href="#"><i class="fa fa-cogs"></i>Module</a>
                                <ul class="submenu">
                                   
                                    <li>
                                        <a href="addClient"><i class="fa fa-gear"></i> Manage Clients</a>
                                    </li>
									<li><hr></hr></li>
                                    <li>
                                   <a href="adminList"><i class="glyphicon glyphicon-cog"></i> Manage Admin User</a>
                                    </li>
                                    <li>
                                        <a href="#addAccountModal" data-toggle="modal" data-target="#addAccountModal"><i class="fa fa-plus-circle"></i> Add Admin</a>
                                    </li>
									
                                </ul>
                            </li>
							<li class="has-submenu">
                                <a href="#"><i class="glyphicon glyphicon-map-marker"></i>Locations</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="location"><i class="fa fa-plus-circle"></i> Add Locations</a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                        </ul>
                        <!-- End navigation menu        -->
                    </div>
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->		
        </header>
        <!-- End Navigation Bar-->
<!--- COntents --->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Signed up Listing</li>
                           
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="has-success col-lg-12">
                        <div class="card-box" style="box-shadow: 1px 1px 1px 1px #888888;">
                            <div class="row">
							<div class="col-sm-4">
							<div class="col-sm-3"><label style="margin-top:10px;">Filter by:</label></div>
							<div class="col-sm-9">
								<select class="form-control" onchange="showFilterRes(this.value);">
								<option value="notification">Notification</option>
								<option value="message">Message</option>
								</select>
								<input type="hidden" id="filter" value='notification'>
								</div>
							</div>
                                <div class="col-sm-8 pull-right">
                                    <form role="form">
                                        <div class="form-group contact-search m-b-30">
                                            <input type="text" id="search" 
											onkeyup="showData(this.value)" class="form-control" placeholder="Search..." name="search">
                                            <button type="submit" class="btn btn-white">
											<i class="fa fa-search"></i></button>
                                        </div> <!-- form-group -->
                                    </form>
                                </div>
                                
                            </div>

                            <div class="table-responsive" id="filterRes">
                                
                            </div>
                        </div>

                    </div> <!-- end col -->


                </div>

                <!-- Footer -->
                <footer class="footer text-right" style="background-color:#81c868;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6" style="color:#FFF;">
                                © 2016. All rights reserved.
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- jQuery  -->
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/detect.js"></script>
        <script src="../../assets/js/fastclick.js"></script>
        <script src="../../assets/js/jquery.slimscroll.js"></script>
        <script src="../../assets/js/jquery.blockUI.js"></script>
        <script src="../../assets/js/waves.js"></script>
        <script src="../../assets/js/wow.min.js"></script>
        <script src="../../assets/js/jquery.nicescroll.js"></script>
        <script src="../../assets/js/jquery.scrollTo.min.js"></script>
       <!-- Sweet-Alert  -->
       <script src="../../assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
       <!-- plugins js -->
        <script src="../../assets/plugins/moment/moment.js"></script>
     	<script src="../../assets/plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="../../assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- App core js -->
        <script src="../../assets/js/jquery.core.js"></script>
        <script src="../../assets/js/jquery.app.js"></script>
		<!-- page js -->
        <script src="../../assets/pages/jquery.form-pickers.init.js"></script>
		<script src="script.js"></script>
		<script src="notifFunctionProcess.js">
		

		</script>
		
    </body>

</html>
<?php }?>