<?php  include_once 'layout/session.php';
 include_once 'objects/mock-question.php'; 
 $response =array("type" => "",
            "message" => ""); 
  // pass connection to objects
	$mock = new Mockquestion($db);  
 $success_message = '';  
 $target='';
 if(isset($_POST["mock_id"]))  
 {  

 
      
       
 	
       if(!empty($_POST['mock_id']) && !empty($_POST['subject_id'])&& !empty($_POST['question'])&& !empty($_POST['option1'])&& !empty($_POST['option2'])&& !empty($_POST['option3'])&& !empty($_POST['option4'])&& !empty($_POST['answer'])){
         //create category
       	$answer="";
       	if($_POST['answer']=='1'){
       		$answer=$_POST['option1'];
       	}else if($_POST['answer']=='2'){
       		$answer=$_POST['option2'];
       	}else if($_POST['answer']=='3'){
       		$answer=$_POST['option3'];
       	}else if($_POST['answer']=='4'){
       		$answer=$_POST['option4'];
       	}else {
       		$answer=$_POST['option5'];
       	}
         $mock->mock_id = $_POST['mock_id'];
         $mock->subject_id = $_POST['subject_id'];
         $mock->question = $_POST['question'];
         $mock->option1 = $_POST['option1'];
         $mock->option2 = $_POST['option2'];
         $mock->option3 = $_POST['option3'];
         $mock->option4 = $_POST['option4'];
         $mock->option5 = $_POST['option5'];
         $mock->details = $_POST['details'];
         $mock->answer = $answer;
         $mock->language = $_POST['language'];
         $mock->description = $_POST['description'];
         $result=$mock->create();
           if($result!=false){
         $response = array(
                "type" => "success",
                "message" => "Mock Question Added.",
                "id" => $result
            );
        }else{
        	 $response = array(
                    "type" => "error",
                    "message" => "Question name already exist"
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
                    "message" => "Invalid data"
                );
    }
   
     echo json_encode($response); 
   
 ?>