<?php   session_start();  
include_once '../config/getConnection.php';
 include_once '../objects/user.php';
 include_once '../objects/functionClass.php'; 
 $functionClass = new functionClass($db);
    $user = new User($db);
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
 
 $success_message = '';  
 if(isset($_POST["mobile"]) && isset($_POST["email"]))  
 {  

         if(empty($_POST['fullname'])){
                 $response = array(
                    "type" => "error",
                    "message" => "Name number is required"
                );
                echo json_encode($response); 
                die();
        }
        if(empty($_POST['email'])){
                 $response = array(
                    "type" => "error",
                    "message" => "Email is required"
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
                   //check email exist or not
                    if($user->chkEmail($_POST['email'])==true){
                                    $response = array(
                                    "type" => "error",
                                    "message" => "User email already exist "
                                );
                                 echo json_encode($response);
                                 die();
                            }
    }
    if(empty($_POST['mobile'])){
                 $response = array(
                    "type" => "error",
                    "message" => "Mobile number is required"
                );
                echo json_encode($response); 
                die();
        }
        if(empty($_POST['password'])){
                 $response = array(
                    "type" => "error",
                    "message" => "Password number is required"
                );
                echo json_encode($response); 
                die();
        }
        if($_POST['password']!==$_POST['confirmPassword']){
                 $response = array(
                    "type" => "error",
                    "message" => "Confirm Password not match"
                );
                echo json_encode($response); 
                die();
        }
          if(!is_numeric($_POST['mobile'])){
                 $response = array(
                    "type" => "error",
                    "message" => "Invaid mobile number"
                );
                echo json_encode($response); 
                die();
        }
         //check mobile exist or not
            if($user->chkMobile($_POST['mobile'])==true){
                                    $response = array(
                                    "type" => "error",
                                    "message" => "User mobile number already exist "
                                );
                                 echo json_encode($response);
                                 die();
                            }
     
          $user->fullname = $_POST['fullname'];
        $user->email = $_POST['email'];
        $user->mobile = $_POST['mobile'];
        $user->password = $_POST['password'];
          $result=$user->create();
        if($result!=false){
            
               $_SESSION['userId']=$result;
            $letter =md5(chr(rand(65,90)).$result);
                    $expire = time() + 86400; // expires in one day
                setcookie('5180837cc66eeb809385dc2d52ff348c',$letter,$expire, "/",'',true,true);
                $upLogin=array('login_cookie'=>$letter,'id'=>$result);
             
                
                $functionClass->updateByQ('users','login_cookie=:login_cookie where id=:id',$upLogin);
         $response = array(
                "type" => "success",
                "message" => "User registered."
            );
         
        }
     
        // if unable to create the product, tell the user
        else{
             $response = array(
                    "type" => "error",
                    "message" => "User already exsit."
                );
            }   
   
     echo json_encode($response); 
 }else{
      $response = array(
                    "type" => "error",
                    "message" => "Invalid data"
                );
    echo json_encode($response); 
     
 }
 ?>