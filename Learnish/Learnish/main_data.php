<?php
class MainData{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function checkUpdate($version_code){
        
        $select_user = "SELECT version FROM main_data WHERE id = '1' ";
        $results = $this->con->query($select_user);
        $get_row = $results->fetch_assoc();
        
        if($get_row['version'] > $version_code){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    function getMainData(){
        
        $select_user = " SELECT * FROM main_data WHERE id = '1' ";
        $results = $this->con->query($select_user);
        return json_encode($results->fetch_assoc());
    }
    
    function checkUser($username){
        
        $select_user = " SELECT id FROM users WHERE username = '$username' ";
        $results = $this->con->query($select_user);
        
        if( $results->num_rows == 0){
            return false;
        }
        else{
            return true;
        }
    }
}
?>