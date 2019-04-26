<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/vendor/autoload.php");
 $izorandslug = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,20))),1,20);
 $izorand = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,64))),1,64);
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ echo 'Need to login';}else{
         
            
    if(isset($_FILES["file1"])){
        
    $fileName = $_FILES["file1"]["name"]; // The file name
    $fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["file1"]["type"]; // The type of file it is
    $fileSize = $_FILES["file1"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

   
    $temp_file_location = $_FILES['file1']['tmp_name'];
    $media_url = $izorand.'.jpeg';
    $img_type = array('image/jpeg','image/jpg','image/png');
    $video_type = array('video/mp4','video/avi','video/3gpp', 'video/mov');
        
           

    

    
    
    


        
        
    $sUSER = $_SESSION['username'];
    $sID = $_SESSION['id'];
        
            $temp_file_location = $_FILES['file1']['tmp_name'];
            if(in_array($fileType,$img_type)) {
                $mediatype = 'chat-photo';
                $media_url = $izorand .'.jpeg';
            }
            elseif(in_array($fileType,$video_type)){
                $mediatype = 'chat-video';
                $media_url = $izorand .'.mp4';
            }
            else {
                echo '
                
                
<div class="YNcdi">
    <div class="INtAP">
        <p class="_1vwgT">Oops</p>
        <div class="xVhXy">Error Format '.$fileType.'</div>
        <div class="_3vunz">
            <button class="" onclick="closeOtherOpt()">NO</button>
        </div>
    </div>
</div>


                
                
                
                ';
            }
        
        
        
        $s3 = new Aws\S3\S3Client([
			'region'  => 'us-east-2',
			'version' => 'latest',
			'credentials' => [
				'key'    => "AKIAIGUWBHC6V3WL4KNA",
				'secret' => "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",
			]
		]);		

		$result = $s3->putObject([
			'Bucket' => 'PaidSocial',
			'Key'    => $media_url,
			'SourceFile' => $temp_file_location			
		]); 
        
    if($result){

        
        /* Insert Media */
            $sql = "INSERT INTO medias(media_slug, media_user, user_id, media_url, status, time, media_type, media_status) VALUES ('$izorandslug','$sUSER','$sID','$media_url','chat','".time()."','$mediatype','chat')";
            if ($link->query($sql) === TRUE) {
                insertMSG($_GET['id'],$izorandslug);
            }
        
    }
        
     
            
            
            
            
            
            
          
                
          }  
        }

   









    



function insertMSG($rID,$message){
    global $link, $usersession;
    $user = getUserDetailsID($rID);
    $sID = $usersession['id'];
    $sUSER = $usersession['username'];
    $senderbudget = $usersession['coins'];
    $receiverbudget = $user['coins'];
    $receiversmsprice = $user['smsprice'];
        if($receiversmsprice){
            if($receiversmsprice > $senderbudget){ 
                include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/others/popups/no-founds.php");
            }else{
                
                $rcbgnext = $receiverbudget + $receiversmsprice;
                $snbgnext = $senderbudget - $receiversmsprice;
            /* Insert sms To MYSQL */
                $sql2 = "UPDATE users SET coins='$rcbgnext' WHERE id='$rID'";
                if ($link->query($sql2) === TRUE) {
                    $sql3 = "UPDATE users SET coins='$snbgnext' WHERE id='$sID'";
                    if ($link->query($sql3) === TRUE) {
                                            /* Insert sms To MYSQL */
                                            $sql1 = "UPDATE chat SET lCHAT='1' WHERE (sID='$sID' AND rID='$rID' AND lCHAT='0') OR (sID='$rID' AND rID='$sID' AND lCHAT='0')";
                                            if ($link->query($sql1) === TRUE) {
                                                $sql = "INSERT INTO chat (sID, rID, dID, sUSER, type, time, message) VALUES ('$sID', '$rID', '$rID', '$sUSER', 'media', '".time()."', '$message');";
                                                $sql .= "INSERT INTO chat (sID, rID, dID, sUSER, type, time, message) VALUES ('$sID', '$rID', '$sID', '$sUSER', 'media', '".time()."', '$message');";
                                                if ($link->multi_query($sql) === TRUE) {}

                                            }
                                            /* Insert sms To MYSQL */
                            if ($link->query($sql) === TRUE) {
                                $sql4 = "INSERT INTO coinstransacsion (sender_id, receiver_id,finalprice,type,time,sender_username)VALUES('$sID','$rID','$receiversmsprice','message',".time().",'$sUSER')";
                            if ($link->query($sql4) === TRUE) {}
                            }
                            /* Insert sms To MYSQL */               
                    }
                }
            /* Insert sms To MYSQL */ 
                
            }
        }else{
             /* Insert sms To MYSQL */
            $sql1 = "UPDATE chat SET lCHAT='1' WHERE (sID='$sID' AND rID='$rID' AND lCHAT='0') OR (sID='$rID' AND rID='$sID' AND lCHAT='0')";
            if ($link->query($sql1) === TRUE) {
                $sql = "INSERT INTO chat (sID, rID, dID, sUSER, type, time, message) VALUES ('$sID', '$rID', '$rID', '$sUSER', 'media', '".time()."', '$message');";
                $sql .= "INSERT INTO chat (sID, rID, dID, sUSER, type, time, message) VALUES ('$sID', '$rID', '$sID', '$sUSER', 'media', '".time()."', '$message');";
                if ($link->multi_query($sql) === TRUE) {}
                
            }
            /* Insert sms To MYSQL */
        }   
}



?>