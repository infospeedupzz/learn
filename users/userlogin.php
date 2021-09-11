<?php session_start();  
include_once '../config/getConnection.php';
include_once '../objects/functionClass.php'; 
 include_once '../objects/user.php'; 
 $functionClass = new functionClass($db);
 
 date_default_timezone_set("Asia/Kolkata");
        
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
	$user = new User($db);  
 if(isset($_POST["username"]) && isset($_POST['loginpass']))  
 {  
     
 
    if(!empty($_POST["username"])&& !empty($_POST['loginpass'])){

    $user->phone = $_POST['username'];
    $user->password = $_POST['loginpass'];
    // create the product
        $result=$user->login();
    if($result!=false){
        $_SESSION['userId']=$result;

          $letter =md5(chr(rand(65,90)).$result);
                 $expire = time() + 86400; // expires in one day
                setcookie('5180837cc66eeb809385dc2d52ff348c',$letter,$expire, "/",'',true,true);
                $upLogin=array('login_cookie'=>$letter,'id'=>$result);
                $functionClass->updateByQ('users','login_cookie=:login_cookie where id=:id',$upLogin);
        
        
     $response = array(
            "type" => "success",
            "message" => "Login successfully."
        );
    }
    else{
     $response = array(
            "type" => "error",
            "message" => "Invaid username or password."
        );
    }
      
    

    }else{
        $response = array(
            "type" => "error",
            "message" => "Invaid details."
        );
    }
     
       echo json_encode($response);
    
 }  
 ?>