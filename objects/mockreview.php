<?php
include_once 'functionClass.php'; 
class Mockreview extends functionClass{
 
    // database connection and table name
    private $conn;
    private $table_name = "mock_ratings";
 
    // object properties
    public $mock_id;
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
                SET mock_id=:mock_id,feedback=:review,rating=:rate,user_id =:user_id,date_time=:date";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->mock_id=$this->validate($this->mock_id);
         $this->review=$this->validate($this->review);
        $this->rate=$this->validate($this->rate);
        $this->user_id=$this->validate($this->user_id);
 
        // to get time-stamp for 'created' field
        $this->date = date('Y-m-d h:i:s a');
 
        // bind values 
        $stmt->bindParam(":mock_id", $this->mock_id);
              $stmt->bindParam(":review", $this->review);
        $stmt->bindParam(":rate", $this->rate);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":date", $this->date);
            if($this->chk($this->mock_id,$this->user_id)==false){
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
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE (mock_id=:mock_id and user_id=:user_id)");
            $query->bindParam("mock_id", $cid);
            $query->bindParam("user_id", $uid);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        
    }
 public function edit(){
        $this->date = date('Y-m-d h:i:s a');
        $query = "UPDATE ". $this->table_name ."
         SET feedback=:review,rating=:rate,date_time=:date WHERE mock_id=:mock_id and user_id=:user_id";
        $stmt = $this->conn->prepare($query);
      
        // posted values
     $this->mock_id=$this->validate($this->mock_id);
         $this->review=$this->validate($this->review);
        $this->rate=$this->validate($this->rate);
        $this->user_id=$this->validate($this->user_id);
        // bind values 
        $stmt->bindParam(":mock_id", $this->mock_id);
        $stmt->bindParam(":review", $this->review);
        $stmt->bindParam(":rate", $this->rate);
        $stmt->bindParam(":user_id", $this->user_id);
          $stmt->bindParam(":date", $this->date);
       
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        
        
 }

 

    
}
?>