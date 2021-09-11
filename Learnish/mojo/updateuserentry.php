<?php
date_default_timezone_set("Asia/Calcutta");


$userval="";
$emailval="";
$accounttype="";

$reqstdevice="";
$urlval="";
$thanksurl="";
$datasavein="";
$savingstatus="";



$payment_amount=0;
$nameof_user="";
$phone_num="";
$email_id="";
$fees_chargs="";
$status_fromintamojo="";
$payment_id="";
$payment_purpose="";
$date_ofpayment=date("d/m/Y");



$sponser_id1=0;
$sponser_id2=0;
$sponser_id3=0;
$sponser_id4=0;
$sponser_id5=0;
$sponser_id6=0;
$checknextlevel="yes";

$direct_entry=0;
$genration_entry=0;
$direct_income=0;
$genration_income=0;
$total_income=0;

$datasavein="user";
	
		//check who sended payment work end here

?>


<?php

	/*
	Basic PHP script to handle Instamojo RAP webhook.
	*/

	$data = $_POST;
	$mac_provided = $data['mac'];  // Get the MAC from the POST data
	unset($data['mac']);  // Remove the MAC key from the data.
	$ver = explode('.', phpversion());
	$major = (int) $ver[0];
	$minor = (int) $ver[1];
	if($major >= 5 and $minor >= 4)
	{
		 ksort($data, SORT_STRING | SORT_FLAG_CASE);
	}
	else
	{
		 uksort($data, 'strcasecmp');
	}
	// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
	// Pass the 'salt' without <>
	//last 209......1e is salt key
