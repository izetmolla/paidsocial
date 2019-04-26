<?php
session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/chat/chat-functions.php");
        if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
            if(isset($_GET['username'])){
              $user = chatUserByUsername($_GET['username']);
                if($user['username']){
                    include($_SERVER['DOCUMENT_ROOT'] . "/chat/chatbox/box.php");
                }else{
                    include($_SERVER['DOCUMENT_ROOT'] . "/404.php");
                }
            }else{
                include($_SERVER['DOCUMENT_ROOT'] . "/chat/chatlist/list.php");
            }
        }else{
            header("location: /login/");
            exit;
        }

?>