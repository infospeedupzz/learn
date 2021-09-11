<?php
$ROOT= $_SERVER['DOCUMENT_ROOT'];
 include_once $ROOT .'/objects/functionClass.php'; 
 include_once $ROOT.'/config/database.php'; 
   $database = new Database();
$db = $database->getConnection();
 $functionClass = new functionClass($db);
 date_default_timezone_set("Asia/Kolkata");

include_once 'objects/user.php';
$user     = new User($db);
$response = array(
    "type" => "",
    "message" => ""
);
// pass connection to objects

$success_message = '';
if (isset($_POST["email"])) {
    $email = $_POST['email'];
  
    if ($user->chkEmail($_POST["email"])) {
        $passwod        = rand(100000, 1000000);
        $user->password = $passwod;
        $user->email       = $email;
        $result= $user->updatePassbyemail();
        if ($result != false) {
            //send email
            
            function isEmail($email)
            {
                return (preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
            }
            
            if (!defined("PHP_EOL"))
                define("PHP_EOL", "\r\n");
                    
           if (trim($email) == '') {
                 $response = array(
                        "type" => "error",
                        "message" => "Invalid Email."
                            );
            } else if (!isEmail($email)) {
                $response = array(
                        "type" => "error",
                        "message" => "Invalid Email."
                    );
            }
            
                    $to = $email;
                    $subject = 'Learnizy password reset';
                    $from = 'support@learnizy.in';
                     
                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                     
                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                        'Reply-To: '.$from."\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                     
                    // Compose a simple HTML email message
                    $message = '<html><body>';
                    $message .= '<h1 style="color:#000;">Dear user</h1>';
                    $message .= '<p style="color:#000;font-size:18px;">Your new password is ' . $passwod . '<br><p><b>Team<br>Learnizy</b><br></p></p>';
                    $message .= '</body></html>';
                     
                    // Sending email
                    if(mail($to, $subject, $message, $headers)){
                $response = array(
                    "type" => "success",
                    "message" => "Password send on email."
                );
                
            } else {
                $response = array(
                    "type" => "error",
                    "message" => "Error to reset password."
                );
            }
        } else {
            $response = array(
                "type" => "error",
                "message" => "Error to reset password."
            );
        }
        
        
    } else {
        $response = array(
            "type" => "error",
            "message" => "Invalid Email."
        );
    }
} else {
    $response = array(
        "type" => "error",
        "message" => "Invalid data"
    );
}

echo json_encode($response);
?>