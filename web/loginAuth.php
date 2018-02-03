<?php session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['type']) == 'Caterer'){?>
<link href = "web/assets/images/si1.png" rel="shortcut icon">
<script src="web/assets/js/jquery.js"></script>
<script type="text/javascript">
function redirect()
{
 var count = 1;
 setInterval(function()
 {
  document.getElementById('countdown').innerHTML = "Redirect In "+count+" Seconds...";
  if (count == 0) 
  {
   window.location = 'settings/account/'; 
  }
  count--;
 },1000);
}
</script>
<body onLoad="redirect();">
<div id="wrapper">
<div id="redirect_div">
<center style="margin-top:50px;">
<h3>
	<img src="assets/images/loading.gif"><br>
	Loading...
	<p id="countdown"></p>
<h3>
</center>

</div>
</div>
</body>
<?php }else {
	header("location:index");
	}?>