<?php

function getHomeDatahere($myidd){
    global $link, $user, $mediaServer;
    $sql = "SELECT * FROM medias WHERE user_id IN (SELECT receiver_id FROM followzone WHERE sender_id='$myidd') AND status='published' AND NOT user_id='$myidd' ORDER BY id DESC LIMIT 9";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        $personi = getUserDetailsID($row['user_id']);
        
        if($personi['user_lastseen'] > time()){$useronline = '<div class="_4pa1l _6pC2x"></div>';}else{$useronline = '';}
        $fullphotoslug = "'".'/getfullmedia/'.$row['id'].'/'."'";
        $userprofilelink = "'".'/'.$row['media_user'].'/'."'";
        $photosluglink = "'".'/p/'.$row['media_slug'].'/'."'";
        
        if($row['media_status'] == 'free'){
                echo '<li><article class="_2CAHg"><header onclick="window.location.href='.$userprofilelink.'"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer .$personi['profile_photo'].'&quot;);"></div>'.$useronline.'</div><p>'.$personi['username'].'</p></header><div class="_2zLM1"><div onclick="getotheropt('.$fullphotoslug.')" class="_1S9rk _2663m" style="background-image: url(&quot;'.$mediaServer .$row["media_url"].'&quot;);"><p class="_3A-mA">FREE</p></div></div><footer  onclick="window.location.href='.$photosluglink.'">'.$row['media_title'].'</footer></article></li>';
        }elseif($row['media_status'] == 'paid'){
                getLockedMedia($row['id']);
        }
    }
}



















function getLockedMedia($mediaid){
    global $link, $user, $mediaServer;
    $senderid = $_SESSION['id'];
    $mediap = getMediaDetailsbyID($mediaid);    
    $receiverid =  $mediap['user_id'];    
    $type =  $mediap['media_type'];
    $personi = getUserDetailsID($receiverid);
  
        if($personi['user_lastseen'] > time()){$useronline = '<div class="_4pa1l _6pC2x"></div>';}else{$useronline = '';}
        $fullphotoslug = "'".'/getfullmedia/'.$mediap['id'].'/'."'";
        $userprofilelink = "'".'/'.$mediap['media_user'].'/'."'";
        $photosluglink = "'".'/p/'.$mediap['media_slug'].'/'."'";
    
            if($senderid == $receiverid){
                    echo '<li><article class="_2CAHg"><header onclick="window.location.href='.$userprofilelink.'"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer .$personi['profile_photo'].'&quot;);"></div>'.$useronline.'</div><p>'.$personi['username'].'</p></header><div class="_2zLM1"><div onclick="getotheropt('.$fullphotoslug.')" class="_1S9rk _2663m" style="background-image: url(&quot;'.$mediaServer .$mediap["media_url"].'&quot;);"><p class="_3A-mA">Your Media</p></div></div><footer  onclick="window.location.href='.$photosluglink.'">'.$mediap['media_title'].'</footer></article></li>';
            }else{
                    $sql = "SELECT * FROM coinstransacsion WHERE sender_id = '".$senderid."' AND receiver_id = '".$receiverid."' AND media_id = '".$mediaid."'";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            
                            
                            
                            echo '<li><article class="_2CAHg"><header onclick="window.location.href='.$userprofilelink.'"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer .$personi['profile_photo'].'&quot;);"></div>'.$useronline.'</div><p>'.$personi['username'].'</p></header><div class="_2zLM1"><div onclick="getotheropt('.$fullphotoslug.')" class="_1S9rk _2663m" style="background-image: url(&quot;'.$mediaServer .$mediap["media_url"].'&quot;);"><p class="_3A-mA">'.$mediap['media_price'].' - Open</p></div></div><footer  onclick="window.location.href='.$photosluglink.'">'.$mediap['media_title'].'</footer></article></li>';
                        }
                    } else {
                        if($type == 'photo'){
                            echo '<li><article class="_2CAHg"><header onclick="window.location.href='.$userprofilelink.'"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer .$personi['profile_photo'].'&quot;);"></div>'.$useronline.'</div><p>'.$personi['username'].'</p></header><div class="_2zLM1"><div onclick="window.location.href='.$photosluglink.'" class="_1S9rk _2663m _3ieFz"><div class="_2OJUP">Photo</div><p class="_3A-mA _3PABo">'.$mediap['media_price'].'</p></div></div><footer onclick="window.location.href='.$photosluglink.'">'.$mediap['media_title'].'</footer></article></li>';
                        }elseif($type == 'photo-blur'){
                            echo '<li><article class="_2CAHg"><header><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer .$personi['profile_photo'].'&quot;);"></div>'.$useronline.'</div><p>'.$personi['username'].'</p></header><div  onclick="window.location.href='.$photosluglink.'" class="_2zLM1"><div class="_1S9rk _2663m" style="background-image: url(&quot;'.$mediaServer .$mediap['media_blur'].'&quot;);"><p class="_3A-mA _3PABo">'.$mediap['media_price'].'</p></div></div><footer onclick="window.location.href='.$photosluglink.'">'.$mediap['media_title'].'</footer></article></li>';
                        }elseif($type == 'video'){
                            echo '<li><article class="_2CAHg"><header  onclick="window.location.href='.$userprofilelink.'"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer .$personi['profile_photo'].'&quot;);"></div>'.$useronline.'</div><p>'.$personi['username'].'</p></header><div onclick="window.location.href='.$photosluglink.'" class="_2zLM1"><div class="_1S9rk _2663m _26Ix8 _3ieFz"><div class="_2OJUP">Video</div><p class="_3A-mA _3PABo">'.$mediap['media_price'].'</p></div></div><footer onclick="window.location.href='.$photosluglink.'">'.$mediap['media_title'].'</footer></article></li>';
                        }elseif($type == 'video-blur'){
                            echo '<li><article class="_2CAHg"><header  onclick="window.location.href='.$userprofilelink.'"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer .$personi['profile_photo'].'&quot;);"></div>'.$useronline.'</div><p>'.$personi['username'].'</p></header><div onclick="window.location.href='.$photosluglink.'" class="_2zLM1"><div class="_1S9rk _2663m _26Ix8" style="background-image: url(&quot;'.$mediaServer .$mediap['media_blur'].'&quot;);"><p class="_3A-mA _3PABo">'.$mediap['media_price'].'</p></div></div><footer onclick="window.location.href='.$photosluglink.'">'.$mediap['media_title'].'</footer></article></li>';
                        }
                    }  
            }
}