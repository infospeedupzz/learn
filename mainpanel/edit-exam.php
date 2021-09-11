<?php include("layout/session.php"); 
  
           $result=$functionClass->getRowsByID("exam"," id ",$_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Title -->
   <title>Edit Exam</title>
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
                                 <h3>Edit Exam</h3>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="seipkon-breadcromb-right">
                                 <ul>
                                    <li><a href="/">home</a></li>
                                    <li>Exam</li>
                                    <li>Edit Exam</li>
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
                           <h3>Update Exam</h3>
                           <div class="form-validation-box">
                              <div class="form-wrap">
                                 <form data-parsley-validate id="mForm">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">Title:</label>
                                             <input type='hidden' name='id' value="<?php echo $result[0]['id'];?>">
                                             <input type="text" name="title" placeholder="Enter Exam Title" class="form-control" required value="<?php echo $result[0]['title']; ?>">
                                          </div>
                                       </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                             <label class="control-label">name:</label>
                                             <input type="text" name="name" placeholder="Enter Exam name" class="form-control" required value="<?php echo $result[0]['name']; ?>">
                                          </div>
                                       </div>
                                    </div>
                                     <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>Overview</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#overview1" role="button" aria-expanded="true" aria-controls="overview1"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse in" id="overview1" aria-expanded="true" style="">
                                                    <textarea rows="5" cols="5" name="overview" id="overview" class="form-control" placeholder="Textarea"><?php echo $result[0]['overview']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div> 
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>Exam Dates</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#exam_date1" role="button" aria-expanded="true" aria-controls="exam_date1"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse in" id="exam_date1" aria-expanded="true" style="">
                                                    <textarea rows="5" cols="5" name="exam_date" id="exam_date" class="form-control" placeholder="Textarea"><?php echo $result[0]['exam_date']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div> 
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>Eligibility Criteria</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#eligibility_criteria1" role="button" aria-expanded="true" aria-controls="eligibility_criteria1"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse in" id="eligibility_criteria1" aria-expanded="true" style="">
                                                    <textarea rows="5" cols="5" name="eligibility_criteria" id="eligibility_criteria" class="form-control" placeholder="Textarea"><?php echo $result[0]['eligibility_criteria']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div> 
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>Exam Pattern</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#exam_pattern1" role="button" aria-expanded="true" aria-controls="exam_pattern1"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse in" id="exam_pattern1" aria-expanded="true" style="">
                                                    <textarea rows="5" cols="5" name="exam_pattern" id="exam_pattern" class="form-control" placeholder="Textarea"><?php echo $result[0]['exam_pattern']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>Syllabus</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#syllabus1" role="button" aria-expanded="true" aria-controls="syllabus1"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse in" id="syllabus1" aria-expanded="true" style="">
                                                    <textarea rows="5" cols="5" name="syllabus" id="syllabus" class="form-control" placeholder="Textarea"><?php echo $result[0]['syllabus']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>
                                        <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>Cut Off</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#cut_off1" role="button" aria-expanded="true" aria-controls="cut_off1"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse in" id="cut_off1" aria-expanded="true" style="">
                                                    <textarea rows="5" cols="5" name="cut_off" id="cut_off" class="form-control" placeholder="Textarea"><?php echo $result[0]['cut_off']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>

                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="form-layout-submit">
                                                      <button id="submitBtn" type="submit" class="btn btn-info">Update</button>
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
    <script src="ckeditor/ckeditor.js"></script>
   <script src="assets/js/seipkon.js"></script>
  
   <script type="text/javascript">
    CKEDITOR.replace( 'overview', {
   height: 500,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 }); 
 CKEDITOR.replace( 'exam_date', {
   height: 500,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });CKEDITOR.replace( 'eligibility_criteria', {
   height: 500,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });CKEDITOR.replace( 'exam_pattern', {
   height: 500,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });CKEDITOR.replace( 'syllabus', {
   height: 500,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });CKEDITOR.replace( 'cut_off', {
   height: 500,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });
      

   
     

      //send form data using jquery and ajax
      $("form#mForm").submit(function(e) {

         e.preventDefault();
         var formData = new FormData(this);
         $("#submitBtn").attr("disabled", true);
         $("#submitBtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> Updating..");
         $.ajax({
            url: 'update_exam',
            type: 'POST',
            data: formData,
           // dataType: "json",
            success: function(data) {
                alert(data);    
               if(data.type!='requied'){
                  if (data.type == 'error') {
                  swal("Failed", data.message);
                  $('#submitBtn').attr("disabled", false);
                  $('#submitBtn').html("Update");

                  } else {
                     swal("Success", data.message, "success");
                  }
               }
               
               $("#submitBtn").attr("disabled", false);
               $("#submitBtn").html('Update');

            },
            cache: false,
            contentType: false,
            processData: false
         });
      });
   </script>
</body>

</html>