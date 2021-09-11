<?php
function getUserIP22(){
        
        $ip;
        $c_date_time = date('d-m-Y H:i:s');
        
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

include_once("dbcon.php");


// $select_data = "SELECT id FROM mock WHERE course_id = 2";
// $results = $con->query($select_data);

// while($get_rows = $results->fetch_assoc()){
    
//     $get_id = $get_rows['id'];
     
//     $select_data2 = "SELECT id FROM mock_questions WHERE mock_id = '$get_id' ";
// $results2 = $con->query($select_data2);

// echo "Mock Id = ".$get_id." Questions = ".$results2->num_rows."<br>";

// }

// $select_data = "SELECT * FROM pdfs";
// $results = $con->query($select_data);

// while($get_rows = $results->fetch_assoc()){
    
//     echo "id = ".$get_rows['id']."<br>";
    
// $file_headers = @get_headers($get_rows['hindi']);
// if($file_headers[0] == 'HTTP/1.1 200 OK') {
//     echo "Hindi = ok<br>";
// }
// else {
//     echo "Hindi = Invalid Link<br>";
// }

// $file_headers = @get_headers($get_rows['english']);
// if($file_headers[0] == 'HTTP/1.1 200 OK') {
//     echo "English = ok<br>";
// }
// else {
//     echo "English = Invalid Link<br>";
// }

// echo "<br><br>";

//}

//  $selectUser = "SELECT user_id FROM m_package_purchages";
//  $userResults = $con->query($selectUser);
 
//  while($userRows = $userResults->fetch_assoc()){
     
//      $getId = $userRows['user_id'];
     
//      $selectUser2 = "SELECT id FROM users WHERE id = '$getId' AND sponsor_id = '639' ";
//      $user2Results = $con->query($selectUser2);
     
//      if($user2Results->num_rows != 0){
//          $user2Row = $user2Results->fetch_assoc();
//          echo $user2Row['id']."<br>";
//      }
//  }

$a = "aaaa";
$data = $_POST['data'];//;

//base64_decode('yhjfZ')
echo $data;

?>