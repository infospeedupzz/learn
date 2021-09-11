<?php include ('layout/innersession.php');

if(isset($_POST['mock_id']) && isset($_POST['subject_id']) && isset($_POST['startnum'])){
    $countt1=$_POST['startnum']-1;
    $countt=0;
     $data =array();
    $conArr=array("mock_id"=>$_POST['mock_id'],"subject_id"=>$_POST['subject_id']);    
    $resultM=$functionClass->getRowsByWhere("mock_questions","mock_id=:mock_id and subject_id=:subject_id",$conArr);
     $oldScoreArr=array();
            //select mock score and update 
                $sconArr=array("mock_id"=>$_POST['mock_id'],"user_id"=>$_SESSION['userId']);    
                $resultS = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id", $sconArr);
            //existing ans data 
          
            $olduser_answerArr=json_decode($resultS[0]['user_answers'],true);
          if(!empty($resultM)){
                        foreach($resultM as $rowM){
                        		 $data[]=$rowM;
                        		 
                        		 $data[$countt]['user_answer'] = $olduser_answerArr[$countt1]['user_answer'];
                        		 $data[$countt]['correct_answer'] = $olduser_answerArr[$countt1]['correct_answer'];
                        		 $countt++;
                        		 $countt1++;
                      } 
                  } 
                 
echo json_encode($data);
}    
           