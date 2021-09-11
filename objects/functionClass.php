<?php
class functionClass{
 
    // database connection and table name
    private $conn;
    private  $ciphering = "AES-128-CBC"; 
    private  $options = 0; 
    private $en_iv = 'bcdefghijklmnosd';
    private $en_key = "bathinda";


        function checkemail($str) {
            
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }

    public function __construct($db){
        $this->conn = $db;
    }
    public function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return round($diff / 86400); 
} 
  
 function fetchAll($sql, $bindings = array()){
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
   public function getRows($table) {
        $data=array();
       $query = $this->conn->prepare("SELECT * FROM $table");
        $query->execute();
        while($r = $query->fetch(PDO::FETCH_ASSOC)){
            $data[]=$r;
        }

        return $data;
    }  
   
    public function getRowsByID($table,$byCol,$id) {
        $data=array();
        $query = $this->conn->prepare("SELECT * FROM $table where $byCol=:id");
            $query->bindParam("id", $id);
            $query->execute();
            while($r = $query->fetch(PDO::FETCH_ASSOC)){
                 $data[]=$r;
            }
        return $data;
    }
      public function getRowsByWhere($table,$byQue,$qArr) {
        $data=array();
        $query = $this->conn->prepare("SELECT * FROM $table where $byQue");
        foreach($qArr as $key => &$key_value) {
            $query->bindParam($key, $key_value);
        }
            $query->execute();
            while($r = $query->fetch(PDO::FETCH_ASSOC)){
                 $data[]=$r;
            }
            return $data;
    }
  
    
    public function getLike($table,$bylike,$arr){
                $data=array();
            $stmt  = $this->conn->prepare("SELECT * FROM $table WHERE $bylike");
            $stmt->execute($arr);
            $data = $stmt->fetchAll();
            return $data;
    }
  
  
     public function getById($table,$id) {
        $data=array();
        $query = $this->conn->prepare("SELECT * FROM $table where sno=:sno");
            $query->bindParam("sno", $id);
            $query->execute();
            $data[]= $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
      public function getColById($table,$col,$id) {
        $data=array();
        $query = $this->conn->prepare("SELECT $col FROM $table where id=:sno");
            $query->bindParam("sno", $id);
            $query->execute();
            $data[]= $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function EN($data){
              $iv_length = openssl_cipher_iv_length($this->ciphering);
            // Use openssl_encrypt() function to encrypt the data 
            $encryption =bin2hex( openssl_encrypt($data, $this->ciphering, 
                        $this->en_key, $this->options, $this->en_iv));
             return $encryption;            
    }
    public function DE($encryption){
        $iv_length = openssl_cipher_iv_length($this->ciphering);
        // Use openssl_decrypt() function to decrypt the data 
        $decryption=openssl_decrypt (hex2bin($encryption), $this->ciphering, 
                        $this->en_key, $this->options, $this->en_iv); 
        return $decryption;
          
    }
   public function updateByQ($table,$byQue,$qArr){

        $query = $this->conn->prepare("UPDATE $table SET $byQue");
        foreach($qArr as $key => &$key_value) {
            $query->bindParam($key, $key_value);
        }

        if($query->execute()){
            return true;
            }else{
            return false;
            }
    }
    
    public function updateCoin($orderid){
        $orderRow=$this->getColById("orders","productid,orderby",$orderid);
        $productRow=$this->getColById("products","discountPrice",$orderRow[0]['productid']);
        $coinRow=$this->getColById("coincal","amount",'1');
        $userRow=$this->getColById("users","coins",$orderRow[0]['orderby']);
     
        if($productRow[0]['discountPrice']>$coinRow[0]['amount']){
         
           $coinC=($productRow[0]['discountPrice']/$coinRow[0]['amount']);
           
        $newCoin=$userRow[0]['coins']+$coinC;
        $query = $this->conn->prepare("UPDATE users SET coins=:coins where id=:id");
            $query->bindParam(":coins",  $newCoin);
            $query->bindParam(":id", $orderRow[0]['orderby']);
        if($query->execute()){
            return true;
            }else{
            return false;
            }
        }
       
    }
   
 public function countRows($q,$qArr){

         $data=array();
        $query = $this->conn->prepare("SELECT count(id) FROM $q");
        foreach($qArr as $key => &$key_value) {
            $query->bindParam($key, $key_value);
        }
            $query->execute();
           return $query->fetchColumn(); 
             
    }
    public function validate($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}


   public function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

    public function hoursandmins($time, $format = '%02d:%02d:%02d')
    {
        if (($time-1)==0) {
              return sprintf($format, "00","00","60");
        }
        $hours = floor(($time-1) / 60);
        $minutes = (($time-1) % 60);
        return sprintf($format, $hours, $minutes,"60");
    }
   
}
?>