<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");
    session_start(); 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("Location: /login/");
    }else{
        //Delete Sms 
        if(isset($_GET['act'])){
            if($_GET['act'] == 'sms'){
                $sID = $_SESSION['id'];
                $rID = $_GET['id'];
                
                // sql to delete a record
                $sql = "DELETE FROM chat WHERE (sID='$sID' AND rID='$rID' AND dID='$sID') OR (sID='$rID' AND rID='$sID' AND dID='$sID')";
                
                if ($link->query($sql) === TRUE) {
                    header("Location: /chat/");
                }
            }
            
        }
    }



