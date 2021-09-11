<?php include("layout/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Title -->
      <title>All Exam || Learnizy</title>
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
                                    <h3>Exam List</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">home</a></li>
                                       <li>Exam</li>
                                       <li>Exam list</li>
                                       <li><a href="add-exam" style="float: right;" class="product-table-info " data-toggle="tooltip" title="Add"><i class="fa fa-plus"></i> New</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Breadcromb Row -->
                   
                  <!-- Product Table Row Start -->

                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-box">

                           <div class="table-responsive">
                              <table id="product-order" class="table table-hover">
                                 <thead>
                                    <tr>
                                       <th>Course</th>
                                       <th>Title</th>
                                       <th>Overview</th>
                                       <th>Exam Dates</th>
                                       <th>Eligibility Criteria</th>
                                       <th>Exam Pattern</th>
                                       <th>Syllabus</th>
                                       <th>Cut Off</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                      $courseData=$functionClass->getRows("exam order by id DESC"); 
                                      foreach ($courseData as $row ) {
                                            $resultC=$functionClass->getRowsByID("course","id",$row['course_id']);
                                       
                                    ?>
                                    <tr id="rowid_<?php echo $row['id']; ?>" >
                                      <td><?php echo $resultC[0]['name']; ?></td>
                                       <td><?php echo $row['title']; ?></td>
                                       <td><?php echo $row['overview']; ?></td>
                                       <td><?php  echo $row['exam_date'];?></td>
                                       <td><?php  echo $row['eligibility_criteria'];?></td>
                                       <td><?php  echo $row['exam_pattern'];?></td>
                                       <td><?php  echo $row['syllabus'];?></td>
                                       <td><?php  echo $row['cut_off'];?></td>
                                     
                                            <td>
                                          <a href="edit-exam?id=<?php echo $row['id']; ?>" class="product-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                          <a href="javascript:void(0)" onclick="deleteData(<?php echo $row['id']; ?>)" class="product-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                       </td>
                                    </tr>
                                 <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Product Table Row End -->
                   
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
      <!-- Datatables -->
      <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
      <!-- Perfect Scrollbar JS -->
      <script src="assets/plugins/perfect-scrollbar/jquery-perfect-scrollbar.min.js"></script>
      <!-- Custom Data-Tables JS -->
      <script src="assets/plugins/datatables/js/custom-data-tables.js"></script>
                
      <!-- Custom JS -->
      <script src="assets/js/seipkon.js"></script>
    <!-- Sweet Alerts JS -->
      <script src="assets/plugins/sweet-alerts/js/sweetalert.min.js"></script>
      <script src="assets/plugins/sweet-alerts/js/custom-sweetalerts.js"></script>
            <script type="text/javascript">
         function deleteData(id){
           
                  swal({   
                  title: "Are you sure?",   
                  text: "You will not be able to recover data!",   
                  type: "warning",   
                  showCancelButton: true,   
                  confirmButtonColor: "#DD6B55",   
                  confirmButtonText: "Yes, delete it!",   
                  closeOnConfirm: false 
              }, function(){   
                  deleteRow(id);
              });
         }
         
         //delete row
          function deleteRow(id){
               $.ajax({
               url: "deleteData",
               method: "POST",
               dataType: "json",
               data: {id: id,type:'exam'}, 
               success: function(data){
              
                  if (data.type == 'success') {

                   $("#rowid_"+id).remove();
                  swal("Deleted!", "Your data has been deleted.", "success"); 
                 }
                 else{
                   swal("Failed", data.message);
                        
                 }
               }
             });
           }
      </script>
   </body>

</html>