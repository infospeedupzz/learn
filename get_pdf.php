<?php include($_SERVER['DOCUMENT_ROOT'].'/layout/session.php');

if(isset($_POST['id'])){
     $data =array();
    $conArr=array("module_id"=>$_POST['id']);    
    $resultM=$functionClass->getRowsByWhere("pdfs","module_id=:module_id",$conArr);
           if(!empty($resultM)){
                        foreach($resultM as $rowM){
                        		 $data[]=$rowM;
                       } 
                   } 
 echo json_encode($data);
}    