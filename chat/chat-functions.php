<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");
session_start();
$logedid = $_SESSION['id'];









/* Get user details by Username */
function displaySmschat($sID,$rID,$Suser){
    global $link, $user, $mediaServer;
    $sql = "SELECT * FROM chat WHERE (sID = '".$sID."' AND rID = '".$rID."' AND dID='$sID' AND status='1') OR (sID = '".$rID."' AND rID = '".$sID."'  AND dID='$sID' AND status='1') ORDER by ID DESC LIMIT 25";
    $result = $link->query($sql);
        while($row = $result->fetch_assoc()) {
                    $time = chatTimeAgo($row['time']);
                    if($sID == $row['sID']){
                        $senderstylea = '_1KkUH';
                        $lvvvviy = '<div class="_1f_I5">lv.1</div>';
                        $ssiss = '';
                        
                    }elseif($sID == $row['rID']){
                        $senderstylea = '';
                        $lvvvviy = '';
                        $ssiss = '';
                        
                    }
            if($row['type'] == 'sms'){
                        $checksms = substr($row['message'], 0, 8);
                        $checksms1 = substr($row['message'], -4);
                        $mediaSlug = substr($row['message'], 8);
                        if($checksms == 'MEDIAID:'){
                            echo '<div class="message EhgvY '.$senderstylea.'">
                                        <a class="dspgw" href=""><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer. $user['profile_photo'].'&quot;);"></div></div></a>
                                        <div class="_2LcSc">
                                            <div class="AUaFb">'.$ssiss .$lvvvviy.' '.$time.'</div>';
                                            chatMediaBySlug($mediaSlug);
                            echo       '</div>
                                    </div>';
                        }else{
                            echo '<div class="message EhgvY '.$senderstylea.'" >
                                        <a class="dspgw" href="/'.$user['username'].'">
                                            <div class="avatar">
                                                <div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer. $user['profile_photo'].'&quot;);"></div>
                                            </div>
                                        </a>
                                        <div class="_2LcSc">
                                            <div class="AUaFb">
                                                '.$ssiss .$lvvvviy.''.$time.'
                                            </div>
                                            <div class="_3VGvO">'.$row['message'].'</div>
                                        </div>
                                    </div>';
                        }
            }elseif($row['type'] == 'media'){
                $media = getChatMediaDetailsbyslug($row['message']);
                if($media['media_type'] == 'chat-photo'){
                    
                    
                            echo '<div class="message EhgvY '.$senderstylea.'" onclick="getotheropt(&quot;/chat/photo/'. $media['media_url'].'&quot;)">
                                        <a class="dspgw" href="/'.$user['username'].'">
                                            <div class="avatar">
                                                <div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer. $user['profile_photo'].'&quot;);"></div>
                                            </div>
                                        </a>
                                        <div class="_2LcSc">
                                            <div class="AUaFb">
                                                '.$ssiss .$lvvvviy.''.$time.'
                                            </div>
                                            <figure class="jUpte"><div class="_3bpE_"><div class="_1TUGx"><div class="dupjM"></div><p>Loading...</p></div></div><div class="_2zLM1"><div class="_1S9rk _1zx4j" style="background-image: url(&quot;'.$mediaServer .$media['media_url'].'&quot;);"><p class="_3A-mA">FREE</p></div></div></figure>
                                            
                                        </div>
                                    </div>';
                }elseif($media['media_type'] == 'chat-video'){
                     echo '<div class="message EhgvY '.$senderstylea.'" onclick="getotheropt(&quot;/chat/video/'. $media['media_url'].'&quot;)">
                                        <a class="dspgw" href="/'.$user['username'].'">
                                            <div class="avatar">
                                                <div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer. $user['profile_photo'].'&quot;);"></div>
                                            </div>
                                        </a>
                                        <div class="_2LcSc">
                                            <div class="AUaFb">
                                                '.$ssiss .$lvvvviy.''.$time.'
                                            </div>
                                            <figure class="jUpte PAj7P"><div class="_2zLM1"><div class="_1S9rk _1zx4j _26Ix8" style="background-image: url(&quot;'.$mediaServer. $media['media_blur'].'&quot;);"></div></div></figure>
                                            
                                        </div>
                                    </div>';
                }
            }
        } 
}




/* Get user details by Username */
function chatUserByUsername($username){
    global $link;
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$user = mysqli_fetch_assoc($result);
	return $user;
    
}
/* Get user details by Username */
function chatUserById($id){
    global $link;
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$user = mysqli_fetch_assoc($result);
	return $user;
    
}
/* Get user details by Username */
function chatUsersession($id){
    global $link;
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$user = mysqli_fetch_assoc($result);
	return $user;
    
}

function getChatMediaDetailsbyslug($slug){
    global $link;
	$sql = "SELECT * FROM medias WHERE media_slug='$slug'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$media = mysqli_fetch_assoc($result);
	return $media;
}













