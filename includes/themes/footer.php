<?php   $myiddd = $_SESSION['id'];
        $messages = getMessagesCount($myiddd);
        if($messages == 0){$msg = '';}else{$msg = '<div class="_3U0rh">'.$messages.'</div>';}

?>
<footer style="background-color: rgb(32, 64, 128);">
              <nav class="_6_bPx">
                  <ul class="_8SoN9">
                      
                      <li><a class="_3Z4vK" href="/uploadmedia/">Upload</a></li>
                      <li><a class="j-0Lv" aria-current="page" href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61 54" class="_2SjMs"><path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" d="M30.5 1.5l-29 26h6v25h17v-18h12v18h17v-25h6l-29-26z"></path></svg></a></li>
                      
                      <li><a href="/chat/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 59.77" class="_1zH6z"><path d="M27.5 1.5c-14.36 0-26 10.5-26 23.35s11.64 23.35 26 23.35c.67 0 1.33 0 2-.07l-.08.07a28.29 28.29 0 0 1-5.09 10.07C40.12 52.14 53.5 41.56 53.5 24.85 53.5 12 41.86 1.5 27.5 1.5z"></path><path d="M27.5 1.5c-14.36 0-26 10.5-26 23.35s11.64 23.35 26 23.35c.67 0 1.33 0 2-.07l-.08.07a28.29 28.29 0 0 1-5.09 10.07C40.12 52.14 53.5 41.56 53.5 24.85 53.5 12 41.86 1.5 27.5 1.5z" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"></path></svg><div id="getAllMessagesFooter"><?php echo $msg; ?></div></a></li>
                      
                      <li><a href="/discover/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.5 43.5" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" fill="#0857a6" class="R6keN"><circle class="cls-1" cx="17.5" cy="17.5" r="16.5" stroke-width="2"></circle><path class="cls-2" fill-opacity=".35" stroke-width="4" d="M30 30l11.5 11.5"></path></svg></a></li>
                      
                      <li><a href="/<?php echo $usersession['username']; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 54" class="_3Dd4I"><path d="M36.5 12.64c0 9.2-5.15 13.86-11.5 13.86s-11.5-4.66-11.5-13.86C13.5 6.46 17.61 1.5 25 1.5s11.5 4.96 11.5 11.14zM25 32.5C9.86 32.5 1.5 39 1.5 47a5.61 5.61 0 0 0 5.76 5.5h35.48A5.61 5.61 0 0 0 48.5 47c0-8-8.36-14.5-23.5-14.5z" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"></path></svg></a></li>
                  
                  </ul>
              </nav>
</footer>