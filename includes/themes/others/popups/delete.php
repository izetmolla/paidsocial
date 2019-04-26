<div class="YNcdi">
    <div class="INtAP">
        <?php echo $_GET['id']; ?>
        <?php echo $_GET['type']; ?>
        
        <p class="_1vwgT">Deleting...</p>
        <div class="xVhXy">Are you shure you want to continue</div>
        <div class="_3vunz">
            <button  onclick="location.href='/includes/functions/goactions.php?type=<?php echo $_GET['type']; ?>&id=<?php echo $_GET['id']; ?>';">YES</button>
            <button class="" onclick="closeOtherOpt()">NO</button>
        </div>
    </div>
</div>