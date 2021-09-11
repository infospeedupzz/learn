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
 if(isset($_SESSION['regId']) && isset($_POST["firstname"]))  
 {  
 
            if(empty($_POST['email'])){
                 $response = array(
                                    "type" => "error",
                                    "message" => "Email is required."
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
                            if(!$functionClass->checkemail($_POST['email'])){
                                    $response = array(
                                    "type" => "error",
                                    "message" => "Invalid email format."
                                );
                                 echo json_encode($response);
                                 die();
                            }
    }
     
        
      if(strlen($_POST["password"])<6){
             $response = array(
                    "type" => "error",
                    "message" => "Password must be greater then 6 character."
                );
                 echo json_encode($response);
                 die();
     }

      // Get Image Dimension
       if(!empty($_FILES['img']['tmp_name'])){
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
      "png",
      "jpg",
      "jpeg",
      "PNG",
      "JPG",
      "JPEG"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["img"]["tmp_name"])) {
      $response = array(
        "type" => "error",
        "message" => "Choose image file to upload."
      );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
      $response = array(
        "type" => "error",
        "message" => "Upload valiid images. Only PNG and JPEG are allowed."
      );
       
    }    // Validate image file size
    else if (($_FILES["img"]["size"] > 5000000)) {
      $response = array(
        "type" => "error",
        "message" => "Image size exceeds 5MB"
      );
    }   
     else {
      $target = "profiles/" .time().basename($_FILES["img"]["name"]);
     $target1="../".$target;
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target1)) {
        $response = array(
          "type" => "success",
          "message" => "Icon uploaded successfully."
        );
        
      } else {
        $response = array(
          "type" => "error",
          "message" => "Problem in uploading Icon files."
        );
      }
    }
 }else{
    $target="";
 }
 if(isset($_POST['gimage'])){
    $target=$_POST['gimage'];
 }else{
  $target="";
 }
        if(isset( $_SESSION['mobile'])){
            if(!empty($_SESSION['mobile'])){
                      $user->mobile = $_SESSION['mobile'];
                      $user->username = $_SESSION['mobile'];
            }
        }else{
             $user->mobile ="";
            $user->username =$_POST['email'];
        }
        if(isset($_SESSION['withlogin'])){
            if(!empty($_SESSION['withlogin'])){
                $withlogin=$_SESSION['withlogin'];
            }else{
                    $withlogin="";
            }
        }else{
            $withlogin="";
        }
        if(isset($_SESSION['fbid'])){
            $fbid=$_SESSION['fbid'];
        }else{
            $fbid="";
        }
  
        $user->firstname = $_POST['firstname'];
        $user->lastname = $_POST['lastname'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->dob = $_POST['dob'];
        $user->gender = $_POST['gender'];
        $user->image = $target;
        $user->withlogin = $withlogin;
        $user->fbid = $fbid;
          $result=$user->create();
        if($result!=false){
            
               $_SESSION['userId']=$result;
            $letter =md5(chr(rand(65,90)).$result);
                 $expire = time() + 60 * 60 * 24 * 30; // expires in one month
                setcookie('5180837cc66eeb809385dc2d52ff348c',$letter,$expire, "/",'',true,true);
                $upLogin=array('login_cookie'=>$letter,'id'=>$result);
             
                
                $functionClass->updateByQ('users','login_cookie=:login_cookie where id=:id',$upLogin);
         $response = array(
                "type" => "success",
                "message" => "User registered."
            );
         $_SESSION['regId']="";
        }
     
        // if unable to create the product, tell the user
        else{
             $response = array(
                    "type" => "error",
                    "message" => "Email already exsit."
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