$mac_calculated = hash_hmac("sha1", implode("|", $data), "ef3a8196c8db465f9f14f9e359308d1c");
//	$mac_calculated = hash_hmac("sha1", implode("|", $data), "2374135c8f854a319181711dd40f9cad");
	if($mac_provided == $mac_calculated)
	{
		if($data['status'] == "Credit")
		{
			// Payment was successful, mark it as successful in your database.
			// You can acess payment_request_id, purpose etc here.
			
		  include($_SERVER['DOCUMENT_ROOT'].'/Learnish/dbcon.php');
		     date_default_timezone_set('Asia/Kolkata');
		            
		            /*
		            $payment_amount=$data['amount'];
					$nameof_user=$data['buyer_name'];
					$phone_num=$data['buyer_phone'];
					$email_id=$data['buyer'];
					$fees_chargs=$data['fees'];
					$status_fromintamojo=$data['status'];		
					$payment_id=$data['payment_id'];
					$payment_purpose=$data['purpose'];
				
					$insrtsql="INSERT INTO  mojopayment ( reson, price, email, name1, phone, payment, user, statusofuser, instamojocharges, dateofpayment,gateway,type)
					VALUES ('".$payment_purpose."', '".$payment_amount."', '".$email_id."', '".$nameof_user."',  '".$phone_num."', '".$payment_id."', '".$datasavein."', '".$status_fromintamojo."', '".$fees_chargs."', '".$date_ofpayment."','mojo','C' )";
					*/
                        $c_date=date("Y-m-d");
                        $c_time=date("H:i:s");
                        if($_GET['type']=='mock'){
                                $result=$con->query("select id,duration from mock where id='".$_GET['id']."'");
                                $row = $result->fetch_assoc();
                                $expiry_date=date('Y-m-d', strtotime($c_date. ' + '.$row['duration'].' days'));
                                $con->query("insert into mock_purchages(user_id,mock_id,date,time,expiry_date) VALUES('".$_GET['user_id']."','".$row['id']."','".$c_date."','".$c_time."','".$expiry_date."')");
                                $selecSponsortUser = "SELECT sponsor_id FROM users WHERE id = '".$_GET['user_id']."'";
                                $sponsorUserResult = $con->query($selecSponsortUser);
                                $sponsorUserRow = $sponsorUserResult->fetch_assoc();
                                
                                if($sponsorUserRow['sponsor_id'] == 345){
                                    // create a new cURL resource
                                    $ch = curl_init();
                                    
                                    // set URL and other appropriate options
                                    $key = "eaSizXwVSVuPRg5phWO3ET:APA91bHF4qL518pQkkWv8cIgK3cOYOalcyP9mos9R0iNzchqCBSI8XF-6BM-h3vRs5ea_shvayoQz6licDKT--g_GBMs_LFafS9B59DvAEPfu9StbvfJN-iF9SS1PXOCqfeIdJV6D58Y";
                                    $title = "Coupon Code Used";
                                    $msg = "Someone Purchased MockTest through your Copun Code.";
                                    curl_setopt($ch, CURLOPT_URL, "https://learnizy.in/Learnish/send_to_single.php?key=".$key."&title=".$title."&msg=".$msg);
                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                    
                                    // grab URL and pass it to the browser
                                    curl_exec($ch);
                                    
                                    // close cURL resource, and free up system resources
                                    curl_close($ch);
                                }
                            
                        }else if($_GET['type']=='course'){
                                $result=$con->query("select id,duration from course where id='".$_GET['id']."'");
                                $row = $result->fetch_assoc();
                                $expiry_date=date('Y-m-d', strtotime($c_date. ' + '.$row['duration'].' days'));
                                $con->query("insert into course_purchages(user_id,course_id,date,time,expiry_date) VALUES('".$_GET['user_id']."','".$row['id']."','".$c_date."','".$c_time."','".$expiry_date."')");

                        }else if($_GET['type']=='course_package'){
                            
                        }else if($_GET['type']=='mock_package'){
                                
                                $result=$con->query("select id,duration from mock_packages where id='".$_GET['id']."'");
                                $row = $result->fetch_assoc();
                                $expiry_date=date('Y-m-d', strtotime($c_date. ' + '.$row['duration'].' days'));
                                
                                $result2=$con->query("select id,duration from mock where package_id LIKE '%,".$_GET['id'].",%'");
                                
                                $con->query("insert into m_package_purchages(user_id,package_id,date,time,expiry_date) VALUES('".$_GET['user_id']."','".$_GET['id']."','".$c_date."','".$c_time."','".$expiry_date."')");

                                while($get_rowss= $result2->fetch_assoc()){
                                     $con->query("insert into mock_purchages(user_id,mock_id,date,time,expiry_date) VALUES('".$_GET['user_id']."','".$get_rowss['id']."','".$c_date."','".$c_time."','".$expiry_date."')");
                                }
                                
                                $selecSponsortUser = "SELECT sponsor_id FROM users WHERE id = '".$_GET['user_id']."'";
                                $sponsorUserResult = $con->query($selecSponsortUser);
                                $sponsorUserRow = $sponsorUserResult->fetch_assoc();
                                
                                if($sponsorUserRow['sponsor_id'] == 345){
                                    // create a new cURL resource
                                    $ch = curl_init();
                                    
                                    // set URL and other appropriate options
                                    $key = "eaSizXwVSVuPRg5phWO3ET:APA91bHF4qL518pQkkWv8cIgK3cOYOalcyP9mos9R0iNzchqCBSI8XF-6BM-h3vRs5ea_shvayoQz6licDKT--g_GBMs_LFafS9B59DvAEPfu9StbvfJN-iF9SS1PXOCqfeIdJV6D58Y";
                                    $title = "Coupon Code Used";
                                    $msg = "Someone Purchased MockTest through your Copun Code.";
                                    curl_setopt($ch, CURLOPT_URL, "https://learnizy.in/Learnish/send_to_single.php?key=".$key."&title=".$title."&msg=".$msg);
                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                    
                                    // grab URL and pass it to the browser
                                    curl_exec($ch);
                                    
                                    // close cURL resource, and free up system resources
                                    curl_close($ch);
                                }
                             
                        }
                        if($_GET['from_points']==1){
                            $discount_price=$_GET['discount_price'];
                             $con->query("update users set points=points-$discount_price where id='".$_GET['user_id']."'");

                        }
        
		}
		else
		{
			// Payment was unsuccessful, mark it as failed in your database.
			// You can acess payment_request_id, purpose etc here.
		}
	}
	else
	{
		//echo "MAC mismatch";
	}



?>