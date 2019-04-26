<?php 
        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/home/functions.php");
            $sql = "SELECT * FROM followzone WHERE sender_id='".$_SESSION['id']."'";
            $following = mysqli_num_rows(mysqli_query($link, $sql));
            if($following == 0){
                header("Location: /discover/");
            } ?>
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
          <?php getUserSlider(); ?>          
          <main>
              <div class="_3TcUR">
                  <ul>
                 <div class="izo-content">
<div id="load_data"></div>
<div id="load_data_message"></div>    
                  </div>
                      
                  </ul>
              </div>
          </main>

          <?php get_footer(); ?>
      </div>
    </div>   
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery.inview.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
<script>
$(document).ready(function(){
 var limit = 9;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start){
  $.ajax({
   url:"/includes/themes/construct/home/homedata.php",
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