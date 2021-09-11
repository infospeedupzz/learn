<?php include('layout/session.php'); 
include('src/Instamojo.php');
if(isset($_GET['type']) && isset($_GET['id']) ){
    
    $type=$_GET['type'];
    $id=$functionClass->DE($_GET['id']);
    $user_id=$_SESSION['userId'];
    //get buy item 
      $conArr = array(
                "id" => $id
            ); 
    if($type=='mock'){
        $row = $functionClass->getRowsByWhere("mock", "id=:id  ", $conArr);
    }else if($type=='course'){
        $row = $functionClass->getRowsByWhere("course", "id=:id  ", $conArr);
    }else if($type=='course_package'){
        
    }else if($type=='mock_package'){
        $row = $functionClass->getRowsByWhere("mock_packages", "id=:id  ", $conArr);
    }
   //end of buy item
   //get user detaits
      $conArrUser = array(
                "id" => $user_id
            );
    $row_user = $functionClass->getRowsByWhere("users", "id=:id  ", $conArrUser);     
    
    if(!empty($row_user[0]['mobile'])){
        $phone=$row_user[0]['mobile'];
    }else{
        $phone="";
    }
    
    $phone="6276563250";
    $price=$row[0]['price'];
    $title = "" ;//$row['name'];
    
    if($type=='mock_package'){
        $price=$row[0]['after_discount'];
        $title = $row[0]['title'];
    }
    else{
        $title = $row[0]['name'];
    }
    
    $discount_price=0;
    if($_GET['from_points']==1){
        $from_points=$row[0]['from_points'];
        $user_points=$row_user[0]['points'];
        $discount_price=($row_user[0]['points']*$from_points)/100;
        if($user_points>$discount_price){
            $price=$price-$discount_price;
        }
        
        if($price<10){
            $price=10;
        }
    }
    
    $userEmail = $row_user[0]['email'];
    if (strpos($row_user[0]['email'], '@') === false) {
        $userEmail = "paid.learnizy@gmail.com";
    }
    
    $price = (int)$price;
    
    $thanksurl="https://learnizy.in/thankyou";
    $webhookurl="http://learnizy.in/Learnish/mojo/updateuserentry.php?type=".$_GET['type']."&id=".$id."&user_id=".$_SESSION['userId']."&from_points=".$_GET['from_points']."&discount_price=".$discount_price;
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
							"buyer_name" => $row_user[0]['fullname'],
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

?>