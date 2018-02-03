<script src="../../assets/js/jquery.js"></script>
<header><nav class="navbar navbar-inverse" role="banner" style="background-color:#821a1a">
            <div class="container" >
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <a class="navbar-brand" href="index"><img src="../../assets/images/logo/logo1.png" alt="logo" class="wow slideInLeft"></a>
                </div>
    
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index" class="wow fadeInDown"><span class="fa fa-home"></span> Home</a></li>
						<li><a href="orders" class="wow fadeInDown"><span class="fa fa-shopping-basket"></span> Orders</a></li>
						
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"class="wow fadeInDown"><span class="fa fa-gear"></span> Settings <span class="caret"></span></a>
						 <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="locations">
								<i class="fa fa-street-view"></i> 
								My locations</a></li>
                                <li role="presentation"><a href="services">
								<i class="fa fa-cutlery"></i>
								My services offered</a></li>
                                <li role="presentation"><a href="mwp">
								<i class="fa fa-firefox"></i>
								My web profile</a></li>
                            </ul>
						
						</li>
						<li><a href="javascript:void(0);" class="wow fadeInDown" onclick="confirmlogout(<?php echo$_SESSION['id']?>)"><span class="glyphicon glyphicon-share"></span> Logout</a></li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		<script>$(window).load(function(){
			$('#loader').fadeOut();
		});</script>
		<style>
#loader 
{
 position: fixed;
 left: 0px;
 top: 0px;
 width: 100%;
 height: 100%;
 z-index: 9999;
 opacity:1;
 background: url('../../assets/images/ajax-loader.gif') 50% 50% no-repeat #FFF;
}

</style>
<div id="loader"></div>
<script type="text/javascript">
	window.history.forward();
	function noback(){
			window.history.forward();
		}
</script>
		</header>