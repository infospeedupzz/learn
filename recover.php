<?php include("layout/session.php"); 
if(!empty($userInfo)){

    echo"<script>window.location.href='/'</script>";
    die();
}

if(isset($_GET['from'])){
    $redriect_url=$_GET['from']."&n=".$_GET['n'];
}else{
    $redriect_url="/";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head> 
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Reset Password!</title>
        <meta name="description" content="">
              <?php include("layout/head.php"); ?>
    </head>
    <body class="defult-home">
        
        <!--Preloader area start here-->
        <?php include("layout/preloader.php"); ?>
        <!--Preloader area End here-->

        <!--Full width header Start-->
               <?php include("layout/header.php"); ?>
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
            <!-- Breadcrumbs Start -->
                

    		<!-- My Account Section Start -->
    		<section class="recover-area section--padding gray-bg" style='padding-top:10px;'>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-title">
                        <h3 class="widget-title font-size-25 pb-2">Reset Password!</h3>
                        <p class="line-height-26">
                            Enter the email of your account to reset password.
                            Then you will receive a password to email to reset the
                            password.If you have any issue about reset password <a href="#" class="primary-color-2">contact us</a>
                        </p>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="post" id="resetPass">
                                  <span style="color: red;" id="msg-lrpr"> </span>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                                                <span class="la la-envelope input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button class="theme-btn" type="submit" id='resetPassbtn'>reset password</button>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-6">
                                        <p><a href="#" data-toggle="modal" data-target="#loginModal" class="primary-color-2">Login</a></p>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <p class="text-right register-text">Not a member? <a href="#" data-toggle="modal" data-target="#regModal" class="primary-color-2">Register</a></p>
                                    </div><!-- end col-lg-6 -->
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form -->
                    </div>
                </div>
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
            <!-- My Account Section End -->  

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
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="assets/js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="assets/js/jquery.nav.js"></script>
        <!-- wow js -->
        <script src="assets/js/wow.min.js"></script>     
        <!-- plugins js -->
        <script src="assets/js/plugins.js"></script>
        <!-- magnific popup js -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>  
        <!-- contact form js -->
        <script src="assets/js/loginform.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>
        <script>
            $("form#resetPass").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#resetPassbtn").attr("disabled", true);
$("#resetPassbtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> Sending..");
   $.ajax({
        url:'resetpasswordbyEmail',
        type: 'POST',
        data: formData,
      dataType: "json",
        success: function (data) {

                if(data.type=="error"){
                      $("#msg-lrpr").html(data.message);
                     $("#msg-lrpr").css("color","red");
                  $("#msg-lrpr").fadeIn();
                  $('#resetPassbtn').attr("disabled", false);
                        $('#resetPassbtn').val("recover password");
                     
                }else{
                    
                       $("#msg-lrpr").html(data.message);
                        $("#msg-lrpr").css("color","green");
                          $("#msg-lrpr").fadeIn();
                         
                }
                  $("#resetPassbtn").attr("disabled", false);
                  $("#resetPassbtn").html('recover password');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 
        </script>
    </body>
</html>