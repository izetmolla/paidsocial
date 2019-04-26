<?php

function getMedialockedDetails(){
    global $link,$mediapost, $weburl,$mediaServer;
    $senderid = $_SESSION["id"];
    $receiverid = $mediapost['user_id'];
    $mediaid = $mediapost['id'];
    $mediaprice = $mediapost['media_price'];
                $sql = "SELECT * FROM coinstransacsion WHERE sender_id = '".$senderid."' AND receiver_id = '".$receiverid."' AND media_id = '".$mediaid."'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="_2zLM1">
                                  <div class="_1S9rk _2bMH0" style="background-image: url(&quot;'.$mediaServer. $mediapost['media_url'].'&quot;);">
                                      <div onclick="getotheropt(&quot;/getfullmedia/'.$mediapost['id'].'/&quot;)" class="_1hEuQ"></div>
                                  </div>
                              </div>';    
                    }
                } else {
                    echo '<div class="_2zLM1"><div class="_1S9rk _2bMH0 _3ieFz"><div class="_2OJUP">Photo</div><div class="_1hEuQ"></div></div></div>';
                } 

}

function getMedialockedButton(){
    global $link,$mediapost, $weburl,$mediaServer;
    $senderid = $_SESSION["id"];
    $receiverid = $mediapost['user_id'];
    $mediaid = $mediapost['id'];
    $mediaprice = $mediapost['media_price'];
                $sql = "SELECT * FROM coinstransacsion WHERE sender_id = '".$senderid."' AND receiver_id = '".$receiverid."' AND media_id = '".$mediaid."'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo ' <!-- Unlocked Button -->';    
                    }
                } else {
                    
                    echo "<button onclick='getotheropt(&quot;/action/unlockmedia/$receiverid/$mediaid/&quot;)' type='primary' class='_3rjSd'>Unlock <span class='LQz8Y'>".$mediapost["media_price"]."</span></button>";
                } 

}























function unlockMediasButoni(){
    global $link, $user, $mediapost, $usersession, $weburl;
    
     $senderid = $usersession["id"];
     $receiverid = $user['id'];
     $mediaid = $mediapost['id'];
     $mediaprice = $mediapost['media_price'];
     $senderbudget = $usersession["coins"];
     $cointransactiontype = 'media-unlock';
    
     $senderusername = $usersession["username"];
     $receiverusername = $user["username"];
     $sendercoin = $usersession['coins'] - $mediaprice;
     $receivercoin = $mediaprice + $user['coins'];
     $mediaslug = $mediapost['media_slug'];                       
        if(isset($_POST["unlockpost"])){
            $sql = "INSERT INTO coinstransacsion (sender_id, receiver_id,media_id,media_price,type)VALUES('$senderid','$receiverid','$mediaid','$mediaprice','$cointransactiontype')";
            if ($link->query($sql) === TRUE) {
                $sql = "UPDATE users SET coins = '".$receivercoin."' where username='".$receiverusername."'";
                if ($link->query($sql) === TRUE) {
                    $sql = "UPDATE  users SET coins = '".$sendercoin."' where username='".$senderusername."'";
                    if ($link->query($sql) === TRUE) {
                        header("Location: /p/$mediaslug/");
                    }
                }
            }
            
        }
      krahasobuxhetinmecmimin();
}