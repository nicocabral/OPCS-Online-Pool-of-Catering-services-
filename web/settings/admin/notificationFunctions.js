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
// table body
function tbodyRequest(){
		 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
			
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var test_div = document.getElementById('tbodyContents');
                test_div.innerHTML = xmlhttp.responseText;
              
            }
        }
        xmlhttp.open('GET','tbodyNotif.php',true);
        xmlhttp.send();
	
		
        
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
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
     $.ajax({
	  url: 'process/delNotif-process?id='+id,
	  type: 'POST',
	  success: function(data) {
	  if(data == 'Deleted Successfully!'){
		  swal("Success",data,"success");
		  tbodyRequest();
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

// Search Function
var xmlhttp;
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

function showData(str) {
	var filter  = document.getElementById('filter').value;
	if(filter == 'notification'){
  if (str=="") {
    document.getElementById("tbodyContents").innerHTML=tbodyRequest();
    return;
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("tbodyContents").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","tbodyNotif.php?q="+str,true);
  xmlhttp.send();
  }
  else {
	  $.ajax({
		  url:'messageBody?filter='+str,
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
  return false;
}
//view data
function viewData(id){
swal({
  title: "Confirmation",
  text: "Registered this account?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Register",

},
function(){
 $("#regModal"+id).modal("show");	
});

}
// Generate Pword
function generatePword(id){
	var pattern_list="abcdefghijklmnopqrstuvwxyz123456789";
	var example='';
	var plen = document.getElementById('pwordLen'+id).value;
	for(i=0;i<plen;i++){
	example +=pattern_list.charAt(Math.floor(Math.random()*pattern_list.length));
	
	document.getElementById('genPword'+id).value = example;
	
	}
	return example;
}
// checking if available
function checkAvailable(str,id){
	$.ajax({
		url:'process/pwordChecking-process?q='+str,
		type:'POST',
		cache:false,
		beforeSend: function(){
			$('#result'+id).html('<i class="fa fa-spin fa-spinner"></i> Checking...');
		},
		success:function(html){
			var count = 1;
			setInterval(function(){
				if(count==0){
					$('#result'+id).html(html);
				}
				count--;
			},200);
		}
		
	});
}
// submit
function submit(id){
	$(document).ready(function(){
		var regDate = document.getElementById("regDate"+id).value;
		var tempPword = document.getElementById("tempPword"+id).value;
		var genPword = document.getElementById("genPword"+id).value;
		var email = document.getElementById("email"+id).value;
	if(regDate ==""){
		swal("Warning","Registration date must not be empty","warning");
	}
	else if (tempPword ==""){
		swal("Warning","Temporary Password must not be empty","warning");
	}
	else if (genPword ==""){
		swal("Warning","Generate a Password","warning");
	}
	else if(tempPword !=genPword){
		swal("Warning","Password did not match please try again","warning");
	}else {
		$.ajax({
			url:'process/reg-process?date='+regDate+'&pword='+tempPword+'&id='+id+'&email='+email,
			type:'POST',
			cache:false,
			beforeSend:function(){
				$("#logRes"+id).html('<i class="fa fa-spin fa-spinner"></i> Saving please wait...');
			},
			success:function(html){
				swal("Registered!",html,"success");
				var count = 1;
				setInterval(function(){
					if(count == 0){
						$("#regModal"+id).modal("hide");
						tbodyRequest();
					}
					count--;
				},2500);
			}
			
		});
	}
	});
}