<?php 
include('../includes/connection.php');
$sqlquery = mysql_query("SELECT * FROM tbl_catererinfo WHERE cid = '".$_GET['id']."' AND c_status = 'Register'") or die (mysql_error());
if(mysql_num_rows($sqlquery)){
while($sqlrow = mysql_fetch_array($sqlquery)){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contacts | <?php echo mysql_real_escape_string($sqlrow['c_name']);?></title> 
    <link href="../assets/images/si1.png" rel="shortcut icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
     
</head><!--/head-->

<!--*********************************************START OF NAVIGATION BAR****************************************-->
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
                    <a class="navbar-brand" href="index?id=<?php echo $sqlrow['cid']?>+&title=<?php echo $sqlrow['c_name']?>"><img src="../assets/images/logo/logo1.png" alt="logo" class="wow fadeInDown"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li ><a href="index?id=<?php echo intval($sqlrow['cid'])?>+&title=<?php echo $sqlrow['c_name']?>+&header=<?php echo $sqlrow['c_avatar'];?>" class="wow fadeInDown"><span class="fa fa-home"></span> Home</a></li>
                        <li class="active"><a href="contacts?id=<?php echo intval($sqlrow['cid'])?>+&title=<?php echo $sqlrow['c_name']?>+&header=<?php echo $sqlrow['c_avatar'];?>" class="wow fadeInDown"><span class="fa fa-mobile-phone"></span> Contact us</a></li>                 
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
  
<!--*********************************************START OF CONTACT INFO****************************************-->

<br><br>
<div class="wow fadeInDown container">
        <section id="contact-info">
                <center><span style="font-size:35px; font-weight:bold; font-family:verdana; color:#821a1a;font-variant:small-caps;" class="wow fadeInDown">How to reach us?</span></center>

            <div class="left wow fadeInDown">
                <hr>
               <div class="col-md-6">
                <img src="../assets/images/andre-icon.png" class="img-responsive pull-right" />
               </div> 
               <div class="col-md-6">
                <p class="lead">
                    <br>
                    <p><span style="font-size:20px; font-weight:bold; font-family:verdana; color:#821a1a;font-variant:small-caps;"><i class="fa fa-cutlery"></i> <?php echo $sqlrow['c_name'];?></span>
					<?php 
					include('../includes/connection.php');
					$query = mysql_query("SELECT *  FROM tbl_catererinfo WHERE cid = '".$sqlrow['cid']."'") or die (mysql_error());
					while($row = mysql_fetch_array($query)){?>
                    <br><b>Address/Location:</b> <?php echo $row['c_address']?><b><br>Tel/Phone:</b> <?php echo $row['c_contact']?><b><br>Email Address:</b> <?php echo $row['c_email']?></p>
                    <?php }?>
					
                    
                </p>
                <hr>
                

                </div>
            </div>
        
        </section>
</div>
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
</body>
</html>
<?php }}else {
	header('location:../index');
}?>