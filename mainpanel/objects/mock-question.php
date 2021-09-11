<?php
include_once 'functionClass.php'; 
class Mockquestion extends functionClass{
    // database connection and table name
    private $conn;
    private $table_name = "mock_questions";
 
    // object properties
    public $id;
    public $mock_id;
 	public $subject_id;
    public $chapter_id=0;
    public $question;
    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $option5;
    public $details;
    public $answer;   
    public $language;
    public $duration;
    public $description;
    public $time=0;
    
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    mock_id=:mock_id,subject_id=:subject_id,chapter_id=:chapter_id,question=:question,option1=:option1,option2=:option2,option3=:option3,option4=:option4,option5=:option5,details=:details,answer=:answer,language=:language,description=:description,time=:time";
                    
 
        $stmt = $this->conn->prepare($query);
        $cdate=date("Y-m-d");
        // posted values
        $this->vali();
        // bind values 
        $stmt->bindParam(":mock_id", $this->mock_id);
		$stmt->bindParam(":subject_id",$this->subject_id);
        $stmt->bindParam(":chapter_id",$this->chapter_id);
        $stmt->bindParam(":question",$this->question);
        $stmt->bindParam(":option1",$this->option1);
        $stmt->bindParam(":option2",$this->option2);
        $stmt->bindParam(":option3",$this->option3);
        $stmt->bindParam(":option4",$this->option4);
        $stmt->bindParam(":option5",$this->option5);
        $stmt->bindParam(":details",$this->details);
        $stmt->bindParam(":answer",$this->answer);
        $stmt->bindParam(":language",$this->language);
        $stmt->bindParam(":description",$this->description);
        $stmt->bindParam(":time",$this->time);
        if($this->isCategoryname($this->question)){
            if($stmt->execute()){

            return  $this->conn->lastInsertId();
            }else{
            return false;
            }
        }else{
            return false;
        }
        
 
    }
    private function vali(){
        //   $this->question=$this->validate($this->question);
        // $this->option1=$this->validate($this->option1);
        // $this->option2=$this->validate($this->option2);
        // $this->option3=$this->validate($this->option3);
        // $this->option4=$this->validate($this->option4);
        // $this->option5=$this->validate($this->option5);
        // $this->details=$this->validate($this->details);
        // $this->answer=$this->validate($this->answer);
        // $this->description=$this->validate($this->description);
    }
    private function isCategoryname($question)
    {
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE question=:question");
            $query->bindParam("question", $question);
            $query->execute();

            if ($query->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
        
    }
    private function isCategorynameById($question,$id)
    {  
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE question=:question AND id <>:id");
            $query->bindParam("question", $question);
            $query->bindParam("id", $id);
            $query->execute();
            if ($query->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
   
    }

 public function edit(){

        $query = "UPDATE ". $this->table_name ."
         SET mock_id=:mock_id,subject_id=:subject_id,chapter_id=:chapter_id,question=:question,option1=:option1,option2=:option2,option3=:option3,option4=:option4,option5=:option5,details=:details,answer=:answer,language=:language,description=:description,time=:time WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $this->vali();
        // bind values 
        $stmt->bindParam(":mock_id", $this->mock_id);
		$stmt->bindParam(":subject_id",$this->subject_id);
        $stmt->bindParam(":chapter_id",$this->chapter_id);
        $stmt->bindParam(":question",$this->question);
        $stmt->bindParam(":option1",$this->option1);
        $stmt->bindParam(":option2",$this->option2);
        $stmt->bindParam(":option3",$this->option3);
        $stmt->bindParam(":option4",$this->option4);
        $stmt->bindParam(":option5",$this->option5);
        $stmt->bindParam(":details",$this->details);
        $stmt->bindParam(":answer",$this->answer);
        $stmt->bindParam(":language",$this->language);
        $stmt->bindParam(":description",$this->description);
        $stmt->bindParam(":time",$this->time);
        $stmt->bindParam(":id", $this->id);
        if($this->isCategorynameById($this->question,$this->id)){
            if($stmt->execute()){
                return $this->id;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
 }  
}
?>