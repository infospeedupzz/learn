<?php include('layout/session.php');
 $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
 $usercourse_purchaged=array();
     //get user purched course  id  if login 
    if(!empty($_SESSION['userId'])){
         $conArrusercourse = array(
            "user_id" => $_SESSION['userId'],
            "date" => date("Y-m-d"),
            "course_id"=>$resultCourse[0]['id']
        );
        $resultCP = $functionClass->getRowsByWhere("course_purchages", "user_id=:user_id and expiry_date>=:date and course_id=:course_id", $conArrusercourse);
        $paid=0;
        if(sizeof($resultCP)>0){
            $paid=1;
        }
      
    }
    
    //end of  get user course  id  if login 
    $conArr1=array("course_id"=>$resultCourse[0]['id']);    
$resultSubject=$functionClass->getRowsByWhere("subject","course_id=:course_id",$conArr1);
                    $colorArr=explode(",",$resultCourse[0]['back_color']);
?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Course Details - <?php echo $resultCourse[0]['name'] ?> </title>
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
        .start-btn{
            position: relative;
            top: -14px;
            right: 17px;
        }
        .modal1{
         top:25%;   
        }
        .list-items li .fa {
    color: #51be78;
    margin-right: 6px;
}
      </style>
</head>
    <body class="defult-home">


        <!--Full width header Start-->
        <?php  include($ROOT."/layout/header.php");?>
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
   
                <section class="breadcrumb-area breadcrumb-detail-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content breadcrumb-detail-content">
                    <div class="section-heading">
                        <span class="badge-label">Course</span>
                        <h2 class="section__title mt-1"><?php echo $resultCourse[0]['name']; ?></h2>
                        <h4 class="widget-title mt-2">Complete & Updated Pdf Course for Complete Preparation of the Exam</h4>
                    </div>
                    <ul class="breadcrumb__list mt-2">
                        
                        <li >
                            <i style='color:#F68A03' class="fa fa-star"></i>
                            <i style='color:#F68A03' class="fa fa-star"></i>
                            <i style='color:#F68A03' class="fa fa-star"></i>
                            <i style='color:#F68A03' class="fa fa-star"></i>
                            <i style='color:#F68A03' class="fa fa-star-half-o"></i>
                            4.5 (User ratings)
                        </li>
                        <li>457 Students enrolled</li>
                        <li><i class="la la-globe"></i> Available in English & Hindi</li>
                        <li>Last updated 02 March 2021</li>
                    </ul>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

       <!-- Popular Course Section Start -->
            <section class="course-detail margin-bottom-110px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 questions">
                <div class="course-detail-content-wrap margin-top-10px">
                    <div class="curriculum-wrap margin-bottom-60px">
                        <div class="curriculum-header d-flex align-items-center justify-content-between" style='margin-top:50px;margin-bottom:20px'>
                            <div class="curriculum-header-left">
                                <h3 class="widget-title" style='font-weight:800'><?php echo $resultCourse[0]['name']; ?>-Curriculum</h3>
                            </div>
                            
                        </div><!-- end curriculum-header -->
                        <div class="curriculum-content">
                            <div class="accordion accordion-shared" id="accordionExample">
                                  <?php $subjectCount=0;
                                            foreach($resultSubject as $rowSubject){ 
                                                //get modules data 
                                            $conArrM=array("subject_id"=>$rowSubject['id']);    
                                            $resultModule=$functionClass->getRowsByWhere("modules","subject_id=:subject_id order by order_by ASC",$conArrM);
                                     
                                            ?>
                                <div class="card">
                                    <div class="card-header" id="headingOne_<?php echo $rowSubject['id']; ?>">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link d-flex align-items-center justify-content-between <?php if($subjectCount!=0){ echo "collapsed";} ?>" type="button" data-toggle="collapse" data-target="#collapseOne_<?php echo $rowSubject['id']; ?>" aria-expanded="<?php if($subjectCount!=0){ echo "false";}else{ echo "true";} ?>" aria-controls="collapseOne_<?php echo $rowSubject['id']; ?>">
                                                <i class="fa fa-angle-up"></i>
                                                <i class="fa fa-angle-down"></i>
                                                <?php echo $rowSubject['name']; ?>
                                                <span><?php echo sizeof($resultModule); ?> PDF</span>
                                            </button>
                                        </h2>
                                    </div><!-- end card-header -->
                                    <div id="collapseOne_<?php echo $rowSubject['id']; ?>" class="collapse <?php if($subjectCount==0){ echo "show";} ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-items">
                                                    <?php $mcount=0;
                                                foreach($resultModule as $rowModule){ ?>
                                                <?php 
                                                    if(!empty($userInfo)){
                                                if($rowModule['status']=='Free'){
                                             
                                                ?>
                                                <li>
                                                    <a href="lesson-detail/run-lesson/<?php echo str_replace(" ","-",$resultCourse[0]['name']); ?>/<?php echo  $functionClass->EN($resultCourse[0]['id']); ?>/<?php echo $rowModule['id'];?>" class="primary-color-2 d-flex align-items-center justify-content-between" >
                                                        <span><i class="fa fa-file mr-2"></i> <?php echo $rowModule['name'];  ?> <span class="badge-label">Preview</span></span>
                                                        
                                                    </a>
                                                </li>
                                                <?php }else{ 
                                                if(!empty($userInfo)){
                                                    if($paid==1){ ?>
                                                          <li>
                                                            <a href="lesson-detail/run-lesson/<?php echo str_replace(" ","-",$resultCourse[0]['name']); ?>/<?php echo  $functionClass->EN($resultCourse[0]['id']); ?>/<?php echo $rowModule['id'];?>" class="primary-color-2 d-flex align-items-center justify-content-between" >
                                                                <span><i class="fa fa-file mr-2"></i> <?php echo $rowModule['name'];  ?> <span class="badge-label">Preview</span></span>
                                                                
                                                            </a>
                                                        </li>
                                                    <?php }else{ ?>
                                                       <li>
                                                    <a href="javascript:void(0)" class="d-flex align-items-center justify-content-between">
                                                        <span><i class="fa fa-file mr-2"></i><?php echo $rowModule['name'];  ?> <span class="badge-label badge-secondary">Locked</span></span>
                                                       
                                                    </a>
                                                </li>
                                                        
                                                <?php    } 
                                                }else{ ?>
                                                   <li>
                                                    <a href="javascript:void(0)" class="d-flex align-items-center justify-content-between">
                                                        <span><i class="fa fa-file mr-2"></i><?php echo $rowModule['name'];  ?> <span class="badge-label badge-secondary">Locked</span></span>
                                                     
                                                    </a>
                                                </li>
                                                    
                                            <?php    }
                                                ?>
                                             
                                                
                                                <?php } }else{
                                                    
                                                       if($rowModule['status']=='Free'){
                                                ?>
                                                <li>
                                                    <a href="/login?from=<?php echo $actual_link; ?>" class="primary-color-2 d-flex align-items-center justify-content-between" >
                                                        <span><i class="fa fa-file mr-2"></i> <?php echo $rowModule['name'];  ?> <span class="badge-label">Preview</span></span>
                                                        
                                                    </a>
                                                </li>
                                                <?php }else{?> 
                                                <li>
                                                    <a href="/login?from=<?php echo $actual_link; ?>" class="d-flex align-items-center justify-content-between">
                                                        <span><i class="fa fa-file mr-2"></i><?php echo $rowModule['name'];?> <span class="badge-label badge-secondary">Locked</span></span>
                                                     
                                                    </a>
                                                </li>
                                                <?php  }
                                                ?>
                                                <?php
                                                } } ?>
                                               
                                                
                                            </ul>
                                        </div><!-- end card-body -->
                                    </div><!-- end collapse -->
                                </div><!-- end card -->
                                <?php $subjectCount++; } ?>
                            </div><!-- end accordion -->
                        </div><!-- end curriculum-content -->
                    </div><!-- end curriculum-wrap -->
                    <div class="section-block"></div>
                </div><!-- end course-detail-content-wrap -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar-component fixed " id='f' style='position: fixed;width: 24%;'>
                    <div class="sidebar">
                        <div class="sidebar-widget sidebar-preview">
                           <div class="sidebar-preview-titles">
                               <h3 class="widget-title">Preview this course</h3>
                               <span class="section-divider"></span>
                           </div>
                            <div class="preview-video-and-details">
                                <div class="preview-course-video" style='background-image: linear-gradient(<?php echo $colorArr[0]; ?>, <?php echo $colorArr[1]; ?>);"'>
                                   
                                    <a href="javascript:void(0)" data-toggle="modal" data-target=".preview-modal-form">
                              <img class='lazy' style='width:100px; margin-left:34%' src="<?php echo MAINPATH.$resultCourse[0]['img']; ?>" alt="course-<?php echo $resultCourse[0]['name']; ?>">
                                     
                                        <div class="play-button">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                   <style type="text/css">
                                                       .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                       .st1{fill:#FFFFFF;}
                                                   </style>
                                                <g>
                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"></circle><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"></path>
                                                </g>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                                <div class="preview-course-content" style='padding-top:1px;'>
                                    <p class="preview-course__price d-flex align-items-center">
                                        <!--<span class="price-current lazy">₹<?php echo $resultCourse[0]['price']; ?></span>-->
                                        <!--<span class="price-before">$104.99</span>-->
                                        <!--<span class="price-discount">24% off</span>-->
                                    </p>
                                    
                                    <div class="buy-course-btn mb-3 text-center">
                                        <a href="competitive-exams/IBPS-AFO-Exam-Online-Study-Material" class="theme-btn w-100 theme-btn-light">View Exam Detsils </a>
                                        <?php /* if(!empty($userInfo)){ 
                                            if($paid==1){ ?>
                                                  <a href="lesson-detail/run-lesson/<?php echo str_replace(" ","-",$resultCourse[0]['name']); ?>/<?php echo  $functionClass->EN($resultCourse[0]['id']); ?>" class="theme-btn w-100 theme-btn-light">go to course</a>
                                     
                                            <?php }else{?>
                                                <!--<a href="#" data-toggle="modal" data-target="#myModal"  class="theme-btn w-100 mb-3">buy this course</a>-->
                                            <a href="lesson-detail/run-lesson/<?php echo str_replace(" ","-",$resultCourse[0]['name']); ?>/<?php echo  $functionClass->EN($resultCourse[0]['id']); ?>" class="theme-btn w-100 theme-btn-light">go to course</a>
                                     
                                         <?php    }
                                            
                                        }else{ ?>
                                        <!--<a href="#" data-toggle="modal" data-target="#loginModal"  class="theme-btn w-100 mb-3">buy this course</a>-->
                                        <a href="lesson-detail/run-lesson/<?php echo str_replace(" ","-",$resultCourse[0]['name']); ?>/<?php echo  $functionClass->EN($resultCourse[0]['id']); ?>" class="theme-btn w-100 theme-btn-light">go to course</a>
                                        <?php } */?>
                                    </div>
                                    <div class="preview-course-incentives">
                                        
                                        <h3 class="widget-title font-size-18" style='margin-top: 30px;margin-bottom:8px'>This course includes</h3>
                                       
                                        <ul class="list-items pb-3">
                                            <?php
                                            $fArr=explode(",",substr($resultCourse[0]['publish'],1,-1));
                                          
                                            for($x=0;$x<sizeof($fArr);$x++){
                                                if($fArr[$x]=="Mock"){
                                                        $icon='<i class="fa fa-check-circle" aria-hidden="true"></i>';
                                                }else{
                                                    $icon='<i class="fa fa-check-circle" aria-hidden="true"></i>';
                                                }
                                            ?>
                                            <li><?php echo $icon." ".$fArr[$x]; ?></li>
                                            <?php } ?>
                                        </ul>
                                        <div class="section-block"></div>
                                    </div><!-- end preview-course-incentives -->
                                </div><!-- end preview-course-content -->
                            </div><!-- end preview-video-and-details -->
                        </div><!-- end sidebar-widget -->
                    </div><!-- end sidebar -->
                </div><!-- end sidebar-component -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
            <!-- Popular Course Section End -->

        
        <!-- Main content End -->

        <!-- Footer Start -->
        <?php include($ROOT."/layout/footer.php"); ?>
        <!-- Footer End -->


        <!-- start scrollUp  -->
        <div id="scrollUp" class="green-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- info modal -->
        <!-- Button trigger modal -->


<!-- info Modal -->
  <?php if(!empty($_SESSION['userId'])){  ?>
<div class="modal fade-scale modal1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 style='float:left;' class="modal-title" id="myModalLabel"><?php echo $resultCourse[0]['name']; ?></h4>
        <button style='float:right;' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <p style='font-size:22px;'>To unlock this course click on <b>Buy now</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href='pay?type=course_purchages&id=<?php echo $functionClass->EN($resultCourse[0]['id']); ?>' type="button" class="btn btn-primary">Buy Now</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
        <!-- end of info modal-->
        
<div class="modal-form">
    <div class="modal fade preview-modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-top">
                    <h5 class="modal-title">Course Preview: <?php echo $resultCourse[0]['name'] ?></h5>
                    <button type="button" class="close close-arrow" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="fa fa-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                  <iframe width="100%" height="315" src="https://www.youtube.com/embed/3a1OD9zVSfo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div><!-- end modal -->
</div>
        <!-- modernizr js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="<?php echo $ROOT_URL; ?>/js/popper.min.js"></script>
        <script src="<?php echo $ROOT_URL; ?>/js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/jquery.nav.js"></script>
        <!-- owl.carousel js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/owl.carousel.min.js"></script>
        <!-- Slick js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/slick.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/wow.min.js"></script>
        <!-- Skill bar js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/skill.bars.jquery.js"></script>
        <script src="<?php echo $ROOT_URL; ?>/assets/js/jquery.counterup.min.js"></script>        
         <!-- counter top js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/waypoints.min.js"></script>
        <!-- video js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/jquery.mb.YTPlayer.min.js"></script>
        <!-- magnific popup js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/jquery.magnific-popup.min.js"></script>
        <!-- tilt js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/tilt.jquery.min.js"></script>      
        <!-- plugins js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/plugins.js"></script>
                   <!-- contact form js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/loginform.js"></script>
        <!-- main js -->
        <script src="<?php echo $ROOT_URL; ?>/assets/js/main.js"></script>
             <script src="<?php echo $ROOT_URL; ?>/assets/js/lazyload.js"></script>
        
     <script>
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
         $(".btn-lg").click(function(){
             $("#myModal").fadeIn(500);
         });
            $(function() {
            $('.lazy').lazyload();
          });
        $('#f').followTo($('.questions:visible').height()-350);
        


     </script>
            <?php include($ROOT."/layout/noti.php"); ?>  
    </body>

</html>