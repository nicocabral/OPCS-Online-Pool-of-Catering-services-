<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="resPhModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#821a1a;">
		<i class="fa fa-user"></i> Reservation per head</h4>
      </div>
      <div class="modal-body">
	  <div class="row"style="margin-bottom:10px;">
		<div class="col-md-12">
			<div id="showServices"></div>
		</div>
	  </div>
        <form id="rphReservationform" method="post" action="addProcess" name="rphform">
	<style>
	.error_msg{
		color:red;
		font-size:13px;
	}
	</style>
		<div class="row">

<div class="has-success col-md-12">
<label><i class="fa fa-user"></i> Rate per head reservation</label>
<p><em>Fields with <span style="color:red;">*</span> are required</em></p>
	<select class="form-control" id="selPrice" name="selPrice" required >
		<option>&#8369; Select price<span style="color:red;">*</span></option>
		<?php include('../includes/connection.php');
		$myid = intval($_GET['id']);
		$query = mysql_query("SELECT * FROM tbl_price WHERE mycat_id = '$myid' order by p_price") or die (mysql_error());
		while($row = mysql_fetch_array($query)){?>
		<option value="<?php echo $row['p_price']?>"><?php echo '&#8369; <strong>'.$row['p_price'].'</strong> - '.$row['des'].' Kinds of foods (dessert included)'.' - Minimum of '.$row['minimum'].' people';?></option>
		
		<?php }?>
	</select>
	<input type="hidden" value="<?php echo $_GET['id']?>" id="mycatId" name="mycatId">
	
</div>
</div>
<div class="row" style="margin-top:10px;">

<div class="has-success col-md-6">
<label>Select event<span style="color:red;">*</span></label>
	<select class="form-control" id="eventName" name="eventName" required>
              
         <?php 
		 include('../includes/connection.php');
		  $getId = intval($_GET['id']);
		   $squery = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '$getId'") or die (mysql_error());
				while($row = mysql_fetch_assoc($squery)){?>
            	<option value="<?php echo $row['ocassion_name']?>"><?php echo $row['ocassion_name'];?></option>
                <?php }?>
            </select>
</div>
	<div class="has-success col-md-6">
	<label>Input no. of people Ex. 50<span style="color:red;">*</span></label>
		<input type="number" onkeyup="sum();" class="form-control" id="txtInputnumber" name="txtInputnumber" data-toggle="tooltip" title="Input number of people to serve" required>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-4">
		<center><p id="myLoader" style="margin-top:10px;"></p></center>
	</div>
	<div class="col-md-8">
		<dl class="dl-horizontal">
			<dt><p style="margin-top:10px;">Total &#8369;</p></dt><dd><input type="text" class="form-control" id="totalres1" name="totalres1" readonly required>
			<input type="hidden" class="form-control" id="totalres" name="totalres" readonly required></dd>
		</dl>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	
	<div class="col-md-6">
	<select onchange="viewCat(this.value);">
	<option>Select category</option>
	<?php include('../includes/connection.php');
	$selectcat = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id=".intval($_GET['id'])." GROUP by food_category") or die (mysql_error());
	while($rowscat = mysql_fetch_array($selectcat)){?>
	<option value="<?php echo $rowscat['food_category']?>"><?php echo $rowscat['food_category']?></option>
	<?php }?>
	</select>
	</div>
	<div class="col-md-6">
	  <span class="pull-right"><em>Double click the food to add on your list</em></span>
	  </div>
	  </div>
	 <div class="row" style="margin-top:10px;">
	 
	  <div class="col-md-6">
	<div class="table-responsive" style="height:200px;">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th colspan="2"><i class="glyphicon glyphicon-list-alt"></i> Menu</th>
					
				</tr>
			</thead>
			<tbody id="menuList">
			<?php include('../includes/connection.php');
			$sql = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id=".$_GET['id']." order by food_offered") or die (mysql_error());
			while($rows = mysql_fetch_array($sql)){?>
				<tr style="cursor:pointer;" ondblclick="addFood(<?php echo $rows['fo_id'];?>,'<?php echo $rows['food_offered']?>')"><td><p><i class="fa fa-cutlery" style="color:green;"></i><?php echo $rows['food_offered']?></p></td>
				<td><center><a href="javascript:void(0);"><img src="../settings/account/<?php echo $rows['images']?>" class="img-responsive img-thumbnail" width="100px;" style="box-shadow:1px 1px 1px 1px #888888;" id="img"></a></center></td></tr>
			<?php }?>
			</tbody>
		</table>
		
	</div>
	</div>
	<div class="col-md-6">
	<div class="table-responsive" style="height:200px;">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th><i class="glyphicon glyphicon-list-alt"></i> My Menu list<span style="color:red;">*</span></th>
			
					<th><center><span class="fa fa-gear"></span></center> </th>
				</tr>
			</thead>
			<tbody id="myListbody">
			
			</tbody>
		</table>
	</div>
	</div>
