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
	
// display record
function displayRecords() {
                                $.ajax({
                                    type: "GET",
                                    url: "clientContents",
                                    cache: false,
                                    beforeSend: function() {
                                        $('#clientsContent').html('<center><strong style="font-size:36px;padding-top:30px;"><h4 style="font-size:16px;padding-top:10px;"><i class="fa fa-spin fa-spinner"></i> Please wait...</h4></strong></center>');
                                    },
                                    success: function(html) {
                                        var count = 1;
		   setInterval(function(){
			    if(count == 0){
                                        $("#clientsContent").html(html);
                                        
				}
				count--;
		   },500)
                                    }
                                });
                            }

						