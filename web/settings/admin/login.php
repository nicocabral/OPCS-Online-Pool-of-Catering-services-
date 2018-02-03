<?php
 session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['type'] =='admin'){
		header("location:index");
	} else {
		error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="../../assets/images/si1.png">

		<title>WTN : Online Pool of Catering Services</title>
		<!-- Sweet Alert -->
        <link href="../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
		<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="../../assets/js/modernizr.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.js"></script>
       
        <script type="text/javascript">
$(window).load(function(){
    $(".loader").fadeOut("slow");
    $("#processGIF").hide();
});


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

</style>

	</head>
	<div class="loader"></div>
	
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		<div class="wrapper-page">
			<div class=" card-box">
				
				<div class="panel-body">
					<form id="loginForm" role="form">
						<div class="user-thumb text-center">
							<img src="../../assets/images/s4.png" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
						</div>
						
						<div class="form-group">
							<h3 class="text-center">WTN admin site</h3>
							<p class="text-muted text-center">
								Enter username and password to access the admin.
								<img src="process.gif" width="15%" id="processGIF">
							</p>
							
                            <div id="logMsg" class="text-center">
							
							</div>
							
				<div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username"
name="username"	style="border-radius:0;-webkit-border-radius:0;moz-border-radius:0;" placeholder="Username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" style="border-radius:0;-webkit-border-radius:0;moz-border-radius:0;" placeholder="Password" required>
  </div>	
					 
<button type="reset" id="submit" class="btn btn-default w-sm waves-effect waves-light" style="border-radius:0;-webkit-border-radius:0;moz-border-radius:0;">
										Clear
									</button>
<button type="submit" id="submit" class="btn btn-danger w-sm waves-effect waves-light" style="border-radius:0;-webkit-border-radius:0;moz-border-radius:0;" name="login">
										<i class="glyphicon glyphicon-log-in"></i> Sign In
									</button>				
								
						</div>
						
					</form>
       

				</div>
			</div>

		</div>

		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/detect.js"></script>
        <script src="../../assets/js/fastclick.js"></script>
        <script src="../../assets/js/jquery.slimscroll.js"></script>
        <script src="../../assets/js/jquery.blockUI.js"></script>
        <script src="../../assets/js/waves.js"></script>
        <script src="../../assets/js/jquery.nicescroll.js"></script>
        <script src="../../assets/js/jquery.scrollTo.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="../../assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="../../assets/pages/jquery.sweet-alert.init.js"></script>
        <script src="../../assets/js/jquery.core.js"></script>
        <script src="../../assets/js/jquery.app.js"></script>

		<script src="../../assets/js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
<script>
$(document).ready(function(){
	
		$("#loginForm").submit(function(event){
	  //$(".loader").fadeIn();
	  $("img#processGIF").fadeIn();
	  $("#logMsg").hide();
	  //disable the default form submission
	  event.preventDefault();

	  //grab all form data  
	  var formData = new FormData($(this)[0]);
		
	 
	
	  $.ajax({
	  url: 'includes/login_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	  $("img#processGIF").fadeOut();
	  //$(".loader").fadeOut();
	  $("#logMsg").fadeIn(2000);
	  $("#logMsg").html(data);
	   //$(".loader").fadeOut("slow");
	   
	  }
	  });
	  return false;
	});
		});
	</script>
	<script>
	$("#username").keypress(function(){
	  $("#logMsg").fadeOut();
	 
	});

	</script>
	</body>
</html>
	<?php }?>