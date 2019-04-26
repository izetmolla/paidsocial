
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="UTF-8">
  <title><?php echo $user['username']; ?> on PaidSocial</title>
    <link href="/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/1.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/7.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/666.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/26.css">
</head>
<body style="overflow: &quot;&quot;; touch-action: auto">
  <div id="root">
      <div id="others-content"></div>
      <div id="app">
          <main>
              <div class="_2DywC">
                  <div class="_1k8PH">
                      
                      
                      <header class="sc-hqyNC jdJMzG">
                          <div class="sc-jbKcbu fqqrDb">
                              <div class="sc-dNLxif eWFHRC">
                                  <a class="_2YrMF" href="/"></a>
                              </div>
                              <nav class="sc-hmzhuo bCSqkt">
                                  <ul class="sc-frDJqD frMwNb">
                                      <li class="sc-kvZOFW IInWs"><a href="/terms-and-conditions">Terms and Conditions</a></li>
                                      <li class="sc-kvZOFW IInWs"><a href="/privacy-policy">Privacy Policy</a></li>
                                      <li class="sc-kvZOFW IInWs"><a href="/help">Help</a></li>
                                      <li class="sc-kvZOFW IInWs"><a href="https://<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>" target="_blank">PaidSocial Sign Up</a></li>
                                  </ul>
                              </nav>
                              <button onclick="loginOPT()" type="button" class="sc-ksYbfQ bFfICo">Log In</button>
                              <button onclick="notLogedMenuPT()" aria-label="Open menu" class="sc-jqCOkK bhWGVI"></button>
                          </div>
                      </header>
                      
                      
                      
                      <div class="sc-kafWEX dqVKry">
                          <div class="sc-feJyhm fiVuOE"></div>
                          <div class="sc-iELTvK bIDVLi">
                              <div class="sc-cmTdod iGNZbs">
                                  <img src="<?php echo $mediaServer. $user['profile_photo']; ?>" alt="glamorousgirls avatar" class="sc-btzYZH AMHnc">
                                  <div class="sc-jwKygS iopSTp"></div>
                              </div>
                              <h1 class="sc-lhVmIH fSsZxz"><?php echo $user['username']; ?></h1>
                          </div>
                      </div>
                      <div class="sc-bYSBpT UKaeP">
                          <div class="sc-dqBHgY kcveKh">
                              <div class="sc-gxMtzJ erWeJU">
                                  <div onclick="loginOPT()" class="sc-dfVpRl jfAojO">Chat</div>
                                  <button onclick="loginOPT()" type="button" class="sc-ksYbfQ cfbpzg">Follow</button>
                                  <div onclick="loginOPT()" class="sc-hwwEjo kYWAqs">Tip</div>
                              </div>
                          </div>
                          <div class="sc-kPVwWT gyAtcq">
                              <div class="sc-kfGgVZ eSqtez">12 Posts</div>
                              <div class="sc-esjQYD hNQdxM"></div>
                          </div>
                          <div class="sc-elJkPf brJqqS">
                              <button onclick="registerOPT()" type="button" class="sc-ksYbfQ bFfICo">Free sign up</button>
                              <p onclick="loginOPT()" class="sc-jtRfpW fAIXtP">Already have an account? <button class="sc-kTUwUJ inJOZa">Login Here</button></p>
                          </div>
                      </div>
                      
                      <footer class="sc-uJMKN kDogBp">
                          <div class="sc-bbmXgH hrhIdS">
                              <div class="sc-dNLxif sc-gGBfsJ jGQQSo">
                                  <a href="/"><img src="/assets/img/a033483badb8cde9096c93837b7affdc.svg" alt="PaidSocial"></a>
                              </div>
                              <ul class="sc-jnlKLf dFsEbz">
                                  <li class="sc-fYxtnH frnrQT"><a href="/terms-and-conditions">Terms &amp; Conditions</a></li>
                                  <li class="sc-fYxtnH frnrQT"><a href="/privacy-policy">Privacy Policy</a></li>
                                  <li class="sc-fYxtnH frnrQT"><a href="/help">Help</a></li>
                                  <li class="sc-fYxtnH frnrQT"><a href="https://applicationsignup.com/members/a_register.php?site=PaidSocial" target="_blank">PaidSocial Application</a></li>
                              </ul>
                              <ul class="sc-tilXH tZYgD">
                                  <li class="sc-hEsumM cAbnyZ"><a href="https://twitter.com/thePaidSocial" target="_blank"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOS44NTggOS45MjljMCA1LjQ4My00LjQ0NSA5LjkyOS05LjkyOSA5LjkyOVMwIDE1LjQxMiAwIDkuOTI4QzAgNC40NDYgNC40NDUgMCA5LjkzIDBzOS45MjkgNC40NDUgOS45MjkgOS45Mjl6bS01LjIxLTIuNDJjLjQ4LS4wNTcuOTM3LS4xODUgMS4zNjMtLjM3My0uMzE4LjQ3Ni0uNzIuODkzLTEuMTg1IDEuMjI4LjAwNS4xMDEuMDA3LjIwNC4wMDcuMzA3IDAgMy4xMzYtMi4zODcgNi43NTMtNi43NTIgNi43NTNhNi43MTMgNi43MTMgMCAwIDEtMy42MzgtMS4wNjcgNC43ODQgNC43ODQgMCAwIDAgMy41MTQtLjk4MiAyLjM3NiAyLjM3NiAwIDAgMS0yLjIxNy0xLjY0OSAyLjM3NyAyLjM3NyAwIDAgMCAxLjA3MS0uMDQgMi4zNzUgMi4zNzUgMCAwIDEtMS45MDQtMi4zMjh2LS4wM2MuMzIuMTc5LjY4Ny4yODUgMS4wNzUuMjk3YTIuMzczIDIuMzczIDAgMCAxLS43MzQtMy4xNjggNi43MzcgNi43MzcgMCAwIDAgNC44OTIgMi40OCAyLjM3NCAyLjM3NCAwIDAgMSA0LjA0NC0yLjE2NSA0Ljc1MSA0Ljc1MSAwIDAgMCAxLjUwNy0uNTc2IDIuMzggMi4zOCAwIDAgMS0xLjA0MyAxLjMxM3oiIGZpbGw9IiNmZmYiIG9wYWNpdHk9Ii45Ii8+Cjwvc3ZnPg==" alt="Twitter" class="sc-ktHwxA divKrB"></a></li>
                                  <li class="sc-hEsumM cAbnyZ"><a href="https://instagram.com/thePaidSocial" target="_blank"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDMiIGhlaWdodD0iNDMiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHBhdGggZmlsbD0ibm9uZSIgZD0iTS0xLTFoNDV2NDVILTF6Ii8+CiAgPGc+CiAgICA8cGF0aCBkPSJNLTEtMWg1ODJ2NDAySC0xVi0xeiIgZmlsbD0ibm9uZSIvPgogICAgPHBhdGggZD0iTTQyLjkzMiAyMS40MDJhMjEuNTggMjEuNTggMCAwIDEtNi4yMTkgMTUuMTgzIDIxLjM4MSAyMS4zODEgMCAwIDEtMTUuMTgyIDYuMjc5Yy01LjkxNSAwLTExLjI4LTIuMzc3LTE1LjE4My02LjI3OVMuMDY4IDI3LjMxNy4wNjggMjEuNDAyYzAtNS45MTQgMi4zNzgtMTEuMjggNi4yOC0xNS4xODNBMjEuNTg3IDIxLjU4NyAwIDAgMSAyMS41MzEgMGM1LjkxNSAwIDExLjI4IDIuMzc4IDE1LjE4MiA2LjIxOWEyMS41ODYgMjEuNTg2IDAgMCAxIDYuMjE5IDE1LjE4M3ptLTI0LjE0NS00LjI2N2E0LjkyIDQuOTIgMCAwIDEgMi44NjUtLjk3NmMxLjAzOCAwIDIuMDczLjM2NSAyLjg2Ni45NzZoNy42MjN2LTEuNDY0YzAtMi45MjctMi4zNzktNS4zMDUtNS4zNjctNS4zMDVIMTYuMjg3Yy0yLjg2NiAwLTUuMjQ0IDIuMzc4LTUuMjQ0IDUuMzA1djEuNDY0aDcuNzQ0em03LjUgMS44ODljLjMwNS43MzEuMzY1IDEuNDY0LjM2NSAyLjE5NSAwIDIuODA1LTIuMjU2IDUuMDYxLTUgNS4wNjEtMi42ODMgMC00Ljk5OS0yLjI1Ni00Ljk5OS01LjA2MSAwLS43OTMuMjQzLTEuNDY0LjQ4Ny0yLjE5NWgtNi4wOTh2Ny4zMTdjMCAyLjg2NSAyLjM3OCA1LjI0NCA1LjI0NCA1LjI0NGgxMC42MWMyLjkyNiAwIDUuMzA1LTIuMzc5IDUuMzA1LTUuMjQ0di03LjMxN2gtNS45MTR6bS00LjU3NC4wNjJjLTEuMDk4IDAtMi4xMzQgMS4wMzYtMi4xMzQgMi4xMzQgMCAxLjE1OCAxLjAzNiAyLjAxMiAyLjEzNCAyLjAxMi41NDkgMCAxLjAzNy0uMTg0IDEuNDAyLS41NDkuNDI4LS40MjcuNjcyLS45MTUuNjcyLTEuNDYzIDAtMS4wOTgtLjk3Ni0yLjEzNC0yLjA3NC0yLjEzNHptNC44NzktMy4xMTFjLS4zMDUgMC0uNTQ5LS4xODMtLjU0OS0uNTQ5di0xLjgyOWMwLS4zMDUuMjQ0LS41NDkuNTQ5LS41NDloMS44MjhjLjI0NCAwIC40ODguMjQ0LjQ4OC41NDl2MS44MjljMCAuMzA2LS4xODQuNTQ5LS40ODguNTQ5aC0xLjgyOHoiIGZpbGw9IiNmZmYiLz4KICA8L2c+Cjwvc3ZnPgo=" alt="Instagram" class="sc-ktHwxA divKrB"></a></li>
                              </ul>
                              <p class="sc-cIShpX gwrDMn">PaidSocial Copyright 2019. All Rights Reserved.</p>
                          </div>
                      </footer>
                  </div>
              </div>
              
              
              
              
          </main>
            </div>
        </div>
    
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
<?php



$ipllog = getSomeIp($_SERVER['REMOTE_ADDR']);
if($ipllog > 0){
}else{
echo '<script>
    window.onload = registerPromotionOPT();
</script>'; 
}
?>
    </body>
</html>