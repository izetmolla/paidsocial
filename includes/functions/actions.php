<?php 
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");


    if($_GET['action'] == 'delete'){
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/others/popups/delete.php"); 
    }

    if($_GET['action'] == 'deletesms'){
        include($_SERVER['DOCUMENT_ROOT'] . "/chat/chatlist/deletesms.php"); 
    }

    if($_GET['action'] == 'unlockmedia'){
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/singlemedia/unlockmedia.php"); 
    } 






/* Discover Follow Button */
if($_GET['action'] == 'discoverfollow'){
    $sender_id = $_SESSION['id'];
    $receiver_id = $_GET['id'];
    $receiver_username = $_GET['type'];
    $sql = "INSERT INTO followzone (sender_id, receiver_id) VALUES ('$sender_id', '$receiver_id')";
      if ($link->query($sql) === TRUE) { 
          echo '<button onclick="location.href=&quot;/chat/'.$receiver_username.'/&quot;;" class="_2aWfr">Chat</button>';
      }
    }





















