<?php
class Mocks{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getMocks($counts, $user_id){
        
        $select_data;
        $mocks = array();
        $countt = 0;
        
        if($counts == '0'){
            $select_data = "SELECT * FROM mock";
        }
        else{
            $select_data = "SELECT * FROM mock ORDER BY id DESC LIMIT $counts";
        }
        
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            $mocks[] = $get_rows;
            
            $get_mock_id = $get_rows['id'];
            
            $select_score = "SELECT id FROM mock_scores WHERE user_id = '$user_id' AND mock_id = '$get_mock_id'";
            $get_score_results = $this->con->query($select_score);
            
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
    
    function getMockQuestions($mock_id){
        
        $response = array();
        $countt = 0;
        
        $select_data = "SELECT * FROM mock_questions WHERE mock_id = '$mock_id'";
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
        
        $select_score = "SELECT id FROM mock_scores WHERE user_id = '$user_id' && mock_id = '$mock_id'";
        $score_result = $this->con->query($select_score);
        
        $c_date = date('Y-m-d');
        $c_time = date('H:i:s');
        
        if($score_result->num_rows == 0){
            $insert_data = "INSERT INTO mock_scores(mock_id, user_id, date, time, score, overall_score, percentile, accuracy, time_taken, attempted, correct, incorrect, language, user_answers) VALUES('$mock_id', '$user_id', '$c_date', '$c_time', '$scores', '$overall_score', '$percentile', '$accuracy', '$time_taken', '$attempted', '$correct', '$incorrect', '$language', '$user_answers')";
            $this->con->query($insert_data);
        }
        else{
            $update_data = "UPDATE mock_scores SET score = '$scores', overall_score = '$overall_score', date = '$c_date', time = '$c_time', percentile = '$percentile', accuracy = '$accuracy', time_taken = '$time_taken', attempted = '$attempted', correct = '$correct', incorrect = '$incorrect', language = '$language', user_answers = '$user_answers'  WHERE user_id = '$user_id' && mock_id = '$mock_id'";
            $this->con->query($update_data);
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
        
        $get_row['questions'] = json_decode($this->getMockQuestions($mock_id), true);
        
        return json_encode($get_row);
    }
}
?>