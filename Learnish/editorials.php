<?php
class Editorials{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getEditorials($counts, $user_id){
        
        $select_data;
        $editorials = array();
        $countt = 0;

        if($counts == '0'){
            $select_data = "SELECT *, DATE_FORMAT(date, '%d-%m-%Y') as date_format FROM editorial ORDER BY id DESC";
        }
        else{
            $select_data = "SELECT *, DATE_FORMAT(date, '%d-%m-%Y') as date_format FROM editorial ORDER BY id DESC LIMIT $counts";
        }
        
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            $editorials[] = $get_rows;
            $editorials[$countt]['date'] = $get_rows['date_format'];
            
            $countt++;
        }
        
        return json_encode($editorials);
        
    }
    
    function getCurrentAffairs($counts, $user_id){
        $select_data;
        $editorials = array();
        $countt = 0;

        if($counts == '0'){
            $select_data = "SELECT *, DATE_FORMAT(date, '%d-%m-%Y') as date_format FROM current ORDER BY id DESC";
        }
        else{
            $select_data = "SELECT *, DATE_FORMAT(date, '%d-%m-%Y') as date_format FROM current ORDER BY id DESC LIMIT $counts";
        }
        
        $results = $this->con->query($select_data);
        
        while($get_rows = $results->fetch_assoc()){
            $editorials[] = $get_rows;
            $editorials[$countt]['date'] = $get_rows['date_format'];
            
            $countt++;
        }
        
        return json_encode($editorials);
    
    }
}
?>