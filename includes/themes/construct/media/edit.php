<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo 'login Pls';
}else{
    if($_SESSION['id'] == $mediapost['user_id']){
         switch ($usersession['type']) {
                    case "model-user":               
                        include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/edit/edit-model.php");
                        break;
                    case "normal-user":             
                        include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/media/edit/edit-normal.php");
                        break;
                }
        }else{
        echo 'What the fuck you want here';
    }
    }
?>