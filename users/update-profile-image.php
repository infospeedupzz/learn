<?php 
echo $_FILES['img']['tmp_name'];
die();

  session_start();  
include_once '../config/getConnection.php';
 include_once '../objects/user.php';
 include_once '../objects/functionClass.php'; 
 $functionClass = new functionClass($db);
    $user = new User($db);
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects

 $success_message = '';  
 if(isset($_SESSION['userId']) && isset($_POST["cpass"]))  
 {  
 
      
     if($_POST['newpass']!=$_POST['confirmpass']){
                     $response = array(
                                    "type" => "error",
                                    "message" => "Confirm pass not match."
                                );
                                 echo json_encode($response);
                                 die();
     }
      
  if(strlen($_POST["newpass"])<6){
             $response = array(
                    "type" => "error",
                    "message" => "Password must be greater then 6 character."
                );
                 echo json_encode($response);
                 die();
     }

     
        $user->opassword = $_POST['cpass'];
        $user->password = $_POST['newpass'];
        $user->id = $_SESSION['userId'];
        if($user->chkPass()!==false){

          $result=$user->updatePass();
        
        if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "password updated."
            );
         
        }
     
        // if unable to create the product, tell the user
        else{
             $response = array(
                    "type" => "error",
                    "message" => "Error to update password."
                );
            }   
        }else{
           $response = array(
                    "type" => "error",
                    "message" => "Current password not match."
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
