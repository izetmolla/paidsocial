<?php
    function getUserSliderOnline(){
            global $link, $usersession, $mediaServer;
            if($usersession['type'] == 'normal-user'){
                $sql = "SELECT * FROM users WHERE type='model-user' AND user_lastseen>'".time()."' AND NOT id='".$usersession['id']."' ORDER BY user_lastseen DESC";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $ussrrtitle = $row['username'];
                        $ussrrphoto = $mediaServer. $row['profile_photo'];
                        echo '<li class="" style="position: relative; padding-left: 15px;"><a href="/'.$ussrrtitle.'/"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$ussrrphoto.'&quot;);"></div><div class="_4pa1l _6pC2x"></div></div><p>'.$ussrrtitle.'</p></a></li>';
                    }
                } else {
                    echo "No persons Online";
                }

            }else{
            $sql = "SELECT * FROM users WHERE type='normal-user' AND user_lastseen>'".time()."' AND NOT id='".$usersession['id']."' ORDER BY user_lastseen DESC";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                        $ussrrtitle = $row['username'];
                        $ussrrphoto = $mediaServer. $row['profile_photo'];
                        echo '<li class="" style="position: relative; padding-left: 15px;"><a href="/'.$ussrrtitle.'/"><div class="avatar"><div class="vnuZ4" style="background-image: url(&quot;'.$ussrrphoto.'&quot;);"></div><div class="_4pa1l _6pC2x"></div></div><p>'.$ussrrtitle.'</p></a></li>';
                }
            } else {
                echo "No persons Online";
            }

            }

    }
?>
<aside class="ndwOA">
    <ul>
        <div style="overflow: visible; height: 0px; width: auto;">
            <div aria-label="grid" aria-readonly="true" class="ReactVirtualized__Grid" role="grid" tabindex="0" style="box-sizing: border-box; direction: ltr; height: 67px; position: relative; width: auto; will-change: transform; overflow: auto;">
                <div class="ReactVirtualized__Grid__innerScrollContainer" role="rowgroup" style="width: 7025px; height: 65px; max-width: 7025px; max-height: 65px; overflow: hidden; position: relative;"> 
                    <div id="onlineuserslider">
                    <?php getUserSliderOnline(); ?>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</aside>






