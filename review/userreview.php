<?php   session_start();  
include_once '../config/getConnection.php';
 include_once '../objects/review.php';
 include_once '../objects/functionClass.php'; 
 $functionClass = new functionClass($db);
    $homerating = new Review($db);
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
 
 $success_message = '';  
 if(isset($_POST["review"]) && isset($_POST["rating"]))  
 {  
         $ip=$functionClass->getIPAddress();
    
        $homerating->review = $_POST['review'];
        $homerating->rating = $_POST['rating'];
        $homerating->ip = $ip;
         $result=$homerating->create();
        if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Review created."
            );
        }else{
             $response = array(
                    "type" => "error",
                    
                        "message" => "Error to create review."
                );
        } 

    
}else{
         $response = array(
                    "type" => "error",
                    "message" => "Invalid data"
                );
    }
    
   
   
    echo json_encode($response);
 
 ?>