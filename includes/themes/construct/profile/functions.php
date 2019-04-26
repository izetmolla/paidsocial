<?php







/* --- Get  Count Rows -- */
function getProfileCount($user){
    global $link;
	$sql = "SELECT * FROM medias WHERE media_user='$user' AND status='published'";
    $count = mysqli_num_rows(mysqli_query($link, $sql));
    return $count;
    
    
}

/* --- Get  Count Rows Followers -- */
function getProfileFollowersCount($id){
    global $link;
	$sql = "SELECT * FROM followzone WHERE receiver_id='$id'";
    $count = mysqli_num_rows(mysqli_query($link, $sql));
    echo $count;
}

function getProfileFollowingCount($id){
    global $link;
	$sql = "SELECT * FROM followzone WHERE sender_id='$id'";
    $count = mysqli_num_rows(mysqli_query($link, $sql));
    echo $count;
    
}






function getFollowUnfollowButton(){
    global $link , $user , $usersession;
    $receiverusername = $user['username'];
    $receiver_id = $user['id'];
    $sender_id = $usersession['id'];
    global $link;
        $sql = "SELECT * FROM 	followzone  WHERE sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div style="width:100%" action="/get/'.$receiver_id.'/unfollow/" method="post" id="followdiv"><button id="unfollow">Following</button></div>';     
            }
        }else{
            echo '<div style="width:100%" action="/get/'.$receiver_id.'/follow/" method="post" id="followdiv"><button id="follow">Follow</button></div>';
        }
}





/* ==============================================
======= Models media List  Start============== */
function getModelMediaPostPhotoList(){
    global $link, $user, $usersession, $media, $weburl, $mediaServer;
    $username = $user['username'];
    $sql = "SELECT * FROM medias WHERE media_user='$username'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($medialist = $result->fetch_assoc()) {
                $senderid = $usersession["id"];
                $receiverid = $user['id'];
                $mediaid = $media['id']; 
                     if($medialist['media_status'] == 'free'){
                        echo '<li><article class="_33vRV"><a href="'.$weburl .'/p/'. $medialist['media_slug'].'"><div class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaServer . $medialist['media_url'] .'&quot;);"><p class="_3A-mA" style="text-transform: uppercase;">'.$medialist['media_status'].'</p></div></div><footer>'. $medialist['media_title'] .'</footer></a></article></li>';
                     }elseif($medialist['media_status'] == 'paid'){
                         $mediaprice = $medialist['media_price'];
                         if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                               echo '<li><article class="_33vRV"><a href="'.$weburl .'/p/'. $medialist['media_slug'].'"><div class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;https://s3.amazonaws.com/cdn.celeb.tv/public/2d06738eccc462a8a5d5100dfe7b2dde3ab86a39/c739a9c7db8fd725525e2f577cbdf2c41caa15e6.jpg&quot;);"><p class="_3A-mA _3PABo">'. $medialist['media_price'].'</p></div></div><footer>'. $medialist['media_title'].'</footer></a></article></li>';
                            }else{
                             getUnlockedLockedPhotos($medialist['id']);
                         } 
                     }
            }
    } else {
        echo "0 results";
    }
}
function getUnlockedLockedPhotos($mediaid){
    global $link, $user, $usersession, $media, $weburl, $mediaServer;
    $meddetails = getMediaDetalisbyID($mediaid);
    $senderid = $usersession["id"];
    $receiverid = $user['id'];
    $mediaprice = $media['media_price'];  
        if($senderid == $receiverid){
            echo '<li><article class="_33vRV"><a href="'.$weburl .'/p/'. $meddetails['media_slug'].'"><div class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaServer . $meddetails['media_url'] .'&quot;);"><p class="_3A-mA" style="text-transform: uppercase;">Yours</p></div></div><footer>'. $meddetails['media_title'] .'</footer></a></article></li>';
        }else{
                $sql = "SELECT * FROM coinstransacsion WHERE sender_id = '".$senderid."' AND receiver_id = '".$receiverid."' AND media_id = '".$mediaid."'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<li><article class="_33vRV"><a href="'.$weburl .'/p/'. $meddetails['media_slug'].'"><div class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaServer . $meddetails['media_url'] .'&quot;);"><p class="_3A-mA" style="text-transform: uppercase;">Unlocked</p></div></div><footer>'. $meddetails['media_title'].'</footer></a></article></li>';
                    }
                } else {
                    echo '<li><article class="_33vRV"><a href="'.$weburl .'/p/'. $meddetails['media_slug'].'"><div class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;https://s3.amazonaws.com/cdn.celeb.tv/public/2d06738eccc462a8a5d5100dfe7b2dde3ab86a39/c739a9c7db8fd725525e2f577cbdf2c41caa15e6.jpg&quot;);"><p class="_3A-mA _3PABo">'. $meddetails['media_price'].'</p></div></div><footer>'. $meddetails['media_title'].'</footer></a></article></li>';
                }  
    
}
}
function getMediaDetalisbyID($id){
    global $link;
    if (isset($_GET['username'])) {
      $username =  $_GET['username'];
	$sql = "SELECT * FROM medias WHERE media_user='$username' AND id='$id'";
	$result = mysqli_query($link, $sql);
	// fetch query results as associative array.
	$med = mysqli_fetch_assoc($result);
	return $med;
    }
}
/* ==============================================
======= Models media List  Start============== */










