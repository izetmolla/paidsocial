<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ echo 'Need to login';}else{
          if(isset($_POST['sms']) && $_POST['sms'] != ''){
                insertMSG($_GET['id']);
          }  
        }

function insertMSG($rID){
    global $link, $usersession;
    $user = getUserDetailsID($rID);
    $sID = $usersession['id'];
    $sUSER = $usersession['username'];
    $message = $_POST['sms'];
    $senderbudget = $usersession['coins'];
    $receiverbudget = $user['coins'];
    $receiversmsprice = $user['smsprice'];
        if($receiversmsprice){
            if($receiversmsprice > $senderbudget){ 
                include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/others/popups/no-founds.php");
            }else{
                
                $rcbgnext = $receiverbudget + $receiversmsprice;
                $snbgnext = $senderbudget - $receiversmsprice;
            /* Insert sms To MYSQL */
                $sql2 = "UPDATE users SET coins='$rcbgnext' WHERE id='$rID'";
                if ($link->query($sql2) === TRUE) {
                    $sql3 = "UPDATE users SET coins='$snbgnext' WHERE id='$sID'";
                    if ($link->query($sql3) === TRUE) {
                                            /* Insert sms To MYSQL */
                                            $sql1 = "UPDATE chat SET lCHAT='1' WHERE (sID='$sID' AND rID='$rID' AND lCHAT='0') OR (sID='$rID' AND rID='$sID' AND lCHAT='0')";
                                            if ($link->query($sql1) === TRUE) {
                                                $sql = "INSERT INTO chat (sID, rID, dID, sUSER, time, message) VALUES ('$sID', '$rID', '$rID', '$sUSER', '".time()."', '$message');";
                                                $sql .= "INSERT INTO chat (sID, rID, dID, sUSER, time, message) VALUES ('$sID', '$rID', '$sID', '$sUSER', '".time()."', '$message');";
                                                if ($link->multi_query($sql) === TRUE) {}

                                            }
                                            /* Insert sms To MYSQL */
                            if ($link->query($sql) === TRUE) {
                                $sql4 = "INSERT INTO coinstransacsion (sender_id, receiver_id,finalprice,type,time,sender_username)VALUES('$sID','$rID','$receiversmsprice','message',".time().",'$sUSER')";
                            if ($link->query($sql4) === TRUE) {}
                            }
                            /* Insert sms To MYSQL */               
                    }
                }
            /* Insert sms To MYSQL */ 
                
                
                
                
                
                
            }
        }else{
             /* Insert sms To MYSQL */
            $sql1 = "UPDATE chat SET lCHAT='1' WHERE (sID='$sID' AND rID='$rID' AND lCHAT='0') OR (sID='$rID' AND rID='$sID' AND lCHAT='0')";
            if ($link->query($sql1) === TRUE) {
                $sql = "INSERT INTO chat (sID, rID, dID, sUSER, time, message) VALUES ('$sID', '$rID', '$rID', '$sUSER', '".time()."', '$message');";
                $sql .= "INSERT INTO chat (sID, rID, dID, sUSER, time, message) VALUES ('$sID', '$rID', '$sID', '$sUSER', '".time()."', '$message');";
                if ($link->multi_query($sql) === TRUE) {}
                
            }
            /* Insert sms To MYSQL */
        }
    

    
}



?>