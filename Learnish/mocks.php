<?php
class Mocks{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getMocks($counts, $user_id, $package_id){
        
        $select_data;
        $mocks = array();
        $countt = 0;
        
        if($counts == '0'){
            $select_data = "SELECT * FROM mock WHERE publish = 'true' AND package_id LIKE '%,$package_id,%' ORDER BY id ASC";
        }
        else{
            $select_data = "SELECT * FROM mock  WHERE publish = 'true' AND package_id LIKE ',,' ORDER BY id ASC LIMIT $counts";
        }
        
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            $mocks[] = $get_rows;
            
            $get_mock_id = $get_rows['id'];
            
            $select_score = "SELECT id FROM mock_scores WHERE user_id = '$user_id' AND mock_id = '$get_mock_id'";
            $get_score_results = $this->con->query($select_score);
            
            // check if user unlock this module by share
            $selectMockUnlock = "SELECT id FROM unlocked_mocks WHERE mock_id = '$get_mock_id' AND user_id = '$user_id' ";
            $moduleMockResult = $this->con->query($selectMockUnlock);
            
            if($moduleMockResult->num_rows > 0){
                $mocks[$countt]['status'] = "Free";
            }
            
            // check if user has bought this mock if it is paid
            $mocks[$countt]['user_buy_status'] = $this->checkUserBuyStatus($user_id, $get_mock_id);
            $mocks[$countt]['mock_rating_by_user'] = $this->getMockRatingByUser($user_id, $get_mock_id);
            $mocks[$countt]['mock_feedback_by_user'] = $this->getMockFeedbackByUser($user_id, $get_mock_id);
            
            if($get_score_results -> num_rows == 0){
                $mocks[$countt]['already_attempted'] = 0;
            }
            else{
                $mocks[$countt]['already_attempted'] = 1;
            }
            
            $countt++;
        }
        
