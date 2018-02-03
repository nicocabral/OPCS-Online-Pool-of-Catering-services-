<link rel="stylesheet" href="themes/cabral.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="magnific-popup/css/magnific-popup.css" />
	<link rel="stylesheet" href="fonts.css" />
	<link rel="stylesheet" href="fonts.css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="jquery.mobile.datepicker.css" />
<link rel="stylesheet" href="themes/jquery.mobile.structure-1.4.5.min.css" />
	<link rel="stylesheet" href="themes/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="themes/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="sweetalert/sweet-alert.css" />
	<link rel="stylesheet" href="css/style.css" />
	<script src="themes/jquery-1.11.1.min.js"></script>
<script src="themes/jquery.mobile-1.4.5.min.js"></script>
	<script src="jquery.mobile.datepicker.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
<script>
    function sum(data){
        var a = document.getElementById('pprice').value;
        var res = parseFloat(a) * parseFloat(data);
        if(!isNaN(res)){
            document.getElementById('totalp').value = res.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
            document.getElementById('totalpayment').value =res;
    }else if(a.val == 0 || a.val ==null){
        document.getElementById('totalp').value = 0;
              document.getElementById('totalpayment').value =0;
    }
        else {
             document.getElementById('totalp').value = 0;
              document.getElementById('totalpayment').value =0;
        }
        return false;
    }
    function pricequery(priceid){
        if(!isNaN(priceid)){
        $.ajax({
            url:'http://192.168.43.138/OPCS/android/pricequery?pid='+priceid,
            type:'POST',
            cache:false,
            beforeSend:function(){
                $.mobile.loader("show");
                $('#pricedes').fadeIn();
                $('#pricedescription').html('<center><h1><i class="fa fa-spin fa-spinner"></i></h1></center>');
            },
            success:function(html){
                 $('#nopeople').fadeIn();
                 $('#pricedes').fadeIn();
                $('#pricedescription').html(html);
            }
        });
        }
        else {
           $('#nopeople').hide();
            $('#pricedes').hide(); 
        }
        return false;
    }
    function filterfc(str){
        var id = document.getElementById('myid').value;
        $.ajax({
            url:'http://192.168.43.138/OPCS/android/rphcategory.php?filter='+str+'&id='+id,
            type:'POST',
            cache:false,
            beforeSend:function(){
                $.mobile.loader('show');
                $('#food_catlist').html('<tr><td><center><p style="color:green;">Loading...</p></center></td></tr>');
            },
            success:function(html){
                $('#food_catlist').empty();
                $('#food_catlist').html(html);
            }
        });
        return false;
    }
</script>
<form id="submitservation">
<table width="100%;">
<tr>
    <td colspan="2">
<select name="select-native-1" onchange="pricequery(this.value);" required>
       <option>Select price <span style="color:red;">*</span></option>
<?php 
include('database.php');
$getCid = intval($_GET['cid']);
$query = mysql_query("SELECT * FROM tbl_price WHERE mycat_id = '$getCid'") or die (mysql_error());
if(mysql_num_rows($query)>0){
    while($row = mysql_fetch_array($query)){
?> 
<option value="<?php echo $row['priceid']?>">&#8369;<?php echo number_format($row['p_price'],2,'.',',');?></option>
<?php } 
}
?>
    </select>
<hr style="border:dashed 1px #000;">
</td>
</tr>
<tr id="pricedes">
    <td colspan="2"><p id="pricedescription"></p></td>
</tr>

<tr id="nopeople">
    <td>
<label style="margin-top:5px;font-size:12px;">Input no. of people Ex. 50</label>
<input type="number" style="width:100%;text-align:center;" placeholder="0" onkeyup="sum(this.value);" name="txtInputnumber">
    </td>
     <td>
<label style="margin-top:5px;font-size:12px;">&#8369;Total</label>
<input type="text" style="width:100%;text-align:center;" id="totalp"  readonly>
<input type="hidden"  id="totalpayment"  readonly>
<input type="hidden"  id="mycatId" value="<?php echo $getCid?>">
    </td>
  
    </tr>
<tr>
<td colspan="2">
    <select name="eventname" id="select-native-3" required>
       <option>Select event <span style="color:red;">*</span></option>
<?php 
include('database.php');
$getCid = intval($_GET['cid']);
$queryevent = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '$getCid'") or die (mysql_error());
if(mysql_num_rows($queryevent)>0){
    while($rows = mysql_fetch_array($queryevent)){
?> 
<option value="<?php echo $rows['oid']?>"><?php echo $rows['ocassion_name'];?></option>
<?php } 
}
?>
    </select>
