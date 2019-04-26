<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>Edit Post - PaidSocial</title>    
        <link href="/assets/css/main.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/26.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/24.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/14.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/1.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/7.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/29.css">
        <style>
          ._1S9rkal{
                padding-bottom: 220px!important;
            }
            ._1R5HF{
                text-align: center;
                display: block;
            }
         
        </style>
    </head>
  <div id="root">
      <div id="others-content"></div>
      <div id="app">
          <div class="_-9ST1">
              <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                  <div class="-xfRj">
                      <div class="_3RMaK">
                          <button  onclick="location.href='/<?php echo $usersession['username']; ?>';" class="q2020">Cancel</button>
                      </div>
                      <div class="_21GEl" style="justify-content: center;">
                          <p class="_2vADb">Edit</p>
                      </div>
                      <div class="PA3Hl">
                          <button onclick="getotheropt('/action/delete/medias/<?php echo $mediapost['id']; ?>/')">Delete</button>
                          <button class="_309Cw"  onclick="getotheropt('/includes/themes/others/mainmenu/headermenu.php')"></button>
                      </div>
                  </div>
              </header>
          </div>
          <main>
              
              <div id="msg" class="_3n3Aw"> 
                          <div class="_37R73">
                              <div class="_2zLM1">
                                  <div class="_1S9rkal _1S9rk _2bMH0" style="background-image: url(&quot;<?php echo $mediaServer. $mediapost['media_url']; ?>&quot;);">
                                      <div class="_1hEuQ"></div>
                                  </div>
                              </div>
                          </div>
                      <hr>
                          
                          
                    <form action="/editmedia.php?mediaid=<?php echo $mediapost['id']; ?>" id="frmBox" method="post" onsubmit="return formSubmit();" class="_34kBV">
                        <div>
                            <div class="grid-c2" style="padding: 0 10px;">
                                <div class="textleft"><b>Status:</b> <?php echo $mediapost['status']; ?></div>
                                <div class="textright">
                                    <button type="submit" name="submit" style="height:30px!important;">Update</button>
                                </div>
                            </div>
                            <hr>
                                    <div class="grid-c2-50" style="padding:0 10px;">
                                        <div class="grid-r2 izomm ">
                                                    <b>Blur Lock</b>
                                                    
<select name="locktype">
  <option value="photo">No</option>
  <option value="photo-blur">Yes</option>
</select>
                                        </div>
                                        <div class="grid-r2 izomm textcenter">
                                            <p>Media Price</p>
                                            <input value="<?php echo $mediapost['media_price']; ?>" name="media_price">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="izomm izooinput _1R5HF">
                                        Post Description
                                        <div class="">
                                            <textarea placeholder="Photo details..." rows="6" name="media_title"></textarea>
                                        </div>
                                        
                                    </div>

                        </div>
                  </form>
                  
                  
              </div>
          </main>
          
                   
          <?php get_footer(); ?>
          </div>
    </div>
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
     <script type="text/javascript">
    function formSubmit(){
        $.ajax({
            type:'POST',
            url:'/editmedia.php?mediaid=<?php echo $mediapost['id']; ?>',
            data:$('#frmBox').serialize(),
            success:function(response){
                $('#others-content').html(response);
            }
        });
        return false;
    }
    
    
    </script>
</html>