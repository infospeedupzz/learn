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
   <title>Add Mock</title>
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
                                 <h3>Add Mock</h3>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="seipkon-breadcromb-right">
                                 <ul>
                                    <li><a href="/">home</a></li>
                                    <li>Mock</li>
                                    <li>Add Mock</li>
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
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Title:</label>
                                             <input type="text" name="title" placeholder="Enter Mock Title" class="form-control" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Course:</label>
                                             <div id="slWrapper" class="parsley-select wd-250"> 
                                                <select name="course_id" class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>

                                                   <option label="Choose one"></option>
                                                   <?php
                                                   $courseData = $functionClass->getRows("course");
                                                   foreach ($courseData as $rowC) { ?>
                                                      <option value="<?php echo $rowC['id']; ?>"><?php echo $rowC['name']; ?></option>
                                                   <?php } ?>
                                                </select>
                                                <div id="slErrorContainer"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Name:</label>
                                             <input type="text" name="name" placeholder="Enter mock name" class="form-control" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Package</label>
                                             <select name="package_id[]" class="form-control select2" name="" multiple="multiple" data-placeholder="Select">
                                                <option value="">Choose one</option>
                                                <?php
                                                $packageData = $functionClass->getRows("mock_packages");
                                                foreach ($packageData as $rowP) { ?>
                                                   <option value="<?php echo $rowP['id']; ?>"><?php echo $rowP['title'] ?></option>
                                                <?php } ?>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">

                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Questions:</label>
                                             <input type="number" name="questions" placeholder="Mock Questions" class="form-control" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Max Time:</label>
                                             <input type="text" name="max_time" placeholder="Mock time" class="form-control" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">

                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Marks:</label>
                                             <input type="number" name="marks" placeholder="Mock marks" class="form-control" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Price:</label>
                                             <input type="text" name="price" placeholder="Mock Price" class="form-control" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">

                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Skip:</label>
                                             <select class="form-control" name="can_skip">
                                                <option value="True">Yes</option>
                                                <option value="False">No</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Duration:</label>
                                             <input type="number" name="duration" placeholder="Mock Duration" class="form-control" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Status:</label>
                                             <div id="slWrapper"  class="parsley-select wd-250">
                                                <select name="status" class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required>
                                                   <option value="Free">Free</option>
                                                   <option value="Paid">Paid</option>
                                                </select>
                                                <div id="slErrorContainer"></div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Publish:</label>
                                             <div id="slWrapper1" class="parsley-select wd-250">
                                                <select name="publish" class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper1" data-parsley-errors-container="#slErrorContainer" required>
                                                   <option value="True">Yes</option>
                                                   <option value="False">No</option>
                                                </select>
                                                <div id="slErrorContainer"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                                <div class="from-group">
                                                <label class="control-label">Icon:</label>
                                                <input type="file" name="img" accept="image/*" >
                                                </div>      
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Language:</label>
                                             <select class="form-control" name="language">
                                                <option value="English">English</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Both">Both</option>
                                             </select>
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
      function previewFile(input) {
         var file = $("input[type=file]").get(0).files[0];

         if (file) {
            var reader = new FileReader();

            reader.onload = function() {
               $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
         }
      }

      //send form data using jquery and ajax
      $("form#mForm").submit(function(e) {

         e.preventDefault();
         var formData = new FormData(this);
         $("#submitBtn").attr("disabled", true);
         $("#submitBtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> saving..");
         $.ajax({
            url: 'create-mock',
            type: 'POST',
            data: formData,
            dataType: "json",
            success: function(data) {
               if(data.type!='requied'){
                  if (data.type == 'error') {
                  swal("Failed", data.message);
                  $('#submitBtn').attr("disabled", false);
                  $('#submitBtn').val("Save");

                  } else {
                     swal("Success", data.message, "success");
                  }
               }
               
               $("#submitBtn").attr("disabled", false);
               $("#submitBtn").html('Save');

            },
            cache: false,
            contentType: false,
            processData: false
         });
      });
   </script>
</body>

</html>