/* ==============================================
======= Models All Profile media list============== */
function getMyprofileNormalDatahere($username){
    global $link, $mediaServer;
    $sql = "SELECT * FROM medias WHERE media_user='$username' ORDER BY id DESC LIMIT 5";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        $personi = getUserDetailsID($row['user_id']);
        
        $fullphotoslug = "'".'/getfullmedia/'.$row['id'].'/'."'";
        $mediaSlug = "'".'/p/'.$row['media_slug'].'/'."'";
        $mediaUrl = $mediaServer. $row['media_url'];
        $mediaTitle = $row['media_title'];
        
                echo '<li><article class="_33vRV"><div onclick="loginOPT()" class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaUrl.'&quot;);"><p class="_3A-mA">FREE</p></div></div><footer onclick="window.location.replace('.$mediaSlug.')">'.$mediaTitle.'</footer></article></li>';
        
    }
    
}





























































































































































// Not Loged Public Account Profile
function notLogedPublicACC($username){
    global $link, $usersession, $mediaServer;
    $myidd = $usersession['id'];
    
    $sql = "SELECT * FROM medias WHERE media_user='$username' AND status='published' ORDER BY id DESC LIMIT 9";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()) {
        $personi = getUserDetailsID($row['user_id']);
        
        $fullphotoslug = "'".'/getfullmedia/'.$row['id'].'/'."'";
        $mediaSlugf = "'".'/p/'. $row['media_slug']."/'";
        $mediaUrlf = $mediaServer .$row['media_url'];
        $mediaTitlef = $row['media_title'];
        
        if($row['media_status'] == 'free'){
                echo '<li><article class="_33vRV"><div onclick="loginOPT()" class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaUrlf.'&quot;);"><p class="_3A-mA">FREE</p></div></div><footer  onclick="loginOPT()">'.$mediaTitlef.'</footer></article></li>';
        }elseif($row['media_status'] == 'paid'){
                getLockedMedianotLogedPublicACC($row['id']);
        }
    } 
  }  
function getLockedMedianotLogedPublicACC($mediaid){
    global $link, $user, $mediaServer, $usersession;
    $senderid = $usersession['id'];
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
                            echo '<li><article class="_33vRV"><div class="_2zLM1"><div onclick="loginOPT()" class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaUrl.'&quot;);"><p class="_3A-mA">'.$mediaPrice.' - Open</p></div></div><footer onclick="loginOPT()">'.$mediaTitle.'</footer></article></li>';
                        }
                    } else {
                        if($type == 'photo'){
                            echo '<li><article onclick="loginOPT()"  class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO _3ieFz"><div class="_2OJUP">Photo</div><p class="_3A-mA _3PABo">150</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }elseif($type == 'photo-blur'){
                            echo '<li><article onclick="loginOPT()" class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO" style="background-image: url(&quot;'.$mediaBlur.'&quot;);"><p class="_3A-mA _3PABo">'.$mediaPrice.'</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }elseif($type == 'video'){
                            echo '<li><article onclick="loginOPT()" class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO _26Ix8 _3ieFz"><div class="_2OJUP">Video</div><p class="_3A-mA _3PABo">'.$mediaPrice.'</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }elseif($type == 'video-blur'){
                            echo '<li><article onclick="loginOPT()" class="_33vRV"><div class="_2zLM1"><div class="_1S9rk _20HVO _26Ix8" style="background-image: url(&quot;https://s3.amazonaws.com/cdn.celeb.tv/public/ee0b1a934c234019a79333ebd152a413ae2e584e/783fb55250b2192fdc81363b9a0b3029cfb2f310.png&quot;);"><p class="_3A-mA _3PABo">'.$mediaPrice.'</p></div></div><footer>'.$mediaTitle.'</footer></article></li>';
                        }
                    }  
            
}