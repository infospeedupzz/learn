<?php include('layout/session.php');
if(empty($userInfo)){
    echo"<script> window.location.href='online-test-series';</script>";
    die();
}
if(isset($_GET['l'])){
    $selected_language=$_GET['l'];
}else{
    $selected_language="English";
}
$_SESSION['reloadCount']++;

   //get mock Question
   $mock_id=$functionClass->DE($_GET['n']);
     $conArrScore = array(
                "mock_id" => $mock_id,
                "user_id" => $_SESSION['userId']
                                                        
        );
 $resultScore = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id ", $conArrScore);
         if(!empty($resultScore)){
                 echo"<script>window.location.href='online-test-series';</script>";
             die();
         }
   $allowed_image_extension = array("png", "jpg", "jpeg", "PNG", "JPG", "JPEG");
    $conArr=array("id"=>$mock_id);    
    $resultMock=$functionClass->getRowsByWhere("mock","id=:id",$conArr);
       $conArr=array("mock_id"=>$mock_id);    
    $resultM=$functionClass->getRowsByWhere("mock_questions","mock_id=:mock_id",$conArr);
   //get mock Question
   //get subject ids
   $countS=0;
    $subjectArr=array();
    $subjectnameArr=array();
    $sectionQuestionCount=array();
    foreach ($resultM as $rowM){
        if(!in_array($rowM['subject_id'],$subjectArr)){
         
            $subjectname=$functionClass->getColById("subject"," name ",$rowM['subject_id']);
               $subjectArr[$countS]=$rowM['subject_id'];
               $subjectnameArr[$countS]=$subjectname[0]['name'];
            //count num of question  
            $QcountArr=array("mock_id"=>$mock_id,"subject_id"=>$rowM['subject_id']);    
             $resultQC=$functionClass->countRows("mock_questions where mock_id=:mock_id and subject_id=:subject_id ",$QcountArr);
             $sectionQuestionCount[$countS]=$resultQC;
              $countS++;
        }
    }
    $conArrC=array("id"=>$resultMock[0]['course_id']);    
    $resultCourse=$functionClass->getRowsByWhere("course","id=:id",$conArrC);
   //end of subject ids 
   ?>
    
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- meta tag -->
      <meta charset="utf-8">
      <title>Mock <?php echo $resultCourse[0]['name']."|".$resultMock[0]['title'];  ?></title>
      <meta name="description" content="">
      <?php include("layout/head.php"); ?>
      <!-- this page css-->
      <link rel="stylesheet" type="text/css" href="assets/css/mock.css">
      <style>
             #element:fullscreen {
    background-color: rgba(255,255,255,0);
}
#element:-webkit-full-screen {
    background-color: rgba(255,255,255,0);
}
#element:-moz-full-screen {
    background-color: rgba(255,255,255,0);
}
      </style>
   
   </head>
   <body class="defult-home" id='element' >
      <!--Preloader area start here-->
      <?php  include("layout/preloader.php");?>
      <!--Preloader area End here-->
    
      <!--Full width header Start-->
      <div class="full-width-header header-style1 home8-style4">
          <input type="hidden" name="mock_idj" id='mock_idj' value="<?php echo $mock_id; ?>">
         <!--Header Start-->
         <header id="rs-header" class="rs-header" style='position:fixed;width:100%;background: #233d63;'>
            <!-- Topbar Area Start -->
            <div class="topbar-area home8-topbar">
               <div class="container mc" style="border-bottom: 1px solid #aeb5bb;">
                   <div style='100% height:50px;'>
                       <div class='float-left'>
                            <ul class="topbar-contact" style='margin-top: 7px;'>
                             <li >
                               <a href="javascript:void(0)" onclick='goBack()' title="back" class="btn">
                                     <svg id="Layer"  enable-background="new 0 0 64 64" height="auto" viewBox="0 0 64 64" width="25" xmlns="http://www.w3.org/2000/svg"><path fill="#ffffff" d="m54 30h-39.899l15.278-14.552c.8-.762.831-2.028.069-2.828-.761-.799-2.027-.831-2.828-.069l-17.448 16.62c-.755.756-1.172 1.76-1.172 2.829 0 1.068.417 2.073 1.207 2.862l17.414 16.586c.387.369.883.552 1.379.552.528 0 1.056-.208 1.449-.621.762-.8.731-2.065-.069-2.827l-15.342-14.552h39.962c1.104 0 2-.896 2-2s-.896-2-2-2z"/></svg>
                                </a>
                              </li>
                              
                              <li style='  white-space: nowrap;   text-overflow: ellipsis; ' title=" <?php echo $resultMock[0]['title'];  ?>" >
                                  <?php echo $resultCourse[0]['name']; ?> - <?php echo $resultMock[0]['title'];  ?>
                              </li>
                            
                           </ul>
                                
                       </div>
                          <div class='float-right'>
                            <ul class="topbar-contact  mock-em">
                              <li class="">
                                 View In:
                                 <select >
                                    <option>English</option>
                                    <!--<option>Hindi</option>-->
                                 </select>
                              </li>
                               <li class="btn-part ">
                                 Time Left: <b id="setTime"> </b> 
                              </li>
                              <li class="btn-part ">
                                        <a style='color: white;' href="javascript:void(0)" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen" id="go-button"> 
                				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                			        </a>
                                  
                              </li>
                            
                                   
                           </ul>
                             <span class='text-right side-barmenu' >
                                    <a id="nav-expander" class="nav-expander">
                                       <div class="bar">
                                          <i class="fa fa-bars" aria-hidden="true"></i>
                                       </div>
                                    </a>
                                 </span>
                        </div>
                   </div>
                 
                 
               </div>
            </div>
            <!-- Topbar Area End -->
            <!-- Canvas Menu start -->
            <nav class="right_menu_togle hidden-md">
               <div class="close-btn">
                  <span id="nav-close">
                     <div class="line close-btn-side">
                        <span class="line1"></span><span class="line2"></span>
                     </div>
                  </span>
               </div>
               <div class="row" style="margin: 0px;">
                  <div class="col-md-12 plr0" >
                     <ul class="topbar-right">
                        <li class="btn-part pv2 " >
                             <b><?php echo $userInfo[0]['fullname'];  ?></b>
                        </li>
                        <li class="btn-part f6 overflow-ellipsis pv2" style="background: #dee2e6">
                           <span>SECTION:<span  class='sectionName'><?php echo $subjectnameArr[0]; ?></span></span>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-12 plr0 q-div" >
                  <!--mobile question number here -->    
               </div>
               <div  class="row" style=" width: 100%; margin: 0px;padding-top: .5rem;">
                  <div class="col-md-12 col-sm-12 col-xs-12 plr0 pv2">
                     <table style='width:100%'>
                        <tr>
                           <td><span class="br-100 ins-span" > </span>  <span style="display: inline-block;font-size: 13px;">Answered</span></td>
                           <td>  <span class="br-100 ins-span" style="background: #dc3545;" > </span>  <span style="display: inline-block;font-size: 13px;">Not Answered</span></td>
                        </tr>
                        <tr>
                           <td > <i style="color: #ffc107;" class="fa fa-star" aria-hidden="true"></i> <span style="display: inline-block;font-size: 13px;">Mark for review</span></td>
                           <td ><span class="br-100 ins-span" style="background: #fff; border: 1px solid grey" > </span><span style="display: inline-block;font-size: 13px;">Not Visited</span></td>
                        </tr>
                     </table>
                  </div>
               </div>
               <div  class="row" style=" width: 100%; margin: 0px;padding-top: 1rem;height:88px;">
                  <!--<div class="col-md-6 col-sm-6 col-xs-6 plr0 pv2">-->
                  <!--   <button  class="btn bottom-btn" style='margin-right:2px;'>-->
                  <!--   Instructions-->
                  <!--   </button>-->
                  <!--   <button class="btn bottom-btn" style="background: white" >-->
                  <!--   Switch to Older version-->
                  <!--   </button>-->
                  <!--</div>-->
                  <div class="col-md-12">
                     <button class="readon green-btn" onclick="submitSection()" style="width: 100%">
                     SUBMIT SECTION
                     </button>
                  </div>
               </div>
            </nav>
            <!-- Canvas Menu end -->
         </header>
      </div>
      <!--Full width header End-->
      <!-- Main content Start -->
      <div class="main-content" style='margin-top: 51px;background:white!important;height: 100%;'>
         <!-- Blog Section Start -->
         <div class="rs-inner-blog orange-color  pb-5 md-pt-5 md-pb-5">
            <div class="container" style='padding-left:1px;'>
               <div class="q-block" style="margin-left: .2rem;" >
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12">
                        <div class='section-title'>
                           <div class=" dn flex-shrink-0 gray items-center f6">SECTIONS :</div>
                        </div>
                        <div class='section-div' >
                           <div class="flex w-100 overflow-auto mh2">
                              <?php
                                 $sectionCount=0;
                                 foreach($subjectArr as $subjectID){
                                         $sectionCount++;
                                         $subjectBtnActive="";
                                         if($sectionCount==1){
                                             $sectionId=$subjectID;
                                              $subjectBtnActive="activeBtn";
                                            ?>
                                               <input type='hidden' id='sectionID' value="<?php echo $sectionId; ?>">
                                               <input type='hidden' id='sectionName' value="<?php echo $subjectnameArr[0]; ?>">
                                            <?php 
                                         }

                                 ?>
                              
                           
                              <button onclick="getNumofQuestion(<?php echo $mock_id; ?>,<?php echo $subjectID;?>,<?php echo ($sectionCount-1); ?>)" id='subject_<?php echo $subjectID; ?>' data-idx="0" role="button" type="button" aria-label="<?php echo $subjectnameArr[$sectionCount-1]; ?>" class="b--black-20  <?php echo $subjectBtnActive; ?> sectionBtn gray pointer f6 ba br-pill flex flex-shrink-0 h2 items-center mv2 mr2 ph3"><?php echo $subjectnameArr[$sectionCount-1]; ?></button>
                              <?php } ?>                         
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12 pv2" style=" background: #e5e5e5">
                         <table style='width:100%'>
                             <tr>
                                 <td><span >Question <span id='question_num'>1</span>/<?php echo $resultMock[0]['questions']; ?></span></td>
                                 <td> <span class='mtime'><i class="fa fa-clock-o" aria-hidden="true"></i> <span id='settimem'></span></span></td>
                                 <td> <span class='float-right'><span style='font-size:12px;'>Marks: <span class='text-success'>+1.0</span> <span class='text-danger'>-0.25</span></span></span></td>
                             </tr>
                         </table>
                         
                     </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-6 mb-10 mt-20" style="border-right: 1px solid #aeb5bb;" id="desCol">
                        <div style="height: 100%; max-height: 450px; overflow: auto;" id='questiondescriptionData'>
                           <!-- question here -->
                        </div>
                     </div>
                     <div class="col-md-6 mt-20 mb-10" id="optionCol">
                        <div style="height:100%; max-height: 450px; overflow: auto;" id='objectData'>
                           <input type='hidden' id='shdkhf_qid' value=''>
                           <p id='questionData'></p>
                           <ul class='option-li' id='optionData' >
                              <!-- option data here-->
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="fix-bottom">
                     <div class="row" style="margin: 0px;">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 plr0 pv2">
                           <button class="bottom-btn float-left for-review" style='margin-right:2px;' >
                           MARK FOR  REVIEW
                           </button>
                           <button type='button' class="bottom-btn float-left clearResponse" >
                           CLEAR RESPONSE
                           </button>
                           <button type='button'  data-toggle="modal" data-target="#reportModal" class="bottom-btn float-left reportBtn"  >
                           REPORT
                           </button>
                           <button type='button' class=" bottom-btn float-right save-next" >
                           SAVE AND NEXT
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="n-block-1" >
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12 plr0" >
                        <ul class="topbar-right" style="margin-left: -8px;margin-top:.6rem">
                           <li class="btn-part pv2 pl-2" >
                        <b><?php echo $userInfo[0]['fullname'];  ?></b>
                           </li>
                           <li class="btn-part f6 overflow-ellipsis pv2 pl-2" style="background: #dee2e6">
                                <span>SECTION:<span class='sectionName'><?php echo $subjectnameArr[0]; ?></span></span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="row" style="margin: 0px;">
                     <div class="col-md-12 plr0 q-div" >
                        <!--question number here -->  
                     </div>
                     <div class="fix-submit">
                     <div  class="row" style=" width: 100%; margin: 0px;padding-top: .5rem;">
                        <div class="col-md-6 plr0 pv2">
                           <span class="br-100 ins-span" > </span>  <span style="display: inline-block;font-size: 13px;">Answered</span>
                        </div>
                        <div class="col-md-6 plr0 pv2">
                           <span class="br-100 ins-span" style="background: #dc3545;" > </span>  <span style="display: inline-block;font-size: 13px;">Not Answered</span>
                        </div>
                        <div class="col-md-6 plr0 pv2">
                           <i style="color: #ffc107;" class="fa fa-star" aria-hidden="true"></i> <span style="display: inline-block;font-size: 13px;">Mark for review</span>
                        </div>
                        <div class="col-md-6 plr0 pv2">
                           <span class="br-100 ins-span" style="background: #fff; border: 1px solid grey" > </span><span style="display: inline-block;font-size: 13px;">Not Visited</span>
                        </div>
                     </div>
                     <div  class="row" style=" width: 100%; margin: 0px;padding-top: 1rem;">
                        <!--<div class="col-md-6 plr0 pv2">-->
                        <!--   <button  class="btn  ins-btn">-->
                        <!--   Instructions-->
                        <!--   </button>-->
                        <!--</div>-->
                        <!--<div class="col-md-6 plr0 pv2">-->
                        <!--   <button class="btn ins-btn" style="background: white" >-->
                        <!--   Switch to Older version-->
                        <!--   </button>-->
                        <!--</div>-->
                        <div class="col-md-12">
                           <button class="readon green-btn submit_section" onclick="submitSection()" style="width: 100%;">
                           SUBMIT SECTION
                           </button>
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class='qloader-div'>
            <img src='assets/images/loader.gif' class='qloader'>
         </div>
         <!-- Blog Section End -->
         
 <!-- model-->        

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
    
          <h4 class="modal-title">Confirm</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do want to submit mock.</p>
        </div>
        <div class="modal-footer">
          <button type="button" onclick='submitData();' class="btn btn-primary" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
