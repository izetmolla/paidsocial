<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/home/notloged-home.php");
    exit;
}else{
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/home/loged-home.php");
}
?>
