<?php
// Include configuration file
require_once 'config.php';

// Include User class
require_once 'User.class.php';

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
    if(isset($_GET['code'])){
        header('Location: ./');
    }
    
    // Getting user's profile info from Facebook
    try {
        $graphResponse = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,picture');
        $fbUser = $graphResponse->getGraphUser();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    // Initialize User class
    $user = new User();
    
    // Getting user's profile data
    $fbUserData = array();
    $fbUserData['oauth_uid']  = !empty($fbUser['id'])?$fbUser['id']:'';
    $fbUserData['first_name'] = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
    $fbUserData['last_name']  = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
    $fbUserData['email']      = !empty($fbUser['email'])?$fbUser['email']:'';
    $fbUserData['gender']     = !empty($fbUser['gender'])?$fbUser['gender']:'';
    $fbUserData['picture']    = !empty($fbUser['picture']['url'])?$fbUser['picture']['url']:'';
    $fbUserData['link']       = !empty($fbUser['link'])?$fbUser['link']:'';
    
    // Insert or update user data to the database
    $fbUserData['oauth_provider'] = 'facebook';
    $userData = $user->checkUser($fbUserData);
    
    // Storing user data in the session
    $_SESSION['userData'] = $userData;
    
    
    
    
    
    
    
    
    
    
    
    
    
// Include config file
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");


$sql = "SELECT id, username FROM users WHERE username='".$userData['username']."'";
$result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
                            session_start();
                             // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $row['id'];
                            $_SESSION["username"] = $row['username'];                            
                            // Redirect user to welcome page
                                echo '<script>window.location.replace("https://<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/album/VFZbem5y2ROs9UdcCdWz/1/");</script>';
    }



    
                                
    
    
    
    
    
    
    
    
    
    
    
    
    // Get logout url
    $logoutURL = $helper->getLogoutUrl($accessToken, FB_REDIRECT_URL.'logout.php');
    
    // Render Facebook profile data
    if(!empty($userData)){
        $output  = '<h2>Facebook Profile Details</h2>';
        $output .= '<div class="ac-data">';
        $output .= '<img src="'.$userData['picture'].'"/>';
        $output .= '<p><b>Facebook ID:</b> '.$userData['oauth_uid'].'</p>';
        $output .= '<p><b>Name:</b> '.$userData['first_name'].' '.$userData['last_name'].'</p>';
        $output .= '<p><b>Email:</b> '.$userData['email'].'</p>';
        $output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>';
        $output .= '<p><b>Logged in with:</b> Facebook</p>';
        $output .= '<p><b>Profile Link:</b> <a href="'.$userData['link'].'" target="_blank">Click to visit Facebook page</a></p>';
        $output .= '<p><b>Logout from <a href="'.$logoutURL.'">Facebook</a></p>';
        $output .= '</div>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
}else{
    // Get login url
    $permissions = ['email']; // Optional permissions
    $loginURL = $helper->getLoginUrl(FB_REDIRECT_URL, $permissions);
    
    // Render Facebook login button
    $output = '<a href="'.htmlspecialchars($loginURL).'&izo=albania"><img src="images/fb-login-btn.png"></a>'; // Render Facebook login button
    $output2 = $loginURL;
    header("Location: $output2");
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>New Album with new Photos (12 New Photo)</title>
    <meta property="og:title" content="New Album with new Photos (12 New Photo)">
    <meta property="og:description" content="Open my new Photos on Chicas- Dont Lose">
    <meta property="og:image" content="<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/includes/functions/sociallogin/facebook/111.png">
    <meta property="og:url" content="https://<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/fblogin/">
    <meta name="twitter:card" content="summary_large_image">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <div class="fb-box">
        
    </div>
</div>
</body>
</html>