<!-- model-->

<!-- The Modal -->
<div class="modal" id="reportModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="sendReport">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Report This Question</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type='hidden' id="reportQ" name="reportQ" >
        <textarea name="reportQdes" id="reportQdes" class="form-control"></textarea>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Send</button>
      </div>
    </form>
    </div>
  </div>
</div>
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
//check reload 
//check reload 

            <?php if($_SESSION['reloadCount']>1){ ?>
                $("#myModal").modal("show");
            <?php }else{ ?>
             localStorage.clear();        
        <?php } ?>
       
     var mock_idj=$("#mock_idj").val();
         var sizeofSection;
        var subjectId=$("#sectionID").val();
     
         var MAINPATH="<?php echo MAINPATH; ?>";
         var subjectArr=<?php echo json_encode($subjectArr); ?>;
         var subjectnameArr=<?php echo json_encode($subjectnameArr); ?>;
         var sectionQuestionCountArr=<?php echo json_encode($sectionQuestionCount); ?>;
         var subjectCount=0;
         if (localStorage.getItem("runingsection") === null) {
             localStorage.setItem("runingsection",subjectCount);
         }else{
                subjectId=subjectArr[localStorage.getItem("runingsection")]; 
         }
         var sectionTime=0;
         //timer
 function toHHMMSS(sec_num) {
    var sec_num = parseInt(sec_num, 10); // don't forget the second parm
    var hours = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours < 10) {
        hours = "0" + hours;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    var time = hours + ':' + minutes + ':' + seconds;
    return time;
}

