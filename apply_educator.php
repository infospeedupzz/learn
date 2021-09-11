<?php $ROOT= $_SERVER['DOCUMENT_ROOT'];
 $ROOT_URL= "https://learnizy.in";
 include_once $ROOT .'/objects/functionClass.php'; 
 include_once $ROOT.'/config/database.php'; 
   $database = new Database();
$db = $database->getConnection();
 $functionClass = new functionClass($db);
 date_default_timezone_set("Asia/Kolkata");

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["dob"]) && isset($_POST["address"]))  
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
    if(empty($_POST["address"])){
          $response = array(
                    "type" => "error",
                   "message" => "address is required."
                );
                  
            echo json_encode($response);
        die();
     }
     if(empty($_POST["address"])){
          $response = array(
                    "type" => "error",
                   "message" => "Address is required."
                );
                  
            echo json_encode($response);
        die();
     }
     if(empty($_POST["dob"])){
          $response = array(
                    "type" => "error",
                   "message" => "Birthday  is required."
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
    
         // Get Image Dimension
       if(!empty($_FILES['img']['tmp_name'])){
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
      "doc",
      "pdf",
      "DOC",
      "PDF"
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
      $target = "resume/" .time().basename($_FILES["img"]["name"]);
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target)) {
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
      $response = array(
                    "type" => "error",
                    "message" => "upload resume file type doc or pdf"
                );
                echo json_encode($response); 
                die();
 }
     include_once 'objects/createEducatorApply.php';
         $homerating = new CreateEducatorApply($db);
        $homerating->name = $_POST['name'];
        $homerating->email = $_POST['email'];
        $homerating->phone = $_POST['phone'];
        $homerating->dob = $_POST['dob'];
        $homerating->address = $_POST['address'];
        $homerating->gender = $_POST['radio'];
        $homerating->resume = $target;
     
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

   
   
    echo json_encode($response);
 