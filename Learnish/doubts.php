<?php
class Doubts{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getDoubts($userId){
        
        $response = array();
        
        $selectDoubts = "SELECT * FROM user_doubts WHERE user_id = '$userId' ";
        $doubtResults = $this->con->query($selectDoubts);
        
        while($doubtRow = $doubtResults->fetch_assoc()){
            
            $getSubjectId = $doubtRow['subject_id'];
            $getCourseId = $doubtRow['course_id'];
            
            // get subject name from id
            $selectSubject = "SELECT name FROM subject WHERE id = '$getSubjectId'";
            $subjectResult = $this->con->query($selectSubject);
            $subjectRow = $subjectResult->fetch_assoc();
            
            $doubtRow['subject_name'] = $subjectRow['name'];
            
            // get course name from id
            $selectCourse = "SELECT name FROM course WHERE id = '$getCourseId'";
            $courseResult = $this->con->query($selectCourse);
            $courseRow = $courseResult->fetch_assoc();
            
            $doubtRow['course_name'] = $courseRow['name'];
            
            $response[] = $doubtRow;
        }
        
        return json_encode($response);
        
    }
    
    function submitDoubt($userId, $courseId, $subjectId, $doubtMsg, $img1, $img2, $img3, $getAction, $getDoubtId){
        
        $image1FilePath = "";
        $image2FilePath = "";
        $image3FilePath = "";
        
        $doubtImages = "";
        
        $currentDateTime = date('Y-m-d H:i:s');
        $currentTimestamps = time();
        
        if ($img1!=''){
            $image1FilePath = "DoubtImages/".$currentTimestamps."_01.png";
            file_put_contents($image1FilePath, base64_decode($img1));
        }
        
        if ($img2!=''){
            $image2FilePath = "DoubtImages/".$currentTimestamps."_02.png";
            file_put_contents($image2FilePath, base64_decode($img2));
        }
        
        if ($img3!=''){
            $image3FilePath = "DoubtImages/".$currentTimestamps."_03.png";
            file_put_contents($image3FilePath, base64_decode($img3));
        }
        
        if ($img1 != ''){
            $doubtImages = $image1FilePath;
        }
        if ($img2!=''){
            $doubtImages = $doubtImages.",,".$image2FilePath;
        }
        if ($img3!=''){
            $doubtImages = $doubtImages.",,".$image3FilePath;
        }
        
        
        // get date when live will be schedule
        $selectSubjects = "SELECT live_date FROM subject WHERE id = '$subjectId'";
        $subjectResults = $this->con->query($selectSubjects);
        $subjectRow = $subjectResults->fetch_assoc();
        $liveDate = $subjectRow['live_date'];
        
        if($getAction == 'new'){
            $insertDoubt = "INSERT INTO user_doubts(user_id, course_id, subject_id, doubt, live_date, date_time, images) VALUES('$userId', '$courseId', '$subjectId', '$doubtMsg', '$liveDate', '$currentDateTime', '$doubtImages')";
            $this->con->query($insertDoubt);
        }
        else{
            $updateDoubt = "UPDATE user_doubts SET doubt = '$doubtMsg', images = '$doubtImages', update_date_time = '$currentDateTime', update_count = update_count + 1 WHERE id = '$getDoubtId'";
            $this->con->query($updateDoubt);
        }
        
        
        $selectSubject = "SELECT live_msg FROM subject WHERE id = '$subjectId'";
        $subjectResults = $this->con->query($selectSubject);
        $subjectRow = $subjectResults->fetch_assoc();
        
        $response = array();
        $response['msg'] = $subjectRow['live_msg'];
        
        return json_encode($response);
        
    }

}
?>