<hr style="border:dashed 1px #000;">
</td>
</tr>
    
    </table>
    <table style="height:150px; width:100%;">
    <thead>
    <tr> <td ><em style="font-size:11px;"><i class=" fa fa-hand-pointer-o"></i> Tap the food to add on your menu</em><hr></td></tr>
    <tr>
        <th><h3><i class="fa  fa-list-alt"></i> Menu</h3><hr></th>
    </tr>
</thead>
<tbody id="food_catlist">
     <?php include('database.php');
                $listquery = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id = '$getCid' order by food_offered") or die (mysql_error());
                while($listrow = mysql_fetch_array($listquery)){?>
               
    <tr style="border:1px;" onclick='addtomenulist("<?php echo $listrow['food_offered']?>")'>
        <td><p><i class="fa fa-cutlery" style="color:green;"></i><?php echo $listrow['food_offered'];?></p><hr></td>
    </tr>
    <?php } ?>
    </tbody>
    <tfoot>
        <tr>
        <td colspan="2">
            <select onchange="filterfc(this.value);" >
                <option>Select food category</option>
                <?php include('database.php');
                $catquery = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id = '$getCid'") or die (mysql_error());
                while($catrow = mysql_fetch_array($catquery)){?>
                <option value="<?php echo $catrow['food_category']?>"><i class="fa fa-cutlery"></i> <?php echo $catrow['food_category'];?></option>
               
                <?php }
                ?>
            </select>
             <input type="hidden" id="myid" value="<?php echo intval($_GET['cid']);?>">
            </td>
       
    </tr>
    </tfoot>
</table>
<table style="height:150px; width:100%;" border="1px;">
<thead>
    <tr>
        <th><h3><i class="fa  fa-list-alt"></i> My menu list <span style="color:red;">*</span></h3></th>
        <th><h3><center><i class="fa fa-gear"></i></center> </h3></th>
        </tr>
</thead>
 <tbody class="mmlist">

 </tbody>
 
</table>
<table width="100%; margin-top:10px;">
<tr>
    <td colspan="2"><p><strong><em>Information details</em></strong></p>
    <p>Fields with <span style="color:red;">*</span> are required</p></td>    
</tr>    
<tr>
    <th>Name<span style="color:red;">*</span>:</th>
    <td><input type="text" name="infoname" required></td>
    </tr>
<tr>
    <th>Contact<span style="color:red;">*</span>:</th>
    <td><input type="text" name="infocontact" required></td>
    </tr>
<tr>
    <th>Email<span style="color:red;">*</span>:</th>
    <td><input type="text" name="infoemail" required></td>
    </tr>
<tr>
    <th>Address<span style="color:red;">*</span>:</th>
    <td><textarea name="infoaddress" required></textarea></td>
    </tr>
<tr>
    <th>Date of event<span style="color:red;">*</span>:</th>
    <td><input type="date" placeholder="MM/DD/YYYY" name="infodoe" required></td>
    </tr>
<tr>
    <th>Time of event<span style="color:red;">*</span>:</th>
    <td><input type="time" name="infotoe" required></td>
    </tr> 
    <tr>
    <th>Message<span style="color:red;">*</span>:</th>
     <td><textarea name="infomsg" required></textarea></td>
    </tr> 
     <tr>
     <td colspan="2"><p><em>Note: Please provide a valid contact/email for us to confirm your reservation. Thank you!</em></p></td>
    </tr>  
    <tr>
     <td colspan="2"><button class="ui-shadow ui-btn" type="submit" name="save"><i class="fa fa-check" style="color:green;"></i> Reserve</button></td>
    </tr>   
<table>
</form>
<script>
   function addtomenulist(fo){
       $('.mmlist').append('<tr><td><p>'+fo+'<i class="fa fa-check" style="color:green;"></i></p><input type="hidden"  value="'+fo+'" name="foodmenu[];"></td><td><center><button style="color:red;" id="remove">x</button></center></td></tr>');
       return false;
   }
  $(function(){
      $('body').delegate('#remove','click',function(){
            $(this).parent().parent().parent().remove();
      });
  })
  $("#submitservation").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	  //grab all form data  
	  var formData = new FormData();
	  $.ajax({
	  url: 'http://192.168.43.138/OPCS/android/addProcess.php',
	  type: 'POST',
	  data: formData,
      async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
      beforeSend:function(){
          $.mobile.loader("show");
      },
	  success: function (data) {
          console.log(data)
          if(data == "success"){
             swal({
  title: data,
  type: "success",
  showCancelButton: false,
  confirmButtonClass: "ui-btn ui-shadow",
  confirmButtonText: "Ok",
  closeOnConfirm: true
},
function(){
 window.location.href="index";
});
          }
         
	  else {
          swal({
              title: data,
              type: "warning",
              confirmButtonClass:"ui-shadow ui-btn"
          });
      }
      }
	  });
	  return false;
	});
</script>


