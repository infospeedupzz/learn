<?php
class Users{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function registerUser($fullname, $email, $mobile, $password){
        
        $response = array();
        
        // check if user is already registered or not. checkUser = true means user not registered
        if($this->checkUser($email, $mobile) ){
            
            $insert_new_user = "INSERT INTO users(email, mobile, fullname, password) VALUES('$email', '$mobile', '$fullname', '$password')";
            $this->con->query($insert_new_user);

            $user_id = $this->con->insert_id;
            
            $response['id'] = $user_id;
            $response['status'] = 1;
        }
        else{
            $response['status'] = 0;
        }
        
        return json_encode($response);
    }
    
    function checkUser($email, $mobile){
        
        $select_user = " SELECT id FROM users WHERE email = '$email' OR mobile = '$mobile'";
        $results = $this->con->query($select_user);
        
        if( $results->num_rows == 0){
            return true;
        }
        else{
            return false;
        }
    }
    
    function getSingleUser($user_id){
        
        $select_user = "SELECT * FROM users WHERE id = '$user_id' ";
        $results = $this->con->query($select_user);
        
        return $results->fetch_assoc();
    }
    
    function loginUser($username, $password, $get_login_type){
        
        $response = array();
        
        $select_user = "SELECT id FROM users WHERE (email = '$username' OR mobile = '$username') AND password = '$password' ";
        
        if($get_login_type == 'google'){
            $select_user = "SELECT id FROM users WHERE email = '$username' OR mobile = '$username'";
        }
        else if($get_login_type == 'fb'){
            $select_user = "SELECT id FROM users WHERE email = '$username' OR mobile = '$username'";
        }
        
        $results = $this->con->query($select_user);
        $get_row = $results->fetch_assoc();
        
        if($results->num_rows == 0){
            $response['status'] = 0;
        }
        else{
            $response['status'] = 1;
            $response['id'] = $get_row['id'];
        }
        
        return json_encode($response);
    }
    
    function checkReferralCode($referral_code, $username){
        
        $select_user = " SELECT username, bonus_cash, referred_users FROM users WHERE referral_code = '$referral_code'";
        $results = $this->con->query($select_user);
        $get_row = $results->fetch_assoc();
        
        if($results->num_rows == 0){
            return 0;
        }
        
        else{
            
            $sponsor_username = $get_row['username']; //get sponsor username
            
            // check if user already used referral code or already referred by sposnor
            $user_details = $this->getSingleUserByColumns($username, 'sponsor');
            
            if($user_details['sponsor'] == ''){
                
                $this->updateBonusCash(20, $sponsor_username, true); // update bonus cash of sponsor
                
                // update user sponsor
                $update_sponsor = "UPDATE users SET sponsor = '$sponsor_username' WHERE username = '$username' ";
                $this->con->query($update_sponsor);
                
                return 1;
            }
            
            else{
                
                return 2;
            }
            
        }
        
    }
    
    function updateBonusCash($amount, $username, $is_credit){
        
        // check if credit or debit
        if($is_credit){
            $update_user = "UPDATE users SET bonus_cash = bonus_cash + $amount WHERE username = '$username' ";
            $this->con->query($update_user); 
        }
        else{
            $update_user = "UPDATE users SET bonus_cash = bonus_cash - $amount WHERE username = '$username' ";
            $this->con->query($update_user);
        }
    }
    
    function updateDepositCash($amount, $username, $is_credit){
        
        // check if credit or debit
        if($is_credit){
            $update_user = "UPDATE users SET deposit_cash = deposit_cash + $amount WHERE username = '$username' ";
            $this->con->query($update_user); 
        }
        else{
            $update_user = "UPDATE users SET deposit_cash = deposit_cash - $amount WHERE username = '$username' ";
            $this->con->query($update_user);
        }
    }
    
    function generateReferralCode(){
        
        //Generate Referal Code
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $refer_id = substr(str_shuffle($str_result) , 0, 8);
        
        $se = "SELECT id FROM users WHERE referral_code = '$refer_id'";
        $resultt = $this->con->query($se);
        
        if ($resultt->num_rows==0) {
            	 return $refer_id;
        }else{
           generateReferralCode();
        }
    }
    
    function getSingleUserByColumns($username, $columns){
        
        $select_user = "SELECT $columns FROM users WHERE username = '$username' ";
        $results = $this->con->query($select_user);
        
        return $results->fetch_assoc();
        
    }
    
    function getUserTransactions($username){
        
        $data = array();
        
        $select_user = "SELECT * FROM transactions WHERE username = '$username' ";
        $results = $this->con->query($select_user);
        
        while ($get_row = $results->fetch_assoc()){
            $data[] = $get_row;
        }
        
        return json_encode($data);
    }
    
    function updateFCMToken($username, $fcm_token){
        
        $update_user = "UPDATE users SET firebase_key = '$fcm_token' WHERE username = '$username' ";
        $this->con->query($update_user);
        
    }
}
?>