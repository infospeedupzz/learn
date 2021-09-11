<?php include('layout/session.php');
if(empty($userInfo)){
    echo"<script> window.location.href='online-test-series';</script>";
    die();
}
   //get mock Question
   $mock_id=$functionClass->DE($_GET['n']);
   $allowed_image_extension = array("png", "jpg", "jpeg", "PNG", "JPG", "JPEG");
    $conArr=array("id"=>$mock_id);    
    $resultMock=$functionClass->getRowsByWhere("mock","id=:id",$conArr);
       $conArr=array("mock_id"=>$mock_id);    
    $resultM=$functionClass->getRowsByWhere("mock_questions","mock_id=:mock_id",$conArr);
   //get mock Question
   //get subject ids
   $countS=0;
    $subjectArr=array();
    $subjectnameArr=array();
    $sectionQuestionCount=array();
    foreach ($resultM as $rowM){
        if(!in_array($rowM['subject_id'],$subjectArr)){
         
            $subjectname=$functionClass->getColById("subject"," name ",$rowM['subject_id']);
               $subjectArr[$countS]=$rowM['subject_id'];
               $subjectnameArr[$countS]=$subjectname[0]['name'];
            //count num of question  
            $QcountArr=array("mock_id"=>$mock_id,"subject_id"=>$rowM['subject_id']);    
             $resultQC=$functionClass->countRows("mock_questions where mock_id=:mock_id and subject_id=:subject_id ",$QcountArr);
             $sectionQuestionCount[$countS]=$resultQC;
              $countS++;
        }
    }
        $conArrC=array("id"=>$resultMock[0]['course_id']);    
    $resultCourse=$functionClass->getRowsByWhere("course","id=:id",$conArrC);

   //end of subject ids 
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- meta tag -->
      <meta charset="utf-8">
      <title>Mock <?php echo $resultMock[0]['title'];  ?></title>
      <meta name="description" content="">
      <?php include("layout/head.php"); ?>
      <!-- this page css-->
      <link rel="stylesheet" type="text/css" href="assets/css/mock.css">
      <style>
          .correct-ans{
                  border: 1px solid #0eb582!important;
                    color: #0eb582!important;
          } 
          .incorrect-ans{
                    border: 1px solid #dc3545!important;
                    color: #dc3545;
                    background: #dc354542!important
          }
      </style>
   </head>
   <body class="defult-home" style="color:black">
      <!--Preloader area start here-->
      <?php  include("layout/preloader.php");?>
      <!--Preloader area End here-->
      <!--Full width header Start-->
      <div class="full-width-header header-style1 home8-style4">
         <!--Header Start-->
         <header id="rs-header" class="rs-header">
            <!-- Topbar Area Start -->
            <div class="topbar-area home8-topbar">
               <div class="container" style="border-bottom: 1px solid #aeb5bb;">
                  <div class="q-block"  >
                     <div class="row y-middle" style="margin: 0px;" >
                        <div class="col-md-12 col-lg-9 col-sm-6 col-xs-6 float-letf">
                           <ul class="topbar-contact">
                             <li >
                               <a title="Go back" href="/" style='color:white;margin-top:6px!important;'><i class="fa fa-arrow-left"></i> </a> 
                              </li>
                               <li ><?php echo $resultCourse[0]['name']; ?></li>
                              <li  >
                                <?php echo $resultMock[0]['title'];  ?>
                              </li>
                              <li class="login-register side-barmenu text-right">
                                 <span class='text-right' >
                                    <a id="nav-expander" class="nav-expander">
                                       <div class="bar">
                                          <i class="fa fa-bars" aria-hidden="true"></i>
                                       </div>
                                    </a>
                                 </span>
                              </li>
                           </ul>
                        </div>
                        <div class="col-md-3  col-lg-3 col-sm-6 col-xs-6 text-right float-right lanuage-div " >
                           <ul class="topbar-contact">
                              <li class="login-register">
                                 View In:
                                 <select >
                                    <option>English</option>
                                    <!--<option>Hindi</option>-->
                                 </select>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="n-block"  >
                     <div class="row y-middle" style="margin: 0px;">
                        <div class="col-md-12  text-right">
                         
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Topbar Area End -->
            <!-- Canvas Menu start -->
            <nav class="right_menu_togle hidden-md">
               <div class="close-btn">
                  <span id="nav-close">
                     <div class="line close-btn-side" >
                        <span class="line1"></span><span class="line2"></span>
                     </div>
                  </span>
               </div>
               <div class="row" style="margin: 0px;">
                  <div class="col-md-12 plr0" >
                     <ul class="topbar-right">
                        <li class="btn-part pv2 mt-1" >
                                 <?php if(!empty($userInfo[0]['profile_pic'])){?>
                                                            <img id="blah" style='width:35px' src="<?php echo $userInfo[0]['profile_pic']; ?>" alt="user-image" class="img-fluid radius-round border">
                                                            <?php }else{ ?>
                                                             <img id="blah" style='width:35px' src="assets/images/useravtar.png" alt="user-image" class="img-fluid radius-round border">   
                                                             <?php } 
                                        ?>
                           <b><?php echo $userInfo[0]['fullname'];  ?></b>
                        </li>
                        <li class="btn-part f6 overflow-ellipsis pv2" style="background: #dee2e6">
                           <span>SECTION:<span  class='sectionName'><?php echo $subjectnameArr[0]; ?></span></span>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-12 plr0 q-div" >
                  <!--mobile question number here -->    
               </div>
               <div  class="row" style=" width: 100%; margin: 0px;padding-top: .5rem;">
                  <div class="col-md-12 col-sm-12 col-xs-12 plr0 pv2">
                     <table style='width:100%'>
                        <tr>
                           <td><span class="br-100 ins-span" > </span>  <span style="display: inline-block;font-size: 13px;">Answered</span></td>
                           <td>  <span class="br-100 ins-span" style="background: #dc3545;" > </span>  <span style="display: inline-block;font-size: 13px;">Not Answered</span></td>
                        </tr>
                        <tr>
                           <td > <i style="color: #ffc107;" class="fa fa-star" aria-hidden="true"></i> <span style="display: inline-block;font-size: 13px;">Mark for review</span></td>
                           <td ><span class="br-100 ins-span" style="background: #fff; border: 1px solid grey" > </span><span style="display: inline-block;font-size: 13px;">Not Visited</span></td>
                        </tr>
                     </table>
                  </div>
               </div>
            
            </nav>
            <!-- Canvas Menu end -->
         </header>
      </div>
      <!--Full width header End-->
      <!-- Main content Start -->
      <div class="main-content">
         <!-- Blog Section Start -->
         <div class="rs-inner-blog orange-color  pb-5 md-pt-5 md-pb-5">
            <div class="container">
               <div class="q-block"  >
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12">
                        <div class='section-title'>
                           <div class=" dn flex-shrink-0 gray items-center f6">SECTIONS :</div>
                        </div>
                        <div class='section-div' >
                             <input type='hidden' id='sectionName' value="<?php echo $subjectnameArr[0]; ?>">
                              <input type='hidden' id='sectionID' value="<?php echo $subjectArr[0]; ?>">
                           <div class="flex w-100 overflow-auto mh2">
                              <?php
                                 $sectionCount=0;
                                 foreach($subjectArr as $subjectID){
                                         $sectionCount++;
                                         $subjectBtnActive="";
                                         if($sectionCount==1){
                                             $sectionId=$subjectID;
                                              $subjectBtnActive="activeBtn";
                                          
                                         }

                                 ?>
                             
                              <button onclick="getNumofQuestion(<?php echo $mock_id; ?>,<?php echo $subjectID;?>,<?php echo ($sectionCount-1); ?>)" id='subject_<?php echo $subjectID; ?>' data-idx="0" role="button" type="button" aria-label="<?php echo $subjectnameArr[$sectionCount-1]; ?>" class="b--black-20  <?php echo $subjectBtnActive; ?> sectionBtn gray pointer f6 ba br-pill flex flex-shrink-0 h2 items-center mv2 mr2 ph3"><?php echo $subjectnameArr[$sectionCount-1]; ?></button>
                              <?php } ?>                         
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12 pv2" style=" background: #e5e5e5">
                        <span class='float-left'>Question <span id='question_num'>1</span>/<?php echo $resultMock[0]['questions']; ?></span>  <span class='float-right'><span style='font-size:12px;'>Marks: <span class='text-success'>+1.0</span> <span class='text-danger'>-0.25</span></span></span>
                     </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-6 mb-10 mt-20" style="border-right: 1px solid #aeb5bb;" id="desCol">
                        <div style="height: 100%; max-height: 450px; overflow: auto;" id='questiondescriptionData'>
                           <!-- question here -->
                        </div>
                     </div>
                     <div class="col-md-6 mt-20 mb-10"  id="optionCol">
                        <div style="height:100%; max-height: 450px; overflow: auto;" id='objectData'>
                           <input type='hidden' id='shdkhf_qid' value=''>
                           <p id='questionData'></p>
                           <ul class='option-li' id='optionData' >
                              <!-- option data here-->
                           </ul>
                        </div>
                     </div>
                  </div>
                  <hr>
                    <div class="row" style="margin: 2px;">
                        <div class="col-md-12">
                    
                                <div id="accordion" class="accordion "  style='display:block'>
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link " data-toggle="collapse" href="#collapseOne" aria-expanded="false">Explain It</a>
                                </div>
                                <div id="collapseOne" class="collapse show " data-parent="#accordion" style="">
                                    <div class="card-body" id='detailData'>
                                     
                                    </div>
                                </div>
                            </div>
                          
                         </div>
                            
                        </div>
                    </div>
                <div class="fix-bottom">
                     <div class="row" style="margin: 0px;">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 plr0 pv2">
                           <button class="bottom-btn float-left previous" style='margin-right:2px;' >
                             PREVIOUS
                           </button>
                           <button type='button' class=" bottom-btn float-right save-next" >
                            NEXT
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="n-block-1" >
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12 plr0" >
                        <ul class="topbar-right">
                           <li class="btn-part pv2 mt-1" >
                                <?php if(!empty($userInfo[0]['profile_pic'])){?>
                                                            <img id="blah" style='width:35px' src="<?php echo $userInfo[0]['profile_pic']; ?>" alt="user-image" class="img-fluid radius-round border">
                                                            <?php }else{ ?>
                                                             <img id="blah" style='width:35px' src="assets/images/useravtar.png" alt="user-image" class="img-fluid radius-round border">   
                                                             <?php } 
                                        ?>
                                     <b> <?php echo $userInfo[0]['fullname'];  ?></b>
                           </li>
                           <li class="btn-part f6 overflow-ellipsis pv2 pl-2" style="background: #dee2e6">
                                <span>SECTION:<span class='sectionName'><?php echo $subjectnameArr[0]; ?></span></span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12 plr0 q-div" >
                        <!--question number here -->  
                     </div>
                     <div  class="row" style=" width: 100%; margin: 0px;padding-top: .5rem;">
                        <div class="col-md-6 plr0 pv2">
                           <span class="br-100 ins-span" > </span>  <span style="display: inline-block;font-size: 13px;">Answered</span>
                        </div>
                        <div class="col-md-6 plr0 pv2">
                           <span class="br-100 ins-span" style="background: #dc3545;" > </span>  <span style="display: inline-block;font-size: 13px;">Not Answered</span>
                        </div>
                        <div class="col-md-6 plr0 pv2">
                           <i style="color: #ffc107;" class="fa fa-star" aria-hidden="true"></i> <span style="display: inline-block;font-size: 13px;">Mark for review</span>
                        </div>
                        <div class="col-md-6 plr0 pv2">
                           <span class="br-100 ins-span" style="background: #fff; border: 1px solid grey" > </span><span style="display: inline-block;font-size: 13px;">Not Visited</span>
                        </div>
                     </div>
                   
                  </div>
               </div>
               
            </div>
         </div>
         <div class='qloader-div'>
            <img src='assets/images/loader.gif' class='qloader'>
         </div>
         <!-- Blog Section End -->
      </div>
      <!-- Main content End --> 
      <!-- modernizr js -->
      <script src="assets/js/modernizr-2.8.3.min.js"></script>
      <!-- jquery latest version -->
      <script src="assets/js/jquery.min.js"></script>
      <!-- Bootstrap v4.4.1 js -->
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- Menu js -->
      <script src="assets/js/rsmenu-main.js"></script> 
      <!-- op nav js -->
      <script src="assets/js/jquery.nav.js"></script>
      <!-- wow js -->
      <script src="assets/js/wow.min.js"></script>     
      <!-- plugins js -->
      <script src="assets/js/plugins.js"></script>
      <!-- magnific popup js -->
      <script src="assets/js/jquery.magnific-popup.min.js"></script>  
      <!-- main js -->
      <script src="assets/js/main.js"></script>
              <!-- contact form js -->
        <script src="assets/js/loginform.js"></script>
      <script>
     //   localStorage.clear(); 
         var sizeofSection;
        var subjectId=$("#sectionID").val();
         var MAINPATH="<?php echo MAINPATH; ?>";
         var subjectArr=<?php echo json_encode($subjectArr); ?>;
         var subjectnameArr=<?php echo json_encode($subjectnameArr); ?>;
         var sectionQuestionCountArr=<?php echo json_encode($sectionQuestionCount); ?>;
         var subjectCount=0;
        
         var sectionTime=0;
        
         var activeid=1;
         var extn = ["png", "jpg", "jpeg", "PNG", "JPG", "JPEG"];
             $(".num-click").hover(function(){
                  var id = $(this).data('id');
                 $(".linenum").removeClass("active-qnum");
                 $(".active-line_"+id).addClass("active-qnum");
                 $(".active-line_"+activeid).addClass("active-qnum");
             });
             
             
         //set for previos and next
         var pervious=1,next=2;
           
         
           
           //insert data into local
     
        
        
        $(".previous").click(function(){
            if(pervious>=1){
             $(".questionnum_"+pervious).trigger( "click" );
              
           
            }
        });
        $(".save-next").click(function(){
            if(next<=sizeofSection){
             $(".questionnum_"+next).trigger( "click" );
              
            
            }else{
                 subjectCount++;
                              subjectId=subjectArr[subjectCount]
                                  getNumofQuestion(<?php echo $mock_id; ?>,subjectId,subjectCount);
            }
        });
          
         function setQuestionNum(qid){
    
             var storedData = localStorage.getItem("opjspn_option");
                 if (storedData!="" && storedData) {
                              
                                                  var  ArrayData = JSON.parse(storedData);
                                                        
                                                         for(var i=0;i<ArrayData.length;i++)
                                                         {
                                                             if(ArrayData[i]['shdkhf_qid']==qid){
                                                               $("input[name=option][value='" + ArrayData[i]['ans'] + "']").prop('checked', true);
                                                               $("input[name=option][value='" + ArrayData[i]['ans'] + "']").closest("li.optionClass").addClass("optionActive");
                                                        
                                                             }
                                                            
                                                         }
                 }
         }   
         
         
           
           
           function setQuestion(id,num){
                    next=num+1;
                    pervious=num-1;
                $(".close-btn-side").trigger("click");
               //loader
                $(".qloader-div").show();
               //loder
              activeid=id;
           
              $("#question_num").html(num);
              //active num
                  $(".linenum").removeClass("active-qnum");
                 $(".active-line_"+id).addClass("active-qnum");
                 $(".num-click").removeClass("activeBtn");
                 $(".questionnum_"+num).addClass("activeBtn");
                 //active num
                 $(".save-next").attr("disabled", true);
               
                  $.ajax({
                 url: "user-getMockQuestionByUser",
                 type: "post",
                 dataType: "json",
                 data:  {'qid':id,'num':num},
                 success: function (data) {
                       
                     var questionData="",detailData="";
                     var questiondescriptionData="";
                     var details=data[0]['details'].split('.').pop();
                        //detail data
                        if(data[0]['details']){
                            $("#accordion").hide();
                        }else{
                            $("#accordion").hide();
                        }
                       if(extn.includes(details)){
                           detailData=detailData+"<img src='"+MAINPATH+data[0]['details']+"'>";
                       }else{
                           detailData=detailData+data[0]['details']+"<br>";
                       } 
                       $("#detailData").html(detailData);
                       //detail data
                       var des=data[0]['description'].split('.').pop();
                        
                       if(extn.includes(des)){
                           questiondescriptionData=questiondescriptionData+"<img src='"+MAINPATH+data[0]['description']+"'>";
                       }else{
                           questiondescriptionData=questiondescriptionData+data[0]['description']+"<br>";
                       }
         
                        var question=data[0]['question'].split('.').pop();
             
                       if(extn.includes(question)){
                           questionData=questionData+"<img src='"+MAINPATH+data[0]['question']+"'>";
                       }else{
                           questionData=questionData+data[0]['question']+"<br>";
                       }
                       if(data[0]['description']){
                           $("#questiondescriptionData").html(questiondescriptionData);
                       }else{
                            $("#questiondescriptionData").html("");
                            $("#desCol").hide();
                              $("#desCol").removeClass("col-md-6");
                              $("#desCol").addClass("col-md-12");
                              $("#optionCol").removeClass("col-md-6");
                              $("#optionCol").addClass("col-md-12");
                       }
                        $("#questionData").html(questionData);
                        var optionData="";
                        var correct="",correct_class="",incorrect="";
                        
                        for(var q=1;q<=5;q++){
                            console.log(data[0]['correct_answer']);
                            if(data[0]['option'+q]==data[0]['correct_answer']){
                                correct='<span  class="float-right badge badge-success ans-msg" style="position: relative; bottom: 18px; right:8px;">Correct</span>';
                                correct_class="correct-ans";
                            }else{
                                correct="";
                                correct_class="";
                            }
                            if(data[0]['option'+q]==data[0]['user_answer']){
                                if(data[0]['user_answer']!=data[0]['correct_answer']){
                                    incorrect="incorrect-ans";
                                    correct='<span  class="float-right badge badge-danger ans-msg" style="position: relative; bottom: 18px; right:8px">Incorrect</span>';
                                }
                                if(extn.includes(data[0]['option'+q])){
                                     optionData=optionData+'<li class="optionClass optionActive '+correct_class+' '+incorrect+' " id="optionClick_'+q+'" ><label for="option'+q+'"><img src="'+MAINPATH+data[0]['option'+q]+'"></label> '+correct+'</li>';
                                }else{
                                    optionData=optionData+'<li class="optionClass optionActive '+correct_class+' '+incorrect+' " id="optionClick_'+q+'" ><label for="option'+q+'">'+ data[0]['option'+q]+'</label> '+correct+'</li>';
                                }
                                    
                                }else{
                                         if(extn.includes(data[0]['option'+q])){
                                                optionData=optionData+'<li class="optionClass '+correct_class+'" id="optionClick_'+q+'" ><label for="option'+q+'"><img src="'+MAINPATH+data[0]['option'+q]+'"></label> '+correct+'</li>';
                                         }else{
                                            optionData=optionData+'<li class="optionClass '+correct_class+'" id="optionClick_'+q+'" ><label for="option'+q+'">'+ data[0]['option'+q]+'</label> '+correct+'</li>';
                                         }
                                             
                                    }    
                        }
                 
                         $("#shdkhf_qid").val(data[0]['id']);
                         $("#optionData").html(optionData);
                          $(".qloader-div").hide();
                         
                          
                           if((sizeofSection+1)==num){
                              
                           }else{
                                     $(".save-next").html("NEXT");
                           }
                          setQuestionNum(id);
                            $(".save-next").attr("disabled", false);
                                  
                          
                          
                 }
             }); 
           }
         
         function  getNumofQuestion(mock_id,subject_id,startnum1){
             
             
               var runingsection = localStorage.getItem("runingsection");
               if(runingsection<=startnum1){
             var startnum=0;
                    if(startnum1==0){
                        startnum=1;
                    }else{
                        for( var k=0;k<startnum1;k++){
                            startnum=startnum+parseInt(sectionQuestionCountArr[k]);
                        }
                        startnum++;
                    }
                    
                 
              $.ajax({
                 url: "user_mock_test_question",
                 type: "post",
                dataType: "json",
                 data:  {'mock_id':mock_id,'subject_id':subject_id,'startnum':startnum},
                 success: function (data) {
                   
                     var activeClass="";
                     var qid,num,num12;
                    var numofquestion='<h6 style="margin-top:10px; margin-bottom:10px;">QUESTION PALLETE </h6>';
                    sizeofSection=data.length+startnum-1;
                    
                    for(var i=0;i<data.length;i++){
                             
                                 if(i==0){
                                    
                                     activeClass="activeBtn";
                                     qid=data[i]['id'];
                                     num=startnum;
                                     num12=startnum-1;
                                   
                                 }else{
                                  activeClass=""; 
                                 }
                                 
                                    if(data[i].user_answer=="null0"){
                                     activeClass="not-ans";
                                 }else if(data[i].user_answer=="Not Answered"){
                                     activeClass="";
                                 }else if(data[i].user_answer!="Not Answered"){
                                     activeClass="answer-btn";
                                 }else{
                                     activeClass=""; 
                                 }
                               
                                 
                                  numofquestion=numofquestion+'<div class="n-div"><button onclick="setQuestion('+data[i]['id']+','+startnum+')" type="button" class=" questionnum_'+startnum+'  n-btn '+activeClass+' num-click pa2" data-num="'+startnum+'"  data-id="'+data[i]['id']+'">'+startnum+'</button>';
                       if(i==0){ 
                                 numofquestion=numofquestion+'<span class="w2 active-qnum linenum active-line_'+data[i]['id']+'"></span>';
                      }else{
                               numofquestion=numofquestion+'<span class="w2 linenum active-line_'+data[i]['id']+'" ></span>';
                      } 
                          numofquestion=numofquestion+'</div>';
                          startnum++;
                     
                    }
                     $(".q-div").html(numofquestion);
                     setQuestion(qid,num);    
                   
                     $(".sectionBtn").removeClass("activeBtn");
                     $("#subject_"+subject_id).addClass("activeBtn");
                 }
             }); 
            }
         }
         
         
        
            
             
                  function setActiveoption(id){
                
                $(".optionClass").removeClass("optionActive");
                 $("#optionClick_"+id).addClass("optionActive");
             }
           $(".clearResponse").click(function(){
               $('.roption').prop('checked', false);
           });
           getNumofQuestion(<?php echo $mock_id; ?>,subjectId,subjectCount);
        var h=$( document ).height();
$(".q-div").css("max-height",(h-300));
      </script>
   </body>
</html>