var count = parseInt(<?php echo $resultMock[0]['max_time']; ?>)*60; // it's 00:01:02


var counter = setInterval(timer, 1000);

function timer() {
    sectionTime++;
    if (parseInt(count) <= 0) {
        clearInterval(counter);
        $("#setTime").html("00:00:00");
		submitData();
        return;
    }
    var temp = toHHMMSS(count);
    count = (parseInt(count) - 1).toString();

    $('#setTime').html(temp);
    $('#settimem').html(temp);
}

//end of timer

var activeid = 1;
var extn = ["png", "jpg", "jpeg", "PNG", "JPG", "JPEG"];
$(".num-click").hover(function() {
	var id = $(this).data('id');
	$(".linenum").removeClass("active-qnum");
	$(".active-line_" + id).addClass("active-qnum");
	$(".active-line_" + activeid).addClass("active-qnum");
});



//insert data into local

if (typeof(Storage) === "undefined") {
	alert("Your Browers does not suport with functionlty");
}
var itemData = [];

$(".for-review").click(function() {
	var num = $(".activeBtn").data('num');
	var shdkhf_qid = $("#shdkhf_qid").val();
	var done = $("input[name='option']:checked").val();
	if (done) {
		addData(shdkhf_qid, done, num, 1);
		$(".questionnum_" + num).addClass("mark-review");
			if ((sizeofSection) == num) {
		submitSection();
	} else {
		var nextid = $(".questionnum_" + (num + 1)).data('id');
		setQuestion(nextid, num + 1);
	}
	}else{
	    alert("Please select answer");
	}


});
$(".save-next").click(function() {
	var num = $(".activeBtn").data('num');
	var shdkhf_qid = $("#shdkhf_qid").val();
	var done = $("input[name='option']:checked").val();
	if (done) {
		addData(shdkhf_qid, done, num, 0);
	} else {
	   addData(shdkhf_qid, "null0", num, 0);
		$(".questionnum_" + num).addClass("not-ans");
	}
	if ((sizeofSection) == num) {
		submitSection();
	} else {
		var nextid = $(".questionnum_" + (num + 1)).data('id');
		setQuestion(nextid, num + 1);
	}

});

