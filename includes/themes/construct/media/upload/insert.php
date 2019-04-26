<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/vendor/autoload.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");

    
    $fileName = $_FILES["file1"]["name"]; // The file name
    $fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["file1"]["type"]; // The type of file it is
    $fileSize = $_FILES["file1"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

   
    $temp_file_location = $_FILES['file1']['tmp_name'];
    $media_url = izorand(64) .'.jpeg';
    
    

    
    
    
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
        $media_slug = izorand(24);
        $media_user = $_SESSION['username'];
        $user_id = $_SESSION['id'];
        $status = 'published';
        $media_status = 'free';
        $time = time();
        $media_type = 'photo';
            
    $sql = "INSERT INTO medias(media_slug, media_user, user_id, media_url, status, time, media_type, media_status) VALUES ('$media_slug','$media_user','$user_id','$media_url','$status','$time','$media_type','$media_status')";
            if ($link->query($sql) === TRUE) {
                $sql = "SELECT * FROM 	medias  WHERE user_id = '".$user_id."' ORDER BY id LIMIT 1";
                $result = $link->query($sql);
                    while($row = $result->fetch_assoc()) {
                        $ssssss = $row['media_slug'];
                        echo '<script>window.location.replace("/editpost/'.$ssssss.'");</script>';
                    }
                
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
        }else{
            echo 'error';
        }
	
?>

