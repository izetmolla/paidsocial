<?php  
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");

        $myiddd = $_SESSION['id'];
        $notifications = getNotificationCount($myiddd);
        $messages = getMessagesCount($myiddd);
        if($_GET['opt'] == 'allSms'){
            if($messages == 0){}else{echo '<div class="_3U0rh">'.$messages.'</div>';}
        }
        if($_GET['opt'] == 'allNotification'){
            if($notifications == 0){}else{echo '<div class="_3U0rh">'.$notifications.'</div>';}
        }

?>
