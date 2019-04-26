<?php 
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/album/functions.php");
    $media = getAlbumDetailsBySlug($_GET['slug']);
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: /login/");
        exit;
    }
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>Add Album</title>
        <link href="/assets/css/main.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/28.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/24.css">
        
<style>
    
.uploadPhotoIcon {
    padding: 0;
    height: 50px;
    background: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNDc1LjA3OCA0NzUuMDc3IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0NzUuMDc4IDQ3NS4wNzc7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNNDY3LjA4MSwzMjcuNzY3Yy01LjMyMS01LjMzMS0xMS43OTctNy45OTQtMTkuNDExLTcuOTk0aC0xMjEuOTFjLTMuOTk0LDEwLjY1Ny0xMC43MDUsMTkuNDExLTIwLjEyNiwyNi4yNjIgICAgYy05LjQyNSw2Ljg1Mi0xOS45MzgsMTAuMjgtMzEuNTQ2LDEwLjI4aC03My4wOTZjLTExLjYwOSwwLTIyLjEyNi0zLjQyOS0zMS41NDUtMTAuMjhjLTkuNDIzLTYuODUxLTE2LjEzLTE1LjYwNC0yMC4xMjctMjYuMjYyICAgIEgyNy40MDhjLTcuNjEyLDAtMTQuMDgzLDIuNjYzLTE5LjQxNCw3Ljk5NEMyLjY2NCwzMzMuMDkyLDAsMzM5LjU2MywwLDM0Ny4xNzh2OTEuMzYxYzAsNy42MSwyLjY2NCwxNC4wODksNy45OTQsMTkuNDEgICAgYzUuMzMsNS4zMjksMTEuODAxLDcuOTkxLDE5LjQxNCw3Ljk5MWg0MjAuMjY2YzcuNjEsMCwxNC4wODYtMi42NjIsMTkuNDEtNy45OTFjNS4zMzItNS4zMjgsNy45OTQtMTEuOCw3Ljk5NC0xOS40MXYtOTEuMzYxICAgIEM0NzUuMDc4LDMzOS41NjMsNDcyLjQxNiwzMzMuMDk5LDQ2Ny4wODEsMzI3Ljc2N3ogTTM2MC4wMjUsNDIzLjk3OGMtMy42MjEsMy42MTctNy45MDUsNS40MjgtMTIuODU0LDUuNDI4ICAgIHMtOS4yMjctMS44MTEtMTIuODQ3LTUuNDI4Yy0zLjYxNC0zLjYxMy01LjQyMS03Ljg5OC01LjQyMS0xMi44NDdzMS44MDctOS4yMzYsNS40MjEtMTIuODQ3YzMuNjItMy42MTMsNy44OTgtNS40MjgsMTIuODQ3LTUuNDI4ICAgIHM5LjIzMiwxLjgxNCwxMi44NTQsNS40MjhjMy42MTMsMy42MSw1LjQyMSw3Ljg5OCw1LjQyMSwxMi44NDdTMzYzLjYzOCw0MjAuMzY0LDM2MC4wMjUsNDIzLjk3OHogTTQzMy4xMDksNDIzLjk3OCAgICBjLTMuNjE0LDMuNjE3LTcuODk4LDUuNDI4LTEyLjg0OCw1LjQyOGMtNC45NDgsMC05LjIyOS0xLjgxMS0xMi44NDctNS40MjhjLTMuNjEzLTMuNjEzLTUuNDItNy44OTgtNS40Mi0xMi44NDcgICAgczEuODA3LTkuMjM2LDUuNDItMTIuODQ3YzMuNjE3LTMuNjEzLDcuODk4LTUuNDI4LDEyLjg0Ny01LjQyOGM0Ljk0OSwwLDkuMjMzLDEuODE0LDEyLjg0OCw1LjQyOCAgICBjMy42MTcsMy42MSw1LjQyNyw3Ljg5OCw1LjQyNywxMi44NDdTNDM2LjcyOSw0MjAuMzY0LDQzMy4xMDksNDIzLjk3OHoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMTA5LjYzMiwxNzMuNTloNzMuMDg5djEyNy45MDljMCw0Ljk0OCwxLjgwOSw5LjIzMiw1LjQyNCwxMi44NDdjMy42MTcsMy42MTMsNy45LDUuNDI3LDEyLjg0Nyw1LjQyN2g3My4wOTYgICAgYzQuOTQ4LDAsOS4yMjctMS44MTMsMTIuODQ3LTUuNDI3YzMuNjE0LTMuNjE0LDUuNDIxLTcuODk4LDUuNDIxLTEyLjg0N1YxNzMuNTloNzMuMDkxYzcuOTk3LDAsMTMuNjEzLTMuODA5LDE2Ljg0NC0xMS40MiAgICBjMy4yMzctNy40MjIsMS45MDItMTMuOTktMy45OTctMTkuNzAxTDI1MC4zODUsMTQuNTYyYy0zLjQyOS0zLjYxNy03LjcwNi01LjQyNi0xMi44NDctNS40MjZjLTUuMTM2LDAtOS40MTksMS44MDktMTIuODQ3LDUuNDI2ICAgIEw5Ni43ODYsMTQyLjQ2OWMtNS45MDIsNS43MTEtNy4yMzMsMTIuMjc1LTMuOTk5LDE5LjcwMUM5Ni4wMjYsMTY5Ljc4NSwxMDEuNjQsMTczLjU5LDEwOS42MzIsMTczLjU5eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=) center/50px 50px no-repeat;
    border: none;
    border-radius: 0;
}

</style>
        
        
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
	ajax.open("POST", "/includes/themes/construct/album/upload.php?albumid=<?php echo $media['id']; ?>");
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
	$("#photo-album-list").load( "/01.php" );
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
                          <button onclick="location.href='/';" class="q2020" class="q2020">Back</button>
                      </div>
                      <div class="_21GEl" style="justify-content: center;">
                          <a class="_2YrMF" href="/"></a>
                      </div>
                      <div class="PA3Hl">
                          <div class="_3JlkE">
                              <p>My Coins</p>
                              <p onclick="location.href='/shop/';" class="mFA_6"><?php echo $koinsat; ?></p>
                          </div>
                          <button class="_309Cw" onclick="logedMainMenu()"></button>
                      </div>
                  </div>
              </header>
          </div>
          <main>
              <style>
                  
              
              </style>
              <div class="_37R73" style="display:block;">
                  <header>
                    <p>Create Album</p>
                  </header>
                  
                  
                  









<div class="textcenter" style="border-bottom:1px solid black;">
    <form id="upload_form" enctype="multipart/form-data" method="post">
        <div class="image-upload">
            <label for="file1">
            <div class="uploadPhotoIcon"></div>
            </label>
            <input type="file" name="file1" id="file1">
        </div><br>
        <center><button type="button" value="Upload File" onclick="uploadFile()">Upload</button></center><br>
        <center><progress id="progressBar" value="0" max="100" style="width:300px;"></progress></center>
      <h3 id="status"></h3>
      <p id="loaded_n_total"></p>
  </form>
</div> 



<br>

<div id="photo-album-list"></div>
    
   
   
   
   
   
   
   
 
 
 
  
                  
                  
              </div>
          </main>
      
      
      
<?php get_footer(); ?>
      
  </div>
    </div>
    
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>



<script type="text/javascript">
    function insertAlbum(){
        $.ajax({
            type:'POST',
            url:'/includes/themes/construct/album/insert.php',
            data:$('#frmBox').serialize(),
            success:function(response){
                $('#successc').html(response);
            }
        });
        return false;
    }
    </script>
</body>
</html>