<?php include('layout/session.php');

if(empty($userInfo)){
 $response = array(
                    "type" => "error",
                   "message" => "login for contact us."
                );
    
}else{
if(isset($_POST["name"]) && isset($_POST["email"]))  
 {  
     if(empty($_POST["name"])){
          $response = array(
                    "type" => "error",
                   "message" => "Name is required."
                );
                  
            echo json_encode($response);
        die();
     }  if(empty($_POST["email"])){
          $response = array(
                    "type" => "error",
                   "message" => "email is required."
                );
                  
            echo json_encode($response);
        die();
     }
     
       if(!empty($_POST['email'])){
                   if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                     
                       $response = array(
                                    "type" => "error",
                                    "message" => "Invalid email format."
                                );
                                 echo json_encode($response);
                                 die();
                   }
                  
    }
    if(empty($_POST["subject"])){
          $response = array(
                    "type" => "error",
                   "message" => "Subject is required."
                );
                  
            echo json_encode($response);
        die();
     }
     if(empty($_POST["phone"])){
          $response = array(
                    "type" => "error",
                   "message" => "Phone no is required."
                );
                  
            echo json_encode($response);
        die();
     }
     if(!is_numeric($_POST['phone'])){
                 $response = array(
                    "type" => "error",
                    "message" => "Invaid mobile number"
                );
                echo json_encode($response); 
                die();
        }
     include_once 'objects/createContact.php';
         $homerating = new Createcontact($db);
        $homerating->name = $_POST['name'];
        $homerating->email = $_POST['email'];
        $homerating->phone = $_POST['phone'];
        $homerating->subject = $_POST['subject'];
        $homerating->message = $_POST['message'];
        $homerating->user_id = $userInfo[0]['id'];
     
         // create the product
            $result=$homerating->create();
        if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Your query have been sent to the team. They will revert back soon"
            );
        }else{
             $response = array(
                    "type" => "error",
                    
                        "message" => "Error to create query."
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
 