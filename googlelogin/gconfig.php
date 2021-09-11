<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('302052975351-gk709f3qh5ql8pl9e4vt3tk1brd2fcuo.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('lh422nzkbJ-YQqeuj_tyOAwZ');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://learnizy.in/googlelogin/loginwithgoogle');

//
$google_client->addScope('email');

$google_client->addScope('profile');



?>