function addData(shdkhf_qid, done, num, is_review) {    
    var selected_language='<?php echo $selected_language; ?>';
	var ch = 0;
	var storedData = localStorage.getItem("opjspn_option");
	if (storedData !== "" && storedData) {

		var ArrayData = JSON.parse(storedData);

		for (var i = 0; i < ArrayData.length; i++) {

			$(".questionnum_" + ArrayData[i].num).addClass("answer-btn");
			if (ArrayData[i].shdkhf_qid == shdkhf_qid) {
				itemData.push({
					shdkhf_qid: ArrayData[i].shdkhf_qid,
					ans: done,
					num: ArrayData[i].num,
					is_review: is_review,
					selected_language:selected_language
				});
				ch = 1;
			} else {
				itemData.push({
					shdkhf_qid: ArrayData[i].shdkhf_qid,
					ans: ArrayData[i].ans,
					num: ArrayData[i].num,
					is_review: ArrayData[i].is_review,
					selected_language:selected_language
				});
			}
		}
		if (ch != 1) {
			itemData.push({
				shdkhf_qid: shdkhf_qid,
				ans: done,
				num: num,
				is_review: is_review,
				selected_language:selected_language
			});
		}

		localStorage.setItem("opjspn_option", JSON.stringify(itemData));
		itemData = [];

	} else {

		itemData.push({
			shdkhf_qid: shdkhf_qid,
			ans: done,
			num: num,
			is_review: is_review,
			selected_language:selected_language
		});
		localStorage.setItem("opjspn_option", JSON.stringify(itemData));
		itemData = [];
	}

	$(".questionnum_" + num).removeClass("mark-review");
	$(".questionnum_" + num).addClass("answer-btn");
}

