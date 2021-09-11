<?php include("layout/session.php"); 

if(isset($_POST['table']) && isset($_POST['id'])){
  $table=$_POST['table'];
  $id=$_POST['id'];
  $by=$_POST['by'];
 $data =array(); 

 		             $pArr= array($by=>$id); 
					$result=$functionClass->getRowsByWhere($table,$by."=:".$by,$pArr);
					
                        if(!empty($result)){

                        foreach($result as $rowC){
                   
                        		 $data[]=$rowC;
                        		
                        	
                       } 
                   } 
 echo json_encode($data);
}