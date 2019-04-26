<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/functions.php");  ?>
<html lang="en"><head>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="UTF-8">
  <title><?php echo $_SESSION['username']; ?> - PaidSocial</title>
    <link href="/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/1.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/7.css">
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
                          <a class="_2YrMF" href="/"></a>
                      </div>
                          <div class="PA3Hl">
                              <div class="ym-3d">
                                <button onclick="location.href='/account/edit/';" class="_22gWz"></button>
                              </div>
                          <button class="_309Cw"  onclick="getotheropt('/includes/themes/others/mainmenu/headermenu.php')"></button>
                      </div>
                  </div>
              </header>
          </div>
          <main>
              <div class="_145UW">
                  <div class="_1zU3Y">
                      <div class="_2CL8h">
                          <div class="o4egS">
                              <div class="_1H5aS _1JGlB">
                                  <div class="avatar hndbM">
                                      <div class="vnuZ4" style="background-image: url(&quot;<?php echo $mediaServer. $usersession['profile_photo']; ?>&quot;);"></div>
                                      <?php if($user['user_lastseen'] > time()){echo '<div class="_4pa1l _6pC2x"></div>';} ?>
                                  </div>
                              </div>
                              <div class="_2Fc3c">
                                  <div class="_2HRoL1">
                                    <div class="grid-c3-33 tc cb">
                                        <a href="/followers"><p>Tips Cash</p><p><i class="_3JlkE"></i></p><p><?php echo $usersession['coins']; ?></p></a>
                                              <a href="/following"><p>Subscribtion</p><p>following</p><p>0$</p></a>
                                              <a href="/followers"><p>Partner%</p><p>0$</p><p>0$</p></a>
                                          </div>
                                  </div>   
                                  <button class="_3udml">Rendem</button>
                              </div>
                          </div>
                          <div class="o4egS">
                              <p class="_3-h_O"><?php echo $_SESSION['username']; ?></p>
                              <p><?php echo $usersession['fullname']; ?></p>
                          </div>
                      </div>
                      <div class="o4egS">
                          <div class="_3_yaL _1rduv">
                              <p style="-webkit-line-clamp: 2; max-height: 26px;"><?php echo $usersession['bio']; ?></p>
                          </div>
                      </div>
                  </div>
                  <div class="xeZnn">
                      <a href="/followers"><p><?php echo $cc = getProfileCount($user['username']); ?></p><p>posts</p></a>
                      <a href="/followers"><p><?php getProfileFollowersCount($user['id']); ?></p><p>followers</p></a>
                      <a href="/following"><p><?php getProfileFollowingCount($user['id']); ?></p><p>following</p></a>
                      <a href="/subscriptions"><p>0</p><p>subscriptions</p></a>
                  </div>
                  <div class="_2rDUu _3roIJ">
                      <button class="_2H2-C">Wall</button>
                      <button class="">Subscription</button>
                  </div>
                  <div class="Xy4Nm">
                      <div class="_2IaJu">
                          <ul>
                              
                                 <div id="load_data"></div>
                                 <div id="load_data_message"></div>
                          
                          </ul>
                      </div>
                  </div>
              </div>
          </main>
          
<?php get_footer(); ?>
      </div>
    </div>
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
 <script>
$(document).ready(function(){
 var limit = 9;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start){
  $.ajax({
   url:"/includes/themes/construct/profile/data/mydatamodel.php?username=<?php echo $_GET['username']; ?>",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data){
    $('#load_data').append(data);
    if(data == ''){
         $('#load_data_message').html("<center><br><b>No More Posts</b></center>");
         action = 'active';
    }else{
     $('#load_data_message').html("<br><div class='_8In1k _2MCGl'><div></div><div></div><div></div><div></div></div>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive'){
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>
</body>
</html>