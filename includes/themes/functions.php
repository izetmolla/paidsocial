<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");

$sender_id = $_SESSION['id']; 
$receiver_id = $_GET['id'];
$user =  getUserDetailsID($receiver_id);
$receiverusername = $user['username'];

if(isset($_GET["opt"]) && $_GET["opt"] == 'follow'){
                    $sql = "INSERT INTO followzone (sender_id, receiver_id) VALUES ('$sender_id', '$receiver_id')";
                    if ($link->query($sql) === TRUE) { 
                        echo '<script>window.location.replace("/'.$receiverusername.'/");</script>';
                        echo '<button id="unfollow">Following</button>';
                    }
}elseif(isset($_GET["opt"]) && $_GET["opt"] == 'unfollow'){
                    $sql = "DELETE FROM followzone  WHERE sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."'";
                    if ($link->query($sql) === TRUE) {      
                        echo '<script>window.location.replace("/'.$receiverusername.'/");</script>';
                        echo '<button id="follow">Follow</button>';;
                    }
}