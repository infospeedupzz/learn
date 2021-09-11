<?php
include_once 'functionClass.php'; 
class Review extends functionClass{
 
    // database connection and table name
    private $conn;
    private $table_name = "review";
 
    // object properties
    public $id;
    public $review;
    public $rating;
    public $ip;
    private $date;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET review=:review,rating=:rating,date=:date,ip=:ip";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->review=$this->validate($this->review);
        $this->rating=$this->validate($this->rating);
        $this->date=date("Y-m-d H:i:s");
        // bind values 
        $stmt->bindParam(":review", $this->review);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":ip", $this->ip);
            if($this->checkIP($this->ip)){
            if($stmt->execute()){
            return  $this->conn->lastInsertId();
            }else{
            return false;
            }
        }else{
            return $this->edit();
        }
 
    }
  private function checkIP($ip){
       $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE ip=:ip");
            $query->bindParam("ip", $ip);
            $query->execute();

            if ($query->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
        
  }

 public function edit(){

        $query = "UPDATE ". $this->table_name ."
         SET  review=:review,rating=:rating,date=:date WHERE ip=:ip";
        $stmt = $this->conn->prepare($query);
      
        // posted values
        $this->review=$this->validate($this->review);
        $this->rating=$this->validate($this->rating);
         $this->date=date("Y-m-d H:i:s");
        // bind values 
        $stmt->bindParam(":review", $this->review);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":ip", $this->ip);
       
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        
        
 }

 

    
}
?>