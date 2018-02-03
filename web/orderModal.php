<!-- Modal -->
<div class="modal fade" id="myorderModal<?php echo $aoq['adonID']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-shopping-basket"></i> Order Details</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Order name</label>
    <div class="col-sm-9">
	  <input type="text" readonly class="form-control" id="o_name<?php echo $aoq['adonID'];?>" name="o_name" required value="<?php echo $aoq['addOn_name'];?>">
	   <input type="hidden" readonly id="caterer_Id<?php echo $aoq['adonID'];?>" required value="<?php echo $aoq['addOn_catID'];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-6">
      <input type="text" readonly class="form-control" id="o_price" name="o_price" value="<?php echo '&#8369;'.number_format($aoq['addOn_price'],2,'.',',');?>">
	  <input type="hidden" readonly class="form-control" id="o_price<?php echo $aoq['adonID'];?>" name="o_price" value="<?php echo $aoq['addOn_price']?>">
    </div>
  </div>
  <div class="panel panel-success">
  <div class="panel-heading">
  
	<p style="color:#FFF;"><em>Field with * are mandatory</em></p>
 
  </div>
  <div class="panel-body">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Order Qty*</label>
    <div class="has-success col-sm-6">
      <input type="number" required class="form-control" id="o_qty<?php echo $aoq['adonID'];?>" name="o_qty" placeholder="0">
	  
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Customer name*</label>
    <div class="has-success col-sm-9">
      <input type="text" required class="form-control" id="customer_name<?php echo $aoq['adonID'];?>" name="customer_name">
	  
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Contact*</label>
    <div class="has-success col-sm-6">
      <input type="text" required class="form-control" id="customer_no<?php echo $aoq['adonID'];?>" name="customer_no">
	  
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Address*</label>
    <div class="has-success col-sm-9">
      <textarea class="form-control" required name="customer_address" id="customer_address<?php echo $aoq['adonID'];?>"></textarea>
	  
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Message</label>
    <div class="has-success col-sm-9">
      <textarea class="form-control" required name="message" id="message<?php echo $aoq['adonID'];?>"></textarea>
	  
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Pick up/delivery date*</label>
    <div class="has-success col-sm-6">
     <input type="text" class="datepicker-autoclose form-control" placeholder="mm/dd/yyyy" id="date<?php echo $aoq['adonID'];?>" name="order_date" required>  
	  
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Time*</label>
    <div class="has-success col-sm-6">
     <input type="text" class="timepicker form-control" placeholder="00:00" id="time<?php echo $aoq['adonID'];?>" name="order_date" required>  
	  
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Order type*</label>
    <div class="has-success col-sm-6">
	<select class="form-control" required name="order_payment" id="order_payment<?php echo $aoq['adonID'];?>">
		<option value="Cash on Delivery">Cash on Delivery</option>
		<option value="Pick up">Pick up</option>
	</select>
	  
    </div>
  </div>
  </div>
  <div class="panel-footer">
 <div class="row">
  
    <p><em>Note: Please provide your valid contact  and address for us to confirm your order. Thank you!</em></p>
	<div class="pull-right">
	
      <button type="button" class="btn btn-success" onclick="submitOrder(<?php echo $aoq['adonID'];?>);"><i class="fa fa-cart-plus"></i> Order</button>
	  
   </div>
   </div>
</div>
  </div>
</form>
      </div>
    
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function() {

				jQuery('.timepicker').timepicker({
					defaultTIme : true
				});
                // Date Picker
                jQuery('.datepicker').datepicker();
                jQuery('.datepicker-autoclose').datepicker({
                	autoclose: true,
                	todayHighlight: true
                });
               
                
               
			
				
				
				
			});
function submitOrder(id){
	$('#myorderModal'+id).modal('hide');
	//get data
	var oname = document.getElementById('o_name'+id).value;
	var oprice = document.getElementById('o_price'+id).value;
	var catId = document.getElementById('caterer_Id'+id).value;
	var oqty = document.getElementById('o_qty'+id).value;
	var cust_name = document.getElementById('customer_name'+id).value;
	var cust_no = document.getElementById('customer_no'+id).value;
	var cust_add = document.getElementById('customer_address'+id).value;
	var message = document.getElementById('message'+id).value;
	var dateP = document.getElementById('date'+id).value;
	var dateT = document.getElementById('time'+id).value;
	var o_payment = document.getElementById('order_payment'+id).value;
	swal({
  title: "Order details",
  text: oname+"\n Price : P"+oprice+"\n Order Qty : "+oqty+"\n Customer name : "+cust_name+"\n Contact no : "+cust_no+"\n Address : "+cust_add+"\n Message : "+message+"\n Delivery/Pick up date : "+dateP+"\n Time :"+dateT+"\n Order payment : "+o_payment,
  type: "info",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, order it!",
  closeOnConfirm: false
},
function(){
  $.ajax({
		url:'process/orderprocess?catid='+catId+'&oname='+oname+'&oprice='+oprice+'&oqty='+oqty+'&cust_name='+cust_name+'&cust_no='+cust_no+'&cust_add='+cust_add+'&msg='+message+'&dateP='+dateP+'&timeP='+dateT+'&op='+o_payment,
		type:'POST',
		cache:false,
		beforeSend:function(){
			swal({title:'Please wait...',
			
				  showConfirmButton:false});
		},
		success:function(data){
			if(data == 'Order field must not be empty'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Price field must not be empty'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Please enter order qty'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Please enter your valid name'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Please enter your valid contact no'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Please enter your valid address'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Please enter a valid date'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Please enter a valid time'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Please select order payment'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','warning');
					}
					count--;
				},200);
			}
			else if(data == 'Order send successfully. Thanks for visiting our site.We will contact you for confirmation Thank you!'){
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','success');
						swal({
					  title: data,
					 
					  type: "success",
					  showCancelButton: false,
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  closeOnConfirm: false
					},
					function(){
					  window.location.href="index";
					});
					}
					count--;
				},200);
			}
			else {
				var count = 1;
				setInterval(function(){
					if(count == 0){
						swal(data,'','error');
					}
					count--;
				},200);
			}
			
			
		}
	})
});
	return false;
}
			</script>
