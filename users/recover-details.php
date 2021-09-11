<?php   session_start();  
include_once '../config/getConnection.php';
 include_once '../objects/user.php';
    $user = new User($db);
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects

 $success_message = '';  

 if(isset($_SESSION['recoverPhone']) && isset($_SESSION["recoverOTP"]))  
 {  
     
         if(is_numeric($_POST['mobile'])){
       
            if(strlen($_POST["mobile"])!=10){
             $response = array(
                    "type" => "error",
                    "message" => "Invalid phone No."
                );
                 echo json_encode($response);
                 die();
         } 
         }else{
             $response = array(
                    "type" => "error",
                    "message" => "Invalid phone No."
                );
                 echo json_encode($response);
                 die();
         }
      if(strlen($_POST["password"])<6){
             $response = array(
                    "type" => "error",
                    "message" => "Password must be greater then 6 character."
                );
                 echo json_encode($response);
                 die();
     }
     if($_POST['cmobile']!=$_POST['mobile']){
          $response = array(
                    "type" => "error",
                    "message" => "Confirm Mobile is not match  ."
                );
                  echo json_encode($response);
                 die();
     } 
     if($_POST['cpassword']!=$_POST['password']){
          $response = array(
                    "type" => "error",
                    "message" => "Confirm Password is not match  ."
                );
                  echo json_encode($response);
                 die();
     }

    
        $user->username = $_SESSION['recoverPhone'];
        $user->mobile = $_POST['mobile'];
        $user->password = $_POST['password'];
        $user->dob = $_POST['dob'];
          $result=$user->recover();
        if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Password recover succssfully."
            );
         $_SESSION['recoverPhone']="";
         $_SESSION['recoverOTP']="";
        }
     
        // if unable to create the product, tell the user
        else{
             $response = array(
                    "type" => "error",
                    "message" => "Error to recover password."
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