</div>
<hr>
<label><em>Information details</em></label>
<p><em>Fields with <span style="color:red;">*</span> are required</em></p>
<div class="row" style="margin-top:10px;">

	<div class="col-md-2"><label class="pull-right">Name<span style="color:red;">*</span>:</label></div>
	<div class="has-success col-md-10"><input type="text" class="form-control" id="txtName" name="txtName" required>
	<span class="error_msg" id="errormsg_name"></span>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-2"><label class="pull-right">Contact<span style="color:red;">*</span>:</label></div>
	<div class="has-success col-md-10">
	<input type="text" class="form-control" id="txtCon" name="txtCon" required>
	<span class="error_msg" id="errormsg_contact"></span>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-2"><label class="pull-right">Email<span style="color:red;">*</span>:</label></div>
	<div class="has-success col-md-10"><input type="email" class="form-control" id="txtEmail" name="txtEmail" required>
	<span class="error_msg" id="errormsg_email"></span>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-2"><label class="pull-right">Address<span style="color:red;">*</span>:</label></div>
	<div class="has-success col-md-10"><input type="text" class="form-control" id="txtAddress" name="txtAddress" required>
	<span class="error_msg" id="errormsg_address"></span>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-2"><label class="pull-right">Date of event<span style="color:red;">*</span>:</label></div>
	<div class="has-success col-md-10">
	<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="order_date" required> 
	<span class="error_msg" id="errormsg_doe"></span>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-2"><label class="pull-right">Time of event<span style="color:red;">*</span>:</label></div>
	<div class="has-success col-md-10">
	 <input type="text" class="form-control" placeholder="00:00" id="timepicker" name="resTime" required>  </div>
	<span class="error_msg" id="errormsg_toe"></span>
	 </div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-2"><label class="pull-right">Message<span style="color:red;">*</span>:</label></div>
	<div class="has-success col-md-10">
	 <textarea class="form-control" id="txtMsg" name="txtMsg"required></textarea>
	 <span class="error_msg" id="errormsg_message"></span>
	 </div>
</div>

