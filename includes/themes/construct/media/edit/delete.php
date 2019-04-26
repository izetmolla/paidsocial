<?php
        session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){}else{
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/vendor/autoload.php");
        $media = getMediaDetailsbyID($_GET['id']);
            if(isset($_POST['delete'])){
                $file_name = $media['media_url'];
                $s3 = new Aws\S3\S3Client([
                    'region'  => 'us-east-2',
                    'version' => 'latest',
                    'credentials' => [
                        'key'    => "AKIAIGUWBHC6V3WL4KNA",
                        'secret' => "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",
                    ]
                ]);		

                $result = $s3->deleteObject([
                    'Bucket' => 'PaidSocial',
                    'Key'    => $file_name		
                ]);
                if($result){
                    echo 'iku';
                }
                
            }
}


?>