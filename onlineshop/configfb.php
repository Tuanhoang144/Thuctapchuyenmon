<?php

require_once(__DIR__.'/Facebook/autoload.php');

define('APP_ID', '526227965071653');
define('APP_SECRET', '747b9b73fe1b3107ffe79e270484b242');
define('API_VERSION', 'v2.5');
define('FB_BASE_URL', 'http://localhost:8080/onlineshop/index.php');

define('BASE_URL', 'http://localhost:8080/');

if(!session_id()){
    session_start();
}


$fb = new Facebook\Facebook([
 'app_id' => APP_ID,
 'app_secret' => APP_SECRET,
 'default_graph_version' => API_VERSION,
]);


// Get redirect login helper
$fb_helper = $fb->getRedirectLoginHelper();


// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token']))
		{$accessToken = $_SESSION['facebook_access_token'];}
	else
		{$accessToken = $fb_helper->getAccessToken();}
} catch(FacebookResponseException $e) {
     echo 'Facebook API Error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK Error: ' . $e->getMessage();
      exit;
}

?>