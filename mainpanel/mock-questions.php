<?php include("layout/session.php"); 

           $resultM=$functionClass->getRowsByID("mock","id",$_GET['id']);
         
           $resultQ=$functionClass->getRowsByID("mock_questions","mock_id",$_GET['id']);
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
      <title><?php echo $resultM[0]['title']; ?> Mock Question || Learnizy</title>
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
                                    <h3><?php echo $resultM[0]['title']; ?>  Questions List</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">home</a></li>
                                       <li>Mock</li>
                                       <li><?php echo $resultM[0]['title']; ?>  Questions list</li>
                                       <li><a href="add-mock-question" style="float: right;" class="product-table-info " data-toggle="tooltip" title="Add"><i class="fa fa-plus"></i> New</a></li>
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
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="add-employee-left">
                                    <div class="add-contact-lebel">
                                       <a class="btn btn-success" href="add-mock-question">
                                       <i class="fa fa-plus"></i>
                                       New Questions
                                       </a>
                                    </div>
                                    <div class="total-group-employee">
                                       <h3>total question in mock <span><?php echo sizeof($resultQ); ?></span></h3>
                                       <ul class="nav nav-tabs chat-list ps-container ps-theme-default ps-active-y" >
                                          <?php 
                                             $resultMs=$functionClass->getRows("mock order by id DESC");
                                             foreach ($resultMs as $rowMs ) {
                                                # code...
                                                ?>
                                                  <li role="presentation"   class="<?php if($_GET['id']==$rowMs['id']){ echo 'active';} ?>">
                                             <a href="mock-questions?id=<?php echo $rowMs['id']; ?>" ><?php echo $rowMs['title']; ?></a>
                                          </li>
                                            <?php  }
                                           ?>
                                       
                                       </ul>
                                    </div>
                                    
                                 </div>
                              </div>
                              <div class="col-md-9">
                                 <div class="employee-right">
                                    <div class="tab-content">
                                        
                                       <!-- Table Tab Panel Start -->
                                          <div class="table-responsive">
                                             <table id="employee-list" class="table table-striped contact-list-table">
                                                <thead>
                                                   <tr>
                                                      <th>No.</th>
                                                      <th>Subject</th>
                                                      <th>Question</th>
                                                      <th>Option1</th>
                                                      <th>Option2</th>
                                                      <th>Option3</th>
                                                      <th>Option4</th>
                                                      <th>Option5</th>
                                                      <th>Answer</th>
                                                      <th>Details</th>
                                                      <th>Description</th>
                                                      <th>Language</th>
                                                      <th>Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <?php 
                                             
                                             $count=0;
                                      foreach ($resultQ as $row ) {
                                       //course
                                       $count++;
                                        $resultS=$functionClass->getRowsByID("subject","id",$row['subject_id']);
                                          
                                    ?>
                                    <tr id="rowid_<?php echo $row['id']; ?>">
                                       <td>
                                          <?php echo $count; ?>
                                       </td>
                                       <td><?php echo $resultS[0]['name']; ?></td>
                                       <td><?php echo $row['question']; ?></td>
                                       <td><?php echo $row['option1']; ?></td>
                                       <td><?php echo $row['option2']; ?></td>
                                       <td><?php echo $row['option3']; ?></td>
                                       <td><?php echo $row['option4']; ?></td>
                                       <td><?php echo $row['option5']; ?></td>
                                       <td><?php echo $row['answer']; ?></td>
                                       <td><?php echo $row['details']; ?></td>
                                       <td><?php echo $row['description']; ?></td>
                                       <td><?php  echo $row['language'];?></td>
                                    
                                       <td>
                                          <a href="edit-mock-question?id=<?php echo $row['id']; ?>" class="product-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                          <a href="javascript:void(0)" onclick="deleteData(<?php echo $row['id']; ?>)" class="product-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                       </td>
                                    </tr>
                                 <?php } ?>
                                                </tbody>
                                             </table>
                                          </div>
                                       
                                       <!-- Table Tab Panel End -->
                                        
                            
                                        
                                    </div>
                                 </div>
                              </div>
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
               data: {id: id,type:'mock_questions'}, 
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
;;b