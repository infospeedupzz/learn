<?php include('layout/session.php');?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>learnizy - Complete Preparation for Govt. exams with Courses, Test Series & Daily Practice Quizzes  </title>
        <meta name="description" content="learnizy is the best platform to prepare for Govt. exams with ease. We provide best pdf material for ibps so or ibps afo.">
        <meta name="keywords" content="afosyllabus,ibpsafoagriculture,ibpsafosyllabus,ibpsafomains,ibpsafo2021,afo_preparation,afo_<?php echo date("Y"); ?>agriculture officer study material pdf,online IBPS matieral ,IBPS,IBPS AFO,Agriculture Field Officer,ibps po video course online,earn online ibps exam free,learn online ibps exam ibps,best online coaching for bank clerk, Video lectures for IBPS PO, IBPS PO 2021 Exam Preparation and Online Coaching, online ibps po coaching videos, IBPS PO Online Video Course,IBPS online pdfs,learn online ibps exam 2021,learn online ibps exam ibps rrb ">
      
        <link rel="canonical" href="https://learnizy.in/">
      <?php include("layout/head.php"); ?>
       <link rel="stylesheet" type="text/css" href="assets/css/image-modal.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-190277255-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-190277255-1');
</script>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "621508f0-915d-4aa7-8575-c3f19bdf9f8f",
    });
  });
