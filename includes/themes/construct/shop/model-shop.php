<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
      <base href="/">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      
      <title>PaidSocial - Shop</title>
        <link href="/assets/css/main.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/css/18.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
    </head>
<body style="overflow: &quot;&quot;; touch-action: auto">
  <div id="root">
      <div id="others-content"></div>
      <div id="app">
          <div class="_-9ST1">
              <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                  <div class="-xfRj">
                      <?php getTopUserRanked(); ?>
                      <div class="_21GEl" style="justify-content: center;">
                          <p class="_2vADb">Store</p>
                      </div>
                      <div class="PA3Hl">
                          <div class="_3JlkE">
                              <p>My Coins</p>
                              <p class="mFA_6"><?php echo $koinsat; ?></p>
                          </div>
                          <button class="_309Cw" onclick="logedMainMenu()"></button>
                      </div>
                  </div>
              </header>
          </div>
          <main>
              
              <div class="_1Q5IP">
                  <div class="DIw4d">You currently have <div>
                      
                      <?php 
                      
                            
                      ?>
                      
                      
                      <div class="" style="text-align: right;"><?php echo $usersession['coins']; ?></div>
                      </div>
                  </div>
<style>
.other-bbb button{
       width: auto;
       margin: 0 10px;
   }
</style>
                  <div class="other-bbb grid-c2-50">
                      <button onclick="getEnterCoupons()" type="primary">Enter Coupon</button>
                       <button onclick="getFreeCoins()" type="primary">Free Coins</button>
                  </div>
                  <form method="GET" action="/pay/buyCoins.php?userid=<?php echo $_session['username']; ?>">
                  <div class="_2pgEE">
                      <ul>
                          
                          <li><input type="radio" name="paymentOption" value="creditCard" checked="checked"><p>Credit Card</p><div class="_3YLoG"><div class="_3EPxH"></div><div class="_1Q0hd"></div><div class="S_rhl"></div><div class="_1Y9Hr"></div><div class="_2Wa_R"></div></div></li>
                         
                      </ul>
                  </div>
                  <ul class="XmM1F">
                      <li class=""><p class="_1W0Hp">150,000</p><p>(~0.001 € per coin)</p><button type="primary" name="price" value="7">$150.00</button></li>
                      
                      <li class=""><p class="_1W0Hp">99,990</p><p>(~0.001 € per coin)</p><button type="primary" name="price" value="6">$99.99</button></li>
                      
                      <li class=""><p class="_1W0Hp">49,990</p><p>(~0.001 € per coin)</p><button type="primary" name="price" value="5">$49.99</button></li>
                      
                      <li class=""><p class="_1W0Hp">23,100</p><p>(~0.00108 € per coin)</p><button type="primary" name="price" value="4">$24.99</button></li>
                      
                      <li class=""><p class="_1W0Hp">7,800</p><p>(~0.00128 € per coin)</p><button type="primary" name="price" value="3">$9.99</button></li>
                      
                      <li class=""><p class="_1W0Hp">3,800</p><p>(~0.00131 € per coin)</p><button type="primary" name="price" value="2">$4.99</button></li>
                      
                      <li class=""><p class="_1W0Hp">1,300</p><p>(~0.00153 € per coin)</p><button type="primary" name="price" value="1">$1.99</button></li>
                      <li class="cdo6P"><p><a href="mailto:payment@<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>" target="_blank">24/7 Billing Support (Other Payment Methods)</a></p></li>
                      <li class="_1gXc1"><p class="_1RXrm">🔒 This is a secure 256 bit SSL encrypted payment</p></li>
                  </ul>
                  </form>
              </div>
              <a class="_16kVD" href="/2257-compliance"></a>

          </main>
<?php get_footer(); ?>
       </div>
    </div>
<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
</body>
</html>