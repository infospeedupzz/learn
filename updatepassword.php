<?php include('layout/session.php'); 
if(empty($userInfo)){
    echo"Error 400";
    die();
}
 include_once 'objects/user.php';
    $user = new User($db);
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects

 $success_message = '';  
 if(isset($_SESSION['userId']) && isset($_POST["oldpass"]))  
 {  
        if($_POST['newpass']==$_POST['confirmpass']){
 
        if($userInfo[0]['password']===$_POST['oldpass']){
        $user->password = $_POST['newpass'];
        $user->id = $_SESSION['userId'];
          $result=$user->newpass();
        if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Password updated successfully."
            );
        
        }
        else{
             $response = array(
                    "type" => "error",
                    "message" => "Error to update password."
                );
            }
        }else{
            $response = array(
                    "type" => "error",
                    "message" => "Old Password not match."
                );
            }
        }else{
            $response = array(
                    "type" => "error",
                    "message" => "Confirm password not match."
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