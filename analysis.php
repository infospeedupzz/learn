<?php include('layout/session.php'); 
if(empty($userInfo)){
    echo "<script>window.location.href='online-test-series'</script>";
    die();
}
if(isset($_GET['n'])){
    $id=$functionClass->DE($_GET['n']); 
     $conArrScore = array(
        "mock_id" => $id,
        "user_id" => $userInfo[0]['id']
    ); 

    $resultScore = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id ", $conArrScore);  
    
    $conArrRank = array(
    "mock_id" => $resultScore[0]['mock_id']
    ); 
    $resultRank = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id order by overall_score DESC  ", $conArrRank);  
    
    $conArrMock1 = array(
        "id" => $id
    ); 
    $resultMock = $functionClass->getRowsByWhere("mock", "id=:id  ", $conArrMock1);
    //get my rank an
    $countMyRank=0;
   $myRank=0;
    $avgScore=0;
    $avgAccuracy=0;
    $avgCorrect=0;
    $avgIncorrect=0;
    $avgTime=0;
    
      foreach($resultRank as $rowRank){ 
          $countMyRank++;
          if($resultScore[0]['user_id']==$rowRank['user_id']){
              $myRank=$countMyRank;
          }
          $avgScore=$avgScore+(double)$rowRank['overall_score'];
          $avgAccuracy=$avgAccuracy+(double)($rowRank['accuracy']);
          $avgCorrect=$avgCorrect+(double)$rowRank['correct'];
          $avgIncorrect=$avgIncorrect+(double)$rowRank['incorrect'];
            preg_match_all('!\d+!', $rowRank['time_taken'], $matches);
            $avgTime=$avgTime+$matches[0][0];
          
      }
      //mock rating 
        
        $resultMockRate = $functionClass->getRowsByWhere("mock_ratings", "user_id=:user_id and mock_id=:mock_id  ", $conArrScore);
        if(!empty($resultMockRate)){
            $rating=$resultMockRate[0]['rating'];
            $feedback=$resultMockRate[0]['feedback'];
        }else{
            $rating="4";
            $feedback="";
        }
      //mock rating 
}else{
    echo"<script>window.location.href='/'</script>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">  
    
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Test Analysis  </title>
        <meta name="description" content="">
      <?php include("layout/head.php"); ?>
    <style>
        .ans-area{
                 background-color: #ffffffc4;
                background-image: url(assets/images/testimonial/cloud-pattern.png);
                background-repeat: no-repeat;
                background-size: 130%;
                background-position: 0 70px;
                border-radius: 10px;
                padding: 40px 45px;
        }
        .student-list >li{
            display:inline-block;
            padding:2px;
            vertical-align: middle;
        }
        .star-ul{
                float: right;
            background: #f3f8f9;
            padding: 5px;
            border-radius: 10px;
        }
     
          .rating {
         border: none;
         
         }
         .myratings {
         font-size: 85px;
         color: green
         }
         .rating>[id^="star"] {
         display: none
         }
         .rating>label:before {
         margin: 5px;
         font-size: 1.25em;
         font-family: FontAwesome;
         display: inline-block;
         content: "\f005"
         }
         .rating>.half:before {
         content: "\f089";
         position: absolute
         }
         .rating>label {
         color: #ddd;
         float: right;
         font-size: 1.25em;
         margin-bottom:0px!important;
         }
         .rating>[id^="star"]:checked~label,
         .rating:not(:checked)>label:hover,
         .rating:not(:checked)>label:hover~label {
         color: #FFD700
         }
         .rating>[id^="star"]:checked+label:hover,
         .rating>[id^="star"]:checked~label:hover,
         .rating>label:hover~[id^="star"]:checked~label,
         .rating>[id^="star"]:checked~label:hover~label {
         color: #FFED85
         }
         .reset-option {
         display: none
         }
         .reset-button {
         margin: 6px 12px;
         background-color: rgb(255, 255, 255);
         text-transform: uppercase
         }
         table{
            background: #fff;
         }
         td td{
             white-space:nowrap!important;
         }
    </style>
</head>
    <body class="defult-home">
        
        <!--Preloader area start here-->
        <?php  include("layout/preloader.php");?>
        <!--Preloader area End here-->  


        <!--Full width header Start-->
        <?php  include("layout/header.php");?>
        <!--Full width header End-->

		<!-- Main content Start -->
        <div class="main-content">
                   
      
 <!-- Counter Section Start -->
            <div id="rs-about" class="rs-about rs-blog gray-bg style3 rs-popular-courses style1 course-view-style orange-color rs-inner-blog white-bg pt-20 pb-100 md-pt-10 md-pb-70">
                <div class="container" style='max-width:100%!important; width:100%'>
                    <div class="row ">
                       
                        <div class="col-lg-4 col-md-12 order-last">
                             <h4 style="padding:11px;">Top Rankers</h4>
                            <div class="widget-area">
                               
                                <div class="widget-archives mb-50">
                            <?php  $countR=0;
                                foreach($resultRank as $rowRank){ 
                                $countR++;
                                if($countR<=10){
                                   $conArrUser = array(
                                            "user_id" => $rowRank['user_id']
                                        ); 
   
                                    $resultUser = $functionClass->getRowsByWhere("users", "id=:user_id ", $conArrUser);
                                ?>
                                    <div class="events-short mb-2">
                                        <div class="date-part bgc1">
                                           <b><?php echo $countR; ?>. &nbsp; &nbsp; </b> 
                                           <?php if(!empty($resultUser[0]['profile_pic'])){?>
                                           <img src="<?php echo MAINPATH.'/'.$resultUser[0]['profile_pic'];?>"  style='width:45px;    border-radius: 2.25rem!important;'>
                                           <?php }else{?>
                                            <img src='assets/images/useravtar.png' style='width:45px;'>
                                           <?php } ?>
                                        </div>
                                        <div class="content-part">
                                            <h5 style='margin:0px;'><?php echo $resultUser[0]['fullname'];?></h5>
                                            <div class="categorie" style='color: #8b8c8d;font-size: 14px;'>
                                               <?php 
                                               if($rowRank['overall_score']>0 && $resultMock[0]['marks']>0){
                                               echo $rowRank['overall_score'].'/'. $resultMock[0]['marks'];
                                               }
                                               else{
                                                   echo "0";
                                               }
                                               ?>
                                            </div>
                                           
                                        </div>
                                    </div>
                                         <?php }} ?>
                                </div>  
                           
                                
                            </div>
                        </div>
                        <div class="col-lg-8 pl-83 md-pl-15">
                            
                            <div class=row>
                                <div class='col-lg-12 col-md-12'>
                                    <h4 style='float:left;padding:11px;'> 
                                    Overall Performance Summary    
                                    </h4>
                                    <ul class="student-list star-ul" style='float:right'>
                                                        <li><a href="#" class="btn btn-primary" id="rateBtn" data-toggle="modal" data-target=".rating-modal-form"><i class="la la-star mr-1"></i>leave a rating</a></li>
                                                        <!--<li> -->
                                                        <!--    <fieldset class="rating"> -->
                                                        <!--    <input type="radio" <?php if($resultScore[0]['rate']<=5){ echo "checked";} ?> id="star5" name="rating" value="5" />-->
                                                        <!--    <label class="full" for="star5" title="Awesome - 5 stars"></label>-->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=4.5){ echo "checked";} ?> id="star4half" name="rating" value="4.5" />-->
                                                        <!--    <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=4){ echo "checked";} ?> id="star4" name="rating" value="4" />-->
                                                        <!--    <label class="full" for="star4" title="Pretty good - 4 stars"></label> -->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=3.5){ echo "checked";} ?> id="star3half" name="rating" value="3.5" />-->
                                                        <!--    <label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=3){ echo "checked";} ?> id="star3" name="rating" value="3" />-->
                                                        <!--    <label class="full" for="star3" title="Meh - 3 stars"></label>-->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=2.5){ echo "checked";} ?> id="star2half" name="rating" value="2.5" />-->
                                                        <!--    <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=2){ echo "checked";} ?> id="star2" name="rating" value="2" />-->
                                                        <!--    <label class="full" for="star2" title="Kinda bad - 2 stars"></label> -->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=1.5){ echo "checked";} ?> id="star1half" name="rating" value="1.5" />-->
                                                        <!--    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>-->
                                                        <!--    <input type="radio"  <?php if($resultScore[0]['rate']<=1){ echo "checked";} ?> id="star1" name="rating" value="1" />-->
                                                        <!--    <label class="full" for="star1" title="Sucks big time - 1 star"></label>-->
                                                        <!--    <input type="radio" id="starhalf"  <?php if($resultScore[0]['rate']<=0.5){ echo "checked";} ?> name="rating" value="0.5" />-->
                                                        <!--    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                                                        <!--    <input type="radio" class="reset-option" name="rating" value="reset" />-->
                                                        <!--    </fieldset>-->
                                                        <!--</li>-->
                                                        <li><a href='mock-solution/<?php echo str_replace(" ","-", $resultMock[0]['title']); ?>/<?php echo $functionClass->EN($resultMock[0]['id']);?>' class='btn btn-info '>View Solutions</a></li>
                                                     
                                    </ul>
                                    
                                    
                                </div>
                                
                            </div>
                            
                        
                            <div class="row rs-counter couter-area ans-area mb-30">
                              
                                <div class="col-md-3 sm-mb-30">
                                    <div class="counter-item one">
                                        <img class="count-img" src="assets/images/rank.png" alt="">
                                        <span class="number rs-count "><?php  echo $myRank;?></span>/
                                        <span class="title mb-0"><?php echo sizeof($resultRank); ?></span>
                                        <h6>Rank</h6>
                                    </div>
                                </div>
                                <div class="col-md-2 sm-mb-30">
                                    <div class="counter-item two">
                                        <img class="count-img " src="assets/images/score.png" alt="">
                                           <span class="number  "><?php  echo $resultScore[0]['overall_score'];?></span>/
                                        <span class="title mb-0"><?php echo $resultMock[0]['marks']; ?> </span>
                                        <h6>Score</h6>
                                    </div>
                                </div>
                                <div class="col-md-2  sm-mb-30">
                                    <div class="counter-item three">
                                        <img class="count-img" src="assets/images/am.png" alt="">
                                         <span class="number rs-count "><?php  echo $resultScore[0]['attempted'];?></span>/
                                        <span class="title mb-0"><?php echo $resultMock[0]['questions']; ?> </span>
                                        <h6>Attempted</h6>
                                    </div>
                                </div>
                                 <div class="col-md-2  sm-mb-30">
                                    <div class="counter-item one">
                                        <img class="count-img" src="assets/images/a.png" alt="">
                                        <span class="number rs-count percent"><?php  
                                            if($resultScore[0]['correct']!=0 && $resultScore[0]['incorrect']!=0){
                                                echo round(($resultScore[0]['correct']/($resultScore[0]['correct']+$resultScore[0]['incorrect']))*100,2);
                                            }else{
                                                echo "0";
                                            }
                                        ?></span>
                                        <h6>Accuracy</h6>
                                    </div>
                                </div>
                                 <div class="col-md-3  sm-mb-30">
                                    <div class="counter-item three">
                                        <img class="count-img" src="assets/images/percent.png" alt="">
                                        <span class="number rs-count percent"><?php
                                        if($myRank!=0 && sizeof($resultRank)!=0){
                                            echo abs(round( 1-($myRank/sizeof($resultRank))*100,2));
                                        }else{
                                            echo "0";
                                        }
                                        
                                        
                                        ?> </span>
                                        <h6 >Percentile</h6>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-3">Sectional Summary</h4>
                            <div class="table-responsive">
                            <table class="table nowrap" style='box-shadow: 0 6px 25px rgba(0, 0, 0, 0.07);'>
                                <tr>
                                    <th>Section Name</th>
                                    <th>Score</th>
                                     <th>Attempted</th>
                                    <th>Correct</th>
                                    <th>Incorrect</th>
                                    <th>Accuracy</th>
                                    <th>Time</th>
                                </tr>        
                              
                                    <?php
                                        $sectionArr=json_decode($resultScore[0]['score'],true);
                                        foreach($sectionArr as $rowSection){
                                            ?>
                                            <tr>
                                                <td> <?php  echo $rowSection['name'];?></td>
                                                <td> <?php  echo $rowSection['score'];?></td>
                                                <td> <?php  echo $rowSection['attempted'];?></td>
                                                <td> <?php  echo $rowSection['correct'];?></td>
                                                <td> <?php  echo $rowSection['incorrect'];?></td>
                                                <td> <?php 
                                                if($rowSection['correct']>0){
                                                echo round( $rowSection['correct']/($rowSection['correct']+ $rowSection['incorrect'])*100,2);
                                                }else{
                                                    echo "0";
                                                }
                                                ?></td>
                                                <td> <?php  echo $rowSection['time_taken'];?></td>
                                               
                                            </tr>
                                            <?php
                                        }
                                    ?>
                          
                            </table> 
                            </div>
                            <br>
                            <h4  class="mb-3" >Comparison Analysis</h4>
                            <div class="table-responsive">
                            <table class="table nowrap" style='box-shadow: 0 6px 25px rgba(0, 0, 0, 0.07);'>
                                <tr>
                                    <th></th>
                                    <th>Score</th>
                                    <th>Accuracy</th>
                                    <th>Correct</th>
                                    <th>Incorrect</th>
                                    <th>Time</th>
                                </tr>        
                                    <tr>
                                        <td>You</td>
                                        <td><?php echo $resultScore[0]['overall_score']; ?></td>
                                        <td><?php
                                             
                                                     if(($resultScore[0]['correct']+$resultScore[0]['incorrect'])!=0){
                                                         echo is_nan(round(($resultScore[0]['correct']/($resultScore[0]['correct']+$resultScore[0]['incorrect']))*100,2));
                                                     }else{
                                                        echo "0";
                                                    }
                                        ?></td>
                                        <td><?php  echo $resultScore[0]['correct'];?></td>
                                        <td><?php  echo $resultScore[0]['incorrect'];?></td>
                                        <td><?php  echo $resultScore[0]['time_taken'];?></td>
                                    </tr>
                                     <tr>
                                        <td>Topper</td>
                                        <td><?php echo $resultRank[0]['overall_score']; ?></td>
                                        <td><?php
                                        if(($resultRank[0]['correct']+$resultRank[0]['incorrect'])!=0){
                                            echo round(($resultRank[0]['correct']/($resultRank[0]['correct']+$resultRank[0]['incorrect']))*100,2);
                                        }else{
                                            echo "0";
                                        }
                                        ?></td>
                                        <td><?php  echo $resultRank[0]['correct'];?></td>
                                        <td><?php  echo $resultRank[0]['incorrect'];?></td>
                                        <td><?php  echo $resultRank[0]['time_taken'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Average</td>
                                        <td><?php echo round(($avgScore/sizeof($resultRank)),2); ?></td>
                                        <td><?php echo round(($avgAccuracy/sizeof($resultRank)),2); ?></td>
                                        <td><?php echo round(($avgCorrect/sizeof($resultRank)),2); ?></td>
                                        <td><?php echo round(($avgIncorrect/sizeof($resultRank)),2); ?></td>
                                        <td><?php echo round(($avgTime/sizeof($resultRank))); ?> Mins</td>
                                       
                                    </tr>
                          
                            </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Counter Section End -->


        
        <!-- Main content End -->

        <!-- Footer Start -->
        <?php include("layout/footer.php"); ?>
        <!-- Footer End -->


        <!-- start scrollUp  -->
        <div id="scrollUp" class="green-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->


      
        <!-- info modal -->
        <!-- Button trigger modal -->

<div class="modal-form">
    <div class="modal fade rating-modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
             <form method="post" id='add-review'>
    
            <div class="modal-content">
        
                <div class="modal-top mb-0">
                    <button type="button" class="close close-arrow" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close mb-0"></span>
                    </button>
                    <h4 class="modal-title widget-title font-size-20">How would you rate this Mock?</h4>
                </div>
                <div class="course-rating-wrap p-4 text-center">
                                     <span style="color: red;" id="msg-lr"> </span>
                    <h3 class="widget-title padding-bottom-30px font-size-18">Select Rating</h3>
                    <div class="rating-shared rating-shared-2">
                  
                           <fieldset>
                            <input type='hidden' name='mid' id='mid' value="<?php echo $_GET['n'];?>">
                            
                            <input type="radio" id="star5" <?php if($rating<=5){ echo "checked";} ?>  name="rating" value="5"><label for="star5" data-toggle="tooltip" data-placement="top" title="Amazing, above expectations!"></label>
                            <input type="radio" id="star4" <?php if($rating<=4){ echo "checked";} ?>  name="rating" value="4"><label for="star4" data-toggle="tooltip" data-placement="top" title="Good, what i expected"></label>
                            <input type="radio" id="star3"  <?php if($rating<=3){ echo "checked";} ?> name="rating" value="3"><label for="star3" data-toggle="tooltip" data-placement="top" title="Average, could be better"></label>
                            <input type="radio" id="star2" <?php if($rating<=2){ echo "checked";} ?> name="rating" value="2"><label for="star2" data-toggle="tooltip" data-placement="top" title="Poor, pretty disappointed"></label>
                            <input type="radio" id="star1" <?php if($rating<=1){ echo "checked";} ?> name="rating" value="1"><label for="star1" data-toggle="tooltip" data-placement="top" title="Awful, not what i expected at all"></label>
                        </fieldset>

                    </div>
                </div><!-- end course-rating-wrap -->
                <div class="contact-form-action margin-top-35px">
                          
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-box">
                                                    <label class="label-text">Message<span class="primary-color-2 ml-1">*</span></label>
                                                    <div class="form-group">
                                                        <textarea class="message-control form-control" name="review" placeholder="Write message"><?php echo $feedback;?></textarea>
                                                        <i class="la la-pencil input-icon"></i>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <div class="custom-checkbox">-->
                                            <!--            <input type="checkbox" id="chb1">-->
                                            <!--            <label for="chb1">Save my name, and email in this browser for the next time I comment.</label>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div><!-- end col-lg-12 -->
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <?php  if(!empty($userInfo)){?>
                                                    <button class="theme-btn" id='saveReview' type="submit">submit review</button>
                                                    <?php }else{
                                                        ?>
                                                                      <a class="theme-btn" href="login">submit review</a>
                                                        <?php
                                                    } ?>
                                                </div>
                                            </div><!-- end col-md-12 -->
                                        </div><!-- end row -->
                                    
                                </div><!-- end contact-form-action -->
            </div><!-- end modal-content -->
            </form>
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->
        <!-- end of info modal-->
        <!-- modernizr js -->
        <script src="assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="lesson-detail/js/popper.min.js"></script>
        <script src="lesson-detail/js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="assets/js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="assets/js/jquery.nav.js"></script>
        <!-- owl.carousel js -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Slick js -->
        <script src="assets/js/slick.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <!-- wow js -->
        <script src="assets/js/wow.min.js"></script>
        <!-- Skill bar js -->
        <script src="assets/js/skill.bars.jquery.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>        
         <!-- counter top js -->
        <script src="assets/js/waypoints.min.js"></script>
        <!-- video js -->
        <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
        <!-- magnific popup js -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- tilt js -->
        <script src="assets/js/tilt.jquery.min.js"></script>      
        <!-- plugins js -->
        <script src="assets/js/plugins.js"></script>
              <script src="assets/js/loginform.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>
        <script>
        //   $('input[type=radio]').click(function(){
        //     var rate=$(this).val();  
        //          $.ajax({
        //                  url:'review/usermockreview',
        //                  type: 'POST',
        //                  data: {'rating':rate,'scoreid':<?php echo $resultScore[0]['id']; ?>},
        //                  success: function (data) {
                        
        //                  }
        //              });
        //   })
        
        //add review 
    $("form#add-review").submit(function(e) {
  
    e.preventDefault();    
    var formData = new FormData(this);
$("#saveReview").attr("disabled", true);
$("#saveReview").html("<i class='fa fa-circle-o-notch fa-spin'></i> Updating..");
   $.ajax({
        url:'review/usermockreview',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {
                if(data.type=="error"){
                      $("#msg-lr").html(data.message);
                     $("#msg-lr").css("color","red");
                  $("#msg-lr").fadeIn();
                  $('#saveReview').attr("disabled", false);
                        $('#saveReview').val("submit review");
                     
                }else{
                    
                       $("#msg-lr").html(data.message);
                        $("#msg-lr").css("color","green");
                          $("#msg-lr").fadeIn();
                              
                              $(".rating-modal-form").modal('hide');
                        
                }
                  $("#saveReview").attr("disabled", false);
                  $("#saveReview").html('submit review');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 
<?php if(empty($resultMockRate)){ ?>
$("#rateBtn").trigger("click");
<?php } ?>
        </script>
<?php include("layout/noti.php"); ?>  
       
    </body>

</html>