 <style>
 .a_demo_two {
	background-color:#F08080;
	padding:10px;
	position:relative;
	font-family: 'Comic Sans MS', cursive;
	font-size:12px;
	text-decoration:none;
	color:#fff;
	background-image: linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -o-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -moz-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -webkit-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -ms-linear-gradient(bottom, rgb(44,160,202) 0%, rgb(62,184,229) 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, rgb(44,160,202)),
	color-stop(1, rgb(62,184,229))
	);
	-webkit-box-shadow: inset 0px 1px 0px #7fd2f1, 0px 6px 0px #156785;
	-moz-box-shadow: inset 0px 1px 0px #7fd2f1, 0px 6px 0px #156785;
	-o-box-shadow: inset 0px 1px 0px #7fd2f1, 0px 6px 0px #156785;
	box-shadow: inset 0px 1px 0px #7fd2f1, 0px 6px 0px #156785;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
}

.a_demo_two::before {
	background-color:#F08080;
	content:"";
	display:block;
	position:absolute;
	width:100%;
	height:100%;
	padding-left:2px;
	padding-right:2px;
	padding-bottom:4px;
	left:-2px;
	top:5px;
	z-index:-1;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	-o-border-radius: 6px;
	border-radius: 6px;
	-webkit-box-shadow: 0px 1px 0px #fff;
	-moz-box-shadow: 0px 1px 0px #fff;
	-o-box-shadow: 0px 1px 0px #fff;
	box-shadow: 0px 1px 0px #fff;
}

.a_demo_two:active {
	color:#f08080;
	text-shadow: 0px 1px 1px rgba(255,255,255,0.3);
	background:#f08080;
	-webkit-box-shadow: inset 0px 1px 0px #7fd2f1, inset 0px -1px 0px #156785;
	-moz-box-shadow: inset 0px 1px 0px #7fd2f1, inset 0px -1px 0px #156785;
	-o-box-shadow: inset 0px 1px 0px #7fd2f1, inset 0px -1px 0px #156785;
	box-shadow: inset 0px 1px 0px #7fd2f1, inset 0px -1px 0px #156785;
	top:7px;
}

.a_demo_two:active::before {
	top:-2px;
}
#paper-lift:after,#paper-lift:before{bottom:15px;width:50%;height:20%;max-width:300px;max-height:100px;-webkit-box-shadow:0 15px 10px rgba(31,31,31,.7);box-shadow:0 15px 10px rgba(31,31,31,.7)}#paper-lift:before{left:10px;-webkit-transform:rotate(-4deg);-ms-transform:rotate(-4deg);transform:rotate(-4deg)}#paper-lift:after{right:10px;-webkit-transform:rotate(4deg);-ms-transform:rotate(4deg);transform:rotate(4deg)}#paper-raise:before{top:0;left:0;width:100%;height:100%;-webkit-box-shadow:0 16px 10px -10px rgba(31,31,31,.5),0 1px 4px rgba(31,31,31,.3);box-shadow:0 16px 10px -10px rgba(31,31,31,.5),0 1px 4px rgba(31,31,31,.3)}
 </style>
 <script>
 function showTitle(id){
 $( "#hide-option"+id ).tooltip({
			hide: {
				effect: "explode",
				delay: 250
			}
		});
		return false;
}
function showTooltip(id){
	$( "#tooltiptitle"+id).tooltip({
			hide: {
				effect: "explode",
				delay: 250,
				
			}
		});
		return false;
}
 </script>
 <!-- Carousel css -->
        <link href="assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/plugins/magnific-popup/css/magnific-popup.css"/>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<?php $getId = intval($_GET['id']);
$getTownId = intval($_GET['tid']);
	
?>

