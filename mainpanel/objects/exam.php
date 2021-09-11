<?php
include_once 'functionClass.php'; 
class Exam extends functionClass{
    // database connection and table name
    private $conn;
    private $table_name = "exam";
 
    // object properties
    public $id;
    public $name;
 	public $subject_id;
    public $title;
    public $alias;
    public $overview;
    public $exam_date;
    public $eligibility_criteria;
    public $exam_pattern;
    public $syllabus;
    public $cut_off;
    
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name,title=:title,alias=:alias,overview=:overview,exam_date=:exam_date,eligibility_criteria=:eligibility_criteria,exam_pattern=:exam_pattern,syllabus=:syllabus,cut_off=:cut_off";
                    
 
        $stmt = $this->conn->prepare($query);
        $cdate=date("Y-m-d");
        // posted values
        $this->vali();
        // bind values 
        $stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":title",$this->title);
        $stmt->bindParam(":alias",$this->alias);
        $stmt->bindParam(":overview",$this->overview);
        $stmt->bindParam(":exam_date",$this->exam_date);
        $stmt->bindParam(":eligibility_criteria",$this->eligibility_criteria);
        $stmt->bindParam(":exam_pattern",$this->exam_pattern);
        $stmt->bindParam(":syllabus",$this->syllabus);
        $stmt->bindParam(":cut_off",$this->cut_off);
        if($this->isCategoryname($this->title)){
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
    private function isCategoryname($title)
    {
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE title=:title");
            $query->bindParam("title", $title);
            $query->execute();

            if ($query->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
        
    }
    private function isCategorynameById($title,$id)
    {  
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE title=:title AND id <>:id");
            $query->bindParam("title", $title);
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
         SET name=:name,title=:title,alias=:alias,overview=:overview,exam_date=:exam_date,eligibility_criteria=:eligibility_criteria,exam_pattern=:exam_pattern,syllabus=:syllabus,cut_off=:cut_off WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $this->vali();
        // bind values 
         $stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":title",$this->title);
        $stmt->bindParam(":alias",$this->alias);
        $stmt->bindParam(":overview",$this->overview);
        $stmt->bindParam(":exam_date",$this->exam_date);
        $stmt->bindParam(":eligibility_criteria",$this->eligibility_criteria);
        $stmt->bindParam(":exam_pattern",$this->exam_pattern);
        $stmt->bindParam(":syllabus",$this->syllabus);
        $stmt->bindParam(":cut_off",$this->cut_off);
        $stmt->bindParam(":id", $this->id);
        if($this->isCategorynameById($this->title,$this->id)){
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