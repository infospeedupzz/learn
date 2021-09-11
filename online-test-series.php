<?php include('layout/session.php'); 

if(isset($_GET['alias'])){
    $alias=strtolower($_GET['alias']);
     $conArrMockP= array(
        "alias" => $alias
    );
    $resultCourse = $functionClass->getRowsByWhere("course", "alias=:alias", $conArrMockP);

    
}else{
    echo"<script>window.location.href='/'</script>";
    die();
}
if(!empty($resultCourse)){
    $id= $resultCourse[0]['id'];
}else{
    $id=2;
}
$cname= $resultCourse[0]['name']; 
$alias1= $resultCourse[0]['alias']; 

?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>online test series | <?php echo $cname; ?>  </title>
        <meta name="description" content="">
         <?php include($ROOT."/layout/head.php"); ?>
      <style>
          .rs-popular-courses.main-home .courses-item .courses-grid {
            background: none!important;
        }
        .rs-popular-courses.style1 .courses-item .img-part {
             margin-bottom: 9px!important;
        }
        .rs-popular-courses.style1 .courses-item{
            padding:10px!important;
        }
        .fe >li{
            font-size: 13px;
    font-weight: 600;
        }
        .mview{
          display: none;
      }
        @media screen and (max-width: 600px) {
    .deskview {
         display: none;
      }
      .cmview{
        display: none;
      }
      .mview{
        display: block;
      }
    }
    .modal{
        z-index:999999!important;
    }
    
      </style>
          <link rel="stylesheet" href="lesson-detail/css/bootstrap-select.min.css">
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
        <?php  include($ROOT."/layout/preloader.php");?>
        <!--Preloader area End here-->  


        <!--Full width header Start-->
        <?php  include($ROOT."/layout/header.php");?>
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
              <div class="breadcrumb-area my-courses-bread loaded " style='padding-bottom:10px; padding-top:10px;'>
                   <div class="container" style='max-width:92%'>
                        <ul>
                        <li style="    display: inline-block; ">
                            <a style='color:white' class="active" href="/">Home</a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="#">Online Test Series </a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="online-test-series/<?php echo $resultCourse[0]['alias']; ?>" id='clink'> <?php echo $resultCourse[0]['name']; ?> </a>
                        </li>
                       
                    </ul>
                  
                    </div>
                </div><!-- end breadcrumb-content -->
         <section class="course-area padding-top-20px padding-bottom-10px gray-bg">
   <div class="course-wrapper">
      <div class="container" style='max-width:92%'>
       
                    
         <div class="row">
            <div class="col-lg-12">
               <div class="filter-bar d-flex justify-content-between align-items-center">
                  <ul class="filter-bar-tab nav nav-tabs align-items-center" id="myTab" role="tablist">
                   
                     <li class="nav-item font-size-15">Mock Test Series</li>
                  </ul>
                  <div class="sort-ordering deskview">
                     <div class="dropdown bootstrap-select sort-ordering-select dropup ">
                        <select id='shortBy' class="sort-ordering-select" tabindex="-98" onchange="shortBy()">
                           <option value="ASC" style="font-size: 13px;">Sort By</option>
                           <option value="status_ASC" style="font-size: 13px;">Free </option>
                           <option value="status_DESC" style="font-size: 13px;">Paid </option>
                           <option value="DESC" style="font-size: 13px;">Newest </option>
                           <option value="ASC" style="font-size: 13px;">Oldest </option>
                        </select>
                      

                     </div>
                    
                  </div>
                  <div class="sort-ordering mview">
                     <div class="dropdown bootstrap-select sort-ordering-select dropup ">
                        <select id='course_idm'  class="sort-ordering-select" tabindex="-98" onchange="getMockpackagem()">
                            <?php
                                        foreach ($resultC as $rowC ) { 
                                            if(strpos($rowC['publish'],"Mock")){    
                                        ?>
                           <option  onclick="getMockpackage(<?php echo $rowC['id']; ?>,<?php echo $rowC['alias']; ?>)" <?php if($id==$rowC['id']) {?> selected <?php } ?> value="<?php echo $rowC['id']; ?>"><?php echo $rowC['name']; ?></option>
                         <?php  }
                       } ?>
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
         <div class="course-content-wrapper mt-4">
            <div class="row">
                <div class="col-lg-3 cmview">
                  <div class="sidebar">
                     <div class="sidebar-widget">
                        <h3 class="widget-title">Filter by Course</h3>
                        <span class="section-divider"></span>
                        <ul class="filter-by-rating filter-by-rating-2">
                           <?php
                                        $courseCount=0;
                                        $course_id=0;
                                        foreach ($resultC as $rowC ) { 
                                            if(strpos($rowC['publish'],"Mock")){
                                                $courseCount++;
                                                if($courseCount==1){
                                                    $course_id=$rowC['id'];
                                                }
                                        ?>
                                      
                                          <li  onclick="getMockpackage(<?php echo $rowC['id']; ?>,'<?php echo $rowC['alias']; ?>')">
                              <label class="review-label">
                              <span class="ml-4">
                              <span class="mr-1 primary-color"><?php echo $rowC['name']; ?></span>
                              
                              </span>
                             
                              <input type="radio" <?php if($id==$rowC['id']) {?> checked="checked" <?php } ?> name="review-radio">
                              <span class="review-mark"></span>
                              </label>
                           </li>
                                        <?php } } ?>
                         
                        
                        </ul>
                        <input type="hidden" id="course_id" value="<?php echo $id; ?>">
                        <input type="hidden" id="cname" value="<?php echo $alias1; ?>">
                     </div>
                     <!-- end sidebar-widget -->
                  </div>
               </div>
                
               <!-- end col-lg-4 -->
               <div class="col-lg-1" style='max-width: 5.333333%;'></div>
               <div class="col-lg-8">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade active show" id="grid-view" aria-labelledby="grid-view-tab">
                        <div class="row mock-packages">
                          <!--mock data here-->
                           <!-- end col-lg-6 -->
                        </div>
                        <!-- end course-block -->
                     </div>
                     <!-- end tab-pane -->
              
                  </div>
                  <!-- end tab-content -->
               </div>
               <!-- end col-lg-8 -->
              
            </div>
            <!-- end row -->
            <?php /*
            <div class="row">
               <div class="col-lg-12">
                  <div class="page-navigation-wrap text-center mt-5">
                     <div class="page-navigation-inner d-inline-block">
                        <div class="page-navigation mx-auto">
                           <a href="#" class="page-go page-prev">
                           <i class="fa fa-arrow-left"></i>
                           </a>
                           <ul class="page-navigation-nav">
                              <li><a href="#" class="page-go-link">1</a></li>
                              <li class="active"><a href="#" class="page-go-link">2</a></li>
                              <li><a href="#" class="page-go-link">3</a></li>
                              <li><a href="#" class="page-go-link">4</a></li>
                              <li><a href="#" class="page-go-link">5</a></li>
                           </ul>
                           <a href="#" class="page-go page-next">
                           <i class="fa fa-arrow-right"></i>
                           </a>
                        </div>
                     </div>
                  </div>
                  <!-- end page-navigation-wrap -->
               </div>
               <!-- end col-lg-12 -->
            </div> */ ?>
            <!-- end row -->
         </div>
         <!-- end card-content-wrapper -->
      </div>
      <!-- end container -->
   </div>
   <!-- end course-wrapper -->
