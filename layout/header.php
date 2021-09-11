   <div class="full-width-header header-style1 home1-modifiy home12-modifiy">
            <!--Header Start-->
            <header id="rs-header" class="rs-header">
                <!-- Topbar Area Start -->
                <div class="topbar-area home11-topbar">
                    <div class="container" style='max-width:95%!important'>
                        <div class="row y-middle">
                            <div class="col-md-5">
                                <ul class="topbar-contact">
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <a href="mailto:support@learniy.in">support@learnizy.in</a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="col-md-7 text-right">
                                    <ul class="toolbar-sl-share">
                                     
                                        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://www.instagram.com/learnizy_/"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Topbar Area End -->
<div class="header-menu-content dashboard-menu-conten">
        <div class="container-fluid">
            <div class="main-menu-content">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-box">
                            <a href="/"  class="logo1"><img src="<?php echo $ROOT_URL; ?>/assets/images/logo.png" alt="logo"></a>
                            <div class="side-menu-open"  style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>'>
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-10">
                        <div class="menu-wrapper" >
                            <div class="menu-category mr-16">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-th-large mr-1"></i>Categories</a>
                                        <ul class="cat-dropdown-menu">
                                           
                                            <li>
                                                <a href="previous-year-paper"> Prev Year Paper </a>
                                               
                                            </li>
                                            <li>
                                                <a href="faq">FAQs </a>
                                               
                                            </li> 
                                            <li>
                                                <a href="contact-us">Contact Us </a>
                                               
                                            </li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                          
                            <nav class="main-menu <?php if(!empty($userInfo)){ echo 'menu-margin'; }else{ echo 'menu-marginm'; } ?>">
                                <ul>
                                    <li>
                                        <a href="/">Home<button class="sub-nav-toggler" type="button"><i class="la la-angle-down"></i></button></a>
                                       
                                    </li>
                                    <li>
                                        <a href="#">Exam<button class="sub-nav-toggler" type="button"><i class="la la-angle-down"></i></button></a>
                                        <ul class="dropdown-menu-item">
                                            <?php 
                                                             $resultE=$functionClass->getRows("exam order By id ASC");
                                                             foreach ($resultE as $rowE ) {
                                                                 ?>
                                                                    <li><a href="competitive-exams/<?php echo $rowE['alias']; ?>"><?php echo $rowE['name']; ?></a> </li>
                                                                 <?php
                                                             
                                                             }
                                                    ?>
                                                
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Course<button class="sub-nav-toggler" type="button"><i class="la la-angle-down"></i></button></a>
                                        <ul class="dropdown-menu-item">
                                           <?php 
                                                           $resultC=$functionClass->getRows("course order By order_by ASC");
                                                             foreach ($resultC as $rowC ) {
                                                                if(strpos($rowC['publish'],"Course")){ 
                                                                 ?>
                                                                    <li><a href="course/<?php echo $rowC['alias']; ?>"><?php echo $rowC['name']; ?></a> </li>
                                                                 <?php
                                                             }
                                                             }
                                                    ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="online-test-series/afo-prelims">Test Series<button class="sub-nav-toggler" type="button"><i class="la la-angle-down"></i></button></a>
                                        <ul class="dropdown-menu-item">
                                           <?php foreach ($resultC as $rowC ) { 
                                                            if(strpos($rowC['publish'],"Mock")){ ?>
                                                                <li><a href="online-test-series/<?php echo $rowC['alias']; ?>"><?php echo $rowC['name'] ?></a></li>
                                                        <?php } 
                                                        } ?>
                                        </ul>
                                    </li>
                                   
                                    <li><a href="quizzes">QUIZZES</a></li>
                                    <li><a href="about-us-learnizy">About Us</a></li>

                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->
                              <?php if(empty($userInfo)){?>
                                 <div class="header-action-button d-flex align-items-center logo-right-button mr-2">
                                    <div class="notification-wrap d-flex align-items-center">
                                        <div class="notification-item mr-3">
                                            <div class="dropdown">
                                                <button class="notification-btn dropdown-toggle" type="button" id="notificationDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-bell"></i>
                                                    <span class="quantity">0</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="notificationDropdownMenu">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__title">
                                                            <h4 class="widget-title">Notifications</h4>
                                                        </div><!-- end mess__title -->
                                                        <div class="mess__body" id="get_noti">
                                                            
                                                            <a href="#" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-3 text-white" style="padding-top: 10px;">
                                                                        <i class="fa fa-check-circle"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time"><?php echo date("M,d Y"); ?></span>
                                                                        <p class="text">No New Notification</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                           
                                                        </div><!-- end mess__body -->
                                                      
                                                    </div><!-- end mess-dropdown -->
                                                </div><!-- end dropdown-menu -->
                                            </div><!-- end dropdown -->
                                        </div>
                                    
                                    </div>
                                  
                                </div>
                            <div class="logo-right-button float-right" style="margin-right: 15px;">
                                <a href="#"  data-toggle="modal" data-target="#loginModal"  class="theme-btn loginBtn signin">Sign In</a>
                            </div>

                              <div class="logo-right-button float-right" >
                                <a href="#"  style="white-space: nowrap;" data-toggle="modal" data-target="#regModal" class="theme-btn signup">Sign Up</a>
                            </div>
                           
                        <?php }else{?>

                            <div class="header-action-button d-flex align-items-center logo-right-button">
                                    <div class="notification-wrap d-flex align-items-center">
                                        <div class="notification-item mr-3">
                                            <div class="dropdown">
                                                <button class="notification-btn dropdown-toggle" type="button" id="notificationDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-bell"></i>
                                                    <span class="quantity" id="nq">0</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="notificationDropdownMenu">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__title">
                                                            <h4 class="widget-title">Notifications</h4>
                                                        </div><!-- end mess__title -->
                                                        <div class="mess__body" id="get_noti">
                                                            
                                                            <a href="#" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-3 text-white">
                                                                        <i class="fa fa-check-circle"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time"><?php echo date("M,d Y"); ?></span>
                                                                        <p class="text">No New Notification</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                           
                                                        </div><!-- end mess__body -->
                                                        <div class="btn-box p-2 text-center">
                                                            <a href="notification">Show All Notifications</a>
                                                        </div><!-- end btn-box -->
                                                    </div><!-- end mess-dropdown -->
                                                </div><!-- end dropdown-menu -->
                                            </div><!-- end dropdown -->
                                        </div>
                                    
                                    </div>
                                    <div class="user-action-wrap" style="margin-top: -7px;">
                                        <div class="notification-item user-action-item">
                                            <div class="dropdown">
                                                <button class="notification-btn dot-status online-status dropdown-toggle" type="button" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       <?php if(!empty($userInfo[0]['profile_pic'])){?>
                                                    <img  src="<?php echo $userInfo[0]['profile_pic']; ?>" alt="">
                                                    <?php }else{ ?>
                                                     <img  src="assets/images/useravtar.png" alt="<?php echo $userInfo[0]['fullname']; ?>">   
                                                     <?php } ?>
                                                   
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="userDropdownMenu">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__title d-flex align-items-center">
                                                            <div class="image">
                                                                <a href="profile">
                                                                       <?php if(!empty($userInfo[0]['profile_pic'])){?>
                                                                        <img  src="<?php echo $userInfo[0]['profile_pic']; ?>" alt="">
                                                                        <?php }else{ ?>
                                                                         <img  src="assets/images/useravtar.png" alt="<?php echo $userInfo[0]['fullname']; ?>">   
                                                                         <?php } ?>
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h4 class="widget-title font-size-16">
                                                                    <a href="profile" class="text-white">
                                                                        <?php echo $userInfo[0]['fullname']; ?>
                                                                    </a>
                                                                </h4>
                                                                <span class="email"> <?php echo $userInfo[0]['email']; ?></span>
                                                            </div>
                                                        </div><!-- end mess__title -->
                                                        <div class="mess__body">
                                                            <ul class="list-items">
                                                               
                                                                <li class="mb-0">
                                                                    <a href="profile" class="d-block">
                                                                        <i class="fa fa-gear"></i> Settings
                                                                    </a>
                                                                </li>
                                                              
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                               
                                                                <li class="mb-0">
                                                                    <a href="profile" class="d-block">
                                                                        <i class="fa fa-edit"></i> Edit Profile
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                              
                                                                <li class="mb-0">
                                                                    <a  href="logout" class="d-block">
                                                                        <i class="fa fa-power-off"></i> Logout
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                               
                                                            </ul>
                                                        </div><!-- end mess__body -->
                                                    </div><!-- end mess-dropdown -->
                                                </div><!-- end dropdown-menu -->
                                            </div><!-- end dropdown -->
                                        </div>
                                    </div>
                                </div>

                        <?php } ?>
                        <!--mobile menu start-->
                         <div class="user-nav-container">
                                <div class="humburger-menu">
                                    <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
                                </div><!-- end humburger-menu -->
                                <div class="section-tab section-tab-2">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation">
                                            <a href="#menu-home" role="tab" data-toggle="tab" class="active" aria-selected="false">
                                                Menu
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#notification-home" role="tab" data-toggle="tab"  aria-selected="true">
                                                Notifications
                                            </a>
                                        </li>
                                    <?php if(!empty($userInfo)){?>
                                        <li role="presentation">
                                            <a href="#account-home" role="tab" data-toggle="tab" aria-selected="false">
                                                Account
                                            </a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                                <div class="user-panel-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="menu-home" role="tabpanel">
                                            <div class="user-sidebar-item">
                                                <div class="mess-dropdown">
                                                    <div class="mess__body">
                                                        <a href="/" class="d-block">
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-1 text-white">
                                                                    <i class="fa fa-home"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">Home</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>

                                                        <a href="#"  class="d-block clickMenu" >
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-2 text-white">
                                                                    <i class="fa fa-university"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">Exam</p>
                                                                </div>
                                                               
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                          <div class="list-group" style="display: none;">
                                                               <?php 
                                                             
                                                                foreach ($resultE as $rowE ) {
                                                                 ?>
                                                                   <a href="competitive-exams/<?php echo $rowE['alias']; ?>" class="list-group-item list-group-item-action ">
                                                                <?php echo $rowE['name']; ?>
                                                              </a>
                                                                 
                                                                 <?php
                                                             
                                                             }
                                                            ?>
                                                            
                                                            </div>
                                                             <a href="#"  class="d-block clickMenu" >
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-3 text-white">
                                                                    <i class="fa fa-certificate"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">Course</p>
                                                                </div>
                                                               
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                          <div class="list-group" style="display: none;">
                                                              
                                                               <?php 
                                                             $resultC=$functionClass->getRows("course");
                                                             foreach ($resultC as $rowC ) {
                                                                       if(strpos($rowC['publish'],"Course")){ 
                                                                 ?>
                                                                   <a style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="list-group-item list-group-item-action " href="course/<?php echo $rowC['alias']; ?>"><?php echo $rowC['name']; ?></a> 
                                                                 <?php
                                                             }
                                                             }
                                                            ?>
                                                            </div>
                                                        <a href="#"  class="d-block clickMenu" >
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-4 text-white">
                                                                    <i class="fa fa-question-circle"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">Test Series</p>
                                                                </div>
                                                               
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                          <div class="list-group" style="display: none;">
                                                              
                                                              
                                                              <?php foreach ($resultC as $rowC ) { 
                                                            if(strpos($rowC['publish'],"Mock")){ ?>
                                                                <a  class="list-group-item list-group-item-action " href="online-test-series/<?php echo $rowC['alias']; ?>"><?php echo $rowC['name'] ?></a>
                                                                <?php } 
                                                                } ?>
                                                            </div>

                                                      <a href="quizzes" class="d-block">
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-5 text-white">
                                                                    <i class="fa fa-question"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">QUIZZES</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                          <a href="about-us-learnizy" class="d-block">
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-1 text-white">
                                                                    <i class="fa fa-info"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">About Us</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <?php if(empty($userInfo)){ ?>
                                                        <a href="#" class="d-block loginBtn loginsignin signin" data-toggle="modal" data-target="#loginModal"  >
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-4 text-white">
                                                                    <i class="fa fa-sign-in"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">Sign In</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="#" class="d-block loginsignin signup"  data-toggle="modal" data-target="#regModal" >
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-7 text-white">
                                                                    <i class="fa  fa-user-plus"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">Sign Up</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                    <?php }else{ ?>
                                                        <a href="logout" class="d-block">
                                                            <div class="mess__item">
                                                                <div style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-6 text-white">
                                                                    <i class="fa fa-power-off"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <p class="text">Logout</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                    <?php } ?>
                                                    </div><!-- end mess__body -->
                                                </div><!-- end mess-dropdown -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="notification-home" role="tabpanel">
                                            <div class="user-sidebar-item">
                                                <div class="mess-dropdown">
                                                    <div class="mess__body" id="get_notim">
                                                         <a href="#" class="d-block">
                                                                <div class="mess__item">
                                                                    <div  style='<?php if(empty($userInfo)){ echo "padding-top: 10px!important;"; } ?>' class="icon-element bg-color-3 text-white">
                                                                        <i class="fa fa-check-circle"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time"><?php echo date("M,d Y"); ?></span>
                                                                        <p class="text">No New Notification</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                        
                                                    </div><!-- end mess__body -->
                                                     <div class="btn-box p-2 text-center">
                                                        <a href="notification">Show All Notifications</a>
                                                    </div><!-- end btn-box -->
                                                    
                                                </div><!-- end mess-dropdown -->
                                            </div>
                                        </div>
                                        <?php if(!empty($userInfo)){?>
                                        <div class="tab-pane fade" id="account-home" role="tabpanel">
                                            <div class="user-sidebar-item user-action-item">
                                                <div class="mess-dropdown">
                                                    <div class="mess__title d-flex align-items-center">
                                                        <div class="image">
                                                            <a href="profile">
                                                                       <?php if(!empty($userInfo[0]['profile_pic'])){?>
                                                                        <img  src="<?php echo $userInfo[0]['profile_pic']; ?>" alt="">
                                                                        <?php }else{ ?>
                                                                         <img  src="assets/images/useravtar.png" alt="<?php echo $userInfo[0]['fullname']; ?>">   
                                                                         <?php } ?>
                                                                </a>
                                                        </div>
                                                        <div class="content">
                                                            <h4 class="widget-title font-size-16">
                                                                <a href="profile" class="text-white">
                                                                   <?php echo $userInfo[0]['fullname']; ?>
                                                                </a>
                                                            </h4>
                                                            <span class="email"> <?php echo $userInfo[0]['email']; ?></span>
                                                        </div>
                                                    </div><!-- end mess__title -->
                                                    <div class="mess__body">
                                                        <ul class="list-items">
                                                            <li class="mb-0">
                                                                    <a href="profile" class="d-block">
                                                                        <i class="fa fa-gear"></i> Settings
                                                                    </a>
                                                                </li>
                                                              
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                               
                                                                <li class="mb-0">
                                                                    <a href="profile" class="d-block">
                                                                        <i class="fa fa-edit"></i> Edit Profile
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                              
                                                                <li class="mb-0">
                                                                    <a href="logout" class="d-block">
                                                                        <i class="fa fa-power-off"></i> Logout
                                                                    </a>
                                                                </li>
                                                        </ul>
                                                    </div><!-- end mess__body -->
                                                </div><!-- end mess-dropdown -->
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- end of mobile menu-->
                           
                        </div><!-- end menu-wrapper -->

                            
                    </div><!-- end col-lg-10 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container-fluid -->
    </div>
            </header>
            <!--Header End-->
        </div>