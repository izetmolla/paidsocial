<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    function getUserSliderOnline(){
            global $link, $usersession, $mediaServer;
            if($usersession['type'] == 'normal-user'){
                $sql = "SELECT * FROM users WHERE type='model-user' AND user_lastseen>'".time()."' AND NOT id='".$usersession['id']."' ORDER BY user_lastseen DESC";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $ussrrtitle = $row['username'];
                        $ussrrphoto = $mediaServer. $row['profile_photo'];
                        echo '<li class="" style="position: relative; padding-left: 15px;"><a href="/'.$ussrrtitle.'/"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$ussrrphoto.'&quot;);"></div><div class="_4pa1l _6pC2x"></div></div><p>'.$ussrrtitle.'</p></a></li>';
                    }
                } else {
                    echo "No persons Online";
                }

            }else{
            $sql = "SELECT * FROM users WHERE type='normal-user' AND user_lastseen>'".time()."' AND NOT id='".$usersession['id']."' ORDER BY user_lastseen DESC";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                        $ussrrtitle = $row['username'];
                        $ussrrphoto = $mediaServer. $row['profile_photo'];
                        echo '<li class="" style="position: relative; padding-left: 15px;"><a href="/'.$ussrrtitle.'/"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$ussrrphoto.'&quot;);"></div><div class="_4pa1l _6pC2x"></div></div><p>'.$ussrrtitle.'</p></a></li>';
                }
            } else {
                echo "No persons Online";
            }

            }

    }
getUserSliderOnline();
getOnlineUserStatus()
?>