</script>
</head>
    <body class="defult-home">
        
        <!--Preloader area start here-->
       
        <!--Preloader area End here-->  


        <!--Full width header Start-->
        <?php  include("layout/header.php");?>
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
            <!-- Banner Section Start -->
            <div id="rs-banner" class="rs-banner style10">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 pl-60 order-last">
                            <div class="img-part">
                               <img class="up-down-new lazy" src="assets/images/banner/home12/1.png" alt="ibps afo mock test" loading="lazy">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-0">
                            <div class="banner-content">
                               <div class="sl-sub-title wow bounceInLeft" data-wow-delay="300ms" data-wow-duration="2000ms">Start Preparing with Learnizy</div>
                                <h1 class="sl-title wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="3000ms">Get unlimited access to Notes,Mock Tests & Daily Quizzes.
                                </h1>
                                <div class="banner-btn wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="2000ms">
                                    <?php if(!empty($userInfo)){ 
                                        ?>
                                            <a class="readon green-banner" href="online-test-series/afo-prelims">Get Started</a>
                                        <?php 
                                    }else{?> 
                                       
                                            <a data-toggle="modal" data-target="#loginModal" class="readon green-banner" href="#">Get Started</a>
                                    
                                    <?php } ?>
                                 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="banner-intro-box">
                    <div class="shape-img">
                        <img class="up-down-new lazy" src="assets/images/banner/home12/dotted-shape.png" alt="" loading="lazy">
                    </div>
                    <div class="intro-img">
                        <img class="spine2 lazy" src="assets/images/banner/home12/intro-box.png" alt="" loading="lazy">
                    </div>
                </div>
            </div>
            <!-- Banner Section End -->
      
            <!-- Partner Start -->
            <div class="rs-partner style2 pt-10 md-pt-20">
                <div class="container">
                   <div class="sec-title4 text-center mb-30">
                        <h2 class="title purple-color">All Courses</h2>
                    </div> 
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                        
                        <?php 
               
                   foreach ($resultC as $rowC ) {
                        if(strpos($rowC['publish'],"Course")){ 
                    $colorArr=explode(",",$rowC['back_color']);
                    
                     ?>
                        <div class="partner-item course-grid" style="align-items: center;text-align: center;padding-top:10px;background-image: linear-gradient(<?php echo $colorArr[0]; ?>, <?php echo $colorArr[1]; ?>);">
                            <a href="course/<?php echo $rowC['alias']; ?>">
                                <div style='width:100%; text-align:center'>
                                      <div style='background: #fbfdff26; padding: 5px;border-radius: 50%;width: 80px;height: 77px;display:inline-block;'>
                                    <img class="lazy" style='width:45px; margin-top:6px;' src="Learnish/<?php echo $rowC['img']; ?>" alt="<?php echo $rowC['name']; ?>">
                                </div>
                                </div>
                              
                              
                                <p style="text-align: center;color: white;margin-top:10px;font-weigth:700;    width: 100%;    white-space: nowrap;"><?php echo $rowC['name']; ?></p>
                            </a>

                        </div>
                       <?php } } ?> 
                    </div>
                </div>
            </div>
            <!-- Partner End -->

       

          <!-- Choose Section Start -->
            <div class="why-choose-us style3">
                <div class="container">
                   <div class="row align-items-center lazy">
                       <div class="col-lg-6 js-tilt md-mb-40">
                           <div class="img-part">
                                <img class="lazy" src="assets/images/choose/home12/1.png" alt="online learn IBPS AFO ">
                            
                           </div>
                       </div>
                       <div class="col-lg-6 pl-60 md-pl-15">
                            <div class="sec-title3 mb-30">
                                <h2 class=" title new-title margin-0 pb-15">Why Learnizy ?</h2>

                            </div>
                            <div class="services-part mb-20">
                                <div class="services-icon">
                                    <img style='width:105px;' src="assets/images/1.png" alt="Lower Cost for learn IBPS AFO">
                                </div>
                                <div class="services-text">
                                    <h2 class="title"> Lower Learning Cost</h2>
                                    <p class="services-txt"> We provide all the study Material at an affordable price so that everyone can afford learning.</p>
                                </div>
                            </div> 
                            <div class="services-part mb-20">
                                <div class="services-icon">
                                    <img style='width:90px;' src="assets/images/2.png" alt="">
                                </div>
                                <div class="services-text">
                                    <h2 class="title"> Learn With Experts</h2>
                                    <p class="services-txt">  Discuss doubts, or any other exam related queries with Expert Teachers.</p>
                                </div>
                            </div> 
                            <div class="services-part mb-20">
                                <div class="services-icon">
                                    <img style='width:80px;' src="assets/images/3.png" alt="Get practice set, test series, quizzes for exam preparation">
                                </div>
                                <div class="services-text">
                                    <h2 class="title"> Online Mock Tests & Free Quizzes</h2>
                                    <p class="services-txt">  Get practice set, test series, quizzes for exam preparation.</p>
                                </div>
                            </div> 
                            <div class="services-part mb-20">
                                <div class="services-icon">
                                    <img  style='width:70px;' src="assets/images/4.png" alt="IBPS AFO Previous Year Papers">
                                </div>
                                <div class="services-text">
                                    <h2 class="title">Previous Year Papers</h2>
                                    <p class="services-txt"> Analyze Previous Year Paper for better preparation.</p>
                                </div>
                            </div> 
                           
                   </div> 
                </div>
            </div>
            <!-- Choose Section End -->

            <!-- Counter Section End -->
             <!--  <div class="rs-counter home12-style pt-80">
                <div class="container">
                    <div class="row couter-area bg8">
                        <div class="col-lg-3 col-md-6 md-mb-30">
                            <div class="counter-item text-center">
                                <h2 class="rs-count pr-0">50</h2>
                                <span class="prefix">k</span>
                                <h4 class="title mb-0">Enrolled Learners</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 md-mb-30">
                            <div class="counter-item text-center">
                                <h2 class="number rs-count kplus">70</h2>
                                <h4 class="title mb-0">Enrolled Learners</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 sm-mb-30">
                            <div class="counter-item text-center">
                                <h2 class="rs-count plus">120</h2>
                                <h4 class="title mb-0">Online Instructors</h4>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="counter-item text-center">
                                <h2 class="rs-count percent">99</h2>
                                <h4 class="title mb-0">Satisfaction Rate</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           Counter Section Start -->
        
            <!-- Download Section Start -->
            <div class="rs-download-app pt-20 pb-20 md-pt-20 md-pb-20">
                <div class="container">
                   <div class="row align-items-center">
                       <div class="col-lg-6 md-mb-40">
                           <div class="img-part">
                                <img src="assets/images/download/m-app.png" alt="">
                            
                           </div>
                       </div>
                       <div class="col-lg-6 pl-60 md-pl-15">
                            <div class="sec-title3 mb-30 lazy">
                                <div class="sub-title green-color">Download Learnizy App</div>
                                <h2 class=" title new-title">Learn Any Time - Any Where ; Mobile/Desktop</h2>
                                <div class="new-desc">More then 2 Thousand Aspirants Use Learnizy for their Exam Preparation.<br> Download Today to Start Preparing with Learnizy. </div>
                            </div>
                            <div class="mobile-img">
                                <div class="apps-image pr-20 sm-pr-5">
                                    <a  href="https://play.google.com/store/apps/details?id=com.learnoset.learnish&hl=en_IN&gl=US"><img class="lazy" src="assets/images/download/play.png" alt="download Learnizy app now"></a>
                                </div>
                                
                            </div>
                       </div> 
                   </div> 
                </div>
            </div>
            <!-- Download Section End -->

             <!-- Events Section Start -->
            <div class="rs-event home12style">
                <div class="container">
                    <div class="sec-title4 text-center mb-50">
                        <div class="sub-title">LATEST UPDATE</div>
                        <h2 class="title purple-color">
                            Current Affairs</h2>
                    </div> 
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="7000" data-smart-speed="2000" data-dots="true" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3" data-md-device-nav="false" data-md-device-dots="true">
                      <?php   
                      $resultE=$functionClass->getRows("current order by id DESC limit 6");
                      foreach ($resultE as $rowE ) {
                       ?>
                    <div class="event-item home12-style">
                        <div class="event-short">
                           <div class="featured-img" style='margin-top:-40px;'>
                               <span class='current-m' >
                                   <?php echo date("M",strtotime($rowE['date'])); ?>
                               </span>
                                <span class='current-d' >
                                <?php echo date("d",strtotime($rowE['date'])); ?>
                               </span>
                               <img class="lazy" style='width:100%;height:200px;' src="assets/images/current.jpg" alt="<?php echo $rowE['title']; ?>">
                              
                           </div>
                           <div class="content-part">
                                
                               <h4  class="title"><a href="#"><?php echo $rowE['title']; ?></a></h4>
                              
                           </div> 
                        </div>
                    </div>
                    <?php } ?>
                  </div>
                </div> 
            </div>
            <!-- Events Section End -->

            

    
        </div> 
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
        <!-- image modal-->
      <div id="myModal" class="modalimg" style='padding-top:14%'>
      <span class="close-modal">&times;</span>
   <a href=""> <img style='height:350px;' class="modalimg-content" src="<?php echo $ROOT_URL; ?>/assets/images/about/tab2.jpg"></a>
      <div id="caption"></div>
    </div>
        <!-- image modal-->
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
        <script src="assets/js/lazyload.js"></script>
     <?php include("layout/noti.php"); ?>  
   
       <script type="text/javascript">
    <?php if($chkimageModel==1) { ?>

            setTimeout(function(){ 
              $("#myModal").fadeIn(2000);
            
             }, 3000);
            $(".close-modal").click(function(){
                $("#myModal").fadeOut(2000);
            });
<?php 	} ?>

       $(function() {
            $('.lazy').lazyload();
          });



       </script>
       <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5fafac89c52f660e89736d39/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();


</script>
<!--End of Tawk.to Script-->
       
    </body>

</html>