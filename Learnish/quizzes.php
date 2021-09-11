<?php
class Quizzes{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getQuizzes($counts){
        
        $select_data;
        $countt = 0;
        $response = array();
        
        if($counts == '0'){
            $select_data = "SELECT * FROM quizzes ORDER BY id DESC";
        }
        else{
            $select_data = "SELECT * FROM quizzes ORDER BY id DESC LIMIT $counts";
        }
        
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            $response[] = $get_rows;
            
            $select_sub = "SELECT name FROM subject WHERE id = '".$get_rows['subject_id']."'";
            $sub_results = $this->con->query($select_sub);
            $get_sub_row = $sub_results->fetch_assoc();
            
            $response[$countt]['subject_name'] = $get_sub_row['name'];
            
            $countt++;
        }
        
        return json_encode($response);
        
    }
    
    function getQuizQuestions($quiz_id){
        
        $response = array();
        
        $select_data = "SELECT * FROM quiz_questions WHERE quiz_id = '$quiz_id'";
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            $response[] = $get_rows;
        }
        
        return json_encode($response);
    }
    
}
?>