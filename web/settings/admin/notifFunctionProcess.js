$("#registrationForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
		
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/reg-processs.php',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
		 swal("Hello") 
	  }
	  });
	  return false;
	});
function messageContents(){
	$.ajax({
		url:'messageBody',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#messageContents').html('<tr><td colspan="5"><center><i class="fa fa-spin fa-spinner"></i> Please wait...</center></td></tr>')
		},
		success:function(html){
			$('#messageContents').empty();
			$('#messageContents').html(html);
		}
	})
}
function showFilterRes(str){
	if(str=='message'){
		document.getElementById('filter').value='message';
	$.ajax({
		url:'messageContents',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#filterRes').html('<center><h4><i class="fa fa-spin fa-spinner"></i> Please wait...</h4></center>');
		},
		success:function(html){
			$('#filterRes').empty();
			$('#filterRes').html(html);
			messageContents();
		}
	});
	}
	else {
		document.getElementById('filter').value='notification';
		$.ajax({
		url:'notificationTable',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#filterRes').html('<center><h4><i class="fa fa-spin fa-spinner"></i> Please wait...</h4></center>');
		},
		success:function(html){
			$('#filterRes').empty();
			
			var c=1;
			setInterval(function(){
				if(c==0){
				$('#filterRes').html(html);	
				tbodyRequest();
				}
				c--;
			},200);
			
		}
	});
	}
	return false;
}
function viewMsg(mid,f,c,t){
	
	swal({
  title: "Message contents",
  text: 'FROM: '+f+' \n TIME: '+t+'\n MESSAGE CONTENTS: '+c,
  type: "info",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText:'Mark as read',
  closeOnConfirm: false
},
function(isConfirm){
	if(isConfirm){
 $.ajax({
	 url:'process/delMsg_process?id='+mid,
	 type:'POST',
	 cache:false,
	 beforeSend:function(){
		 swal('Deleting...')
	 },
	 success:function(data){
		 if(data == 'Deleted successfully!'){
		swal({
  title: data,
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Ok",
  closeOnConfirm: true
},
function(){
  messageContents();
});
		 }else {
			 swal(data,'','error');
		 }
	 }
 })
}
else {
	$.ajax({
		url:'process/updateMsg_process?id='+mid,
		type:'POST',
		cache:false,
		success:function(data){
			swal({
  title: data,
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Ok",
  closeOnConfirm: true
},
function(){
  messageContents();
});
		}
	});
}
});
	
	return false;
}