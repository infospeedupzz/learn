<?php
@session_start();
require 'fbConfig.php';
if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
		
		// Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
       
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
 
    // Redirect the user back to the same page if url has "code" parameter in query string
    //if(isset($_GET['code'])){
      //  echo '<script>window.location.href="../";</script>';
    //}
    
    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,picture');
		
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
               
     
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ../");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    
}else{
    // Get login url
    $fbloginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
  //  echo '<script>window.location.href="../index.php";</script>';
}
//echo $output;


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

    if(!empty($fbUserProfile)){
                if(isset($fbUserProfile['email'])){
                     if(!empty($fbUserProfile['email'])){
                         $email=$fbUserProfile['email'];
                }else{
              
                    $email=$fbUserProfile['id'];
                 
                    }
            }else{
               
                $email=$fbUserProfile['id'];
            }
   
    $name=$fbUserProfile['first_name'];
    $profile=$fbUserProfile['picture']['url'];
    	echo "<script>fborgLogin('".$name."','".$email."','".$profile."','Facebook')</script>";
}

?>