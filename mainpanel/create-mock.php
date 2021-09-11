<?php  include_once 'layout/session.php';
 include_once 'objects/mock.php'; 
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
	$mock = new Mock($db);  
 $success_message = '';  
 $target='';
 if(isset($_POST["course_id"]))  
 {  
  //image upload
 	       if(!empty($_FILES['img']['tmp_name'])){
			       // Get Image Dimension
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
			      $target1 = "test/" .time().basename($_FILES["img"]["name"]);
			       $target=constant('mainpath').$target1;
			      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target1)) {
			        $response = array(
			          "type" => "success",
			          "message" => "Image uploaded successfully."
			        );
			        
			      } else {
			        $response = array(
			          "type" => "error",
			          "message" => "Problem in uploading Image files."
			        );
			      }
			    }
			 }else{
			 	$target="";
			 }
       $imagename=$target;
      
       $package_id="";
       if(!empty($_POST['package_id'])){
            foreach ($_POST['package_id'] as $key ) {
       	# code...
       	if(empty($package_id)){
       			$package_id=",".$key.",";
       	}else{
       			$package_id=$package_id.$key.",";
       	}
       
       }
       }
       if(empty($package_id)){
       	$package_id=",,";
       }

       if(!empty($_POST['title']) && !empty($_POST['course_id'])&& !empty($_POST['name'])&& !empty($_POST['questions'])&& !empty($_POST['max_time'])&& !empty($_POST['marks'])&& !empty($_POST['price'])&& !empty($_POST['duration'])){
         //create category
         $mock->title = $_POST['title'];
         $mock->course_id = $_POST['course_id'];
         $mock->package_id = $package_id;
         $mock->name = $_POST['name'];
         $mock->status = $_POST['status'];
         $mock->questions = $_POST['questions'];
         $mock->max_time = $_POST['max_time'];
         $mock->marks = $_POST['marks'];
         $mock->price = $_POST['price'];
         $mock->can_skip = $_POST['can_skip'];
         $mock->publish = $_POST['publish'];
         $mock->duration = $_POST['duration'];
         $mock->language = $_POST['language'];
         $mock->img = $target;
         $result=$mock->create();
           if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Mock Added.",
                "id" => $result
            );
        }else{
        	 $response = array(
                    "type" => "error",
                    "message" => "Mock name already exist"
                );
        }
     
    }else{
    	$response = array(
                    "type" => "requied",
                    "message" => ""
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