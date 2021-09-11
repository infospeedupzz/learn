<?php
include_once 'functionClass.php'; 
class Coursereview extends functionClass{
 
    // database connection and table name
    private $conn;
    private $table_name = "course_review";
 
    // object properties
    public $course_id;
    public $review;
    public $rate;
    public $user_id;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    
    // create product
   function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET course_id=:course_id,review=:review,rate=:rate,user_id =:user_id,date=:date";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->course_id=$this->validate($this->course_id);
         $this->review=$this->validate($this->review);
        $this->rate=$this->validate($this->rate);
        $this->user_id=$this->validate($this->user_id);
 
        // to get time-stamp for 'created' field
        $this->date = date('Y-m-d h:i:s a');
 
        // bind values 
        $stmt->bindParam(":course_id", $this->course_id);
              $stmt->bindParam(":review", $this->review);
        $stmt->bindParam(":rate", $this->rate);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":date", $this->date);
            if($this->chk($this->course_id,$this->user_id)==false){
            if($stmt->execute()){

            return  $this->conn->lastInsertId();
            }else{
            return false;
            }
        }else{
            return $this->edit();
        }
    }
 public function chk($cid,$uid)
    {
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE (course_id=:course_id and user_id=:user_id)");
            $query->bindParam("course_id", $cid);
            $query->bindParam("user_id", $uid);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        
    }
 public function edit(){

        $query = "UPDATE ". $this->table_name ."
         SET review=:review,rate=:rate WHERE course_id=:course_id and user_id=:user_id";
        $stmt = $this->conn->prepare($query);
      
        // posted values
     $this->course_id=$this->validate($this->course_id);
         $this->review=$this->validate($this->review);
        $this->rate=$this->validate($this->rate);
        $this->user_id=$this->validate($this->user_id);
        // bind values 
        $stmt->bindParam(":course_id", $this->course_id);
        $stmt->bindParam(":review", $this->review);
        $stmt->bindParam(":rate", $this->rate);
        $stmt->bindParam(":user_id", $this->user_id);
       
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        
        
 }

 

    
}
?>