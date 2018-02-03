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
setInterval(notification,5000);
function loadphotos(){
	$.ajax({
		url:'photolist',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#photolistbody').html('<tr><td colspan="2"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></td></tr>');
		},
		success:function(html){
			var c=1;
			setInterval(function(){
				if(c==1){
				$('#photolistbody').html(html);	
				}
				c--;
			},300);
		}
	});
	
	return false;
}
function delphotos(id){
	swal({
  title: "Confirmation",
  text: "Delete this photo?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
  $.ajax({
	  url:'process/deletephoto_process?id='+id,
	  type:'POST',
	  cache:false,
	  success:function(data){
		 loadphotos(); 
		  
	  }
  });
});
return false;
}
$(function(){
	$('#btnupateinfo').click(function(){
		var cname=document.getElementById('c_name').value;
		var on=document.getElementById('oname').value;
		var cno=document.getElementById('c_contact').value;
		var cemail=document.getElementById('c_email').value;
		var caddress=document.getElementById('c_address').value;
		$.ajax({
			url:'process/updateinfo_process?cn='+cname+'&cno='+cno+'&ce='+cemail+'&cad='+caddress+'&on='+on,
			type:'POST',
			cache:false,
			success:function(data){
				if(data == 'Catering name must not be empty'){
					swal(data,'','warning');
				}
				else if(data=='Owner name must not be empty'){
					swal(data,'','warning');
				}
				else if(data=='Contact must not be empty'){
					swal(data,'','warning');
				}
				else if(data=='Email must not be empty'){
					swal(data,'','warning');
				}
				else if(data=='Address must not be empty'){
					swal(data,'','warning');
				}
				else if(data=='Profile update!'){
					swal(data,'Logout to take effect the changes','success');
					$('#viewinfoModal').modal('hide');
					//window.location.href="mwp";
				}else {
					swal(data,'','error');
				}
			}
		});
	});
	$('#btnupdatepword').click(function(){
		  var u = document.getElementById('uname').value;
	  var p = document.getElementById('pword').value;
		swal({
  title: "Confirmation",
  text: "Change username: "+u+" and \n password: "+p+"",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Change",
  closeOnConfirm: false
},
function(){
  $.ajax({
	
	 url:'process/updateuandp_process?uname='+u+'&pword='+p,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 if(data == 'New password must not be empty'){
			 swal(data,'','warning');
		 }
		 else if(data == 'Password must atleast more than 6 character'){
			 swal(data,'','warning');
		 }
		 else if(data == 'Username already taken please try another'){
			 swal(data,'','warning');
		 }
		 else if(data == 'Username and Password changed'){
			 swal(data,'Log out your account and login new username and password','success');
		 }else {
			 swal(data,'','error');
		 }
	 }
  });
});
	});
});