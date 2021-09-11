<?php
class Users{
    
    public $con;
    
    public function __construct($con) {
        $this->con = $con;
    }
    
    function getUserIp(){
        
        $ip;
        
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        
        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }
        
        elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }
        
        else
        {
            $ip = $remote;
        }
        return $ip;
        
    }
    
    function registerUser($fullname, $email, $mobile, $password, $profile_pic){
        
        $response = array();
        
        // check if user is already registered or not. checkUser = true means user not registered
        if($this->checkUser($email, $mobile) ){
            
            $filepath = "";
            $time_stamps = time();
            $curent_date = date('Y-m-d');
            
            // check if user is invited by someone else to give them reward
            $sponsorId = $this->checkUserRefer();
            
            $referral_code = $this->generateReferralCode();
            
            if ($profile_pic!=''){
              $filepath = "ProfilePics/$time_stamps.png";
              file_put_contents($filepath, base64_decode($profile_pic));
            }
            
            $insert_new_user = "INSERT INTO users(email, mobile, fullname, password, profile_pic, referral_code,points, register_date, sponsor_id) VALUES('$email', '$mobile', '$fullname', '$password', '$filepath', '$referral_code', '10', '$curent_date', '$sponsorId')";
            
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
    
    function checkUserRefer(){
        
        $response =  0;
        
        $curentDateTime = date('Y-m-d H:i:s');
        
        $getUserIp = $this->getUserIp();
        
//         $myfile = fopen("ipcheck.txt", "w");
// fwrite($myfile, $getUserIp);
// fclose($myfile);
        
        $select_data = "SELECT id, referral_code, module_id, mock_id FROM refers WHERE ip = '$getUserIp' AND status = 'Unused' ORDER BY id DESC LIMIT 1";
        $results = $this->con->query($select_data);
        
        if($results->num_rows > 0){
            
            $get_row = $results->fetch_assoc();
            $get_id = $get_row['id'];
            $get_referal_code = $get_row['referral_code'];
            $getModuleId = $get_row['module_id'];
            $getMockId = $get_row['mock_id'];
            
            // Select User
            $selectUser = "SELECT id FROM users WHERE referral_code = '$get_referal_code'";
            $userResults = $this->con->query($selectUser);
            
            if($userResults->num_rows > 0){
                
                $userRow = $userResults->fetch_assoc();
                $getUserId = $userRow['id'];
                $response = $getUserId;
                
                // give user reward of whom referral code is used by user
                $update_user = "UPDATE users SET points = points + 10 WHERE referral_code = '$get_referal_code'";
                $this->con->query($update_user);
                
                if($getModuleId == 0 && $getMockId == 0){
                    // Update Refer status to used
                    $update_date = "UPDATE refers SET status = 'Used' WHERE id = '$get_id' ";
                    $this->con->query($update_date);
                }
                
                // unlock module if user share invite link to unlock the module
                // check if module can be unlocked through share
                $selectModule = "SELECT id FROM modules WHERE id = '$getModuleId' AND can_share = 'true' ";
                $moduleResults = $this->con->query($selectModule);
                
                if($moduleResults->num_rows > 0){
                    $insetModules = "INSERT INTO unlocked_modules(module_id, user_id, date_time) VALUES('$getModuleId', '$getUserId', '$curentDateTime')";
                    $this->con->query($insetModules);
                }
                
                // unlock mock test if user share invite link to unlock the mock test
                // check if mock can be unlocked through share
                $selectMock2 = "SELECT id FROM mock WHERE id = '$getMockId' AND can_share = 'true' ";
                $mock2Results = $this->con->query($selectMock2);
                
                if($mock2Results->num_rows > 0){
                    $insetMocks = "INSERT INTO unlocked_mocks(mock_id, user_id, date_time) VALUES('$getMockId', '$getUserId', '$curentDateTime')";
                    $this->con->query($insetMocks);
                }
                
            }
            
        }
        
        return $response;
    }
    
    function checkUser($email, $mobile){
        
        $select_user = " SELECT id FROM users WHERE email = '$email' OR mobile = '$mobile'";
        $results = $this->con->query($select_user);

        if($results->num_rows == 0){
            return true;
        }
        else{
            return false;
        }
    }
    
    function getSingleUser($user_id){
        
        $curent_date = date('Y-m-d');
        $curent_time = date('H:i:s');
        
        $select_user = "SELECT * FROM users WHERE id = '$user_id' ";
        $results = $this->con->query($select_user);
        $getUserRow = $results->fetch_assoc();
        
        // check if user can ask doubts (means if user has purchaged doubt subscription)
        $selectDoubtPurchages = "SELECT id FROM doubts_purchages WHERE user_id = '$user_id'";
        $doubtPurchagesResults = $this->con->query($selectDoubtPurchages);
        
        if($doubtPurchagesResults->num_rows > 0){
           $getUserRow['can_ask_doubt'] = true;
      
            
            // get live if available
            $selectLive = "SELECT * FROM live WHERE date = '$curent_date' AND time < '$curent_time'";
            $liveResults = $this->con->query($selectLive);
            
            if($liveResults->num_rows > 0){
                $liveRow = $liveResults->fetch_assoc();
                $getUserRow['live'] = $liveRow;
            }
            
        }
        else{
            $getUserRow['can_ask_doubt'] = false;
        }
        
        
        // get user's today's asked doubts
        $selectUserDoubts = "SELECT id FROM user_doubts WHERE user_id = '$user_id' AND date_time LIKE '%$curent_date%'";
        $userDoubtsResults = $this->con->query($selectUserDoubts);
        $getUserRow['user_today_is_asked_doubts'] = $userDoubtsResults->num_rows;
    
    
        
        $update_user = "UPDATE users SET login_date = '$curent_date', login_time = '$curent_time' WHERE id = '$user_id'";
        $this->con->query($update_user);
        
        return $getUserRow;
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
    
    function increaseQuizAttempts($user_id){
        
        $update_user = "UPDATE users SET attempted_quizzes = attempted_quizzes + 1 WHERE id = '$user_id' ";
        $this->con->query($update_user);
    }
    
    function increaseMockAttempts($user_id){
        
        $update_user = "UPDATE users SET attempted_mock = attempted_mock + 1 WHERE id = '$user_id' ";
        $this->con->query($update_user);
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
    
    function updateFCMToken($fcm_token, $user_id){
        
        $update_user = "UPDATE users SET firebase_key = '$fcm_token' WHERE id = '$user_id' ";
        $this->con->query($update_user);
        
    }
    
    function updateProfile($user_id, $profile_pic, $fullname){
        
        $filepath = "";
        $time_stamps = time();
        
        $response = array();
            
        if ($profile_pic!=''){
            $filepath = "ProfilePics/$time_stamps.png";
            file_put_contents($filepath, base64_decode($profile_pic));
        }
            
        $update_user = "UPDATE users SET profile_pic = '$filepath', fullname = '$fullname' WHERE id = '$user_id' ";
        $this->con->query($update_user);
        
        $response['profile_pic'] = $filepath;
        
        return json_encode($response);
    
    }
    
    function generateReferralCode(){
        
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $refer_id = substr(str_shuffle($str_result) , 0, 10);
        
        $se = "SELECT id FROM users WHERE referral_code ='" . $refer_id . "'";
        
        $resultt = $this->con->query($se);
        
        if ($resultt->num_rows == 0) {
            	 return $refer_id;
        }else{
           generateReferralCode();
        }
    }
    
}
?>