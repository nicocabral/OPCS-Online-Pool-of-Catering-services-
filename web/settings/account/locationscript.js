$(window).load(function(){
	$.ajax({
		url:'loadlocation',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#locationData').html('<center><h4><span class="fa fa-spin fa-spinner"></span></h4></center>');
		},
		success:function(html){
			$('#locationData').empty();
			$('#locationData').html(html);
			loadlist();
		}
	})
});
function loadlist(){
	$.ajax({
		url:'loadlist',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#locBodylist').html('<center><h4><span class="fa fa-spin fa-spinner"></span></h4></center>');
		},
		success:function(html){
			$('#locBodylist').empty();
			var c=1;
			setInterval(function(){
				if(c==0){
					$('#locBodylist').html(html);
				}
				c--;
			},200);
		}
	});
	return false;
}
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

function removeloc(id){
	swal({
  title: "Confirmation",
  text: "Are you sure you want to remove location",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Remove!",
  closeOnConfirm: true
},
function(){
  $.ajax({
		url:'process/removeloc_process?id='+id,
		type:'GET',
		cache:false,
		success:function(data){
			loadlist();
			locmenu();
		}
	});
});
	
	return false;
}
