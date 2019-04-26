<?php 
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php"); 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/discover/functions.php");

if(isset($_REQUEST["search"])){
    $izo = $_REQUEST["search"]; 
    $myid = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE username LIKE '%$izo%' AND NOT id='$myid'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row['user_lastseen'] > time()){$useronline = '<div class="_4pa1l _6pC2x"></div>';}else{$useronline = '';}
            
            echo '<div class="_3DxMM _35PoL"><a href="/'.$row['username'].'/"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$mediaServer. $row['profile_photo'].'&quot;);"></div>'.$useronline.'</div><div class="_2DNSl"><p>'.$row['username'].'</p><p>'.$row['bio'].'</p></div></a><menu>';
            followUfollowdiscover($row['id'],$row['username']);
            echo'</menu></div>';
        }
    } else {
        echo "<center>Not No person found with this name</center>";
    }
    
    echo '<style>.izo-content{display:none;}</style>';
    
}
?>