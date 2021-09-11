<?php
include('gconfig.php');
$glogin_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{

 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['fullname'] = $data['given_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['gemailid'] = $data['email'];
  }



  if(!empty($data['picture']))
  {
   $_SESSION['profilepic'] = $data['picture'];
  }
  
 }
 
 
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $glogin_button = "<a href='".$google_client->createAuthUrl()."' class='btn btn-primary g-btn'><i class='fa fa-google-plus-square' style='padding: 2px 6px;float:left;    font-size: 18px;'></i><span style='margin-left: -10px;color:white;'>Google</span></a>";
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
function fborgLogin(name,email,image,withlogin){
     $.ajax({
                url: "../users/withgoogle",
                type: "post",
               dataType: "json",
                data:  {'fullname':name,'email':email,'image':image,'withlogin':withlogin},
                success: function (data) {
                   
                if(data.type=="exsit"){
                    window.location.href="/";
                     
                }else if(data.type=="success"){
                     
                        window.location.href="/";
                }
                  }
            });
}

  
</script>
<?php
if(isset($_SESSION['gemailid'])){
    if(!empty($_SESSION['gemailid'])){
    
    	echo "<script>fborgLogin('".$_SESSION['fullname']."','".$_SESSION['gemailid']."','".$_SESSION["profilepic"]."','Google')</script>";
}
}
?>