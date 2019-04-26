<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/config.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/chat/chat-functions.php");
    session_start();

$sID = $_SESSION['id'];
$rID = $_GET['id'];
$user = chatUserById($_GET['id']);
        
            $sql = "SELECT * FROM chat WHERE (sID='$sID' AND rID='$rID' AND dID='$sID' AND status='0') OR (sID='$rID' AND rID='$sID' AND dID='$sID' AND status='0')";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
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
                                $sql = "UPDATE chat SET status='1' WHERE ID='".$row['ID']."' AND status='0' AND dID='$sID'";
                                if ($link->query($sql) === TRUE) {}
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
                                $sql = "UPDATE chat SET status='1' WHERE ID='".$row['ID']."' AND status='0' AND dID='$sID'";
                                if ($link->query($sql) === TRUE) {}
                            }
                }elseif($row['type'] == 'media'){
                    $media = getChatMediaDetailsbyslug($row['message']);
                    if($media['media_type'] == 'chat-photo'){


                                echo '<div class="message EhgvY '.$senderstylea.'" onclick="getFullChatPhoto(&quot;'.$mediaServer. $media['media_url'].'&quot;)">
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
                        $sql = "UPDATE chat SET status='1' WHERE ID='".$row['ID']."' AND status='0' AND dID='$sID'";
                        if ($link->query($sql) === TRUE) {}
                    }elseif($media['media_type'] == 'chat-video'){
                         echo '<div class="message EhgvY '.$senderstylea.'" onclick="getFullChatVideo(&quot;'.$mediaServer. $media['media_url'].'&quot;)">
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
                    $sql = "UPDATE chat SET status='1' WHERE ID='".$row['ID']."' AND status='0' AND dID='$sID'";
                    if ($link->query($sql) === TRUE) {}
                    }
                }
            }
                
                
                    
            }
        
        
        
            








?>


