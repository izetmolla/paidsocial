<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ ?>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>Help - PaidSocial</title>
    <link href="/assets/css/main.css?1ac323648542f3f3ece0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/27.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/25.css">
    </head>
<body style="overflow: &quot;&quot;; touch-action: auto">
  <div id="root">
    <div id="others-content"></div>
      <div id="app">
          <div class="_-9ST1">
              <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                  <div class="-xfRj">
                      <div class="_3RMaK"></div>
                      <div class="_21GEl" style="justify-content: center;">
                          <p class="_2vADb">Help</p>
                      </div>
                      <div class="PA3Hl">
                          <a class="_3yMdC" href="/login">
                              <span>Login</span>
                          </a>
                          <button onclick="notLogedMenuPT()" class="_309Cw"></button></div></div></header>
          </div>
          <main>
              <br><br>
              <center><h1>help@<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?></h1></center>
          </main>
         </div>
    </div>
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>
<?php } else{ ?>
<html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta charset="UTF-8">
      <title>Home</title>
        <link href="/assets/css/main.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/24.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/17.css"> 
    </head>
    <div id="others-content"></div>
<body style="overflow: &quot;&quot;; touch-action: auto">
  <div id="root">
      <div id="app">
          <div class="_-9ST1">
              <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                  <div class="-xfRj">
                      <?php getTopUserRanked(); ?>
                      <div class="_21GEl" style="justify-content: center;">
                          <a class="_2YrMF" href="/"></a>
                      </div>
                      <div class="PA3Hl">
                          <div onclick="location.href='/shop/';" class="_3JlkE">
                              <p></p>
                              <p class="mFA_6"><?php echo $koinsat; ?></p>
                          </div>
                          <button class="_309Cw" onclick="logedMainMenu()"></button>
                      </div>
                  </div>
              </header>
          </div>
          <main>
              <br><br>
              <center><h1>help@<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?></h1></center>
          </main>
          <?php get_footer(); ?>
         </div>
    </div>
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>
<?php } ?>