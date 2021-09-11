<?php include ('layout/innersession.php');
$colorArr = array(
    "#c9dbff",
    "#5fa4ef99",
    "#dc354542",
    "#ff845f47",
    "#03a84e54"
);
$chk = 0;
if (isset($_POST['course_id']))
{
  $shortBy=$_POST['shortBy'];
  if($shortBy==='status_ASC'){
    $shortBy="status ASC";
  }else if($shortBy==='status_DESC'){
      $shortBy="status DESC";
  }else if($shortBy==='ASC'){
      $shortBy="id ASC";
  }else{
     $shortBy="id DESC";
  }
    $usermock_purchaged=array();
     //get user purched mock id  if login 
    if(!empty($userInfo)){
         $conArrusermock = array(
            "user_id" => $_SESSION['userId'],
            "date" => date("Y-m-d")
        );
        $resultUM = $functionClass->getRowsByWhere("mock_purchages", "user_id=:user_id and expiry_date>=:date", $conArrusermock);
        $count=0;
        foreach($resultUM as $rowUM){
            $count++;
            $usermock_purchaged[$count]=$rowUM['mock_id'];
        }
    }
    //end of  get user purched mock id  if login 
    $conArrMock = array(
        "course_id" => $_POST['course_id'],
        "publish" => 'True',
        "package_id"=>',,'
    );

    $resultM = $functionClass->getRowsByWhere("mock", "course_id=:course_id and publish=:publish and package_id=:package_id order by  $shortBy ", $conArrMock);

    $conArrCourse = array(
        "id" => $_POST['course_id']
    );
    $resultCourse = $functionClass->getRowsByWhere("course", "id=:id", $conArrCourse);

    foreach ($resultM as $rowM)
    {
        if ($rowM['status'] == "Free")
        {
               $chk = 1;
            //FREE MOCK CODE
            
?> 

                        <div class="col-lg-4 lazy">
                              <div class="card-item card-preview tooltipstered text-center" data-tooltip-content="#tooltip_content_1">
                                 <div class="card-image">
                                    <a href="javascript:void(0)" class="card__img ">
                                        <img class='mt-3 lazy' style="width:70px;" src="Learnish/<?php echo $rowM['img']; ?>" alt="<?php echo $rowM['title']; ?>" ></a>
                                  <div class="card-badge">
                                       <span class="badge-label">Free</span>
                                    </div>
                                 </div>
                                 <!-- end card-image -->
                                 <div class="card-content">
                                    <p class="card__label">
                                  
                                       <a href="#" class="card__collection-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist"><span class="la la-heart-o"></span></a>
                                    </p>
                                    <h3 class="card__title">
                                       <a href="javascript:void(0)"><?php echo $rowM['title']; ?></a>
                                       
                                    </h3>
                                       <div style='width:100%;text-align:center'>   
                                       <div class="rating-wrap">
                                       <ul class="review-stars ">
                                          <?php $randVal=rand(3,6); 
                                                for($r=0;$r<5;$r++){
                                                    if($r<=$randVal){
                                                    ?>
                                                     <li><span class="fa fa-star"></span></li>
                                                    <?php
                                                    }else{
                                                        ?>
                                                    <li><span class="fa fa-star-o"></span></li>    
                                                        <?php
                                                    }
                                                }
                                           ?>   
                                       </ul>
                                       <span class="star-rating-wrap">
                                           <?php echo $resultCourse[0]['name']; ?>
                                       </span>
                                        
                                    </div>
                                    </div> 
                                 
                                    <!-- end rating-wrap -->
                                    <div class="card-action sidebar-feature">
                                        
                                      <ul class="list-items fe">
                                <li>
                                    <span><i class="fa fa-question-circle"></i> Total Questions</span>
                                    <span><?php echo $rowM['questions']; ?></span>
                                </li>
                                <li>
                                    <span><i class="fa fa-clock-o"></i> Max Time</span>
                                    <span><?php echo $rowM['max_time']; ?> Min</span>
                                </li>
                                <li>
                                    <span><i class="fa fa-check-circle" aria-hidden="true"></i> Total Marks</span>
                                    <span><?php echo $rowM['marks']; ?></span>
                                </li>
                            </ul>
                                    </div>
                                    <!-- end card-action -->
                                    <div class="card-price-wrap text-center justify-content-between align-items-center" style='height:35px;'>
                                      <?php if(!empty($userInfo)){ 
                                                     $conArrScore = array(
                                                        "mock_id" => $rowM['id'],
                                                        "user_id" => $_SESSION['userId']
                                                        
                                                    );
                                                    $resultScore = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id ", $conArrScore);
                                                    if(!empty($resultScore)){
                                                    ?>
                                       <a href="mock-solution/<?php echo str_replace(" ","-", $rowM['title']); ?>/<?php echo $functionClass->EN($rowM['id']);?>" style='padding:0 5% 0 5%; width:auto;' class="theme-btn float-left">Solutions</a>
                                       <a href="analysis/<?php echo str_replace(" ","-", $rowM['title']); ?>/<?php echo $functionClass->EN($rowM['id']);?>" style='padding:0 5% 0 5%; width:auto;' class="theme-btn theme-btn-light float-right">Analysis</a>
                                     <?php }else{ ?>
                                       <a href="mock-instruction/<?php echo str_replace(" ","-", $rowM['title']); ?>/<?php echo $functionClass->EN($rowM['id']);?>" style='padding:0 5% 0 5%; width:auto;' class="theme-btn ">Attempt Now</a>

                                       <?php } }else{?>
                                        <a href="#" data-toggle="modal" data-target="#loginModal" style='padding:0 5% 0 5%; width:auto;' class="theme-btn ">Attempt Now</a>
                                        <?php } ?>
                                    </div>
                                    <!-- end card-price-wrap -->
                                 </div>
                                 <!-- end card-content -->
                              </div>
                              <!-- end card-item -->
                           </div>

            					  
					                    
					                    <?php
        }
    }
    //MOCK PACKAGE CODE
    
 $usermock_purchaged=array();
     //get user purched mock id  if login 
    if(!empty($_SESSION['userId'])){
         $conArrusermock = array(
            "user_id" => $_SESSION['userId'],
            "date" => date("Y-m-d")
        );
        $resultUM = $functionClass->getRowsByWhere("mock_purchages", "user_id=:user_id and expiry_date>=:date", $conArrusermock);
        $count=0;
        foreach($resultUM as $rowUM){
            $count++;
            $usermock_purchaged[$count]=$rowUM['mock_id'];
        }
    }
    $arrP=array( "publish" => 'True');
    $resultP = $functionClass->getRowsByWhere("mock_packages","publish=:publish order by  $shortBy",$arrP);
   
    if (!empty($resultP))
    {
        foreach ($resultP as $rowP)
        {
          
            $courseArr = json_decode($rowP['courses_id']);
            if (in_array($_POST['course_id'], $courseArr))
            {
                
                $chk = 1;

           
           
           $chkPaid=0;
           $chkPUB=0;
            $conArrMock= array(
             ':var1'=>','.$rowP['id'].',',
            "publish" => 'True'
            );  
          $resultM=$functionClass->getRowsByWhere("mock"," package_id LIKE CONCAT('%', :var1, '%') and publish=:publish order by status DESC
           ",$conArrMock);
     
               
            foreach($resultM as $rowM){
                if(in_array($rowM['id'],$usermock_purchaged)){
                    $chkPaid=1;
                }
            }
            if(sizeof($resultM)>0){
                $chkPUB=1;
            }
      
          if($chkPUB==1){  
?>

<div class="col-lg-4 lazy">
                              <div class="card-item card-preview tooltipstered text-center" data-tooltip-content="#tooltip_content_1">
                                 <div class="card-image">
                                    <a href="javascript:void(0)" class="card__img ">
                                        <img class='mt-3 lazy' style="width:70px;" src="Learnish/<?php echo $resultM[0]['img']; ?>" alt="<?php echo $rowP['title']; ?>" ></a>
                                  <div class="card-badge">
                                       <span class="badge-label1">Paid</span>
                                    </div>
                                 </div>
                                 <!-- end card-image -->
                                 <div class="card-content">
                                    <p class="card__label">
                                  
                                       <a href="#" class="card__collection-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist"><span class="la la-heart-o"></span></a>
                                    </p>
                                    <h3 class="card__title">
                                       <a href="javascript:void(0)"><?php echo $rowP['title']; ?></a>
                                       
                                    </h3>
                                       <div style='width:100%;text-align:center'>   
                                       <div class="rating-wrap">
                                       <ul class="review-stars ">
                                           <?php $randVal=rand(3,6); 
                                                for($r=0;$r<5;$r++){
                                                    if($r<=$randVal){
                                                    ?>
                                                     <li><span class="fa fa-star"></span></li>
                                                    <?php
                                                    }else{
                                                        ?>
                                                    <li><span class="fa fa-star-o"></span></li>    
                                                        <?php
                                                    }
                                                }
                                           ?>   
                                           
                                      
                                       </ul>
                                       <span class="star-rating-wrap">
                                           <?php echo $resultCourse[0]['name']; ?>
                                       </span>
                                        
                                    </div>
                                    </div> 
                                 
                                    <!-- end rating-wrap -->
                                    <div class="card-action sidebar-feature">
                                        
                                      <ul class="list-items fe">
                                <li>
                                    <span><i class="fa fa-check-circle" aria-hidden="true"></i> Quantity</span>
                                    <span><?php echo $rowP['quantity']; ?></span>
                                </li>
                                <li>
                                    <span><i class="fa fa-money"></i> Price</span>
                                    <span><del>Rs. <?php echo $rowP['price']; ?></del></span>
                                </li>
                                <li>
                                    <span><i class="fa fa-money" aria-hidden="true"></i> Offer Price</span>
                                    <span>Rs. <?php echo $rowP['after_discount']; ?></span>
                                </li>
                                
                            </ul>
                                    </div>
                                    <!-- end card-action -->
                                    <div class="card-price-wrap text-center justify-content-between align-items-center" style='height:35px;'>
                                    
                                    <?php if(!empty($userInfo)){ 
                                    
                                                    if($chkPaid==0){
                                    ?>
                                    <a href="test-series/<?php echo str_replace(" ","-", $rowP['title']); ?>/<?php echo $functionClass->EN ($rowP['id']);?>" style='padding:0 5% 0 5%; width:auto;' class="theme-btn float-left">View</a>
                                     <a href="#" onclick="setModel('<?php echo $functionClass->EN ($rowP['id']);?>','<?php echo $rowP['title']; ?>')"  data-toggle="modal" data-target="#myModal" style='padding:0 5% 0 5%; width:auto;' class="theme-btn theme-btn-light float-right">Unlock Now</a>
                                   
                                    <?php }else{ ?>
                                    <a href="test-series/<?php echo str_replace(" ","-", $rowP['title']); ?>/<?php echo $functionClass->EN ($rowP['id']);?>" style='padding:0 5% 0 5%; width:auto;' class="theme-btn ">View Test Series</a>
                                    <?php
                                    } }else{ ?>
                                       <a href="test-series/<?php echo str_replace(" ","-", $rowP['title']); ?>/<?php echo $functionClass->EN ($rowP['id']);?>" style='padding:0 5% 0 5%; width:auto;' class="theme-btn float-left">View</a>  
                                    <a href="#" data-toggle="modal" data-target="#loginModal" class="theme-btn theme-btn-light float-right">Unlock Now</a>
                                    <?php } ?>
                                

                                       
                                    </div>
                                    <!-- end card-price-wrap -->
                                 </div>
                                 <!-- end card-content -->
                              </div>
                              <!-- end card-item -->
                           </div>


                
                        	<?php
            }
                
            }
        }

    }
    if ($chk == 0)
    {

?>
                       <div class='col-md-12'>
                           <h2 class='text-center mt-100'>No Data Available</h2>
                       </div>
                       <?php
    }

}

