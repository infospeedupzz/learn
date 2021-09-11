<?php include('layout/session.php');
   $quiz_id=$functionClass->DE($_GET['n']);
       $conArr=array("id"=>$quiz_id);    
    $resultQuiz=$functionClass->getRowsByWhere("quizzes","id=:id",$conArr);
       $conArr1=array("quiz_id"=>$quiz_id);    
    $resultQ=$functionClass->getRowsByWhere("quiz_questions","quiz_id=:quiz_id",$conArr1);
    $conArr11=array("id"=>$resultQuiz[0]['course_id']);    
    $resultCName=$functionClass->getRowsByWhere("course","id=:id",$conArr11);
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- meta tag -->
      <meta charset="utf-8">
      <title><?php echo $resultQuiz[0]['name']; ?></title>
      <meta name="description" content="">
      <!-- responsive tag -->
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include("layout/head.php"); ?>
      <style>
        .sideli-active{
                background: #273c66;
            color: white;
        }

        .badge-info {
    color: #fff;
    background-color: #273c66;
}
        .filterc{
            display: none!important;
        }
        @media screen and (max-width: 990px) {
          .filterc{
                display: block!important;
            }
            .sideQ{
                display: none!important;
            }
        }
    
         
         .p-label.p-size-3 {
         font-size: 12px;
         width: 32px;
         height: 32px;
         }
        
         .p-label {
         position: relative;
         border-radius: 50%;
         text-align: center;
         white-space: nowrap;
         display: inline-block;
         border: 1px solid white;
         color: #fff;
         font-size: 100%;
         vertical-align: middle;
         }
         .p-label.p-unseen {
         border-color: #51647a;
         }
         *, ::after, ::before {
         -webkit-box-sizing: border-box;
         box-sizing: border-box;
         }
  
         a {
         text-decoration: none;
       
         color: white;
    
         }
         #inner:first-child {
         margin-left: 0;
         }
         li {
         margin-left: 10px;
         }
         .hide {
         display: none;
         }
         .p-label.p-size-2 {
    font-size: .875rem;
    width: 26px;
    height: 26px;
} 
        .p-label.p-correct {
         background-color: #0ece6d;
         border: 1px solid #0ece6d;
         }
         .p-label.p-defualt{
                background: #273c66;
                 border: 1px solid #273c66;
        }
        .p-label.p-wrong {
            background-color: #e4174f;
            border: 1px solid #e4174f;
        }
         .option-list{
             background: white;
    border-radius: 5px;
    -webkit-box-shadow: -1px 1px 4px 0 rgba(117,138,172,.12)!important;
    box-shadow: -1px 1px 4px 0 rgba(117,138,172,.12)!important
         }
         .option-label{
             padding: 1.25rem;
             width:100%;
             cursor: pointer;
         }
         .next-div{
                 background: #273c66;
                
         }
           
        .qloader-div{
            display:none;
            position: absolute;
            background: #a3a3a457;
            width: 94%;
            text-align: center;
            height: 100%;
            padding-top: 100px;
            top:0px;
        }
        .qloader{
            width:60px!important;
        }  
        .wrong-ans{
            background: #f8f9fa;
             border: 1px solid #dc3545d1;
              padding-bottom: 11px!important;
        }
        .right-ans{
            background: #f8f9fa;
            border: 1px solid #0eb582;
            padding-bottom: 11px!important;
        }
        .ans-msg{
            position: relative;
            top:30px;
        }
      </style>
   </head>
   <body class="defult-home">
      <!--Preloader area start here-->
      <?php  include("layout/preloader.php");?>
      <!--Preloader area End here-->  
      <!--Full width header Start-->
      <?php  include("layout/header.php");?>
      <!--Full width header End-->
      <!-- Main content Start -->
      <div class="main-content ">
      <!-- Blog Section Start -->
      <div class="breadcrumb-area my-courses-bread loaded " style='padding-bottom:20px;'>
                   <div class="container ml-70" style='max-width:100%'>
                        <ul>
                        <li style="    display: inline-block; ">
                            <a style='color:white' class="active" href="/">Home</a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="quizzes">Quizzes </a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="#"  id="linkid"><?php echo $resultQuiz[0]['name']; ?> </a>
                        </li>
                       
                    </ul>
                    
                    </div>
                </div><!-- end breadcrumb-content -->
      
      <div class="rs-inner-blog orange-color gray-bg pt-20 pb-100 md-pt-20 md-pb-20">
                <div class="container" style='max-width:100%'>
                        
               
                    <div class="row">

            <div class="col-lg-12">
              
               <div class="filter-bar text-center justify-content-between align-items-center mb-10 filterc">
                 
                 
                  <div class="">
                     <div class="dropdown bootstrap-select sort-ordering-select dropup ">
                        <select id="quiz_select"  class="sort-ordering-select form-control" tabindex="-98" >
                          <?php   
                            $ccount=0;        
                            $conArrC = array('course_id' => $resultQuiz[0]['course_id']);                        
                            $resultQuizByC = $functionClass->getRowsByWhere("quizzes", "course_id=:course_id order by id DESC  ", $conArrC);
                            foreach ($resultQuizByC as $rowQC ) {
                                $ccount++;
                                ?>
                           <option data-name="<?php echo $rowQC['name']; ?>" <?php if($rowQC['id']==$quiz_id){ echo'selected';} ?>  <?php if(1==$rowQC['id']) {?> selected <?php } ?> value="<?php echo $rowQC['id']; ?>"><?php echo $rowQC['name']; ?></option>
                         <?php  }
                        ?>
                        </select>
                      
                      
                     </div>
                  </div>
                  <!-- end sort-ordering -->
               </div>
               <!-- end filter-bar -->
            </div>
            <!-- end col-lg-12 -->
         </div>
         <!-- end row -->
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-12 ml-70 md-pr-15 sideQ" >
                            <div class="widget-area">
                             
                             
                                  <div class="recent-posts mb-50 rounded-lg fixed p-2 " id="f" style='    position: fixed;width: 24%;'>
                                        <h3 class="widget-title"><?php echo $resultCName[0]['name'];  ?></h3>
                                      <ul class='side-ul' style="max-height: 300px; overflow-y: scroll;">
                     <?php   
                            $ccount=0;        
                           
                            foreach ($resultQuizByC as $rowQC ) {
                                $ccount++;
                                ?>
                                 <li id='quiz_li_<?php echo $rowQC['id']; ?>' onclick="setQuestion(<?php echo $rowQC['id']; ?>,'<?php echo $rowQC['name']; ?>')" class="<?php if($rowQC['id']==$quiz_id){ echo'sideli-active';} ?> quiz_lis" style='margin-left:0px;'><span class='badge badge-info mr-2'><?php echo $ccount; ?></span> <?php echo $rowQC['name']?></li>
                                <?php
                            }
                    ?>
                                      </ul>
                                  </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row questions">
                                
                                    <!-- question data-->
                              
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
      
 
      <!-- Blog Section End -->  
      <!-- Main content End --> 
      <!-- Footer Start -->
      <?php include("layout/footer.php"); ?>
      <!-- Footer End -->
      <!-- start scrollUp  -->
      <div id="scrollUp" class="orange-color">
         <i class="fa fa-angle-up"></i>
      </div>
      <!-- End scrollUp  -->
    
      <!-- modernizr js -->
      <script src="assets/js/modernizr-2.8.3.min.js"></script>
      <!-- jquery latest version -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
      <!-- Bootstrap v4.4.1 js -->
        <script src="lesson-detail/js/popper.min.js"></script>
        <script src="lesson-detail/js/bootstrap.min.js"></script>
      <!-- Menu js -->
      <script src="assets/js/rsmenu-main.js"></script> 
      <!-- op nav js -->
      <script src="assets/js/jquery.nav.js"></script>
      <!-- owl.carousel js -->
      <script src="assets/js/owl.carousel.min.js"></script>
      <!-- Slick js -->
      <script src="assets/js/slick.min.js"></script>
      <!-- isotope.pkgd.min js -->
      <script src="assets/js/isotope.pkgd.min.js"></script>
      <!-- imagesloaded.pkgd.min js -->
      <script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <!-- wow js -->
      <script src="assets/js/wow.min.js"></script>
      <!-- Skill bar js -->
      <script src="assets/js/skill.bars.jquery.js"></script>
      <script src="assets/js/jquery.counterup.min.js"></script>        
      <!-- counter top js -->
      <script src="assets/js/waypoints.min.js"></script>
      <!-- video js -->
      <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
      <!-- magnific popup js -->
      <script src="assets/js/jquery.magnific-popup.min.js"></script>      
      <!-- plugins js -->
      <script src="assets/js/plugins.js"></script>
      <!-- contact form js -->
      <script src="assets/js/loginform.js"></script>
      <!-- main js -->
      <script src="assets/js/main.js"></script>
      <script>
      
         
         //get quesetion
         var chkbind=0
              function setQuestion(id,name){
           
                $(".quiz_lis").removeClass("sideli-active");
                $("#quiz_li_"+id).addClass("sideli-active");
     
                  $(".qloader-div").show();
                      $.ajax({
                 url: "getQuizQuestion",
                 type: "post",
                    dataType: "json",
                 data:  {'qid':id},
                 success: function (data) {
                           var viewdata="";
                    for (var i=0; i<data.length; i++){
                            var nextid;
                                if(i<data.length-1){
                                    nextid=data[i+1].id;
                                }else{
                                    nextid=data[i].id;
                                }
                             viewdata=viewdata+'<input type="hidden" id="sdafsda_'+data[i].id+'" value="'+data[i].answer+'"><div class="col-lg-12 mb-20 "><div class="blog-item" id="blog-item_'+data[i].id+'"><span style="padding: 8px 12px;"  class="badge badge-info">'+(i+1)+'</span> <div class="blog-content"><h3 class="blog-title"><a style="font-size:1rem;color:black" href="javascript:void(0)">'+data[i].question+'</a></h3><div class="blog-desc">';
                                viewdata=viewdata+'<ul>';
                                viewdata=viewdata+' <li id="li1_'+data[i].id+'" onclick="chck('+data[i].id+',1,'+nextid+')" class="card-body option-list mb-10"  style="padding:0px;"><label class="option-label"><input type="radio" style="visibility: hidden;" name="options" id="option1_'+data[i].id+'" value="'+data[i].option1+'"><span id="numid1_'+data[i].id+'" class="p-label p-size-2 ml-2 mr-2 font-weight-semibold ng-binding p-defualt">1</span><span id="option-detail1_'+data[i].id+'">'+data[i].option1+'</span> <span id="ansmsg1_'+data[i].id+'" class="float-right badge badge-success ans-msg1 ans-msg"></span></label></li>'; 
                                viewdata=viewdata+' <li id="li2_'+data[i].id+'" onclick="chck('+data[i].id+',2,'+nextid+')" class="card-body option-list mb-10"  style="padding:0px;"><label class="option-label"><input type="radio" style="visibility: hidden;" name="options" id="option2_'+data[i].id+'" value="'+data[i].option2+'"><span id="numid2_'+data[i].id+'" class="p-label p-size-2 ml-2 mr-2 font-weight-semibold ng-binding p-defualt">2</span><span id="option-detail2_'+data[i].id+'">'+data[i].option2+'</span> <span id="ansmsg2_'+data[i].id+'" class="float-right badge badge-success ans-msg1 ans-msg"></span></label></li>';   
                                viewdata=viewdata+' <li id="li3_'+data[i].id+'"  onclick="chck('+data[i].id+',3,'+nextid+')" class="card-body option-list mb-10"  style="padding:0px;"><label class="option-label"><input type="radio" style="visibility: hidden;" name="options" id="option3_'+data[i].id+'" value="'+data[i].option3+'"><span id="numid3_'+data[i].id+'" class="p-label p-size-2 ml-2 mr-2 font-weight-semibold ng-binding p-defualt">3</span><span id="option-detail3_'+data[i].id+'">'+data[i].option3+'</span> <span id="ansmsg3_'+data[i].id+'" class="float-right badge badge-success ans-msg1 ans-msg"></span></label></li>';
                                viewdata=viewdata+' <li id="li4_'+data[i].id+'" onclick="chck('+data[i].id+',4,'+nextid+')" class="card-body option-list mb-10"  style="padding:0px;"><label class="option-label"><input type="radio" style="visibility: hidden;" name="options" id="option4_'+data[i].id+'" value="'+data[i].option4+'"><span id="numid4_'+data[i].id+'" class="p-label p-size-2 ml-2 mr-2 font-weight-semibold ng-binding p-defualt">4</span><span id="option-detail4_'+data[i].id+'">'+data[i].option4+'</span> <span id="ansmsg4_'+data[i].id+'" class="float-right badge badge-success ans-msg1 ans-msg"></span></label></li>'; 
                                if(data[i].option5){
                                 viewdata=viewdata+' <li id="li5_'+data[i].id+'" onclick="chck('+data[i].id+',5,'+nextid+')" class="card-body option-list mb-10"  style="padding:0px;"><label class="option-label"><input type="radio" style="visibility: hidden;" name="options" id="option5_'+data[i].id+'" value="'+data[i].option5+'"> <span id="numid5_'+data[i].id+'" class="p-label p-size-2 ml-2 mr-2 font-weight-semibold ng-binding p-defualt">5</span><span id="option-detail5_'+data[i].id+'">'+data[i].option5+'</span> <span id="ansmsg5_'+data[i].id+'" class="float-right badge badge-success ans-msg1 ans-msg"></span></label></li>';
                                }
                           viewdata=viewdata+'</ul></div></div></div></div>';
                      
                           
                    }
                    $("#linkid").html(name);
                    $(".questions").html(viewdata);
                    $('#f').followTo($('.questions:visible').height()-350);  
                 }
                }); 
              }

            function chck(id,num,nextid){
               var ans = $("#option"+num+"_"+id).val();
               var rans = $("#sdafsda_"+id).val();
               if(ans==rans){
                    $("#li"+num+"_"+id).addClass("right-ans");
                    $("#ansmsg"+num+"_"+id).html("Correct");
                    $("#ansmsg"+num+"_"+id).removeClass("badge-danger");
                    $("#ansmsg"+num+"_"+id).addClass("badge-succes");
                    $("#numid"+num+"_"+id).addClass('p-correct');
                    $("#numid"+num+"_"+id).removeClass("p-defualt");
               }else{
                     $("#li"+num+"_"+id).addClass("wrong-ans");
                    $("#ansmsg"+num+"_"+id).html("Incorrect");
                    $("#ansmsg"+num+"_"+id).removeClass("badge-succes");
                    $("#ansmsg"+num+"_"+id).addClass("badge-danger");
                    $("#numid"+num+"_"+id).addClass('p-wrong');
                    $("#numid"+num+"_"+id).removeClass("p-defualt");
               }
               for(var i=1; i<=5;i++){
                        if($("#option"+i+"_"+id).val()==rans){
                            $("#li"+i+"_"+id).addClass("right-ans");
                            $("#ansmsg"+i+"_"+id).html("Correct");
                            $("#ansmsg"+i+"_"+id).removeClass("badge-danger");
                            $("#ansmsg"+i+"_"+id).addClass("badge-succes");
                            $("#numid"+i+"_"+id).addClass('p-correct');
                            $("#numid"+i+"_"+id).removeClass("p-defualt");
                        }
               }    
                scrollDown(id);
                
                
            }
                

              setQuestion(<?php echo $quiz_id; ?>,'<?php echo $resultQuiz[0]['name']; ?>');
              $('#quiz_select').change(function(){
                    
                    var name=$(this).find(':selected').data('name');
                    var id=$(this).find(':selected').val();
                     setQuestion(id,name);
              });
             
         //end of get question
         
       var windw = this;

$.fn.followTo = function ( pos ) {
    var $this = this,
        $window = $(windw);
    
    $window.scroll(function(e){
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'absolute',
                width: '96%',
                bottom:"0px"
            
            });
        } else {
            $this.css({
                position: 'fixed',
                width: '24%',
                 bottom:""
                
            });
        }
    });
};


function scrollDown(id) { 
            $('html, body').animate({ 
                scrollTop: $("#blog-item_"+id).offset().top +=400
            }, 300); 
        } 
         
         $(".side-ul").css("max-height",$( window ).height()-300);
      
      </script>
                  <?php include("layout/noti.php"); ?>  
   </body>
</html>