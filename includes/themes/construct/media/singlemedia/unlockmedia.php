<?php 
        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");

        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){header("Location: /");}else{
             
             $mediaid = $_GET['id'];
             $mediapost = getMediaDetailsbyID($_GET['id']);
             $userdetails = getUserDetailsByUsername($mediapost['media_user']);
            
             $senderbudget = $usersession["coins"];
             $receiverbudget = $userdetails["coins"];
            
             $mediaprice = $mediapost['media_price'];
             $senderid = $_SESSION["id"];
             $receiverid = $userdetails['id'];
             $cointransactiontype = 'media-unlock';
             $senderusername = $_SESSION['username'];
             $receiverusername = $mediapost["media_user"];
            
        }?>
<div class="YNcdi">
    <div class="INtAP">
             <?php if($mediaprice > $senderbudget){
                 echo "<p class='_1vwgT'>Insufficient funds</p>
                            <div class='xVhXy'>You do not have enough Coins to tip this amount. Would you like to purchase more coins?</div>
                            <div class='_3vunz'>
                                <button onclick='location.href=&quot;/shop/&quot;' class=''>YES</button>
                                <button onclick='closeOtherOpt()' class=''>NO</button>
                          </div>";

             }else{
                    echo "<p class='_1vwgT'>Confirm Action</p>
                            <div class='xVhXy'>Do you want to continue ?</div>
                            <div class='_3vunz'>
                                <button onclick='getotheropt(&quot;/action/unlockmedia/aprovoveunlockmedia/$mediaid/&quot;)' class=''>YES</button>
                                <button onclick='closeOtherOpt()' class=''>NO</button>
                          </div>";
                    if($_GET['type'] == 'aprovoveunlockmedia'){                  
                         $sendercoin = $senderbudget - $mediaprice;
                         $receivercoin = $mediaprice + $receiverbudget;
                         $mediaslug = $mediapost['media_slug'];                       
                            if($mediaprice > $senderbudget){echo 'Fuck You Man';}else{
                                $sql = "INSERT INTO coinstransacsion (sender_id, receiver_id,media_id,media_price,type,time,finalprice)VALUES('$senderid','$receiverid','$mediaid','$mediaprice','$cointransactiontype','".time()."','$mediaprice')";
                                if ($link->query($sql) === TRUE) {
                                    $sql = "UPDATE users SET coins = '".$receivercoin."' where username='".$receiverusername."'";
                                    if ($link->query($sql) === TRUE) {
                                        $sql = "UPDATE  users SET coins = '".$sendercoin."' where username='".$senderusername."'";
                                        if ($link->query($sql) === TRUE) {
                                            echo '<script>window.location.replace("/p/'.$mediaslug.'/");</script>';
                                        }
                                    }
                                }

                            }   
                    }
             } ?>
    </div>
</div>



