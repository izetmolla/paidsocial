<html lang="en"><head>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="google-site-verification" content="UVw2LFv1FrGgAWk085upB83RZi5AqjlJZ8NWWXLdThI">
  <meta charset="UTF-8">
  <title>Upload - <?php echo $usersession['username']; ?></title>
    <link href="/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/24.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/14.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/1.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/7.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/29.css">
    
<script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "insertmedia.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
    </head>
    
    
    
    
    
    
<body style="overflow: &quot;&quot;; touch-action: auto">
  <div id="root">
      <div id="others-content"></div>
      <div id="app">
          <div class="_-9ST1">
              <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                  <div class="-xfRj">
                      <div class="_3RMaK">
                          <button onclick="location.href='/';" class="q2020">Back</button>
                      </div>
                      <div class="_21GEl" style="justify-content: center;">
                          <p class="_2vADb">Upload</p>
                      </div>
                      <div class="PA3Hl">
                            <button class="_309Cw"  onclick="getotheropt('/includes/themes/others/mainmenu/headermenu.php')"></button>
                      </div>
                  </div>
              </header>
          </div>
        
          <main>
              <div id="msg" class="_145UW _3n3Aw">
                  <div class="_34kBV">  
                      
                    <div class="_2rDUu _3roIJ">
                      <button class="_2H2-C">Photo</button>
                      <button class="">Video</button>
                  </div>
                      <hr>
                      <div class="upcontent">
                      
                              
                          
                          
                          
                          <form id="upload_form" enctype="multipart/form-data" method="post">
                              <input type="file" name="file1" id="file1" required><br><br>
                              <input type="button" value="Upload File" onclick="uploadFile()"><br><br>
                              <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                              <h3 id="status"></h3>
                              <p id="loaded_n_total"></p>
                            </form>
                         
                          
                          
                          
                          
                          
                          
                          
                          
                      
                      
                      
                      </div>
                  </div>
                  
              </div>
          </main>          
          <?php get_footer(); ?>
          </div>
    </div>  
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>