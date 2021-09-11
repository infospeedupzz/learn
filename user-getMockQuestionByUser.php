<?php include ('layout/innersession.php');
if(isset($_POST['qid'])){
 $data =array(); 
   $countt=0;
   $num=$_POST['num']-1;       
       

                    $conArr=array("id"=>$_POST['qid']);  
					$result=$functionClass->getRowsByWhere("mock_questions","id=:id",$conArr);
                        if(!empty($result)){
                        foreach($result as $rowC){
                                //select mock score
                                $oldScoreArr=array();
                                    $sconArrScore=array("mock_id"=>$rowC['mock_id'],"user_id"=>$_SESSION['userId']);    
                                    $resultS = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id", $sconArrScore);
                                         $olduser_answerArr=json_decode($resultS[0]['user_answers'],true);
                                        
                                //existing ans data 
                        		 $data[]=$rowC;
                        		 $data[$countt]['user_answer'] = $olduser_answerArr[$num]['user_answer'];
                        		 $data[$countt]['correct_answer'] = $olduser_answerArr[$num]['correct_answer'];
                        		 $countt++;
                        		 $num++;
                       } 
                   } 
 echo json_encode($data);
}