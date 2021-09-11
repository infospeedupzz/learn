<?php
include_once 'functionClass.php'; 
class Mockscore extends functionClass {
 
    // database connection and table name
    private $conn;
    private $table_name = "mock_scores";
 
    // object properties
    public $id;
    public $mock_id;
    public $user_id;
    public $date;
    public $time;
    public $score;
    public $overall_score;
    public $percentile;
    public $accuracy;
    public $time_taken;
    public $attempted;
    public $correct;
    public $incorrect;
    public $language;
    public $user_answers;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET mock_id=:mock_id,user_id=:user_id,date=:date,time =:time,score=:score,overall_score=:overall_score,percentile=:percentile,accuracy=:accuracy,time_taken=:time_taken,attempted=:attempted,correct=:correct,incorrect=:incorrect,language=:language,user_answers=:user_answers ";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        /*$this->mock_id=$this->validate($this->mock_id);
         $this->user_id=$this->validate($this->user_id);
        $this->score=$this->validate($this->score);
        $this->overall_score=$this->validate($this->overall_score);
        $this->percentile=$this->validate($this->percentile);
        $this->accuracy=$this->validate($this->accuracy);
        $this->time_taken=$this->validate($this->time_taken);
        $this->attempted=$this->validate($this->attempted);
        $this->correct=$this->validate($this->correct);
        $this->incorrect=$this->validate($this->incorrect);
        $this->language=$this->validate($this->language);
        $this->user_answers=$this->validate($this->user_answers);*/
 
        // to get time-stamp for 'created' field
        $this->date = date('Y-m-d');
        $this->time = date("h:i:s");
 
        // bind values 
        $stmt->bindParam(":mock_id", $this->mock_id);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":score", $this->score);
        $stmt->bindParam(":overall_score", $this->overall_score);
        $stmt->bindParam(":percentile", $this->percentile);
        $stmt->bindParam(":accuracy", $this->accuracy);
        $stmt->bindParam(":time_taken", $this->time_taken);
        $stmt->bindParam(":attempted", $this->attempted);
        $stmt->bindParam(":correct", $this->correct);
        $stmt->bindParam(":incorrect", $this->incorrect);
        $stmt->bindParam(":language", $this->language);
        $stmt->bindParam(":user_answers", $this->user_answers);
            if($this->chkMock($this->mock_id,$this->user_id)==false){
                if($stmt->execute()){
                    return  $this->conn->lastInsertId();
                }else{
                    return false;
                }
            }
            
    }
 
public function chkMock($mock_id,$user_id){
   
     $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE ( mock_id=:mock_id ) AND (user_id=:user_id) ");
            $query->bindParam("mock_id", $mock_id);
            $query->bindParam("user_id",$user_id);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id;
            } else {
                return false;
            }
} 

  public function edit(){
      
        $query = "UPDATE ". $this->table_name ."
         SET date=:date,time =:time,score=:score,overall_score=:overall_score,percentile=:percentile,accuracy=:accuracy,time_taken=:time_taken,attempted=:attempted,correct=:correct,incorrect=:incorrect,user_answers=:user_answers WHERE id=:id";
        $stmt = $this->conn->prepare($query);
         $this->date = date('Y-m-d');
        $this->time = date("h:i:s");
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":score", $this->score);
        $stmt->bindParam(":overall_score", $this->overall_score);
        $stmt->bindParam(":percentile", $this->percentile);
        $stmt->bindParam(":accuracy", $this->accuracy);
        $stmt->bindParam(":time_taken", $this->time_taken);
        $stmt->bindParam(":attempted", $this->attempted);
        $stmt->bindParam(":correct", $this->correct);
        $stmt->bindParam(":incorrect", $this->incorrect);
        $stmt->bindParam(":user_answers", $this->user_answers);
        $stmt->bindParam(":id", $this->id);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
 }


}

?>