</section>


        
        <!-- Main content End -->

        <!-- Footer Start -->
        <?php include("layout/footer.php"); ?>
        <!-- Footer End -->


        <!-- start scrollUp  -->
        <div id="scrollUp" class="green-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->


       
             
<!-- info Modal -->
  <?php if(!empty($_SESSION['userId'])){  ?>
<div class="modal fade-scale modal1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 style='float:left;' class="modal-title" id="myModalLabel"><?php echo $rowP['title']; ?></h4>
        <button style='float:right;' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <p style='font-size:22px;'>To unlock all the mock test in this test series click on <b>Buy now</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a id='paylink' href='#' type="button" class="btn btn-primary">Buy Now</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>      
        <!-- modernizr js -->
        <script src="../../assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="../../assets/js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
            <script src="../../lesson-detail/js/popper.min.js"></script>
        <script src="../../lesson-detail/js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="../../assets/js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="../../assets/js/jquery.nav.js"></script>
        <!-- owl.carousel js -->
        <script src="../../assets/js/owl.carousel.min.js"></script>
        <!-- Slick js -->
        <script src="../../assets/js/slick.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="../../assets/js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="../../assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="../../assets/js/wow.min.js"></script>
        <!-- Skill bar js -->
        <script src="../../assets/js/skill.bars.jquery.js"></script>
        <script src="../../assets/js/jquery.counterup.min.js"></script>        
         <!-- counter top js -->
        <script src="../../assets/js/waypoints.min.js"></script>
        <!-- video js -->
        <script src="../../assets/js/jquery.mb.YTPlayer.min.js"></script>
        <!-- magnific popup js -->
        <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
        <!-- tilt js -->
        <script src="../../assets/js/tilt.jquery.min.js"></script>      
        <!-- plugins js -->
        <script src="../../assets/js/plugins.js"></script>
                <!-- contact form js -->
        <script src="../../assets/js/loginform.js"></script>
        <!-- main js -->
        <script src="../../assets/js/main.js"></script>
        <script src="../../assets/js/lazyload.js"></script>
        <script src="../../lesson-detail/js/bootstrap-select.min.js"></script>
        <script>
        $('.sort-ordering-select').selectpicker({liveSearch:true,liveSearchPlaceholder:'Search',liveSearchStyle:'contains',size:5});
            function getMockpackage(course_id,name){
                  var shortBy=$("#shortBy").val(); 
              $.ajax({
                 url: "get-mock-package-by-course",
                 type: "post",
                 //dataType: "json",
                 data:  {'course_id':course_id,'shortBy':shortBy},
                 success: function (data) {
                   $("#course_id").val(course_id); 
                   $("#cname").val(name); 
                  $('.mock-packages').html(data);
                  url="online-test-series/"+name;
                  history.replaceState(null, "online test series |"+name, [url]);
                  document.title="online test series |"+name;
                  $("#clink").html(name);
                  $("#clink").attr("href", url);
                 }
             }); 
                
            }
            getMockpackage(<?php echo $id; ?>,'<?php echo $alias1; ?>');
            function shortBy(){
              getMockpackage($("#course_id").val(),$("#cname").val());
            }
            $(function() {
            $('.lazy').lazyload();
          });
          function getMockpackagem(){
            getMockpackage($("#course_idm").val());
          }
          function setModel(id,title){
              $("#myModalLabel").html(title);
              $("#paylink").attr("href", "pay/mock_package/"+id)
          }
        </script>
         <?php include($ROOT."/layout/noti.php"); ?>  
         
    </body>

</html>