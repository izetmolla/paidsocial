<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/profile/functions.php"); ?>
<html lang="en">
    <head>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="UTF-8">
  <title><?php echo $user['username']; ?> - PaidSocial</title>
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
                      <div class="_3RMaK">
                          <a href="/"><button class="q2020">Back</button></a>
                      </div>
                      <div class="_21GEl" style="justify-content: center;">
                          <a class="_2YrMF" href="/"></a>
                      </div>
                      <div class="PA3Hl">
                          <div class="_3JlkE">
                              <p>My Coins</p>
                              <p class="mFA_6"><?php echo $koinsat; ?></p>
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
                                      <div class="vnuZ4" style="background-image: url(&quot;<?php echo $mediaServer. $user['profile_photo']; ?>&quot;);"></div>
                                            <?php if($user['user_lastseen'] > time()){echo '<div class="_4pa1l _6pC2x"></div>';} ?>
                                  </div>
                              </div>
                              <div class="_2Fc3c">
                                  <div class="_2HRoL">
                                      
                                                <center><p class="_3-h_O"><?php echo $user['username']; ?></p></center>
                                      
                                      <div class="_3M-s6">
                                          <div class="_2RUgu">                                              
                                              <button onclick="window.location.href='/chat/<?php echo $user['username']; ?>/'"><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMCAzMi4zMyI+CiAgPHBhdGggZD0iTTE1LDBDNi43MiwwLDAsNiwwLDEzLjQ3UzYuNzIsMjYuOTQsMTUsMjYuOTRjLjM5LDAsLjc3LDAsMS4xNi0uMDVsLS4wNS4wNWExNi4xLDE2LjEsMCwwLDEtMi4yMyw0Ljg1LjM0LjM0LDAsMCwwLC40MS41MUMyMi45LDI4LjcxLDMwLDIyLjcxLDMwLDEzLjQ3LDMwLDYsMjMuMjgsMCwxNSwwWiIgZmlsbD0iIzhmOWZiZiIvPgo8L3N2Zz4K">Chat</button>
                                          </div>
                                          <div class="_2RUgu">
                                              <button onclick="getotheropt('/includes/themes/others/popups/sendtips.php')">
                                                  <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgMzQgMzQiPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iODJlN2JhMjAtMzY0Mi00ZTdhLTg2ZjEtYzc5YzZmZTU5Y2M2IiB4MT0iNC45OCIgeTE9IjQuOTgiIHgyPSIyOS4wMiIgeTI9IjI5LjAyIiBncmFkaWVudFRyYW5zZm9ybT0idHJhbnNsYXRlKDE3IC03LjA0KSByb3RhdGUoNDUpIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZkNzY2Ii8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZmY4MDAwIi8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9ImVmNWUyYjJjLWRjMmUtNDk2Ny04OThhLWQ5NGIxZDYyZTA0MSIgeDE9IjI4LjMxIiB5MT0iMjguMzEiIHgyPSI1LjY5IiB5Mj0iNS42OSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZjMCIvPjxzdG9wIG9mZnNldD0iMC4yNSIgc3RvcC1jb2xvcj0iI2ZhMCIvPjxzdG9wIG9mZnNldD0iMC43NSIgc3RvcC1jb2xvcj0iI2ZjMCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZhMCIvPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IGlkPSJhOWRmMTI3ZS0xNmRmLTRkNzctOWFiMi05MTYyZmVmMmQxMjgiIHgxPSIyNi4xOSIgeTE9IjI2LjE5IiB4Mj0iNy44MSIgeTI9IjcuODEiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmZmU3YTYiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNmZjgwMDAiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iOTE2MmMyODYtMDZhMi00N2I3LThhNmEtNmU4ZGI2YjhiOGI3IiB4MT0iOC41MSIgeTE9IjguNTEiIHgyPSIyNS40OSIgeTI9IjI1LjQ5IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmIzIi8+PHN0b3Agb2Zmc2V0PSIwLjc1IiBzdG9wLWNvbG9yPSIjZmZkZDc1Ii8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZmZjMDQyIi8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PHRpdGxlPtCg0LXRgdGD0YDRgSAxPC90aXRsZT48ZyBpZD0iZTZkMWFhMTgtOTdlNS00ODNjLWFkYTAtNTI1MGVhYTYwOGQyIiBkYXRhLW5hbWU9ItCh0LvQvtC5IDIiPjxnIGlkPSIzNmVhYzZlMy1mNWYzLTQxNmItYTcyMS1iOTFiNzk5ZDE5ODIiIGRhdGEtbmFtZT0iTGF5ZXIgMiI+PGNpcmNsZSBjeD0iMTciIGN5PSIxNyIgcj0iMTciIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03LjA0IDE3KSByb3RhdGUoLTQ1KSIgZmlsbD0idXJsKCM4MmU3YmEyMC0zNjQyLTRlN2EtODZmMS1jNzljNmZlNTljYzYpIi8+PGNpcmNsZSBjeD0iMTciIGN5PSIxNyIgcj0iMTYiIGZpbGw9InVybCgjZWY1ZTJiMmMtZGMyZS00OTY3LTg5OGEtZDk0YjFkNjJlMDQxKSIvPjxwYXRoIGQ9Ik0yNi4xOSwyNi4xOWExMywxMywwLDEsMSwwLTE4LjM4QTEzLDEzLDAsMCwxLDI2LjE5LDI2LjE5WiIgZmlsbD0idXJsKCNhOWRmMTI3ZS0xNmRmLTRkNzctOWFiMi05MTYyZmVmMmQxMjgpIi8+PGNpcmNsZSBjeD0iMTciIGN5PSIxNyIgcj0iMTIiIGZpbGw9InVybCgjOTE2MmMyODYtMDZhMi00N2I3LThhNmEtNmU4ZGI2YjhiOGI3KSIvPjwvZz48L2c+PC9zdmc+">
                                                  Tip
                                              </button>
                                          </div>
                                          
                                      </div>
                                      
                                              <?php getFollowUnfollowButton(); ?>
                                  </div>
                              </div>
                          </div>
                          <div class="o4egS">
                              <p class="_3-h_O"><?php echo $user['fullname']; ?></p>
                          </div>
                      </div>
                      <div class="o4egS">
                          <div class="_3_yaL _1rduv">
                              <p style="-webkit-line-clamp: 2; max-height: 26px;"><?php echo $user['bio']; ?></p>
                          </div>
                      </div>
                  </div>
                  <div class="xeZnn">
                      <a href="/followers"><p><?php echo $cc = getProfileCount($user['username']); ?></p><p>posts</p></a>
                      <a href="/followers"><p><?php getProfileFollowersCount($user['id']); ?></p><p>followers</p></a>
                      <a href="/following"><p><?php getProfileFollowingCount($user['id']); ?></p><p>following</p></a>
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
   url:"/includes/themes/construct/profile/data/datanormal.php?user=<?php echo $user['username']; ?>",
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