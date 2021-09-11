<?php
class PreviousPapers{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getPreviousPapers($course_id){
        
        $response = array();
        
        $select_data = "SELECT * FROM previous_papers WHERE course_id = '$course_id'";
        $get_results = $this->con->query($select_data);
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $select_data);

fclose($myfile);
        
        while($get_rows = $get_results->fetch_assoc()){
            $response[] = $get_rows;
        }
        
        return json_encode($response);
    }
}
?>