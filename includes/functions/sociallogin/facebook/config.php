<?php
/*
 * Basic Site Settings and API Configuration
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'cwzqdvxo_chicas');
define('DB_PASSWORD', 'Endrisa1996');
define('DB_NAME', 'cwzqdvxo_chicas');
define('DB_USER_TBL', 'users');

// Facebook API configuration
define('FB_APP_ID', '2233843276933442');
define('FB_APP_SECRET', '9a1b884a44e19382e69db191b3adc56b');
define('FB_REDIRECT_URL', 'https://<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/fblogin/');

// Start session
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/sociallogin/facebook/vendor/autoload.php");

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// Call Facebook API
$fb = new Facebook(array(
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => 'v3.2',
));

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}