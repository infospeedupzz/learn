<?php include("layout/session.php"); 
if(!empty($userInfo)){

    echo"<script>window.location.href='/'</script>";
    die();
}

if(isset($_GET['from'])){
    $redriect_url=$_GET['from'];
}else{
    $redriect_url="/";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head> 
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Login</title>
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
    		<div class="rs-login pt-10 pb-100 md-pt-10 md-pb-70 gray-bg">
                <div class="container">
                    <div class="noticed">
                        <div class="main-part">                           
                            <div class="method-account">
                                <h2 class="login">Login</h2>
                                <span style="color: red;" id="msg-l1"> </span>
                                <form action="#" method="post" id='user-login1'>
                                    <input type="test mb-30" name="username" placeholder="Mobile or Email" required="">
                                    <input type="password" name="loginpass" placeholder="Password" required="">
                                    <button type="submit" id='loginBtn1' class="readon submit-btn">login</button>
                                    <div class="row">
                                                   <div class=" border-bottom" style="width: 40%;display: inline-block;"   ></div>
                                                   <div style=" width: 20%; display: inline-block; text-align: center;position: relative; top: 11px;color: #c7c7c7;
                            font-size: 12px;">OR</div>
                                        
                                        <div class="border-bottom" style="width: 40%;display: inline-block;"></div>
                                        </div>
                                                             <div class="row">
                                            <div class='col-md-6'>
                                                <a href='<?php echo $fbloginURL; ?>' class='btn btn-primary fb-btn'><i class='fa fa-facebook-square' style='padding: 2px 6px;float:left;    font-size: 18px;'></i><span style='    margin-left: -10px;color:white;'>Facebook</span></a>
                                            </div>
                                              <div class='col-md-6' style='color: white;'>
                                                        <?php echo $glogin_button; ?>
                                            </div>
                                        </div>
                                    <div class="last-password" style='margin-top: 10px;'>
                                        <p>Not registered? <a href="#" data-toggle="modal" data-target="#regModal">Create an account</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            $("form#user-login1").submit(function(e) {
        
    e.preventDefault();    
    var formData = new FormData(this);
$("#loginBtn1").attr("disabled", true);
$("#loginBtn1").html("<i class='fa fa-circle-o-notch fa-spin'></i> Checking..");
   $.ajax({
        url:'users/userlogin',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {
               
                if(data.type=="error"){
                      $("#msg-l1").html(data.message);
                     $("#msg-l1").css("color","red");
                  $("#msg-l1").fadeIn();
                  $('#loginBtn1').attr("disabled", false);
                        $('#loginBtn1').val("Login");
                     
                }else{
                    
                       $("#msg-l1").html(data.message);
                        $("#msg-l1").css("color","green");
                          $("#msg-l1").fadeIn();
                          window.location.href="<?php echo $redriect_url; ?>"; 
                }
                  $("#loginBtn1").attr("disabled", false);
                  $("#loginBtn1").html('Login');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 
        </script>
    </body>
</html>