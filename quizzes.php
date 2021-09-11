<?php include('layout/session.php'); 
if(isset($_GET['n'])){
    $id= $functionClass->DE($_GET['n']);
}else{
    $id=1;
}
?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Quizzes  </title>
        <meta name="description" content="">
      <?php include("layout/head.php"); ?>
      <style>
          .rs-popular-courses.main-home .courses-item .courses-grid {
            background: none!important;
        }
        .rs-popular-courses.style1 .courses-item .img-part {
             margin-bottom: 9px!important;
        }
        .rs-popular-courses.style1 .courses-item{
            padding:10px!important;
            margin-bottom:5px;
        }
        .rs-popular-courses.style1 .courses-item .content-part .title{
            font-size:17px;
        }
        
        .qloader-div{
            display:none;
            position: absolute;
            background: #a3a3a457;
            width: 94%;
            text-align: center;
            height: 100%;
            padding-top: 100px;
        }
        .qloader{
            width:60px!important;
        }  
        .mock-packages{
         height:auto!important;
         
        }
      
      </style>
                <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-190277255-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-190277255-1');
</script>
</head>
    <body class="defult-home">
        
        <!--Preloader area start here-->
        <?php  include("layout/preloader.php");?>
        <!--Preloader area End here-->  


        <!--Full width header Start-->
        <?php  include("layout/header.php");?>
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
                
 <div class="breadcrumb-area my-courses-bread loaded " style='padding-bottom:10px; padding-top:10px;'>
                   <div class="container" style='max-width:95%'>
                        <ul>
                        <li style="    display: inline-block; ">
                            <a style='color:white' class="active" href="/">Home</a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="#">Quizzes </a>
                        </li>
                       
                    </ul>
                  
                    </div>
                </div><!-- end breadcrumb-content -->
             <!-- Popular Course Section Start -->
            <div class="rs-popular-courses style1 course-view-style orange-color rs-inner-blog white-bg pt-20 pb-10 md-pt-70 md-pb-70" style='    background-color: #F1F8F5;'>
                <div class="container" style="max-width: 95%">
                      
                      <h3 style="margin-bottom: 10px;"> Practice Quizzes</h3>
                    <div class="row">
                        <div class="col-lg-3 ">
                  <div class="sidebar">
                     <div class="sidebar-widget">
                        <h3 class="widget-title">Filter by Course</h3>
                        <span class="section-divider"></span>
                        <ul class="filter-by-rating filter-by-rating-2">
                                                <?php
                                        $courseCount=0;
                                        $course_id=0;
                                        foreach ($resultC as $rowC ) { 
                                           if(strpos($rowC['publish'],"Quiz")){   
                                                $courseCount++;
                                                if($courseCount==1){
                                                    $course_id=$rowC['id'];
                                                    $cname=$rowC['name'];
                                                }
                                        ?>                   
                                          <li onclick="getMockpackageByMock(<?php echo $rowC['id']; ?>,'<?php echo $rowC['name']; ?>')">
                              <label class="review-label">
                              <span class="ml-4">
                              <span class="mr-1 primary-color"><?php echo $rowC['name']; ?></span>
                              
                              </span>
                             
                              <input type="radio" <?php if($id==$rowC['id']) {?> checked="checked" <?php } ?>  name="review-radio">
                              <span class="review-mark"></span>
                              </label>
                           </li>
                           <?php  } } ?>
                                                                              
                                                                 
                        
                        </ul>
                      
                     </div>
                     <!-- end sidebar-widget -->
                  </div>
               </div>
                        
                        <div class="col-lg-9 pr-50 md-pr-15 mb-50" style='height: auto!important;'>            
                        <div class="course-search-part">
                                <div class="course-view-part">
                                    <div class="view-icons"> 
                                    
                                        <a href="#" class="view-list"><i class="fa fa-list-ul"></i></a>
                                    </div>
                                    <div class="view-text showing-num"></div>
                                </div>
                                <div class="type-form">
                                    <form method="post" action="https://keenitsolutions.com/products/html/educavo/mailer.php">
                                        <!-- Form Group -->
                                        <div class="form-group mb-0">
                                            <div class="custom-select-box">
                                                <input type='hidden' name='qid' id='dsafsadid' value="<?php echo $course_id;  ?>">
                                                <input type='hidden' name='qiddsaf' id='dsafsadidsdfsd' value="<?php echo $cname;  ?>">
                                           
                                              <select id="sortBy" onchange=getMockpackage(0)>
                                                
                                                    <option selected value="DESC">Newest</option>
                                                    <option value="ASC">Old</option>
                                                </select>
                                            </div>   
                                        </div>
                                    </form>
                                </div>
                            </div>               
                       
                             
            <!-- Quiz Section Start -->
       
                   <input type="hidden" id="sdafsad_dksjhjk" value="1">
                            <div class='qloader-div'>
                            <img src='assets/images/loader.gif' class='qloader'>
                            </div>
                            
                              
            <div id="rs-services" class="rs-services home12-style">
                <div class="container">
                   
                    <div class="row mock-packages">
                     <!--mock packages here -->
                     
                    </div>
                    </div>
                    </div>
               <div class="pagination-area orange-color text-center mt-30 md-mt-0">
                                <ul class="pagination-part">
                                   
                                </ul>
                            </div>
            <!-- Quiz Section End-->

                            </div>
                        
                   
                    </div>
                </div>
            </div>
            <!-- Popular Course Section End -->

        
        <!-- Main content End -->

        <!-- Footer Start -->
        <?php include("layout/footer.php"); ?>
        <!-- Footer End -->

