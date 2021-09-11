<?php  include_once 'layout/session.php';
 include_once 'objects/exam.php'; 
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
	$mock = new Exam($db);  
 $success_message = '';  
 $target='';
 if(isset($_POST["name"]))  
 {  
       if(!empty($_POST['title']) && !empty($_POST['name'])&&!empty($_POST['id'])){
     
         $mock->id = $_POST['id'];
         $mock->title = $_POST['title'];
         $mock->name = $_POST['name'];
         $mock->overview = $_POST['overview'];
         $mock->exam_date = $_POST['exam_date'];
         $mock->eligibility_criteria = $_POST['eligibility_criteria'];
         $mock->exam_pattern = $_POST['exam_pattern'];
         $mock->syllabus = $_POST['syllabus'];
         $mock->cut_off = $_POST['cut_off'];
         $mock->alias  = str_replace(" ","-", $_POST['title']);
         $result=$mock->edit();
           if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Exam Update.",
                "id" => $result
            );
        }else{
        	 $response = array(
                    "type" => "error",
                     "message" => "Exam already exist"
                );
        }
     
    }else{
    	$response = array(
                    "type" => "requied",
                    "message" => "Fill requied data"
                );
    }
    }else{
         $response = array(
                    "type" => "error",
                    "message" => "Some thing went wrong"
                );
    }
   
     echo json_encode($response); 
   
 ?>