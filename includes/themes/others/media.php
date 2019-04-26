<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
$meddddd = getMediaDetailsbyID($_GET['id']);
$editpostlink = "'".'/editpost/'.$meddddd['media_slug']."'";
?>
<div class="_-9ST1 izo-meddd-bl">
    <header class="_268MK GzUIH" style="background-color: black;">
        <div class="-xfRj">
            <div class="_3RMaK"></div>
            <div class="_21GEl" style="justify-content: center;"><p class="_2vADb"></p></div>
            <div class="PA3Hl">
            <?php if($_SESSION['id'] == $meddddd['user_id']){
                    echo '<button class="_22gWz" onclick="location.href='.$editpostlink.';"></button>';
            } ?>
                <button class="_3fYJy"   onclick="closeOtherOpt()"></button>
            </div>
        </div>
    </header>
</div>

    <nav class="_20Eh7 izo-meddd-bl">
            <img class="pswp__img" src="<?php echo $mediaServer .$meddddd['media_url']; ?>" style="display: block; width: 100%; height: auto; max-width: 512px;">
    </nav>
    <div class="photo-btttt izo-meddd-bl">
        <div class="pswp__caption"><div class="pswp__caption__center"><?php echo $meddddd['media_title']; ?></div></div>
    </div>

