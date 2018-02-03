$(window).load(function(){
	$.ajax({
		url:'indexReservation',
		type:'GET',
		cache:false,
		success:function(html){
			$('#reservationData').html(html);
			var c=1;
			setInterval(function(){
				if(c==0){
					loadreservation_new();
				}
				c--;
			},200);
		}
	});
});

function rpp(){
	$.ajax({
		url:'indexReservation',
		type:'GET',
		cache:false,
		success:function(html){
			$('#reservationData').html(html);
			var c=1;
			setInterval(function(){
				if(c==0){
					loadreservation_new();
				}
				c--;
			},200);
		}
	});
	return false;
}
function resNotif(){
	$.ajax({
		url:'resnotif',
		type:'GET',
		cache:false,
		success:function(html){
			$('#notificon').html(html);
			
		}
	});
	return false;
}
setInterval(resNotif,200);
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
//setInterval(notification,10000);
function loadreservation_new(){
	$.ajax({
		url:'reservationlist_new',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
		},
		success:function(html){
			$('#reservationListing').empty();
			$('#reservationListing').html(html);
		}
	});
	return false;
}


function viewReservation(resid,catid,resname,m,d,y,t,address,email,contact,stat,msg,spn,fpn,price,oid,oname,packno){
	if(m==1){
		month = 'Jan';
	}
	else if(m==2){
		month ='Feb';
	}
	else if(m==3){
		month ='March';
	}
	else if(m==4){
		month ='April';
	}
	else if(m==5){
		month ='May';
	}
	else if(m==6){
		month ='June';
	}
	else if(m==7){
		month ='July';
	}
	else if(m==8){
		month ='Aug';
	}
	else if(m==9){
		month ='Sep';
	}
	else if(m==10){
		month ='Oct';
	}
	else if(m==11){
		month ='Nov';
	}
	else if(m==12){
		month ='Dec';
	}
		$(document).ready(function(){
					$('#viewReservationModal').modal('show');
				
					$('#resdetails').html('<table class="table table-condensed table-striped" width="100%"><thead><th style="text-align:center"></th><th style="text-align:center"></th></thead><tbody><tr><td>From</td><th>'+resname+'</th></tr><tr><td>Contact #</td><th>'+contact+'</th></tr><tr><td>Email</td><th>'+email+'</th></tr><tr><td>Address</td><th>'+address+'</th></tr><tr><td>Reservation details</td><td>Service:&nbsp; <strong>'+oname+'</strong><br>Package price: &#8369;<strong>'+price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+'</strong><br>Event date: <strong>'+month+'&nbsp;'+d+',&nbsp;'+y+'&emsp;'+t+'</strong></td></tr><tr><td><strong>Service covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><li id="scList"></li></ul></td><td><strong>Food covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><li id="fclist"></li></ul></td></tr><tr><td>Message</td><th>'+msg+'</th></tr><tr><td>Status</td><th><p class="label label-success">'+stat+'</p></th></tr></tbody></table><div class="col-sm-2"></div><div class="col-sm-10"><div class="btn-group"><button class="btn btn-danger" style="background-color:#821a1a;" data-toggle="tooltip" title="Mark as completed" onclick="confirmRes('+resid+')"><i class="fa fa-check"></i> Confirm</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="deleterph('+resid+')"><i class="fa fa-trash"></i> Delete</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="rejectrph('+resid+')"><i class="fa  fa-times-circle"></i> Reject</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="printcontent('+resid+')"><i class="fa fa-print"></i> Print</button></div></div>');
		});
		$.ajax({
			url:'servicecoveredlist?oid='+oid+'&catid='+catid+'&packno='+packno,
			type:'GET',
			cache:false,
			success:function(html){
			$('#scList').html(html);
				}
			});
			$.ajax({
			url:'foodcoveredlist?oid='+oid+'&catid='+catid+'&packno='+packno,
			type:'GET',
			cache:false,
			success:function(html){
			$('#fclist').html(html);
				}
			});
	return false;
}
function confirmRes(resid){
	$(document).ready(function(){
		swal({
  title: "Are you sure?",
  text: "Reservation will be moved to status pending",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Confirm",
  closeOnConfirm: false
},
function(){
  $.ajax({
	 url:'process/confirmreservation_process?resid='+resid,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 if(data == 'success'){
		 swal({title:'Successfully!',
			   text:'Reservation move to pending for completion of reservation navigate to pending and complete the reservation',type:'success',
			   confirmButtonClass: "btn-success",});
		 $('#viewReservationModal').modal('hide');
		 var c=1;
		 setInterval(function(){
			if(c==0){
				loadreservation_new();
			} 
			c--;
		 },200);
		 }else {
			 swal('error',data,'error');
		 }
	 }
  });
});
	});
	return false;
}
function showServices(oid){
	if(oid == null){
		$('#showServices').empty();
	}else{
	$.ajax({
		url:'packAccordion?id='+oid,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#showServices').html('<center><h4><span class="fa fa-spin fa-spinner"></span> Please wait...</h4></center>')
		},
		success:function(html){
			$('#showServices').empty();
			$('#showServices').html(html);
		}
		
	});
	}
	return false;
}
function reservePack(oid,catid,packno){
	$.ajax({
		url:'../../reservationForm?oid='+oid+'&catid='+catid+'&packageno='+packno,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#showServices').html('<center><h4><span class="fa fa-spin fa-spinner"></span> Please wait...</h4></center>');
		},
		success:function(html){
			$('#showServices').html(html);
		}
	});
