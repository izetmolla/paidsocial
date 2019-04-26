<?php 
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php"); 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/functions/vendor/autoload.php");
    
    























if (isset($_GET["opt"])) {
    
    /* Update Profile Details */
    if($_GET['opt'] == 'updateprofile'){
        
        if($usersession['type'] == 'model-user'){
            $myid = $_SESSION['id'];
            $fullname = $_POST['fullname'];
            $bio = $_POST['bio'];
            $smsprice = $_POST['smsprice'];
            $subscribe = $_POST['subscribe'];
            $sql = "UPDATE users SET fullname='$fullname', bio='$bio', smsprice='$smsprice', subscribe='$subscribe' WHERE id='$myid'";
            if ($link->query($sql) === TRUE) {echo '<div class="sucsess-alert-edit">Sucsess Updated</div>';}
        }elseif(
            $usersession['type'] == 'normal-user'){
            $myid = $_SESSION['id'];
            $fullname = $_POST['fullname'];
            $bio = $_POST['bio'];
            $sql = "UPDATE users SET fullname='$fullname', bio='$bio' WHERE id='$myid'";
            if ($link->query($sql) === TRUE) {echo '<div id="sucsess-alert-edit">Sucsess Updated</div>';}
        }
    }
    
    
    
    /* Upload Profile Photo */
    if($_GET['opt'] == 'uploadimage'){
        if(isset($_FILES['image'])){
          $file_name = izorand(64);
          $temp_file_location = $_FILES['image']['tmp_name'];
            
            
            
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
			'Key'    => $file_name,
			'SourceFile' => $temp_file_location			
		]);
            if($result){
                
            $myid = $_SESSION['id'];
            $sql = "UPDATE users SET profile_photo='$file_name' WHERE id='$myid'";
            if ($link->query($sql) === TRUE) {
                echo '<script>window.location.href = "/account/edit/";</script>';
                
            }
                
            }
            
            
            
            
            
            
            

       }
        
    }


}
?>