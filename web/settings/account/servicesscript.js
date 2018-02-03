function notification(){
	$.ajax({
		url:'reservationNotif',
		type:'GET',
		cache:false,
		success:function(data){
			if(data!="" || data >0){
				
			
			swal({
  title: "Notification",
  text: "You have "+data+" new reservation",
  type: "warning",
  showCancelButton: false,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Ok",
  closeOnConfirm: true
},

function(){
 
});
			}
		}
	});
	return false;


}
setInterval(notification,5000);
function loadPackage(){
	$.ajax({
		url:'packagelist',
		type:'GET',
		cache:false,
		success:function(html){
			$('#saveresult').html(html);
		}
	});
	return false;
}
function selectcs(){
		$.ajax({
			url:'selectdata',
			type:'GET',
			cache:false,
			success:function(html){
				$('#selectcs').html(html);
				$('#vspModalsel').html(html);
				selectpn();
			}
		});
	
	return false;
}
function selectpn(){
	$.ajax({
		url:'selectpn',
		type:'GET',
		cache:false,
		success:function(html){
			$('#vspModalpackno').html(html);
		}
	});
	return false;
}
$(function(){
	var errormsg_csn = false;
	var errormsg_csd = false;
	$('#packname').focusout(function(){
		checkCsn();
		return false;
	});
	$('#description').focusout(function(){
		checkCsd();
		return false;
	});
	function checkCsn(){
		var csn = $('#packname').val();
		var pattern = new RegExp(/'|"|[0-9]/i);
		if(pattern.test($("#packname").val())){
			$('#errormsg_csn').html('<i class="fa fa-exclamation-circle"></i> Invalid input '+csn+'<br>');
			errormsg_csn = true;
		}
		else if (csn == "" || csn == " "){
			$('#errormsg_csn').html('<i class="fa fa-exclamation-circle"></i> Please input Catering services name<br>');
			errormsg_csn = true;
		}
		else {
			$('#errormsg_csn').fadeOut();
			errormsg_csn = false;
		}
		return false;
	}
	function checkCsd(){
		var des = $('#description').val();
		var pattern = new RegExp(/'|"|[0-9]/i);
		if(pattern.test($("#description").val())){
			$('#errormsg_csd').html('<i class="fa fa-exclamation-circle"></i> Invalid input '+des+'<br>');
			errormsg_csd = true;
		}
		else if (des == "" || des == " "){
			$('#errormsg_csd').html('<i class="fa fa-exclamation-circle"></i> Please input Catering services description<br>');
			errormsg_csd = true;
		}
		else {
			$('#errormsg_csd').fadeOut();
			errormsg_csd = false;
		}
		$('#savepackform').submit(function(event){
			 errormsg_csn = false;
			 errormsg_csd = false;
			 checkCsn();
			 checkCsd();
			 if(errormsg_csn == false && errormsg_csd == false){
				 event.preventDefault();
				 var pn = document.forms['savepackform']['packname'].value;
	var des = document.forms['savepackform']['description'].value;
	var stat = document.forms['savepackform']['status'].value;
				swal({
  title: "Confirmation",
  text: "Save "+pn+"?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Save",
  closeOnConfirm: true
},
function(){
	
  $.ajax({
		url:'process/savepackage_process?pn='+pn+'&des='+des+'&stat='+stat,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#saveresult').html('<center><h3 style="font-size:17px;"><i class="fa fa-spin fa-spinner"></i></h3></center>');
		},
		success:function(data){
			if(data == 'Please input a valid catering services name'){
				swal('Warning',data,'warning');
				
			}else if (data == 'Please input a valid description'){
				swal('Warning',data,'warning');
				
			}
			else if (data == 'You already save this package'){
				swal('Warning',data,'warning');
				
			}
			else if (data == pn+' save'){
		loadPackage();
  document.forms['savepackform']['packname'].value ="";
  document.forms['savepackform']['description'].value ="";
			}
			else {
				swal("Warning",data,"error");
			}
		}
	});
});

			 return true}else {
				 return false;
			 }
			return false;
		});
	}
	
});
function savepackage(){
	var pn = document.forms['savepackform']['packname'].value;
	var des = document.forms['savepackform']['description'].value;
	var stat = document.forms['savepackform']['status'].value;
	
	
	swal({
  title: "Confirmation",
  text: "Save "+pn+"?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Save",
  closeOnConfirm: true
},
function(){
	
  $.ajax({
		url:'process/savepackage_process?pn='+pn+'&des='+des+'&stat='+stat,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#saveresult').html('<center><h3 style="font-size:17px;"><i class="fa fa-spin fa-spinner"></i></h3></center>');
		},
		success:function(data){
			if(data == 'Please input a valid catering services name'){
				swal('Warning',data,'warning');
				
			}else if (data == 'Please input a valid description'){
				swal('Warning',data,'warning');
				
			}
			else if (data == 'You already save this package'){
				swal('Warning',data,'warning');
				
			}
			else if (data == pn+' save'){
		loadPackage();
  document.forms['savepackform']['packname'].value ="";
  document.forms['savepackform']['description'].value ="";
			}
			else {
				swal("Warning",data,"error");
			}
		}
	});
});

	return false;
}
function addscovered(){
	var txtsc = document.getElementById('txtsc').value;
	if(txtsc==" " || txtsc==null){
		swal('Please check your fields','','warning');
	}else{
	
			$('#scl').append('<tr style="color:#000;"><td>'+txtsc+'<input type="hidden" name="scov[]" value="'+txtsc+'"></td><td><center><button class="btn btn-danger" id="scremove">x</button></center></td></tr>');
			document.getElementById('txtsc').value = '';
		
	}
	return false;
}
$(function(){
	$('body').delegate('#scremove','click',function(){
		$(this).parent().parent().parent().remove();
	});
});
function addfcovered(){
	var txtfc = document.getElementById('txtfc').value;
	if(txtfc==" " || txtfc==null){
		swal('Please check your fields','','warning');
	}else{
	
			$('#fcl').append('<tr style="color:#000;"><td>'+txtfc+'<br><input type="hidden" name="fcov[]" value="'+txtfc+'"></td><td><center><button class="btn btn-danger" id="fcremove">x</button></center></td></tr>');
			document.getElementById('txtfc').value = '';
		
	}
	return false;
}
$(function(){
	$('body').delegate('#fcremove','click',function(){
		$(this).parent().parent().parent().remove();
	});
});
function showeditModal(id,pn,des,stat){
	$(document).ready(function(){
		$('#editModal').modal('show');
		document.getElementById('editpn').value=pn;
		document.getElementById('editdes').value=des;
		document.getElementById('editstat').value=stat;
		document.getElementById('editpoid').value=id;
	});
	return false;
}
function editpackage(){
	var pn = document.forms['editpackform']['packname'].value;
	var des = document.forms['editpackform']['editdes'].value;
	var stat = document.forms['editpackform']['status'].value;
	var oid = document.forms['editpackform']['poid'].value;
	var pattern = new RegExp(/'|"|[0-9]/i);
	if(pattern.test(pn)){
		$('#errormsg_pn').html('<i class="fa fa-exclamation-circle"></i> Invalid input '+ pn+'<br>');
	}
	else if (pattern.test(des)){
		$('#errormsgdes').html('<i class="fa fa-exclamation-circle"></i> Invalid input '+des+'<br>');
	}
	else if(des == "" || des == " "){
		$('#errormsgdes').html('<i class="fa fa-exclamation-circle"></i> Please input catering services name');
	}
	else if(pn == "" || pn == " "){
		$('#errormsg_pn').html('<i class="fa fa-exclamation-circle"></i> Please input catering services description');
	}else {
		$('#errormsg_pn').empty();
		$('#errormsgdes').empty();
		
	$.ajax({
		url:'process/updatepackage_process?pn='+pn+'&des='+des+'&stat='+stat+'&oid='+oid,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#saveresult').html('<center><h3 style="font-size:17px;"><i class="fa fa-spin fa-spinner"></i></h3></center>');
		},
		success:function(data){
			if(data == 'Please input a valid catering services name'){
				swal('Warning',data,'warning');
				loadPackage();
			}else if (data == 'Please input a valid description'){
				swal('Warning',data,'warning');
				loadPackage();
			}
			else if (data == 'You already save this package'){
				swal('Warning',data,'warning');
				loadPackage();
			}
			else if (data == pn+' updated'){	
			$('#editModal').modal('hide');
			var c=1;
			setInterval(function(){
				if(c==0){
					loadPackage();
				}
				c--;
			},500);
  
			}
		}
	});
	}
	return false;
}
function deletepack(oid,name){
	swal({
  title: "Confirmation",
  text: "Are you sure you want to delete "+name,
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
  $.ajax({
	 url:'process/deletepackage_process?oid='+oid,
     type:'POST',
	 cache:false,
	 success:function(data){
		 loadPackage();
	 }
  });
});
	return false;
}

