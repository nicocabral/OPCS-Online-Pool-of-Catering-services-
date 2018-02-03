 $(function(){
	 var error_cname = false;
	  var error_oname = false;
	  var error_email = false;
	  var error_contact = false;
	  var error_address = false;
	  $('#txt-Cname').focusout(function(){
		  checkCname();
			
	  }); 
	   $('#txt-Oname').focusout(function(){
			checkOname();
	  }); 
	   $('#txt-email').focusout(function(){
			checkEmail();
	  }); 
	   $('#txt-contact').focusout(function(){
			checkContact();
	  }); 
	   $('#txt-address').focusout(function(){
			checkAddress();
	  }); 

 function checkCname() {
	 var cname = $('#txt-Cname').val();
	 var pattern = new RegExp(/'|"|[0-9]/i);
	 if(pattern.test($("#txt-Cname").val())){
		 $('#errormsg_cname').fadeIn();
		 $('#errormsg_cname').html('<i class="fa fa-exclamation-circle"></i> <strong>'+cname+'</strong> is not acceptable.');
		error_cname = true;
	 }
	 else if (cname == "" || cname ==" "){
		$('#errormsg_cname').fadeIn();
		$('#errormsg_cname').html('<i class="fa fa-exclamation-circle"></i> Please input catering name'); 
		error_cname = true;
	 }
	 else {
		$('#errormsg_cname').fadeOut();
	 }
 }
 function checkOname() {
	 var oname = $('#txt-Oname').val();
	 var pattern = new RegExp(/'|"|[0-9]/i);
	 if(pattern.test($("#txt-Oname").val())){
		 $('#errormsg_oname').fadeIn();
		 $('#errormsg_oname').html('<i class="fa fa-exclamation-circle"></i> <strong>'+oname+'</strong> is not acceptable.');
		error_oname = true;
	 }
	 else if (oname == "" || oname ==" "){
		$('#errormsg_oname').fadeIn();
		$('#errormsg_oname').html('<i class="fa fa-exclamation-circle"></i> Please input owner name'); 
		error_oname = true;
	 }
	 else {
		$('#errormsg_oname').fadeOut();
	 }
 }
function checkEmail() {
	 var email = $('#txt-email').val();
	 var pattern = new RegExp(/@/i);
	 var c = new RegExp(/'|"/i);
	 if(pattern.test($("#txt-email").val())){
		 $('#errormsg_email').fadeOut();
		
	 }
	 else if (c.test($("#txt-email").val())){
		 $('#errormsg_email').fadeIn();
		 $('#errormsg_email').html('<i class="fa fa-exclamation-circle"></i> Please input a valid email address');
		error_email = true;
	 }
	 else {
		 $('#errormsg_email').fadeIn();
		 $('#errormsg_email').html('<i class="fa fa-exclamation-circle"></i> Please input a valid email address');
		error_email = true;
	 }
 }
function checkContact(){
	var contact = $("#txt-contact").val();
	var pattern = new RegExp(/'|"/i);
	if(pattern.test($("#txt-contact").val())){
		 $('#errormsg_contact').fadeIn();
		 $('#errormsg_contact').html('<i class="fa fa-exclamation-circle"></i> <strong>'+contact+'</strong> is not acceptable.');
		error_contact = true;
	}
	else if(contact == "" || contact == " "){
		$('#errormsg_contact').fadeIn();
		 $('#errormsg_contact').html('<i class="fa fa-exclamation-circle"></i> Please input your valid contact no.');
		error_contact = true;
	}
	else {
		$('#errormsg_contact').fadeOut();
	}
}
function checkAddress(){
	var add = $("#txt-address").val();
	var pattern = new RegExp(/'|"/i);
	if(pattern.test($("#txt-address").val())){
		 $('#errormsg_address').fadeIn();
		 $('#errormsg_address').html('<i class="fa fa-exclamation-circle"></i> <strong>'+add+'</strong> is not acceptable.');
		error_address = true;
	}
	else if(add == "" || add == " "){
		$('#errormsg_address').fadeIn();
		 $('#errormsg_address').html('<i class="fa fa-exclamation-circle"></i> Please input your address ');
		error_address = true;
	}
	else {
		$('#errormsg_address').fadeOut();
	}
}
 $("#signupForm").submit(function(event){ 
	  error_cname = false;
	  error_oname = false;
	  error_email = false;
	  error_contact = false;
	  error_address = false;
	  checkCname();
	  checkOname();
	  checkEmail();
	  checkContact();
	  checkAddress();
	 if(error_cname == false && error_oname == false &&  error_email == false && error_contact == false && error_address == false)
	 {
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	  $.ajax({
	  url: 'process/signup-process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	 	if(data == "Company name must not be empty")
		{
			swal("Error",data,"error")
			}
		else if(data == "Owner name must not be empty"){
			swal("Error",data,"error")
			}
		else if(data == "Email must not be empty"){
			swal("Error",data,"error")
			}
		else if(data == "Contact must not be empty"){
			swal("Error",data,"error")
			}
		else if(data == "Address must not be empty"){
			swal("Error",data,"error")
			}
		else if(data == "Invalid Address"){
			swal("Error",data,"error")
			}
		else if(data == "Account submitted successfully! We will contact you for registration transaction"){
			swal("Success",data,"success")
			$("#txt-Cname").empty();
			$("#myModalsignUp").modal("hide");
			}
			else {
				swal("Error",data,"error");
				}
		
	  
	  }
	  });
	  }else {
		  return false;
	  }
	 
	});
 
 });
// signup request
function signinRequest(){
	var username = document.getElementById('u-name').value;
	var password = document.getElementById('p-word').value;
	if(username == " "){
		swal("Warning","Username field must not be empty","warning");
		}
	else if(password == " "){
		swal("Warning","Password field must not be empty","warning");
		}
	else {
			$.ajax({
			url:'process/signin-process?uname='+username+'&pword='+password,
				type:'POST',
				cache:false,
				beforeSend:function(){
					$("#signInres").html('<center><h3><i class="fa fa-spin fa-spinner"></i> Signing in...</h3></center>');
				},
				success:function(data){
				if(data == 'Invalid username or password'){
					var count = 1;
					
					setInterval(function(){
						if(count == 0){
						
					$("#signInres").html('<center><p style="color:red">'+data+'</p></center>');
						}
						count--;
					},200);
				
				}
				else if(data == 'Your registration is out of date/expired please contact the administrator or message us for more information'){
					var count = 1;
					setInterval(function(){
						if(count == 0){
							swal({
  title: "Information",
  text: data,
  type: "warning",
  showCancelButton: false,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Message us",
  closeOnConfirm: true
},
function(){
  $('#signInres').empty();
  document.getElementById('u-name').value= '';
  document.getElementById('p-word').value = '';
  $('#msgModal').modal('show');
  
});
						}
						count--;
					},200);
				}
				else {
					window.location="loginAuth";
				}
				}
				
			});
		}
	
	}
function viewServices(id,tId){
	$('#search-Res').empty();
	 $(document).ready(function(){
		 $.ajax({
		url:'viewServicesModal?id='+id+'&tid='+tId,
		type:'GET',
		cache:false,
		beforeSend:function(){
			 $('#search-Res').html('<center><strong style="font-size:20px;padding-top:30px;color:#FFF;"><i class="fa fa-spin fa-spinner"></i> Please wait...</p></strong></center>');
		},
		success:function(html){
			var count = 1 
			setInterval(function(){
			if(count == 0){
			$('#search-Res').empty();
			$('#search-Res').html(html);
			$('#search-Res').fadeIn();
			}
			count--;
			},300);
		}
		});
	 });
	 return false;
}
//Owl-Multi
                $('#owl-multi').owlCarousel({
				   
				    margin:20,
				    nav:false,
				    autoplay:true,
				    responsive:{
				        0:{
				            items:1
				        },
				        480:{
				            items:2
				        },
				        700:{
				            items:4
				        },
				        1000:{
				            items:3
				        },
				        1100:{
				            items:5
				        }
				    }
				});
function showAsm(id){
	$(document).ready(function(){
		$('#accordion-modal'+id).modal('show');
	});
	return false;
}
function reservationForm(oid,cid,packno){
	$(document).ready(function(){
		$('#accordion-modal'+oid).modal('hide');
	var c = 1
	setInterval(function(){
		if(c==0){
	$.ajax({
		url:'reservationForm?catid='+cid+'&oid='+oid+'&packageno='+packno,
		type:'GET',
		cache:false,
		beforeSend:function(){
			 $('#search-Res').html('<center><strong style="font-size:20px;padding-top:30px;color:#FFF;"><i class="fa fa-spin fa-spinner"></i> Please wait...</p></strong></center>');
		},
		success:function(html){
			var count = 1
			setInterval(function(){
				if(count==0){
			$('#search-Res').html(html);
			
			}
			count--;
			},200);
			
		}
	});
	}
	c--;
	},300);
	});
	return false;
}
$("#msgForm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	
	  $.ajax({
	  url: 'process/message_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  beforeSend:function(){
		$('#logMessage').html('<center><h4><i class="fa fa-spin fa-spinner"></i> Sending please wait...</h4></center>');  
	  },
	  success: function (data) {
	 	if(data == 'Please check your fields'){
			var c = 1;
			setInterval(function(){
				if(c==0){
					$('#logMessage').empty();
					swal(data,'','warning');
					
				}
				c--;
			},200);
		}
		else if(data == 'Please input message'){
			var c = 1;
			setInterval(function(){
				if(c==0){
					$('#logMessage').empty();
					swal(data,'','warning');
				}
				c--;
			},200);
		}
		else if(data == 'Message sent! We will contact you within an hour. Thank you!'){
			var c = 1;
			setInterval(function(){
				if(c==0){
					$('#logMessage').empty();
					swal({
  title: "Message sent",
  text: data,
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Ok",
  closeOnConfirm: true
},
function(){
  window.location.href="index";
});
					
				}
				c--;
			},500);
		}
		
	  
	  }
	  });
	  return false;
	});
	

	