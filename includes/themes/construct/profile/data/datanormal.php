<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
if(isset($_POST["limit"], $_POST["start"])){
    $user = $_GET['user'];
    $sql = "SELECT * FROM medias WHERE media_user='$user' AND status='published' ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
                echo '<li><article class="_33vRV"><div onclick="getotheropt(&quot;/getfullmedia/'.$row['id'].'/&quot;)" class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaServer. $row['media_url'].'&quot;);"><p class="_3A-mA">FREE</p></div></div><footer  onclick="window.location.replace(&quot;/p/'.$row['media_slug'].'/&quot;)">'.$row['media_title'].'</footer></article></li>';
        
    }
    
    
    
}


?>