<?php
include_once 'functionClass.php'; 
class Cousse extends functionClass{
 
    // database connection and table name
    private $conn;
    private $table_name = "course";
 
    // object properties
    public $id;
    public $name;
 	public $img;
    public $back_color;
    public $price;
    public $from_points;
    public $duration;
    public $publish;
    public $alias;
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name,img=:img,back_color=:back_color,price=:price,from_points=:from_points,duration=:duration,publish=:publish,alias=:alias";
                    
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=$this->validate($this->name);
        $this->back_color=$this->validate($this->back_color);
        $this->price=$this->validate($this->price);
        $this->from_points=$this->validate($this->from_points);
        $this->duration=$this->validate($this->duration);
        $this->alias=$this->validate($this->alias);
        // bind values 
        $stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":img",$this->img);
        $stmt->bindParam(":back_color",$this->back_color);
        $stmt->bindParam(":price",$this->price);
        $stmt->bindParam(":from_points",$this->from_points);
        $stmt->bindParam(":duration",$this->duration);
        $stmt->bindParam(":publish",$this->publish);
        $stmt->bindParam(":alias",$this->alias);
        if($this->isCategoryname($this->name)){
            if($stmt->execute()){

            return  $this->conn->lastInsertId();
            }else{
            return false;
            }
        }else{
            return false;
        }
        
 
    }
    private function isCategoryname($name)
    {
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE name=:name");
            $query->bindParam("name", $name);
            $query->execute();

            if ($query->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
        
    }
    private function isCategorynameById($name,$id)
    {  
            $query = $this->conn->prepare("SELECT id FROM ". $this->table_name ." WHERE name=:name AND id <>:id");
            $query->bindParam("name", $name);
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
         SET name=:name,color=:color WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // posted values
        $this->name=$this->validate($this->name);
        // bind values 
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
	 $stmt->bindParam(":color",$this->color);
        if($this->isCategorynameById($this->name,$this->id)){
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
 }  
}
?>