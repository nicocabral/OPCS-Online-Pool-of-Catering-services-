$(window).load(function(){
    $(".loader").fadeOut("slow");
	$(".processLoader").hide();
    
});
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
	
//---------------
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
//-------------------------------------------
$(document).ready(function()
{    
	$("#uname").keyup(function()
	{		
		var name = $(this).val();	
		
		if(name.length > 2)
		{		
			
			$("#result1").html('checking...'+name);
			$.ajax({
				
				type : 'POST',
				url  : 'process/username-check?data='+name,
				data : $(this).serialize(),
				success : function(data)
						  {
					         $("#result1").html(data);
					      }
				});
				return false;
			
		}
		else
		{
			$("#result1").html('');
		}
	});
	
});
function ajaxRequest(){
		 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
			
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var test_div = document.getElementById('accountInformation');
                test_div.innerHTML = xmlhttp.responseText;
              
            }
        }
        xmlhttp.open('GET','accountInformation.php',true);
        xmlhttp.send();
	
		
        
    }