<div class="panel panel-success" style="border-radius:0px; font-family:'Comic Sans MS', cursive;">
	<div class="panel panel-heading">
    	<?php 
		include('includes/connection.php');
		$query = mysql_query("SELECT * FROM tbl_catererinfo WHERE cid = '$getId'") or die (mysql_error());
			if(mysql_num_rows($query)>0){
				while($row = mysql_fetch_assoc($query)){
					echo '<h3 style="color:white;text-shadow:1px 1px 2px #888888;font-variant:small-caps;margin-left:100px; margin-right:100px;margin-top:0;
 " class="alert alert-success"><center><i class="fa fa-cutlery"></i> '.$row['c_name'].'</center></h3>';
					}}
					mysql_close($con);
		?>	
    </div>
    <img src="assets/images/hor_separator.png" width="100%" class="img-responsive">
    <div class="panel-body">
        	<div class="col-md-6">
            	 <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-captions" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-captions" data-slide-to="2"></li>
                                            <li data-target="#carousel-example-captions" data-slide-to="3"></li>
                                          
                                        </ol>
                                        <?php include('includes/connection.php');
										$sql = mysql_query("SELECT c_avatar,cid FROM tbl_catererinfo WHERE cid = '$getId'") or die (mysql_error());
										while($r = mysql_fetch_assoc($sql)){?>
                                        <div role="listbox" class="carousel-inner">
                                            <div class="item active">
                                                <img src="settings/myaccount/<?php echo $r['c_avatar'];?>" alt="First slide image" class="img-responsive"  width="100%" style="margin-bottom:5px; height:250px;border-color:#000;" />
                                            </div>
                                        <?php }mysql_close($con);?>
                                        <?php include('includes/connection.php');
										$sqlquery = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
										while($rows =  mysql_fetch_assoc($sqlquery)){?>
                                        <div class="item">
                                                 <img src="settings/myaccount/<?php echo $rows['p_location'];?>" alt="First slide image" class="img-responsive " style="margin-bottom:5px; height:250px;border-color:#000;" width="100%" />
                                                <div class="carousel-caption">
                                                    <h3 class="text-white font-600"><?php echo $row['p_title'];?></h3>
                                                    <p>
                                                        <?php echo $row['p_des'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php }mysql_close($con);?>
                                         </div>
                                        <a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
                                        <a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>
                                    </div>
                                    <!-- END carousel-->
                                    <div class="clear-fix"><br /><p></p></div>
                                 <div class="owl-carousel owl-theme" id="owl-multi">
                                   <?php include('includes/connection.php');
										$sqlquery1 = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '$getId'") or die (mysql_error);
										while($rows =  mysql_fetch_assoc($sqlquery1)){?>
                                <div class="item">
                                <a href="settings/myaccount/<?php echo $rows['p_location'];?>" class="image-popup" title="<?php echo $rows['p_title']?>">
                                    <img src="settings/myaccount/<?php echo $rows['p_location'];?>" class="img-responsive" />
                                    </a>
                                </div>
                                <?php }mysql_close($con);?>
                               

                            </div>
            </div><!-- end of col-md-6 -->
            <div class="col-md-6">
			<div class="row">
			<div class="col-md-6">
            <h3><i class="fa fa-shopping-basket"></i> Services Offered</h3>
			</div>
			<div class="col-md-6"><span class="pull-right" style="margin-top:5px;">
			<button class="btn btn-white waves-effect waves-light btn-rounded btn-custom"><i class="fa  fa-book"></i> Reservation (Per head)</button>
			</span>
			</div>
</div>			
                <div class="list-group list-group-alternate" > 
                 <?php 
				include('includes/connection.php');
		$squery = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '$getId'") or die (mysql_error());
				while($row = mysql_fetch_assoc($squery)){?>
									<a href="javascript:void(0)" onclick="showAsm(<?php echo $row['oid']?>);" class="list-group-item">
                                    <h4 style="color:#000;text-shadow:1px 1px 1px 1px #888888;font-variant:small-caps;">
                                    <i class="fa fa-cart-plus"></i> <?php echo $row['ocassion_name']?> </h4></a>
									<?php 
									include('servicesAccordionModal.php');
									}?>
								</div>      
            </div><!-- end of col-md-6 -->
			
			<img src="assets/images/hor_separator.png" width="100%" class="img-responsive">
			<div class="row">
				<div class="col-md-12">
					<h3 class="m-t-0"><i class=" fa fa-opencart"></i>Available for orders</h3>
				</div>
			</div>
			<div class="row">
			 <div class="m-b-15" style="font-family:'Comic Sans MS', cursive;">
			<?php include('includes/connection.php');
			$addOnquery = mysql_query("SELECT * FROM tbl_adon WHERE addOn_catID = '$getId' AND addOn_stat = 'Available'") or die (mysql_error());
			if(mysql_num_rows($addOnquery)>0){?>
				
				<?php while($aoq = mysql_fetch_assoc($addOnquery)){
					?>
					
                        <div class="col-sm-6 col-lg-3 col-md-4 mobiles " >
                            <div class="product-list-box thumb " style="box-shadow:1px 1px 1px 1px #888888;">
                                <a href="settings/myaccount/<?php echo $aoq['a_images']?>" class="image-popup" id="hide-option<?php echo $aoq['adonID']?>" onmouseover="showTitle(<?php echo $aoq['adonID']?>)" title="<?php echo $aoq['addOn_name']?>" style="font-family:'Comic Sans MS', cursive;">
                                    <img src="settings/myaccount/<?php echo $aoq['a_images']?>" class="thumb-img" alt="work-thumbnail" style="height:120px;">
                                </a>

                                <div class="price-tag" style="font-family:'Comic Sans MS', cursive;">
                                    <?php echo '&#8369;'.number_format($aoq['addOn_price']);?>
                                </div>
                                <div class="detail" style="font-family:'Comic Sans MS', cursive;">
                                    <h4 class="m-t-0"><a href="javascript:void(0);" id="tooltiptitle<?php echo $aoq['adonID']?>" onmouseover="showTooltip(<?php echo $aoq['adonID']?>)" class="text-dark" title="<?php echo $aoq['addOn_name']?>"> <?php echo $aoq['addOn_name']?></a></h4>
                                    <button class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#myorderModal<?php echo $aoq['adonID']?>"><i class="fa fa-cart-plus"></i> Order</button>
                                </div>
								
                            </div>
                        </div>
						
						

			
			<?php 
			 include('orderModal.php');}
			}else  {echo '';}?>
			</div>	
			</div>
			</div>
			
		
			
        </div><!-- end of row -->
        <div class="panel-footer">
        <div class="row">
         <span class="pull-right"><a href="javascript:void(0);" onclick="searchLocation(<?php echo $getTownId?>);" class="btn btn-danger waves-effect waves-light">Back to list</a></span></div>
        </div>
    </div>
</div>
<!-- owl carousel js -->
        <script src="assets/plugins/owl.carousel/dist/owl.carousel.min.js"></script>
         <!-- Page related js-->
        <script type="text/javascript" src="assets/plugins/isotope/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
            jQuery(document).ready(function($) {

                //Owl-Multi
                $('#owl-multi').owlCarousel({
				   
				    margin:20,
				    nav:false,
				    autoplay:true,
				    responsive:{
				        0:{
				            items:1
				        },
				        480:{
				            items:2
				        },
				        700:{
				            items:4
				        },
				        1000:{
				            items:3
				        },
				        1100:{
				            items:5
				        }
				    }
				})
            });
			 $(document).ready(function () {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });

        </script>						