$(function(){
	$(document).ready(function(){
		$('#searchvsp').click(function(){
			var oid = document.getElementById('oid').value;
			$.ajax({
				url:'searchvsp?oid='+oid+'&packno='+1,
				type:'POST',
				cache:false,
				beforeSend:function(){
					$('#vspresult').html('<center><h3><i class="fa fa-spin fa-spinner"></i></h3></center>');
				},
				success:function(html){
					$('#vspresult').empty();
					$('#vspresult').html(html);
					
				}
			});
		});
	});
});
function removescov(id,oid){
	var s = document.getElementById('selvalue').value;
	$.ajax({
		url:'process/removeservicecovered_process?id='+id,
		type:'POST',
		cache:false,
		success:function(data){
			$.ajax({
				url:'filterpprice?oid='+oid+'&packno='+s,
				type:'POST',
				cache:false,
				beforeSend:function(){
					$('#filterpackno').html('<center><h3><i class="fa fa-spin fa-spinner"></i></h3></center>');
				},
				success:function(html){
					$('#filterpackno').empty();
					$('#filterpackno').html(html);
					
				}
			});
		}
	});
	return false;
}
function removefcov(id,oid){
	var s = document.getElementById('selvalue').value;
	$.ajax({
		url:'process/removefoodcovered_process?id='+id,
		type:'POST',
		cache:false,
		success:function(data){
			$.ajax({
				url:'filterpprice?oid='+oid+'&packno='+s,
				type:'POST',
				cache:false,
				beforeSend:function(){
					$('#filterpackno').html('<center><h3><i class="fa fa-spin fa-spinner"></i></h3></center>');
				},
				success:function(html){
					$('#filterpackno').empty();
					$('#filterpackno').html(html);
					
				}
			});
		}
	});
	return false;
}
function showfilterpn(pn){
	$(document).ready(function(){
		var oid = document.getElementById('ocasion_id').value;
		
	
	$.ajax({
				url:'searchvsp?oid='+oid+'&packno='+pn,
				type:'POST',
				cache:false,
				beforeSend:function(){
					$('#vspresult').html('<center><h3><i class="fa fa-spin fa-spinner"></i></h3></center>');
				},
				success:function(html){
					$('#vspresult').empty();
					$('#vspresult').html(html);
					
				}
			});
			});
	return false;
}
function deletePack(oid,catid,pno){
	swal({
  title: "Confirmation",
  text: "Are you sure you want to delete this package?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
  $.ajax({
		url:'process/deletepack_process?oid='+oid+'&catid='+catid+'&pno='+pno,
		type:'POST',
		cache:false,
		success:function(data){
			var oid = document.getElementById('oid').value;
			$.ajax({
				url:'searchvsp?oid='+oid+'&packno='+1,
				type:'POST',
				cache:false,
				beforeSend:function(){
					$('#vspresult').html('<center><h3><i class="fa fa-spin fa-spinner"></i></h3></center>');
				},
				success:function(html){
					$('#vspresult').empty();
					$('#vspresult').html(html);
					
				}
			});
		}
	});
});
	
	return false;
}
function showrphModal(){
	$(document).ready(function(){
		$('#rphModal').modal('show');
		$('#btnshowpph').hide();
		$('#btnshowfo').hide();
		$('#btnupdate').hide();
		loadpriceList();
		foodlistbody();
	});
}
function loadpriceList(){
	$.ajax({
		url:'pricelistbody',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#pricelistbody').html('<tr><td colspan="4"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></td></tr>');
		},
		success:function(html){
			$('#pricelistbody').empty();
			$('#pricelistbody').html(html);
		}
	});
	return false;
}

