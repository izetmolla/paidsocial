<?php 
        $profilephoto = $usersession['profile_photo']; ?>
<html lang="en"><head>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="google-site-verification" content="UVw2LFv1FrGgAWk085upB83RZi5AqjlJZ8NWWXLdThI">
  <meta charset="UTF-8">
  <title><?php echo $usersession['username']; ?> - Edit Account</title>
    <link href="/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/24.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/14.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/1.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/7.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/29.css">
    <style>
    
    
        ._1R5HF textarea{
            border: 0.5px solid grey;
        }
    
    </style>
    </head>
<body style="overflow: &quot;&quot;; touch-action: auto" class="footer-hidden">
  <div id="root">
      <div id="app">
          <div class="_-9ST1">
              <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                  <div class="-xfRj">
                      <div class="_3RMaK">
                          <button onclick="location.href='/<?php echo $_SESSION['username']; ?>/';" class="q2020">Cancel</button>
                      </div>
                      <div class="_21GEl" style="justify-content: center;">
                          <p class="_2vADb">Edit Profile</p>
                      </div>
                      <div class="PA3Hl">
                          <button onclick="formSubmit()" class="sub-btn">Save</button>
                      </div>
                  </div>
              </header>
          </div>
          <main>
              
              
              
              
              
              
              
              
              
              <div class="_145UW _3n3Aw">
                      <div class="_2rDUu _3roIJ">
                          <button id="bbiid" class="_2H2-C" onclick="getDetailsOTR()">Details</button>
                          <button id="bbiim" class="" onclick="getmoneyOTR()">Money</button>
                      </div>
                      <div id="successz"></div>

                      
                  <hr>
                 <form action = "/includes/themes/construct/profile/other/insert.php?opt=uploadimage" method = "POST" enctype = "multipart/form-data">
                      <div id="izo-details-photo" class="llcoH">
                          <div class="avatar1" id="uploaded_image"><div class="vnuZ4" style="background-image: url(&quot;<?php echo $mediaServer. $usersession['profile_photo']; ?>&quot;);"></div></div>
                          <div class="Vub7j"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 37" fill="#999" width="28"><path d="M4 4h6V2H4zm39.74 2H38.2A2.64 2.64 0 0 1 36 4.87l-2.49-3.72A2.64 2.64 0 0 0 31.32 0H17.86a2.64 2.64 0 0 0-2.19 1.15l-2.51 3.72A2.64 2.64 0 0 1 11 6H5.26A5.21 5.21 0 0 0 0 11.18v20.66A5.21 5.21 0 0 0 5.26 37h38.48A5.21 5.21 0 0 0 49 31.84V11.18A5.21 5.21 0 0 0 43.74 6zm-5.08 6h-.31a1.58 1.58 0 0 1-1.59-1.57v-.31a1.58 1.58 0 0 1 1.58-1.52h.31a1.58 1.58 0 0 1 1.59 1.57v.31A1.58 1.58 0 0 1 38.66 12zM24.59 33.17A11.12 11.12 0 1 1 35.86 22a11.21 11.21 0 0 1-11.27 11.17zm0-19.82a8.71 8.71 0 1 0 8.82 8.7 8.76 8.76 0 0 0-8.82-8.7z"></path></svg></div>
                          <input type = "file" name = "image" id="myfilefield" />
                      </div>
                  </form>
                  <form action="/includes/themes/construct/profile/other/insert.php?opt=updateprofile" id="frmBox" method="post" onsubmit="return formSubmit();" class="_34kBV">
                    <div id="izo-details" class="izo-details">
                      <div class="_1R5HF _3yovU">
                          <p>Username:</p>
                          <p class="_3lsVB"><?php echo $_SESSION['username']; ?></p>
                      </div>
                        
                       
                        
                        
                        
                      
                        
                        
                        
                        
                        
                     
                      <div class="izomm _1R5HF">
                          <p>Full Name:</p>
                          <input maxlength="40" name="fullname" value="<?php echo $usersession['fullname']; ?>">
                      </div>
                      <div class="_1R5HF TLJYP">
                          <p>Bio:</p>
                          <textarea name="bio" placeholder="Your bio..." rows="6" maxlength="250"><?php echo $usersession['bio']; ?></textarea>
                      </div>
                    </div>
                    <div id="izo-money" class="izo-money" style="display:none;">
                                <div class="izomm _1R5HF">
                                  <p>Message Price: </p>
                                  <input maxlength="40" name="smsprice" value="<?php echo $usersession['smsprice']; ?>">
                                </div>
                                <div class="izomm _1R5HF">
                                  <p>Subscribtion: </p>
                                  <input maxlength="40" name="subscribe" value="<?php echo $usersession['subscribe']; ?>">
                                </div>
                        
                    </div>
                  </form>
                  <div class="_2zvTs"><a class="_16kVD" href="/2257-compliance"></a></div>
              </div>
          </main>
          </div>
    </div>
    
    
    
    
    
    
   
    
    
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript">
    function formSubmit(){
        $.ajax({
            type:'POST',
            url:'/includes/themes/construct/profile/other/insert.php?opt=updateprofile',
            data:$('#frmBox').serialize(),
            success:function(response){
                $('#successz').html(response);
            }
        });
    }
</script>
<script>
function getDetailsOTR(){
    document.getElementById("izo-details").style.display = "block";
    document.getElementById("izo-details-photo").style.display = "block";
    document.getElementById("izo-money").style.display = "none";
    document.getElementById("bbiid").style.background = "#1DA1F2";
    document.getElementById("bbiid").style.color = "white";
    document.getElementById("bbiim").style.background = "white";
    document.getElementById("bbiim").style.color = "#1DA1F2";
}
function getmoneyOTR(){
    document.getElementById("izo-money").style.display = "block";
    document.getElementById("izo-details").style.display = "none";
    document.getElementById("izo-details-photo").style.display = "none";
    document.getElementById("bbiid").style.background = "white";
    document.getElementById("bbiid").style.color = "#1DA1F2";
    document.getElementById("bbiim").style.background = "#1DA1F2";
    document.getElementById("bbiim").style.color = "white";
    
}   
 
document.getElementById('myfilefield').onchange = function() {
  this.form.submit();
};
</script> 
    
    
    
    
</body>
</html>