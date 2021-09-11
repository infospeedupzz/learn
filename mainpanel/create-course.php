<?php  include_once 'layout/session.php';
 include_once 'objects/course.php'; 
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
	$cousse = new Cousse($db);  
 $success_message = '';  
 $target='';
 if(isset($_POST["name"]))  
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
      
       $publish="";
       if(!empty($_POST['publish'])){
            foreach ($_POST['publish'] as $key ) {
       	# code...
       	if(empty($publish)){
       			$publish="[".$key;
       	}else{
       			$publish=$publish.",".$key;
       	}
       
       }
       }
       $publish=$publish."]";
         //create category
         $cousse->name = $_POST['name'];
         $cousse->back_color = $_POST['color1'].",".$_POST['color2'];
         $cousse->price = $_POST['price'];
         $cousse->from_points = $_POST['from_points'];
         $cousse->duration = $_POST['duration'];
         $cousse->publish = $publish;
         $cousse->img = $target;
         $cousse->alias  = str_replace(" ","-", $_POST['name']) ;
         $result=$cousse->create();
           if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "cousse Added.",
                "id" => $result
            );
        }else{
        	 $response = array(
                    "type" => "error",
                    "message" => "Something want wrong"
                );
        }
     
    
      //end image upload
    }else{
         $response = array(
                    "type" => "error",
                    "message" => "Invalid data"
                );
    }
   
     echo json_encode($response); 
   
 ?>