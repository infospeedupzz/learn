<?php include('layout/session.php');
$_SESSION['reloadCount']=0;
   //get mock Question
   $mock_id=$functionClass->DE($_GET['n']);
    $conArr=array("id"=>$mock_id);    
    $resultMock=$functionClass->getRowsByWhere("mock","id=:id",$conArr);  
    $conArrC=array("id"=>$resultMock[0]['course_id']);    
    $resultCourse=$functionClass->getRowsByWhere("course","id=:id",$conArrC);
 
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
       
      <!-- meta tag -->
      <meta charset="utf-8">
      <title>Mock        <?php echo $resultCourse[0]['name']."|".$resultMock[0]['title'];  ?> </title>
      <meta name="description" content="">
      <?php include("layout/head.php"); ?>
      <!-- this page css-->
      <link rel="stylesheet" type="text/css" href="assets/css/mock.css">
      <style> .box {
  float: left;
  height: 20px;
  width: 20px;
  margin-bottom: 15px;
  border: 1px solid black;
  clear: both;
}

.red {
  background-color: red;
  width: 39px;
border-radius: 6px;
}
.orange {
  background-color: orange;
  width: 39px;
border-radius: 6px;
}
.green {
  background-color: green;
  width: 39px;
border-radius: 6px;
}
.yellow {
  background-color: yellow;
  width: 39px;
border-radius: 6px;
}
ul{
  padding-left: 20px;
}
</style>
   </head>
   <body class="defult-home">
      <!--Preloader area start here-->
      <?php  include("layout/preloader.php");?>
      <!--Preloader area End here-->
      <!--Full width header Start-->
      <div class="full-width-header header-style1 home8-style4">
         <!--Header Start-->
         <header id="rs-header" class="rs-header">
            <!-- Topbar Area Start -->
            <div class="topbar-area home8-topbar">
               <div class="container" style="border-bottom: 1px solid #aeb5bb;padding-right: 0px; padding-left: 0px">
                  <div class="q-block" style='width:100%!important' >
                     <div class="row y-middle" style="margin: 0px;" >
                        <div class="col-md-12 col-lg-9 col-sm-6 col-xs-6 float-letf">
                           <ul class="topbar-contact" style='padding-left:0px'>
                                <li >
                                 <a href="javascript:void(0)" onclick='goBack()' title="back" class="btn">
                                        <svg id="Layer"  enable-background="new 0 0 64 64" height="auto" viewBox="0 0 64 64" width="25" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="m54 30h-39.899l15.278-14.552c.8-.762.831-2.028.069-2.828-.761-.799-2.027-.831-2.828-.069l-17.448 16.62c-.755.756-1.172 1.76-1.172 2.829 0 1.068.417 2.073 1.207 2.862l17.414 16.586c.387.369.883.552 1.379.552.528 0 1.056-.208 1.449-.621.762-.8.731-2.065-.069-2.827l-15.342-14.552h39.962c1.104 0 2-.896 2-2s-.896-2-2-2z"/></svg>
                                </a>
                              </li>
                                <li ><?php echo $resultCourse[0]['name']; ?> - 
                                <?php echo $resultMock[0]['title'];  ?>
                              </li>
                             
                              
                           </ul>
                        </div>
                        <div class="col-md-3  col-lg-3 col-sm-6 col-xs-6 text-right float-right lanuage-div " >
                           <ul class="topbar-contact">
                 
                              <li class="login-register">
                                 View In:
                                 <select id="lanuage">
                                    <option >English</option>
                                    <option>Hindi</option>
                                 </select>
                              </li>
                          
                           </ul>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>
            <!-- Topbar Area End -->
            <!-- Canvas Menu start -->
            
            <!-- Canvas Menu end -->
         </header>
      </div>
      <!--Full width header End-->
      <!-- Main content Start -->
      <div class="main-content">
         <!-- Blog Section Start -->
         <div class="rs-inner-blog orange-color  pb-5 md-pt-5 md-pb-5">
            <div class="container " style='padding-left:20px; padding-right:20px;'>
                <br>
                <h3><center>Please read the following instructions carefully</center></h3>
                <br>
                <h5><u>General Instructions:</u></h5>
                <h6>
                        1. The clock has been set at the server and the countdown timer at the top right corner of your screen will display the time remaining for you to complete the exam. When the clock runs out the exam ends by default -you are not required to end or submit your exam.
                    </h6>
                    <h6>
                        2.The question palette at the right of screen shows one of the following statuses of each of the questions numbered:
                    </h6>
                    
                
                    
                    <div><div class='box red'></div>&nbsp &nbsp  Current question.</div>
                 <br>
                 <div><div class='box orange'></div> &nbsp &nbsp    You have not answered the question.</div>
                <br>
                <div><div class='box green'></div> &nbsp &nbsp  You have answered the question.</div>
                 <br>
                        <div><div class='box yellow'></div>&nbsp &nbsp  You have NOT answered the question but have marked the question for review.</div>
                <br>
                 <ul style="list-style-type:disc">
         <li>The Marked for Review status simply acts as a reminder that you have set to look at the question again. <font color='red'>If an answer is selected for a question that is Marked for Review, the answer will be considered in the null evaluation</font></li>
         
      </ul>
               <br>
               <h5><u>Navigating to a question :</u> </h5>
               <h6>3. To select a question to answer, you can do one of the following:</h6>
               <ol type="a" style='padding-left:20px;'>
  

                    <li>
                        Click on the question number on the question palette at the right of your screen to go to that numbered question directly. Note that using this option does NOT save your answer to the current question.</li>
                        <li>Click on Save and Next to save answer to current question and to go to the next question in sequence.</li>
                        <li>Click on Mark for Review to save answer to current question, mark it for review, and to go to the next question in sequenced.</li>
                        <li>You can view the entire paper by clicking on the Skip button.</li>
                    
                </ol>
               <br>
               <h5><u>Answering questions : </u></h5>
                <h6>4. For multiple choice type question : </h6>
                <br>
              <ol type="a" style='padding-left:20px;'>
  

                    <li> To select your answer, click on one of the option buttons</li>
                        <li>To change your answer, click the another desired option button.</li>
                        <li>To save your answer, you MUST click on Save & Next.</li>
                        <li>To deselect a chosen answer, click on the chosen option again or click on the Clear Response button.</li>
                        <li>To mark a question for review click on Mark for Review .</li>
                        </ol>
                       <p style="color:red" >If an answer is selected for a question that is Marked for Review, the answer will be considered in the null evaluation.</p>
                       
                        <h6>5. To change an answer to a question, first select the question and then click on the new answer option followed by a click on the Save & Next button.</h6>
                       <h6> 6. Questions that are saved or marked for review after answering will ONLY be considered for evaluation.</h6>
                    
                
               <br>
               <h5><u>Navigating through sections : </u></h5>
              <br>
  
                    <h6>7. Sections in this question paper are displayed on the top bar of the screen. Questions in a section can be viewed by clicking on the section name. The section you are currently viewing is highlighted.</h6>
                        <h6>8. After clicking the Save & Next button on the last question for a section, you will automatically be taken to the first question of the next section. </h6>
                        <h6>9. You can move the mouse cursor over the section names to view the status of the questions for that section.</h6>
                        <h6>10. To deselect a chosen answer, click on the chosen option again or click on the Clear Response button.</h6>
                        <h6>11. You can shuffle between sections and questions anytime during the examination as per your convenience.</h6>
                        
                    <br>
                
               <br>
               <div style='position: fixed;z-index: 999999;bottom: -1px;width: 101%; left:-1%;padding:5px;background: #f6fbff;'>
                   <form action="run-mock-test" id='goForm'>
                       <input type='hidden' name='q' id='q' value="<?php echo $_GET['alias']; ?>">
                       <input type='hidden' name='n' id='n' value="<?php echo $_GET['n']; ?>">
                   <p style='margin: 0 0 0px;   padding-left: 25px;font-size: 18px;font-weight: 500;'><label style='    cursor: pointer;'><input type='checkbox'  required > I have read all the instruction carefully </label></p>
                   <button type='submit' class='btn btn-success' style='    width: 101%;padding:10px;'>CONTINUE</button>
                </form>
               </div>
            </div>
         </div>
         
         <!-- Blog Section End -->
      </div>
      <!-- Main content End --> 
      <!-- modernizr js -->
      <script src="assets/js/modernizr-2.8.3.min.js"></script>
      <!-- jquery latest version -->
      <script src="assets/js/jquery.min.js"></script>
      <!-- Bootstrap v4.4.1 js -->
      <script src="assets/js/bootstrap.min.js"></script>
      <!-- Menu js -->
      <script src="assets/js/rsmenu-main.js"></script> 
      <!-- op nav js -->
      <script src="assets/js/jquery.nav.js"></script>
      <!-- wow js -->
      <script src="assets/js/wow.min.js"></script>     
      <!-- plugins js -->
      <script src="assets/js/plugins.js"></script>
      <!-- magnific popup js -->
      <script src="assets/js/jquery.magnific-popup.min.js"></script>  
      <!-- main js -->
      <script src="assets/js/main.js"></script>
      <script>
              //Add data
     $("form#goForm").submit(function(e) {
    e.preventDefault();    
            var q=$("#q").val();
            var l=$("#lanuage").val();
            var n=$("#n").val();
            window.location.href='run-mock-test/'+q+'/'+n+'/'+l;
        }); 
        function goBack() {
        window.history.back();
        }
      </script>
   </body>
</html>

