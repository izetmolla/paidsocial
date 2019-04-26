<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
$username = $user['username'];
$myidd = $_SESSION['id'];
$username = $_GET['username'];


if(isset($_POST["limit"], $_POST["start"])){
    
    $sql = "SELECT * FROM medias WHERE media_user='$username' AND status='published' ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        $personi = getUserDetailsID($row['user_id']);
        
        $fullphotoslug = "'".'/getfullmedia/'.$row['id'].'/'."'";
        $mediaSlugf = "'".'/p/'. $row['media_slug']."/'";
        $mediaUrlf = $mediaServer .$row['media_url'];
        $mediaTitlef = $row['media_title'];
        
        if($row['media_status'] == 'free'){
                echo '<li><article class="_33vRV"><div onclick="getotheropt('.$fullphotoslug.')" class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaUrlf.'&quot;);"><p class="_3A-mA">FREE</p></div></div><footer  onclick="window.location.replace('.$mediaSlugf.')">'.$mediaTitlef.'</footer></article></li>';
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
    
        
        $fullphotoslug = "'".'/getfullmedia/'.$mediap['id'].'/'."'";
        $mediaSlug = "'".'/p/'. $mediap['media_slug']."/'";
        $mediaTitle = $mediap['media_title'];
        $mediaUrl = $mediaServer .$mediap['media_url'];
        $mediaBlur = $mediaServer .$mediap['media_blur'];
        $mediaPrice = $mediap['media_price'];
  
            
                    $sql = "SELECT * FROM coinstransacsion WHERE sender_id = '".$senderid."' AND receiver_id = '".$receiverid."' AND media_id = '".$mediaid."'";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<li><article class="_33vRV"><div class="_2zLM1"><div onclick="getotheropt('.$fullphotoslug.')" class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaUrl.'&quot;);"><p class="_3A-mA">'.$mediaPrice.' - Open</p></div></div><footer onclick="window.location.replace('.$mediaSlug.')">'.$mediaTitle.'</footer></article></li>';
                        }
                    } else {
                        if($type == 'photo'){
                            echo '<li><article onclick="window.location.replace('.$mediaSlug.')"  class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO _3ieFz"><div class="_2OJUP">Photo</div><p class="_3A-mA _3PABo">'.$mediaPrice.'</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }elseif($type == 'photo-blur'){
                            echo '<li><article onclick="window.location.replace('.$mediaSlug.')" class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaBlur.'&quot;);"><p class="_3A-mA _3PABo">'.$mediaPrice.'</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }elseif($type == 'video'){
                            echo '<li><article onclick="window.location.replace('.$mediaSlug.')" class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO _26Ix8 _3ieFz"><div class="_2OJUP">Video</div><p class="_3A-mA _3PABo">'.$mediaPrice.'</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }elseif($type == 'video-blur'){
                            echo '<li><article onclick="window.location.replace('.$mediaSlug.')" class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO _26Ix8" style="background-image: url(&quot;https://s3.amazonaws.com/cdn.celeb.tv/public/ee0b1a934c234019a79333ebd152a413ae2e584e/783fb55250b2192fdc81363b9a0b3029cfb2f310.png&quot;);"><p class="_3A-mA _3PABo">'.$mediaPrice.'</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }
                    }  
            
}

?>