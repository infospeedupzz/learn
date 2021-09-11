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
        <title>Previous Paper  </title>
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
        
        
      
      </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />
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
                
   <div class="breadcrumb-area my-courses-bread loaded " style='padding-bottom:20px;'>
                   <div class="container" style='max-width:95%'>
                        <ul>
                        <li style="    display: inline-block; ">
                            <a style='color:white' class="active" href="/">Home</a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="#">Previous Paper </a>
                        </li> 
                     
                    </ul>
                    <div class="section-heading ">
                        <h2 class="section__title text-white">Previous Paper</h2>
                    </div>
                    </div>
                </div><!-- end breadcrumb-content -->
             <!-- Popular Course Section Start -->
            <div class="rs-popular-courses style1 course-view-style gray-bg orange-color rs-inner-blog white-bg pt-20  md-pt-20 md-pb-20 mb-20">
                <div class="container" style='max-width:95%'>
                     
                 
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
                                               if(strpos($rowC['publish'],"Paper")){  
                                                $courseCount++;
                                                if($courseCount==1){
                                                    $course_id=$rowC['id'];
                                                }
                                        ?>                   
                                          <li onclick="getMockpackage(<?php echo $rowC['id']; ?>)">
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
                        
                        <div class="col-lg-9 pr-50 md-pr-15 mb-50">                            
                       
                             
            <!-- Mock Section Start -->
       
                   
                    <div class="row mock-packages" style='background:white'>
                     <!--mock packages here -->
                    </div>
            
            <!-- Mock Section End

                            </div>
                    <div class="pagination-area orange-color text-center mt-30 md-mt-0">
                                <ul class="pagination-part">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">Next <i class="fa fa-long-arrow-right"></i></a></li>
                                </ul>
                            </div>-->
                   
                    </div>
                </div>
            </div>
            </div>
            <!-- Popular Course Section End -->

        
        <!-- Main content End -->

        <!-- Footer Start -->
        <?php include("layout/footer.php"); ?>
        <!-- Footer End -->


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
        <script src="assets/js/bootstrap.min.js"></script>
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
         <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
        <script>
            function getMockpackage(course_id){
                              
              $.ajax({
                 url: "get-previous-paper-by-course",
                 type: "post",
                 //dataType: "json",
                 data:  {'course_id':course_id},
                 success: function (data) {
                  $('.mock-packages').html(data);
                  $('.mockli').removeClass('mock-li-active');
                  $('#mockli_'+course_id).addClass('mock-li-active');
                 }
             }); 
                
            }
            getMockpackage(<?php echo $id; ?>);
               
                $(function () {
        document.addEventListener("pagerendered", function (e) {
            $('#print').hide();
            $('#viewBookmark').hide();
            $('#openFile').hide();
        });
    });
            

        </script>
  
       
    </body>

</html>