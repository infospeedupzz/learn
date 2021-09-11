<?php include('layout/session.php'); 
if(isset($_GET['n'])){
    $id=$functionClass->DE($_GET['n']);
  
   
   $conArrMock= array(
             ':var1'=>','.$id.',',
            "publish" => 'True'
            );  
          $resultM=$functionClass->getRowsByWhere("mock"," package_id LIKE CONCAT('%', :var1, '%') and publish=:publish order by status DESC
           ",$conArrMock);
    //package name 
     $conArrMockP= array(
        "package_id" => $id
    );
    $resultP = $functionClass->getRowsByWhere("mock_packages", "id=:package_id", $conArrMockP);

    
}else{
    echo"<script>window.location.href='/'</script>";
    die();
}
 $usermock_purchaged=array();
     //get user purched mock id  if login 
    if(!empty($_SESSION['userId'])){
         $conArrusermock = array(
            "user_id" => $_SESSION['userId'],
            "date" => date("Y-m-d")
        );
        $resultUM = $functionClass->getRowsByWhere("mock_purchages", "user_id=:user_id and expiry_date>=:date", $conArrusermock);
        $count=0;
        foreach($resultUM as $rowUM){
            $count++;
            $usermock_purchaged[$count]=$rowUM['mock_id'];
        }
    }
    //end of  get user purched mock id  if login 
?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>online test series  </title>
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
                            &gt; <a style='color:white' class="active" href="online-test-series">Online Test Series </a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="online-test-series"><?php echo $resultP[0]['title']; ?> </a>
                        </li>
                       
                    </ul>
                    <div class="section-heading ">
                        <h2 class="section__title text-white"><?php echo $resultP[0]['title']; ?></h2>
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
                                    <h3 class="widget-title">Download App</h3>
                                    <br>
                                  <a href="https://play.google.com/store/apps/details?id=com.learnoset.learnish&hl=en_IN&gl=US"><img src="assets/images/app.jpeg" alt="Download learnizy app"></a>
                                </div>
                                 <div class="widget-archives mb-50">
                                    <h3 class="widget-title">Refer & Earn</h3>
                                    <br>
                                    <a href="https://play.google.com/store/apps/details?id=com.learnoset.learnish&hl=en_IN&gl=US"><img src="assets/images/offer1.png" alt=" learnizy refer & earn"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pr-50 md-pr-15">                            
                           
                            <div class="course-part clearfix">
                                <?php foreach($resultM as $rowM){ ?>
                                <div class="courses-item ">
                                  
                                    <div class="content-part" style='width:100%'>
                                       
                                       
                                        <div class="bottom-part">
                                             <h3 class="title" style='margin:0px;'><a href="#"><?php echo $rowM['title']; ?></a></h3>
                                            <div class="info-meta">
                                                <ul>
                                                    <li style='font-size: 12px;color: #878b8f;' class="user"><i style='color: #878b8f;' class="fa fa-question-circle" aria-hidden="true"></i> <?php echo $rowM['questions']; ?> Questions</li>
                                                    <li style='font-size: 12px;color: #878b8f;' class="user"><i style='color: #878b8f;' class="fa fa-file" aria-hidden="true"></i> <?php echo $rowM['marks']; ?> Total Marks</li>
                                                    <li style='font-size: 12px;color: #878b8f;' class="user"><i style='color: #878b8f;' class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $rowM['max_time']; ?> Min</li>
                                                    <li style='font-size: 12px;    color: #0eb582;font-weight: 700;' class="user">Publish Date: <?php echo date("d-m-Y",strtotime($rowM['published_date'])); ?></li>
                                                    
                                                </ul>
                                            </div>
                                             <div class="btn-part float-right start-btn">
                                                 <?php if(!empty($_SESSION['userId'])){ 
                                                     
                                                      $conArrScore = array(
                                                        "mock_id" => $rowM['id'],
                                                        "user_id" => $_SESSION['userId']
                                                        
                                                    );
                                                    $resultScore = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id ", $conArrScore);
                                                    if(!empty($resultScore)){ ?>
                                                          <a href="mock-solution/<?php echo str_replace(" ","-", $rowM['title']); ?>/<?php echo $functionClass->EN($rowM['id']); ?>" >Solutions</a>
                                                          <a href="analysis/<?php echo str_replace(" ","-", $rowM['title']); ?>/<?php echo $functionClass->EN($rowM['id']); ?>" >Analysis</a>
                                                   <?php }else{
                                                 if($rowM['status']=='Free'){?>
                                                <a href="mock-instruction/<?php echo str_replace(" ","-", $rowM['title']); ?>/<?php echo $functionClass->EN($rowM['id']); ?>" >Start Now</a>
                                                <?php }else{
                                                    
                                                    
                                                    if(in_array($rowM['id'],$usermock_purchaged)){
                                                    ?>
                                                     <a href="mock-instruction/<?php echo str_replace(" ","-", $rowM['title']); ?>/<?php echo $functionClass->EN($rowM['id']);?>" >Start Now </a>
                                                    <?php
                                                } else{?>
                                                     <a href="#"  data-toggle="modal" data-target="#myModal">Unlock Now </a>
                                                <?php } }}}else{?>
                                                 <a class="readon2 green-btn" href="#" data-toggle="modal" data-target="#loginModal">Unlock Now </a>
                                                <?php }?>
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
        <!-- info modal -->
        <!-- Button trigger modal -->


<!-- info Modal -->
  <?php if(!empty($_SESSION['userId'])){  ?>
<div class="modal fade-scale modal1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 style='float:left;' class="modal-title" id="myModalLabel"><?php echo $resultP[0]['title']; ?></h4>
        <button style='float:right;' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <p style='font-size:22px;'>To unlock all the mock test in this test series click on <b>Buy now</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href='pay/mock_package/<?php echo $functionClass->EN($id); ?>' type="button" class="btn btn-primary">Buy Now</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
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