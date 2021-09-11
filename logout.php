<?php session_start();
   $_SESSION['userId']="";
   $_SESSION['otp']="";
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

include('googlelogin/gconfig.php');

//Reset OAuth access token
$google_client->revokeToken();
session_destroy();
      header("Location: /");
   
?>