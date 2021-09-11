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
      $conArrP= array(
        "course_id" => $_POST['course_id']
    );
    $resultP = $functionClass->getRowsByWhere("previous_papers", "course_id=:course_id", $conArrP);
    foreach($resultP as $rowP){
    $chk=1;
    ?>
                                <div class="courses-item " style='width:100%'>
                                  
                                    <div class="content-part" style='width:100%'>
                                       
                                       
                                        <div class="bottom-part">
                                             <div class="title float-left" style='margin:2px;'><a href="javascript:void(0)" title="click on view button"><?php echo $rowP['name']."(".$rowP['year'].")"; ?></a></div>
                                            
                                             <div class="btn-part float-right start-btn">
                                                 <?php if(!empty($_SESSION['userId'])){ ?> 
                                                    <a  class="readon1 green-btn" style='padding: 6px 61px;' data-fancybox data-type="iframe" data-src="previous-pdf?q=<?php echo str_replace(" ","-", $rowP['name']); ?>&n=<?php echo $functionClass->EN($rowP['id']); ?>#toolbar=0" href="javascript:;" >View  </a>
                                                 <?php }else{?>
                                                 <a class="readon1 green-btn" style='padding: 6px 61px;' href="#" data-toggle="modal" data-target="#loginModal">View  </a>
                                                <?php }?>
                               
  </div>
                                           
                                        </div>
                                      
                                    </div>
                                      
                                </div>
                                <?php } 
    if ($chk == 0)
    {

?>
                       <div class='col-md-12'>
                           <h2 class='text-center mt-100'>No Data Available</h2>
                       </div>
                       <?php
    }

}

?>

  
  
  
