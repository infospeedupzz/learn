<?php include("layout/session.php"); 
  
           $resultM=$functionClass->getRowsByID("mock_questions"," id ",$_GET['id']);
           $result=$functionClass->getRowsByID("mock"," id ",$resultM[0]['mock_id']);
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
   <title>Edit Mock Questions</title>
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
      <style type="text/css">
         .correct{
                border: 1px solid #eee5e5;
                padding: 13px;
                text-align: center;
                cursor: pointer;
         }
      </style>
</head>

<body>


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
                                 <h3>Edit Mock Questions</h3>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="seipkon-breadcromb-right">
                                 <ul>
                                    <li><a href="/">home</a></li>
                                    <li>Mock</li>
                                    <li>Edit Mock Questions</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End Breadcromb Row -->

               <!-- Add Product Area Start -->
                   
                  <!-- Mail Compose Row Start -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">
                             <div class="form-validation-box">
                              <div class="form-wrap">
                                 <form data-parsley-validate id="mForm">
                           <div class="row">
                              <div class="col-md-3 col-sm-4">
                                 <div class="mailbox-left">
                                    <a class="btn btn-success" href="#">
                                    <i class="fa fa-info"></i>
                                    Questions entry options
                                    </a>
                                    <div class="mail-sidebar">
                                     <div class="form-group">
                                             <label class="control-label">Course:</label>
                                             <div id="slWrapper" class="parsley-select wd-250"> 
                                                <select name="course_id" id="course_id" class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" required onchange="setData(this.value)">

                                                   <option label="Choose one"></option>
                                                   <?php
                                                   $courseData = $functionClass->getRows("course");
                                                   foreach ($courseData as $rowC) { ?>
                                                      <option <?php if($result[0]['course_id']==$rowC['id']){ echo 'selected';} ?> value="<?php echo $rowC['id']; ?>"><?php echo $rowC['name']; ?></option>
                                                   <?php } ?>
                                                </select>
                                                <div id="slErrorContainer"></div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">Subject:</label>
                                             <div id="slWrapper1" class="parsley-select wd-250"> 
                                                <select name="subject_id" id="subject_id" class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper1" data-parsley-errors-container="#slErrorContainer1" required>

                                                   <option label="Choose one"></option>
                                                   
                                                </select>
                                                <div id="slErrorContainer1"></div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label">Mock:</label>
                                             <div id="slWrapper2" class="parsley-select wd-250"> 
                                                <select name="mock_id" id="mock_id" class="form-control" data-placeholder="Choose one" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" required>

                                                   <option label="Choose one"></option>
                                                  
                                                </select>
                                                <div id="slErrorContainer2"></div>
                                             </div>
                                          </div>
                                           <div class="form-group">
                                             <label class="control-label">Language:</label>
                                             <select class="form-control" name="language">
                                                <option <?php if($resultM[0]['language']=='English'){ echo "selected";} ?> value="English">English</option>
                                                <option <?php if($resultM[0]['language']=='Hindi'){ echo "selected";} ?> value="Hindi">Hindi</option>
                                             </select>
                                          </div>

                                    </div>
                                 </div>
                                   <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>Details</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#notes" role="button" aria-expanded="false" aria-controls="notes"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse" id="notes" aria-expanded="false" style="">
                                                    <textarea rows="5" cols="5" name="details" id="details" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['details']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>
                                         <div class="row">
                                          <div class="col-md-12">
                                             <div class="widget_card_two alert">
                                                <div class="widget_card_header">
                                                   <h3>description</h3>
                                                   <ul>
                                                      <li>
                                                         <a class="widget_card_accordion" data-toggle="collapse" href="#notes1" role="button" aria-expanded="false" aria-controls="notes1"></a>
                                                      </li>
                                                      
                                                   </ul>
                                                </div>
                                                <div class="widget_card_body collapse" id="notes1" aria-expanded="false" style="">
                                                    <textarea rows="5" cols="5" name="description" id="description" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['description']; ?></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          
                                       </div>
                              </div>
                              <div class="col-md-9 col-sm-8">
                                 <div class="mail-editor compose-page">
                                 
                                        <a class="btn btn-success" href="#">
                                    <i class="fa fa-info"></i>
                                    Questions Details
                                    </a>
                                       
                                       <textarea rows="5" cols="5" name="question" id="question" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['question']; ?></textarea>

                                       <div class="row">
                                          <div class="col-md-1">
                                             <div class="form-group">
                                                <label class="control-label">CORRECT</label>
                                               
                                             </div>
                                          </div>
                                          <div class="col-md-11">
                                             <div class="form-group">
                                                <label class="control-label">QUESTION OPTION</label>
                                               
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-1">
                                           <div class="form-group form-radio correct" >
                                          <input id="radio-1" name="answer" type="radio" value="1" <?php if($resultM[0]['option1']==
                                       $resultM[0]['answer']){ echo "checked"; } ?> required>
                                          <label for="radio-1" class="inline control-label">A</label>
                                       </div>
                                          </div>
                                          <div class="col-md-11">
                                             <div class="form-group">
                                                 <textarea rows="5" cols="5" name="option1" id="option1" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['option1']; ?></textarea>

                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-1">
                                           <div class="form-group form-radio correct">
                                          <input id="radio-2" name="answer" type="radio" value="2" <?php if($resultM[0]['option2']==
                                       $resultM[0]['answer']){ echo "checked" ;} ?> required>
                                          <label for="radio-2" class="inline control-label">B</label>
                                       </div>
                                          </div>
                                          <div class="col-md-11">
                                             <div class="form-group">
                                                <textarea rows="5" cols="5" name="option2" id="option2" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['option2']; ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-1">
                                           <div class="form-group form-radio correct">
                                          <input id="radio-3" name="answer" type="radio" <?php if($resultM[0]['option3']==
                                       $resultM[0]['answer']){ echo "checked";} ?> value="3" required>
                                          <label for="radio-3" class="inline control-label">C</label>
                                       </div>
                                          </div>
                                          <div class="col-md-11">
                                             <div class="form-group">
                                                <textarea rows="5" cols="5" name="option3" id="option3" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['option3']; ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-1">
                                           <div class="form-group form-radio correct">
                                          <input id="radio-4" name="answer" type="radio" <?php if($resultM[0]['option4']==
                                       $resultM[0]['answer']){ echo "checked";} ?> value="4" required>
                                          <label for="radio-4" class="inline control-label">D</label>
                                       </div>
                                          </div>
                                          <div class="col-md-11">
                                             <div class="form-group">
                                                <textarea rows="5" cols="5" name="option4" id="option4" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['option4']; ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-1">
                                           <div class="form-group form-radio correct">
                                          <input id="radio-5"  name="answer" type="radio" <?php if($resultM[0]['option5']==
                                       $resultM[0]['answer']){ echo "checked";} ?> value="5" required="">
                                          <label for="radio-5" class="inline control-label">E</label>
                                       </div>
                                          </div>
                                          <div class="col-md-11">
                                             <div class="form-group">
                                                 <textarea rows="5" cols="5" name="option5" id="option5" class="form-control" placeholder="Textarea"><?php echo $resultM[0]['option5']; ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                     


                                       <p style="text-align: end;">
                                          <button type="submit" id="submitBtn"  class="btn btn-success" > <i class="fa fa-save"></i>Save</button>
                                     
                                          <button type="reset" class="btn btn-danger" > <i class="fa fa-trash-o"></i>delete</button>
                                       </p>
                                       
                                 
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
                  <!-- End Mail Compose Row -->
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
<script src="ckeditor/ckeditor.js"></script>
   <!-- Custom JS -->
   <script src="assets/js/seipkon.js"></script>
   <script type="text/javascript">

           CKEDITOR.replace( 'question', {
   height: 150,

  filebrowserUploadUrl: "ck_upload"
 });  
           CKEDITOR.replace( 'option1', {
   height: 100,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });
        CKEDITOR.replace( 'option2', {
   height: 100,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });     

