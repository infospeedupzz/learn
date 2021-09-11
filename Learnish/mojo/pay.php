<?php
include('src/Instamojo.php');
include($_SERVER['DOCUMENT_ROOT'].'/Learnish/dbcon.php');
if(isset($_GET['type']) && isset($_GET['id']) && isset($_GET['user_id'])){
    
    $type=$_GET['type'];
    $id=$_GET['id'];
    $user_id=$_GET['user_id'];
    
   

    if($type=='mock'){
         $select ="select name,price,id,from_points from mock where id='".$id."'"; 
      
    }else if($type=='course'){
      $select ="select name,price,id,from_points from course where id='".$id."'"; 

    }else if($type=='course_package'){
        
    }else if($type=='mock_package'){
        $select ="select title, after_discount, id, from_points from mock_packages where id ='".$id."'"; 
    }

    $result=$con->query($select);
    $row = $result->fetch_assoc();
   
    $result_user = $con->query("select * from users where id='".$user_id."'");
    $row_user = $result_user->fetch_assoc();
    if(!empty($row_user['mobile'])){
        $phone=$row_user['mobile'];
    }else{
        $phone="";
    }
    $phone="6276563250";
    $price=$row['price'];
    $title = "" ;//$row['name'];
    
    if($type=='mock_package'){
        $price=$row['after_discount'];
        $title = $row['title'];
    }
    else{
        $title = $row['name'];
    }
    
    $discount_price=0;
    if($_GET['from_points']==1){
        $from_points=$row['from_points'];
        $user_points=$row_user['points'];
        $discount_price=($row_user['points']*$from_points)/100;
        if($user_points>$discount_price){
            $price=$price-$discount_price;
        }
        
        if($price<10){
            $price=10;
        }
    }
    
    $userEmail = $row_user['email'];
    if (strpos($row_user['email'], '@') === false) {
        $userEmail = "paid.learnizy@gmail.com";
    }
    
    $price = (int)$price;
    
    $thanksurl="http://learnizy.in/Learnish/mojo/thankyou.php";
    $webhookurl="http://learnizy.in/Learnish/mojo/updateuserentry.php?type=".$_GET['type']."&id=".$_GET['id']."&user_id=".$_GET['user_id']."&from_points=".$_GET['from_points']."&discount_price=".$discount_price;
    //first is api key second outh token
					$api = new Instamojo\Instamojo('bd1c93da4e6cd5670a4297db5ef16449', '7210c041cf4396852b18b247d72a6d81', 'https://www.instamojo.com/api/1.1/');
				//	$api = new Instamojo\Instamojo('test_22603bcbfef8f702e1e831455ed', 'test_77f478574e99f7c7af460cd7a5d', 'https://test.instamojo.com//api/1.1/');
					try 
					{
						$response = $api->paymentRequestCreate(array(
							"purpose" => $title,
							"amount" =>$price,
							"send_email" => false,
							"email" => $userEmail,
							"buyer_name" => $row_user['fullname'],
							"phone" => $phone,
							"send_sms" => false,
							"allow_repeated_payments" => false,
							"redirect_url" => $thanksurl,
							"webhook" => $webhookurl
							));
						$pay_url=$response['longurl'];
						//header("location:".$pay_url);
						header("location:".$pay_url);
					}
					catch (Exception $e) 
					{
						print('Error: ' . $e->getMessage());
					}
				
}
$con-> close();
?>