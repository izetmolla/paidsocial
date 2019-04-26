<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/vendor/autoload.php");
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                header("Location: /login/");
        }else{
            $mediaid = $_GET['id'];
            $opttable = $_GET['type'];
            $profusername = $_SESSION['username'];
            $mediapost = getMediaDetailsbyID($_GET['id']);
            if($_SESSION['id'] == $mediapost['user_id']){
                echo $file_name = $mediapost['media_url'];
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
                    // sql to delete a record
                    $sql = "DELETE FROM $opttable WHERE id='$mediaid'";
                    if ($link->query($sql) === TRUE) {
                        header("Location: /$profusername/");
                    }
                }else{ echo 'error here'; }
   
            }else{include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/404/loged.php");}
        }
                ?>