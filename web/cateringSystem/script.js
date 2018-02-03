$(window).load(function(){
	$(document).ready(function(){
		$('#backTobundle').hide();
		$('#orderSection').hide();
		$('#orderForm').hide();
		$('#btnOrder').hide();
	
	});
});
function showServices(oid){
	if(oid == null){
		$('#showServices').empty();
	}else{
	$.ajax({
		url:'packAccordion?id='+oid,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#showServices').html('<center><h4><span class="fa fa-spin fa-spinner"></span> Please wait...</h4></center>')
		},
		success:function(html){
			$('#showServices').empty();
			$('#showServices').html(html);
		}
		
	});
	}
	return false;
	
}
function reservePack(oid,catid,packno){
	$.ajax({
		url:'../reservationForm?oid='+oid+'&catid='+catid+'&packageno='+packno,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#showServices').html('<center><h4><span class="fa fa-spin fa-spinner"></span> Please wait...</h4></center>');
		},
		success:function(html){
			$('#showServices').html(html);
		}
	});
return false;
	}
function reservationPerhead(id){
	
	$(document).ready(function(){
		$('#viewservicesOfferedModal').hide();
		$('#resPhModal').modal('show');
		
		//$.ajax({
			//url:'reservationPerhead?id='+id,
			//type:'GET',
			//cache:false,
			//beforeSend:function(){
			//	$('#showServices').html('<center><h4><span class="fa fa-spin //fa-spinner"></span> Please wait...</h4></center>');
			//},
			//success:function(html){
			//	$('#showServices').empty();
			//	$('#reservationOption').hide();
			//	$('#showServices').html(html);
			//}
		//});	
	});
//}
return false;
	}
function backTobundle(){
	$(document).ready(function(){
		
		$('#showServices').html('<center><h4><span class="fa fa-spin fa-spinner"></span> Please wait...</h4></center>');
		$('#showServices').empty();
		$('#reservationOption').fadeIn();
		$('#backTobundle').hide();
		$('#reservationPerhead').fadeIn();
		
	});
	return false;
}
function sum(){
	$(document).ready(function(){
		var txta = document.getElementById('selPrice').value;
		var txtb = document.getElementById('txtInputnumber').value;
		var res = parseFloat(txta).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString() * parseFloat(txtb).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
		if(!isNaN(res)){
			document.getElementById('totalres1').value=res.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
			document.getElementById('totalres').value=res.toFixed(2);
		}
		else {
			document.getElementById('totalres').value=0;
			document.getElementById('totalres1').value = 0;
		}
	});
	return false;
}
$(function(){
	$('body').delegate('#remove','click',function(){
		$(this).parent().parent().parent().remove();
	});
});

