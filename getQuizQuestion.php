<?php include ('layout/innersession.php');
if(isset($_POST['qid'])){
 $data =array(); 

                    $conArr=array("quiz_id"=>$_POST['qid']);  
					$result=$functionClass->getRowsByWhere("quiz_questions","quiz_id=:quiz_id",$conArr);
                        if(!empty($result)){
                        foreach($result as $rowC){
                        		 $data[]=$rowC;
                       } 
                   } 
 echo json_encode($data);
}