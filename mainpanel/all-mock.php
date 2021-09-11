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
      <title>All Mock || Learnizy</title>
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
                                    <h3>Mock List</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">home</a></li>
                                       <li>Mock</li>
                                       <li>Mock list</li>
                                       <li><a href="add-mock" style="float: right;" class="product-table-info " data-toggle="tooltip" title="Add"><i class="fa fa-plus"></i> New</a></li>
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
                                       <th>View</th>
                                       <th>Icon</th>
                                       <th>Title</th>
                                       <th>Course</th>
                                       <th>Package</th>
                                       <th>Name</th>
                                       <th>Status</th>
                                       <th>Questions</th>
                                       <th>Max Time</th>
                                       <th>Marks</th>
                                       <th>Price</th>
                                       <th>From Points</th>
                                       <th>Can Skip</th>
                                       <th>Duration</th>
                                       <th>Language</th>
                                       <th>Publish</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                      $MockData=$functionClass->getRows("mock order by id desc"); 

                                      foreach ($MockData as $row ) {
                                      	//course
                                        $resultC=$functionClass->getRowsByID("course","id",$row['course_id']);
                                        	
                                    ?>
                                    <tr id="rowid_<?php echo $row['id']; ?>">
                                       <td><a href="mock-questions?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Question</a></td>
                                       <td>
                                          <img src="https://learnizy.in/Learnish/<?php echo $row['img']; ?>" alt=""  />
                                       </td>
                                       <td><?php echo $row['title']; ?></td>
                                       <td><?php echo $resultC[0]['name']; ?></td>
                                       <td>
                                       	<?php 
                                       	$PArr=explode(",", $row['package_id']);
                                       	for($i=0; $i<sizeof($PArr);$i++){
                                       		if(!empty($PArr[$i])){
                                       			 $resultP=$functionClass->getRowsByID("mock_packages","id",$PArr[$i]);
                                       			?>
                                       			 <span class="label label-success"> <?php  echo $resultP[0]['title']; ?></span>
                                       		<?php }
                                       		      
                                       	}
										
										?>
                                       </td>
                                       <td><?php echo $row['name']; ?></td>
                                       <td>
                                       	<?php if($row['status']=='Free'){
                                       		?>
                                       		 <span class="label label-success">Free</span>
                                       		<?php
                                       	}else{
                                       		?>
                                       		 <span class="label label-info">Paid</span>
                                       		<?php
                                       	} ?>
                                         
                                       </td>
                                       
                                       <td><?php echo $row['questions']; ?></td>
                                       <td><?php echo $row['max_time']; ?></td>
                                       <td><?php echo $row['marks']; ?></td>
                                       <td><?php echo $row['price']; ?></td>
                                       <td><?php  echo $row['from_points'];?></td>
                                        <td>
                                       	<?php if($row['can_skip']=='True'){
                                       		?>
                                       		 <span class="label label-success">Yes</span>
                                       		<?php
                                       	}else{
                                       		?>
                                       		 <span class="label label-danger">No</span>
                                       		<?php
                                       	} ?>
                                         
                                       </td>
                                       <td><?php  echo $row['duration'];?></td>
                                       <td><?php  echo $row['language'];?></td>
                                       <td>	
                                       	<?php if($row['publish']=='True'){
                                       		?>
                                       		 <span class="label label-success">Yes</span>
                                       		<?php
                                       	}else{
                                       		?>
                                       		 <span class="label label-danger">No</span>
                                       		<?php
                                       	} ?>
                                       </td>
                                     
                                       <td>
                                          <a href="edit-mock?id=<?php echo $row['id']; ?>" class="product-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
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
               data: {id: id,type:'mock'}, 
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