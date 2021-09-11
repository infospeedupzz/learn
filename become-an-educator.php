<?php include('layout/session.php');?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>become an educator   </title>
        <meta name="description" content="">
      <?php include("layout/head.php"); ?>
      <style>
          .contact-form-success {

    margin-left: auto;
    margin-right: auto;
    padding: 40px;
    background: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 12px;
 
}
.icon-element{
    padding-top:15px;
}
.social-profile li a{
    padding-top:10px;
}
.section-padding{
    padding-top:2px;
    padding-bottom:10px;
}

      </style>
     
</head>
    <body class="defult-home">
        
   


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
                            &gt; <a style='color:white' class="active" href="#">Become An Educator </a>
                        </li>
                       
                    </ul>
                    <div class="section-heading ">
                        <h2 class="section__title text-white">Apply as Educator</h2>
                    </div>
                    </div>
                </div><!-- end breadcrumb-content -->
            <section class="contact-area padding-bottom-100px pt-20 gray-bg">
    <div class="container">
       <section class="register-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h5 class="section__meta">Register</h5>
                    <h2 class="section__title">Fill Up this Form to Join with Us</h2>
                    <span class="section-divider"></span>
                </div>
            </div>
        </div>
        <div class="row margin-top-30px">
            <div class="col-lg-10 mx-auto">
                <div class="card-box-shared mb-0">
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="post" id="apply">
                                  <span style="color: red;" id="msg-lr"> </span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Name<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="name" placeholder="Name" required>
                                                <span class="fa fa-user input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                      <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="email" placeholder="Email address" required>
                                                <span class="fa fa-envelope input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Phone number<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" maxlength="10" type="text" name="phone" placeholder="Phone number" required>
                                                <span class="fa fa-phone input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    
                                    <div class="col-lg-6">
                                       <div class="input-box">
                                           <label class="label-text">Date of Birth<span class="primary-color-2 ml-1">*</span></label>
                                           <div class="form-group">
                                               <input class="form-control" type="date" name="dob" >
                                               <span class="fa fa-calendar input-icon"></span>
                                           </div>
                                       </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">City<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="address" placeholder="City" required>
                                                <span class="fa fa-map-marker input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 --> 
                                      
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Select Gender<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <label for="radio-1" class="radio-trigger mb-0 mr-2">
                                                    <input type="radio" id="radio-1" name="radio">
                                                    <span class="checkmark"></span>
                                                    <span class="font-size-15 primary-color-3">Male</span>
                                                </label>
                                                <label for="radio-2" class="radio-trigger mb-0">
                                                    <input type="radio" id="radio-2" name="radio">
                                                    <span class="checkmark"></span>
                                                    <span class="font-size-15 primary-color-3">Female</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                     <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Upload your resume <span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="file" name="img" required accept=".pdf,.doc"/>
                                                <span class="fa fa-file input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 --> 
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button id='sendQ' class="theme-btn" type="submit">Apply Now</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div><!-- end card-box-shared -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end register-area -->
<!-- ================================
       START REGISTER AREA
================================= -->
    </div><!-- end container -->
</section>
                   
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


       
        <!-- info modal -->
<!-- info Modal -->

<div class="modal fade-scale modal1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style='background-color: #fff0;'>
      <div class="modal-header" style='border-bottom:none'>
       
        <button style='float:right;' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style='color:white'>&times;</span></button>
        
      </div>
      <div class="modal-body" style='border-bottom:none'>
      <div class="contact-form-success">
        <h3>Thank you for applying.</h3>
        <p>
            Your information is important to us. It will always remain confidential with us. We will contact you shortly.
        </p>
    </div>
      </div>
      
    </div>
  </div>
</div>




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
         
         
         //add contact us details
            $("form#apply").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#sendQ").attr("disabled", true);
$("#sendQ").html("<i class='fa fa-circle-o-notch fa-spin'></i> Sending..");
   $.ajax({
        url:'apply_educator',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {

                if(data.type=="error"){
                      $("#msg-lr").html(data.message);
                     $("#msg-lr").css("color","red");
                  $("#msg-lr").fadeIn();
                  $('#sendQ').attr("disabled", false);
                        $('#sendQ').val("Apply Now");
                     
                }else{
                    
                      
                            $("#myModal").modal("show");
                         $('#apply').trigger("reset");
                        
                }
                  $("#sendQ").attr("disabled", false);
                  $("#sendQ").html('Apply Now');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 
     </script>
            <?php include("layout/noti.php"); ?>  
            
    </body>

</html>