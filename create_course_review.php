<?php include('layout/session.php');

if(empty($userInfo)){
 $response = array(
                    "type" => "error",
                   "message" => "login for review."
                );
    
}else{
if(isset($_POST["review"]) && isset($_POST["rating"]))  
 {  
     include_once 'objects/courseReview.php';
         $homerating = new Coursereview($db);
 
    
        $homerating->review = $_POST['review'];
        $homerating->rate = $_POST['rating'];
        $homerating->course_id = $courseid=$functionClass->DE($_POST['cid']);
        $homerating->user_id = $userInfo[0]['id'];
     
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
 