function setQuestionNum(qid) {

	var storedData = localStorage.getItem("opjspn_option");
	if (storedData !== "" && storedData) {

		var ArrayData = JSON.parse(storedData);

		for (var i = 0; i < ArrayData.length; i++) {
			if (ArrayData[i].shdkhf_qid == qid) {
				$("input[name=option][value='" + ArrayData[i].ans + "']").prop('checked', true);
				$("input[name=option][value='" + ArrayData[i].ans + "']").closest("li.optionClass").addClass("optionActive");

			}

		}
	}
}




function setQuestion(id, num) {

  $(".close-btn-side").trigger("click");
	//loader
	$(".qloader-div").show();
	//loder
	activeid = id;

	$("#question_num").html(num);
	//active num
	$(".linenum").removeClass("active-qnum");
	$(".active-line_" + id).addClass("active-qnum");
	$(".num-click").removeClass("activeBtn");
	$(".questionnum_" + num).addClass("activeBtn");
	//active num
	$(".save-next").attr("disabled", true);

	$.ajax({
		url: "getMockQuestion",
		type: "post",
		dataType: "json",
		data: {
			'qid': id
		},
		success: function(data) {

			var questionData = "";
			var questiondescriptionData = "";
			var des = data[0].description.split('.').pop();

			if (extn.includes(des)) {
				questiondescriptionData = questiondescriptionData + "<img src='" + MAINPATH + data[0].description + "'>";
			} else {
				questiondescriptionData = questiondescriptionData + data[0].description + "<br>";
			}

			var question = data[0].question.split('.').pop();

			if (extn.includes(question)) {
				questionData = questionData + "<img src='" + MAINPATH + data[0].question + "'>";
			} else {
				questionData = questionData + data[0].question + "<br>";
			}
			if (data[0].description !== "") {

				
				$("#questiondescriptionData").html(questiondescriptionData);
			} else {
			     $("#questiondescriptionData").html("");
			     $("#desCol").hide();
				                $("#desCol").removeClass("col-md-6");
                              $("#desCol").addClass("col-md-12");
                              $("#optionCol").removeClass("col-md-6");
                              $("#optionCol").addClass("col-md-12");
			}
			$("#questionData").html(questionData);
			var optionData = "";
			optionData = optionData + '<li onclick="setActiveoption(1)" class="optionClass" id="optionClick_1" ><label for="option1"><input type="radio" class="roption" name="option" id="option1" value="' + data[0].option1 + '">' + data[0].option1 + '</label></li>';
			optionData = optionData + '<li  onclick="setActiveoption(2)" class="optionClass" id="optionClick_2" ><label for="option2"><input type="radio" class="roption" name="option" id="option2" value="' + data[0].option2 + '">' + data[0].option2 + '</label></li>';
			optionData = optionData + '<li onclick="setActiveoption(3)"  class="optionClass" id="optionClick_3" ><label for="option3"><input type="radio" class="roption"  name="option" id="option3" value="' + data[0].option3 + '">' + data[0].option3 + '</label></li>';
			optionData = optionData + '<li  onclick="setActiveoption(4)" class="optionClass" id="optionClick_4" ><label for="option4"><input type="radio" class="roption" name="option" id="option4" value="' + data[0].option4 + '">' + data[0].option4 + '</label></li>';
			optionData = optionData + '<li  onclick="setActiveoption(5)" class="optionClass" id="optionClick_5" ><label for="option5"><input type="radio" class="roption" name="option" id="option5" value="' + data[0].option5 + '">' + data[0].option5 + '</label></li>';
			$("#shdkhf_qid").val(data[0].id);
			$("#optionData").html(optionData);
			$(".qloader-div").hide();


			if ((sizeofSection) == num) {
				$(".save-next").html("Submit Section");
			} else {
				$(".save-next").html("SAVE AND NEXT");
			}
			setQuestionNum(id);
			$(".save-next").attr("disabled", false);



		}
	});
}