<hr>
	<div class="row" style="margin-top:10px;">
	<div class="col-md-12">
	<p><em>Note: Please provide a valid contact/email for us to confirm your reservation. Thank you!</em></p>
	<span class="pull-right" style="margin-right:10px;">
			<button class="btn btn-danger" name="submit" type="submit" style="background-color:#821a1a;"><span class="fa fa-check"></span> Reserve</button>
		</span>
	</div>
	
	</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="box-shadow:1px 1px 1px 1px #888888;">Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
	$('#errormsg_name').hide();
	$('#errormsg_contact').hide();
	$('#errormsg_email').hide();
	$('#errormsg_address').hide();
	$('#errormsg_doe').hide();
	$('#errormsg_toe').hide();
	$('#errormsg_message').hide();
	var errormsg_name = false;
	var errormsg_contact = false;
	var errormsg_email = false;
	var errormsg_address = false;
	var errormsg_message = false;
	
	$("#txtName").focusout(function(){
		checkName();
	});
	$("#txtCon").focusout(function(){
		checkCon();
	});
	$("#txtEmail").focusout(function(){
		checkEmail();
	});
	$("#txtAddress").focusout(function(){
		checkAddress();
	});
	
	$("#txtMsg").focusout(function(){
		checkMsg();
	});
	function checkName(){
		var n = $("#txtName").val();
		var pattern = new RegExp(/'|"|[0-9]/i);
		if(pattern.test($("#txtName").val())){
			$('#errormsg_name').fadeIn();
			$('#errormsg_name').html('<i class="fa fa-exclamation-circle"></i> '+n+' Invalid input');
			errormsg_name = true;
		}
		else if (n == "" || n == " "){
			$('#errormsg_name').fadeIn();
			$('#errormsg_name').html('<i class="fa fa-exclamation-circle"></i> Please input your name');
			errormsg_name = true;
		}
		else {
			$('#errormsg_name').fadeOut();
			errormsg_name = false;
		}
		return false;
	}
	function checkCon(){
		var c = $("#txtCon").val();
		var pattern = new RegExp(/'|"/i);
		if(pattern.test($("#txtCon").val())){
			$('#errormsg_contact').fadeIn();
			$('#errormsg_contact').html('<i class="fa fa-exclamation-circle"></i> '+c+' Invalid input');
			errormsg_contact = true;
		}
		else if (c == "" || c == " "){
			$('#errormsg_contact').fadeIn();
			$('#errormsg_contact').html('<i class="fa fa-exclamation-circle"></i> Please input your name');
			errormsg_contact = true;
		}
		else {
			$('#errormsg_contact').fadeOut();
			errormsg_contact = false;
		}
		return false;
	}
	function checkEmail(){
		var e = $("#txtEmail").val();
		var pattern = new RegExp(/'|"/i);
		if(pattern.test($("#txtEmail").val())){
			$('#errormsg_email').fadeIn();
			$('#errormsg_email').html('<i class="fa fa-exclamation-circle"></i> '+e+' Invalid input');
			errormsg_email = true;
		}
		else if (e == "" || e == " "){
			$('#errormsg_email').fadeIn();
			$('#errormsg_email').html('<i class="fa fa-exclamation-circle"></i> Please input your name');
			errormsg_email = true;
		}
		else {
			$('#errormsg_contact').fadeOut();
			errormsg_contact = false;
		}
		return false;
	}
	function checkAddress(){
		var a = $('#txtAddress').val();
		var pattern = new RegExp(/'|"/i);
		if(pattern.test($("#txtAddress").val())){
			$('#errormsg_address').fadeIn();
			$('#errormsg_address').html('<i class="fa fa-exclamation-circle"></i> '+a+' Invalid input');
			errormsg_doe = true;
		}
		else if(a == "" || a == " "){
			$('#errormsg_address').fadeIn();
			$('#errormsg_address').html('<i class="fa fa-exclamation-circle"></i> Please input a valid address');
			errormsg_address = true;
		}
		else {
			$('#errormsg_address').fadeOut();
			errormsg_address = false;
		}
		return false;
	}
	function checkMsg(){
		var m = $('#txtMsg').val();
		var pattern = new RegExp(/'|"/i);
		if(pattern.test($("#txtMsg").val())){
			$('#errormsg_message').fadeIn();
			$('#errormsg_message').html('<i class="fa fa-exclamation-circle"></i> '+m+' Invalid input');
			errormsg_message = true;
		}
		else if(m == "" || m == " "){
			$('#errormsg_message').fadeIn();
			$('#errormsg_message').html('<i class="fa fa-exclamation-circle"></i> Please leave us a message');
			errormsg_message = true;
		}
		else {
			$('#errormsg_message').fadeOut();
			errormsg_message = false;
		}
		return false;
	}
	$('#rphReservationform').submit(function(){
	errormsg_name = false;
	errormsg_contact = false;
	errormsg_email = false;
	errormsg_address = false;
	errormsg_message = false;
	checkName();
	checkCon();
	checkEmail();
	checkAddress();
	checkMsg();
	if(errormsg_name == false && errormsg_contact == false && errormsg_email == false && errormsg_address == false && errormsg_message == false){
		return true;
	}
	else {
		return false;
	}
	})
});

</script>