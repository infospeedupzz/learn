<?php
include_once 'functionClass.php'; 
class CreateEducatorApply extends functionClass{
 
    // database connection and table name
    private $conn;
    private $table_name = "apply_educator";
 
    // object properties
    public $name;
    public $email;
    public $phone;
    public $dob;
    public $address;
    public $gender;
    public $resume;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    
    // create product
   function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET name=:name,email=:email,phone=:phone,dob=:dob,address=:address,gender=:gender,resume=:resume,created=:date";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=$this->validate($this->name);
         $this->email=$this->validate($this->email);
        $this->phone=$this->validate($this->phone);
        $this->dob=$this->validate($this->dob);
        $this->address=$this->validate($this->address);
        $this->gender=$this->validate($this->gender);
        $this->resume=$this->validate($this->resume);
 
        // to get time-stamp for 'created' field
        $this->date = date('Y-m-d h:i:s a');
 
        // bind values 
        $stmt->bindParam(":name", $this->name);
              $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":resume", $this->resume);
        $stmt->bindParam(":date", $this->date);
         
            if($stmt->execute()){

            return  $this->conn->lastInsertId();
            }else{
            return false;
            }
      
    }



 

    
}
?>