function submitSection() {

	var storedData = localStorage.getItem("opjspn_option");
	var runingsection = localStorage.getItem("runingsection");
	var submitAction = 0;
	var sectionID = $("#sectionID").val();
	var sectionName = $("#sectionName").val();
	if (runingsection == (subjectArr.length - 1)) {
		submitAction = 1;
	}

	$(".submit_section").attr("disabled", true);
	$(".submit_section").html("saving...");
	if (subjectCount == (subjectArr.length - 1)) {
		isComplete = 1;
	} else {
		isComplete = 0;
	}
	subjectCount++;

	$.ajax({
		url: 'submitMock',
		type: 'POST',
		data: {
			'kvcArray': storedData,
			'sectionID': sectionID,
			'sectionName': sectionName,
			'sectionTime': sectionTime,
			'mock_id': mock_idj,
			'submitAction': submitAction,
			'isComplete': isComplete
		},
		dataType: 'json',
		success: function(data) {

			if (subjectCount == (subjectArr.length - 1)) {
				$(".submit_section").attr("disabled", false);
				$(".submit_section").html("Submit Mock");
			} else {
				$(".submit_section").attr("disabled", false);
				$(".submit_section").html("Submit Section");
			}
			if (data.isComplete == 1) {
				localStorage.clear();
				window.location.href = 'analysis/<?php echo str_replace(" ","-", $resultMock[0]['title']); ?>/'+data.n;
			} else {

				$("#sectionID").val(subjectArr[subjectCount]);
				$("#sectionName").val(subjectnameArr[subjectCount]);
				$(".sectionName").html(subjectnameArr[subjectCount]);
				sectionTime = 0;
				localStorage.setItem("runingsection", subjectCount);
				if (localStorage.getItem("runingsection") === null) {
					localStorage.setItem("runingsection", subjectCount);
				} else {
					if (localStorage.getItem("runingsection") === 0) {
						number = 1;
					} else {
						number = parseInt(sectionQuestionCountArr[(localStorage.getItem("runingsection") - 1)]) + 1;
						subjectId = subjectArr[localStorage.getItem("runingsection")];

					}
				}
        
				getNumofQuestion(mock_idj, subjectArr[subjectCount], subjectCount);
			}
		}
	});
}