function chatTimeAgo($ts) {
    if(!ctype_digit($ts)) {
        $ts = strtotime($ts);
    }
    $diff = time() - $ts;
    if($diff == 0) {
        return 'now';
    } elseif($diff > 0) {
        $day_diff = floor($diff / 86400);
        if($day_diff == 0) {
            if($diff < 60) return 'just now';
            if($diff < 120) return '1 minute ago';
            if($diff < 3600) return floor($diff / 60) . ' minutes ago';
            if($diff < 7200) return '1 hour ago';
            if($diff < 86400) return floor($diff / 3600) . ' hours ago';
        }
        if($day_diff == 1) { return 'Yesterday'; }
        if($day_diff < 7) { return $day_diff . ' days ago'; }
        if($day_diff < 31) { return ceil($day_diff / 7) . ' weeks ago'; }
        if($day_diff < 60) { return 'last month'; }
        return date('F Y', $ts);
    } else {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if($day_diff == 0) {
            if($diff < 120) { return 'in a minute'; }
            if($diff < 3600) { return 'in ' . floor($diff / 60) . ' minutes'; }
            if($diff < 7200) { return 'in an hour'; }
            if($diff < 86400) { return 'in ' . floor($diff / 3600) . ' hours'; }
        }
        if($day_diff == 1) { return 'Tomorrow'; }
        if($day_diff < 4) { return date('l', $ts); }
        if($day_diff < 7 + (7 - date('w'))) { return 'next week'; }
        if(ceil($day_diff / 7) < 4) { return 'in ' . ceil($day_diff / 7) . ' weeks'; }
        if(date('n', $ts) == date('n') + 1) { return 'next month'; }
        return date('F Y', $ts);
    }
}































/* Get Chat media by slug */
function chatMediaBySlug($slug){
    global $link, $mediaServer;
    $sql = "SELECT * FROM medias WHERE media_slug='$slug'";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row['media_status'] == 'free'){
            if($row['media_type'] == 'photo'){
                echo '<figure onclick="getotheropt(&quot;/getfullmedia/'.$row['id'].'/&quot;)" class="jUpte PAj7P"><div class="_3bpE_"><div class="_1TUGx"><div class="dupjM"></div><p>Loading...</p></div></div><div class="_2zLM1"><div class="_1S9rk _1zx4j" style="background-image: url(&quot;'.$mediaServer. $row['media_url'].'&quot;);"><p class="_3A-mA">FREE</p></div></div><figcaption><p>'.$row['media_title'].'</p></figcaption></figure>';
            }elseif($row['media_type'] == 'video'){
                echo 'Not Avaibe for this video';
            }
        }elseif($row['media_status'] == 'paid'){
            getPaidChatMedia($row['id'],$row['user_id'],$slug);
        }
    } 
}
/* get chat locked media  */
function getPaidChatMedia($mediaid,$receiverid,$slug){
    global $link, $logedid, $mediaServer;
    $media = getChatMediaDetailsbyslug($slug);
    $sql = "SELECT * FROM coinstransacsion WHERE sender_id = '".$logedid."' AND media_id = '".$mediaid."' AND receiver_id='".$receiverid."'";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                            if($media['media_type'] == 'photo'){
                            echo '<figure onclick="getotheropt(&quot;/getfullmedia/'.$media['id'].'/&quot;)" class="jUpte PAj7P"><div class="_3bpE_"><div class="_1TUGx"><div class="dupjM"></div><p>Loading...</p></div></div><div class="_2zLM1"><div class="_1S9rk _1zx4j" style="background-image: url(&quot;'.$mediaServer. $media['media_url'].'&quot;);"><p class="_3A-mA">Unlocked</p></div></div><figcaption><p>'.$media['media_title'].'</p></figcaption></figure>';
                        }elseif($media['media_type'] == 'video'){
                            echo 'Not Avaibe for this video';
                        }
                    }else{
                        if($media['media_type'] == 'photo'){
                            
                            
                            
                            echo '<figure onclick="window.location.replace(&quot;/p/'.$media['media_slug'].'/&quot;)" class="jUpte PAj7P"><div class="_2zLM1"><div class="_1S9rk _20HVO _3ieFz"><div class="_2OJUP">Photo</div><p class="_3A-mA _3PABo">'.$media['media_price'].'</p></div></div><figcaption><p>'.$media['media_title'].'</p></figcaption></figure>';
                            
                            
                            
                        }elseif($media['media_type'] == 'photo-blur'){
                            
                            
                            echo '<figure class="jUpte PAj7P"><div class="_3bpE_"><div class="_1TUGx"><div class="dupjM"></div><p>Loading...</p></div></div><div class="_2zLM1"><div class="_1S9rk _1zx4j" style="background-image: url(&quot;https://s3.amazonaws.com/cdn.celeb.tv/public/95fcee4611b73dcc3b773909f85844173979326d/5e45e0f9efd8735016ee9f23821166766e27cd0c.jpeg&quot;);"><p class="_3A-mA _3PABo">954</p></div></div><figcaption><p>Come to me 💯🥵🔥🔥🔥🔥💣</p></figcaption></figure>';



                        }elseif($media['media_type'] == 'video'){
                            echo '<figure onclick="window.location.replace(&quot;/p/'.$media['media_slug'].'/&quot;)" class="jUpte PAj7P"><div class="_2zLM1"><div class="_1S9rk _20HVO _26Ix8 _3ieFz"><div class="_2OJUP">Video</div><p class="_3A-mA _3PABo">'.$media['media_price'].'</p></div></div><figcaption><p>'.$media['media_title'].'</p></figcaption></figure>';
                        }elseif($media['media_type'] == 'video-blur'){
                            echo 'Not avaible Video';
                        }
                    }













}