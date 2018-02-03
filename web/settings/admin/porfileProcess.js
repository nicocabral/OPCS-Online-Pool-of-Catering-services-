$(document).ready(function(){
$("#updateAccountForm").submit(function(event){
	 $(".processLoader").show();
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/updateaccount_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data){
	  if(data == 'Updated Successfully!'){
		   var count = 1;
		   setInterval(function(){
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Success",data,"success");
		   ajaxRequest();
		   }
		   count--;
		   },200);
		   }
		else {
			var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
	  }
	  });
	  return false;
	});
	});
	
//update password
$(document).ready(function(){
$("#updatePasswordForm").submit(function(event){
	  $(".processLoader").show();
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/updatepassword_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
		if(data == 'Password must be more than 6 character'){
		   var count = 1;
		   setInterval(function(){
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
		else if(data == 'Password did not match'){
		   var count = 1;
		   setInterval(function(){
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
		else if(data == 'Updated Successfully!'){
		   var count = 1;
		   setInterval(function(){
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Success",data,"success");
		   }
		   count--;
		   },200);
		   }
		   else {
			var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
		
	  }
	  });
	  return false;
	});
	});