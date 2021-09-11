<?php
class Courses{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getSubjects($selected_course_id){
        
        $response = array();
        
        $countt = 0;
        
        $select_data = "SELECT * FROM subject WHERE course_id = '$selected_course_id' ORDER BY order_by ASC ";
        $results = $this->con->query($select_data);
        
        while( $get_row = $results->fetch_assoc()){
            
            $response[] = $get_row;
            
            $select_modules = "SELECT id FROM modules WHERE subject_id = '".$get_row['id']."'";
            $modules_results = $this->con->query($select_modules);
            
            $response[$countt]['modules'] = $modules_results->num_rows;
            
            $countt++;
            
        }
        
        return json_encode($response);
    }
    
    function getDoubtSubjects($courseId){
        
        $response = array();
        
        $selectSubject = "SELECT id, name FROM subject WHERE course_id = '$courseId' AND doubts = 'true'";
        $subjectResults = $this->con->query($selectSubject);
        
        while($getSubjectRow = $subjectResults->fetch_assoc()){
            $response[] = $getSubjectRow;

        }
        
        return json_encode($response);
        
    }
    
    function getModules($subject_id, $userId){
        
        $response = array();
        $countt = 0;
        
        $select_data = "SELECT * FROM modules WHERE subject_id = '$subject_id' ORDER BY order_by ASC";
        $results = $this->con->query($select_data);
        
        while($get_row = $results->fetch_assoc()){
            
            $getModuleId = $get_row['id'];
            
            // check if user unlock this module by share
            $selectModuleUnlock = "SELECT id FROM unlocked_modules WHERE module_id = '$getModuleId' AND user_id = '$userId' ";
              
            $moduleUnlockResult = $this->con->query($selectModuleUnlock);
            
            if($moduleUnlockResult->num_rows > 0){
                $get_row['status'] = "Free";
            }
            
            $get_row['videos'] = $this->getVideos($get_row['id']);//json_decode($this->getVideos($get_row['id']), true);
            $get_row['pdfs'] = $this->getPDFs($get_row['id']);//json_encode($this->getPDFs($get_row['id']), true);
            
            $response[] = $get_row;
            
            
            //$countt++;
        }
        
        return json_encode($response);
    }
    
    function getVideos($module_id){
        
        $response = array();

        $select_data = "SELECT * FROM videos WHERE module_id = '$module_id'";
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            
            $response[] = $get_rows;
        }
        
        return $response;
    }
    
    function getPDFs($module_id){
        
        $response = array();

        $select_data = "SELECT * FROM pdfs WHERE module_id = '$module_id'";
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            
            $response[] = $get_rows;
        }
        
        return $response;
    }
    
    function getCourses($user_id){
        $courses = array();
        $countt = 0;
        
        $select_courses = "SELECT * FROM course ORDER BY order_by ASC;";
        $score_results = $this->con->query($select_courses);
            
        while($get_row = $score_results->fetch_assoc()){
            $courses[] = $get_row;
            
            $courses[$countt]['user_buy_status'] = $this->checkUserBuyStatus($user_id, $get_row['id']);
            $countt++;
        }
        
        return json_encode($courses);
    }
    
    function checkUserBuyStatus($user_id, $course_id){
        
        $select_data = "SELECT expiry_date FROM course_purchages WHERE user_id = '$user_id' && course_id = '$course_id'";
        $results = $this->con->query($select_data);
        
        if($results->num_rows == 0){
            return 0;
        }
        else{
            $get_row = $results->fetch_assoc();
            $get_expiry_date = $get_row['expiry_date'];
            $current_date = date('Y-m-d');
            
            if($current_date > $get_expiry_date){
                return 0;
            }
            else{
                return 1;
            }
           
        }
        
    }
}
?>