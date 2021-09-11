<?php include($_SERVER['DOCUMENT_ROOT'].'/layout/session.php');

if(isset($_POST['n'])){
$limit=$_POST['limit'];
$courseid=$functionClass->DE($_POST['n']);
                                    $carr=array("course_id"=>$courseid);
                                    
                                    $resultR=$functionClass->getRowsByWhere("course_review","course_id=:course_id order by id DESC limit $limit",$carr);
                                        foreach($resultR as $rowR){
                                            $conArr11=array("user_id"=>$rowR['user_id']);    
                                            $resultU=$functionClass->getRowsByWhere("users","id=:user_id",$conArr11);

                                    ?>
                                    <div class="comment">
                                        <div class="comment-avatar">
                                            <?php /* if(!empty($userInfo[0]['profile_pic'])){?>
                                            <img class="avatar__img" alt="" src="<?php echo $userInfo[0]['profile_pic']; ?>">
                                            <?php }else{ ?>
                                              <img class="avatar__img" alt="" src="../assets/images/useravtar.png">
                                            <?php } */ ?>
                                            <img class="avatar__img" style='width:50px; height:50px;' alt="" src="../../../assets/images/useravtar.png">
                                        </div>
                                        <div class="comment-body" style='width:100%'>
                                            <div class="meta-data">
                                                <h3 class="comment__author"><?php echo $resultU[0]['fullname']; ?></h3>
                                                <p class="comment__date"><?php echo date("d M,Y H:isa"); ?></p>
                                                <ul class="review-stars review-stars1">
                                                    <?php for( $r=1; $r<6;$r++ ){ 
                                                        if($rowR['rate']>=$r){
                                                    ?>
                                                    <li><span class="la la-star"></span></li>
                                                    <?php 
                                                        }else{
                                                            ?>
                                                            
                                                    <li><span class="la la-star-o"></span></li>
                                                            <?php 
                                                        }
                                                        } 
                                                    ?>
                                                </ul>
                                            </div>
                                            <p class="comment-content">
                                                <?php echo $rowR['review']; ?>
                                            </p>
                                        </div>
                                    </div><!-- end comment -->
                                   <?php } 
    
}
                                   