CKEDITOR.replace( 'option3', {
   height: 100,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });     
CKEDITOR.replace( 'option4', {
   height: 100,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });     
CKEDITOR.replace( 'option5', {
   height: 100,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });  
   CKEDITOR.replace( 'details', {
   height: 100,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });   
  CKEDITOR.replace( 'description', {
   height: 100,
   extraPlugins: 'colorbutton,colordialog',
  filebrowserUploadUrl: "ck_upload"
 });     

 
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
            url: 'create-mock-question',
            type: 'POST',
            data: formData,
            dataType: "json",
            success: function(data) {
                $('#submitBtn').attr("disabled", false);
                  $('#submitBtn').html("<i class='fa fa-save'></i> Save");
               if(data.type!='requied'){
                  if (data.type == 'error') {
                  swal("Failed", data.message);
                  

                  } else {
                     swal("Success", data.message, "success");

                  }
               }else{
                       swal("Warning", data.message);
                  
               }
               
               
             

            },
            cache: false,
            contentType: false,
            processData: false
         });
      });


      function setData(id){
           $.ajax({
                url: "getData",
                type: "post",
                dataType: "json",
                data:  {'table':'subject','id':id,'by':'course_id'},
                success: function (data) {
                 var tex="";
                    for(var i=0;i<data.length;i++){
                      tex=tex+"<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
                    }
                    $("#subject_id").html(tex);
                    getMock(id);
                   
                }
            });
      }
      var x=0;
      function getMock(id){
          $.ajax({
                url: "getData",
                type: "post",
                dataType: "json",
                data:  {'table':'mock','id':id,'by':'course_id'},
                success: function (data) {
                 var tex="";
                    for(var i=0;i<data.length;i++){
                      tex=tex+"<option value='"+data[i]['id']+"'>"+data[i]['title']+"</option>";
                    }
                    $("#mock_id").html(tex);
                   if(x==0){
                     $("#subject_id").val('<?php echo $resultM[0]["subject_id"]; ?>');
                     $("#mock_id").val('<?php echo $resultM[0]["mock_id"]; ?>');
                     x++;
                   }
                }
            });
      }
      function setData1(){
         var id=$("#course_id").val();
        
         setData(id);
         
      }
      setData1();
   </script>
</body>

</html>