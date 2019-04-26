<?php 
        $userdetails = getUserDetailsByUsername($mediapost['media_user']);
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>PaidSocial</title>
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
                      <div class="_3DDKW">
                          <a class="_3nbcs" href="/<?php echo $mediapost['media_user']; ?>">
                              <div class="avatar">
                                  <div class="vnuZ4" style="background-image: url(&quot;<?php echo $mediaServer. $userdetails['profile_photo']; ?>&quot;);"></div>
                              </div>
                              <div>
                                  <p class="_29RVJ"><?php echo $mediapost['media_user']; ?></p>
                                  <p class="_1Q58W"></p>
                              </div>
                          </a>
                          <button>Following</button>
                      </div>
                      <div class="_2YonX"><p><?php echo timeAgo($mediapost['time']); ?></p></div>
                  </header>
                  <div class="_2zLM1">
                      <div class="_1S9rk _2bMH0" style="background-image: url(&quot;<?php echo $mediaServer. $mediapost['media_url']; ?>&quot;);">
                          <div onclick="getotheropt(&quot;/getfullmedia/<?php echo $mediapost['id'] ?>/&quot;)" class="_1hEuQ"></div>
                      </div>
                  </div>
                  <div class="To4uG">
                      <p><?php echo $mediapost['media_title']; ?></p>
                      <a class="UsDma" href="/chat/<?php echo $mediapost['media_user']; ?>"></a>
                  </div>
              </div>
          </main>
      
      
      
<?php get_footer(); ?>
      
  </div>
    </div>
    
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>