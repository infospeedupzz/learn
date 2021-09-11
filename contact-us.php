<?php include('layout/session.php');?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Contact us Learnizy  </title>
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
                            &gt; <a style='color:white' class="active" href="#">Contact Us </a>
                        </li>
                       
                    </ul>
                    <div class="section-heading ">
                        <h2 class="section__title text-white">Contact Us</h2>
                    </div>
                    </div>
                </div><!-- end breadcrumb-content -->
            <section class="contact-area padding-bottom-100px pt-20 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-1 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="fa fa-instagram"></i>
                    </div>
                    <h3 class="info__title">Chat with Us</h3>
                    <p class="info__text mb-0">Available on Instagram @learnizy_</p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-2 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h3 class="info__title">Email us</h3>
                    <p class="info__text mb-0">
             
                        <span class="d-block">info.learnizy@gmail.com</span>
                    </p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
             <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-3 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="fa fa-whatsapp"></i>
                    </div>
                    <h3 class="info__title">Whatsapp us</h3>
                    <p class="info__text mb-0">
                        <span class="d-block">+91-8699410975</span>
                        
                    </p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="contact-form-wrap pt-5">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <p class="section__meta">get in touch</p>
                        <h2 class="section__title">Contact with us</h2>
                        <span class="section-divider"></span>
                        <p class="section__desc">
                            We would love to hear from you. Let us know if you are facing any problems, have any questions or want to share feedback. We are always happy to help!
                        </p>
                        <ul class="social-profile">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-5 -->
                <div class="col-lg-7">
                    <div class="contact-form-action">
                        <form method="POST" id='add-contact' name="contactform" action="#">
                             <span style="color: red;" id="msg-lr"> </span>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Name<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" placeholder="Your name" c>
                                            <span class="fa fa-user input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Email<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email" placeholder="Your email" required>
                                            <span class="fa fa-envelope input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Phone Number<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="phone" placeholder="Phone number" required>
                                            <span class="fa fa-phone input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Subject<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="subject" placeholder="Reason for contact" required>
                                            <span class="fa fa-book input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Message<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                            <span class="fa fa-pencil input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <?php  if(!empty($userInfo)){?>
                                    <button class="theme-btn" type="submit" id='sendQ'>Send Message</button>
                                    <?php }else{ ?>
                                               <button  data-toggle="modal" data-target="#loginModal" class="theme-btn" type="button">Send Message</button>
                                    <?php } ?>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end col-md-7 -->
            </div><!-- end row -->
        </div>
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
  <?php if(!empty($_SESSION['userId'])){  ?>
<div class="modal fade-scale modal1" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style='background-color: #fff0;'>
      <div class="modal-header" style='border-bottom:none'>
       
        <button style='float:right;' type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style='color:white'>&times;</span></button>
        
      </div>
      <div class="modal-body" style='border-bottom:none'>
      <div class="contact-form-success">
        <h3>Thank you for contacting us.</h3>
        <p>
            You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.
        </p>
    </div>
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
         
         
         //add contact us details
            $("form#add-contact").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#sendQ").attr("disabled", true);
$("#sendQ").html("<i class='fa fa-circle-o-notch fa-spin'></i> Sending..");
   $.ajax({
        url:'create_contact_us',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {

                if(data.type=="error"){
                      $("#msg-lr").html(data.message);
                     $("#msg-lr").css("color","red");
                  $("#msg-lr").fadeIn();
                  $('#sendQ').attr("disabled", false);
                        $('#sendQ').val("Send Message");
                     
                }else{
                    
                      
                            $("#myModal").modal("show");
                         $('#add-contact').trigger("reset");
                        
                }
                  $("#sendQ").attr("disabled", false);
                  $("#sendQ").html('Send Message');
          
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