<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/main-functions.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/themes/construct/album/functions.php");
$album = getAlbumDetailsBySlug($_GET['slug']);
$allphotos = countAllPhotosonalbum($album['id']);
$idplnji = $_GET['mediaid'] + 1;
$idmnnji = $_GET['mediaid'] - 1;


?>
<html lang="en"><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="UTF-8">
<title><?php echo $album['title']; ?>  - (10 - Photos in Album)</title>

<meta property="og:title" content="<?php echo $album['title']; ?>  - (10 - Photos in Album)">
<meta property="og:type" content="article">
<meta property="og:image" content="">
<meta property="og:url" content="<?php echo $weburl. '/album/'.$_GET['slug']; ?>">
<meta property="og:description" content="Dont Lose this album !">
<link href="/assets/css/main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/assets/css/31.css">
<link rel="stylesheet" type="text/css" href="/assets/css/17.css">
<link rel="stylesheet" type="text/css" href="/assets/css/0.css">
<link rel="stylesheet" type="text/css" href="/assets/css/28.css">
<link rel="stylesheet" type="text/css" href="/assets/css/24.css">
<style>
            .izobacknext{
                background-color:#204080;
                color:white;
                font-size: 18px;
                height:35px;
                font-weight: 900;
                text-transform: uppercase;
                border: none;
                margin-bottom:5px;
            }
            
.prevarrow {
    display: block;
    margin-right: 3px;
    width: 13px;
    height: 21px;
    background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNiA0MiI+CiAgPHBvbHlnb24gcG9pbnRzPSIyMS44OCAwIDAgMjEgMjEuODggNDIgMjYgMzguMDQgOC4yNSAyMSAyNiAzLjk2IDIxLjg4IDAiIGZpbGw9IiNmZmYiIGZpbGwtcnVsZT0iZXZlbm9kZCIgLz4KPC9zdmc+Cg==) 0 center/13px auto no-repeat;
    content: "";
}
            
            
        </style>
</head>
<body style="overflow: &quot;&quot;; touch-action: auto">
<div id="root">
<div id="others-content"></div>
<div id="app">
<div class="_-9ST1">
<header class="_268MK" style="background-color: rgb(32, 64, 128);">
<div class="-xfRj">
<div class="_3RMaK">
<button onclick="location.href='/';" class="q2020">Back</button>
</div>
<div class="_21GEl" style="justify-content: center;">
<a class="_2YrMF" href="/"></a>
</div>
<div class="PA3Hl">
<div class="_3JlkE">
<p>My Coins</p>
<p onclick="location.href='/shop/';" class="mFA_6"><?php echo $koinsat; ?></p>
</div>
<button class="_309Cw" onclick="logedMainMenu()"></button>
</div>
</div>
</header>
</div>


<main>
<header class="textcenter">
    <br>
    <script type="text/javascript">
var ad_idzone = "3351754",
	 ad_width = "300",
	 ad_height = "50";
</script>
<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
<noscript><iframe src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=3351754&output=noscript&type=300x50" width="300" height="50" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe></noscript>


</header>
<div class="_37R73" style="display:block;">
    
    
    
 <?php  

if($_GET['mediaid'] == ''){
    $offset = '0';
}else{
    $offset = $_GET['mediaid'];
}
    
$sql = "SELECT * FROM medias WHERE albumid='".$album['id']."' ORDER BY id DESC LIMIT 1 OFFSET $offset";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($_GET['mediaid'] == '' or $_GET['mediaid'] == 0){
                
            echo '<div class="grid-c3-33">
                    <div class="textleft">
                    <button class="izobacknext" style="background:grey"> <b>&lt;&lt;</b> Prev</button>
                    </div>
                    <div class="textcenter">('.$allphotos.' Photos)</div>
                    <div class="textright">
                    <button class="izobacknext" onclick="window.location.href=&quot;/album/'.$_GET['slug'].'/'.$idplnji.'/&quot;">Next <b>&gt;&gt;</b></button>
                    </div>
                    </div>
                    
                    <div class="_2zLM1">
                    <div class="_1S9rk _2bMH0" style="background-image: url(&quot;'.$mediaServer. $row['media_url'].'&quot;);">
                    <div onclick="getotheropt(&quot;/getfullmedia/'.$row['id'].'/&quot;)" class="_1hEuQ"></div>
                    </div>
                </div>';
        }else{
            echo '<div class="grid-c3-33">
                    <div class="textleft">
                    <button class="izobacknext"  onclick="window.location.href=&quot;/album/'.$_GET['slug'].'/'.$idmnnji.'/&quot;"> <b>&lt;&lt;</b> Prev</button>
                    </div>
                    <div class="textcenter">('.$_GET['mediaid'].' of '.$allphotos.')</div>
                    <div class="textright">
                    <button class="izobacknext" onclick="window.location.href=&quot;/album/'.$_GET['slug'].'/'.$idplnji.'/&quot;">Next <b>&gt;&gt;</b></button>
                    </div>
                    </div>
                    
                    <div class="_2zLM1">
                    <div class="_1S9rk _2bMH0" style="background-image: url(&quot;'.$mediaServer. $row['media_url'].'&quot;);">
                    <div onclick="getotheropt(&quot;/getfullmedia/'.$row['id'].'/&quot;)" class="_1hEuQ"></div>
                    </div>
                </div>';
            
        }
        
        
        
    }
} else {
    echo '<script>window.location.replace("https://<?php echo $weburl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/fblogin/");</script>';
}





?>








</div>
</main>
<?php get_footer(); ?>
</div>
<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>

</body></html>