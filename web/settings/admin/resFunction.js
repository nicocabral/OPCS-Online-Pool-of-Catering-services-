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
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
     $.ajax({
	  url: 'process/delLoc-process?id='+id,
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
// Notification Label
	function notifLabel(){
		 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
			
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var test_div = document.getElementById('notifLabel');
                test_div.innerHTML = xmlhttp.responseText;
              
            }
        }
        xmlhttp.open('GET','notifLabel.php',true);
        xmlhttp.send();
	
		
        
    }
	setInterval(notifLabel,200);
// Search Function
var xmlhttp;
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

function showData(str) {
  if (str=="") {
    document.getElementById("tbodyContents").innerHTML=tbodyRequest();
    return;
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("tbodyContents").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","tbodyLoc.php?q="+ str,true);
  xmlhttp.send();
}
function showModal(){
	$("#locationModal").modal("show");
}
function showAddloc(){
	$("#locationModal").modal("hide");
	$("#addLocModal").modal("show");
	
}
// display record
function displayRecords() {
                                $.ajax({
                                    type: "GET",
                                    url: "tbodyRes",
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


						
// edit Modal
function showEditModal(id){
	$(document).ready(function(){
	$("#editLocModal"+id).modal("show");
	
	});
}
function endRequest(id){
	$("#editLocModal"+id).modal("hide");
	var count = 1;
	setInterval(function(){
			    if(count == 0){
                $(document).ready(function(){
	
	displayRecords();
	
	});
				}
				count--;
		   },500)
}
function editRequest(town, tc, townid){
	var towndata = document.getElementById(town).value;
	   swal("Saving...","Plese wait","warning");
	  $.ajax({
	  url: 'process/editTown-process?town='+towndata+'&city='+tc+'&townid='+townid,
	  type: 'POST',
	  success: function (data) {
	if(data=="Please check your fields"){
	var count = 1;
		   setInterval(function(){
			    if(count == 0){
                 swal("Warning",data,"warning");
				 //endRequest(townid);
				}
				count--;
		   },1000)	
	}
	else if(data=="Sory this record might have duplication"){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                 swal("Warning",data,"warning");
				 //endRequest(townid);
				}
				count--;
		   },1000)	
	}
	else if(data=="Save successfully!"){
		var count = 1;
		   setInterval(function(){
			    if(count == 0){
                 swal("Success",data,"success");
				 endRequest(townid);
				}
				count--;
		   },1000)	
	}
	else{
	    var count = 1;
		   setInterval(function(){
			    if(count == 0){
                 swal("Error",data,"error");
				 //endRequest(townid);
				}
				count--;
		   },1000)
		   }
	 	
	  }
	  });
}