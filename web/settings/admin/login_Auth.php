<?php session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['password']) && $_SESSION['type'] == 'admin'){
?>
<link href = "../../assets/images/si1.png" rel="shortcut icon">
<script src="../../assets/js/jquery.js"></script>
<script type="text/javascript">
function redirect()
{
 var count = 1;
 setInterval(function()
 {
  document.getElementById('countdown').innerHTML = "Logging In "+count+" Seconds...";
  if (count == 0) 
  {
   window.location = 'admin'; 
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
	
	<img src="../../assets/images/loading.gif"><br>
	Loading...
	<p id="countdown"></p>
</h3>
</center>

</div>
</div>
</body>
<?php }?>