<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: /login/");
}else{
           switch ($usersession['type']) {
                case "model-user":               
                    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/other/editmodel.php");
                    break;
                case "normal-user":             
                    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/other/editnormal.php");
                    break;
            }
        exit;
    }
?>