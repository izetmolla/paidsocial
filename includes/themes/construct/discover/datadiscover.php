<?php

session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/discover/functions.php");


if(isset($_POST["limit"], $_POST["start"])){
    $myid = $usersession['id'];
    $sql = "SELECT * FROM users WHERE type='model-user' AND NOT id='$myid' ORDER BY user_lastseen DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
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
  
  ?>