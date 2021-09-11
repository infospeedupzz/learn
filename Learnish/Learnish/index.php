<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // include files
    include_once("dbcon.php");
    include_once("main_data.php");
    include_once("users.php");
    include_once("course.php");
    include_once("mocks.php");
    include_once("quizzes.php");
    include_once("previous_papers.php");
    
    $con->set_charset("utf8mb4");
    
    // set time zone for india
    date_default_timezone_set('Asia/Kolkata');
    
    // get from (what user want to get?)
    $from = $con -> real_escape_string($_POST['from']);
    
    if($from == 'check_update'){
        
        $get_version = $con -> real_escape_string($_POST['version']);
        
        $main_data = new MainData($con);
        
        echo '{"status":'.$main_data->checkUpdate($get_version).',';
        echo '"current_date":"'.date('d-m-Y').'",';
        echo '"main_data":'.$main_data->getMainData().'}';
    }
    
    else if($from == 'register_user'){
        
        $get_fullname = $con -> real_escape_string($_POST['fullname']);
        $get_mobile = $con -> real_escape_string($_POST['mobile']);
        $get_email = $con -> real_escape_string($_POST['email']);
        $get_password = $con -> real_escape_string($_POST['password']);
        
        $users = new Users($con);
        echo $users->registerUser($get_fullname, $get_email, $get_mobile, $get_password);
        
    }
    
    else if($from == 'login_user'){
        
        $get_username = $con -> real_escape_string($_POST['username']); 
        $get_password = $con -> real_escape_string($_POST['password']); 
        $get_login_type = $con -> real_escape_string($_POST['type']); 
        
        $users = new Users($con); // create users class object
        
        echo $users->loginUser($get_username, $get_password, $get_login_type);
    }
    
    else if($from == 'single_user'){
        
        $get_user_id = $con -> real_escape_string($_POST['id']);
        
        $users = new Users($con);
        
        echo json_encode($users->getSingleUser($get_user_id));
    }
    
    else if($from == 'check_email'){
        
        $get_email = $con -> real_escape_string($_POST['email']); // get email of user.
        
        $users = new Users($con); // create users class object
        echo '{"status:"'.$users->checkEmail().'}'; // if checkEmail return 1 
    }
    
    else if($from == 'get_notifications'){
        
        $response = array();
        $countt = 0;
        
        $get_type = $con -> real_escape_string($_POST['type']);
        $select_data;
        
        if($get_type == 'only_count'){
            $select_data = "SELECT id FROM notifications";
            $results = $con->query($select_data);
            $response['notification_count'] = $results->num_rows;
        }
        else{
            $select_data = "SELECT * FROM notifications ORDER BY id DESC";
            $results = $con->query($select_data);
            
            while($get_rows = $results->fetch_assoc()){
                $response[] = $get_rows;
                
                $date = date('d-m-Y', strtotime($get_rows['date']));
                
                $response[$countt]['date'] = $date;
                
                $countt++;
            }
        }
        
        echo json_encode($response);
    }
    
    else if($from == 'get_subjects'){
        
        $selected_course_id = $con -> real_escape_string($_POST['id']);
        
        $courses = new Courses($con);
        
        echo $courses->getSubjects($selected_course_id);
    }
    
    else if($from == 'get_modules'){
        
        $selected_subject_id = $con -> real_escape_string($_POST['id']);
        
        $courses = new Courses($con);
        
        echo $courses->getModules($selected_subject_id);
        
    }
    
    else if($from == 'get_mocks'){
        
        $get_counts = $con -> real_escape_string($_POST['counts']);
        $get_user_id = $con -> real_escape_string($_POST['id']);
        
        $mocks = new Mocks($con);
        $courses = new Courses($con);
        
        echo '{"get_mocks":'.$mocks->getMocks($get_counts, $get_user_id).',';
        echo '"courses":'.$courses->getCourses().'}';
        
    }
    
    else if($from == 'get_quizzes'){
        
        $get_counts = $con -> real_escape_string($_POST['counts']);
        
        $quizzes = new Quizzes($con);
        
        echo $quizzes->getQuizzes($get_counts);
    }
    
    else if($from == 'mock_questions'){
        
        $get_mock_id = $con -> real_escape_string($_POST['id']);
        
        $mocks = new Mocks($con);
        
        echo $mocks->getMockQuestions($get_mock_id);
    }
    
    else if($from == 'update_mock_score'){
        
        $get_user_id = $con -> real_escape_string($_POST['id']);
        $get_mock_id = $con -> real_escape_string($_POST['mock_id']);
        $get_score = $con -> real_escape_string($_POST['score']);
        $get_overall_score = $con -> real_escape_string($_POST['overall_score']);
        $get_attempted = $con -> real_escape_string($_POST['attempted']);
        $get_correct = $con -> real_escape_string($_POST['correct']);
        $get_incorrect = $con -> real_escape_string($_POST['incorrect']);
        $get_percentile = $con -> real_escape_string($_POST['percentile']);
        $get_accuracy = $con -> real_escape_string($_POST['accuracy']);
        $get_time_taken = $con -> real_escape_string($_POST['time_taken']);
        $get_language = $con -> real_escape_string($_POST['language']);
        $get_user_answers = $con -> real_escape_string($_POST['user_answers']);
        
        $mocks = new Mocks($con);
        
        $mocks->updateMockScore($get_user_id, $get_score, $get_overall_score, $get_mock_id, $get_attempted, $get_correct, $get_incorrect, $get_percentile, $get_accuracy, $get_time_taken, $get_language, $get_user_answers);
    }
    
    else if($from == 'mock_leaderboard'){
        
        $get_mock_id = $con -> real_escape_string($_POST['mock_id']);
        
        $mocks = new Mocks($con);
        
        echo $mocks->getLeaderboard($get_mock_id);
    }
    
    else if($from == 'fcm_token'){
        
        $get_username = $con -> real_escape_string($_POST['username']); // get username(mobile or email) of user
        $get_token = $con -> real_escape_string($_POST['token']); // get FCM token of user
        
        $users = new Users($con); // create users class object
        $users->updateFCMToken($get_username, $get_token);
        
    }
    
    else if($from == 'mock_analysis'){
       
        $get_mock_id = $con -> real_escape_string($_POST['mock_id']); 
        $get_user_id = $con -> real_escape_string($_POST['id']); 
        
        $mocks = new Mocks($con);
        
        echo $mocks->getMockAnalysis($get_mock_id, $get_user_id);
        
    }
    else if($from == 'previous_papers'){
       
        $get_course_id = $con -> real_escape_string($_POST['id']); 
        
        $previous_papers = new PreviousPapers($con);
        
        echo $previous_papers->getPreviousPapers($get_course_id);
        
    }
    else if($from == 'quiz_questions'){
        
        $get_quiz_id = $con -> real_escape_string($_POST['id']); 
        
        $quizzes = new Quizzes($con);
        
        echo $quizzes->getQuizQuestions($get_quiz_id);
        
    }
    
    $con->close();
}

?>