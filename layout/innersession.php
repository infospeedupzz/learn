<?php session_start();
 $ROOT= $_SERVER['DOCUMENT_ROOT'];
 include_once $ROOT .'/objects/functionClass.php'; 
 include_once $ROOT.'/config/database.php'; 
   $database = new Database();
$db = $database->getConnection();
 $functionClass = new functionClass($db);
 date_default_timezone_set("Asia/Kolkata");
 


if(!isset($_SESSION['userId'])){
    $_SESSION['userId']="";
}
if(empty($_SESSION['userId']) || $_SESSION['userId']==""){
if(isset($_COOKIE["5180837cc66eeb809385dc2d52ff348c"])) {
    
    if(!empty($_COOKIE["5180837cc66eeb809385dc2d52ff348c"])){
          $chkU=array("login_cookie"=>$_COOKIE["5180837cc66eeb809385dc2d52ff348c"]);
        $cookieuser=$functionClass->getRowsByWhere("users",'login_cookie=:login_cookie',$chkU);
        
        if(empty($cookieuser)){
             $_SESSION['userId']="";
         
          if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

        }else{
             $_SESSION['userId']=$cookieuser[0]['id'];
           
        }
    }else{
        $_SESSION['userId']="";
  if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

        
    }  
}else{
      $_SESSION['userId']="";
}
}
$userInfo="";
if(!empty($_SESSION['userId'])){
	  $UDetail=array("id"=>$_SESSION['userId']);
        $userInfo=$functionClass->getRowsByWhere("users",'id=:id',$UDetail);
}
define("MAINPATH", "https://learnizy.in/Learnish/");

 ?>