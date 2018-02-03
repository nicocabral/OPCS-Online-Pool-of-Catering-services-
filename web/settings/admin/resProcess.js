$(document).ready(function(){
	$("#addFormLocation").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/addLoc-process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
		  
	   $("#logMsg").empty();
	   $("#logMsg").html(data);
	   displayRecords();
	  }
	  });
	  return false;
	});
	$("#cityname").keypress(function(){
		 
		$("#logMsg").empty();
		$("#logMsg").removeClass();
		})
		
		//add town
		$("#formaddLoc").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/addTown-process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	
	   $("#logMsgTown").empty();
	   $("#logMsgTown").html(data);
	 	displayRecords();
	  }
	  });
	  return false;
	});
	$("#Locname").keypress(function(){
		 
		$("#logMsgTown").empty();
		$("#logMsgTown").removeClass();
		})
	



	
});


 