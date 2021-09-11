<?php
if(isset($_GET['type']) && isset($_GET['id']) && isset($_GET['user_id'])){

date_default_timezone_set('Asia/Kolkata');

$c_date = date('d-m-Y H:i:s');

$fp = fopen('gateway_hit.txt', 'a');//opens file in append mode  
fwrite($fp, $c_date."    u_id = ".$_GET['user_id']."    type = ".$_GET['type']."    type id = ".$_GET['id']."\n");  
fclose($fp);  


   header("Location:mojo/pay.php?type=".$_GET['type']."&id=".$_GET['id']."&user_id=".$_GET['user_id']."&from_points=".$_GET['from_points']);
   
   exit();
}