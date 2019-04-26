<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    $izorandslug = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,20))),1,20);
    
    
    if(isset($_GET['create'])){
        if(isset($_POST['albumtitle'])){
        $sql = "INSERT INTO mediaalbum (slug, title, userid)
VALUES ('$izorandslug', '".$_POST['albumtitle']."','".$_SESSION['id']."' )";
        if ($link->query($sql) === TRUE) {
            echo '<script>window.location.replace("/editalbum/'.$izorandslug.'/"); </script> <meta http-equiv="refresh" content="2;url=/editalbum/'.$izorandslug.'/" />';
        }
    }
}

?>