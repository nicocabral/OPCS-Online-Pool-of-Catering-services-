// Edit process

$("#updatePwordForm").submit(function(event){

	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/editAdminlist_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	
	  swal(data,"","success");
		}
	  });
	  return false;
	});

	