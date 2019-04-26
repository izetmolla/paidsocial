<?php 
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/album/functions.php");
    
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
                  
                  
                  
<div id="successc">         
<form action="insert.php" id="frmBox" method="post" onsubmit="return insertAlbum();">
      <input type="text" name="albumtitle" placeholder="Enter Title" required style="border:1px solid black">
       <button type="submit" name="submit">Submit</button>
</form>
</div>    
    
    
                  
                  
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
            url:'/includes/themes/construct/album/insert.php?create',
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