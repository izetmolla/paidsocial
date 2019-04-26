<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo 'login Pls';
}else{
    
           switch ($usersession['type']) {
                case "model-user":               
                    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/upload/upload-model.php");
                    break;
                case "normal-user":             
                    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/upload/upload-normal.php");
                    break;
            }
    }
    exit;

?>