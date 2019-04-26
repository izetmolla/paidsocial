<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
      require_once($_SERVER['DOCUMENT_ROOT'] . "/chat/chatlist/functions.php");
?>
<html lang="en"><head>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="google-site-verification" content="UVw2LFv1FrGgAWk085upB83RZi5AqjlJZ8NWWXLdThI">
  <meta charset="UTF-8">
  <title>Chat</title>
    <link href="/assets/css/main.css?482092f8c2bb3215a771" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/10.css">
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
                          <p class="_2vADb">Chats</p>
                      </div>
                      <div class="PA3Hl">
                          <div onclick="location.href='/shop/';" class="_3JlkE"><p>My Coins</p><p class="mFA_6"><?php echo $koinsat; ?></p></div>
                          <button class="_309Cw" onclick="getotheropt('/includes/themes/others/mainmenu/headermenu.php')"></button>
                      </div>
                  </div>
              </header>
          </div>
          <?php getUserSlider(); ?>
          <main>
              <div class="_3RAJL" style="display:block;flex:0!important;">
                      <header>
                              <input class="lku4J" placeholder="Search" placeholder="Search" autocapitalize="off" value="" type="text" id="search">
                              <button class="RXoSK" onclick="deleteMessagesChat()"></button>
                    </header>
              </div>
              <div class="_3RAJL" style="display:block">
                  <ul style="position: relative;">
                      <div style="">
                          <div style="box-sizing: border-box; direction: ltr; height: auto; position: relative; width: 100%; will-change: transform; overflow: hidden auto;">
                              <div style="width: auto; min-height: 65px; overflow: hidden; position: relative;">
                                  <div id="messageChatcheckBox" style="display:none"><style> .aaaizoo{display:none!important;} </style></div>
                                  <div id="display"></div>
                                  
                                  <div class="smss">
                                  <?php getMessagesListal($_SESSION['id']); ?>
                                  </div>
                               
                                  
                             
                           
                                  
                                  
                                  
                                  
                                  
                                  </div>
                          </div>
                      </div>
                  </ul>
                  
              </div>
          </main>
          <?php get_footer(); ?>
</div>
    </div>

<script src="/assets/js/jquery.min.js"></script>
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
           $("#display").html("<style>.smss{display:block;}</style>");
       }
       //If name is not empty.
       else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               type: "POST",
               url: "<?php echo $weburl .'/includes/themes/construct/chat/messagelist/search.php'; ?>",
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
</body>
</html>