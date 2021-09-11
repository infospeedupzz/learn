<?php include('../layout/session.php'); 
if(empty($userInfo)){
    echo"Error 400";
    die();
}
 include_once '../objects/user.php';
    $user = new User($db);
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects

 $success_message = '';  
 if(isset($_SESSION['userId']) && isset($_POST["fullname"]))  
 {  
 
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
              if(!empty($_POST['mobile'])){
                  if(!is_numeric($_POST['mobile'])){
                         $response = array(
                                    "type" => "error",
                                    "message" => "Invalid Phone No format."
                                );
                                 echo json_encode($response);
                                 die();
                  }
                  
              }
if($user->chkUsername($_POST['email']) or $user->chkEmail($_POST['email'])){
      $response = array(
                                    "type" => "error",
                                    "message" => "Email already exit."
                                );
                                 echo json_encode($response);
                                 die();
}
     if($user->chkUsername($_POST['mobile']) or $user->chkMobile($_POST['mobile'])){
      $response = array(
                                    "type" => "error",
                                    "message" => "Mobile No already exit."
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
      $target = MAINPATH."ProfilePics/" .time().basename($_FILES["img"]["name"]);
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
    $target=$_POST['oldImage'];
 }

        $user->fullname = $_POST['fullname'];
        $user->email = $_POST['email'];
        $user->mobile = $_POST['mobile'];
        $user->profile_pic =$target;
        $user->id = $_SESSION['userId'];
          $result=$user->updateprofile();
        if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Profile updated."
            );
        
        }
     
        // if unable to create the product, tell the user
        else{
             $response = array(
                    "type" => "error",
                    "message" => "Error to update Profile."
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