function getNumofQuestion(mock_id, subject_id, startnum1) {


	var runingsection = localStorage.getItem("runingsection");
	if (runingsection <= startnum1) {
		var startnum = 0;
		if (startnum1 === 0) {
			startnum = 1;
		} else {
			for (var k = 0; k < startnum1; k++) {
				startnum = startnum + parseInt(sectionQuestionCountArr[k]);
			}
			startnum++;
		}


		$.ajax({
			url: "get_question_by_section",
			type: "post",
			dataType: "json",
			data: {
				'mock_id': mock_id,
				'subject_id': subject_id
			},
			success: function(data) {
				var activeClass = "";
				var qid, num;
				var numofquestion = '<h6 class="pt-2 pb-2 border-bottom mb-2">QUESTION PALLETE </h6>';
				sizeofSection = data.length + startnum - 1;
				for (var i = 0; i < data.length; i++) {
					if (i === 0) {

						activeClass = "activeBtn";
						qid = data[i].id;
						num = startnum;
					} else {
						activeClass = "";
					}
					numofquestion = numofquestion + '<div class="n-div"><button onclick="setQuestion(' + data[i].id + ',' + startnum + ')" type="button" class=" questionnum_' + startnum + '  n-btn ' + activeClass + ' num-click pa2" data-num="' + startnum + '"  data-id="' + data[i].id + '">' + startnum + '</button>';
					if (i === 0) {
						numofquestion = numofquestion + '<span class="w2 active-qnum linenum active-line_' + data[i].id + '"></span>';
					} else {
						numofquestion = numofquestion + '<span class="w2 linenum active-line_' + data[i].id + '" ></span>';
					}
					numofquestion = numofquestion + '</div>';
					startnum++;

				}
				$(".q-div").html(numofquestion);
				setQuestion(qid, num);
				$(".sectionBtn").removeClass("activeBtn");
				$("#subject_" + subject_id).addClass("activeBtn");
			}
		});
	}
}





function setActiveoption(id) {

	$(".optionClass").removeClass("optionActive");
	$("#optionClick_" + id).addClass("optionActive");
}

$(".clearResponse").click(function() {
    
	$('.roption').prop('checked', false);
	var nmid=  $(".activeBtn").data('id');
	$(".activeBtn").removeClass("mark-review");
});

getNumofQuestion(mock_idj, subjectId, subjectCount);

function submitData() {
	for (var k = 0; k < subjectArr.length; k++) {
		submitSection();
	}
}
//leave page 
var h=$( document ).height();
$(".q-div").css("max-height",(h-305));
$("#objectData").css("max-height",(h-225));
$("#objectData").css("height",(h-225));
$("#questiondescriptionData").css("max-height",(h-225));
$("#questiondescriptionData").css("height",(h-225));
</script>

<script>
/* Get into full screen */
function GoInFullscreen(element) {
	if(element.requestFullscreen)
		element.requestFullscreen();
	else if(element.mozRequestFullScreen)
		element.mozRequestFullScreen();
	else if(element.webkitRequestFullscreen)
		element.webkitRequestFullscreen();
	else if(element.msRequestFullscreen)
		element.msRequestFullscreen();
}

/* Get out of full screen */
function GoOutFullscreen() {
	if(document.exitFullscreen)
		document.exitFullscreen();
	else if(document.mozCancelFullScreen)
		document.mozCancelFullScreen();
	else if(document.webkitExitFullscreen)
		document.webkitExitFullscreen();
	else if(document.msExitFullscreen)
		document.msExitFullscreen();
}

/* Is currently in full screen or not */
function IsFullScreenCurrently() {
	var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;
	
	// If no element is in full-screen
	if(full_screen_element === null)
		return false;
	else
		return true;
}

$("#go-button").on('click', function() {
	if(IsFullScreenCurrently())
		GoOutFullscreen();
	else
		GoInFullscreen($("#element").get(0));
});
$(window).on('load', function() {
 // code here
 $("#go-button").trigger("click");
});
function goBack() {
  window.history.back();
}	

</script>
   
      
   </body>
</html>

