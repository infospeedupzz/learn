<?php
include_once 'functionClass.php'; 
class Createcontact extends functionClass{
 
    // database connection and table name
    private $conn;
    private $table_name = "contact_us";
 
    // object properties
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $user_id;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    
    // create product
   function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET name=:name,email=:email,phone=:phone,subject=:subject,message=:message,user_id =:user_id,date=:date";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=$this->validate($this->name);
         $this->email=$this->validate($this->email);
        $this->phone=$this->validate($this->phone);
        $this->subject=$this->validate($this->subject);
        $this->message=$this->validate($this->message);
        $this->user_id=$this->validate($this->user_id);
 
        // to get time-stamp for 'created' field
        $this->date = date('Y-m-d h:i:s a');
 
        // bind values 
        $stmt->bindParam(":name", $this->name);
              $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":subject", $this->subject);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":date", $this->date);
         
            if($stmt->execute()){

            return  $this->conn->lastInsertId();
            }else{
            return false;
            }
      
    }



 

    
}
?>