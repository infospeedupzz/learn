<?php
class Courses{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getSubjects($selected_course_id){
        
        $response = array();
        
        $select_data = "SELECT * FROM subject WHERE course_id = '$selected_course_id'";
        $results = $this->con->query($select_data);
        
        while( $get_row = $results->fetch_assoc()){
            
            $response[] = $get_row;
        }
        
        return json_encode($response);
    }
    
    function getModules($selected_subject_id){
        
        $response = array();
        
        $select_data = "SELECT * FROM modules WHERE subject_id = '$selected_subject_id'";
        $results = $this->con->query($select_data);
        
        while( $get_row = $results->fetch_assoc()){
            
            $response[] = $get_row;
        }
        
        return json_encode($response);
    }
    
    function getCourses(){
        $courses = array();
        
        $select_courses = "SELECT * FROM course";
        $score_results = $this->con->query($select_courses);
            
        while($get_row = $score_results->fetch_assoc()){
            $courses[] = $get_row;
        }
        
        return json_encode($courses);
    }
}
?>