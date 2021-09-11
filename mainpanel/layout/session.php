<?php session_start(); 
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION['mainId'])){
   session_destroy();
  echo "<script> window.location.href='login'</script>";
  die();
}else{
   if(empty($_SESSION['mainId'])){
   session_destroy();
  echo "<script> window.location.href='login'</script>";
  die();
}


// include database and object files
include_once 'config/getConnection.php';
include_once 'objects/functionClass.php';
 $functionClass = new functionClass($db);
  define('mainpath','https://learnizy.in/mainpanel/');
}
?>