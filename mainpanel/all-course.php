<?php include("layout/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
      <!-- Title -->
      <title>All Course || Learnizy</title>
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
                                    <h3>Course List</h3>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                 <div class="seipkon-breadcromb-right">
                                    <ul>
                                       <li><a href="#">home</a></li>
                                       <li>Course</li>
                                       <li>Course list</li>
                                       <li><a href="#" style="float: right;" class="product-table-info " data-toggle="tooltip" title="Add"><i class="fa fa-plus"></i> New</a></li>
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
                                       <th>Icon</th>
                                       <th>Name</th>
                                       <th>Back Color</th>
                                       <th>Price</th>
                                       <th>From Points</th>
                                       <th>Duration</th>
                                       <th>Publish</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                      $courseData=$functionClass->getRows("course"); 
                                      foreach ($courseData as $row ) {
                                        $colorArr=explode(",",$row['back_color']);
                                       
                                    ?>
                                    <tr>
                                       <td>
                                          <img src="https://learnizy.in/Learnish/<?php echo $row['img']; ?>" alt=""  />
                                       </td>
                                       <td><?php echo $row['name']; ?></td>
                                       <td>
                                          <span class="label" style="background:<?php echo $colorArr[0]; ?> "><?php echo $colorArr[0]; ?></span>
                                          <span class="label" style="background:<?php echo $colorArr[1]; ?> "><?php echo $colorArr[1]; ?></span>
                                       </td>
                                       
                                       <td><?php echo $row['price']; ?></td>
                                       <td><?php  echo $row['from_points'];?></td>
                                       <td><?php  echo $row['duration'];?></td>
                                       <td><?php  echo $row['publish'];?></td>
                                     
                                       <td>
                                          <a href="#" class="product-table-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                          <a href="#" class="product-table-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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
   </body>

</html>