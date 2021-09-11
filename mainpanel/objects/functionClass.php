<?php
class functionClass{
 
    // database connection and table name
    private $conn;
    private  $ciphering = "AES-128-CTR"; 
    private  $options = 0; 
    private $en_iv = '1234567891011121';
    private $en_key = "bathinda";


        

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
   public function getRowsByQuery($query) {
        $data=array();
       $query = $this->conn->prepare(" $query ");
        $query->execute();
        while($r = $query->fetch(PDO::FETCH_ASSOC)){
            $data[]=$r;
        }

        return $data;
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
            $stmt  = $this->conn->prepare(" $table WHERE $bylike");
            $stmt->execute($arr);
            $data = $stmt->fetchAll();
            return $data;
    }
    
     public function deleteData($table,$id)
    {
            $query = $this->conn->prepare("DELETE FROM ". $table ." WHERE sno=:sno");
            $query->execute(array(':sno'=>$id));
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        
    }   
    public function deleteDatabyCol($table,$col,$id)
    {
            $query = $this->conn->prepare("DELETE FROM ". $table ." WHERE ". $col ."=:id");
            $query->execute(array(':id'=>$id));
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        
    }  
    public function deleteDataID($table,$id)
    {
            $query = $this->conn->prepare("DELETE FROM ". $table ." WHERE id=:id");
            $query->execute(array(':id'=>$id));
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        
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
        $query = $this->conn->prepare("SELECT $col FROM $table where sno=:sno");
            $query->bindParam("sno", $id);
            $query->execute();
            $data[]= $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function encrpt($data){
              $iv_length = openssl_cipher_iv_length($this->ciphering);
            // Use openssl_encrypt() function to encrypt the data 
            $encryption = openssl_encrypt($data, $this->ciphering, 
                        $this->en_key, $this->options, $this->en_iv);
             return $encryption;            
    }
    public function decrpt($encryption){
        $iv_length = openssl_cipher_iv_length($this->ciphering);
        // Use openssl_decrypt() function to decrypt the data 
        $decryption=openssl_decrypt ($encryption, $this->ciphering, 
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
        $query = $this->conn->prepare("SELECT count(id) FROM $q ");
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

public function discountCal($mrp,$discountprice,$userid){
                             $dis=($mrp-$discountprice);
                               $resultProductDis=$this->getById('discount',1);
                                $dpercent=$resultProductDis[0]['coupon'];
                            $resultUser=$this->getById('users',$userid);
                               if($resultUser[0]['coins']>0){
                                   $p11=(($dis/100)*$resultProductDis[0]['point']);
                                     if($resultUser[0]['coins']>=$p11){
                                       $p=$p11;
                                    }else{
                                        $dpercent=$dpercent+$resultProductDis[0]['point'];
                                    }
                                }else{
                                        $dpercent=$dpercent+$resultProductDis[0]['point'];
                                }
                                
                               if($resultUser[0]['refer_amount']>0){
                                     $r11=(($dis/100)*$resultProductDis[0]['refer']);
                                if($resultUser[0]['refer_amount']>=$r11){
                                    $r=$r11;
                                }else{
                                      $dpercent=$dpercent+$resultProductDis[0]['refer'];
                                }
                               }else{
                                     $dpercent=$dpercent+$resultProductDis[0]['refer'];
                               }
                      
                 
		              $s=(($dis/100)*$resultProductDis[0]['seller']);
		              $v=(($dis/100)*$resultProductDis[0]['vayoz']);
		              $d=(($dis/100)*$dpercent);
		                $discountPrice=round(($mrp)-$s-$p-$r-$v-$d,2);
		                return $discountPrice;
}
    
}
?>