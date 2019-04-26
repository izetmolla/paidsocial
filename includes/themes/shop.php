<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login/");
    exit;
}
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
if($usersession['type'] == 'normal-user'){
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/shop/normal-shop.php");
}elseif($usersession['type'] == 'model-user'){
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/shop/model-shop.php");
}

?>