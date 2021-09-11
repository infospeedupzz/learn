<?php include ('layout/innersession.php');
if(isset($_POST['qid'])){
 $data =array(); 

                    $conArr=array("id"=>$_POST['qid']);  
					$result=$functionClass->getRowsByWhere("mock_questions","id=:id",$conArr);
                        if(!empty($result)){
                        foreach($result as $rowC){
                        		 $data[]=$rowC;
                       } 
                   } 
 echo json_encode($data);
}