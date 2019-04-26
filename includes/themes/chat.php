<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/chat/functions.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /login/");
}else{
        if(isset($_GET['username'])){
            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/chat/messagebox/box.php");
        }else{
            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/chat/messagelist/list.php");
        }
    }
?>