return false;
	}
function loadrph(){
	$.ajax({
		url:'rph_new',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
		},
		success:function(html){
			$('#reservationListing').empty();
			$('#reservationListing').html(html);
		}
	});
	return false;
}


function showfilter(str){
	if(str=='rph'){
	$.ajax({
		url:'rph',
		type:'GET',
		cache:false,
		
		success:function(html){
			$('#reservationData').empty();
			$('#reservationData').html(html);
			var c=1;
			setInterval(function(){
				if(c==0){
					loadrph();
				}
				c--;
			},200);
		}
	});
	}else {
		rpp();
	}
	return false;
} 
function showfilterrpp(str){
if(str == 'completed'){
	$.ajax({
		url:'rpp_completed?filter='+str,
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
		},
		success:function(html){
			$('#reservationListing').html(html);
		}
	});
	}
	else if(str == 'pending'){
			$.ajax({
		url:'rpp_pending?filter='+str,
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
		},
		success:function(html){
			$('#reservationListing').html(html);
		}
	});
		
	}
	else if(str == 'rejected'){
			$.ajax({
		url:'rph__rejected?filter='+str,
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<div class="col-md-12"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></div>');
		},
		success:function(html){
			$('#reservationListing').html(html);
		}
	});
		
	}
	else {
		loadreservation_new();
	}
	return false;
}
function deleterph(resid){
	swal({
  title: "Are you sure?",
  text: "Reservation will be out of the reservation list",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: false
},
function(){
 $.ajax({
	url:'process/deletereservation_process?resid='+resid,
	type:'POST',
	cache:false,
	success:function(){
		swal({
  title: "Deleted successfully",
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "btn-success",
  confirmButtonText: "ok",
  closeOnConfirm: true
},
function(){
   $('#viewReservationModal').modal('hide');
   var c=1;
   setInterval(function(){
	  if(c==0){
		  loadreservation_new();
	  }
		c--;
   },200);
});
		
	}
 });
});
return false;
}
function rejectrph(resid){
	swal({
  title: "Are you sure?",
  text: "Reservation will be moved to status rejected",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Reject",
  closeOnConfirm: true
},
function(){
 $.ajax({
	url:'process/rejectreservation_process?resid='+resid,
	type:'POST',
	cache:false,
	success:function(){
   $('#viewReservationModal').modal('hide');
   var c=1;
   setInterval(function(){
	  if(c==0){
		  loadreservation_new();
	  }
		c--;
   },200);
	
	}
 });
});
return false;
}
function printcontent(resid){
	$('#loader').fadeIn();
	var c=1;
	setInterval(function(){
		if(c==0){
		window.open("printcontent?resid="+resid,"width=800,height=300,0,status=0,");	
		$('#loader').fadeOut();
		}
		c--;
	},500);
	
	return false;
}
function reservationPending(resid,catid,resname,m,d,y,t,address,email,contact,stat,msg,spn,fpn,price,oid,oname,packno){
	if(m==1){
		month = 'Jan';
	}
	else if(m==2){
		month ='Feb';
	}
	else if(m==3){
		month ='March';
	}
	else if(m==4){
		month ='April';
	}
	else if(m==5){
		month ='May';
	}
	else if(m==6){
		month ='June';
	}
	else if(m==7){
		month ='July';
	}
	else if(m==8){
		month ='Aug';
	}
	else if(m==9){
		month ='Sep';
	}
	else if(m==10){
		month ='Oct';
	}
	else if(m==11){
		month ='Nov';
	}
	else if(m==12){
		month ='Dec';
	}
		$(document).ready(function(){
					$('#viewReservationModal').modal('show');
				
					$('#resdetails').html('<table class="table table-condensed table-striped" width="100%"><thead><th style="text-align:center"></th><th style="text-align:center"></th></thead><tbody><tr><td>From</td><th>'+resname+'</th></tr><tr><td>Contact #</td><th>'+contact+'</th></tr><tr><td>Email</td><th>'+email+'</th></tr><tr><td>Address</td><th>'+address+'</th></tr><tr><td>Reservation details</td><td>Service:&nbsp; <strong>'+oname+'</strong><br>Package price: &#8369;<strong>'+price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+'</strong><br>Event date: <strong>'+month+'&nbsp;'+d+',&nbsp;'+y+'&emsp;'+t+'</strong></td></tr><tr><td><strong>Service covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><li id="scList"></li></ul></td><td><strong>Food covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><li id="fclist"></li></ul></td></tr><tr><td>Message</td><th>'+msg+'</th></tr><tr><td>Status</td><th><p class="label label-success">'+stat+'</p></th></tr></tbody></table><div class="col-sm-2"></div><div class="col-sm-10"><div class="btn-group"><button class="btn btn-danger" style="background-color:#821a1a;" data-toggle="tooltip" title="Mark as completed" onclick="completedRes('+resid+')"><i class="fa fa-check"></i> Completed</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="deleterph('+resid+')"><i class="fa fa-trash"></i> Delete</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="rejectrph('+resid+')"><i class="fa  fa-times-circle"></i> Reject</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="printcontent('+resid+')"><i class="fa fa-print"></i> Print</button></div></div>');
		});
		$.ajax({
			url:'servicecoveredlist?oid='+oid+'&catid='+catid+'&packno='+packno,
			type:'GET',
			cache:false,
			success:function(html){
			$('#scList').html(html);
				}
			});
			$.ajax({
			url:'foodcoveredlist?oid='+oid+'&catid='+catid+'&packno='+packno,
			type:'GET',
			cache:false,
			success:function(html){
			$('#fclist').html(html);
				}
			});
	return false;
}
function completedRes(resid){
	$(document).ready(function(){
		swal({
  title: "Are you sure?",
  text: "Reservation will be moved to status completed",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Confirm",
  closeOnConfirm: false
},
function(){
  $.ajax({
	 url:'process/completedreservation_process?resid='+resid,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 if(data == 'success'){
		 swal({title:'Successfully!',
			   text:'Reservation services is move to completed',type:'success',
			   confirmButtonClass: "btn-success",});
		 $('#viewReservationModal').modal('hide');
		 var c=1;
		 setInterval(function(){
			if(c==0){
				showfilterrpp('pending');
			} 
			c--;
		 },200);
		 }else {
			 swal('error',data,'error');
		 }
	 }
  });
});
	});
	return false;
}
function reservationCompleted(resid,catid,resname,m,d,y,t,address,email,contact,stat,msg,spn,fpn,price,oid,oname,packno){
	if(m==1){
		month = 'Jan';
	}
	else if(m==2){
		month ='Feb';
	}
	else if(m==3){
		month ='March';
	}
	else if(m==4){
		month ='April';
	}
	else if(m==5){
		month ='May';
	}
	else if(m==6){
		month ='June';
	}
	else if(m==7){
		month ='July';
	}
	else if(m==8){
		month ='Aug';
	}
	else if(m==9){
		month ='Sep';
	}
	else if(m==10){
		month ='Oct';
	}
	else if(m==11){
		month ='Nov';
	}
	else if(m==12){
		month ='Dec';
	}
		$(document).ready(function(){
					$('#viewReservationModal').modal('show');
				
					$('#resdetails').html('<table class="table table-condensed table-striped" width="100%"><thead><th style="text-align:center"></th><th style="text-align:center"></th></thead><tbody><tr><td>From</td><th>'+resname+'</th></tr><tr><td>Contact #</td><th>'+contact+'</th></tr><tr><td>Email</td><th>'+email+'</th></tr><tr><td>Address</td><th>'+address+'</th></tr><tr><td>Reservation details</td><td>Service:&nbsp; <strong>'+oname+'</strong><br>Package price: &#8369;<strong>'+price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+'</strong><br>Event date: <strong>'+month+'&nbsp;'+d+',&nbsp;'+y+'&emsp;'+t+'</strong></td></tr><tr><td><strong>Service covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><li id="scList"></li></ul></td><td><strong>Food covered</strong><hr><ul style="list-style-type:none;margin-left:0;"><li id="fclist"></li></ul></td></tr><tr><td>Message</td><th>'+msg+'</th></tr><tr><td>Status</td><th><p class="label label-success"><span class="fa fa-check"></span> '+stat+'</p></th></tr></tbody></table><div class="col-sm-6"></div><div class="col-sm-6"><div class="btn-group"><button class="btn btn-danger" style="background-color:#821a1a;" onclick="deleterph('+resid+')"><i class="fa fa-trash"></i> Delete</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="printcontent('+resid+')"><i class="fa fa-print"></i> Print</button></div></div>');
		});
		$.ajax({
			url:'servicecoveredlist?oid='+oid+'&catid='+catid+'&packno='+packno,
			type:'GET',
			cache:false,
			success:function(html){
			$('#scList').html(html);
				}
			});
			$.ajax({
			url:'foodcoveredlist?oid='+oid+'&catid='+catid+'&packno='+packno,
			type:'GET',
			cache:false,
			success:function(html){
			$('#fclist').html(html);
				}
			});
	return false;
}
function showFilterrph(str){
	if(str == 'pending'){
	$.ajax({
		url:'rph_pending?filter='+str,
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<center><h4><span class="fa fa-spin fa-spinner"></span></h4></center>');
		},
		success:function(html){
		$('#reservationListing').empty();
		$('#reservationListing').html(html);
	}
	});
	}
	else if(str == 'completed'){
		$.ajax({
		url:'rph_completed?filter='+str,
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<center><h4><span class="fa fa-spin fa-spinner"></span></h4></center>');
		},
		success:function(html){
		$('#reservationListing').empty();
		$('#reservationListing').html(html);
	}
	});
		
	}
	else if(str == 'rejected'){
		$.ajax({
		url:'rph_rejected?filter='+str,
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#reservationListing').html('<center><h4><span class="fa fa-spin fa-spinner"></span></h4></center>');
		},
		success:function(html){
		$('#reservationListing').empty();
		$('#reservationListing').html(html);
	}
	});
		
	}else {
		loadrph();
	}
	return false;
}