$(document).one('pageinit',function(){
  
$(window).load(function(){
    showLocation();
})

    function showLocation(){
          $.ajax({
                type:'GET',
                url:'http://192.168.43.138/OPCS/android/fetchdata_location.php',
                datatype:'json',
                beforeSend:function(){
                    $.mobile.loading("show",{
    					text: "Loading",
      					textVisible: true,
      					theme: "a",
      					html: ""

                    });
                },
                success:function(data){
                    //console.log(data)
                     for(var i = 0; i < data.length; i++){
                    $('#locationlist').append('<li class="ui-body-inherit ui-li-static" onclick="viewcatering('+data[i]['townid']+');"><a style="color:#000;"><i class="fa fa-street-view"></i> '+data[i]["town"]+'<br></a></li>');
                     }
                     $.mobile.loading('hide');
                     $('#home').bind('pageinit',function(){
                            $('#locationlist').listview('refresh');
                     });
                },
                error:function(){
                	 $.mobile.loading("show",{
    					text: "Error connecting to server",
      					textVisible: true,
      					theme: "a",
      					html: ""
                    });
                    setInterval(function(){
                        showLocation();
                    },5000);
                }
            });
        return false;
    }

});
function viewcatering(id){
    window.location.href="#searchresult?id="+id;
    $.mobile.loading('show');
      $.ajax({
        type:'POST',
        url:'http://192.168.43.138/OPCS/android/search_caterers.php?id='+id,
        datatype:'json',
        beforeSend:function(){
             $.mobile.loading("show",{
                					text: "Please wait",
                  					textVisible: true,
                  					theme: "a",
                  					html: ""
                                });
        },
        success:function(data){
        //console.log(data);
    if(data["message"] == "No available caterers."){
        $('#stats').empty();
        $('#stats').html('<li><center><label><strong style="color:red;">'+data["message"]+'</strong></label></center></li>')
 $.mobile.loading('hide');
    }else{
       $('#stats').empty();
         for(var i = 0; i < data.length; i++){ 
           $('#stats').append('<li class="ui-body-inherit ui-li-static" onclick="cateringservices('+data[i]['cid']+')"><i class="fa fa-cutlery"></i> '+data[i]['c_name']+'<br> <i class="fa fa-tags"></i> View catering services</li>');
           }
          $.mobile.loading('hide');
           $('#searchresult').bind('pageinit',function(){
                            $('#stats').listview('refresh');
                     });
          }
        },
        error:function(){
         $.mobile.loading("show",{
            					text: "Error connecting to server",
              					textVisible: true,
              					theme: "a",
              					html: ""
                            });
                            setInterval(function(){
                               viewcatering(id);
                            },5000);
        }
        });
    return false;

}
function cateringservices(cid){
     window.location.href="#viewservices?cid="+cid;
        $.mobile.loading("show");
      $.ajax({
        type:'POST',
        url:'http://192.168.43.138/OPCS/android/viewservices.php?id='+cid,
        datatype:'json',
        beforeSend:function(){
             $.mobile.loading("show",{
                					text: "Please wait",
                  					textVisible: true,
                  					theme: "a",
                  					html: ""
                                });
        },
        success:function(data){
           // console.log(data);
           
            for(var i=0;i < data.length;i++){
                $('#imgpopup').attr("href","http://192.168.43.138/OPCS/web/settings/account/"+data[i]["c_avatar"]);
                $('#imgbanner').attr("src","http://192.168.43.138/OPCS/web/settings/account/"+data[i]["c_avatar"]);
            $('#cname').html('<center><div class="ui-corner-all custom-corners">'+
  '<div class="ui-bar ui-bar-a">'+
   ' <h3><i class="fa fa-cutlery"></i> '+ data[i]["c_name"]+'<hr style="border:dotted 1px #FFF;"></center>'+
  '</div>'+
  '<div class="ui-body ui-body-a"><p><strong><i class="fa fa-volume-control-phone"></i> Contact: <br></strong><span style="margin-left:15px;">'+data[i]["c_contact"]+'</span></p>'+
 '<p><strong><i class="fa fa-at"></i> Email: <br></strong><span style="margin-left:15px;">'+data[i]["c_email"]+'</span></p>'+
 '<p><strong><i class=" fa fa-map-marker"></i> Location: <br></strong><span style="margin-left:15px;">'+data[i]["c_address"]+'</span></p></div>'+
'</div><hr>'+
			'<p>***<i class="fa fa-shopping-basket"></i> Catering services & reservations***</p>'+
			'<a onclick="rpp('+data[i]["cid"]+')" role="button" class="ui-shadow ui-btn ui-corner-all" data-transition="flip"><i class="fa fa-gift"></i> Rate per package services</a>'+
			'<button type="button" data-theme="a" class="ui-shadow ui-btn ui-corner-all" data-transition="flip"><i class="fa fa-user"></i> Rate per head services</button>'+
            '<button type="button" data-theme="a" class="ui-shadow ui-btn ui-corner-all" data-transition="flip"><i class="fa fa-cart-plus"></i> Available for orders services</button>');
            }
           
           $('#viewservices').bind('pageinit',function(){
                            $('#stats').listview('refresh');
                     });
             $.mobile.loading("hide");
        },
        error:function(){
         $.mobile.loading("show",{
            					text: "Error connecting to server",
              					textVisible: true,
              					theme: "a",
              					html: ""
                            });
                            setInterval(function(){
                                cateringservices(cid);
                            },5000);
        }
        });
    return false;

}
 $(document).ready(function () {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
function rpp(id){
     $.mobile.loading("show");
     window.location.href="#rpp?cid="+id;
     $.ajax({
         type:'POST',
         url:'http://192.168.43.138/OPCS/android/rpp.php?cid='+id,
         datatype:'json',
         cache:false,
         beforeSend:function(){
              $.mobile.loading("show");
         },
         success:function(data){
                //console.log(data);
            $('#list').empty();
            for(var i = 0 ;i < data.length; i++){
                    $('#list').append('<li class="ui-body-inherit ui-li-static ui-btn ui-shadow" onclick="rppservices('+data[i]["oid"]+')"><i class="fa fa-cart-plus" ></i> '+data[i]["ocassion_name"]+'</i>');
                }
           $('#rpp').one('pageinit',function(){
                            $('#list').listview('refresh');
                            
                     });
                 
             $.mobile.loading("hide");
         },
          error:function(){
         $.mobile.loading("show",{
            					text: "Error connecting to server",
              					textVisible: true,
              					theme: "a",
              					html: ""
                            });
                            setInterval(function(){
                               rpp(id);
                            },5000);
        }

     });
    return false;
}
function rppservices(oid){
    $(document).ready(function(){
        $.ajax({
         type:'POST',
         url:'http://192.168.43.138/OPCS/android/rppservices.php?oid='+oid,
         datatype:'json',
         cache:false,
         beforeSend:function(){
             $.mobile.loading("show");
         },
         success:function(data){
             console.log(data)
             window.location.href="#rppservices";
             $('#serviceslist').empty();
             for(var n = 0;n < data.length; n++){
             $('#serviceslist').html('<div data-role="collapsibleset" data-theme="a" data-content-theme="a" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">'+
             '<h3>'+data[n]['ocassion_name']+'</h3><div id="servicesoffered"></div></div>');
             }
              $('#rppservices').bind('pageinit',function(){
                            $('#serviceslist').collapsibleset();
                            
                     });
         },
        error:function(){
         $.mobile.loading("show",{
            					text: "Error connecting to server",
              					textVisible: true,
              					theme: "a",
              					html: ""
                            });
                            setInterval(function(){
                               rppservices(oid);
                            },5000);
        }
        });
    });
    return false;

}