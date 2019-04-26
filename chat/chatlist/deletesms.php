<div class="YNcdi">
    <div class="INtAP">
        <p class="_1vwgT">Delete Chat</p>
        <div class="xVhXy">
            Do you want to delete chat with <strong><?php echo $_GET['type']; ?></strong>?
            </div>
            <div class="_3vunz">
                <form></form>
                <button class="" onclick="closeOtherOpt()">No</button>
                <button class="" onclick="location.href='/chat/chat-action.php?act=sms&id=<?php echo $_GET['id']; ?>';"">Yes</button>
            </div>
    </div>
</div>