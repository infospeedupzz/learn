<?php include ('layout/innersession.php');

if(isset($_POST['mock_id']) && isset($_POST['subject_id'])){
     $data =array();
    $conArr=array("mock_id"=>$_POST['mock_id'],"subject_id"=>$_POST['subject_id']);    
    $resultM=$functionClass->getRowsByWhere("mock_questions","mock_id=:mock_id and subject_id=:subject_id",$conArr);
           if(!empty($resultM)){
                        foreach($resultM as $rowM){
                        		 $data[]=$rowM;
                       } 
                   } 
 echo json_encode($data);
}    