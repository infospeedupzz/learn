<?php if(!empty($userInfo)){
  $ul=1;  
}else{
$ul=0;
}?>
  <script type="text/javascript">
//show noti

// var ul='<?php // echo $ul; ?>';
// function getNoti(limit){
//     var s="";
//     if(ul==0){
//          s='style="padding-top: 10px;"';
//     }
//      $.ajax({
//                  url: "getnoti",
//                  type: "post",
//                  data:  {'limit':limit},
//                  dataType: "json",
//                  success: function (data) {
//                      var data1="";
//                      if(data.length>0){
//                      for(var i=0;i<data.length; i++){
//                          data1=data1+'<a href="#" class="d-block"><div class="mess__item"><div class="icon-element bg-color-3 text-white" '+s+'><i class="fa fa-check-circle"></i> </div>  <div class="content"><span class="time">'+data[i].date+" "+data[i].time+'</span><p class="text">'+data[i].title+'</p><p class="text"><span class="color-text">'+data[i].msg+'</span></p></div></div> </a>';
//                      }
                  
//                          if (typeof(Storage) !== "undefined") {
                            
//                                      var notiv = localStorage.getItem("notiid");
//                                      var notiv1 = localStorage.getItem("notiid1");
//                                          if(notiv1!=1){   
//                                          if(notiv!=data[0].id){
//                                              localStorage.setItem("notiid",data[0].id);
//                                              $(".quantity").show();
//                                          }else{
//                                               $(".quantity").hide();
//                                          }
//                                          }
                                          
//                          } 
                         
//                      }
//                      $("#get_noti").html(data1);
//                      $("#get_notim").html(data1);
//                      $("#nq").html(data.length);
//                  }
//              }); 
// }
// getNoti(10);
// setInterval(function(){ getNoti(10) }, 50000);
// //shoe Noti end
// $("#notificationDropdownMenu").click(function(){
//     localStorage.setItem("notiid1",0);
//     getNoti(10);
// });
</script>
 
  
 