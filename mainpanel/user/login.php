<?php session_start();
include_once '../config/getConnection.php';
 include_once '../objects/login.php'; 

 $response =array("type" => "",
            "message" => ""); 
  $adminLogin = new adminLogin($db);  
 if(isset($_POST["username"]))  
 {  
    
    $adminLogin->username = $_POST['username'];
    $adminLogin->password = $_POST['password'];
    // create the product
         $result=$adminLogin->login();
        
    if($result!=false){
        $_SESSION['mainId']=$result;
        $_SESSION['mainName']=$_POST['username'];
        
        $response = array(
            "type" => "success",
            "message" => "Wrong details."
        );
    }
    else{
     $response = array(
            "type" => "error",
            "message" => "Wrong details."
        );
    }
}else{
	 $response = array(
            "type" => "error",
            "message" => "Invalid details."
        );

}
  echo json_encode($response); 

  