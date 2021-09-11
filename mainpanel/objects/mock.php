<?php
include_once 'functionClass.php'; 
class Mock extends functionClass{
    // database connection and table name
    private $conn;
    private $table_name = "mock";
 
    // object properties
    public $id;
    public $title;
 	public $course_id;
    public $package_id;
    public $name;
    public $img;
    public $status;
    public $questions;
    public $max_time;
    public $marks;
    public $price;
    public $can_skip;   
    public $publish;
    public $duration;
    public $language;
    
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    title=:title,course_id=:course_id,package_id=:package_id,name=:name,img=:img,status=:status,questions=:questions,max_time=:max_time,marks=:marks,price=:price,can_skip=:can_skip,publish=:publish,duration=:duration,language=:language,published_date=:published_date";
                    
 
        $stmt = $this->conn->prepare($query);
        $cdate=date("Y-m-d");
        // posted values
        $this->vali();
        // bind values 
        $stmt->bindParam(":title", $this->title);
		$stmt->bindParam(":course_id",$this->course_id);
        $stmt->bindParam(":package_id",$this->package_id);
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":img",$this->img);
        $stmt->bindParam(":status",$this->status);
        $stmt->bindParam(":questions",$this->questions);
        $stmt->bindParam(":max_time",$this->max_time);
        $stmt->bindParam(":marks",$this->marks);
        $stmt->bindParam(":price",$this->price);
        $stmt->bindParam(":can_skip",$this->can_skip);
        $stmt->bindParam(":publish",$this->publish);
        $stmt->bindParam(":duration",$this->duration);
        $stmt->bindParam(":language",$this->language);
        $stmt->bindParam(":published_date",$cdate);
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
          $this->title=$this->validate($this->title);
        $this->name=$this->validate($this->name);
        $this->questions=$this->validate($this->questions);
        $this->max_time=$this->validate($this->max_time);
        $this->marks=$this->validate($this->marks);
        $this->price=$this->validate($this->price);
        $this->duration=$this->validate($this->duration);
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
         SET  title=:title,course_id=:course_id,package_id=:package_id,name=:name,img=:img,status=:status,questions=:questions,max_time=:max_time,marks=:marks,price=:price,can_skip=:can_skip,publish=:publish,duration=:duration,language=:language WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $this->vali();
        // bind values 
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":course_id",$this->course_id);
        $stmt->bindParam(":package_id",$this->package_id);
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":img",$this->img);
        $stmt->bindParam(":status",$this->status);
        $stmt->bindParam(":questions",$this->questions);
        $stmt->bindParam(":max_time",$this->max_time);
        $stmt->bindParam(":marks",$this->marks);
        $stmt->bindParam(":price",$this->price);
        $stmt->bindParam(":can_skip",$this->can_skip);
        $stmt->bindParam(":publish",$this->publish);
        $stmt->bindParam(":duration",$this->duration);
        $stmt->bindParam(":language",$this->language);
        $stmt->bindParam(":id", $this->id);
        if($this->isCategorynameById($this->title,$this->id)){
            if($stmt->execute()){
                return $this->title;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
 }  
}
?>