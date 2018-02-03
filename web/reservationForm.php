<style>
.button {
  display: inline-block;
  padding: 5px 15px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #821a1a;
  border: none;
  border-radius: 2px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #821a1a}

.button:active {
  background-color: #821a1a;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.error_msg{
	color:red;
	font-size:13px;
}
</style>
<div class="row">

		 <div class="panel panel-danger" >
                            <!-- Default panel contents -->
                            <div class="panel-heading" style="background-color:#821a1a;color:#FFF;">
							
                                <h3 class="panel-title" style="font-variant:small-caps;"><center>
								<span class="glyphicon glyphicon-list-alt"></span> Reservation Form</center></h3>
                            </div>
                            <div class="panel-body">
                                <?php include('includes/connection.php');
									$getOid = intval($_GET['oid']);
									$getCid = intval($_GET['catid']);
									$getPackageno = intval($_GET['packageno']);
									$query = mysql_query("SELECT * FROM tbl_ocasioncat WHERE oid='$getOid' AND mycid = '$getCid'") or die (mysql_error());
									if(mysql_num_rows($query)>0){
										while($row = mysql_fetch_assoc($query)){?>
										<center><h4 style="font-variant:small-caps;color:#821a1a;"><i class="fa fa-gift"></i> <?php echo $row['ocassion_name']?></h4>
										<p>"<?php echo $row['description'];?>"</p></center>
									<?php }}?>
                            </div>
							<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
							<form id="resForm">                            <!-- List group -->
                            <ul class="list-group">
                               <li class="list-group-item">
                                  <div class="row">
                                <div class="col-md-12">   
  <span class="input-group-addon" id="basic-addon1"><strong>Package price :</strong></span>
  <br>
  <?php include('includes/connection.php');
  $getPackno = intval($_GET['packageno']);
  $pq = mysql_query("SELECT * FROM tbl_servicescovered WHERE catererid= '$getCid' AND s_oid = '$getOid' AND packageno = '$getPackno' GROUP by packageno") or die (mysql_error());
  while($rows = mysql_fetch_assoc($pq)){?>
  <input type="text" step="any" name="packprice" id="packprice" class="form-control" required value="&#8369; <?php echo number_format($rows['packageprice'],2,'.',',');?>" readonly style="text-align:center">
  <input type="hidden" value="<?php echo $rows['packageprice'];?>" name="price" id="price">
  <?php }?>
  
  <input type="hidden" value="<?php echo $getCid;?>" name="cid" id="cid">
  <input type="hidden" value="<?php echo $getOid;?>" name="oid" id="oid">
  <input type="hidden" value="<?php echo $getPackageno;?>" name="pid" id="pid">
  </div>
  </div>
                                </li>
                                <li class="list-group-item">
								<div class="row">
                                <div class="col-md-4">   
  <span class="input-group-addon" id="basic-addon1"><strong>Name *:</strong></span>
  </div>
  <div class="has-success col-md-8">
  <input type="text" name="resname" id="resname" class="form-control" required>
  <span id="errormsg_name" class="error_msg"></span>
  </div>
  </div>
                                </li>
                                <li class="list-group-item">
                                   <div class="row">
                                <div class="col-md-4">   
  <span class="input-group-addon" id="basic-addon1"><strong>Address *:</strong></span>
  </div>
  <div class="has-success col-md-8">
  <input type="text" name="address" id="address" class="form-control" required>
   <span id="errormsg_address" class="error_msg"></span>
  </div>
  </div>
                                </li>
                                <li class="list-group-item">
                                     <div class="row">
                                <div class="col-md-4">   
  <span class="input-group-addon" id="basic-addon1"><strong>Contact *:</strong></span>
  </div>
  <div class="has-success col-md-8">
  <input type="text" name="contact" id="contact" class="form-control" required>
   <span id="errormsg_contact" class="error_msg"></span>
  </div>
  </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                <div class="col-md-4">   
  <span class="input-group-addon" id="basic-addon1"><strong>Email *:</strong></span>
  </div>
  <div class="has-success col-md-8">
  <input type="text" name="email" id="email" class="form-control" required>
   <span id="errormsg_email" class="error_msg"></span>
  </div>
  </div>
                                </li>
								 <li class="list-group-item">
                                    <div class="row">
                                <div class="col-md-12">   
  <span class="input-group-addon"><strong>Date of Event *:</strong></span>
 <br>
  <div class="has-success col-sm-4">
	<select class="form-control" required name="month" id="month">
	<option value="1">Jan</option>
	<option value="2">Feb</option>
	<option value="3">March</option>
	<option value="4">April</option>
	<option value="5">May</option>
	<option value="6">June</option>
	<option value="7">July</option>
	<option value="8">Aug</option>
	<option value="9">Sep</option>
	<option value="10">Oct</option>
	<option value="11">Nov</option>
	<option value="12">Dec</option>
	</select>
	</div>
	<div class="has-success col-sm-4">
	<select class="form-control" required name="date" id="date">
	<?php for($i=1;$i<=31;$i++){
		echo '<option value="'.$i.'">'.$i.'</option>';
	}?>
	</select>
	</div>
	<div class="has-success col-sm-4">
	 <select name="year" id="year" class="form-control" required><?php ddY()?>
  </select>  
<?php
function ddY(){
        for($i=2013;$i<=date('Y');$i++)
        $arr[] = $i;
        $arr = array_reverse($arr);
        foreach($arr as $year){ 
         if($year == date('Y')) {
         echo '
		 <option>Year</option>
		 <option value="'.$year.'" selected="selected">'.$year.'</option>';

         } else {
            echo '<option value="'.$year.'">'.$year.'</option>
			';
        }



        //echo'<option value="'.$year.'">'.$year.'</option>'; 
    } 
    }

?>
	</div>
  </div>
  </div>
                                </li>
								 <li class="list-group-item">
                                    <div class="row">
                                <div class="col-md-12">   
  <span class="input-group-addon" id="basic-addon1"><strong>Time of event *:</strong></span>
  <br>
 <div class="has-success col-sm-4">
	<select class="form-control" name="hour" id="hour" required>
		
		<?php for($h=1;$h<=12;$h++){
			echo '<option value="'.$h.'">'.$h.'</option>';
		}?>
	</select>
 </div>
 <div class="has-success col-sm-4">
	<select class="form-control" name="mins" id="mins" required>
		<option value="00">00</option>
		<?php for($min=1;$min<=60;$min++){
			echo '<option value="'.$min.'">'.$min.'</option>';
		}?>
	</select>
 </div>
  <div class="has-success col-sm-4">
	<select class="form-control" name="timetype" id="timetype" required>
		<option value="Am">AM</option>
		<option value="Am">PM</option>
		
	</select>
 </div>
  </div>
  </div>
                                </li>
								<li class="list-group-item">
                                    <div class="row">
                                <div class="col-md-12">   
  <span class="input-group-addon" id="basic-addon1"><strong>Message *:</strong></span>
 <br>
  <textarea required class="form-control" name="msg" id="msg"></textarea>
   <span id="errormsg_msg" class="error_msg"></span>
  </div>
  </div>
                                </li>
								 <li class="list-group-item">
                                  <em>Fields with (*) are mandatory</em>
                                </li>
								 <li class="list-group-item">
                                  <em>Note: Please provide your valid contact number or email address for us to confirm your reservation.</em>
                                </li>
								 <li class="list-group-item">
                                  <div class="row">
									<div class="col-md-12">
										<button class="button btn-block waves-effect waves-light" type="submit">
										<i class="fa fa-check"></i> Reserve</button>
										
									</div>
								  </div>
                                </li>
                            </ul>
							
							</form>
							</div>
							</div><br><p></p>
							<div class="row">
								<div class="col-md-12">
									
								</div>
						
	</div>

</div>
<script type="text/javascript">
$(function(){
	$('#errormsg_name').hide();
	$('#errormsg_address').hide();
	$('#errormsg_contact').hide();
	$('#errormsg_email').hide();
	$('#errormsg_msg').hide();
	var errormsg_name = false;
	var errormsg_address = false;
	var errormsg_contact = false;
	var errormsg_email = false;
	var errormsg_msg = false;
	$("#resname").focusout(function(){
		checkResname();
	});
	$("#address").focusout(function(){
		checkResaddress();
	});
	$("#contact").focusout(function(){
		checkRescontact();
	});
	$("#email").focusout(function(){
		checkResemail();
	});
	$("#msg").focusout(function(){
		checkResmsg();
	});
	function checkResname(){
		var n = $("#resname").val();
		var pattern = new RegExp(/'|"|[0-9]/i);
		if(pattern.test($("#resname").val())){
			$('#errormsg_name').fadeIn();
			$('#errormsg_name').html('<i class="fa fa-exclamation-circle"></i> '+n+' is invalid name');
			errormsg_name = true;
		}else if (n == "" || n == " "){
			$('#errormsg_name').fadeIn();
			$('#errormsg_name').html('<i class="fa fa-exclamation-circle"></i> Please input a valid reservation name ');
			errormsg_name = true;
		}
			else {
			$('#errormsg_name').fadeOut();
			errormsg_name = false;
		}
		return false;
	}
	function checkResaddress(){
		var address = $("#address").val();
		var pattern = new RegExp(/'|"/i);
		if(pattern.test($("#address").val())){
			$('#errormsg_address').fadeIn();
			$('#errormsg_address').html('<i class="fa fa-exclamation-circle"></i> '+address+' is invalid address');
			errormsg_address = true;
		}else if (address == "" || address == " "){
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
	function checkRescontact(){
		var contact = $("#contact").val();
		var pattern = new RegExp(/'|"/i);
		if(pattern.test($("#contact").val())){
			$('#errormsg_contact').fadeIn();
			$('#errormsg_contact').html('<i class="fa fa-exclamation-circle"></i> '+contact+' is invalid contact');
			errormsg_contact = true;
		}else if (contact == "" || contact == " "){
			$('#errormsg_contact').fadeIn();
			$('#errormsg_contact').html('<i class="fa fa-exclamation-circle"></i> Please input a valid contact');
			errormsg_contact = true;
		}
			else {
			$('#errormsg_contact').fadeOut();
			errormsg_contact = false;
		}
		return false;
	}
	function checkResemail(){
		var email = $("#email").val();
		
		var pattern1 = new RegExp(/'|"/i);
		 if (pattern1.test($('#email').val())){
			$('#errormsg_email').fadeIn();
			$('#errormsg_email').html('<i class="fa fa-exclamation-circle"></i> '+email+' is invalid');
			errormsg_email = true;
		}
		else if (email == "" || email == " "){
			$('#errormsg_email').fadeIn();
			$('#errormsg_email').html('<i class="fa fa-exclamation-circle"></i> Please input a valid email address');
			errormsg_email = true;
		}
		
			else {
			$('#errormsg_email').fadeOut();
			
			errormsg_email = false;
		}
		return false;
	}
	function checkResmsg(){
		var msg = $("#msg").val();
		var pattern = new RegExp(/'|"|@/i);
		if(pattern.test($("#msg").val())){
			$('#errormsg_msg').fadeIn();
			$('#errormsg_msg').html('<i class="fa fa-exclamation-circle"></i> '+msg+' is invalid message');
			errormsg_msg= true;
		}else if (msg == "" || msg == " "){
			$('#errormsg_msg').fadeIn();
			$('#errormsg_msg').html('<i class="fa fa-exclamation-circle"></i> Please leave us a message for reservation instruction or etc.');
			errormsg_msg = true;
		}
			else {
			
			$('#errormsg_msg').fadeOut();
			errormsg_msg = false;
		}
		return false;
	}
	$("#resForm").submit(function(event){
	errormsg_name = false;
	errormsg_address = false;
	errormsg_contact = false;
	errormsg_email = false;
	errormsg_msg = false;
	checkResname();
	checkResaddress();
	checkRescontact();
	checkResemail();
	checkResmsg();
	
	
	if(errormsg_name == false && errormsg_address == false && errormsg_contact == false && errormsg_email == false && errormsg_msg == false){
	  //disable the default form submission
	  event.preventDefault();
	  //grab all form data  
	 var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: '../process/reservation_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  beforeSend:function(){
		  swal({
			  title:'',
			  imageUrl: '../assets/images/process.gif',
			  showConfirmButton: false
});
	  },
	  success: function (data) {
		 
	    if(data == 'Please fill up your name'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Please input your address'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Please input your valid contact no.'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Please input your valid email'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
	  else if(data == 'Please select a valid Month'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Please select a valid Date'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Please select a valid Year'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Please select a valid time'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Please give us a short message for your reservation details. Thank you!'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'You already reserve this package. Pick another date and time'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal(data,'','warning');
			}
			count--;
		},200);
		}
		else if(data == 'Thank you! Your reservation has been sent we will contact you after a minute for confirmation.'){
		var count = 1;
		setInterval(function(){
			if(count==0){
				swal({
				  title: data,
				  type: "success",
				  showCancelButton: false,
				  confirmButtonClass: "btn-success",
				  confirmButtonText: "Ok, got it!",
				  closeOnConfirm: false
				},
				function(){
				  window.location.href="../index";
				});
				
			}
			count--;
		},200);
		}
		else {
			swal('Error',data,'error')
		}
	  }
	  });
	  }else {
		  return false;
	  }
	  
	});
});
</script>