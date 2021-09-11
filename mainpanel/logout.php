<?php session_start();
   $_SESSION['mainId']="";
   $_SESSION['mainName']="";
   if($_SESSION['mainId']=="") {
   	session_destroy();
      header("Location: index");
   }
?>