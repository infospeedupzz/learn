<?php include($_SERVER['DOCUMENT_ROOT'].'/layout/session.php');

if(!isset($_GET['n']) ){
    echo "<script>window.location.href='/'</script>";
    die();
    
}
$courseid=$functionClass->DE($_GET['n']);
$conArr=array("id"=>$courseid);    
$resultCourse=$functionClass->getRowsByWhere("course","id=:id",$conArr);
$conArr1=array("course_id"=>$courseid);    
$resultSubject=$functionClass->getRowsByWhere("subject","course_id=:course_id",$conArr1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $resultCourse[0]['name']; ?></title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="<?php echo $ROOT_URL; ?>/assets/images/fav.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/line-awesome.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/fancybox.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/tooltipster.bundle.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/jquery.filer.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/plyr.css">
    <link rel="stylesheet" href="<?php echo $ROOT_URL; ?>/css/style.css">
    <!-- end inject -->
         <style>
          .qloader-div1{
            display:none;
            position: absolute;
            background: #a3a3a457;
            width: 94%;
            text-align: center;
            height: 100%;
            padding-top: 20%;
        }  
        .qloader-div{
            display:none;
            position: absolute;
            background: #a3a3a457;
            width: 94%;
            text-align: center;
            height: 100%;
            padding-top: 20%;
        }
        .qloader{
            width:60px!important;
        }  
        .username{
            position: absolute;
    top: 68%;
    left: 39%;
    font-size: 2rem;
    opacity: 0.3;
    -ms-transform: rotate(20deg);
    transform: rotate(
26deg
);
 
        }
       
         .logo-img {
    width:175px!important;
  }
@media screen and (max-width: 575px) {
  .logo-img {
    width:100px!important;
  }
}
    </style>
</head>
<body>

<!-- start cssload-loader -->
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
<section class="header-menu-area course-dashboard-header">
    <div class="header-menu-fluid">
        <div class="header-menu-content course-dashboard-menu-content">
            <div class="container-fluid">
                <div class="main-menu-content d-flex align-items-center">
                    
                    <div class="logo-box" style='float: left;border-right:none;width:auto'>
                        <a href="javascript:void(0)" onclick='goBack()' title="back" class="btn">
                            <svg id="Layer"  enable-background="new 0 0 64 64" height="auto" viewBox="0 0 64 64" width="25" xmlns="http://www.w3.org/2000/svg"><path fill="#233d63" d="m54 30h-39.899l15.278-14.552c.8-.762.831-2.028.069-2.828-.761-.799-2.027-.831-2.828-.069l-17.448 16.62c-.755.756-1.172 1.76-1.172 2.829 0 1.068.417 2.073 1.207 2.862l17.414 16.586c.387.369.883.552 1.379.552.528 0 1.056-.208 1.449-.621.762-.8.731-2.065-.069-2.827l-15.342-14.552h39.962c1.104 0 2-.896 2-2s-.896-2-2-2z"/></svg>
                        </a>
                 
                    </div>
                    <div class="course-dashboard-title" style='float: right;'>
                          <a href="#"><?php echo $resultCourse[0]['name']; ?></a>
                    </div>
                    <div class="menu-wrapper">
                        <div class="logo-right-button">
                            <ul class="d-flex align-items-center">
                                <li><a href="#" class="theme-btn theme-btn-light" data-toggle="modal" data-target=".rating-modal-form"><i class="la la-star mr-1"></i>leave a rating</a></li>
                                <li><a href="#" class="theme-btn theme-btn-light" data-toggle="modal" data-target=".share-modal-form"><i class="la la-share mr-1"></i>share</a></li>
                               
                            </ul>
                        </div><!-- end logo-right-button -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-content -->
    </div><!-- end header-menu-fluid -->
</section><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->

<!--======================================
        START COURSE-DASHBOARD
======================================-->
<section class="course-dashboard">
    <div class="course-dashboard-wrap">
        <div class="course-dashboard-container d-flex">
            <div class="course-dashboard-column">
                <div class="lecture-viewer-container" style="padding:5px;">
                    <div class="lecture-video-item">
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/3a1OD9zVSfo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="lecture-viewer-text-wrap <?php if(isset($_GET['p'])){
    if(!empty($_GET['p'])){
    ?> active  <?php }} ?>">
                        <div class="lecture-viewer-text-content">
                             <div class='qloader-div'>
                            <img src='<?php echo $ROOT_URL; ?>/assets/images/loader.gif' class='qloader'>
                            </div>
                            <div class='username'>
                                <p><?php
                                if(!empty($userInfo[0]['fullname'])){
                                    echo $userInfo[0]['fullname']; 
                                }
                                ?></p>
                            </div>
                            <div class="lecture-viewer-text-body" id='forpdf'>
                                <!--<h2 class="widget-title font-size-35 pb-4">Download your Footage for your Quick Start</h2>-->
                                <!--<div class="lecture-viewer-content-detail">-->
                                <!--    <ul class="list-items pb-4">-->
                                <!--        <li>Hi</li>-->
                                <!--        <li>Welcome to Motion Graphics in After Effects. </li>-->
                                <!--        <li>In the next lectures you will start creating your first animation and animate imported footage.</li>-->
                                <!--        <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes,</li>-->
                                <!--        <li>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. </li>-->
                                <!--        <li>Occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. </li>-->
                                <!--        <li>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus,</li>-->
                                <!--        <li>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. </li>-->
                                <!--        <li><strong>Download your footage Now, Click on the Link Below.</strong></li>-->
                                <!--    </ul>-->
                                <!--    <div class="btn-box">-->
                                <!--        <h3 class="widget-title font-size-20 pb-3">Resources for this lecture</h3>-->
                                <!--        <a href="javascript:void(0)" class="theme-btn theme-btn-light"><i class="fa fa-file-zip-o mr-2"></i>Quick-start.zip</a>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div><!-- end lecture-viewer-container -->
                <div class="lecture-video-detail">
                    <div class="lecture-tab-body">
                        <div class="section-tab section-tab-2">
                            <ul class="nav nav-tabs" role="tablist">
                               
                               
                                <li role="presentation">
                                    <a href="#review-rate" role="tab" data-toggle="tab" aria-selected="false" class="active">
                                        Review & Ratings
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                        
                    </div>
                    <div class="lecture-video-detail-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active show fade" id="review-rate">
                                <div class="lecture-overview-wrap lecture-quest-wrap">
                                   
                                    <div class="question-overview-result-wrap">
                                        <div class="review-wrap">
                            <div class='row'>
                                <div class='col-md-12'>
                                             <h3 class="widget-title float-left">Student feedback</h3>
                        <a href="#" class="theme-btn theme-btn-light float-right" data-toggle="modal" data-target=".rating-modal-form"><i class="la la-star mr-1"></i>leave a rating</a>
                                </div> 
                            </div>                    
                                        <?php               
                                            $rate=0;
                                            $allRate=0;
                                            $resultAll=$functionClass->getRows("course_review");
                                            foreach($resultAll as $rowAll){
                                                $rate=$rate+$rowAll['rate'];
                                            }
                                            if(sizeof($resultAll)>0){
                                                $allRate=round(floatval($rate/sizeof($resultAll)),1);
                                            }
                                        ?>
                        <div class="review-content margin-top-40px margin-bottom-50px d-flex">
                            <div class="review-rating-summary">
                                <div class="review-rating-summary-inner d-flex align-items-end">
                                    <div class="stats-average__count">
                                        <span class="stats-average__count-count"><?php echo $allRate; ?></span>
                                    </div><!-- end stats-average__count -->
                                    <div class="stats-average__rating d-flex">
                                        <ul class="review-stars d-flex">
                                             <?php for( $r=1; $r<6;$r++ ){ 
                                                        if($allRate>=$r){
                                                    ?>
                                                    <li><span class="la la-star"></span></li>
                                                    <?php 
                                                        }else{
                                                            ?>
                                                            
                                                    <li><span class="la la-star-o"></span></li>
                                                            <?php 
                                                        }
                                                        } 
                                                    ?>
                                        </ul>
                                        <span class="star-rating-wrap">
                                            <span class="star__rating">(<?php echo sizeof($resultAll); ?>)</span>
                                        </span>
                                    </div><!-- end stats-average__rating -->
                                </div><!-- end review-rating-summary-inner -->
                                <div class="course-rating-text">
                                    <p class="course-rating-text__text">Course Rating</p>
                                </div><!-- end course-rating-text -->
                            </div><!-- end review-rating-summary -->
                            <div class="review-rating-widget">
                                <div class="review-rating-rate">
                                    <ul>
                                        <li class="review-rating-rate__items">
                                            
                                            <?php 
                                            
                                            $arr5=array("rate"=>5);
                                            $result5=$functionClass->countRows("course_review where rate=:rate",$arr5);
                                            $start5=round(floatval($result5/sizeof($resultAll))*100,1);
                                            #for 4
                                            $arr4=array("rate"=>4);
                                            $result4=$functionClass->countRows("course_review where rate=:rate",$arr4);
                                            $start4=round(floatval($result4/sizeof($resultAll))*100,1);  
                                            #for 3
                                            $arr3=array("rate"=>3);
                                            $result3=$functionClass->countRows("course_review where rate=:rate",$arr3);
                                            $start3=round(floatval($result3/sizeof($resultAll))*100.1); 
                                            #for 2
                                            $arr2=array("rate"=>2);
                                            $result2=$functionClass->countRows("course_review where rate=:rate",$arr2);
                                            $start2=round(floatval($result2/sizeof($resultAll))*100,1);
                                            #for 1
                                            $arr1=array("rate"=>1);
                                            $result1=$functionClass->countRows("course_review where rate=:rate",$arr1);
                                            $start1=round(floatval($result1/sizeof($resultAll))*100,1);
                                            ?>
                                            
                                            <div class="review-rating-inner__item">
                                                <div class="review-rating-rate__item-text">5 stars</div>
                                                <div class="review-rating-rate__item-fill">
                                                    <span class="review-rating-rate__item-fill__fill rating-fill-width1" style='width:<?php echo $start5; ?>%'></span>
                                                </div>
                                                <div class="review-rating-rate__item-percent-text"><?php echo $start5; ?> %</div>
                                            </div>
                                        </li>
                                        <li class="review-rating-rate__items">
                                            <div class="review-rating-inner__item">
                                                <div class="review-rating-rate__item-text">4 stars</div>
                                                <div class="review-rating-rate__item-fill">
                                                    <span class="review-rating-rate__item-fill__fill rating-fill-width2" style='width:<?php echo $start4; ?>%'></span>
                                                </div>
                                                <div class="review-rating-rate__item-percent-text"><?php echo $start4; ?> %</div>
                                            </div>
                                        </li>
                                        <li class="review-rating-rate__items">
                                            <div class="review-rating-inner__item">
                                                <div class="review-rating-rate__item-text">3 stars</div>
                                                <div class="review-rating-rate__item-fill">
                                                    <span class="review-rating-rate__item-fill__fill rating-fill-width3" style='width:<?php echo $start3; ?>%'></span>
                                                </div>
                                                <div class="review-rating-rate__item-percent-text"><?php echo $start3; ?> %</div>
                                            </div>
                                        </li>
                                        <li class="review-rating-rate__items">
                                            <div class="review-rating-inner__item">
                                                <div class="review-rating-rate__item-text">2 stars</div>
                                                <div class="review-rating-rate__item-fill">
                                                    <span class="review-rating-rate__item-fill__fill rating-fill-width4" style='width:<?php echo $start2; ?>%'></span>
                                                </div>
                                                <div class="review-rating-rate__item-percent-text"><?php echo $start2; ?> %</div>
                                            </div>
                                        </li>
                                        <li class="review-rating-rate__items">
                                            <div class="review-rating-inner__item">
                                                <div class="review-rating-rate__item-text">1 stars</div>
                                                <div class="review-rating-rate__item-fill">
                                                    <span class="review-rating-rate__item-fill__fill rating-fill-width5" style='width:<?php echo $start1; ?>%'></span>
                                                </div>
                                                <div class="review-rating-rate__item-percent-text"><?php echo $start1; ?> %</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- end review-rating-rate -->
                            </div><!-- end review-rating-widget -->
                        </div><!-- end review-content -->
                        <div class="section-block"></div>
                        <div class="comments-wrapper margin-top-50px">
                            <h3 class="widget-title"> Reviews</h3>
                            <ul class="comments-list padding-top-30px">
                                 <div class='qloader-div1'>
                            <img src='<?php echo $ROOT_URL; ?>/assets/images/loader.gif' class='qloader'>
                            </div>
                                <li id="comment_section">
                                    <!--review here -->
                                </li>
                            </ul>
                            <div class="see-more-review-btn margin-bottom-50px">
                                <div class="btn-box text-center">
                                    <button type="button" class="theme-btn theme-btn-light" onclick="setReview('<?php echo $_GET['n']; ?>')">load more reviews</button>
                                </div><!-- end btn-box -->
                            </div>
                          
                        </div><!-- end comments-wrapper -->
                    </div>
                                    </div>
                                </div>
                            </div><!-- end tab-pane -->
                            
                        </div>
                    </div><!-- end lecture-video-detail-body -->
                </div><!-- end lecture-video-detail -->
               
            </div><!-- end course-dashboard-column -->
            <div class="course-dashboard-sidebar-column">
                <button class="sidebar-open" type="button"><i class="la la-angle-left"></i> Course content</button>
                <div class="course-dashboard-sidebar-wrap">
                    <div class="course-dashboard-side-heading d-flex align-items-center justify-content-between">
                        <h3 class="widget-title font-size-20">Course content</h3>
                        <button class="sidebar-close" type="button"><i class="la la-times"></i></button>
                    </div><!-- end course-dashboard-side-heading -->
                    <div class="course-dashboard-side-content">
                        <div class="accordion course-item-list-accordion" id="accordionCourseMenu">
                              <?php $subjectCount=0;
                                            foreach($resultSubject as $rowSubject){ 
                                                //get modules data 
                                            $conArrM=array("subject_id"=>$rowSubject['id']);    
                                            $resultModule=$functionClass->getRowsByWhere("modules","subject_id=:subject_id",$conArrM);
                                     
                                            ?>
                            <div class="card">
                                <div class="card-header" id="collapseMenuOne_<?php echo $rowSubject['id']; ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link <?php if($subjectCount!=0){ echo "collapsed";} ?>" type="button" data-toggle="collapse" data-target="#collapseOne_<?php echo $rowSubject['id']; ?>" aria-expanded="<?php if($subjectCount!=0){ echo "false";}else{ echo "true";} ?>" aria-controls="collapseOne_<?php echo $rowSubject['id']; ?>">
                                            <span class="widget-title font-size-15 font-weight-semi-bold"><?php echo $rowSubject['name']; ?></span>
                                            
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne_<?php echo $rowSubject['id']; ?>" class="collapse <?php if($subjectCount==0){ echo "show";} ?>" aria-labelledby="collapseMenuOne" data-parent="#accordionCourseMenu">
                                    <div class="card-body">
                                        <div class="course-content-list">
                                            <ul class="course-list">
                                                <?php $mcount=0;
                                                foreach($resultModule as $rowModule){ ?>
                                                     <?php if(!empty($userInfo)){ ?>
                                                <li class="course-item-link active-resource <?php  if($mcount==0){echo "active";} ?>  ">
                                                    <div class="course-item-content-wrap">
                                                        <!--<div class="custom-checkbox">-->
                                                        <!--    <input type="checkbox" id="chb29">-->
                                                        <!--    <label for="chb29"></label>-->
                                                        <!--</div>-->
                                                       
                                                        <div class="course-item-content">
                                                            <h4 class="widget-title font-size-15 font-weight-medium"><?php echo $rowModule['name']; ?></h4>
                                                            <div class="courser-item-meta-wrap">
                                                                
                                                            <?php if($rowModule['videos']==1){  ?>
                                                               <a href="#"  data-toggle="modal" data-target=".rating-modal-form12"> <p  class="course-item-meta"><i class="la la-play-circle"></i>2min</p></a>
                                                            <?php } ?>
                                                                   <?php if($rowModule['pdfs']==1){  ?>
                                                                <a href='javascript:void(0)'  onclick='activeModule(<?php echo $rowModule['id'];?>, 1)' class="course-item-meta"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>English PDF</a>
                                                                <a href='javascript:void(0)'  onclick='activeModule(<?php echo $rowModule['id'];?>, 0)' class="course-item-meta"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Hindi PDF</a>
                                                                   <?php $mcount++;} ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php }else{ 
                                                    $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                    ?>
                                                    <li class='course-item-link'>
                                                        <a href="/login?from=<?php echo $actual_link; ?>">
                                                         <div class="course-item-content-wrap">
                                                        <!--<div class="custom-checkbox">-->
                                                        <!--    <input type="checkbox" id="chb29">-->
                                                        <!--    <label for="chb29"></label>-->
                                                        <!--</div>-->
                                                       
                                                        <div class="course-item-content">
                                                            <h4 class="widget-title font-size-15 font-weight-medium"><?php echo $rowModule['name']; ?></h4>
                                                            <div class="courser-item-meta-wrap">
                                                                
                                                            <?php if($rowModule['videos']==1){  ?>
                                                                <a href="#"  data-toggle="modal" data-target=".rating-modal-form12">  <p class="course-item-meta"><i class="la la-play-circle"></i>2min</p> </a>
                                                            <?php } ?>
                                                                   <?php if($rowModule['pdfs']==1){  ?>
                                                                <p class="course-item-meta"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>PDF</p>
                                                                   <?php $mcount++;} ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    </li>
                                                    <?php
                                                      
                                                } ?>
                                                <?php $subjectCount++; } ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><!-- end course-dashboard-sidebar-column -->
        </div><!-- end course-dashboard-container -->
    </div><!-- end course-dashboard-wrap -->
    
</section><!-- end course-dashboard -->
<!--======================================
        END COURSE-DASHBOARD
======================================-->

<!-- end modal-shared -->
<div class="modal-form">
    <div class="modal fade rating-modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
             <form method="post" id='add-review'>
    
            <div class="modal-content">
        
                <div class="modal-top mb-0">
                    <button type="button" class="close close-arrow" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close mb-0"></span>
                    </button>
                    <h4 class="modal-title widget-title font-size-20">How would you rate this course?</h4>
                </div>
                <div class="course-rating-wrap p-4 text-center">
                                     <span style="color: red;" id="msg-lr"> </span>
                    <h3 class="widget-title padding-bottom-30px font-size-18">Select Rating</h3>
                    <div class="rating-shared rating-shared-2">
                        <fieldset>
                            <input type='hidden' name='cid' id='cid' value="<?php echo $_GET['n'];?>">
                            
                            <input type="radio" id="star5" name="rating" value="5"><label for="star5" data-toggle="tooltip" data-placement="top" title="Amazing, above expectations!"></label>
                            <input type="radio" id="star4" name="rating" value="4"><label for="star4" data-toggle="tooltip" data-placement="top" title="Good, what i expected"></label>
                            <input type="radio" id="star3" name="rating" value="3"><label for="star3" data-toggle="tooltip" data-placement="top" title="Average, could be better"></label>
                            <input type="radio" id="star2" name="rating" value="2"><label for="star2" data-toggle="tooltip" data-placement="top" title="Poor, pretty disappointed"></label>
                            <input type="radio" id="star1" name="rating" value="1"><label for="star1" data-toggle="tooltip" data-placement="top" title="Awful, not what i expected at all"></label>
                        </fieldset>
                    </div>
                </div><!-- end course-rating-wrap -->
                <div class="contact-form-action margin-top-35px">
                          
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="label-text">Message<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <textarea class="message-control form-control" name="review" placeholder="Write message"></textarea>
                                                        <i class="la la-pencil input-icon"></i>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <div class="custom-checkbox">-->
                                            <!--            <input type="checkbox" id="chb1">-->
                                            <!--            <label for="chb1">Save my name, and email in this browser for the next time I comment.</label>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div><!-- end col-lg-12 -->
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <?php  if(!empty($userInfo)){?>
                                                    <button class="theme-btn" id='saveReview' type="submit">submit review</button>
                                                    <?php }else{
                                                        ?>
                                                                      <a class="theme-btn" href="../login">submit review</a>
                                                        <?php
                                                    } ?>
                                                </div>
                                            </div><!-- end col-md-12 -->
                                        </div><!-- end row -->
                                    
                                </div><!-- end contact-form-action -->
            </div><!-- end modal-content -->
            </form>
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div>

<div class="modal-form cv">
    <div class="modal fade rating-modal-form12" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            
    
            <div class="modal-content">
        
                <div class="modal-top mb-0">
                    <button type="button" class="close close-arrow" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close mb-0"></span>
                    </button>
                 
                        
                            
                            
                </div>
                <div class="course-rating-wrap p-4 text-center">
                          <div class="row">
                        <div class="col-md-12">
                            <div class="sec-title3 mb-30 lazy">
                                <h4 class="sub-title green-color" style="color: #0eb582;">Download Learnizy App</h4>
                                
                                <div class="new-desc" style="color:black">Video is available for this module. You can watch videos on the Learnizy android app. Click below Download Now button to download the app.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mobile-img">
                                <div class="apps-image pr-20 sm-pr-5">
                                    <a href="https://play.google.com/store/apps/details?id=com.learnoset.learnish&amp;hl=en_IN&amp;gl=US"><img style="width:140px;" class="lazy" src="<?php echo $ROOT_URL; ?>/assets/images/download/play.png" alt="download Learnizy app now"></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>   
                </div><!-- end course-rating-wrap -->
            </div><!-- end modal-content -->
           
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div>
<!-- end modal-form -->


<div class="modal-form copy-to-clipboard-modal">
    <div class="modal fade share-modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-top mb-0">
                    <button type="button" class="close close-arrow" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close mb-0"></span>
                    </button>
                    <h4 class="modal-title widget-title font-size-20">Share this course</h4>
                </div>
                <div class="copy-to-clipboard-wrap p-4 text-center">
                    <div class="copy-to-clipboard mb-3">
                        <div class="contact-form-action d-flex align-items-center">
                            <span class="success-message">Copied!</span>
                            <input type="text" class="form-control copy-input" value="https://learnizy.in/">
                            <div class="copy-tooltip">
                                <button class="theme-btn theme-btn-light copy-text">Copy</button>
                            </div>
                        </div>
                    </div><!-- end copy-to-clipboard -->
                    <ul class="social-profile">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->



<!-- template js files -->
<script src="<?php echo $ROOT_URL; ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/popper.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/bootstrap-select.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/magnific-popup.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/isotope.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/waypoint.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/jquery.counterup.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/fancybox.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/wow.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/plyr.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/smooth-scrolling.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/jquery.filer.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/date-time-picker.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/emojionearea.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/copy-text-script.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/tooltipster.bundle.min.js"></script>
<script src="<?php echo $ROOT_URL; ?>/js/main.js"></script>
<script>
    
    //show course
    function activeModule(id, language){
       
        var hg=parseInt($( document ).height())-100;
 
                $(".qloader-div").fadeIn();
         $.ajax({
                 url: "<?php echo $ROOT_URL; ?>/lesson-detail/get_pdf",
                 type: "post",
                dataType: "json",
                 data:  {'id':id},
                 success: function (data) {
                     
                     if(language == 0){
                        if(data[0].webhindi){
                            var ifr='<iframe class="scribd_iframe_embed" title="Nabard Computer Part 1 Compressed"  src="'+data[0].webhindi+'" scrolling="no" width="100%" height="'+hg +'" allowfullscreen="0" frameborder="0"></iframe>';
                            $("#forpdf").html(ifr);
                            $(".icon-ic_fullscreen_window").css("display","none");
                     }else{
                        $("#forpdf").html("<h2 style='position: absolute;top: 40%;left: 40%;'>Not Data Found</h2>")
                     } 
                     }
                     else{
                         if(data[0].webenglish){
                            var ifr='<iframe class="scribd_iframe_embed" title="Nabard Computer Part 1 Compressed"  src="'+data[0].webenglish+'" scrolling="no" width="100%" height="'+hg +'" allowfullscreen="0" frameborder="0"></iframe>';
                            $("#forpdf").html(ifr);
                            $(".icon-ic_fullscreen_window").css("display","none");
                     }else{
                        $("#forpdf").html("<h2 style='position: absolute;top: 40%;left: 40%;'>Not Data Found</h2>")
                     }
                     }
                     
                    $(".qloader-div").fadeOut();
             
                    if($( window ).width()<800){
                    $(".sidebar-close").click();
                    
                    }
                 }
             }); 
     
    }
    //show review
    var limit=10;
    function setReview(id){
   
                $(".qloader-div1").fadeIn();
         $.ajax({
                 url: "<?php echo $ROOT_URL; ?>/lesson-detail/get_reviews",
                 type: "post",
                 data:  {'n':id,'limit':limit},
                 success: function (data) {
                     
                     $("#comment_section").html(data);
                    $(".qloader-div1").fadeOut();
                    limit=limit+10;
                 }
             }); 
     
    }
    setReview('<?php echo $_GET['n']; ?>');
    
        
    //end show review
//add review 
    $("form#add-review").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#saveReview").attr("disabled", true);
$("#saveReview").html("<i class='fa fa-circle-o-notch fa-spin'></i> Updating..");
   $.ajax({
        url:'<?php echo $ROOT_URL; ?>/create_course_review',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {

                if(data.type=="error"){
                      $("#msg-lr").html(data.message);
                     $("#msg-lr").css("color","red");
                  $("#msg-lr").fadeIn();
                  $('#saveReview').attr("disabled", false);
                        $('#saveReview').val("submit review");
                     
                }else{
                    
                       $("#msg-lr").html(data.message);
                        $("#msg-lr").css("color","green");
                          $("#msg-lr").fadeIn();
                              setReview('<?php echo $_GET['n']; ?>');
                              $(".rating-modal-form").modal('hide');
                        
                }
                  $("#saveReview").attr("disabled", false);
                  $("#saveReview").html('submit review');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 
<?php if(isset($_GET['p'])){
    if(!empty($_GET['p'])){
    ?>
    
    activeModule(<?php echo $_GET['p']; ?>,1);
    <?php 
    }
}?>
function goBack() {
  window.history.back();
}
//setInterval(function(){ $(".toolbar_drop").remove(); console.log("ds") }, 2000);
</script>

</body>


</html>