function foodlistbody(){
	$.ajax({
		url:'foodlistbody',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#foodlistbody').html('<tr><td colspan="4"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></td></tr>');
		},
		success:function(html){
			$('#foodlistbody').empty();
			$('#foodlistbody').html(html);
		}
	});
	return false;
}

$(function(){
		$('#btnhidepph').click(function(){
			$('#pphcontent').fadeOut();
			$('#btnshowpph').fadeIn();
			$('#btnhidepph').hide();
			
		});
		$('#btnshowpph').click(function(){
			$('#pphcontent').fadeIn();
			$('#btnshowpph').fadeOut();
			$('#btnhidepph').fadeIn();
		})
		$('#btnhidefo').click(function(){
			$('#focontent').fadeOut();
			$('#btnshowfo').fadeIn();
			$('#btnhidefo').hide();
			
		});
		$('#btnshowfo').click(function(){
			$('#focontent').fadeIn();
			$('#btnshowfo').fadeOut();
			$('#btnhidefo').fadeIn();
		});
});
function submitform_price(){
	$(document).ready(function(){
	var price = document.forms['priceform']['pph'].value;
	var pc = document.forms['priceform']['pc'].value;
	var nod = document.forms['priceform']['nod'].value;
	swal({
  title: "Confirmation",
  text: "Save this price?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Save",
  closeOnConfirm: true
},
function(){
 $.ajax({
	url:'process/saveprice_process?price='+price+'&pc='+pc+'&nod='+nod,
    type:'POST',
	cache:false,
	success:function(data){
		if(data == 'Please input price'){
			swal(data,'','warning');
		}
		else if(data == 'Please input people covered'){
			swal(data,'','warning');
		}
		else if(data == 'Please input no of dish'){
			swal(data,'','warning');
		}
		else if(data == ''){
			loadpriceList();
			 document.forms['priceform']['pph'].value='';
			 document.forms['priceform']['pc'].value='';
		     document.forms['priceform']['nod'].value='';
		}else {
			swal(data,'','error');
		}
		
	}
 });
});
	});
	return false;
}
function deleteprice(id){
	swal({
  title: "Confirmation",
  text: "Delete this price?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
  $.ajax({
	 url:'process/deleteprice_process?id='+id,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 loadpriceList();
		
	 }
  });
});
	
	return false;
}

