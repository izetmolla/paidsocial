<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");




/* General Declaration Start */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){}else{$usersession = getSessionUserDetails();}
$weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$webtitle = "PaidSocial";
$mediaServer = 'https://s3.us-east-2.amazonaws.com/PaidSocial/';
$user = getUserDetails(); 
$mediapost = getMediaDetails();
getOnlineUserStatus();
/* General Declaration End */



function get_footer(){
    global $usersession;
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/footer.php");
}
function izorand($length) {
   $string = '';
   $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
   for ($p = 0; $p < $length; $p++) {
       $string .= $characters[mt_rand(0, strlen($characters)-1)];
   }
   return $string;
}



function getOnlineUserStatus(){
    global $link, $usersession;
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){}else{
        $kshtes = time() +60;
        if($usersession['user_lastseen'] < time()){$sql = "UPDATE users SET user_lastseen='".$kshtes."' WHERE id='".$_SESSION['id']."'"; if ($link->query($sql) === TRUE) {}}
    }
    
}


function getUserSlider(){
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/others/userslider/online-modeles.php");
}



function getTopUserRanked(){
    echo '<div class="_3RMaK">
                          <div class="_1gBOh">
                              <a class="_3ab8w" href="/"></a>
                              <a class="_1zeqN" href="/victtoriahock/">
                                  <span class="_15ihq" style="background-image: url(https://s3.us-east-2.amazonaws.com/PaidSocial/nHbEx8lejhRVsZAWzDPuHbBusD3PRsHbaiwWtPdNJKKw6oKomC3PcFcN7qPRvulo);"></span>
                                  <div class="q_58C">
                                      <span class="_25mBF">Victtoria.Hock</span>
                                      <span class="CMAcL">Featured Celeb</span>
                                  </div>
                              </a>
                          </div>
                      </div>';
}


























/* Counnt the same IP */
function getSomeIp($userips){
    global $link;
	$sql = "SELECT * FROM users WHERE lastip='$userips'";
    $onmodeluser = mysqli_num_rows(mysqli_query($link, $sql));
    return $onmodeluser;
}


/* Count online Models */
function getCountonlineModels(){
    global $link;
	$sql = "SELECT * FROM users WHERE type='model-user' AND user_lastseen>'".time()."'";
    $onmodeluser = mysqli_num_rows(mysqli_query($link, $sql));
    return $onmodeluser;
}



/* Count Online Users */
function getCountOnlineUsers(){
    global $link;
	$sql = "SELECT * FROM users WHERE type='normal-user' AND user_lastseen>'".time()."'";
    $onnormaluser = mysqli_num_rows(mysqli_query($link, $sql));
    return $onnormaluser;
}
/* Get Notifications and Messages */
function getMessagesCount($id){
    global $link;
	$sql = "SELECT * FROM chat WHERE (rID='$id' AND dID='$id' AND status='0')";
    $messages = mysqli_num_rows(mysqli_query($link, $sql));
    return $messages;
}
function getNotificationCount($id){
    global $link;
	$sql = "SELECT * FROM coinstransacsion WHERE (receiver_id='$id' AND seenstatus='0')";
    $notifications = mysqli_num_rows(mysqli_query($link, $sql));
    return $notifications;
}



/* Get Media details by Slug */
function getMediaDetails(){
    global $link;
    if (isset($_GET['slug'])) {
      $slug =  $_GET['slug'];
	$sql = "SELECT * FROM medias WHERE media_slug='$slug'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$media = mysqli_fetch_assoc($result);
	return $media;
    }
}

/* Get Media details by Id */
function getMediaDetailsbyID($id){
    global $link;
	$sql = "SELECT * FROM medias WHERE id='$id'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$media = mysqli_fetch_assoc($result);
	return $media;
}

