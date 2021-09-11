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
      <title>Add Course</title>
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
                                    <h3>Add Course</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="/">home</a></li>
                                       <li>Course</li>
                                       <li>Add Course</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                  <!-- Add Product Area Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                           <div class="row">
                              <div class="form-wrap">
                               <form id="cForm">
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-form-group">
                                    <h3>Course Info</h3>
                                   
                                       <div class="row">
                                          <div class="col-md-12">
                                           <div class="form-group">

                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Course Name">
                                             </div>
                                          </div>
                                       </div>
                                          <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Back Color 1</label>
                                              <input type="text" name="color1" class=" form-control" id="cp1" />

                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Back Color 2</label>
                                                   <input type="text" name="color2" class="form-control" id="cp2" />
                                             </div>
                                          </div>
                                       </div>
                                       
                                     
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" name="price" placeholder="Enter Price">
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label>From Points</label>
                                                <input type="text" class="form-control" name="from_points" placeholder="Enter From Points">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Duration</label>
                                                <input type="number" name="duration" class="form-control" >
                                            </div>
                                          </div>
                                            <div class="col-md-6">
                                             <p>
                                                <label>Publish</label>
                                                <select class="form-control select2" name="publish[]" multiple="multiple" data-placeholder="Select">
                                                   <option value="Mock">Mock</option>
                                                   <option value="Paper">Paper</option>
                                                   <option value="Course">Course</option>
                                                   <option value="Quiz">Quiz</option>
                                                </select>
                                             </p>
                                          </div>
                                       </div>
                                       <br>
                                       <div class="row">
                                          <div class="col-md-12">
                                         <div class="form-group">
                                                <button id="submitBtn" type="submit" class="btn btn-success" >
                                                <i class="fa fa-check"></i>
                                                Save Info
                                                </button>
                                                <button type="reset" class="btn btn-danger" >
                                                <i class="fa fa-times"></i>
                                                Cancel
                                                </button>
                                             </div>
                                          </div>
                                       </div>
                                   
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="add-product-image-upload">
                                    <h3>Course Icon</h3>
                                  
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-image">
                                                <img id="previewImg" style="width: 100px;" src="https://img.icons8.com/plasticine/2x/image.png" alt="image" />
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="product-upload-action">
                                                <div class="product-upload btn btn-info">
                                                   <p>
                                                      <i class="fa fa-upload"></i>
                                                      Upload  Image
                                                   </p>
                                                   <input type="file" name="img" accept="image/*" onchange="previewFile(this);">
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
      <!-- Jquery Knob JS -->
      <script src="assets/plugins/jquery-knob/js/jquery.knob.min.js"></script>
      <!-- Advance Component Form JS For Only This Page -->
      <script src="assets/js/advance_component_form.js"></script>
      <!-- Custom JS -->
      <script src="assets/js/seipkon.js"></script>
<script type="text/javascript">
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }

//send form data using jquery and ajax
       $("form#cForm").submit(function(e) {
        
    e.preventDefault();    
    var formData = new FormData(this);
$("#submitBtn").attr("disabled", true);
$("#submitBtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> saving..");
   $.ajax({
        url:'create-course',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {
            alert(data);
                if(data.type=='error'){
                    swal("Failed",data.message);
                    $('#submitBtn').attr("disabled", false);
                    $('#submitBtn').val("Sign in");
                     
                }else{
                    swal("Success",data.message,"success");
                }
                  $("#submitBtn").attr("disabled", false);
                  $("#submitBtn").html('Sign in');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 


</script>
   </body>

</html>