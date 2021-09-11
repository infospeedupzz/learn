<?php include("layout/session.php"); ?>
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
   <title>Notification to all</title>
   <!-- Favicon -->
   <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
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
   <!-- Daterange CSS -->
   <link rel="stylesheet" href="assets/plugins/daterangepicker/css/daterangepicker.css">
   <!-- Toggles CSS -->
   <link rel="stylesheet" href="assets/plugins/jquery-toggle/css/toggles-full.css">
   <!-- Select2 CSS -->
   <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
   <!-- Color Picker CSS -->
   <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
   <!-- Main CSS -->
   <link rel="stylesheet" href="assets/css/seipkon.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="assets/css/responsive.css">
               <!-- Sweet Alerts CSS -->
      <link rel="stylesheet" href="assets/plugins/sweet-alerts/css/sweetalert.css">
</head>

<body>

   <!-- Start Page Loading -->
   <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
   </div>
   <!-- End Page Loading -->

   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Main Header Start -->
      <?php include("layout/header.php"); ?>
      <!-- Main Header End -->

      <!-- Sidebar Start -->
      <?php include("layout/sidebar.php"); ?>
      <!-- End Sidebar -->

      <!-- Right Side Content Start -->
      <section id="content" class="seipkon-content-wrapper">
         <div class="page-content">
            <div class="container-fluid">

               <!-- Breadcromb Row Start -->
               <div class="row">
                  <div class="col-md-12">
                     <div class="breadcromb-area">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="seipkon-breadcromb-left">
                                 <h3>Send Notification </h3>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="seipkon-breadcromb-right">
                                 <ul>
                                    <li><a href="/">home</a></li>>
                                    <li><a href="#">Send Notifiaction</a></li>>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Breadcromb Row -->

               <!-- Add Product Area Start -->
               <!-- Validation Form Row Start -->
               <div class="row">
                  <div class="col-md-12">
                     <div class="page-box">
                        <div class="form-example">
                           <h3>New Mock</h3>
                           <div class="form-validation-box">
                              <div class="form-wrap">
                                 <form data-parsley-validate id="mForm">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label class="control-label">Title:</label>
                                             <input type="text" name="title" placeholder="Enter  Title" class="form-control" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                        	<div class="form-group">
									  <label>Link</label>
									 <input type='text' name="link" class="form-control">
				</div>
				<div class="form-group">
									  <label>Image</label>
									 <input type='file' id="file" name="file"  class="form-control">
									 <input type='hidden' name="image" id="image" >
				</div>
				 <div class='preview'>
            <img src="" id="img" width="100" height="100">
        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                                <div class="from-group">
                                                <label class="control-label">Message:</label>
                                                <textarea class="form-control" id='message' name="body" placeholder="Message Here.."></textarea>
                                                </div>      
                                       </div>
                                    

                                    </div>

                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="form-layout-submit">
                                                      <button id="submitBtn" type="submit" class="btn btn-info">Save</button>
                                                      <button type="reset" class="btn btn-danger">cancel</button>
                                                   </div>
                                                </div>
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
               </div>
               <!-- End Validation Form Row -->
               <!-- End Add Product Area -->

            </div>
         </div>

         <!-- Footer Area Start -->
         <?php include("layout/footer.php"); ?>
         <!-- End Footer Area -->

      </section>
      <!-- End Right Side Content -->

   </div>
   <!-- End Wrapper -->


   <!-- jQuery -->
   <script src="assets/js/jquery-3.1.0.min.js"></script>
   <!-- Bootstrap JS -->
   <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
   <!-- Daterange JS -->
   <script src="assets/plugins/daterangepicker/js/moment.min.js"></script>
   <script src="assets/plugins/daterangepicker/js/daterangepicker.js"></script>
   <!-- Perfect Scrollbar JS -->
   <script src="assets/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js"></script>
   <!-- Masked Input JS -->
   <script src="assets/plugins/masked-input/js/jquery.maskedinput.min.js"></script>
   <!-- Select2 JS -->
   <script src="assets/plugins/select2/js/select2.full.js"></script>
   <!-- Color Picker JS -->
   <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
   <!-- Jquery parsley JS -->
   <script src="assets/plugins/parsley/js/parsley.min.js"></script>
   <!-- Jquery Knob JS -->

   <script src="assets/plugins/jquery-knob/js/jquery.knob.min.js"></script>
   <!-- Advance Component Form JS For Only This Page -->
   <script src="assets/js/advance_component_form.js"></script>
          <!-- Sweet Alerts JS -->
      <script src="assets/plugins/sweet-alerts/js/sweetalert.min.js"></script>
      <script src="assets/plugins/sweet-alerts/js/custom-sweetalerts.js"></script>
   <!-- Custom JS -->
   <script src="assets/js/seipkon.js"></script>
   <script type="text/javascript">
   
      //send form data using jquery and ajax
      $("form#mForm").submit(function(e) {

         e.preventDefault();
         var formData = new FormData(this);
         $("#submitBtn").attr("disabled", true);
         $("#submitBtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> Sending..");
         $.ajax({
            url: 'https://learnizy.in/Learnish/send_noti.php',
            type: 'POST',
            data: formData,
           // dataType: "json",
            success: function(data) {
               swal("Success", "Notification send successfully", "success");
               
               $("#submitBtn").attr("disabled", false);
               $("#submitBtn").html('Send');

            },
            cache: false,
            contentType: false,
            processData: false
         });
      });
      
$("#file").change(function(){
$("#submitBtn").attr("disabled", true);
        var fd = new FormData();
        var files = $('#file')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'uploadimage',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                  
                 if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                    $("#submitBtn").attr("disabled", false);
                    $("#image").val(response);
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
    });
   </script>
</body>

</html>