/* Get user details by Username */
function getUserDetailsByUsername($username){
    global $link;
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$user = mysqli_fetch_assoc($result);
	return $user;
    
}
/* Get user details by Username */
function getUserDetails(){
    global $link;
    global $acdb;
    if (isset($_GET['username'])) {
      $username =  $_GET['username'];
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$user = mysqli_fetch_assoc($result);
	return $user;
    }
}
/* Get user details by ID*/
function getUserDetailsID($id){
    global $link;
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$user = mysqli_fetch_assoc($result);
	return $user;
}
/* Get User Session Details */
function getSessionUserDetails(){
            global $link;
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($link, $sql);
            // fetch query results as associative array.
            $usersession = mysqli_fetch_assoc($result);
            return $usersession;
}

/* Get Album Details */
function getAlbumDetailsBySlug($slug){
            global $link;
            $sql = "SELECT * FROM mediaalbum WHERE slug='$slug'";
            $result = mysqli_query($link, $sql);
            $album = mysqli_fetch_assoc($result);
            return $album;
}



function countAllUnreadMessages(){
    global $link;
    $receiver = $_SESSION['id'];
	$sql = "SELECT * FROM chatzone WHERE (receiver_id='$receiver' AND status='0')";
    $countallSms = mysqli_num_rows(mysqli_query($link, $sql));
    return $countallSms;
}

/* Get Time Ago */
function timeAgo($ts) {
    if(!ctype_digit($ts)) {
        $ts = strtotime($ts);
    }
    $diff = time() - $ts;
    if($diff == 0) {
        return 'now';
    } elseif($diff > 0) {
        $day_diff = floor($diff / 86400);
        if($day_diff == 0) {
            if($diff < 60) return 'just now';
            if($diff < 120) return '1 minute ago';
            if($diff < 3600) return floor($diff / 60) . ' minutes ago';
            if($diff < 7200) return '1 hour ago';
            if($diff < 86400) return floor($diff / 3600) . ' hours ago';
        }
        if($day_diff == 1) { return 'Yesterday'; }
        if($day_diff < 7) { return $day_diff . ' days ago'; }
        if($day_diff < 31) { return ceil($day_diff / 7) . ' weeks ago'; }
        if($day_diff < 60) { return 'last month'; }
        return date('F Y', $ts);
    } else {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if($day_diff == 0) {
            if($diff < 120) { return 'in a minute'; }
            if($diff < 3600) { return 'in ' . floor($diff / 60) . ' minutes'; }
            if($diff < 7200) { return 'in an hour'; }
            if($diff < 86400) { return 'in ' . floor($diff / 3600) . ' hours'; }
        }
        if($day_diff == 1) { return 'Tomorrow'; }
        if($day_diff < 4) { return date('l', $ts); }
        if($day_diff < 7 + (7 - date('w'))) { return 'next week'; }
        if(ceil($day_diff / 7) < 4) { return 'in ' . ceil($day_diff / 7) . ' weeks'; }
        if(date('n', $ts) == date('n') + 1) { return 'next month'; }
        return date('F Y', $ts);
    }
}






 // Converts a number into a short version, eg: 1000 -> 1k
 // Based on: http://stackoverflow.com/a/4371114
 function number_format_short( $n, $precision = 1 ) {
     if ($n < 999) {
         // 0 - 900
         $n_format = number_format($n, $precision);
         $suffix = '';
     } else if ($n < 900000) {
         // 0.9k-850k
         $n_format = number_format($n / 1000, $precision);
         $suffix = 'K';
     } else if ($n < 900000000) {
         // 0.9m-850m
         $n_format = number_format($n / 1000000, $precision);
         $suffix = 'M';
     } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    }  else {
         // 0.9t+
         $n_format = number_format($n / 1000000000000, $precision);
         $suffix = 'T';;
     }
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
   // Intentionally does not affect partials, eg "1.50" -> "1.50"
     if ( $precision > 0 ) {
         $dotzero = '.' . str_repeat( '0', $precision );
         $n_format = str_replace( $dotzero, '', $n_format );
     }
     return $n_format . $suffix;
 }

$koinsat = number_format_short($usersession['coins'], $precision = 1);