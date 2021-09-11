<?php ini_set('session.gc_maxlifetime', 2678400);
session_start();
if(isset($_SESSION['mainId'])){
    if(!empty($_SESSION['mainId'])){
  echo "<script> window.location.href='/mainpanel'</script>";
  die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Seipkon is a Premium Quality Admin Site Responsive Template" />
      <meta name="keywords" content="admin template, admin, admin dashboard, cms, Seipkon Admin, premium admin templates, responsive admin, panel, software, ui, web app, application" />
      <meta name="author" content="Themescare">
      <!-- Title -->
      <title>Login Learnizy</title>
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="https://learnizy.in/assets/images/fav.png">
      <!-- Animate CSS -->
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/plugins/bootstrap/bootstrap.min.css">
      <!-- Font awesome CSS -->
      <link rel="stylesheet" href="assets/plugins/font-awesome/font-awesome.min.css">
      <!-- Themify Icon CSS -->
      <link rel="stylesheet" href="assets/plugins/themify-icons/themify-icons.css">
      <!-- Perfect Scrollbar CSS -->
      <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="assets/css/seipkon.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="assets/css/responsive.css">
            <!-- Sweet Alerts CSS -->
      <link rel="stylesheet" href="assets/plugins/sweet-alerts/css/sweetalert.css">
   </head>
   <body class="body_white_bg">
       
      <!-- Start Page Loading -->
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!-- End Page Loading -->
       
      <!-- Login Page Header Area Start -->
      <div class="seipkon-login-page-header-area">
         <div class="container-fluid">
            
         </div>
      </div>
      <!-- Login Page Header Area End -->
       
      <!-- Login Form Start -->
      <div class="seipkon-login-form-area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 col-md-offset-4">
                  <div class="login-form-box">
                     <h3>Sign in to Seipkon</h3>
                     <form method="POST" id="loginForm" >
                        <div class="form-group">
                           <input type="text" name="username" placeholder="Username" class="form-control" required >
                        </div>
                        <div class="form-group">
                           <input type="password" name="password" placeholder="Password" class="form-control" required >
                        </div>
                        <div class="form-group form-checkbox">
                           <input type="checkbox" id="chk_2">
                           <label class="inline control-label" for="chk_2">Remember me</label>
                           <p class="lost-pass pull-right">
                              <a href="#">forget you password?</a>
                           </p>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-layout-submit">
                                    <button type="submit" id="loginBtn1" >Sign in</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Login Form End -->
       
      <!-- jQuery -->
      <script src="assets/js/jquery-3.1.0.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
      <!-- Perfect Scrollbar JS -->
      <script src="assets/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js"></script>
      <!-- Custom JS -->
      <script src="assets/js/seipkon.js"></script>

            <!-- Sweet Alerts JS -->
      <script src="assets/plugins/sweet-alerts/js/sweetalert.min.js"></script>
      <script src="assets/plugins/sweet-alerts/js/custom-sweetalerts.js"></script>
        
   </body>
<script>

       $("form#loginForm").submit(function(e) {
        
    e.preventDefault();    
    var formData = new FormData(this);
$("#loginBtn1").attr("disabled", true);
$("#loginBtn1").html("<i class='fa fa-circle-o-notch fa-spin'></i> Checking..");
   $.ajax({
        url:'user/login',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {

                if(data.type=='error'){
                    swal("Failed",data.message);
                    $('#loginBtn1').attr("disabled", false);
                    $('#loginBtn1').val("Sign in");
                     
                }else{
                    swal("Success",data.message,"success");
                         window.location.href="/mainpanel"; 
                }
                  $("#loginBtn1").attr("disabled", false);
                  $("#loginBtn1").html('Sign in');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 


</script>
</html>