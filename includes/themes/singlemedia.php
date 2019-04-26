<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/functions.php");
    
if($mediapost['status']){
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("Location: /login/");
        }else{
            if($mediapost['media_status'] == 'free'){ 
                include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/singlemedia/freemedia.php");
            }elseif($mediapost['media_status'] == 'paid'){
                include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/singlemedia/paidmedia.php");
            }
        }
}else{
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/404.php");
}