</div>
        <!-- start scrollUp  -->
        <div id="scrollUp" class="green-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->


        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->
        
        <!-- modernizr js -->
        <script src="assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="assets/js/jquery.min.js"></script>
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
        <!-- tilt js -->
        <script src="assets/js/tilt.jquery.min.js"></script>      
        <!-- plugins js -->
        <script src="assets/js/plugins.js"></script>
             <!-- contact form js -->
        <script src="assets/js/loginform.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>
       <script>
           var MAINPATH="<?php echo MAINPATH; ?>";
            function getMockpackage(start){
                var course_id=$("#dsafsadid").val();
                var cname=$("#dsafsadidsdfsd").val();
                var sortBy=$("#sortBy").val();
                if(sortBy){
                    sortBy="DESC";
                }
                $(".qloader-div").fadeIn();
              $('.mock-packages').html("");
              $.ajax({
                 url: "get_quiz_by_course",
                 type: "post",
                dataType: "json",
                 data:  {'course_id':course_id,'orderby':sortBy,'start':start,'length':6},
                 success: function (data) {
                    
                    var page="";
                    var active=""
                    var innerArray = data.aaData;
                     var total=data.TotalRecords;
                    for(var i=0; i<Math.ceil(total/6);i++){
                        if((i*5)==start){
                            active="active";
                        }else{
                            active="";
                        }
                         page=page+'<li onclick=getMockpackage('+(i*5)+') class="'+active+'"><a href="javascript:void(0)" >'+(i+1)+'</a></li></li>';
                         
                    }
                    if(total>0){
                        page=page+'<a onclick=getMockpackage('+(parseInt(start)+5)+') href="javascript:void(0)"  > Next <i class="fa fa-long-arrow-right"></i></a>';
                    }
                    $(".pagination-part").html(page);
                    var displayData="";
                    if(innerArray.length>0){
                    for(var j=0;j<innerArray.length;j++){
                                            displayData=displayData+'<div class="col-lg-4 md-mb-30 mb-20"><div class="services-item">   <div class="services-image">  <div class="services-icons">';
                                           displayData=displayData+'<img src="'+MAINPATH+innerArray[j].img+'" alt="">  </div>';
                                           displayData=displayData+'<div class="services-text">  <div class="services-title">';
                                            displayData=displayData+'<h4 class="title">'+innerArray[j].name+'</h4></div>';
                                            displayData=displayData+'<p class="text">'+cname+' </p>';
                                            displayData=displayData+'<div style="border-top: 1px solid #f4f0f0;display: inline-block;width: 100%;">';
                                            displayData=displayData+'<span style="float:left">Total Questions</span><span style="float:right">'+innerArray[j].questions+'</span></div><div style="display: inline-block;width: 100%;">';
                                            displayData=displayData+  '<span style="float:left">Language</span> <span style="float:right">English </span></div></div>';
                                             displayData=displayData+innerArray[j].link1;
                                            displayData=displayData+'</div>';
                                            displayData=displayData+'</div>';
                                            displayData=displayData+'</div>';
                        
                    }
                    }else{
                        displayData="<h4>No Quiz Available</h4>";
                    }
                    $('.mock-packages').html(displayData);
                  
                  var showing="Showing "+start+"-"+(parseInt(start)+innerArray.length)+" of "+total+" results";
                    if(innerArray.length>0){
                        $('.showing-num').text(showing);
                    }
                      $(".qloader-div").fadeOut();
                 }
             }); 
                
            }
            function getMockpackageByMock(id,name){
                $("#dsafsadid").val(id);
                $("#dsafsadidsdfsd").val(name);
                getMockpackage(0);
            }
            var start=$("#sdafsad_dksjhjk").val();
            getMockpackage(0);
               
                $(function () {
        document.addEventListener("pagerendered", function (e) {
            $('#print').hide();
            $('#viewBookmark').hide();
            $('#openFile').hide();
        });
    });
            
            
            
                                     

        </script>
  
            <?php include("layout/noti.php"); ?>  
    </body>

</html>