<?php include('layout/session.php'); ?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Notifications  </title>
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
        }
        .start-btn{
            position: relative;
            top: -14px;
            right: 17px;
        }
        .modal1{
         top:25%;   
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
        <div class="main-content">
                   <div class="breadcrumb-area my-courses-bread loaded " style='padding-bottom:20px;'>
                   <div class="container">
                        <ul>
                        <li style="    display: inline-block; ">
                            <a style='color:white' class="active" href="/">Home</a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="#"> Notifications</a>
                        </li> 
                     
                       
                    </ul>
                    <div class="section-heading ">
                        <h2 class="section__title text-white">All Notifications</h2>
                    </div>
                    </div>
                </div><!-- end breadcrumb-content -->
      

       <!-- Popular Course Section Start -->
            <div class="rs-popular-courses gray-bg style1 course-view-style orange-color rs-inner-blog white-bg pt-20 pb-100 md-pt-70 md-pb-70 list-view">
                <div class="container">
                  
                      
                    <div class="row">
                        <div class="col-lg-4 col-md-12 order-last">
                            <div class="widget-area">
                                 
                                <div class="widget-archives mb-50">
                                    <h3 class="widget-title">Offers</h3>
                                  <img src="">
                                </div>
                                 <div class="widget-archives mb-50">
                                    <h3 class="widget-title">Offers</h3>
                                   <img src="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pr-50 md-pr-15">                            
                           
                            <div class="course-part clearfix">
                                <?php 
                                 $resultN=$functionClass->getRows("notifications");
                                foreach($resultN as $rowN){ ?>
                                <div class="courses-item ">
                                  
                                    <div class="content-part" style='width:100%'>
                                       
                                       
                                        <div class="bottom-part">
                                             <h3 class="title" style='margin:0px;'><a href="#"><?php echo $rowN['title']; ?></a></h3>
                                             <p><?php echo $rowN['msg']; ?></p>
                                            <div class="info-meta">
                                                <ul>
                                                    <li style='font-size: 12px;color: #878b8f;' class="user"><i style='color: #878b8f;' class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("M,d Y H:i:s a",strtotime($rowN['date']." ".$rowN['time'])); ?> </li>
                                                    
                                                </ul>
                                            </div>
                                          
                                           
                                        </div>
                                      
                                    </div>
                                      
                                </div>
                                <?php } ?>
                            </div>
                          
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


        <!-- info modal -->
        <!-- Button trigger modal -->



        <!-- end of info modal-->
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
         $(".btn-lg").click(function(){
             $("#myModal").fadeIn(500);
         });
     </script>
            <?php include("layout/noti.php"); ?>  
    </body>

</html>