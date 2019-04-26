<?php


function followUfollowdiscover($receiver_id,$receiver_username){
    global $link , $usersession;
    $sender_id = $usersession['id'];
    global $link;
        $sql = "SELECT * FROM 	followzone  WHERE sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<button onclick="location.href=&quot;/chat/'.$receiver_username.'/&quot;;" class="_2aWfr">Chat</button>';
            }
        }else{
            echo '<div id="'.$receiver_id.'"><button onclick="'.$receiver_username.'(&quot;/action/discoverfollow/'.$receiver_username.'/'.$receiver_id.'/&quot;)" type="primary">Follow</button></div>';
            echo '<script type="text/javascript">';
            echo "function $receiver_username(_url){
                        $.ajax({
                            url : _url,
                            type : 'post',
                            success: function(data) {
                             $('#$receiver_id').html(data);
                            }
                        });
                    }
                </script>"; 
        }
}
function getDiscoverDatahere(){
    global $link,$mediaServer,$usersession;
    $myid = $usersession['id'];
    $sql = "SELECT * FROM users WHERE type='model-user' AND NOT id='$myid' LIMIT 9";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if($row['user_lastseen'] > time()){$useronline = '<div class="_4pa1l _6pC2x"></div>';}else{$useronline = '';}
                            
                            echo '<div class="_3DxMM _35PoL"><a href="/'.$row['username'].'/"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer. $row['profile_photo'].'&quot;);"></div>'.$useronline.'</div><div class="_2DNSl"><p>'.$row['username'].'</p><p>'.$row['bio'].'</p></div></a><menu>';
                            followUfollowdiscover($row['id'],$row['username']);
                            echo'</menu></div>';
                        }
                    }
    
}