function deleteoffered(id){
	swal({
  title: "Confirmation",
  text: "Are you sure you want to delete this food?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
  $.ajax({
	 url:'process/deletefood_process?id='+id,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 foodlistbody();
	 }
  });
});
	
	return false;
}
function loadorderlist(){
	$.ajax({
		url:'aorderlist',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#orderlistbody').html('<tr><td colspan="4"><center><h3><i class="fa fa-spin fa-spinner"></i></h3></center></td></tr>');
		},
		success:function(html){
			var c=1;
			setInterval(function(){
				if(c==0){
			$('#orderlistbody').empty();
			$('#orderlistbody').html(html);
			$('#btneditorder').hide();
			}
			c--;
			},300);
		}
	});
	
	return false;
}
$("#saveorder").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/saveorder_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	   if(data == 'Please enter name/description'){
		   swal(data,'','warning');
	   } 
	  else if(data == 'Please enter price'){
		   swal(data,'','warning');
	   } 
	  else if(data == 'Please enter image'){
		   swal(data,'','warning');
	   } 
	  else if(data == 'Name/description is already save'){
		   swal(data,'','warning');
	   } 
	  else if(data == 'Save successfully!'){
		   loadorderlist();
		   document.getElementById('name_des').value="";
		   document.getElementById('name_price').value="";
		   document.getElementById('file').value="";
	   } 
	   else {
		   swal(data,'','error');
	   }
	  }
	  });
	  return false;
	});
function deleteorderdes(id){
	swal({
  title: "Confirmation",
  text: "Are you sure you want to delete this?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
  $.ajax({
	 url:'process/deleteorderdes_process?id='+id,
	 type:'POST',
	 cache:false,
	 success:function(data){
		 loadorderlist();
	 }
  });
});
	return false;
}
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
//
$(function(){
	var errorfo = false;
	var errorfc = false;
	$('#foodordered').focusout(function(){
		checkFo();
		return false;
	});
	$('#foodcategory').focusout(function(){
		checkFc();
		return false;
	});
	function checkFo(){
		var fo = $('#foodordered').val();
		var pattern = new RegExp(/'|"|[0-9]/i);
		if(pattern.test(fo)){
			$('#errormsg_fo').html('<i class="fa fa-exclamation-circle"></i> Invalid input');
			errorfo = true;
		}
		else if (fo == "" || fo == " "){
			$('#errormsg_fo').html('<i class="fa fa-exclamation-circle"></i> Please input foodordered');
			errorfo = true;
		}
		else {
			$('#errormsg_fo').empty();
			errorfo = false;
		}
		return false;
	}
	function checkFc(){
		var fc = $('#foodcategory').val();
		var pattern  = new RegExp(/'|"|[0-9]/i);
		if(pattern.test(fc)){
			$('#errormsg_fc').html('<i class="fa fa-exclamation-circle"></i> Invalid input');
			errorfc = true;
		}
		else if (fc == "" || fc == " "){
			$('#errormsg_fc').html('<i class="fa fa-exclamation-circle"></i> Please input foodordered');
			errorfc = true;
		}
		else {
			$('#errormsg_fc').empty();
			errorfc = false;
		}
		return false;
	}
	
$("#form_fo").submit(function(event){
	errorfo = false;
	errorfc = false;
	checkFo();
	checkFc();
	if(errorfo == false && errorfc == false){
		
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'process/savefoodoffered_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success:function(data){
		if(data == 'Please enter food name'){
			swal(data,'','warning');
		}
		else if(data == 'Please enter food category'){
			swal(data,'','warning');
		}
		else if(data == ''){
			foodlistbody();
			 document.forms['form_foofoffered']['fo'].value='';
			 document.forms['form_foofoffered']['fc'].value='';
		     
		}else {
			swal(data,'','error');
		}
		
	}
	  });
	  }else {
		return false;
	}
	return false;
	});

});