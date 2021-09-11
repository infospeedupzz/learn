<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once("dbcon.php");
    date_default_timezone_set('Asia/Kolkata');

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

$get_referral_code = $_GET['id'];
$getModuleId = $_GET['m_id'];
$getMockId = $_GET['mock_id'];
$date_time = date('Y-m-d H:i:s');
$user_ip = getUserIp();

$insert_data = "INSERT INTO refers(referral_code, ip, date_time, module_id, mock_id) VALUES('$get_referral_code', '$user_ip', '$date_time', '$getModuleId', '$getMockId')";
$con->query($insert_data);

$con->close();

header("Location: https://play.google.com/store/apps/details?id=com.learnoset.learnish");
die();

}

?>