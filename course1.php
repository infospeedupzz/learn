<?php include('layout/session.php'); 
if(!isset($_GET['n'])){
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
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Course -<?php echo $resultCourse[0]['name']; ?> </title>
        <meta name="description" content="">
            <?php include("layout/head.php"); ?>
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
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-img">
                    <img src="assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
                </div>
                <div class="breadcrumbs-text white-color">
                    <h1 class="page-title"><?php echo $resultCourse[0]['name']; ?></h1>
                    <ul>
                        <?php foreach($resultSubject as $rowSubject){ ?>
                        <li><button class="readon2 "><?php echo $rowSubject['name']; ?></button></li>
                        <?php  } ?>
                    </ul>
                    <ul>
                        <li>
                            <a class="active" href="/">Home</a>
                        </li>
                        <li><?php echo $resultCourse[0]['name']; ?> Details</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumbs End -->            

            <!-- Intro Courses -->
            <section class="intro-section gray-bg pt-10 pb-100 md-pt-64 md-pb-70">
                <div class="container">
                    <div class="row clearfix">
                        <!-- Content Column -->
                        <div class="col-lg-8 md-mb-50">
                            <!-- Intro Info Tabs-->
                            <div class="intro-info-tabs">
                                <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" aria-controls="prod-overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn" id="prod-curriculum-tab" data-toggle="tab" href="#prod-curriculum" role="tab" aria-controls="prod-curriculum" aria-selected="false">Curriculum</a>
                                    </li>
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn" id="prod-instructor-tab" data-toggle="tab" href="#prod-instructor" role="tab" aria-controls="prod-instructor" aria-selected="false">Instructor</a>
                                    </li>
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn" id="prod-faq-tab" data-toggle="tab" href="#prod-faq" role="tab" aria-controls="prod-faq" aria-selected="false">Faq</a>
                                    </li>
                                    <li class="nav-item tab-btns">
                                        <a class="nav-link tab-btn" id="prod-reviews-tab" data-toggle="tab" href="#prod-reviews" role="tab" aria-controls="prod-reviews" aria-selected="false">Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content tabs-content" id="myTabContent">
                                    <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                        <div class="content white-bg pt-30">
                                            <!-- Cource Overview -->
                                            <div class="course-overview">
                                                <div class="inner-box">
                                                    <h4>Educavo Course Details</h4>
                                                    <p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>
                                                    <p>Eleifend euismod pellentesque vel Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>
                                                    <ul class="student-list">
                                                        <li>23,564 Total Students</li>
                                                        <li><span class="theme_color">4.5</span> <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span> (1254 Rating)</li>
                                                        <li>256 Reviews</li>
                                                    </ul>
                                                    <h3>What you’ll learn?</h3>
                                                    <ul class="review-list">
                                                        <li>Phasellus enim magna, varius et commodo ut.</li>
                                                        <li>Sed consequat justo non mauris pretium at tempor justo.</li>
                                                        <li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>
                                                        <li>Phasellus enim magna, varius et commodo ut.</li>
                                                        <li>Phasellus enim magna, varius et commodo ut.</li>
                                                        <li>Sed consequat justo non mauris pretium at tempor justo.</li>
                                                        <li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>
                                                        <li>Phasellus enim magna, varius et commodo ut.</li>
                                                    </ul>
                                                    <h3>Requirements</h3>
                                                    <ul class="review-list">
                                                        <li>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>
                                                        <li>Ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel.</li>
                                                        <li>Phasellus enim magna, varius et commodo ut.</li>
                                                        <li>Varius et commodo ut, ultricies vitae velit. Ut nulla tellus.</li>
                                                        <li>Phasellus enim magna, varius et commodo ut.</li>
                                                    </ul>                                                                                                          
                                                </div>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="prod-curriculum" role="tabpanel" aria-labelledby="prod-curriculum-tab">
                                        <div class="content">
                                            <div id="accordion" class="accordion-box">
                                            <?php $subjectCount=0;
                                            foreach($resultSubject as $rowSubject){ 
                                                //get modules data 
                                            $conArrM=array("subject_id"=>$rowSubject['id']);    
                                            $resultModule=$functionClass->getRowsByWhere("modules","subject_id=:subject_id",$conArrM);
                                            ?>
                                                <div class="card accordion block">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link acc-btn <?php if($subjectCount!=0){ echo "collapsed";} ?>" data-toggle="collapse" data-target="#collapseOne_<?php echo $rowSubject['id']; ?>" aria-expanded=" <?php if($subjectCount!=0){ echo "false";}else{ echo "true";} ?>" aria-controls="collapseOne_<?php echo $rowSubject['id']; ?>"><?php echo $rowSubject['name']; ?></button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseOne_<?php echo $rowSubject['id']; ?>" class="collapse <?php if($subjectCount==0){ echo "show";} ?>" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body acc-content current">
                                                            <?php foreach($resultModule as $rowModule){ ?>
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a class="module-a" href="lesson-detail/run-lesson?q=<?php echo str_replace(" ","-",$rowSubject['name']); ?>&n=<?php echo  $functionClass->EN($rowSubject['id']); ?>&m=<?php echo  $functionClass->EN($rowModule['id']); ?>"><?php echo $rowModule['name']; ?></a>
                                                                        <div class="info-meta">
                                                                            <ul>
                                                                                <?php if($rowModule['videos']==1){  ?>
                                                                                   <li style="font-size: 16px;color: #878b8f;" class="user"><i style="color: #878b8f;" class="fa fa-video-camera" aria-hidden="true"></i>Video</li>
                                                                                <?php } ?> 
                                                                                <?php if($rowModule['pdfs']==1){  ?>
                                                                                   <li style="font-size: 16px;color: #878b8f;" class="user"><span class=" badge badge-info ans-msg"> <i style="color: #white;" class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</span></li>
                                                                                <?php } ?>
                                                                             
                                                                            </ul></div>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes"><span class=" badge badge-success ans-msg"><?php echo $rowModule['status'];  ?></span></div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $subjectCount++; } ?>
                                     
                                            </div>                                             
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="prod-instructor" role="tabpanel" aria-labelledby="prod-instructor-tab">
                                        <div class="content pt-30 pb-30 pl-30 pr-30 white-bg">
                                            <h3 class="instructor-title">Instructors</h3>
                                            <div class="row rs-team style1 orange-color transparent-bg clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12 sm-mb-30">
                                                    <div class="team-item">
                                                        <img src="assets/images/team/1.jpg" alt="">
                                                        <div class="content-part">
                                                            <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
                                                            <span class="designation">Professor</span>
                                                            <ul class="social-links">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                                            
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="team-item">
                                                        <img src="assets/images/team/2.jpg" alt="">
                                                        <div class="content-part">
                                                            <h4 class="name"><a href="#">Jhon Pedrocas</a></h4>
                                                            <span class="designation">Professor</span>
                                                            <ul class="social-links">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>                                                            
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="prod-faq" role="tabpanel" aria-labelledby="prod-faq-tab">
                                        <div class="content">
                                            <div id="accordion3" class="accordion-box">
                                                <div class="card accordion block">
                                                    <div class="card-header" id="headingSeven">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link acc-btn" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">UI/ UX Introduction</button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordion3">
                                                        <div class="card-body acc-content current">
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a class="popup-videos play-icon" href="https://www.youtube.com/watch?v=atMUy_bPoQI"><i class="fa fa-play"></i>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"><i class="ripple"></i></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card accordion block">
                                                    <div class="card-header" id="headingEight">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link acc-btn collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Color Theory</button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion3">
                                                        <div class="card-body acc-content">
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"><i class="ripple"></i></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card accordion block">
                                                    <div class="card-header" id="headingNine">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link acc-btn collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">Basic Typography</button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion3">
                                                        <div class="card-body acc-content">
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"><i class="ripple"></i></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="clearfix">
                                                                    <div class="pull-left">
                                                                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="popup-videos play-icon"><span class="fa fa-play"></span>What is UI/ UX Design?</a>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <div class="minutes">35 Minutes</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                              
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="prod-reviews" role="tabpanel" aria-labelledby="prod-reviews-tab">
                                        <div class="content pt-30 pb-30 white-bg">
                                            <div class="cource-review-box mb-30">
                                                <h4>Stephane Smith</h4>
                                                <div class="rating">
                                                    <span class="total-rating">4.5</span> <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>&ensp; 256 Reviews
                                                </div>
                                                <div class="text">Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus.</div>
                                                <div class="helpful">Was this review helpful?</div>
                                                <ul class="like-option">
                                                    <li><i class="fa fa-thumbs-o-up"></i></li>
                                                    <li><i class="fa fa-thumbs-o-down"></i></li>
                                                    <li><a class="report" href="#">Report</a></li>
                                                </ul>
                                            </div>
                                            <div class="cource-review-box mb-30">
                                                <h4>Anna Sthesia</h4>
                                                <div class="rating">
                                                    <span class="total-rating">4.5</span> <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>&ensp; 256 Reviews
                                                </div>
                                                <div class="text">Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus.</div>
                                                <div class="helpful">Was this review helpful?</div>
                                                <ul class="like-option">
                                                    <li><i class="fa fa-thumbs-o-up"></i></li>
                                                    <li><i class="fa fa-thumbs-o-down"></i></li>
                                                    <li><a class="report" href="#">Report</a></li>
                                                </ul>
                                            </div>
                                            <div class="cource-review-box mb-30">
                                                <h4>Petey Cruiser</h4>
                                                <div class="rating">
                                                    <span class="total-rating">4.5</span> <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>&ensp; 256 Reviews
                                                </div>
                                                <div class="text">Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus.</div>
                                                <div class="helpful">Was this review helpful?</div>
                                                <ul class="like-option">
                                                    <li><i class="fa fa-thumbs-o-up"></i></li>
                                                    <li><i class="fa fa-thumbs-o-down"></i></li>
                                                    <li><a class="report" href="#">Report</a></li>
                                                </ul>
                                            </div>
                                            <div class="cource-review-box">
                                                <h4>Rick O'Shea</h4>
                                                <div class="rating">
                                                    <span class="total-rating">4.5</span> <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>&ensp; 256 Reviews
                                                </div>
                                                <div class="text">Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus.</div>
                                                <div class="helpful">Was this review helpful?</div>
                                                <ul class="like-option">
                                                    <li><i class="fa fa-thumbs-o-up"></i></li>
                                                    <li><i class="fa fa-thumbs-o-down"></i></li>
                                                    <li><a class="report" href="#">Report</a></li>
                                                </ul>
                                                <a href="#" class="more">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Video Column -->
                        <div class="video-column col-lg-4">
                            <div class="inner-column">
                            <!-- Video Box -->
                                <div class="intro-video media-icon orange-color2">
                                    <img class="video-img" src="assets/images/about/about-video-bg2.png" alt="Video Image">
                                    <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
                                        <i class="fa fa-play"></i>
                                    </a>
                                    <h4>Preview this course</h4>
                                </div>
                                <!-- End Video Box -->
                                <div class="course-features-info">
                                    <ul>
                                        <li class="lectures-feature">
                                            <i class="fa fa-files-o"></i>
                                            <span class="label">Lectures</span>
                                            <span class="value">3</span>
                                        </li>
                                       
                                        <li class="quizzes-feature">
                                            <i class="fa fa-puzzle-piece"></i>
                                            <span class="label">Quizzes</span>
                                            <span class="value">0</span>
                                        </li>
                                       
                                        <li class="duration-feature">
                                            <i class="fa fa-clock-o"></i>
                                            <span class="label">Duration</span>
                                            <span class="value">10 week </span>
                                        </li>
                                      
                                        <li class="students-feature">
                                            <i class="fa fa-users"></i>
                                            <span class="label">Students</span>
                                            <span class="value">21</span>
                                        </li>
                                       
                                        <li class="assessments-feature">
                                            <i class="fa fa-check-square-o"></i>
                                            <span class="label">Assessments</span>
                                            <span class="value">Yes</span>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="btn-part">
                                    <a href="#" class="btn readon2 orange">$35</a>
                                    <a href="#" class="btn readon2 orange-transparent">Buy Now</a>
                                </div>
                            </div>
                        </div>                        
                    </div>                
                </div>
            </section>
            <!-- End intro Courses -->

            <!-- Newsletter section start -->
            <div class="rs-newsletter style1 gray-bg orange-color mb--90 sm-mb-0 sm-pb-70">
                <div class="container">
                    <div class="newsletter-wrap">
                        <div class="row y-middle">
                            <div class="col-lg-6 col-md-12 md-mb-30">
                               <div class="content-part">
                                   <div class="sec-title">
                                       <div class="title-icon md-mb-15">
                                           <img src="assets/images/newsletter.png" alt="images">
                                       </div>
                                       <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                                   </div>
                               </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <form class="newsletter-form">
                                    <input type="email" name="email" placeholder="Enter Your Email" required="">
                                    <button type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Newsletter section end -->
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
    </body>
</html>