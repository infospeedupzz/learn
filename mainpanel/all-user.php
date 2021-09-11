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
      <title>All User || Learnizy</title>
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
      <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css" rel="stylesheet">
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
                                    <h3>User List</h3>
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
                              <table id="datatable1" class="table table-hover">
                                 <thead>
                                    <tr>
                                       <th>id</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Password</th>
                                       <th>fullname</th>
                                       <th>points</th>
                                       <th>profile_pic</th>
                                       <th>attempted_mock</th>
                                       <th>attempted_quizzes</th>
                                       <th>referral_code</th>
                                       <th>Last Login Date </th>
                                       <th>Last Login Time</th>
                                       <th>Register Date</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody></tbody>
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
         <!--proof of fitment-->
	    <div class="modal center-modal fade" id="rctmodal-status" tabindex="-1" style="display: none;" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Send Notification</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>
		  <form id="sendnotif">
		  <div class="modal-body">

			    <input type='hidden' name='id' id='id'>
			    <input type='hidden' name='firebase_key' id='fcm_token'>
			    <div class="form-group">
									  <label>Title</label>
									 <input type='text' name="title" class="form-control">
				</div>
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
        <div >
				
			    <div class="form-group">
									  <label>Message</label>
									   <textarea class="form-control" id='message' name="body" placeholder="Message Here.."></textarea>
				</div>
				
			<div class="alert alert-success" style='display:none' id="successopf" role="alert">
  
                  </div>
                    <div class="alert alert-danger" style='display:none' id="dangerpf" role="alert">

                  </div>
		  </div>
		  <div class="modal-footer modal-footer-uniform">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" id='statusBtnpf' class="btn btn-primary float-right">Send</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
<!--/proof of fitment-->
          
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
     <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>\
 <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>

      <!-- Custom JS -->
      <script src="assets/js/seipkon.js"></script>
              <!-- Sweet Alerts JS -->
      <script src="assets/plugins/sweet-alerts/js/sweetalert.min.js"></script>
      <script src="assets/plugins/sweet-alerts/js/custom-sweetalerts.js"></script>
      <script type="text/javascript">
        //data table
$(document).ready(function() {
            
            var userDataTable = $('#datatable1').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'get-user'
                    
                },
                'columns': [
                    { data: 'id' },
                    { data: 'email' },
                    { data: 'mobile' },
                    { data: 'password' },
                    { data: 'fullname' },
                    { data: 'points' },
                    { data: 'profile_pic' },
                    { data: 'attempted_mock' },
                    { data: 'attempted_quizzes' },
                    { data: 'referral_code' },
                    { data: 'login_date' },
                    { data: 'login_time' },
                    { data: 'register_date' },
                    { data: 'action' }
                ],
                   "order": [[ 0, "desc" ]],
                dom: 'lBfrtip',
                          buttons: [
       {
           extend: 'pdf',
           footer: true,
            orientation : 'landscape',
            pageSize : 'LEGAL',
           exportOptions: {
                  columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,18]
            }
       },
       {
           extend: 'csv',
           footer: false,
            exportOptions: {
              columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,18]
            }
          
       },
       {
           extend: 'excel',
           footer: false,
            exportOptions: {
               columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,18]
            }
       },
       {
           extend: 'print',
              customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="" style="width:200px;z-index:-999;position:absolute; top:0; right:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
       }
    ] ,
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
                
            });
            
                 //set status
            $('#datatable1').on('click','.noti',function(){
                 $("#id").val( $(this).data('id'));
                $("#fcm_token").val( $(this).attr('data-fcm_token'));
               
            });
   
} );
          $("form#sendnotif").submit(function(e) {
        
    e.preventDefault();    
    var formData = new FormData(this);
$("#statusBtnpf").attr("disabled", true);
$("#statusBtnpf").html("<i class='fa fa-circle-o-notch fa-spin'></i>Sending...");
   $.ajax({
        url:'https://learnizy.in/Learnish/send_to_single.php',
        type: 'POST',
        data: formData,
        //dataType: "json",
        success: function (data) {

                $("#rctmodal-status").modal('hide');
                  $("#statusBtnpf").attr("disabled", false);
                  $("#statusBtnpf").html('Send');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 


$("#file").change(function(){
$("#statusBtnpf").attr("disabled", true);
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
                    $("#statusBtnpf").attr("disabled", false);
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
//proof of fitment
      </script>
   </body>

</html>