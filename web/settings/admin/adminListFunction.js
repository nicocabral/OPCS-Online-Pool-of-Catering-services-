$(window).load(function(){
    $(".loader").fadeOut("slow");
	$(".processLoader").hide();
    
});
// Notification
function notifRequest(){
		 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
			
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var test_div = document.getElementById('notifRequest');
                test_div.innerHTML = xmlhttp.responseText;
              
            }
        }
        xmlhttp.open('GET','notif.php',true);
        xmlhttp.send();
	
		
        
    }
	setInterval(notifRequest,200);
// display record
function displayRecords() {
                                $.ajax({
                                    type: "GET",
                                    url: "tbodyContents",
                                    cache: false,
                                    beforeSend: function() {
                                        $('#tbodyContents').html('<center><strong style="font-size:30px;padding-top:30px;"><img src="process.gif" class="img-responsive"></strong></center>');
                                    },
                                    success: function(html) {
                                        var count = 1;
		   setInterval(function(){
			    if(count == 0){
                                        $("#tbodyContents").html(html);
                                        $('.tbodyContents').html('');
				}
				count--;
		   },500)
                                    }
                                });
                            }

// Delete Request id
function delRequest(id){
	swal({
  title: "Are you sure?",
  text: "You will not be able to recover this record!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete",
  cancelButtonText: "No, cancel",
  closeOnConfirm: false,
  closeOnCancel: true
},
function(isConfirm) {
  if (isConfirm) {
     $.ajax({
	  url: 'process/delAdmin_process?id='+id,
	  type: 'POST',
	  success: function(data) {
	  if(data == 'Deleted Successfully!'){
		  swal("Success",data,"success");
		  displayRecords();
	  }
	  else {
		  swal("Error",data,"error");
	  }
		}
	  });
  } else {
    
  }
});
}
// View Password
function viewPassword(aid,password){
//	var txtPass = document.getElementById('txtPassword').value;
	swal("Warning","Password: " + password,"warning");
	//$("#passwordModal"+password).modal("show");
	//$("#editModal"+password).modal("hide");
}
// Notification Contents
function notifContents(){
		 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
			
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var test_div = document.getElementById('notifContents');
                test_div.innerHTML = xmlhttp.responseText;
              
            }
        }
        xmlhttp.open('GET','notifContents.php',true);
        xmlhttp.send();
	
		
        
    }
	setInterval(notifContents,200);

// Search Function
