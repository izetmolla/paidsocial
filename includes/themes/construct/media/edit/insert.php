<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
$mediaid = $_GET['mediaid'];
$mediatitle = $_POST['media_title'];
$mediaprice = $_POST['media_price'];
$mediatype = $_POST['locktype'];
if($mediaprice > 0){$mediastatus = 'paid';}else{$mediastatus = 'free';}
$sql = "UPDATE medias SET status='published', media_title='$mediatitle', media_price='$mediaprice',media_type='$mediatype', media_status='$mediastatus' WHERE id='$mediaid'";

if ($link->query($sql) === TRUE) {
    echo '<div class="YNcdi">
    <div class="INtAP">
        <p class="_1vwgT">Update Sucsessfull</p>
        <div class="xVhXy">Your post is updated Sucsesfull</div>
        <div class="_3vunz">
            <button onclick="closeOtherOpt()" class="">Close</button>
        </div>
    </div>
</div>';
    
} else {
    echo "Error updating record: " . $conn->error;
}

?>





