$(window).load(function(){
	$.ajax({
		url:'orderReservation',
		type:'GET',
		cache:false,
		success:function(html){
			$('#orderData').html(html);
			var c=1;
			setInterval(function(){
				if(c==0){
					loadorder_new();
				}
				c--;
			},200);
		}
	});
});
function orderNotif(){
	$.ajax({
		url:'ordernotif',
		type:'GET',
		cache:false,
		success:function(html){
			if(html != " "){
			$('#notificon').html(html);
			}
			else {
				$('#notificon').empty();
			}
		}
	});
	return false;
}
setInterval(orderNotif,200);
function notification(){
	$.ajax({
		url:'reservationNotif',
		type:'GET',
		cache:false,
		success:function(data){
			if(data!="" || data >0){
				
			
			swal({
  title: "Notification",
  text: "You have "+data+" new reservation",
  type: "warning",
  showCancelButton: false,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Ok",
  closeOnConfirm: true
},

function(){
 
});
			}
		}
	});
	return false;


}
setInterval(notification,10000);
function loadorder_new(){
	$.ajax({
		url:'orderlist_new',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#orderListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
		},
		success:function(html){
			$('#orderListing').empty();
			$('#orderListing').html(html);
		}
	});
	return false;
}
function vieworder(o_id,cid,oname,oprice,oqty,cname,cno,cad,cmsg,od,op,os,ot,time){
	var total = parseFloat(oprice)*parseFloat(oqty);
	$('#viewOrderModal').modal('show');
	$('#odetails').html('<center><h4><i class="fa fa-spin fa-spinner"></i></h4></center>');
	var opstat;
	if(op == 'cod')
		opstat = 'Cash on delivery';
	
	else 
		opstat = 'Pickup';
	
	var c=1;
	setInterval(function(){
		if(c==0){
			$('#odetails').empty();
			$('#odetails').html('<table class="table table-striped table-hover table-condensed" style="color:#000;"><thead><tr><th><em>Customer details</em></th><th><span class="pull-right">Order date:'+ot+'</span><br><span class="pull-right">Status:<label class="label label-success">'+os+' <span class="fa fa-check"></span></label></span></th></tr></thead><tbody><tr><td>Customer name</td><th>'+cname+'</th></tr><tr><td>Contact</td><th>'+cno+'</th></tr><tr><td>Address</td><th>'+cad+'</th></tr><tr><td>'+opstat+' <span class="fa fa-check" style="color:#228B22;"></span></td><th>'+od+' '+time+'<span class="fa fa-check" style="color:#228B22;"></span></th></tr><tr><td>Message</td><th>'+cmsg+'</th></tr><tr><th colspan="2"><em>Order details</em></th></tr><tr><td>Order name</td><th>'+oname+'</th></tr><tr><td>Price</td><th>&#8369;'+oprice+'</th></tr><tr><td>Quantity</td><th>'+oqty+'</th></tr><tr><td>Total</td><th>&#8369;'+total.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+'</th></tr></tbody></table><div class="col-md-4"></div><div class="col-md-8"><div class="btn-group"><button class="btn btn-danger" style="background-color:#821a1a;" onclick="confirmOrder('+o_id+')"><i class="fa fa-check"></i> Confirm</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="deleteOrder('+o_id+')"><i class="fa fa-trash"></i> Delete</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="rejectOrder('+o_id+')"><i class="fa fa-times-circle"></i> Reject</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="printOrder('+o_id+')"><i class="fa fa-print"></i> Print</button></div></div>');
		}
		c--;
	},200);
	
	return false;
}
function confirmOrder(orderid){
	swal({
  title: "Confirmation",
  text: "Order will be moved to pending until order completed",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Confirm",
  closeOnConfirm: true
},
function(){
  $.ajax({
	 url:'process/confirmorder_process?orderid='+orderid,
	 type:'POST',
	 cache:false,
	 success:function(data){
			$('#viewOrderModal').modal('hide');
			var c=1;
			setInterval(function(){
				if(c==0){
					loadorder_new();
				}
				c--;
			},200);
	 }
  });
});
	return false;
}
function deleteOrder(oid){
	swal({
  title: "Confirmation",
  text: "Are you sure you want to delete this order?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
  $.ajax({
	 url:'process/deleteorder_process?oid='+oid,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 $('#viewOrderModal').modal('hide');
			var c=1;
			setInterval(function(){
				if(c==0){
					loadorder_new();
				}
				c--;
			},200); 
	 }
  });
});
	return false;
}
function rejectOrder(oid){
		swal({
  title: "Confirmation",
  text: "Are you sure you want to reject this order?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Reject",
  closeOnConfirm: true
},
function(){
  $.ajax({
	 url:'process/rejectorder_process?oid='+oid,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 $('#viewOrderModal').modal('hide');
			var c=1;
			setInterval(function(){
				if(c==0){
					loadorder_new();
				}
				c--;
			},200); 
	 }
  });
});
	return false;
}
function printOrder(oid){
	$('#loader').fadeIn();
	var c=1;
	setInterval(function(){
		if(c==0){
		window.open("printOrder?oid="+oid,"width=800,height=300,0,status=0,");	
		$('#loader').fadeOut();
		}
		c--;
	},500);
	
	return false;
}
function filterOrder(str){
	if(str == 'completed'){
		$.ajax({
			url:'orderlist_completed',
			type:'GET',
			cache:false,
			beforeSend:function(){
				$('#orderListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
			},
			success:function(html){
				$('#orderListing').empty();
				var c=1;
				setInterval(function(){
					if(c==0){
						$('#orderListing').html(html);
					}
					c--;
				},200);
			}
		});
	}else if (str == 'pending'){
		$.ajax({
			url:'orderlist_pending',
			type:'GET',
			cache:false,
			beforeSend:function(){
				$('#orderListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
			},
			success:function(html){
				$('#orderListing').empty();
				var c=1;
				setInterval(function(){
					if(c==0){
						$('#orderListing').html(html);
					}
					c--;
				},200);
			}
		});
	}
	else if (str == 'rejected'){
		$.ajax({
			url:'orderlist_rejected',
			type:'GET',
			cache:false,
			beforeSend:function(){
				$('#orderListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
			},
			success:function(html){
				$('#orderListing').empty();
				var c=1;
				setInterval(function(){
					if(c==0){
						$('#orderListing').html(html);
					}
					c--;
				},200);
			}
		});
	}else {
		loadorder_new()
	}
	return false;
}
