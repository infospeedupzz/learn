<?php
include_once 'functionClass.php'; 
class User extends functionClass {
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $email;
    public $mobile="9876543210";
    public $password="123";
    public $fullname="";
    public $profile_pic="";
    public $oldpass="";
    public $newpass="";
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET email=:email,mobile=:mobile,fullname=:fullname,password =:password,profile_pic=:profile_pic ";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->email=$this->validate($this->email);
         $this->mobile=$this->validate($this->mobile);
        $this->fullname=$this->validate($this->fullname);
        $this->password=$this->validate($this->password);
 
        // to get time-stamp for 'created' field
        $this->created = date('Y-m-d');
 
        // bind values 
        $stmt->bindParam(":email", $this->email);
              $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
  
            if($stmt->execute()){

            return  $this->conn->lastInsertId();
            }else{
            return false;
            }
    }
 
 public function chkEmail($email)
    {
         $email=$this->validate($email);
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE (email=:email)");
            $query->bindParam("email", $email);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        
    }
    
   
    public function chkMobile($mobile)
    {
         $mobile=$this->validate($mobile);
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE (mobile=:mobile)");
            $query->bindParam("mobile", $mobile);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        
    }

  
public function login(){
   
     $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE ( email=:username or  mobile=:username) AND (password=:password) ");
            $query->bindParam("username", $this->phone);
            $query->bindParam("password",$this->password);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id;
            } else {
                return false;
            }
} 
 
   public function newpass(){
          
            if(!empty($this->password)){
                            $query = "UPDATE ". $this->table_name ."
                 SET  password=:password
                 WHERE id=:id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(":password", $this->password);
                $stmt->bindParam(":id", $this->id);
                    if($stmt->execute()){
                    return true;
                    }else{
                    return false;
                    }
            }else{
                return false;
            }
        
        
 }

  public function edit(){

        $query = "UPDATE ". $this->table_name ."
         SET first_name=:firstname,last_name=:lastname,gender=:gender,dob=:dob,email =:email,password =:password,status=:status,image=:image WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // posted values
        $this->firstname=$this->validate($this->firstname);
        $this->lastname=$this->validate($this->lastname);
        $this->gender=$this->validate($this->gender);
        $this->dob=$this->validate($this->dob);
        $this->email=$this->validate($this->email);
        $this->password=$this->validate($this->password);
        $this->image=$this->validate($this->image);
        // bind values 
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":status", $this->status);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        
        
 }
 public function chkUpdateEmail($email,$userid)
    {
        $email=$this->validate($email);
        $userid=$this->validate($userid);
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE (email=:email) and (id<>:id)");
            $query->bindParam("email", $email);
            $query->bindParam("id", $userid);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        
    } 
    public function chkresetEmail($email,$userid)
    {
        $email=$this->validate($email);
        $userid=$this->validate($userid);
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE (email=:email) and (id=:id)");
            $query->bindParam("email", $email);
            $query->bindParam("id", $userid);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        
    } 
    public function chkUpdateMobile($mobile,$userid)
    {
         $mobile=$this->validate($mobile);
        $userid=$this->validate($userid);
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE (mobile=:mobile) and (id<>:id)");
            $query->bindParam("mobile", $mobile);
            $query->bindParam("id", $userid);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        
    }
 public function updateprofile(){

        $query = "UPDATE ". $this->table_name ."
         SET mobile=:mobile,profile_pic=:profile_pic,fullname=:fullname WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // posted values
        $this->fullname=$this->validate($this->fullname);

        $this->mobile=$this->validate($this->mobile);
        $this->profile_pic=$this->validate($this->profile_pic);
        // bind values 
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":fullname", $this->fullname);
      
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":profile_pic", $this->profile_pic);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        
        
 }
 public function recover(){

        $query = "UPDATE ". $this->table_name ."
         SET password=:password,dob=:dob,mobile=:mobile WHERE username=:username or email=:username";
        $stmt = $this->conn->prepare($query);
        // posted values
        $this->username=$this->validate($this->username);
        $this->password=$this->validate($this->password);
        $this->dob=$this->validate($this->dob);
        $this->mobile=$this->validate($this->mobile);
        // bind values 
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":mobile", $this->mobile);
        $stmt->bindParam(":dob", $this->dob);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
 }
 public function chkPass(){
     $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE id=:id AND password=:password");
            $query->bindParam("id", $this->id);
            $query->bindParam("password", $this->opassword);
            $query->execute();
            if ($query->rowCount() > 0) {
    
                return true;
            } else {
                return false;
            }
}

 public function updatePass(){
        $query = "UPDATE ". $this->table_name ."
         SET password=:password
         WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        // bind values 
        $stmt->bindParam(":id", $this->id);  
            $stmt->bindParam("password", $this->password);

            if($stmt->execute()){
            return true;
            }else{
            return false;
            }
       
 } 
 public function updatePassbyemail(){
        $query = "UPDATE ". $this->table_name ."
         SET password=:password
         WHERE email=:email";
        $stmt = $this->conn->prepare($query);
            $this->email=$this->validate($this->email);
        // bind values 
        $stmt->bindParam(":email", $this->email);  
            $stmt->bindParam("password", $this->password);

            if($stmt->execute()){
            return true;
            }else{
            return false;
            }
       
 } 

}

?>