<?php

function getMessagesListal($USER){
        global $link, $weburl, $mediaServer;
        $sql = "SELECT * FROM chat WHERE (sID='$USER' or rID='$USER') AND lCHAT='0' AND dID='$USER' ORDER BY time DESC";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                $time = chatTimeAgo($row['time']);
                if($USER == $row['sID']){
                    $sender = $row['rID'];
                    
                }elseif($USER == $row['rID']){
                    $sender = $row['sID'];
                }
                $user = chatUserById($sender);
                $countunreadsms = countUnreadMessages($USER,$row['sID']);
                
                
                    if($row['status'] == 0){$sttt = ' _2ehQQ';}else{$sttt = '';}
                    if($countunreadsms == 0){$msssgnrr = '';}else{$msssgnrr = '<div class="_1q7mX">'.$countunreadsms.'</div>';}
                
                
                
                echo '
                
<li style="height: 65px; width: 100%;">
    <div class="aaaizoo">
        <button onclick="getotheropt(&quot;/action/deletesms/'.$user['username'].'/'.$user['id'].'/&quot;)" class="Mk-Go"></button>
    </div>
    <div class="_8-6JL">
        <a href="/chat/'.$user['username'].'/">
            <div class="avatar">
                <div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer. $user['profile_photo'].'&quot;);"></div>
                '.$onStatt.'
            </div>
        </a>
        <a class="_1y0K8" href="'.$weburl.'/chat/'.$user['username'].'/">
            <div class="_2y5aI">'.$user['username'].'</div>
            <div class="_28eQo '.$sttt.'">
                <p>'.$row['message'].'</p>
                <div class="Z8ED7">'.$time. $msssgnrr.'</div>
            </div>
        </a>
    </div>
</li>
                
                
                
                
                ';
                
                
                
                
                
                
                
                
            }
        } else {
            echo "<center>No messages</center>";
        }
}








function countUnreadMessages($rID, $sID){
    global $link;
	$sql = "SELECT * FROM chat WHERE rID='$rID' AND sID='$sID' AND dID='$rID' AND status='0'";
    $countunreadsms = mysqli_num_rows(mysqli_query($link, $sql));
    return $countunreadsms;
}

