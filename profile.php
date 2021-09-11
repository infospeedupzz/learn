<?php include('layout/session.php'); 
if(empty($userInfo)){
    echo"<script>window.location.href='/'</script>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head> 
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Profile</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <?php include("layout/head.php"); ?>
    <link rel="stylesheet" href="lesson-detail/css/jquery.filer.css">
        <style>
     
      
        .qloader-div{
            display:none;
            position: absolute;
            background: #a3a3a457;
            width: 94%;
            text-align: center;
            height: 100%;
            padding-top: 100px;
        }
        .qloader{
            width:60px!important;
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
                   <div class="container" >
                        <ul>
                        <li style="    display: inline-block; ">
                            <a style='color:white' class="active" href="/">Home</a>
                        </li> 
                        <li style="    display: inline-block;">
                            &gt; <a style='color:white' class="active" href="#">>Profile </a>
                        </li> 
                     
                    </ul>
                    <div class="section-heading ">
                        <h2 class="section__title text-white">Your Profile</h2>
                    </div>
                    </div>
                </div><!-- end breadcrumb-content -->
            <!-- Intro Courses -->
            <section class="intro-section gray-bg pt-20 pb-100 md-pt-64 md-pb-70">
                <div class="container">
                          
              
                    
                    <div class="container-fluid bg-white p-5" >
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-block"></div>
                </div>
            </div>
           
            <div class="row mt-1">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <div class="card-box-shared-title">
                            <h3 class="widget-title">Settings info</h3>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="section-tab section-tab-2">
                                <ul class="nav nav-tabs" role="tablist" id="review">
                                    <li role="presentation">
                                        <a href="#profile" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                            Profile
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#password" role="tab" data-toggle="tab" aria-selected="false" class="">
                                             Password
                                        </a>
                                    </li>
                                   
                                     <li role="presentation">
                                        <a href="#exam" role="tab" data-toggle="tab" aria-selected="false" class="">
                                            Your Exam
                                        </a>
                                    </li>
                                  
                                </ul>
                            </div>
                            <div class="dashboard-tab-content mt-5">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active show" id="profile">
                                        <div class="user-form">
                                            <form action="#" method="post" id='user-edit' enctype="multipart/form-data">
                                                             <span style="color: red;" id="msg-lr"> </span>
                                        
                                            <div class="contact-form-action">
                                                 
                                                        
                                           
                                                    <div class="row">
                                                        
                                                        <div class="col-lg-6 col-sm-6">
                                                                <div class="user-profile-action-wrap mb-5">
                                                <h3 class="widget-title font-size-18 padding-bottom-10px">Profile Settings</h3>
                                                <div class="user-profile-action d-flex align-items-center">
                                                    <div class="user-pro-img">
                                                        
                                    <?php if(!empty($userInfo[0]['profile_pic'])){?>
                                                            <img id="blah"  src="<?php echo $userInfo[0]['profile_pic']; ?>" alt="user-image" class="img-fluid radius-round border">
                                                            <?php }else{ ?>
                                                             <img id="blah" src="assets/images/useravtar.png" alt="user-image" class="img-fluid radius-round border">   
                                                             <?php } 
                                        ?>
                                                     
                                                    </div>
                                                    <div class="upload-btn-box course-photo-btn">
                                     
                                                       <div class="form-group">
                                                                 <label for="img">Profile Picture</label>
                                                                 <input type="file"  class="form-control" name="img" id="img" accept="image/*">
                                                                 <input type="hidden" name="oldImage" value="<?php echo $userInfo[0]['profile_pic']; ?>">
                                                            </div>
                                                     
                                                        <p>Max file size is 5MB,  Suitable files are .jpg &amp; .png</p>
                                                        
                                                    </div>
                                                </div><!-- end user-profile-action -->
                                            </div><!-- end user-profile-action-wrap -->
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Full Name<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Full Name" value="<?php echo $userInfo[0]['fullname']; ?>">
                                                                    <span class="fa fa-user input-icon"></span>
                                                                </div>
                                                            </div>
                                                            
                                                             <div class="input-box">
                                                                <label class="label-text">Email<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" disabled name="email" id="email" placeholder="Email" value="<?php echo $userInfo[0]['email']; ?>">
                                                                    <span class="fa fa-envelope input-icon"></span>
                                                                </div>
                                                            </div>
                                                            <div class="input-box">
                                                                <label class="label-text">Phone Number<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Mobile No." value="<?php echo $userInfo[0]['mobile']; ?>">
                                                                    <span class="fa fa-phone input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button class="theme-btn" type="submit" id='saveEdit'>save changes</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div><!-- end row -->
                                               
                                            </div>
                                             </form>
                                        </div>
                                    </div><!-- end tab-pane-->
                                    <div role="tabpanel" class="tab-pane fade" id="password">
                                        <div class="user-form padding-bottom-10px">
                                            <div class="user-profile-action-wrap">
                                                <h3 class="widget-title font-size-18 padding-bottom-40px">Change Password</h3>
                                            </div><!-- end user-profile-action-wrap -->
                                            <div class="contact-form-action">
                                                 
                                          
                                                <form method="post" action="" id='change-pass'>
                                                <span style="color: red;" id="msg-lrp"> </span>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">Old Password<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="oldpass" id='oldpass' required placeholder="Old password">
                                                                    <span class="fa fa-lock input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">New Password<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="newpass" id='newpass' required placeholder="New password">
                                                                    <span class="fa fa-lock input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-4 col-sm-4">
                                                            <div class="input-box">
                                                                <label class="label-text">Confirm New Password<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="text" name="confirmpass" id='confirmpass' required placeholder="Confirm new password">
                                                                    <span class="fa fa-lock input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-4 -->
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button class="theme-btn" type="submit" id='passEdit'>Change password</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div><!-- end row -->
                                                </form>
                                            </div>
                                        </div>
                                        <div class="section-block"></div>
                                        <div class="user-form padding-top-10px">
                                            <div class="user-profile-action-wrap padding-bottom-20px">
                                                <h3 class="widget-title font-size-18 padding-bottom-10px">Forgot Password then Recover Password</h3>
                                                <p class="line-height-26">Enter the email of your account to reset password. Then you will receive a password to email
                                                    <br> to reset the password.If you have any issue about reset password <a href="#" class="primary-color-2">contact us</a></p>
                                            </div><!-- end user-profile-action-wrap -->
                                            <div class="contact-form-action">
                                                <form method="post" id='resetPass'>
                                                    <span style="color: red;" id="msg-lrpr"> </span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="input-box">
                                                                <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                                                                    <span class="fa fa-envelope input-icon"></span>
                                                                </div>
                                                            </div>
                                                        </div><!-- end col-lg-6 -->
                                                        <div class="col-lg-12">
                                                            <div class="btn-box">
                                                                <button class="theme-btn" type="submit" id='resetPassbtn'>recover password</button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div><!-- end row -->
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- end tab-pane-->
                                  
                                    <div role="tabpanel" class="tab-pane fade" id="exam">
                                        <div class="user-profile-action-wrap">
                                            <h3 class="widget-title font-size-18 padding-bottom-10px">Your Exam</h3>
                                        </div><!-- end user-profile-action-wrap -->
                                        <div class="withdraw-method-wrap"> 
                                        <div class="table-responsive">
                                        <table class="table nowrap" style='white-space: nowrap;'>
                                                                     <tr>
                                                                         <th>Mock</th>
                                                                         <th>Purchage Date </th>
                                                                         <th>Expiry Date </th>
                                                                     </tr>
                                                        <?php    $conArrP= array(
                                                                "user_id" => $userInfo[0]['id']
                                                            );
                                                            $resultP = $functionClass->getRowsByWhere("mock_purchages", "user_id=:user_id", $conArrP);
                                                            foreach($resultP as $rowP){
                                                                  $conArrM= array(
                                                                    "mock_id" => $rowP['mock_id']
                                                                );
                                                                 $resultM = $functionClass->getRowsByWhere("mock", "id=:mock_id", $conArrM);
                                                                $chk=1;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $resultM[0]['title']; ?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($rowP['date'])); ?></td>
                                                                <td><?php echo date("d-m-Y",strtotime($rowP['expiry_date'])); ?></td>
                                                            </tr>
                                                            
                                                                  
                                                           
                                                           
                                                            <?php } ?>
                                                               </table>
                                                               </div>
                                                               </div>
                                        
                                    </div><!-- end tab-pane-->
                                   
                                </div><!-- end tab-content -->
                            </div><!-- end dashboard-tab-content -->
                        </div>
                    </div><!-- end card-box-shared -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
           
        </div>
                                 
                </div>
            </section>
            <!-- End intro Courses -->

   
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
      <script src="lesson-detail/js/popper.min.js"></script>
        <script src="lesson-detail/js/bootstrap.min.js"></script>
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
        <script src="lesson-detail/js/jquery.filer.min.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>
          <script>
    $("#editBtn").click(function(){
        $("#profile-view").fadeOut();
        $("#edit-view").fadeIn();
    });  
    $("#saveCancel").click(function(){
        $("#profile-view").fadeIn();
        $("#edit-view").fadeOut();
    });
    
    //edit data
      $("form#user-edit").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#saveEdit").attr("disabled", true);
$("#saveEdit").html("<i class='fa fa-circle-o-notch fa-spin'></i> Updating..");
   $.ajax({
        url:'update-profile',
        type: 'POST',
        data: formData,
       dataType: "json",
        success: function (data) {
          
                if(data.type=="error"){
                      $("#msg-lr").html(data.message);
                     $("#msg-lr").css("color","red");
                  $("#msg-lr").fadeIn();
                  $('#saveEdit').attr("disabled", false);
                        $('#saveEdit').val("Save");
                     
                }else{
                    
                       $("#msg-lr").html(data.message);
                        $("#msg-lr").css("color","green");
                          $("#msg-lr").fadeIn();
                         window.location.href=""; 
                }
                  $("#saveEdit").attr("disabled", false);
                  $("#saveEdit").html('Save');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 
    //edit data end
    //edit data
      $("form#change-pass").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#passEdit").attr("disabled", true);
$("#passEdit").html("<i class='fa fa-circle-o-notch fa-spin'></i> Updating..");
   $.ajax({
        url:'updatepassword',
        type: 'POST',
        data: formData,
       dataType: "json",
        success: function (data) {
     
                if(data.type=="error"){
                      $("#msg-lrp").html(data.message);
                     $("#msg-lrp").css("color","red");
                  $("#msg-lrp").fadeIn();
                  $('#passEdit').attr("disabled", false);
                        $('#passEdit').val("Update");
                     
                }else{
                    
                       $("#msg-lrp").html(data.message);
                        $("#msg-lrp").css("color","green");
                          $("#msg-lrp").fadeIn();
                         window.location.href=""; 
                }
                  $("#passEdit").attr("disabled", false);
                  $("#passEdit").html('Update');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
});  
//edit data
      $("form#resetPass").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#resetPassbtn").attr("disabled", true);
$("#resetPassbtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> Sending..");
   $.ajax({
        url:'resetsendMail',
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
    //edit data end
    
           function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#img").change(function() {
  readURL(this);
});
                                     

        </script>
    </body>
</html>