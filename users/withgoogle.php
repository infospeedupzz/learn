<?php session_start();
include_once '../config/getConnection.php';
include_once '../objects/user.php';
include_once '../objects/functionClass.php';
$functionClass = new functionClass($db);
$user = new User($db);
$response = array(
    "type" => "",
    "message" => ""
);
// pass connection to objects
$success_message = '';
if (isset($_POST["email"]))
{

    $email = $_POST['email'];
    if ($user->chkEmail($email) == true)
    {
        $chk = true;
    }
    else
    {
        $chk = false;
    }
    if ($chk == false)
    {
        $user->fullname = $_POST['fullname'];
        $user->email = $_POST['email'];
        $user->profile_pic = $_POST['image'];
        $result = $user->create();
        if ($result != false)
        {
            $response = array(
                "type" => "success",
                "message" => "Sign up successfully.",
            );
        }
    }
    else
    {
        $UDetail = array(
            "email" => $_POST['email']
        );
        $userInfo = $functionClass->getRowsByWhere("users", 'email=:email', $UDetail);

        if (sizeof($userInfo) == 1)
        {
            $_SESSION['otp'] = "";
            $_SESSION['userId'] = $userInfo[0]['id'];

            $letter = md5(chr(rand(65, 90)) . $_SESSION['userId']);
            $expire = time() + 86400; // expires in one month
            setcookie('5180837cc66eeb809385dc2d52ff348c', $letter, $expire, "/", '', true, true);
            $upLogin = array(
                'login_cookie' => $letter,
                'id' => $userInfo[0]['id']
            );

            $functionClass->updateByQ('users', 'login_cookie=:login_cookie where id=:id', $upLogin);
            $response = array(
                "type" => "exsit",
                "message" => "user already exist."
            );
        }
    }

    echo json_encode($response);
}

?>
