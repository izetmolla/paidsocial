<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    
if($user['status']){
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            if($user['privacy'] == 'private'){
                include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/notloged-user.php");
            }elseif($user['privacy'] == 'public'){
                include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/notlogedpublic-user.php");
            }
            
            
        }else{
            if($usersession['username'] == $_GET['username']){
                   switch ($user['type']) {
                        case "model-user":               
                            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/myprofile-model.php");
                            break;
                        case "normal-user":             
                            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/myprofile-normal.php");
                            break;
                    }
                exit;
            }else{
                   switch ($user['type']) {
                        case "model-user":               
                            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/loged-model.php");
                            break;
                        case "normal-user":             
                            include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/loged-normal.php");
                            break;
                    }
            }
            exit;
        }
}else{
   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/404/notloged.php");
   }else{
       include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/404/loged.php");
   }
}
?>