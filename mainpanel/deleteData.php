<?php include("layout/session.php"); 
 $response =array("type" => "",
            "message" => "");    
 if(isset($_POST["id"]) && isset($_POST['type']))  
 { 
                        if($_POST['type']=="mock"){
                          $resultData=$functionClass->getRowsByID("mock_questions"," mock_id ",$_POST['id']);
                          if(empty($resultData)){
                            $result=$functionClass->deleteDataID($_POST['type'],$_POST['id']);
                          
                          if($result==true){
                             $response = array(
                                    "type" => "success",
                                    "message" => "Mock name already exist"
                                );
                          }
                          else{
                              $response = array(
                                    "type" => "error",
                                    "message" => "something went worng"
                                );
                              }
                          }else{
                               $response = array(
                                    "type" => "error",
                                    "message" => "This mock is has Questions"
                                );
                              }
                          
                        }else{

                           $result=$functionClass->deleteDataID($_POST['type'],$_POST['cid']);
                          if($result==true){
                             $response = array(
                                    "type" => "success",
                                    "message" => "Mock name already exist"
                                );
                          }
                          else{
                              $response = array(
                                    "type" => "error",
                                    "message" => "something went worng"
                                );
                              }
                        }
                            
                           
       echo json_encode($response);                    
 } 
?>