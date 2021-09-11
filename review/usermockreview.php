<?php session_start();  
 date_default_timezone_set("Asia/Kolkata");
include_once '../config/getConnection.php';
 include_once '../objects/mockreview.php';
 include_once '../objects/functionClass.php'; 
 $functionClass = new functionClass($db);
    $homerating = new Mockreview($db);
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
 

if(empty($_SESSION['userId'])){
 $response = array(
                    "type" => "error",
                   "message" => "login for review."
                );
    
}else{
if(isset($_POST["review"]) && isset($_POST["rating"]))  
 {  
   
 
    
        $homerating->review = $_POST['review'];
        $homerating->rate = $_POST['rating'];
        $homerating->mock_id = $functionClass->DE($_POST['mid']);
        $homerating->user_id =  $_SESSION['userId'];
     
         // create the product
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
}    
   
   
    echo json_encode($response);
 ?>
 


 