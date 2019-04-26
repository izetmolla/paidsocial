<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");

        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/404/notloged.php");
        }else{
            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/404/loged.php");
        }
?>