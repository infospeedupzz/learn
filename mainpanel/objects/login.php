<?php
include_once 'functionClass.php'; 
class adminLogin extends functionClass {
 
    // database connection and table name
    private $conn;
    public $table_name = "educators";
 
    // object properties
    public $id;
    public $username;
    public $password;
 
    public function __construct($db){
        $this->conn = $db;
    }
public function login(){
     $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE username=:username AND password=:password");
            $this->username=$this->validate($this->username);
            $this->password=$this->validate($this->password);
            $query->bindParam("username", $this->username);
            $enc_password = md5($this->password);
            $query->bindParam("password", $enc_password);
            $query->execute();
                
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id;
            } else {
                return false;
            }
} 

}
?>