function addFood(id,fo){
	$(document).ready(function(){
		$('#myLoader').html('<span class="fa fa-spin fa-spinner"></span> Please wait...');
		var n  = ($('#myListbody tr').length-0)+1;
		$('#myListbody').append('<tr>'+
		'<td><p id="foodOrdered"><i class="fa fa-cutlery" style="color:green;"></i> '+fo+'<span style="color:#228B22;" class="glyphicon glyphicon-ok pull-right wow fadeInDown"></span></p><input type="hidden" value="'+fo+'" id="food_ordered[]" name="food_ordered[]" required></td><td><center><button class="btn btn-sm btn-danger" id="remove">x</button></center></td></tr>');
		$('#myLoader').empty();
		
	});
	return false;
}
function viewCat(str){
	$(document).ready(function(){
		var id = document.getElementById('mycatId').value;
	$.ajax({
		url:'menuList?cat='+str+'&id='+id,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#menuList').html('<center><tr><td><p><span class="fa fa-spin fa-spinner"></span> Please wait...</p></td></tr></center>')
		},
		success:function(html){
			$('#menuList').html(html);
		}
	});
	});
	return false
	
}
function addToordersection(id,name,img,price){
	$(document).ready(function(){
		$('#orderSection').fadeIn();
		$('#orderBodylist').html('<tr><td colspan="3"><center><label><span class="fa fa-spin fa-spinner"></span></label></center></td></tr>')
		var c=1;
		setInterval(function(){
			if(c==0){
				$('#orderBodylist').empty();
				$('#orderBodylist').append('<tr><td><img src="../settings/myaccount/'+img+'" class="img-responsive" width="40px;"></td><td><p>'+name+'<span class="pull-right" style="color:#228B22;"><i class="fa fa-check"></i></span><br>&#8369;'+price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+'</p><input type="hidden" value="'+name+'" name="ordername"><input type="hidden" value="'+price+'" name="orderprice" id="orderPrice"></td><td><button class="btn btn-danger btn-sm" id="orderRemove" data-toggle="tooltip" title="Cancel?">x</button></td></tr>');
				$('#btnOrder').fadeIn();
			}
			c--;
		},200);
	});
	return false;
}
$(function(){
	$('body').delegate('#orderRemove','click',function(){
		$(this).parent().parent().remove();
		$('#btnOrder').hide();
		$('#orderForm').hide();
		document.getElementById('orderTotal').value="";
		document.getElementById('orderQty').value="";
		document.getElementById('orderQty1').value="";
		
	});
});
function viewOrderform(){
	$(document).ready(function(){
		$('#orderForm').fadeIn();
	});
	return false;
}
function orderSum(id){
	$(document).ready(function(){
		var price = document.getElementById('orderPrice').value;
		var result = parseFloat(price).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()*parseFloat(id).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
		if(!isNaN(result)){
			document.getElementById('orderTotal').value=result.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
			document.getElementById('orderTotal1').value=result;
		}
		else {
			document.getElementById('orderTotal').value=0;
			document.getElementById('orderTotal1').value=0;
		}
	});
	return false;
}
function success(){
	$('#btnOrder').hide();
		$('#orderForm').hide();
		document.getElementById('orderTotal').value="";
		document.getElementById('orderQty').value="";
		document.getElementById('orderQty1').value="";
}
// save reservation
function submitOrder(){
	var catId = document.forms['submitOrderform']['catId'].value;
	var ordername = document.forms['submitOrderform']['ordername'].value;
	var orderprice = document.forms['submitOrderform']['orderprice'].value;
	var orderQty = document.forms['submitOrderform']['orderQty'].value;
	var customerName = document.forms['submitOrderform']['customerName'].value;
	var customerNo = document.forms['submitOrderform']['customerNo'].value;
	var customerAddress = document.forms['submitOrderform']['customerAddress'].value;
	var customerMsg = document.forms['submitOrderform']['customerMsg'].value;
	var orderDate = document.forms['submitOrderform']['orderDate'].value;
	var orderTime = document.forms['submitOrderform']['orderTime'].value;
	var orderType = document.forms['submitOrderform']['orderType'].value;
	$.ajax({
		url:'orderProcess?catId='+catId+'&ordername='+ordername+'&orderprice='+orderprice+'&orderQty='+orderQty+'&customerName='+customerName+'&customerNo='+customerNo+'&customerAddress='+customerAddress+'&customerMsg='+customerMsg+'&orderDate='+orderDate+'&orderTime='+orderTime+'&orderType='+orderType,
		type:'POST',
		cache:false,
		beforeSend:function(){
			swal({
				title:'',
				imageUrl:'images/ajax-loader.gif',
			})
		},
		success:function(data){
			if(data=='Please enter your valid name'){
					swal('Warning',data,'warning');
			}
			else if(data=='Please enter order qty'){
					swal('Warning',data,'warning');
			}
			else if(data=='Please enter your valid contact no'){
					swal('Warning',data,'warning');
			}
			else if(data=='Please enter your valid address'){
					swal('Warning',data,'warning');
			}
			else if(data=='Please enter a valid date'){
					swal('Warning',data,'warning');
			}
			else if(data=='Please enter a valid time'){
					swal('Warning',data,'warning');
			}
			else if(data=='Please select order payment'){
					swal('Warning',data,'warning');
			}
			else if(data=='Order send successfully. Thanks for visiting our site.We will contact you for confirmation Thank you!'){
					swal('\nOrder sent',data,'success');
					success();
					$('#orderBodylist').empty();
					$('#orderForm').fadeOut();
			}
			else{
				swal('Error',data,'error');
			}
		}
	});
	
	return false;
}
	