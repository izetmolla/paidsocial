<?php $usersession = chatUsersession($_SESSION['id']); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title><?php echo $user['username']; ?> - Messages</title>
        <link href="/assets/css/main.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/assets/css/31.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/26.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/0.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/24.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/17.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/14.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/6.css">
        <style>
        .chat-container {
          height: 400px;
          overflow: auto;
          -webkit-transform: rotate(180deg);
                  transform: rotate(180deg);
          direction: rtl;
        }
        .chat-container .message {
          -webkit-transform: rotate(180deg);
                  transform: rotate(180deg);
          direction: ltr;
        }
            .EhgvY{
                margin: 10px 10px 10px 0;
            }
            .EhgvY._1KkUH {
                margin: 10px 0 10px 0;
            }
        </style>
        <script>
            function _(el){
                return document.getElementById(el);
            }
            function uploadFile(){
                var file = _("file1").files[0];
                // alert(file.name+" | "+file.size+" | "+file.type);
                var formdata = new FormData();
                formdata.append("file1", file);
                var ajax = new XMLHttpRequest();
                ajax.upload.addEventListener("progress", progressHandler, false);
                ajax.addEventListener("load", completeHandler, false);
                ajax.addEventListener("error", errorHandler, false);
                ajax.addEventListener("abort", abortHandler, false);
                ajax.open("POST", "/chat/chatbox/upload.php?id=<?php echo $user['id']; ?>");
                ajax.send(formdata);
                document.getElementById("barprocc").style.display = "block";
            }
            function progressHandler(event){
                _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
                var percent = (event.loaded / event.total) * 100;
                _("progressBar").value = Math.round(percent);
                _("loaded_n_total").innerHTML = Math.round(percent)+"% uploaded... please wait";
            }
            function completeHandler(event){
                _("others-content").innerHTML = event.target.responseText;
                _("progressBar").value = 0;
                document.getElementById("barprocc").style.display = "none";
            }
            function errorHandler(event){
                _("others-content").innerHTML = "Upload Failed";
            }
            function abortHandler(event){
                _("others-content").innerHTML = "Upload Aborted";
            }
        </script>
    </head>
<body class="" style="overflow: &quot;&quot;; touch-action: auto">
    <div id="root">
    <div id="others-content"></div>
    <div class="YNcdi" id="barprocc" style="display:none;">
                            <div class="INtAP">
                                <p class="_1vwgT">Uploading</p>
                                <div class="xVhXy">
                                    <progress id="progressBar" value="0" max="100" style="width:100%"></progress>
                                    <br id="loaded_n_total">
                                    <br>
                                </div>
                            </div>
    </div>
        <div id="app">
            <div class="_-9ST1">
                <header class="_268MK" style="background-color: rgb(32, 64, 128);">
                    <div class="-xfRj">
                    <div class="_3RMaK">
                    <button onclick="location.href='/chat/';" class="q2020">Back</button>
                    </div>
                    <div class="_21GEl" style="justify-content: center;">
                    <a class="_1aIgu" href="/<?php echo $user['username']; ?>/">
                    <div class="avatar">
                    <div class="vnuZ4" style="background-image: url(&quot;<?php echo $mediaServer. $user['profile_photo']; ?>&quot;);"></div>
                     </div>
                    </a>
                    </div>
                    <div class="PA3Hl">
                    <div onclick="location.href='/shop/';" class="_3JlkE"><p>My Coins</p><p class="mFA_6" id="coins"><?php echo $usersession['coins']; ?></p></div>
                    <button class="_309Cw" onclick="logedMainMenu()"></button>
                    </div>
                    </div>
                </header>
            </div>
            <main>
                <div class="_1g4mY" id="1g4mY">
                <div class="_3HC9z">
                      <?php if($user['user_lastseen'] > time()){
                                echo '<div class="_2L9wO _2lEMk">online</div>';
                            }else{
                                echo '<div class="_2L9wO _1Atkv">offline</div>';
                            }
                      ?>
                      <a class="_2PrdI" href="/<?php echo $user['username']; ?>/"><p><?php echo $user['username']; ?></p></a>
                      <button class="_3Lhvz">Close</button>
                </div>
                <div id="chat-container" class="chat-container"><?php displaySmschat($_SESSION['id'],$user['id'],$user['username']); ?></div>
                <form class="_2_BBP" action="in.php" id="frmBox" method="post" onsubmit="return insertSms();">
                    <div class="_1HdwT">
                    <input type="text" autocorrect="on" autocomplete="off" placeholder="Write message" maxlength="256" value="" name="sms" name="sms" id="sms" required>
                    <?php
                               $cmimisms = $user['smsprice'];
                                if($user['smsprice']){echo'<div class="_3tGTL">Reply<br><i></i>'.$cmimisms.'</div>';}else{} ?>
                    </div>
                    <div class="_99pPF" style="display:block!important;">
                        <div class="grid-c3-33" display="min-height:38px;">
                        <div class="textleft divbtncll"><div onclick="sendTipsOPT()" class="tipcoincc"></div></div>
                        <div class="textcenter divbtncll">
                        <div class="image-upload">
                        <label for="file1">
                        <div class="sendmediacc"></div>
                        </label>
                        <input type="file" name="file1" id="file1" onchange="uploadFile()">
                        </div>
                        </div>
                        <div class="textright"><button type="submit" name="submit" class="sendbuttonbb"></button></div>
                        </div>
                    </div>
                </form>
                </div>
                <form id="upload_form" enctype="multipart/form-data" method="post"></form>
            </main>
        </div>
    </div>
    <script src="/assets/js/jquery.min.js"></script> 
    <script src="/assets/js/main.js"></script> 
    
    
<script>
    //Display Sms List
    displayChatContent(<?php echo $user['id']; ?>);
    //Send Messages
    function insertSms(insertid){
        var insertid;
            $.ajax({
                type:'POST',
                url: '/chat/<?php echo $user['id']; ?>/send/',
                data:$('#frmBox').serialize(),
                success:function(response){
                $('#others-content').html(response);
                document.getElementById("others-content").style.display = "block";
                window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
                refreshcoins();
            }

            });
            var form=document.getElementById('frmBox').reset();
            return false;
    }
    
    //Display Messages  prepend
    function displayChatContent(id){
    setInterval(function () {
        var chatcontent;
        $.get('/chat/<?php echo $user['id']; ?>/display/', function(chatdata){
            chatcontent= chatdata;
            $('#chat-container').prepend(chatcontent);
        });
    }, 1000);
    }
    //Chat container Size
    var pz = $("#1g4mY");
    $("#chat-container").height(pz.innerHeight())



</script>
</body>
</html>