        return json_encode($mocks);
        
    }
    
    function getMockRatingByUser($userId, $mockId){
        
        $defaultRating = 0;
        
        $selectRating = "SELECT rating FROM mock_ratings WHERE user_id = '$userId' AND mock_id = '$mockId' ";
        $ratingResults = $this->con->query($selectRating);
        
        if($ratingResults->num_rows > 0){
            
            $ratingRow = $ratingResults->fetch_assoc();
            $defaultRating = $ratingRow['rating'];
            
        }
        
        return $defaultRating;
    }
    
    function getMockFeedbackByUser($userId, $mockId){
        
        $defaultFeedback = "";
        
        $selectRating = "SELECT feedback FROM mock_ratings WHERE user_id = '$userId' AND mock_id = '$mockId' ";
        $ratingResults = $this->con->query($selectRating);
        
        if($ratingResults->num_rows > 0){
            
            $ratingRow = $ratingResults->fetch_assoc();
            $defaultFeedback = $ratingRow['feedback'];
            
        }
        
        return $defaultFeedback;
    }
    
    function getMockQuestions($mock_id){
        
        $response = array();
        $countt = 0;
        
        $select_data = "SELECT * FROM mock_questions WHERE mock_id = '$mock_id' ORDER BY id ASC";
        $results = $this->con->query($select_data);
        
        while($get_row = $results->fetch_assoc()){
            
            $response[] = $get_row;
            
            $select_subject = "SELECT name FROM subject WHERE id = '".$get_row['subject_id']."'";
            $subject_results = $this->con->query($select_subject);
            $get_subject_row = $subject_results->fetch_assoc();
            
            $response[$countt]['subject_name'] = $get_subject_row['name'];
            
            $countt++;
        }
        
        return json_encode($response);
    }
    
    function updateMockScore($user_id, $scores, $overall_score, $mock_id, $attempted, $correct, $incorrect, $percentile, $accuracy, $time_taken, $language, $user_answers){
        
        if($user_id != 0){
            $select_score = "SELECT id FROM mock_scores WHERE user_id = '$user_id' && mock_id = '$mock_id'";
            $score_result = $this->con->query($select_score);
            
            $c_date = date('Y-m-d');
            $c_time = date('H:i:s');
            
            if($score_result->num_rows == 0){
                $insert_data = "INSERT INTO mock_scores(mock_id, user_id, date, time, score, overall_score, percentile, accuracy, time_taken, attempted, correct, incorrect, language, user_answers, done_from) VALUES('$mock_id', '$user_id', '$c_date', '$c_time', '$scores', '$overall_score', '$percentile', '$accuracy', '$time_taken', '$attempted', '$correct', '$incorrect', '$language', '$user_answers', 'app')";
                $this->con->query($insert_data);
            }
            else{
                $update_data = "UPDATE mock_scores SET score = '$scores', overall_score = '$overall_score', date = '$c_date', time = '$c_time', percentile = '$percentile', accuracy = '$accuracy', time_taken = '$time_taken', attempted = '$attempted', correct = '$correct', incorrect = '$incorrect', language = '$language', user_answers = '$user_answers'  WHERE user_id = '$user_id' && mock_id = '$mock_id'";
                $this->con->query($update_data);
            }
        }
    }
    
    function getLeaderboard($mock_id){
        
        $response = array();
        $countt = 0;
        
        $select_data = "SELECT * FROM mock_scores WHERE mock_id = '$mock_id' ORDER BY overall_score DESC";
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            
            $response[] = $get_rows;
            
            $get_user_id = $get_rows['user_id'];

            $select_user = "SELECT id, profile_pic, fullname FROM users WHERE id = '$get_user_id'";
            $user_results = $this->con->query($select_user);

            $response[$countt]['user_details'] = $user_results->fetch_assoc();
            $response[$countt]['score'] = json_decode($get_rows['score'], true);
            $countt++;
        }
        
        return json_encode($response);
    }
    
    function getMockAnalysis($mock_id, $user_id){
        
        $select_data = "SELECT * FROM mock_scores WHERE mock_id = '$mock_id' AND user_id = '$user_id'";
        $get_results = $this->con->query($select_data);
        $get_row = $get_results->fetch_assoc();
        
        $get_row['percentile'] = $this->calculatePercentile($mock_id, $user_id);
        $get_row['questions'] = json_decode($this->getMockQuestions($mock_id), true);
        $get_row['score'] = json_decode($get_row['score'], true);
        $get_row['anounce_result'] = $this->checkIfResultAnnounced($mock_id);
        
        return json_encode($get_row);
    }
    
    function checkIfResultAnnounced($mock_id){
       
        $select_data = "SELECT anounce_result FROM mock WHERE id = '$mock_id'";
        $get_results = $this->con->query($select_data);
        $get_row = $get_results->fetch_assoc();
        
        return $get_row['anounce_result'];
    }
    
    function getMockPackages($user_id, $courseId){
        
        $response = array();
        $countt = 0;
        
        $select_data = "SELECT * FROM mock_packages WHERE publish = true";
        $get_results = $this->con->query($select_data);
        
        while($get_rows = $get_results->fetch_assoc()){
            
            $getCoursesId = json_decode($get_rows['courses_id'], true);
            $getPackageId = $get_rows['id'];
            
            if(in_array($courseId, $getCoursesId)){
                $response[] = $get_rows;
                
                $select_mocks = "SELECT * FROM mock WHERE package_id LIKE '%,$getPackageId,%'";
                $mock_results = $this->con->query($select_mocks);
                
                $response[$countt]['quantity'] = $mock_results->num_rows;
                
                // check if user has bought this package if it is paid
                $response[$countt]['user_buy_status'] = $this->checkUserPackageBuyStatus($user_id, $get_rows['id']);
                $countt++; 
            }
        }
        
        return json_encode($response);
    }
    
    function checkUserBuyStatus($user_id, $mock_id){
        
        $select_data = "SELECT id, expiry_date FROM mock_purchages WHERE mock_id = '$mock_id' AND user_id = '$user_id'";
        $results = $this->con->query($select_data);
        
        if($results->num_rows == 0){
            return 0;
        }
        else {
            
            $get_row = $results->fetch_assoc();
            $current_date = date('Y-m-d');
            
            if($current_date > $get_row['expiry_date']){
                return 0;
            }
            else{
                return 1;
            }
        }
    }
    
    function checkUserPackageBuyStatus($user_id, $package_id){
        
        $select_data = "SELECT id, expiry_date FROM m_package_purchages WHERE package_id = '$package_id' AND user_id = '$user_id'";
        $results = $this->con->query($select_data);
        
        if($results->num_rows == 0){
            return 0;
        }
        else {
            
            $get_row = $results->fetch_assoc();
            $current_date = date('Y-m-d');
            
            if($current_date > $get_row['expiry_date']){
                return 0;
            }
            else{
                return 1;
            }
        }
    }
    
    function calculatePercentile($mock_id, $user_id){
        
        $user_rank =0;
        $total_candidates = 0;
        
        $select_data = "SELECT overall_score, user_id FROM mock_scores WHERE mock_id = '$mock_id' ORDER BY overall_score DESC";
        $results = $this->con->query($select_data);
        
        $total_candidates = $results->num_rows;
        
        while($get_row = $results->fetch_assoc()){
            $user_rank++;
            
            if($get_row['user_id'] == $user_id){
                break;
            }
        }
        
        $resultss = (1- ($user_rank/$total_candidates))*100;
        
        if(strlen($resultss."") > 5){
            return substr($resultss, 0, 6);
        }
        else{
           return $resultss; 
        }
  
        
    }
}
?>