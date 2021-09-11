<?php  session_start();
 include_once '../config/getConnection.php';
 include_once '../objects/user.php';
 include_once '../objects/functionClass.php';
  // pass connection to objects
	$user = new User($db);  
	$functionClass = new FunctionClass($db);  

 $response =array("type" => "",
            "message" => ""); 
if(isset($_POST['phone']) && isset($_POST['otp'])){
            if($_POST['otp']==$_SESSION['recoverOTP'] &&  $_SESSION['recoverPhone']==$_POST['phone']){
                 $response = array(
                    "type" => "success",
                    "message" => "Otp verified.",
                    "otp" => "1"
                 );
                
            }else{
             $response = array(
                    "type" => "error",
                    "message" => "OTP not valid."
                );
        } 
    
} else {  
    // create the product
   if(is_numeric($_POST['phone'])){
       
            if(strlen($_POST["phone"])!=10){
             $response = array(
                    "type" => "error",
                    "message" => "Invalid phone No."
                );
                 echo json_encode($response);
                 die();
         }else{
             
               $chkNumber=$user->isUsername($_POST['phone']);
                    if($chkNumber!=true){
                        $chkNumber=$user->generateNumericOTP1($_POST["phone"]);
                    if($chkNumber!=false){
                                $_SESSION['recoverOTP']=$chkNumber;
                                $_SESSION['recoverPhone']=$_POST['phone'];
                             $response = array(
                                    "type" => "success",
                                    "message" => "Otp has been sent on your mobile no."
                                );
                            }
                            // if unable to create the product, tell the store
                            else{
                        $response = array(
                                    "type" => "error",
                                    "message" => "Error to send otp."
                                );
                            }
                        
                    }else{
                          $response = array(
                                    "type" => "error",
                                    "message" => "Number not exist."
                                );
                    }
    
         }
     }
     else {
                   if (!filter_var($_POST['phone'], FILTER_VALIDATE_EMAIL)) {
                     
                       $response = array(
                                    "type" => "error",
                                    "message" => "Invalid email format."
                                );
                                 echo json_encode($response);
                                 die();
                   }
                            if(!$functionClass->checkemail($_POST['phone'])){
                                    $response = array(
                                    "type" => "error",
                                    "message" => "Invalid email format."
                                );
                                 echo json_encode($response);
                                 die();
                            }
                            
                    $chkNumber=$user->isUsername($_POST['phone']);
                    if($chkNumber!=true){
                        //Generate OTP
                        $str_result = '1234567890';
                        $generate_otp = substr(str_shuffle($str_result), 0, 4);
                        $message_send = "Your OTP is " . $generate_otp;
                            $to = $_POST['phone'];
                            $subject = 'OTP Verification';
                            $message = "<b>".$message_send."</b>";
                            
                            $headers .= "From:gurukulagri@gmail.com \r\n";                     
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                            // send email
                          
                    if(mail($to, $subject, $message, $headers)){
                          $_SESSION['recoverOTP']=$generate_otp;
                                  $_SESSION['recoverPhone']=$_POST['phone'];
                             $response = array(
                                    "type" => "success",
                                    "message" => "Otp has been sent on your email.",
                                    
                                );
                            }
                            // if unable to create the product, tell the store
                            else{
                        $response = array(
                                    "type" => "error",
                                    "message" => "Error to send otp."
                                );
                            }
                        
                    }else{
                          $response = array(
                                    "type" => "error",
                                    "message" => "Email not exist."
                                );
                    }
                            
                            
    }

      
 }  
    

    echo json_encode($response);
 ?>