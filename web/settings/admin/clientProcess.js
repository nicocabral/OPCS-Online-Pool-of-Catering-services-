
$(document).ready(function(){
	
	$("#formAddClient").submit(function(event){
	 swal("Saving...","Please wait","warning");
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/addCient-process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) { 
		if(data == 'Company name must not be empty'){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                swal("Warning",data,"warning");
				 //endRequest(townid);
				}
				count--;
		   },500)	
		}
		else if(data == 'Owner name must not be empty'){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                swal("Warning",data,"warning");
				 //endRequest(townid);
				}
				count--;
		   },500)	
		}
		else if(data == 'Email must not be empty'){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                swal("Warning",data,"warning");
				 //endRequest(townid);
				}
				count--;
		   },500)	
		}
		else if(data == 'Contact must not be empty'){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                swal("Warning",data,"warning");
				 //endRequest(townid);
				}
				count--;
		   },500)	
		}
		else if(data == 'Address must not be empty'){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                swal("Warning",data,"warning");
				 //endRequest(townid);
				}
				count--;
		   },500)	
		}
		else if(data == 'Save successfully!'){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                swal("Success",data,"success");
				 //endRequest(townid);
				 displayRecords();
				
				}
				count--;
		   },500)	
		}else {
			var count = 1;
		   setInterval(function(){
			    if(count == 0){
                swal("Error",data,"error");
				 
				}
				count--;
		   },500)
			}
	   
	  }
	  
	  
	  });
	  return false;
	});
	
	
});


 