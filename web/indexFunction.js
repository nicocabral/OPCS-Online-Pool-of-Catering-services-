$(window).load(function(){
    jQuery(".loader").fadeOut(1000);
		$(document).ready(function(){
			$('#cardBox').hide();
			$('#errormsg_cname').hide();
			$('#errormsg_oname').hide();
			$('#errormsg_email').hide();
			$('#errormsg_contact').hide();
			$('#errormsg_address').hide();
		})
});

    function signIn(){
		jQuery("#myModalsignIn").modal("show");
	}
function signUp(){
		jQuery("#myModalsignUp").modal("show");
	}
function termsAndCondition(){
		jQuery("#myModalTermsandCondition").modal("show");
		jQuery("#myModalsignUp").modal("hide");
	}
// select view
function selectView(){
		 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
			
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                var test_div = document.getElementById('search-field');
                test_div.innerHTML = xmlhttp.responseText;
              
            }
        }
        xmlhttp.open('GET','search-field.php',true);
        xmlhttp.send();
	
		
        
    }
// display record
function searchLocation(str) {
	$('#backImg').hide();
	$('#cardBox').fadeIn();
                                $.ajax({
                                    type: "GET",
                                    url: "searchResult?q="+str,
                                   
                                    beforeSend: function() {
										
    $('#search-Res').html('<center><strong style="font-size:20px;padding-top:30px;color:#FFF;"><i class="fa fa-spin fa-spinner"></i> Please wait...</p></strong></center>');
                                    },
                                    success: function(html) {
                                        var count = 1;
		   setInterval(function(){
			    if(count == 0){
                                        $("#search-Res").html(html);
                                       
				}
				count--;
		   },200)
                                    }
									
                                });
								
                            }

