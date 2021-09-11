<?php

    $key =  $_POST['firebase_key'];
    

    
    $title = $_POST['title'];
    $body = $_POST['body'];
    
    $title2=$title;
     
    $title=str_replace("%how_to%","",$title);
    $title=str_replace("%share%","",$title);
    
    require_once __DIR__ . '/notification.php';
    $notification = new Notification();
    $notification->setTitle($title); //Walk'n Interview
    $notification->setMessage($body);
    
 
    if (strpos($title2, '%how_to%') !== false) {
       $notification->setImage("https://aliveztechnosoft.com/RMGP1998/Images/how_to_image.jpg");
    $notification->setAction("url");
    $notification->setActionDestination("https://www.youtube.com/watch?v=MTgrJrsk4jU");
    }
    
    if (strpos($title2, '%share%') !== false) {
       $notification->setImage("https://aliveztechnosoft.com/RMGP1998/SliderImages/banner1.png");
    }
    
    
  
    //	$firebase_token = $device;
    $firebase_api = "AAAARlPCovc:APA91bG48t9-tV3CXywp7uSWpxuviBP29fup5rn_QwDpFupV8bbTZZOTcG00vg2HBMyHBROBg9DnYD4uO_nZEEzgFeUFcb0W3PsXzrgW_mALKW86NnzTjtr1RDX-NL2QIEFSdmL5RlwN";
    
    $topic = "learnish";
    
    $requestData = $notification->getNotificatin();
    
    $fields  = array(
        'to' => $key,
        'data' => $requestData
    );
    // Set POST variables
    $url     = 'https://fcm.googleapis.com/fcm/send';
    $headers = array(
        'Authorization: key=' . $firebase_api,
        'Content-Type: application/json'
    );
    
    
    // Open connection
    $ch = curl_init();
    // Set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Disabling SSL Certificate support temporarily
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    // Execute post
    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    // Close connection
    curl_close($ch);
    
    
    ?>