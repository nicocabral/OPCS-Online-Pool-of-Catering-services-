//$("#accountCredentials").show();
function passwordFunction(){
	 var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   $("#addAccountModal").modal("hide");
		   $("#addPwordModal").modal("show");
		   }
		   count--;
		   },500);
	
	}
$(document).ready(function(){
$("#addAccountForm").submit(function(event){
	 $(".processLoader").show();
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/addAccount_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	  //  $("#logMsg").empty();
	   //  $("#logMsg").html(data);
	   if(data == 'Name must not be empty'){
		   var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
	   else if(data == 'Email must not be empty'){
		      var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
	    else if(data == 'Contact must not be empty'){
		      var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
		else if(data == 'Account type must not be empty'){
			   var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
		else if(data == 'Birth year must have a value'){
		      var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
	    else if(data == 'Invalid Birth year'){
		      var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Error",data,"error");
		   }
		   count--;
		   },200);
		   }
		   
		else if (data == 'Save successfully! Input your temporary username and password') {
		var count = 1;
		   setInterval(function(){
		   $(".processLoader").fadeOut();
		   if(count == 0){
		   swal("Success",data,"success");
		   passwordFunction();
		  
		   
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
// Username check
$(document).ready(function()
{    
	$("#username").keyup(function()
	{		
		var name = $(this).val();	
		
		if(name.length > 2)
		{		
			
			$("#result").html('checking...');
			$.ajax({
				
				type : 'POST',
				url  : 'process/username-check.php?data='+name,
				data : $(this).serialize(),
				success : function(data)
						  {
					         $("#result").html(data);
					      }
				});
				return false;
			
		}
		else
		{
			$("#result").html('');
		}
	});
	
});
// add username and password
	$("#addPwordForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/addUsernameandPword',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	 if(data =='Username must not be empty'){
		 swal("Error",data,"error");
		 }
	 else if (data =='Password must not be empty'){
		 swal("Error",data,"error");
		 }
	 else if (data =='Confirm Password must not be empty'){
		 swal("Error",data,"error");
		 }
	 else if (data =='Password must be more than 6 character'){
		 swal("Error",data,"error");
		 }
	 else if (data =='Password did not match'){
		 swal("Error",data,"error");
		 }
	 else if (data =='Save successfully! You can now log-in as admin'){
		 swal("Success",data,"success");
		 $("#addPwordModal").modal("hide");
		 var count = 1;
		   setInterval(function(){
			
		   $(".processLoader").fadeOut();
		   if(count == 0){
		  displayRecords();
		   }
		   count--;
		   },500);
		 
		 }
	 else {
		 swal("Error",data,"error");} 
		 
	  
		
	  }
	  });
	  return false;
	});

	