<?php include('layout/session.php');
 $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(isset($_GET['alias'])){
        $alias=strtolower($_GET['alias']);
         $conArrMockP= array(
            "alias" => $alias
        );
        $resultExam = $functionClass->getRowsByWhere("exam", "alias=:alias", $conArrMockP);
    
        
    }else{
        echo"<script>window.location.href='/'</script>";
        die();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- meta tag -->
      <meta charset="utf-8">
      <title>Exam-<?php echo $resultExam[0]['title']; ?></title>
      <meta name="description" content="<?php echo $resultExam[0]['title']; ?> All books and study material for <?php echo $resultExam[0]['name']; ?> required to cover the syllabus of all subjects for <?php echo $resultExam[0]['name']." ".date('Y'); ?> and  Agriculture Exam Ibps so all Detials and lestes update about <?php echo $resultExam[0]['name']." ".date('Y'); ?>,mock test for <?php echo $resultExam[0]['name']." ".date('Y'); ?> ">
      <meta name="keywords" content="<?php echo $resultExam[0]['title']; ?>,Exam Ibps Afo Detials,<?php echo $resultExam[0]['name']." ".date('Y'); ?> Overview,<?php echo $resultExam[0]['name']." ".date('Y'); ?>   Exam Dates,<?php echo $resultExam[0]['name']." ".date('Y'); ?> Eligibility Criteria,<?php echo $resultExam[0]['name']." ".date('Y'); ?> Exam Pattern,<?php echo $resultExam[0]['name']." ".date('Y'); ?> Syllabus ,<?php echo $resultExam[0]['name']." ".date('Y'); ?> Cut-Off,<?php echo $resultExam[0]['name']." ".date('Y'); ?>  Previous Papers,ibps so prelims study material pdf,ibps so prelims preparation books, mock test for <?php echo $resultExam[0]['name']." ".date('Y'); ?> ">
      <!-- responsive tag -->
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   
       <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $ROOT_URL; ?>/assets/images/fav.png">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_URL; ?>/lesson-detail/css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_URL; ?>/assets/css/font-awesome.min.css">
     
       
      
        <!-- Main Menu css -->
        <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/assets/css/rsmenu-main.css">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_URL; ?>/assets/css/rs-spacing.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_URL; ?>/style.css"> <!-- This stylesheet dynamically changed from style.less -->
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $ROOT_URL; ?>/assets/css/responsive.css">
        <base href="<?php echo $ROOT_URL; ?>" >

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- for menu-->
        <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/lesson-detail/css/style.css">
        <!--end of menu css-->
        <style type="text/css">
            @media screen and (max-width: 600px) {
                  .menu-category{
                    margin-top: -35px!important;
                  }
                  .logo-right-button{
                    display: none!important;
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
      <style>
          tr:first-child { background-color:#233d63!important; border-color:#233d63!important;color:white;" }
      </style>
   </head>
   <body class="defult-home"  style='    color: #000000;'>
      <!--Preloader area start here-->
      <?php  include("layout/preloader.php");?>
      <!--Preloader area End here-->
      <!--Full width header Start-->
      <?php  include("layout/header.php");?>
      <!--Full width header End-->
      <!-- Main content Start -->
      <div class="main-content">
         <!--================================
            START BREADCRUMB AREA
            ================================= -->
         <section class="breadcrumb-area my-courses-bread">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="breadcrumb-content my-courses-bread-content">
                        <ul>
                           <li style="    display: inline-block; ">
                              <a style='color:white' class="active" href="/">Home</a>
                           </li>
                           <li style="    display: inline-block;">
                              &gt; <a style='color:white' class="active" href="#">Exam</a>
                           </li>
                        </ul>
                        <div class="section-heading">
                           <h2 class="section__title"><?php echo $resultExam[0]['title']; ?></h2>
                        </div>
                     </div>
                     <!-- end breadcrumb-content -->
                     <div class="my-courses-tab">
                        <div class="section-tab section-tab-2">
                           <ul class="nav nav-tabs" role="tablist" id="review">
                              <li role="presentation">
                                 <a href="#afo-exam-overview" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                 Overview
                                 </a>
                              </li>
                              <li role="presentation">
                                 <a href="#afo-exam-date" role="tab" data-toggle="tab"  aria-selected="False">
                                 Exam Dates
                                 </a>
                              </li>
                              <li role="presentation">
                                 <a href="#afo-exam-eligibility" role="tab" data-toggle="tab"  aria-selected="False">
                                 Eligibility Criteria
                                 </a>
                              </li>
                              <li role="presentation">
                                 <a href="#afo-exam-pattern" role="tab" data-toggle="tab"  aria-selected="False">
                                 Exam Pattern
                                 </a>
                              </li>
                              <li role="presentation">
                                 <a href="#afo-exam-syllabus" role="tab" data-toggle="tab"  aria-selected="False">
                                 Syllabus
                                 </a>
                              </li>
                              <li role="presentation">
                                 <a href="#afo-exam-cut-off" role="tab" data-toggle="tab"  aria-selected="False">
                                 Cut-Off
                                 </a>
                              </li>
                              <!--<li role="presentation">-->
                              <!--   <a href="#previous-papers" role="tab" data-toggle="tab" aria-selected="false">-->
                              <!--   Previous Papers-->
                              <!--   </a>-->
                              <!--</li>-->
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!-- end col-lg-12 -->
               </div>
               <!-- end row -->
            </div>
            <!-- end container -->
         </section>
         <!-- end breadcrumb-area -->
         <!-- ================================
            END BREADCRUMB AREA
            ================================= -->
         <!-- ================================
            START MY COURSES
            ================================= -->
         <section class="my-courses-area padding-top-30px gray-bg padding-bottom-90px">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="my-course-content-wrap">
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane fade active show" id="afo-exam-overview">
                              <div class="my-course-content-body">
                                 <!-- Cource Overview -->
                                 <div class="course-overview">
                                    <div class="inner-box">
                                     <?php echo $resultExam[0]['overview']; ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end tab-pane -->
                           <div role="tabpanel" class="tab-pane fade  " id="afo-exam-date">
                              <div class="my-course-content-body">
                                 <!-- Cource Overview -->
                                 <div class="course-overview">
                                    <div class="inner-box">
                                         <?php echo $resultExam[0]['exam_date']; ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                       
                        <!-- end tab-pane -->
                        <div role="tabpanel" class="tab-pane fade  " id="afo-exam-eligibility">
                           <div class="my-course-content-body">
                              <!-- Cource Overview -->
                              <div class="course-overview">
                                 <div class="inner-box">
                                      <?php echo $resultExam[0]['eligibility_criteria']; ?>
                                 
                                </div>
                              </div>
                           </div>
                        </div>
                        <!-- end tab-pane -->
                        <div role="tabpanel" class="tab-pane fade  " id="afo-exam-pattern">
                           <div class="my-course-content-body">
                              <!-- Cource Overview -->
                              <div class="course-overview">
                                 <div class="inner-box"> <?php echo $resultExam[0]['exam_pattern']; ?></div>
                              </div>
                           </div>
                        </div>
                        <!-- end tab-pane -->
                        <div role="tabpanel" class="tab-pane fade  " id="afo-exam-syllabus">
                           <div class="my-course-content-body">
                              <!-- Cource Overview -->
                              <div class="course-overview"> <?php echo $resultExam[0]['syllabus']; ?></div>
                           </div>
                        </div>
                        <!-- end tab-pane -->
                        <div role="tabpanel" class="tab-pane fade  " id="afo-exam-cut-off">
                           <div class="my-course-content-body">
                              <!-- Cource Overview -->
                              <div class="course-overview">
                                 <div class="inner-box">
                                      <?php echo $resultExam[0]['cut_off']; ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end tab-pane -->
                        <?php /*<div role="tabpanel" class="tab-pane fade  " id="previous-papers">
                           <div class="my-course-content-body">
                              <!-- Cource Overview -->
                              <div id="accordion" class="accordion-box">
                                 <div class="card accordion block">
                                    <div class="card-header" id="headingOne">
                                       <h5 class="mb-0">
                                          <button class="btn btn-link acc-btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Papers</button>
                                       </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                       <div class="card-body acc-content current">
                                          <?php    $conArrP= array(
                                             "course_id" => $resultExam[0]['course_id']
                                             );
                                             $resultP = $functionClass->getRowsByWhere("previous_papers", "course_id=:course_id", $conArrP);
                                             foreach($resultP as $rowP){
                                             $chk=1;
                                             ?>
                                          <div class="content">
                                             <div class="clearfix">
                                                <div class="pull-left">
                                                   <a class=" play-icon" href="javascript:void(0)"><i class="fa fa-file-pdf-o"></i> <?php echo $rowP['name']."(".$rowP['year'].")"; ?></a>
                                                </div>
                                                <div class="pull-right">
                                                   <?php if(!empty($_SESSION['userId'])){ ?> 
                                                   <a  class="readon1 green-btn readon12" style='padding: 9px 61px;background: #0eb582;color: white;border-radius: 5px;' data-fancybox data-type="iframe" data-src="previous-pdf?q=<?php echo str_replace(" ","-", $rowP['name']); ?>&n=<?php echo $functionClass->EN($rowP['id']); ?>#toolbar=0" href="javascript:;" >View  </a>
                                                   <?php }else{?>
                                                   <a class="readon1 green-btn readon12" style='padding: 9px 61px;background: #0eb582;color: white;border-radius: 5px;' href="#" data-toggle="modal" data-target="#loginModal">View  </a>
                                                   <?php }?>
                                                </div>
                                             </div>
                                          </div>
                                          <?php } ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div> */?>
                        <!-- end tab-pane -->
                     </div>
                     </div>
                  </div>
               </div>
               <!-- end col-lg-12 -->
            </div>
            <!-- end row -->

      <!-- end container -->
      </section><!-- end my-courses-area -->
      <!--================================
         START MY COURSES
         ================================= -->
      </div> 
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
      <!-- Bootstrap v4.4.1 js -->
      <!-- Bootstrap v4.4.1 js -->
      <script src="lesson-detail/js/popper.min.js"></script>
      <script src="lesson-detail/js/bootstrap.min.js"></script>
      <!-- magnific popup js -->
      <script src="assets/js/jquery.magnific-popup.min.js"></script>
      <!-- Menu js -->
      <script src="assets/js/rsmenu-main.js"></script> 
      <!-- wow js -->
      <script src="assets/js/wow.min.js"></script>     
      <!-- plugins js -->
      <script src="assets/js/plugins.js"></script>
      <!-- contact form js -->
      <script src="assets/js/loginform.js"></script>
      <!-- main js -->
      <script src="assets/js/main.js"></script>
      <?php include("layout/noti.php"); ?>  
   </body>
</html>