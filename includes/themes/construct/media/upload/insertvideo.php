<?php

if($_FILES['file']['name'] != ''){
    echo $temp_file_location = $_FILES['file']['tmp_name'];
    

}





?>
<!--

/*
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
global $link;



        $media_title = $_POST['media_title'];
        $media_slug = izorand(24);
        $media_user = $_SESSION['username'];
        $user_id = $_SESSION['id'];
        $media_url = izorand(64);
        $status = 'public';
        $time = time();
        $media_type = 'photo';
            if(isset($_POST["checkbb"])){
                echo $_POST["checkbb"];
            }
            if($_POST['media_price'] == 0){
                $media_status = 'free';
                $media_blur = '';
            }else{
                $media_status = 'paid';
                $media_blur = izorand(64);
            }
        $media_price = $_POST['media_price'];
    $sql = "INSERT INTO medias( media_title, media_slug, media_blur, media_user, user_id, media_url, status, time, media_type, media_status, media_price) VALUES ('$media_title','$media_slug','$media_blur','$media_user','$user_id','$media_url','$status','$time','$media_type','$media_status','$media_price')";

    if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

