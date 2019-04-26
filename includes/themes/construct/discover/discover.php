<?php
        session_start();
        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: /login/");
            exit;
        }
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
        include($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/discover/functions.php");

?>
<html lang="en">
    <head>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="UTF-8">
  <title>Search - PaidSocial</title>
    <link href="/assets/css/main.css?bea0380800bbc82b4556" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/24.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/14.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/10.css">
    </head>
<body style="overflow: &quot;&quot;; touch-action: auto">
  <div id="root">
      <div id="app">
          <div id="others-content"></div>
          <div class="_-9ST1">
              <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                  <div class="-xfRj">
                      <?php getTopUserRanked(); ?>
                      <div class="_21GEl" style="justify-content: center;">
                          <a class="_2YrMF" href="/"></a>
                      </div>
                      <div class="PA3Hl">
                          <div onclick="location.href='/shop/';" class="_3JlkE"><p>My Coins</p><p class="mFA_6"><?php echo $koinsat; ?></p></div>
                          <button class="_309Cw"  onclick="logedMainMenu()"></button>
                      </div>
                  </div>
              </header>
          </div>
          <?php getUserSlider(); ?>
          <main>
              <div class="_3RAJL" style="display:block;flex:0!important;">
              <header>
                <input class="lku4J" placeholder="Search" autocapitalize="off" value="" type="text" id="search">
              </header>
              </div>
              <div class="_24c6w">
                  <div class="izo-content-search">
                      <div id="display"></div>     
                  </div>
                  <div class="izo-content">
                      
                      
                      
                      
<div id="load_data"></div>
<div id="load_data_message"></div>
                      
                      
                      
                      
                  </div>
              </div>
          </main>
          <?php get_footer(); ?>
      </div>
    </div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery.inview.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
<script type="text/javascript">
function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display').hide();
}
$(document).ready(function() {
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("<style>.izo-content{display:block;}</style>");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               url: "<?php echo $weburl .'/includes/themes/construct/discover/discoverkey.php'; ?>",
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
});
</script>
<script>
$(document).ready(function(){
 var limit = 12;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start){
  $.ajax({
   url:"/includes/themes/construct/discover/datadiscover.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data){
    $('#load_data').append(data);
    if(data == ''){
         $('#load_data_message').html("<center><br><b>No More Users</b></center>");
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