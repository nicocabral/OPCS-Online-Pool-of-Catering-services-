$(window).load(function(){
   // $(".loader").fadeOut("slow");
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
// table body

// Delete Request id
function delRequest(id, str){
	swal({
  title: "Are you sure?",
  text: "You will not be able to recover this record!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete",
  cancelButtonText: "No, cancel",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
     $.ajax({
	  url: 'process/deleteC-process?id='+id,
	  type: 'POST',
	  success: function(data) {
	  if(data =='Deleted successfully!'){
		  $("#myActionModal" + id).modal("hide");	
										swal({
										title:"Deleted",
										text:data,
										type:"success",
										showCancelButton:false,
										closeOnConfirm:true},
										
										function(){
										
                                    var count = 1;
		   							setInterval(function(){
			    						if(count == 0){
											displayRecords();
											deactRequest(str);
										}
									count--;
		  						 },200)
								 });
									}
                                   
	
	 
	  else {
		  swal("Error",data,"error");
	  }
		}
	  });
  } else {
    swal("Cancelled", "Your record is safe :)", "error");
  }
});
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


function showModal(){
	$("#addCModal").modal("show");
}

// display record
function displayRecords() {
                                $.ajax({
                                    type: "GET",
                                    url: "tbodyClient",
                                    cache: false,
                                    beforeSend: function() {
                                        $('#tbodyContents').html('<center><strong style="font-size:30px;padding-top:30px;"><h4><i class="fa fa-spin fa-spinner"></i> Please wait...</h4></strong></center>');
                                    },
                                    success: function(html) {
                                        var count = 1;
		   setInterval(function(){
			    if(count == 0){
                                        $("#tbodyContents").html(html);
                                       
				}
				count--;
		   },200)
                                    }
                                });
                            }
// display record
function deactRequest(str) {
                                $.ajax({
                                    type: "GET",
                                    url: "tbodyClient-deactivated?q="+str,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#tbodyContents').html('<center><strong style="font-size:30px;padding-top:30px;"><h4><i class="fa fa-spin fa-spinner"></i> Please wait...</h4></strong></center>');
                                    },
                                    success: function(html) {
                                        var count = 1;
		   setInterval(function(){
			    if(count == 0){
                                        $("#tbodyContents").html(html);
				}
				count--;
		   },200)
                                    }
                                });
                            }
// option modal

function dataOption(id){
		$(document).ready(function(){
			$("#myActionModal" + id).modal("show");
	//-------		
			});
	}

// function deactivate

function deactConfirm(id, name){
swal({
  title: "Confirmation",
  text: "Are you sure you want to deactivate "+name + "?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Deactivate it!",
  closeOnConfirm: false
},
function(){
	swal("Deactivating","Please wait...","warning");
	 $.ajax({
                                    
                                    url: "process/deactivate-process?id="+id,
									type: "POST",
                                    success: function(data) {
									if(data ='Deactivated'){
										$("#myActionModal" + id).modal("hide");	
										swal({
										title:"Deactivated",
										text:name+" is now deactivated and not available in the search engine",
										type:"success",
										showCancelButton:false,
										closeOnConfirm:true},
										
										function(){
										
                                    var count = 1;
		   							setInterval(function(){
			    						if(count == 0){
											displayRecords();
										}
									count--;
		  						 },200)
								 });
									}
                                   
									
									}
                                });
 //-----------
});
}
// update request
function upRequest(id){
	$(document).ready(function(){
	$("#myActionModal"+id).modal("hide");
	$("#myModalUpdate"+id).modal("show");
	});
}
//--
function updateSave(id){
	$(document).ready(function(){
		var date = document.getElementById('dateID'+id).value;
		if(date == ""){
			swal("Warning","Please input date","warning");
		}else{
		$("#msg"+id).html('<i class="fa fa-spin fa-spinner"></i> Saving..');
		$.ajax({
			url:'process/updatesubs-process?id='+id+'&date='+date,
			type:'POST',
			success:function(data){
				$("#myModalUpdate"+id).modal("hide");
				var count = 1;
				setInterval(function(){
					if(count == 0){
						displayRecords();
						//deactRequest(str);
					
					}
					count--;
				},200);
			}
			
		});
		}
	});
}
